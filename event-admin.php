<?php
require_once __DIR__ . '/admin-auth.php';
require_once __DIR__ . '/events-data.php';

$AREA = "events";

// logout_to support
if (isset($_GET['logout_to']) && $_GET['logout_to'] !== '') {
  $to = $_GET['logout_to'];
  $allow = ['events.php','event-detail.php','index.php'];
  if (!in_array($to, $allow, true)) $to = 'events.php';

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
    header("Location: event-admin.php");
    exit;
  } else {
    $errAuth = "Wrong email or password. Please try again.";
  }
}

if (isset($_GET['logout']) && $_GET['logout'] === '1') {
  admin_logout($AREA);
  session_destroy();
  header("Location: event-admin.php");
  exit;
}

if (!admin_is_authed($AREA)):
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Events Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{ background:#f6f7fb; }
    .login-card{ max-width: 460px; border-radius: 18px; box-shadow: 0 18px 45px rgba(0,0,0,.10); border: 1px solid rgba(0,0,0,.08); }
  </style>
</head>
<body>
  <main class="min-vh-100 d-flex align-items-center justify-content-center p-3">
    <div class="card login-card w-100">
      <div class="card-body p-4">
        <h1 class="h4 fw-bold mb-1">Events Admin</h1>
        <p class="text-muted mb-3">Login with admin email and password.</p>

        <?php if ($errAuth): ?>
          <div class="alert alert-danger py-2"><?= htmlspecialchars($errAuth) ?></div>
        <?php endif; ?>

        <form method="POST" action="event-admin.php" autocomplete="off">
          <input type="hidden" name="auth_action" value="login">

          <label class="form-label fw-semibold">Admin Email</label>
          <input type="email" name="admin_email" class="form-control" placeholder="admin@siet.org.sg" required>

          <label class="form-label fw-semibold mt-3">Password</label>
          <input type="password" name="admin_pass" class="form-control" placeholder="Your password" required>

          <button class="btn btn-primary w-100 mt-3">Login</button>
          <a href="events.php" class="btn btn-success w-100 mt-3">View Events</a>
        </form>

        <!-- <div class="small text-muted mt-3">
          Logged in users are stored in session.
        </div> -->
      </div>
    </div>
  </main>
</body>
</html>
<?php
  exit;
endif;?>

<?php
$active = 'news';
$page_css = ['sections.css'];
include 'header.php';

/* Filesystem paths */
$thumb_dir = __DIR__ . "/images/events/thumbs/";
$thumb_url = "images/events/thumbs/";
$banner_dir = __DIR__ . "/images/events/banners/";
$banner_url = "images/events/banners/";
$event_root_dir = __DIR__ . "/images/events/";
$event_root_url = "images/events/";

@mkdir($thumb_dir, 0775, true);
@mkdir($banner_dir, 0775, true);
@mkdir($event_root_dir, 0775, true);

/* helpers */
function rrmdir($dir): void {
  if (!is_dir($dir)) return;
  foreach (scandir($dir) as $item) {
    if ($item === '.' || $item === '..') continue;
    $path = $dir . DIRECTORY_SEPARATOR . $item;
    if (is_dir($path)) rrmdir($path);
    else @unlink($path);
  }
  @rmdir($dir);
}
function safe_event_dir(string $root, string $id): string {
  return rtrim($root, "/\\") . DIRECTORY_SEPARATOR . $id . DIRECTORY_SEPARATOR;
}
function safe_event_url(string $rootUrl, string $id): string {
  return rtrim($rootUrl, "/\\") . "/" . $id . "/";
}
function safe_event_download_dir(string $root, string $id): string {
  return safe_event_dir($root, $id) . "downloads" . DIRECTORY_SEPARATOR;
}
function safe_event_download_url(string $rootUrl, string $id): string {
  return safe_event_url($rootUrl, $id) . "downloads/";
}
function safe_event_gallery_dir(string $root, string $id): string {
  return safe_event_dir($root, $id) . "gallery" . DIRECTORY_SEPARATOR;
}
function safe_event_gallery_url(string $rootUrl, string $id): string {
  return safe_event_url($rootUrl, $id) . "gallery/";
}

function delete_if_local(string $path, string $baseUrl, string $baseDir): void {
  $path = trim($path);
  if ($path === '') return;
  if (strpos($path, $baseUrl) !== 0) return;
  $file = basename($path);
  $full = rtrim($baseDir, "/\\") . DIRECTORY_SEPARATOR . $file;
  if (is_file($full)) @unlink($full);
}

function is_youtube_url(string $url): bool {
  $u = trim($url);
  if ($u === '') return true;
  return (bool)preg_match("~^(https?://)?(www\.)?(youtube\.com|youtu\.be)/~i", $u);
}

function youtube_embed_url(string $url): string {
  $url = trim($url);
  if ($url === '') return '';
  if (preg_match("~youtu\.be/([A-Za-z0-9_\-]{6,})~", $url, $m)) return "https://www.youtube.com/embed/" . $m[1];
  if (preg_match("~v=([A-Za-z0-9_\-]{6,})~", $url, $m)) return "https://www.youtube.com/embed/" . $m[1];
  if (preg_match("~youtube\.com/embed/([A-Za-z0-9_\-]{6,})~", $url, $m)) return "https://www.youtube.com/embed/" . $m[1];
  return '';
}

/* Load state */
$data = load_events_data();
$events = $data['events'];
$categories = $data['categories'];

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$edit_id = $_GET['edit'] ?? '';
$delete_id = $_GET['delete'] ?? '';

$msg = '';
$err = '';
$id_error = '';

/* Delete event */
if ($delete_id) {
  $toDelete = find_event_by_id($events, $delete_id);

  $events = array_values(array_filter($events, fn($e) => ($e['id'] ?? '') !== $delete_id));
  $data['events'] = $events;

  if (save_events_data($data)) {
    if ($toDelete) {
      delete_if_local($toDelete['image'] ?? '', $thumb_url, $thumb_dir);
      delete_if_local($toDelete['banner'] ?? '', $banner_url, $banner_dir);

      $folder = safe_event_dir($event_root_dir, $delete_id);
      rrmdir($folder);
    }
    $msg = "Event deleted successfully.";
  } else {
    $err = "Failed to delete (cannot write events-data.json).";
  }
}

/* Save event */
if ($action === 'save') {
  $id = clean_event_id($_POST['id'] ?? '');
  $editing_id = trim($_POST['editing_id'] ?? '');

  $category_select = trim($_POST['category_select'] ?? '');
  $category_new = trim($_POST['category_new'] ?? '');

  $category = $category_select;
  if ($category_select === '__new__') $category = $category_new;

  $title = trim($_POST['title'] ?? '');
  $date = trim($_POST['date'] ?? '');        // YYYY-MM-DD
  $location = trim($_POST['location'] ?? '');
  $summary = trim($_POST['summary'] ?? '');

  $youtube = trim($_POST['youtube'] ?? '');
  if ($err === '' && !is_youtube_url($youtube)) $err = "Video link must be a YouTube URL only.";
  $youtube_embed = youtube_embed_url($youtube);

  $existing_thumb = trim($_POST['existing_image'] ?? '');
  $existing_banner = trim($_POST['existing_banner'] ?? '');

  $desc_text = trim($_POST['desc_text'] ?? '');
  $desc = array_values(array_filter(array_map('trim', preg_split("/\r\n|\n|\r/", $desc_text))));

  // Downloads toggle (default OFF)
  $downloads_on = !empty($_POST['downloads_on']);
  $download_button_name = trim($_POST['download_button_name'] ?? ''); // NEW
  $existing_downloads = $_POST['existing_downloads'] ?? [];
  if (!is_array($existing_downloads)) $existing_downloads = [];

  $remove_downloads = $_POST['remove_downloads'] ?? [];
  if (!is_array($remove_downloads)) $remove_downloads = [];

  // Gallery toggle default OFF
  $enable_gallery = !empty($_POST['enable_gallery']);
  $existing_gallery = $_POST['existing_gallery'] ?? [];
  if (!is_array($existing_gallery)) $existing_gallery = [];

  $remove_gallery = $_POST['remove_gallery'] ?? [];
  if (!is_array($remove_gallery)) $remove_gallery = [];

  if ($err === '' && ($id === '' || $title === '')) {
    $err = "ID and Title are required.";
  } else if ($err === '') {
    $dup = false;
    foreach ($events as $ev) {
      if (($ev['id'] ?? '') === $id) { $dup = true; break; }
    }
    if ($dup && $editing_id !== $id) {
      $id_error = "This ID is already used. Please choose another ID.";
      $err = "Duplicate ID.";
    }
  }

  if ($err === '' && $category !== '') {
    ensure_category($data, $category);
    $categories = $data['categories'];
  }

  /* Thumb upload */
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
      $dest = $thumb_dir . $safe;
      if (move_uploaded_file($tmp, $dest)) {
        if ($existing_thumb && $existing_thumb !== ($thumb_url . $safe)) {
          delete_if_local($existing_thumb, $thumb_url, $thumb_dir);
        }
        $thumb_path = $thumb_url . $safe;
      } else {
        $err = "Failed to upload thumbnail.";
      }
    }
  }

  /* Banner upload */
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
      $dest = $banner_dir . $safe;
      if (move_uploaded_file($tmp, $dest)) {
        if ($existing_banner && $existing_banner !== ($banner_url . $safe)) {
          delete_if_local($existing_banner, $banner_url, $banner_dir);
        }
        $banner_path = $banner_url . $safe;
      } else {
        $err = "Failed to upload banner.";
      }
    }
  }

  /* Downloads keep + remove physical */
  $downloads_keep = [];
  foreach ($existing_downloads as $d) {
    $d = trim((string)$d);
    if ($d === '') continue;
    if (in_array($d, $remove_downloads, true)) continue;
    $downloads_keep[] = $d;
  }

  if (!empty($remove_downloads)) {
    $ddir = safe_event_download_dir($event_root_dir, $id);
    $durl = safe_event_download_url($event_root_url, $id);

    foreach ($remove_downloads as $rd) {
      $rd = trim((string)$rd);
      if ($rd === '') continue;
      if (strpos($rd, $durl) !== 0) continue;
      $file = basename($rd);
      $full = $ddir . $file;
      if (is_file($full)) @unlink($full);
    }
  }

  /* Downloads upload (PDF/DOC/DOCX only), only when ON */
  $downloads_new = [];
  if ($err === '' && $downloads_on && !empty($_FILES['downloads']) && is_array($_FILES['downloads']['name'])) {
    $ddir = safe_event_download_dir($event_root_dir, $id);
    $durl = safe_event_download_url($event_root_url, $id);
    @mkdir($ddir, 0775, true);

    $allowed_docs = ['pdf','doc','docx'];

    $total = count($_FILES['downloads']['name']);
    for ($i=0; $i<$total; $i++) {
      $n = trim((string)($_FILES['downloads']['name'][$i] ?? ''));
      if ($n === '') continue;
      if (($_FILES['downloads']['error'][$i] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) continue;

      $tmp = $_FILES['downloads']['tmp_name'][$i];
      $ext = strtolower(pathinfo($n, PATHINFO_EXTENSION));
      if (!in_array($ext, $allowed_docs, true)) {
        $err = "Downloads can upload PDF/DOC/DOCX only.";
        break;
      }

      $safe = $id . "-file-" . time() . "-" . $i . "." . $ext;
      $dest = $ddir . $safe;

      if (move_uploaded_file($tmp, $dest)) {
        $downloads_new[] = $durl . $safe;
      } else {
        $err = "Failed to upload a download file.";
        break;
      }
    }
  }

  $final_downloads = $downloads_on ? array_values(array_merge($downloads_keep, $downloads_new)) : [];

  /* Gallery keep + remove physical */
  $gallery_keep = [];
  foreach ($existing_gallery as $g) {
    $g = trim((string)$g);
    if ($g === '') continue;
    if (in_array($g, $remove_gallery, true)) continue;
    $gallery_keep[] = $g;
  }

  if (!empty($remove_gallery)) {
    $gdir = safe_event_gallery_dir($event_root_dir, $id);
    $gurl = safe_event_gallery_url($event_root_url, $id);

    foreach ($remove_gallery as $rg) {
      $rg = trim((string)$rg);
      if ($rg === '') continue;
      if (strpos($rg, $gurl) !== 0) continue;

      $file = basename($rg);
      $full = $gdir . $file;
      if (is_file($full)) @unlink($full);
    }
  }

  /* Gallery upload (max 10 total), only when ON */
  $gallery_new = [];
  if ($err === '' && $enable_gallery && !empty($_FILES['gallery']) && is_array($_FILES['gallery']['name'])) {
    $selectedCount = 0;
    foreach ($_FILES['gallery']['name'] as $n) if (trim((string)$n) !== '') $selectedCount++;

    $count_existing = count($gallery_keep);
    $slots_left = max(0, 10 - $count_existing);

    if ($selectedCount > $slots_left) {
      $err = "Unsuccessful: You selected {$selectedCount} image(s) but only {$slots_left} slot(s) left. Max gallery images is 10.";
    } else {
      $gdir = safe_event_gallery_dir($event_root_dir, $id);
      $gurl = safe_event_gallery_url($event_root_url, $id);
      @mkdir($gdir, 0775, true);

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
        $dest = $gdir . $safe;

        if (move_uploaded_file($tmp, $dest)) {
          $gallery_new[] = $gurl . $safe;
        }
      }
    }
  }

  $final_gallery = $enable_gallery ? array_slice(array_merge($gallery_keep, $gallery_new), 0, 10) : [];

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
      "download_button_name" => $download_button_name, // NEW
      "downloads" => $final_downloads,
      "gallery_on" => $enable_gallery ? true : false,
      "gallery" => $final_gallery
    ];

    $found = false;
    foreach ($events as &$ev) {
      if (($ev['id'] ?? '') === $id) {
        $ev = array_merge($ev, $obj);
        $found = true;
        break;
      }
    }
    unset($ev);

    if (!$found) $events[] = $obj;

    $data['events'] = $events;

    if (save_events_data($data)) $msg = $found ? "Event updated successfully." : "Event added successfully.";
    else $err = "Failed to save (cannot write events-data.json).";
  }
}

/* Load edit */
$edit_event = null;
if ($edit_id) $edit_event = find_event_by_id($events, $edit_id);

/* Sticky */
$sticky_id = $edit_event['id'] ?? ($_POST['id'] ?? '');
$sticky_title = $edit_event['title'] ?? ($_POST['title'] ?? '');
$sticky_date = $edit_event['date'] ?? ($_POST['date'] ?? '');
$sticky_location = $edit_event['location'] ?? ($_POST['location'] ?? '');
$sticky_summary = $edit_event['summary'] ?? ($_POST['summary'] ?? '');
$sticky_image = $edit_event['image'] ?? ($_POST['existing_image'] ?? '');
$sticky_banner = $edit_event['banner'] ?? ($_POST['existing_banner'] ?? '');
$sticky_desc_text = $edit_event ? implode("\n", ($edit_event['desc'] ?? [])) : ($_POST['desc_text'] ?? '');
$sticky_youtube = $edit_event['youtube'] ?? ($_POST['youtube'] ?? '');
$sticky_cat = $edit_event['category'] ?? '';
$sticky_dl_btn = $edit_event['download_button_name'] ?? ($_POST['download_button_name'] ?? ''); // NEW

$sticky_gallery = [];
if ($edit_event && !empty($edit_event['gallery']) && is_array($edit_event['gallery'])) {
  $sticky_gallery = array_values(array_filter($edit_event['gallery'], fn($x)=>is_string($x) && trim($x)!=='' ));
}

$sticky_downloads = [];
if ($edit_event && !empty($edit_event['downloads']) && is_array($edit_event['downloads'])) {
  $sticky_downloads = array_values(array_filter($edit_event['downloads'], fn($x)=>is_string($x) && trim($x)!=='' ));
}

$downloads_checked = isset($_POST['downloads_on']) ? !empty($_POST['downloads_on']) : (!empty($edit_event['downloads_on']));
$gallery_checked = isset($_POST['enable_gallery']) ? !empty($_POST['enable_gallery']) : (!empty($edit_event['gallery_on']));
if (!$edit_event && !isset($_POST['enable_gallery'])) $gallery_checked = false;
if (!$edit_event && !isset($_POST['downloads_on'])) $downloads_checked = false;
?>

<main>
<section class="page-hero">
  <div class="container py-5">
    <div class="d-flex align-items-end justify-content-between flex-wrap gap-2">
      <div>
        <h1 class="mb-2 fw-bold">Events Admin</h1>
        <p class="text-muted mb-0">Add / edit / delete events (no database).</p>
      </div>
      <div class="d-flex gap-2 flex-wrap">
        <a href="event-admin.php?logout_to=events.php" class="btn btn-outline-secondary rounded-pill">View Events Page</a>
        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#eventModal">
          <?= $edit_event ? "Edit Event" : "Add Event" ?>
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
        <h5 class="fw-bold mb-3">Current Events (<?= count($events) ?>)</h5>

        <?php if (count($events) === 0): ?>
          <div class="text-muted">No events yet.</div>
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
                   <th style="width:110px; text-align:center;">YouTube Link</th>
                  <th style="width:110px; text-align:center;">Downloads</th>
                  <th style="width:420px; text-align:center;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($events as $i => $e): ?>
                  <?php
                    $g = $e['gallery'] ?? [];
                    $gcount = is_array($g) ? count(array_filter($g, fn($x)=>is_string($x) && trim($x)!=='')) : 0;
                    $d = $e['downloads'] ?? [];
                    $dcount = is_array($d) ? count(array_filter($d, fn($x)=>is_string($x) && trim($x)!=='')) : 0;
                  ?>
                  <tr>
                    <td><?= $i + 1 ?></td>
                    <td>
                      <?php if (!empty($e['image'])): ?>
                        <img src="<?= htmlspecialchars($e['image']) ?>" alt=""
                             style="width:78px; height:48px; object-fit:cover; border-radius:10px; background:#fff;">
                      <?php else: ?>
                        <span class="text-muted small">No image</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <div class="fw-semibold"><?= htmlspecialchars($e['title'] ?? '') ?></div>
                      <div class="small text-muted"><?= htmlspecialchars($e['id'] ?? '') ?></div>
                    </td>
                    <td><?= htmlspecialchars($e['category'] ?? '') ?></td>
                    <td><?= htmlspecialchars($e['date'] ?? '') ?></td>
                    <td><?= htmlspecialchars($e['location'] ?? '') ?></td>
                    <td class="text-center">
                      <?php if ($gcount <= 0): ?><span class="pa-badge-none">0</span>
                      <?php else: ?><span class="pa-badge-ok"><?= $gcount ?></span><?php endif; ?>
                    </td>
                    <td class="text-center">
                      <?php if (empty($e['youtube'])): ?>
                        <span class="pa-badge-none">No</span>
                      <?php else: ?>
                        <span class="pa-badge-ok">Yes</span>
                      <?php endif; ?>
                    </td>
                    <td class="text-center">
                      <?php if ($dcount <= 0): ?><span class="pa-badge-none">0</span>
                      <?php else: ?><span class="pa-badge-ok"><?= $dcount ?></span><?php endif; ?>
                    </td>
                    
                    <td>
                      <div class="pa-actions">
                        <a class="btn btn-sm btn-outline-primary pa-btn" href="event-admin.php?edit=<?= urlencode($e['id']) ?>">Edit</a>
                        <a class="btn btn-sm btn-outline-secondary pa-btn" href="event-detail.php?id=<?= urlencode($e['id']) ?>" target="_blank">Preview</a>
                        <a class="btn btn-sm btn-outline-danger pa-btn"
                           href="event-admin.php?delete=<?= urlencode($e['id']) ?>"
                           onclick="return confirm('Delete this event? This will delete images, downloads and gallery folder.');">
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
<div class="modal fade" id="eventModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content pa-modal">
      <div class="modal-header">
        <h5 class="modal-title fw-bold"><?= $edit_event ? "Edit Event" : "Add New Event" ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" action="event-admin.php" enctype="multipart/form-data">
          <input type="hidden" name="action" value="save">
          <input type="hidden" name="editing_id" value="<?= htmlspecialchars($edit_event['id'] ?? '') ?>">
          <input type="hidden" name="existing_image" value="<?= htmlspecialchars($sticky_image) ?>">
          <input type="hidden" name="existing_banner" value="<?= htmlspecialchars($sticky_banner) ?>">

          <?php foreach ($sticky_gallery as $g): ?>
            <input type="hidden" name="existing_gallery[]" value="<?= htmlspecialchars($g) ?>">
          <?php endforeach; ?>

          <?php foreach ($sticky_downloads as $d): ?>
            <input type="hidden" name="existing_downloads[]" value="<?= htmlspecialchars($d) ?>">
          <?php endforeach; ?>

          <div class="row g-3">

            <div class="col-md-6">
              <label class="form-label fw-semibold">ID (unique)</label>
              <input type="text" name="id"
                     class="form-control <?= !empty($id_error) ? 'is-invalid' : '' ?>"
                     value="<?= htmlspecialchars($sticky_id) ?>"
                     <?= $edit_event ? 'readonly' : '' ?>
                     placeholder="example: cpd-workshop-2026"
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
                  $baseOptions = ["Upcoming Events","Special Events","Past Events"];
                  foreach ($baseOptions as $bo){
                    $sel = ($sticky_cat === $bo) ? 'selected' : '';
                    echo '<option value="'.htmlspecialchars($bo).'" '.$sel.'>'.htmlspecialchars($bo).'</option>';
                  }
                  foreach ($categories as $c){
                    if (in_array($c, $baseOptions, true)) continue;
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
              <input type="text" name="title" class="form-control"
                     value="<?= htmlspecialchars($sticky_title) ?>" required>
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Event Date</label>
              <input type="date" name="date" class="form-control" value="<?= htmlspecialchars($sticky_date) ?>">
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Location</label>
              <input type="text" name="location" class="form-control"
                     value="<?= htmlspecialchars($sticky_location) ?>" placeholder="Singapore / Online">
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Summary (listing)</label>
              <input type="text" name="summary" class="form-control"
                     value="<?= htmlspecialchars($sticky_summary) ?>">
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">YouTube Video Link (optional)</label>
              <input type="url" name="youtube" class="form-control"
                     value="<?= htmlspecialchars($sticky_youtube) ?>"
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
              <label class="form-label fw-semibold">About this event (one paragraph per line)</label>
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

            <!-- NEW: download button name -->
            <div class="col-12" id="downloadNameBlock">
              <label class="form-label fw-semibold">Download Button Name (optional)</label>
              <input type="text" name="download_button_name" class="form-control"
                     value="<?= htmlspecialchars($sticky_dl_btn) ?>"
                     placeholder="Example: Download Event Brochure">
              <div class="form-text">If empty, the button will show the filename.</div>
            </div>

            <div class="col-12" id="downloadsBlock">
              <label class="form-label fw-semibold">Upload Files</label>
              <input type="file" name="downloads[]" class="form-control" accept=".pdf,.doc,.docx" multiple>
              <div class="form-text">Files are stored in <code>images/events/&lt;event-id&gt;/downloads/</code></div>

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
              <label class="form-label fw-semibold d-block">Event Gallery</label>
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
              <div class="form-text">Stored in <code>images/events/&lt;event-id&gt;/gallery/</code></div>

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

  const shouldOpen = <?= json_encode((bool)$edit_event || (bool)$err || (bool)$id_error) ?>;
  if (shouldOpen) {
    const modalEl = document.getElementById("eventModal");
    if (modalEl) new bootstrap.Modal(modalEl).show();
  }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'footer.php'; ?>