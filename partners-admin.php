<?php
require_once __DIR__ . '/admin-auth.php';
require_once __DIR__ . '/events-data.php';

$AREA = "partners";

// logout_to support
if (isset($_GET['logout_to']) && $_GET['logout_to'] !== '') {
  $to = $_GET['logout_to'];
  $allow = ['partners.php','partner-detail.php','index.php'];
  if (!in_array($to, $allow, true)) $to = 'organisational-partnership.php';

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
    header("Location: partners-admin.php");
    exit;
  } else {
    $errAuth = "Wrong email or password. Please try again.";
  }
}

if (isset($_GET['logout']) && $_GET['logout'] === '1') {
  admin_logout($AREA);
  session_destroy();
  header("Location: partners-admin.php");
  exit;
}

if (!admin_is_authed($AREA)):
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Partners Admin Login</title>
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
        <h1 class="h4 fw-bold mb-1">Partners Admin</h1>
        <p class="text-muted mb-3">Login with admin email and password.</p>

        <?php if ($errAuth): ?>
          <div class="alert alert-danger py-2"><?= htmlspecialchars($errAuth) ?></div>
        <?php endif; ?>

        <form method="POST" action="partners-admin.php" autocomplete="off">
          <input type="hidden" name="auth_action" value="login">

          <label class="form-label fw-semibold">Admin Email</label>
          <input type="email" name="admin_email" class="form-control" placeholder="admin@siet.org.sg" required>

          <label class="form-label fw-semibold mt-3">Password</label>
          <input type="password" name="admin_pass" class="form-control" placeholder="Your password" required>

          <button class="btn btn-primary w-100 mt-3">Login</button>
          <a href="organisational-partnership.php" class="btn btn-success w-100 mt-3">View Our Partners</a>
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
endif;

/* After auth */
$active = 'organisational-partnership';
$page_css = ['organisational-partnership.css'];
include "header.php";

include "partners-data.php";

/* Paths */
$upload_dir = __DIR__ . "/images/partners/";
$upload_url = "images/partners/";

$gallery_root_dir = __DIR__ . "/images/partners/";
$gallery_root_url = "images/partners/";

if (!is_dir($upload_dir)) @mkdir($upload_dir, 0775, true);
if (!is_dir($gallery_root_dir)) @mkdir($gallery_root_dir, 0775, true);

/* Helpers */
function clean_id($s) {
  $s = trim($s);
  $s = strtolower($s);
  $s = preg_replace("/[^a-z0-9\-]+/", "-", $s);
  $s = preg_replace("/\-+/", "-", $s);
  return trim($s, "-");
}

function delete_partner_logo_file(string $logoPath, string $uploadDir, string $uploadUrl): void {
  $logoPath = trim($logoPath);
  if ($logoPath === '') return;

  if (strpos($logoPath, $uploadUrl) !== 0) return;

  $filename = basename($logoPath);
  $fullpath = rtrim($uploadDir, "/\\") . DIRECTORY_SEPARATOR . $filename;

  if (is_file($fullpath)) @unlink($fullpath);
}

function rrmdir($dir): void {
  if (!is_dir($dir)) return;
  $items = scandir($dir);
  foreach ($items as $item) {
    if ($item === '.' || $item === '..') continue;
    $path = $dir . DIRECTORY_SEPARATOR . $item;
    if (is_dir($path)) rrmdir($path);
    else @unlink($path);
  }
  @rmdir($dir);
}

function safe_gallery_dir(string $galleryRootDir, string $id): string {
  return rtrim($galleryRootDir, "/\\") . DIRECTORY_SEPARATOR . $id . DIRECTORY_SEPARATOR;
}
function safe_gallery_url(string $galleryRootUrl, string $id): string {
  return rtrim($galleryRootUrl, "/\\") . "/" . $id . "/";
}

/* NEW: gallery count badge for table */
function gallery_count_badge($partner){
  $g = $partner['gallery'] ?? [];
  $count = (is_array($g)) ? count(array_filter($g, fn($x)=>is_string($x) && trim($x)!=='')) : 0;

  if ($count <= 0){
    return '<span class="pa-gallery-none">0</span>';
  }
  return '<span class="pa-gallery-count">'.$count.'</span>';
}

/* Load state */
$partners = load_partners();

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$edit_id = $_GET['edit'] ?? '';
$delete_id = $_GET['delete'] ?? '';

$msg = '';
$err = '';
$id_error = '';

/* Delete partner (logo + gallery folder) */
if ($delete_id) {
  $toDelete = null;
  foreach ($partners as $p) {
    if (($p['id'] ?? '') === $delete_id) { $toDelete = $p; break; }
  }

  $partners = array_values(array_filter($partners, fn($p) => ($p['id'] ?? '') !== $delete_id));

  if (save_partners($partners)) {
    if ($toDelete && !empty($toDelete['logo'])) {
      delete_partner_logo_file($toDelete['logo'], $upload_dir, $upload_url);
    }

    $folder = safe_gallery_dir($gallery_root_dir, $delete_id);
    rrmdir($folder);

    $msg = "Partner deleted successfully.";
  } else {
    $err = "Failed to delete partner (cannot write JSON file).";
  }
}

/* Save partner */
if ($action === 'save') {
  $id = clean_id($_POST['id'] ?? '');
  $name = trim($_POST['name'] ?? '');
  $website = trim($_POST['website'] ?? '');
  $about = trim($_POST['about'] ?? '');
  $existing_logo = trim($_POST['existing_logo'] ?? '');
  $editing_id = trim($_POST['editing_id'] ?? '');

  $enable_gallery = !empty($_POST['enable_gallery']);

  $existing_gallery = $_POST['existing_gallery'] ?? [];
  if (!is_array($existing_gallery)) $existing_gallery = [];

  $remove_gallery = $_POST['remove_gallery'] ?? [];
  if (!is_array($remove_gallery)) $remove_gallery = [];

  if ($id === '' || $name === '') {
    $err = "ID and Name are required.";
  } else {

    $is_duplicate = false;
    foreach ($partners as $pp) {
      if (($pp['id'] ?? '') === $id) { $is_duplicate = true; break; }
    }

    if ($is_duplicate && $editing_id !== $id) {
      $id_error = "This ID is already used. Please choose another ID.";
      $err = "Duplicate ID.";
    } else {

      /* Logo upload */
      $logo_path = $existing_logo;

      if (!empty($_FILES['logo']['name']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $tmp = $_FILES['logo']['tmp_name'];
        $orig = $_FILES['logo']['name'];
        $ext = strtolower(pathinfo($orig, PATHINFO_EXTENSION));

        $allowed = ['png','jpg','jpeg','webp','svg'];
        if (!in_array($ext, $allowed, true)) {
          $err = "Logo file must be PNG/JPG/JPEG/WEBP/SVG.";
        } else {
          $safe_name = $id . "-" . time() . "." . $ext;
          $dest = $upload_dir . $safe_name;

          if (move_uploaded_file($tmp, $dest)) {
            if ($existing_logo && $existing_logo !== ($upload_url . $safe_name)) {
              delete_partner_logo_file($existing_logo, $upload_dir, $upload_url);
            }
            $logo_path = $upload_url . $safe_name;
          } else {
            $err = "Failed to upload logo.";
          }
        }
      }

      /* Gallery: keep existing except removed */
      $gallery_keep = [];
      foreach ($existing_gallery as $g) {
        $g = trim((string)$g);
        if ($g === '') continue;
        if (in_array($g, $remove_gallery, true)) continue;
        $gallery_keep[] = $g;
      }

      /* Physically delete removed gallery files */
      if (!empty($remove_gallery)) {
        $gdir = safe_gallery_dir($gallery_root_dir, $id);
        $gurl = safe_gallery_url($gallery_root_url, $id);

        foreach ($remove_gallery as $rg) {
          $rg = trim((string)$rg);
          if ($rg === '') continue;
          if (strpos($rg, $gurl) !== 0) continue;

          $file = basename($rg);
          $full = $gdir . $file;
          if (is_file($full)) @unlink($full);
        }
      }

      /* Gallery upload */
      $gallery_new = [];
      if ($err === '' && $enable_gallery && !empty($_FILES['gallery']) && is_array($_FILES['gallery']['name'])) {

        $selectedCount = 0;
        foreach ($_FILES['gallery']['name'] as $n) {
          if (trim((string)$n) !== '') $selectedCount++;
        }

        $count_existing = count($gallery_keep);
        $slots_left = max(0, 10 - $count_existing);

        if ($selectedCount > $slots_left) {
          $err = "Unsuccessful: You tried to upload {$selectedCount} image(s), but only {$slots_left} slot(s) are available. Maximum gallery images is 10. Please remove some existing images or upload fewer files.";
        } else {

          $gdir = safe_gallery_dir($gallery_root_dir, $id);
          $gurl = safe_gallery_url($gallery_root_url, $id);
          if (!is_dir($gdir)) @mkdir($gdir, 0775, true);

          $allowed_img = ['png','jpg','jpeg','webp'];

          $totalUploads = count($_FILES['gallery']['name']);
          for ($i = 0; $i < $totalUploads; $i++) {

            $n = trim((string)($_FILES['gallery']['name'][$i] ?? ''));
            if ($n === '') continue;

            if (($_FILES['gallery']['error'][$i] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) continue;

            $tmp = $_FILES['gallery']['tmp_name'][$i];
            $ext = strtolower(pathinfo($n, PATHINFO_EXTENSION));
            if (!in_array($ext, $allowed_img, true)) continue;

            $safe_name = $id . "-g-" . time() . "-" . $i . "." . $ext;
            $dest = $gdir . $safe_name;

            if (move_uploaded_file($tmp, $dest)) {
              $gallery_new[] = $gurl . $safe_name;
            }
          }
        }
      }

      $final_gallery = array_slice(array_merge($gallery_keep, $gallery_new), 0, 10);

      /* Save partner object */
      if ($err === '') {
        $found = false;

        foreach ($partners as &$p) {
          if (($p['id'] ?? '') === $id) {
            $p['name'] = $name;
            $p['website'] = $website;
            $p['about'] = $about;
            $p['logo'] = $logo_path;
            $p['gallery'] = $final_gallery;
            $found = true;
            break;
          }
        }
        unset($p);

        if (!$found) {
          $partners[] = [
            "id" => $id,
            "name" => $name,
            "logo" => $logo_path,
            "about" => $about,
            "website" => $website,
            "gallery" => $final_gallery
          ];
        }

        if (save_partners($partners)) {
          $msg = $found ? "Partner updated successfully." : "Partner added successfully.";
        } else {
          $err = "Failed to save. Check file permission for partners-data.json";
        }
      }
    }
  }
}

/* Load edit partner */
$edit_partner = null;
if ($edit_id) {
  foreach ($partners as $p) {
    if (($p['id'] ?? '') === $edit_id) { $edit_partner = $p; break; }
  }
}

/* Sticky values */
$sticky_id = $edit_partner['id'] ?? ($_POST['id'] ?? '');
$sticky_name = $edit_partner['name'] ?? ($_POST['name'] ?? '');
$sticky_website = $edit_partner['website'] ?? ($_POST['website'] ?? '');
$sticky_about = $edit_partner['about'] ?? ($_POST['about'] ?? '');
$sticky_logo = $edit_partner['logo'] ?? ($_POST['existing_logo'] ?? '');

$sticky_gallery = [];
if ($edit_partner && !empty($edit_partner['gallery']) && is_array($edit_partner['gallery'])) {
  $sticky_gallery = array_values(array_filter($edit_partner['gallery'], fn($x) => is_string($x) && trim($x) !== ''));
}

/* Default gallery toggle: if POST exists use it; else ON by default */
$toggle_checked = isset($_POST['enable_gallery']) ? !empty($_POST['enable_gallery']) : true;
?>

<main>

<section class="page-hero">
  <div class="container py-5">
    <div class="d-flex align-items-end justify-content-between flex-wrap gap-2">
      <div>
        <h1 class="mb-2 fw-bold">Partners Admin</h1>
        <p class="text-muted mb-0">Add, edit, and delete organisational partners.</p>
      </div>

      <div class="d-flex gap-2 flex-wrap">
        <a href="partners-admin.php?logout_to=organisational-partnership.php" class="btn btn-outline-secondary rounded-pill">
          View Partners Page
        </a>

        <button type="button" class="btn btn-primary rounded-pill"
                data-bs-toggle="modal" data-bs-target="#partnerModal">
          <?= $edit_partner ? "Edit Partner" : "Add Partner" ?>
        </button>
      </div>
    </div>
  </div>
</section>

<section class="section-pad pt-0">
  <div class="container">

    <?php if ($msg): ?>
      <div class="alert alert-success"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>
    <?php if ($err && $err !== "Duplicate ID."): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($err) ?></div>
    <?php endif; ?>

    <div class="card pa-card shadow-sm">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
          <h3 class="h6 fw-bold mb-0">Current Partners (<?= count($partners) ?>)</h3>
          <div class="text-muted small">Scroll appears only when needed.</div>
        </div>

        <?php if (count($partners) === 0): ?>
          <div class="text-muted">No partners yet. Add your first partner using the “Add Partner” button.</div>
        <?php else: ?>
          <div class="pa-scrollwrap">
            <table class="table table-hover align-middle mb-0 pa-table">
              <thead>
                <tr>
                  <th style="width:70px;">No</th>
                  <th style="width:120px;">Logo</th>
                  <th>Name</th>
                  <th>ID</th>
                  <th>Website Link</th>
                  <th style="width:130px; text-align:center;">Gallery</th>
                  <th style="width:420px; text-align:center;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($partners as $i => $p): ?>
                  <tr>
                    <td><?= $i + 1 ?></td>
                    <td>
                      <?php if (!empty($p['logo'])): ?>
                        <img src="<?= htmlspecialchars($p['logo']) ?>" alt=""
                             style="width:78px; height:48px; object-fit:contain; background:#fff;">
                      <?php else: ?>
                        <span class="text-muted small">No logo</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <div class="fw-semibold"><?= htmlspecialchars($p['name'] ?? '') ?></div>
                      <div class="small text-muted"><?= htmlspecialchars($p['id'] ?? '') ?></div>
                    </td>
                    <td><?= htmlspecialchars($p['id'] ?? '') ?></td>
                    <td>
                      <?php if (!empty($p['website'])): ?>
                        <a href="<?= htmlspecialchars($p['website']) ?>" target="_blank" class="text-decoration-none">
                          <?= htmlspecialchars($p['website']) ?>
                        </a>
                      <?php else: ?>
                        <span class="text-muted small">No website</span>
                      <?php endif; ?>
                    </td>
                    <td class="text-center">
                      <?= gallery_count_badge($p); ?>
                    </td>
                    <td>
                      <div class="pa-actions">
                        <a class="btn btn-sm btn-outline-primary pa-btn" href="partners-admin.php?edit=<?= urlencode($p['id']) ?>">Edit</a>
                        <a class="btn btn-sm btn-outline-secondary pa-btn" href="partner-detail.php?id=<?= urlencode($p['id']) ?>" target="_blank">Preview</a>
                        <a class="btn btn-sm btn-outline-danger pa-btn"
                           href="partners-admin.php?delete=<?= urlencode($p['id']) ?>"
                           onclick="return confirm('Delete this partner? This will delete logo and gallery folder.');">
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
</section>
<br>
<!-- MODAL: Add / Edit Partner (DESIGN ONLY – same form logic) -->
<div class="modal fade" id="partnerModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content pa-modal">
      <div class="modal-header">
        <h5 class="modal-title fw-bold"><?= $edit_partner ? "Edit Partner" : "Add New Partner" ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" action="partners-admin.php" enctype="multipart/form-data">
          <input type="hidden" name="action" value="save">
          <input type="hidden" name="existing_logo" value="<?= htmlspecialchars($sticky_logo) ?>">
          <input type="hidden" name="editing_id" value="<?= htmlspecialchars($edit_partner['id'] ?? '') ?>">

          <?php if (!empty($sticky_gallery)): ?>
            <?php foreach ($sticky_gallery as $g): ?>
              <input type="hidden" name="existing_gallery[]" value="<?= htmlspecialchars($g) ?>">
            <?php endforeach; ?>
          <?php endif; ?>

          <div class="row g-3">

            <div class="col-md-6">
              <label class="form-label fw-semibold">ID (unique)</label>
              <input
                type="text"
                name="id"
                class="form-control <?= !empty($id_error) ? 'is-invalid' : '' ?>"
                value="<?= htmlspecialchars($sticky_id) ?>"
                placeholder="example: engineers-australia"
                <?= $edit_partner ? "readonly" : "" ?>
                required>
              <?php if(!empty($id_error)): ?>
                <div class="invalid-feedback d-block"><?= htmlspecialchars($id_error) ?></div>
              <?php else: ?>
                <div class="form-text">
                  Use lowercase letters/numbers/hyphen only.
                </div>
              <?php endif; ?>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Name</label>
              <input type="text" name="name" class="form-control"
                     value="<?= htmlspecialchars($sticky_name) ?>"
                     placeholder="Company / Organisation name" required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Website (optional)</label>
              <input type="url" name="website" class="form-control"
                     value="<?= htmlspecialchars($sticky_website) ?>"
                     placeholder="https://example.com">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Logo (upload)</label>
              <input type="file" name="logo" class="form-control" accept=".png,.jpg,.jpeg,.webp,.svg">
              <div class="form-text">If you don’t upload, it will keep current logo.</div>
              <?php if (!empty($sticky_logo)): ?>
                <div class="mt-2">
                  <div class="small text-muted mb-1">Current Logo:</div>
                  <img src="<?= htmlspecialchars($sticky_logo) ?>" alt="logo"
                       style="max-width:180px; max-height:70px; object-fit:contain;">
                </div>
              <?php endif; ?>
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">About (Detail Information)</label>
              <textarea name="about" rows="5" class="form-control"
                        placeholder="Write partner description..."><?= htmlspecialchars($sticky_about) ?></textarea>
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold d-block">Gallery Upload</label>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch"
                       id="enableGalleryUpload" name="enable_gallery" value="1"
                       <?= $toggle_checked ? 'checked' : '' ?>>
                <label class="form-check-label" for="enableGalleryUpload">Enable gallery image upload</label>
              </div>
            </div>

            <div class="col-12" id="galleryUploadBlock">
              <label class="form-label fw-semibold">Gallery Images (max 10)</label>
              <input type="file" name="gallery[]" class="form-control" accept=".png,.jpg,.jpeg,.webp" multiple>
              <div class="form-text">You can upload multiple images. Total gallery images allowed: 10.</div>

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
                          <input class="form-check-input" type="checkbox" name="remove_gallery[]" value="<?= htmlspecialchars($g) ?>" id="rm_<?= md5($g) ?>">
                          <label class="form-check-label small" for="rm_<?= md5($g) ?>">Remove</label>
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
/* Card */
.pa-card{
  border-radius: 18px;
  border: 1px solid rgba(0,0,0,.08);
  box-shadow: 0 12px 30px rgba(0,0,0,.06);
}

/* Scroll wrapper: show scrollbars only when needed */
.pa-scrollwrap{
  max-height: 560px;
  overflow: auto;
  border-radius: 14px;
  border: 1px solid rgba(0,0,0,.06);
  position: relative;
}

/* Table width to enable horizontal scroll */
.pa-table{
  min-width: 1150px;
  border-collapse: separate;
  border-spacing: 0;
}

/* Sticky header */
.pa-table thead th{
  position: sticky;
  top: 0;
  background: #fff;
  z-index: 6;
  border-bottom: 1px solid rgba(0,0,0,.10);
  white-space: nowrap;
}

/* Sticky "No" column ONLY */
.pa-table thead th:nth-child(1),
.pa-table tbody td:nth-child(1){
  position: sticky;
  left: 0;
  z-index: 7;
  background: #fff;
  box-shadow: 1px 0 0 rgba(0,0,0,.08);
}
.pa-table thead th:nth-child(1){ z-index: 8; }

/* Gallery count badges */
.pa-gallery-count{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  min-width: 40px;
  padding: 6px 12px;
  border-radius: 999px;
  font-weight: 900;
  font-size: .9rem;
  background: rgba(13,110,253,.12);
  border: 1px solid rgba(13,110,253,.22);
  color: #0d6efd;
}
.pa-gallery-none{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  min-width: 40px;
  padding: 6px 12px;
  border-radius: 999px;
  font-weight: 900;
  font-size: .9rem;
  background: rgba(220,53,69,.12);
  border: 1px solid rgba(220,53,69,.22);
  color: #dc3545;
}

/* Actions equal + bigger */
.pa-actions{
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
  justify-content: end;
  max-width: 420px;
  margin-left: auto;
}
.pa-btn{
  width: 100%;
  text-align: center;
  font-weight: 800;
  padding: .45rem .9rem;
  font-size: .95rem;
  border-radius: 999px;
  white-space: nowrap;
}

/* Nicer scrollbars */
.pa-scrollwrap::-webkit-scrollbar{ height: 10px; width: 10px; }
.pa-scrollwrap::-webkit-scrollbar-track{ background: rgba(0,0,0,.06); border-radius: 999px; }
.pa-scrollwrap::-webkit-scrollbar-thumb{ background: rgba(13,110,253,.28); border-radius: 999px; }
.pa-scrollwrap::-webkit-scrollbar-thumb:hover{ background: rgba(13,110,253,.40); }

/* Modal styling */
.pa-modal{
  border-radius: 18px;
  overflow: hidden;
}
.modal-header{
  background: linear-gradient(180deg, rgba(13,110,253,.10), rgba(255,255,255,0));
}

/* Mobile: stack action buttons */
@media (max-width: 575.98px){
  .pa-actions{
    grid-template-columns: 1fr;
    max-width: none;
  }
}

/* form-text css */
.form-text{ color: green; }
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const toggle = document.getElementById("enableGalleryUpload");
  const block = document.getElementById("galleryUploadBlock");

  function sync() {
    if (!toggle || !block) return;
    const enabled = toggle.checked;
    block.style.opacity = enabled ? "1" : ".55";
    block.querySelectorAll("input,select,textarea,button").forEach(el => {
      el.disabled = !enabled;
    });
  }

  if (toggle) toggle.addEventListener("change", sync);
  sync();

  // Auto open modal when editing OR when there is validation error
  const shouldOpen = <?= json_encode((bool)$edit_partner || (bool)$err || (bool)$id_error) ?>;
  if (shouldOpen) {
    const modalEl = document.getElementById("partnerModal");
    if (modalEl) {
      const modal = new bootstrap.Modal(modalEl);
      modal.show();
    }
  }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include "footer.php"; ?>