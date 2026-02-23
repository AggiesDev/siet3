<?php
require_once __DIR__ . '/admin-auth.php';
require_once __DIR__ . '/news-data.php';

$AREA = "news";

// logout_to support
if (isset($_GET['logout_to']) && $_GET['logout_to'] !== '') {
  $to = $_GET['logout_to'];
  $allow = ['news.php','news-detail.php','index.php'];
  if (!in_array($to, $allow, true)) $to = 'news.php';

  admin_logout($AREA);
  session_destroy();
  header("Location: " . $to);
  exit;
}

$errAuth = '';
if (isset($_POST['auth_action']) && $_POST['auth_action'] === 'login') {
  $email = strtolower(trim($_POST['admin_email'] ?? ''));
  $pass  = (string)($_POST['admin_pass'] ?? '');

  if (admin_check_credentials($email, $pass)) {
    admin_login($AREA, $email);
    header("Location: news-admin.php");
    exit;
  } else {
    $errAuth = "Wrong email or password. Please try again.";
  }
}

if (isset($_GET['logout']) && $_GET['logout'] === '1') {
  admin_logout($AREA);
  session_destroy();
  header("Location: news-admin.php");
  exit;
}

if (!admin_is_authed($AREA)):
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>News Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{ background:#f6f7fb; }
    .login-card{ max-width:460px; border-radius:18px; box-shadow:0 18px 45px rgba(0,0,0,.10); border:1px solid rgba(0,0,0,.08); }
  </style>
</head>
<body>
  <main class="min-vh-100 d-flex align-items-center justify-content-center p-3">
    <div class="card login-card w-100">
      <div class="card-body p-4">
        <h1 class="h4 fw-bold mb-1">News Admin</h1>
        <p class="text-muted mb-3">Login with admin email and password.</p>

        <?php if ($errAuth): ?>
          <div class="alert alert-danger py-2"><?= htmlspecialchars($errAuth) ?></div>
        <?php endif; ?>

        <form method="POST" action="news-admin.php" autocomplete="off">
          <input type="hidden" name="auth_action" value="login">
          <label class="form-label fw-semibold">Email</label>
          <input type="email" name="admin_email" class="form-control" placeholder="admin@gmail.com" required>

          <label class="form-label fw-semibold mt-3">Password</label>
          <input type="password" name="admin_pass" class="form-control" placeholder="Enter password" required>

          <button class="btn btn-primary w-100 mt-3">Login</button>
          <a href="news.php" class="btn btn-success w-100 mt-3">View News</a>
        </form>
      </div>
    </div>
  </main>
</body>
</html>
<?php exit; endif; ?>

<?php
$active = 'news';
$page_css = ['sections.css'];
include 'header.php';

/* filesystem paths */
$thumb_dir = __DIR__ . "/images/news/thumbs/";
$thumb_url = "images/news/thumbs/";
$banner_dir = __DIR__ . "/images/news/banners/";
$banner_url = "images/news/banners/";
$root_dir = __DIR__ . "/images/news/";
$root_url = "images/news/";

@mkdir($thumb_dir, 0775, true);
@mkdir($banner_dir, 0775, true);
@mkdir($root_dir, 0775, true);

function rrmdir_news($dir): void {
  if (!is_dir($dir)) return;
  foreach (scandir($dir) as $item) {
    if ($item === '.' || $item === '..') continue;
    $path = $dir . DIRECTORY_SEPARATOR . $item;
    if (is_dir($path)) rrmdir_news($path);
    else @unlink($path);
  }
  @rmdir($dir);
}
function delete_if_local_news(string $path, string $baseUrl, string $baseDir): void {
  $path = trim($path);
  if ($path === '') return;
  if (strpos($path, $baseUrl) !== 0) return;
  $file = basename($path);
  $full = rtrim($baseDir, "/\\") . DIRECTORY_SEPARATOR . $file;
  if (is_file($full)) @unlink($full);
}
function n_dir(string $root, string $id): string { return rtrim($root,"/\\") . DIRECTORY_SEPARATOR . $id . DIRECTORY_SEPARATOR; }
function n_url(string $rootUrl, string $id): string { return rtrim($rootUrl,"/\\") . "/" . $id . "/"; }
function n_dl_dir(string $root, string $id): string { return n_dir($root,$id) . "downloads" . DIRECTORY_SEPARATOR; }
function n_dl_url(string $rootUrl, string $id): string { return n_url($rootUrl,$id) . "downloads/"; }
function n_gal_dir(string $root, string $id): string { return n_dir($root,$id) . "gallery" . DIRECTORY_SEPARATOR; }
function n_gal_url(string $rootUrl, string $id): string { return n_url($rootUrl,$id) . "gallery/"; }

/* load state */
$data = load_news_data();
$items = $data['news'];
$categories = $data['categories'];

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$edit_id = $_GET['edit'] ?? '';
$delete_id = $_GET['delete'] ?? '';

$msg = '';
$err = '';
$id_error = '';

/* delete */
if ($delete_id) {
  $toDelete = find_news_by_id($items, $delete_id);
  $items = array_values(array_filter($items, fn($n)=>($n['id'] ?? '') !== $delete_id));
  $data['news'] = $items;

  if (save_news_data($data)) {
    if ($toDelete) {
      delete_if_local_news($toDelete['image'] ?? '', $thumb_url, $thumb_dir);
      delete_if_local_news($toDelete['banner'] ?? '', $banner_url, $banner_dir);
      rrmdir_news(n_dir($root_dir, $delete_id));
    }
    $msg = "News deleted successfully.";
  } else {
    $err = "Failed to delete (cannot write news-data.json).";
  }
}

/* save */
if ($action === 'save') {
  $id = clean_news_id($_POST['id'] ?? '');
  $editing_id = trim($_POST['editing_id'] ?? '');

  $cat_sel = trim($_POST['category_select'] ?? '');
  $cat_new = trim($_POST['category_new'] ?? '');
  $category = ($cat_sel === '__new__') ? $cat_new : $cat_sel;

  $title = trim($_POST['title'] ?? '');
  $date = trim($_POST['date'] ?? '');
  $location = trim($_POST['location'] ?? '');
  $summary = trim($_POST['summary'] ?? '');

  $youtube = trim($_POST['youtube'] ?? '');
  if ($err === '' && !is_youtube_url_news($youtube)) $err = "Video link must be a YouTube URL only.";
  $youtube_embed = youtube_embed_url_news($youtube);

  $existing_thumb = trim($_POST['existing_image'] ?? '');
  $existing_banner = trim($_POST['existing_banner'] ?? '');

  $desc_text = trim($_POST['desc_text'] ?? '');
  $desc = array_values(array_filter(array_map('trim', preg_split("/\r\n|\n|\r/", $desc_text))));

  $downloads_on = !empty($_POST['downloads_on']);
  $download_button_name = trim($_POST['download_button_name'] ?? '');
  $existing_downloads = $_POST['existing_downloads'] ?? [];
  if (!is_array($existing_downloads)) $existing_downloads = [];
  $remove_downloads = $_POST['remove_downloads'] ?? [];
  if (!is_array($remove_downloads)) $remove_downloads = [];

  $gallery_on = !empty($_POST['enable_gallery']);
  $existing_gallery = $_POST['existing_gallery'] ?? [];
  if (!is_array($existing_gallery)) $existing_gallery = [];
  $remove_gallery = $_POST['remove_gallery'] ?? [];
  if (!is_array($remove_gallery)) $remove_gallery = [];

  if ($err === '' && ($id === '' || $title === '')) $err = "ID and Title are required.";

  if ($err === '') {
    $dup = false;
    foreach ($items as $n) {
      if (($n['id'] ?? '') === $id) { $dup = true; break; }
    }
    if ($dup && $editing_id !== $id) {
      $id_error = "This ID is already used. Please choose another ID.";
      $err = "Duplicate ID.";
    }
  }

  if ($err === '' && $category !== '') {
    ensure_news_category($data, $category);
    $categories = $data['categories'];
  }

  // thumb upload
  $thumb_path = $existing_thumb;
  if ($err === '' && !empty($_FILES['image']['name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tmp = $_FILES['image']['tmp_name'];
    $orig = $_FILES['image']['name'];
    $ext = strtolower(pathinfo($orig, PATHINFO_EXTENSION));
    $allowed = ['png','jpg','jpeg','webp'];
    if (!in_array($ext, $allowed, true)) {
      $err = "Thumbnail must be PNG/JPG/JPEG/WEBP.";
    } else {
      $safe = $id . "-thumb-" . time() . "." . $ext;
      if (move_uploaded_file($tmp, $thumb_dir . $safe)) {
        if ($existing_thumb && $existing_thumb !== ($thumb_url . $safe)) delete_if_local_news($existing_thumb, $thumb_url, $thumb_dir);
        $thumb_path = $thumb_url . $safe;
      } else $err = "Failed to upload thumbnail.";
    }
  }

  // banner upload
  $banner_path = $existing_banner;
  if ($err === '' && !empty($_FILES['banner']['name']) && $_FILES['banner']['error'] === UPLOAD_ERR_OK) {
    $tmp = $_FILES['banner']['tmp_name'];
    $orig = $_FILES['banner']['name'];
    $ext = strtolower(pathinfo($orig, PATHINFO_EXTENSION));
    $allowed = ['png','jpg','jpeg','webp'];
    if (!in_array($ext, $allowed, true)) {
      $err = "Banner must be PNG/JPG/JPEG/WEBP.";
    } else {
      $safe = $id . "-banner-" . time() . "." . $ext;
      if (move_uploaded_file($tmp, $banner_dir . $safe)) {
        if ($existing_banner && $existing_banner !== ($banner_url . $safe)) delete_if_local_news($existing_banner, $banner_url, $banner_dir);
        $banner_path = $banner_url . $safe;
      } else $err = "Failed to upload banner.";
    }
  }

  // downloads keep/remove
  $dl_keep = [];
  foreach ($existing_downloads as $d) {
    $d = trim((string)$d);
    if ($d === '') continue;
    if (in_array($d, $remove_downloads, true)) continue;
    $dl_keep[] = $d;
  }
  if (!empty($remove_downloads)) {
    $ddir = n_dl_dir($root_dir, $id);
    $durl = n_dl_url($root_url, $id);
    foreach ($remove_downloads as $rd) {
      $rd = trim((string)$rd);
      if ($rd === '' || strpos($rd, $durl) !== 0) continue;
      $full = $ddir . basename($rd);
      if (is_file($full)) @unlink($full);
    }
  }

  // downloads upload
  $dl_new = [];
  if ($err === '' && $downloads_on && !empty($_FILES['downloads']) && is_array($_FILES['downloads']['name'])) {
    @mkdir(n_dl_dir($root_dir, $id), 0775, true);
    $durl = n_dl_url($root_url, $id);
    $allowed_docs = ['pdf','doc','docx'];

    $total = count($_FILES['downloads']['name']);
    for ($i=0; $i<$total; $i++) {
      $n = trim((string)($_FILES['downloads']['name'][$i] ?? ''));
      if ($n === '') continue;
      if (($_FILES['downloads']['error'][$i] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) continue;

      $tmp = $_FILES['downloads']['tmp_name'][$i];
      $ext = strtolower(pathinfo($n, PATHINFO_EXTENSION));
      if (!in_array($ext, $allowed_docs, true)) { $err = "Downloads can upload PDF/DOC/DOCX only."; break; }

      $safe = $id . "-file-" . time() . "-" . $i . "." . $ext;
      $dest = n_dl_dir($root_dir, $id) . $safe;
      if (move_uploaded_file($tmp, $dest)) $dl_new[] = $durl . $safe;
      else { $err = "Failed to upload a download file."; break; }
    }
  }
  $final_downloads = $downloads_on ? array_values(array_merge($dl_keep, $dl_new)) : [];

  // gallery keep/remove
  $g_keep = [];
  foreach ($existing_gallery as $g) {
    $g = trim((string)$g);
    if ($g === '') continue;
    if (in_array($g, $remove_gallery, true)) continue;
    $g_keep[] = $g;
  }
  if (!empty($remove_gallery)) {
    $gdir = n_gal_dir($root_dir, $id);
    $gurl = n_gal_url($root_url, $id);
    foreach ($remove_gallery as $rg) {
      $rg = trim((string)$rg);
      if ($rg === '' || strpos($rg, $gurl) !== 0) continue;
      $full = $gdir . basename($rg);
      if (is_file($full)) @unlink($full);
    }
  }

  // gallery upload (max 10)
  $g_new = [];
  if ($err === '' && $gallery_on && !empty($_FILES['gallery']) && is_array($_FILES['gallery']['name'])) {
    $selected = 0;
    foreach ($_FILES['gallery']['name'] as $n) if (trim((string)$n) !== '') $selected++;

    $slots_left = max(0, 10 - count($g_keep));
    if ($selected > $slots_left) {
      $err = "Unsuccessful: selected {$selected} image(s) but only {$slots_left} slot(s) left. Max 10.";
    } else {
      @mkdir(n_gal_dir($root_dir, $id), 0775, true);
      $gurl = n_gal_url($root_url, $id);
      $allowed_img = ['png','jpg','jpeg','webp'];

      $total = count($_FILES['gallery']['name']);
      for ($i=0; $i<$total; $i++) {
        $n = trim((string)($_FILES['gallery']['name'][$i] ?? ''));
        if ($n === '') continue;
        if (($_FILES['gallery']['error'][$i] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) continue;

        $tmp = $_FILES['gallery']['tmp_name'][$i];
        $ext = strtolower(pathinfo($n, PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed_img, true)) continue;

        $safe = $id . "-g-" . time() . "-" . $i . "." . $ext;
        $dest = n_gal_dir($root_dir, $id) . $safe;
        if (move_uploaded_file($tmp, $dest)) $g_new[] = $gurl . $safe;
      }
    }
  }
  $final_gallery = $gallery_on ? array_slice(array_merge($g_keep, $g_new), 0, 10) : [];

  if ($err === '') {
    $obj = [
      "id" => $id,
      "category" => $category,
      "title" => $title,
      "date" => $date,
      "location" => $location,
      "summary" => $summary,
      "image" => $thumb_path,
      "banner" => $banner_path ?: $thumb_path,
      "desc" => $desc,
      "youtube" => $youtube,
      "youtube_embed" => $youtube_embed,
      "downloads_on" => $downloads_on ? true : false,
      "download_button_name" => $download_button_name,
      "downloads" => $final_downloads,
      "gallery_on" => $gallery_on ? true : false,
      "gallery" => $final_gallery
    ];

    $found = false;
    foreach ($items as &$x) {
      if (($x['id'] ?? '') === $id) { $x = array_merge($x, $obj); $found = true; break; }
    }
    unset($x);

    if (!$found) $items[] = $obj;

    $data['news'] = $items;
    if (save_news_data($data)) $msg = $found ? "News updated successfully." : "News added successfully.";
    else $err = "Failed to save (cannot write news-data.json).";
  }
}

/* edit load */
$edit = $edit_id ? find_news_by_id($items, $edit_id) : null;

$sticky_id = $edit['id'] ?? ($_POST['id'] ?? '');
$sticky_title = $edit['title'] ?? ($_POST['title'] ?? '');
$sticky_date = $edit['date'] ?? ($_POST['date'] ?? '');
$sticky_location = $edit['location'] ?? ($_POST['location'] ?? '');
$sticky_summary = $edit['summary'] ?? ($_POST['summary'] ?? '');
$sticky_image = $edit['image'] ?? ($_POST['existing_image'] ?? '');
$sticky_banner = $edit['banner'] ?? ($_POST['existing_banner'] ?? '');
$sticky_desc_text = $edit ? implode("\n", ($edit['desc'] ?? [])) : ($_POST['desc_text'] ?? '');
$sticky_youtube = $edit['youtube'] ?? ($_POST['youtube'] ?? '');
$sticky_cat = $edit['category'] ?? '';
$sticky_dl_btn = $edit['download_button_name'] ?? ($_POST['download_button_name'] ?? '');

$sticky_gallery = [];
if ($edit && !empty($edit['gallery']) && is_array($edit['gallery'])) $sticky_gallery = array_values(array_filter($edit['gallery'], fn($x)=>is_string($x)&&trim($x)!=='' ));
$sticky_downloads = [];
if ($edit && !empty($edit['downloads']) && is_array($edit['downloads'])) $sticky_downloads = array_values(array_filter($edit['downloads'], fn($x)=>is_string($x)&&trim($x)!=='' ));

$downloads_checked = isset($_POST['downloads_on']) ? !empty($_POST['downloads_on']) : (!empty($edit['downloads_on']));
$gallery_checked = isset($_POST['enable_gallery']) ? !empty($_POST['enable_gallery']) : (!empty($edit['gallery_on']));
if (!$edit && !isset($_POST['downloads_on'])) $downloads_checked = false;
if (!$edit && !isset($_POST['enable_gallery'])) $gallery_checked = false;
?>

<main>
<section class="page-hero">
  <div class="container py-5">
    <div class="d-flex align-items-end justify-content-between flex-wrap gap-2">
      <div>
        <h1 class="mb-2 fw-bold">News Admin</h1>
        <p class="text-muted mb-0">Add / edit / delete news (no database).</p>
      </div>
      <div class="d-flex gap-2 flex-wrap">
        <a href="news-admin.php?logout_to=news.php" class="btn btn-outline-secondary rounded-pill">View News Page</a>
        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#newsModal">
          <?= $edit ? "Edit News" : "Add News" ?>
        </button>
      </div>
    </div>
  </div>
</section>
<br>
<section class="section-pad pt-0">
  <div class="container">
    <?php if ($msg): ?><div class="alert alert-success"><?= htmlspecialchars($msg) ?></div><?php endif; ?>
    <?php if ($err && $err !== "Duplicate ID."): ?><div class="alert alert-danger"><?= htmlspecialchars($err) ?></div><?php endif; ?>

    <div class="card shadow-sm" style="border-radius:16px;">
      <div class="card-body">
        <h5 class="fw-bold mb-3">Current News (<?= count($items) ?>)</h5>

        <?php if (count($items) === 0): ?>
          <div class="text-muted">No news yet.</div>
        <?php else: ?>
          <div class="pa-scrollwrap">
            <table class="table table-hover align-middle mb-0 pa-table">
              <thead>
                <tr>
                  <th style="width:70px;">No</th>
                  <th style="width:120px;">Thumb</th>
                  <th>Title</th>
                  <th style="width:160px;">Category</th>
                  <th style="width:120px;">Date</th>
                  <th style="width:140px;">Location</th>
                  <th style="width:110px; text-align:center;">Gallery</th>
                  <th style="width:110px; text-align:center;">YouTube</th>
                  <th style="width:110px; text-align:center;">Downloads</th>
                  <th style="width:420px; text-align:center;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($items as $i => $n): ?>
                  <?php
                    $g = $n['gallery'] ?? [];
                    $gcount = is_array($g) ? count(array_filter($g, fn($x)=>is_string($x) && trim($x)!=='')) : 0;
                    $d = $n['downloads'] ?? [];
                    $dcount = is_array($d) ? count(array_filter($d, fn($x)=>is_string($x) && trim($x)!=='')) : 0;
                  ?>
                  <tr>
                    <td><?= $i + 1 ?></td>
                    <td>
                      <?php if (!empty($n['image'])): ?>
                        <img src="<?= htmlspecialchars($n['image']) ?>" alt=""
                             style="width:78px; height:48px; object-fit:cover; border-radius:10px; background:#fff;">
                      <?php else: ?>
                        <span class="text-muted small">No image</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <div class="fw-semibold"><?= htmlspecialchars($n['title'] ?? '') ?></div>
                      <div class="small text-muted"><?= htmlspecialchars($n['id'] ?? '') ?></div>
                    </td>
                    <td><?= htmlspecialchars($n['category'] ?? '') ?></td>
                    <td><?= htmlspecialchars($n['date'] ?? '') ?></td>
                    <td><?= htmlspecialchars($n['location'] ?? '') ?></td>
                    <td class="text-center"><?= $gcount ? '<span class="pa-badge-ok">'.$gcount.'</span>' : '<span class="pa-badge-none">0</span>' ?></td>
                      <td class="text-center">
                        <?php if (empty($n['youtube'])): ?>
                          <span class="pa-badge-none">No</span>
                        <?php else: ?>
                          <span class="pa-badge-ok">Yes</span>
                        <?php endif; ?>
                    <td class="text-center"><?= $dcount ? '<span class="pa-badge-ok">'.$dcount.'</span>' : '<span class="pa-badge-none">0</span>' ?></td>
                    <td>
                      <div class="pa-actions">
                        <a class="btn btn-sm btn-outline-primary pa-btn" href="news-admin.php?edit=<?= urlencode($n['id']) ?>">Edit</a>
                        <a class="btn btn-sm btn-outline-secondary pa-btn" href="news-detail.php?id=<?= urlencode($n['id']) ?>" target="_blank">Preview</a>
                        <a class="btn btn-sm btn-outline-danger pa-btn"
                           href="news-admin.php?delete=<?= urlencode($n['id']) ?>"
                           onclick="return confirm('Delete this news? This will delete images, downloads and gallery folder.');">
                          Delete
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>
  <br>  
</section>

<!-- MODAL -->
<div class="modal fade" id="newsModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content pa-modal">
      <div class="modal-header">
        <h5 class="modal-title fw-bold"><?= $edit ? "Edit News" : "Add News" ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" action="news-admin.php" enctype="multipart/form-data">
          <input type="hidden" name="action" value="save">
          <input type="hidden" name="editing_id" value="<?= htmlspecialchars($edit['id'] ?? '') ?>">
          <input type="hidden" name="existing_image" value="<?= htmlspecialchars($sticky_image) ?>">
          <input type="hidden" name="existing_banner" value="<?= htmlspecialchars($sticky_banner) ?>">

          <?php foreach ($sticky_gallery as $g): ?><input type="hidden" name="existing_gallery[]" value="<?= htmlspecialchars($g) ?>"><?php endforeach; ?>
          <?php foreach ($sticky_downloads as $d): ?><input type="hidden" name="existing_downloads[]" value="<?= htmlspecialchars($d) ?>"><?php endforeach; ?>

          <div class="row g-3">

            <div class="col-md-6">
              <label class="form-label fw-semibold">ID (unique)</label>
              <input type="text" name="id"
                     class="form-control <?= !empty($id_error) ? 'is-invalid' : '' ?>"
                     value="<?= htmlspecialchars($sticky_id) ?>"
                     <?= $edit ? 'readonly' : '' ?>
                     placeholder="example: announcement-2026"
                     required>
              <?php if (!empty($id_error)): ?>
                <div class="invalid-feedback d-block"><?= htmlspecialchars($id_error) ?></div>
              <?php else: ?>
                <div class="form-text">Use lowercase letters/numbers/hyphen only.</div>
              <?php endif; ?>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Category</label>
              <select name="category_select" id="categorySelect" class="form-select">
                <option value="">Select Category</option>
                <?php
                  $base = ["Latest News","Special News","Past News"];
                  foreach ($base as $b){
                    $sel = ($sticky_cat === $b) ? 'selected' : '';
                    echo '<option value="'.htmlspecialchars($b).'" '.$sel.'>'.htmlspecialchars($b).'</option>';
                  }
                  foreach ($categories as $c){
                    if (in_array($c, $base, true)) continue;
                    $sel = ($sticky_cat === $c) ? 'selected' : '';
                    echo '<option value="'.htmlspecialchars($c).'" '.$sel.'>'.htmlspecialchars($c).'</option>';
                  }
                ?>
                <option value="__new__">New Category</option>
              </select>

              <div class="mt-2" id="newCategoryWrap" style="display:none;">
                <input type="text" name="category_new" id="categoryNew" class="form-control" placeholder="Type new category name">
                <div class="form-text">This category will be saved and appear next time.</div>
              </div>
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">Title</label>
              <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($sticky_title) ?>" required>
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Date</label>
              <input type="date" name="date" class="form-control" value="<?= htmlspecialchars($sticky_date) ?>">
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Location</label>
              <input type="text" name="location" class="form-control" value="<?= htmlspecialchars($sticky_location) ?>" placeholder="Singapore / Online">
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Summary (listing)</label>
              <input type="text" name="summary" class="form-control" value="<?= htmlspecialchars($sticky_summary) ?>">
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">YouTube Video Link (optional)</label>
              <input type="url" name="youtube" class="form-control" value="<?= htmlspecialchars($sticky_youtube) ?>"
                     placeholder="https://www.youtube.com/watch?v=... or https://youtu.be/...">
              <div class="form-text">Only YouTube links are allowed.</div>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Thumbnail Image (listing)</label>
              <input type="file" name="image" class="form-control" accept=".png,.jpg,.jpeg,.webp">
              <?php if (!empty($sticky_image)): ?>
                <div class="small text-muted mt-2">Current:</div>
                <img src="<?= htmlspecialchars($sticky_image) ?>" style="max-width:180px; max-height:80px; object-fit:cover; border-radius:12px;">
              <?php endif; ?>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Banner Image (detail)</label>
              <input type="file" name="banner" class="form-control" accept=".png,.jpg,.jpeg,.webp">
              <?php if (!empty($sticky_banner)): ?>
                <div class="small text-muted mt-2">Current:</div>
                <img src="<?= htmlspecialchars($sticky_banner) ?>" style="max-width:180px; max-height:80px; object-fit:cover; border-radius:12px;">
              <?php endif; ?>
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">Details (one paragraph per line)</label>
              <textarea name="desc_text" class="form-control" rows="5"
                        placeholder="Write each paragraph in a new line..."><?= htmlspecialchars($sticky_desc_text) ?></textarea>
            </div>

            <!-- Downloads toggle -->
            <div class="col-12">
              <label class="form-label fw-semibold d-block">Downloads</label>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch"
                       id="downloadsToggle" name="downloads_on" value="1"
                       <?= $downloads_checked ? 'checked' : '' ?>>
                <label class="form-check-label" for="downloadsToggle">Enable downloads (PDF/DOC/DOCX only)</label>
              </div>
            </div>

            <div class="col-12" id="downloadNameBlock">
              <label class="form-label fw-semibold">Download Button Name (optional)</label>
              <input type="text" name="download_button_name" class="form-control"
                     value="<?= htmlspecialchars($sticky_dl_btn) ?>"
                     placeholder="Example: Download News Bulletin">
              <div class="form-text">If empty, the button will show the filename.</div>
            </div>

            <div class="col-12" id="downloadsBlock">
              <label class="form-label fw-semibold">Upload Files</label>
              <input type="file" name="downloads[]" class="form-control" accept=".pdf,.doc,.docx" multiple>
              <div class="form-text">Stored in <code>images/news/&lt;id&gt;/downloads/</code></div>

              <?php if (!empty($sticky_downloads)): ?>
                <div class="mt-3">
                  <div class="small text-muted mb-2">Existing Downloads (tick to remove):</div>
                  <div class="d-flex flex-column gap-2">
                    <?php foreach($sticky_downloads as $d): ?>
                      <label class="border rounded p-2 d-flex align-items-center gap-2">
                        <input class="form-check-input mt-0" type="checkbox" name="remove_downloads[]" value="<?= htmlspecialchars($d) ?>">
                        <span class="small text-muted"><?= htmlspecialchars(basename($d)) ?></span>
                      </label>
                    <?php endforeach; ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>

            <!-- Gallery toggle -->
            <div class="col-12">
              <label class="form-label fw-semibold d-block">Gallery</label>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch"
                       id="galleryToggle" name="enable_gallery" value="1"
                       <?= $gallery_checked ? 'checked' : '' ?>>
                <label class="form-check-label" for="galleryToggle">Enable gallery image upload (max 10)</label>
              </div>
            </div>

            <div class="col-12" id="galleryUploadBlock">
              <label class="form-label fw-semibold">Gallery Images</label>
              <input type="file" name="gallery[]" class="form-control" accept=".png,.jpg,.jpeg,.webp" multiple>
              <div class="form-text">Stored in <code>images/news/&lt;id&gt;/gallery/</code></div>

              <?php if (!empty($sticky_gallery)): ?>
                <div class="mt-3">
                  <div class="small text-muted mb-2">Existing Gallery (tick to remove):</div>
                  <div class="d-flex flex-wrap gap-2">
                    <?php foreach($sticky_gallery as $g): ?>
                      <label class="border rounded p-2" style="width:120px;">
                        <img src="<?= htmlspecialchars($g) ?>" alt="gallery"
                             style="width:100%; height:70px; object-fit:cover; border-radius:8px;"
                             onerror="this.style.display='none';">
                        <div class="form-check mt-2">
                          <input class="form-check-input" type="checkbox" name="remove_gallery[]" value="<?= htmlspecialchars($g) ?>">
                          <label class="form-check-label small">Remove</label>
                        </div>
                      </label>
                    <?php endforeach; ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>

          </div>

          <div class="d-flex justify-content-end gap-2 mt-4">
            <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
            <button class="btn btn-primary rounded-pill px-4">Save</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<style>
.pa-scrollwrap{ max-height:560px; overflow:auto; border-radius:14px; border:1px solid rgba(0,0,0,.06); position:relative; }
.pa-table{ min-width: 1400px; border-collapse: separate; border-spacing: 0; }
.pa-table thead th{ position: sticky; top: 0; background:#fff; z-index: 6; border-bottom:1px solid rgba(0,0,0,.10); white-space:nowrap; }
.pa-table thead th:nth-child(1), .pa-table tbody td:nth-child(1){
  position: sticky; left:0; z-index: 7; background:#fff; box-shadow: 1px 0 0 rgba(0,0,0,.08);
}
.pa-table thead th:nth-child(1){ z-index: 8; }

.pa-actions{ display:grid; grid-template-columns: repeat(3, 1fr); gap:10px; justify-content:end; max-width:420px; margin-left:auto; }
.pa-btn{ width:100%; text-align:center; font-weight:800; padding:.45rem .9rem; font-size:.95rem; border-radius:999px; white-space:nowrap; }

.pa-modal{ border-radius:18px; overflow:hidden; }
.modal-header{ background: linear-gradient(180deg, rgba(13,110,253,.10), rgba(255,255,255,0)); }

.pa-badge-ok{
  display:inline-flex; align-items:center; justify-content:center;
  min-width:40px; padding:6px 12px; border-radius:999px;
  font-weight:900; font-size:.9rem;
  background: rgba(13,110,253,.12);
  border: 1px solid rgba(13,110,253,.22);
  color:#0d6efd;
}
.pa-badge-none{
  display:inline-flex; align-items:center; justify-content:center;
  min-width:40px; padding:6px 12px; border-radius:999px;
  font-weight:900; font-size:.9rem;
  background: rgba(220,53,69,.12);
  border: 1px solid rgba(220,53,69,.22);
  color:#dc3545;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function(){
  const categorySelect = document.getElementById("categorySelect");
  const newWrap = document.getElementById("newCategoryWrap");
  const newInput = document.getElementById("categoryNew");

  function syncCategory(){
    if(!categorySelect || !newWrap) return;
    const isNew = categorySelect.value === "__new__";
    newWrap.style.display = isNew ? "block" : "none";
    if (newInput) newInput.required = isNew;
  }
  if(categorySelect) categorySelect.addEventListener("change", syncCategory);
  syncCategory();

  const downloadsToggle = document.getElementById("downloadsToggle");
  const downloadsBlock = document.getElementById("downloadsBlock");
  const downloadNameBlock = document.getElementById("downloadNameBlock");

  function syncDownloads(){
    if(!downloadsToggle || !downloadsBlock || !downloadNameBlock) return;
    const on = downloadsToggle.checked;
    downloadsBlock.style.display = on ? "block" : "none";
    downloadNameBlock.style.display = on ? "block" : "none";
    downloadsBlock.querySelectorAll("input").forEach(el => el.disabled = !on);
    downloadNameBlock.querySelectorAll("input").forEach(el => el.disabled = !on);
  }
  if(downloadsToggle) downloadsToggle.addEventListener("change", syncDownloads);
  syncDownloads();

  const galleryToggle = document.getElementById("galleryToggle");
  const galleryBlock = document.getElementById("galleryUploadBlock");
  function syncGallery(){
    if(!galleryToggle || !galleryBlock) return;
    const on = galleryToggle.checked;
    galleryBlock.style.display = on ? "block" : "none";
    galleryBlock.querySelectorAll("input").forEach(el => el.disabled = !on);
  }
  if(galleryToggle) galleryToggle.addEventListener("change", syncGallery);
  syncGallery();

  const shouldOpen = <?= json_encode((bool)$edit || (bool)$err || (bool)$id_error) ?>;
  if (shouldOpen) {
    const modalEl = document.getElementById("newsModal");
    if (modalEl) new bootstrap.Modal(modalEl).show();
  }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'footer.php'; ?>