<?php

session_start();

define('ADMIN_PASS', '123456'); // ✅ CHANGE THIS to your 6-digit password

// ==========================
// Logout + redirect helper 
// ==========================
if (isset($_GET['logout_to']) && $_GET['logout_to'] !== '') {
  $to = $_GET['logout_to'];

  // allow only safe local redirects
  $allow = ['organisational-partnership.php', 'partner-detail.php', 'index.php'];
  if (!in_array($to, $allow, true)) $to = 'organisational-partnership.php';

  unset($_SESSION['partners_admin_authed']);
  session_destroy();

  header("Location: " . $to);
  exit;
}

// ==========================
// LOGIN / LOGOUT HANDLER
// ==========================
$errAuth = '';

if (isset($_POST['auth_action']) && $_POST['auth_action'] === 'login') {
  $pass = trim($_POST['admin_pass'] ?? '');
  if ($pass === ADMIN_PASS) {
    $_SESSION['partners_admin_authed'] = true;
    header("Location: partners-admin.php");
    exit;
  } else {
    $errAuth = "Wrong password. Please try again.";
  }
}

if (isset($_GET['logout']) && $_GET['logout'] === '1') {
  unset($_SESSION['partners_admin_authed']);
  session_destroy();
  header("Location: partners-admin.php");
  exit;
}

// ==========================
// GUARD: REQUIRE LOGIN
// ==========================
$authed = !empty($_SESSION['partners_admin_authed']);

if (!$authed):
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
    .login-card{
      max-width: 420px;
      border-radius: 18px;
      box-shadow: 0 18px 45px rgba(0,0,0,.10);
      border: 1px solid rgba(0,0,0,.08);
    }
    .pin{
      letter-spacing: .35em;
      text-align: center;
      font-weight: 800;
      font-size: 1.25rem;
    }
  </style>
</head>
<body>
  <main class="min-vh-100 d-flex align-items-center justify-content-center p-3">
    <div class="card login-card w-100">
      <div class="card-body p-4">
        <h1 class="h4 fw-bold mb-1">Partners Admin</h1>
        <p class="text-muted mb-3">Enter 6-digit password to continue.</p>

        <?php if ($errAuth): ?>
          <div class="alert alert-danger py-2"><?= htmlspecialchars($errAuth) ?></div>
        <?php endif; ?>

        <form method="POST" action="partners-admin.php" autocomplete="off">
          <input type="hidden" name="auth_action" value="login">

          <label class="form-label fw-semibold">6-digit Password</label>
          <input
            type="password"
            name="admin_pass"
            inputmode="numeric"
            pattern="[0-9]{6}"
            maxlength="6"
            class="form-control pin"
            placeholder="••••••"
            required>
            
          <button class="btn btn-primary w-100 mt-3">Login</button>
          <button class="btn btn-success w-100 mt-3" onclick="window.location.href='organisational-partnership.php'">Organisational Partnership</button>
        </form>

        <div class="small text-muted mt-3">
          <!-- Tip: change the password in <code>ADMIN_PASS</code> inside <code>partners-admin.php</code>. -->
        </div>
      </div>
    </div>
  </main>
</body>
</html>
<?php
  exit;
endif;

// ==========================
//  AUTH PASSED (ADMIN PAGE)
// ==========================
$active = 'organisational-partnership';
$page_css = ['organisational-partnership.css']; // optional
include "header.php";

include "partners-data.php";

//  folder to store uploaded logos
$upload_dir = __DIR__ . "/images/partners/";
$upload_url = "images/partners/";

if (!is_dir($upload_dir)) {
  @mkdir($upload_dir, 0775, true);
}

// ==========================
// Helpers
// ==========================
function clean_id($s) {
  $s = trim($s);
  $s = strtolower($s);
  $s = preg_replace("/[^a-z0-9\-]+/", "-", $s);
  $s = preg_replace("/\-+/", "-", $s);
  return trim($s, "-");
}

/**
 * Delete a logo file ONLY if it lives in images/partners/
 */
function delete_partner_logo_file(string $logoPath, string $uploadDir, string $uploadUrl): void {
  $logoPath = trim($logoPath);
  if ($logoPath === '') return;

  if (strpos($logoPath, $uploadUrl) !== 0) return;

  $filename = basename($logoPath);
  $fullpath = rtrim($uploadDir, "/\\") . DIRECTORY_SEPARATOR . $filename;

  if (is_file($fullpath)) {
    @unlink($fullpath);
  }
}

// ==========================
// Load state
// ==========================
$partners = load_partners();
$action = $_POST['action'] ?? $_GET['action'] ?? '';
$edit_id = $_GET['edit'] ?? '';
$delete_id = $_GET['delete'] ?? '';

$msg = '';
$err = '';

// ==========================
//  DELETE (also remove logo file)
// ==========================
if ($delete_id) {

  // find partner first (for its logo)
  $toDelete = null;
  foreach ($partners as $p) {
    if (($p['id'] ?? '') === $delete_id) { $toDelete = $p; break; }
  }

  // remove from list
  $partners = array_values(array_filter($partners, fn($p) => ($p['id'] ?? '') !== $delete_id));

  // save then delete file (safer)
  if (save_partners($partners)) {
    if ($toDelete && !empty($toDelete['logo'])) {
      delete_partner_logo_file($toDelete['logo'], $upload_dir, $upload_url);
    }
    $msg = "Partner deleted successfully (logo file removed).";
  } else {
    $err = "Failed to delete partner (cannot write JSON file).";
  }
}

// ==========================
//  ADD / UPDATE
// ==========================
if ($action === 'save') {
  $id = clean_id($_POST['id'] ?? '');
  $name = trim($_POST['name'] ?? '');
  $website = trim($_POST['website'] ?? '');
  $about = trim($_POST['about'] ?? '');
  $existing_logo = trim($_POST['existing_logo'] ?? '');

  if ($id === '' || $name === '') {
    $err = "ID and Name are required.";
  } else {

    $logo_path = $existing_logo;

    // handle logo upload (optional)
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

          //  delete old logo file if it was in images/partners/
          if ($existing_logo && $existing_logo !== ($upload_url . $safe_name)) {
            delete_partner_logo_file($existing_logo, $upload_dir, $upload_url);
          }

          $logo_path = $upload_url . $safe_name;
        } else {
          $err = "Failed to upload logo.";
        }
      }
    }

    if ($err === '') {
      // update if exists, else add new
      $found = false;
      foreach ($partners as &$p) {
        if (($p['id'] ?? '') === $id) {
          $p['name'] = $name;
          $p['website'] = $website;
          $p['about'] = $about;
          $p['logo'] = $logo_path;
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
          "website" => $website
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

// ==========================
// Load edit partner
// ==========================
$edit_partner = null;
if ($edit_id) {
  foreach ($partners as $p) {
    if (($p['id'] ?? '') === $edit_id) { $edit_partner = $p; break; }
  }
}
?>

<main class="py-4">
  <div class="container">

    <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
      <div>
        <h1 class="fw-bold mb-1">Partners Admin</h1>
        <p class="text-muted mb-0">Add / edit / delete organisational partners (no database).</p>
      </div>

      <div class="d-flex gap-2 flex-wrap">
        <!--  Auto logout then go partners page -->
        <a href="partners-admin.php?logout_to=organisational-partnership.php"
           class="btn btn-outline-secondary btn-sm rounded-pill">
          View Partners Page
        </a>

        <a href="partners-admin.php?logout=1" class="btn btn-outline-danger btn-sm rounded-pill">
          Logout
        </a>
      </div>
    </div>

    <?php if ($msg): ?>
      <div class="alert alert-success"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>
    <?php if ($err): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($err) ?></div>
    <?php endif; ?>

    <div class="row g-4">
      <!-- FORM -->
      <div class="col-lg-5">
        <div class="card shadow-sm" style="border-radius:16px;">
          <div class="card-body">
            <h5 class="fw-bold mb-3"><?= $edit_partner ? "Edit Partner" : "Add New Partner" ?></h5>

            <form method="POST" action="partners-admin.php" enctype="multipart/form-data">
              <input type="hidden" name="action" value="save">
              <input type="hidden" name="existing_logo" value="<?= htmlspecialchars($edit_partner['logo'] ?? '') ?>">

              <div class="mb-3">
                <label class="form-label fw-semibold">ID (unique)</label>
                <input
                  type="text"
                  name="id"
                  class="form-control"
                  value="<?= htmlspecialchars($edit_partner['id'] ?? '') ?>"
                  placeholder="example: engineers-australia"
                  <?= $edit_partner ? "readonly" : "" ?>
                  required>
                <div class="form-text">Use lowercase letters/numbers/hyphen only.</div>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Name</label>
                <input type="text" name="name" class="form-control"
                  value="<?= htmlspecialchars($edit_partner['name'] ?? '') ?>"
                  placeholder="Company / Organisation name" required>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Website (optional)</label>
                <input type="url" name="website" class="form-control"
                  value="<?= htmlspecialchars($edit_partner['website'] ?? '') ?>"
                  placeholder="https://example.com">
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">About (Detail Information)</label>
                <textarea name="about" rows="5" class="form-control"
                  placeholder="Write partner description..."><?= htmlspecialchars($edit_partner['about'] ?? '') ?></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Logo (upload)</label>
                <input type="file" name="logo" class="form-control" accept=".png,.jpg,.jpeg,.webp,.svg">
                <div class="form-text">If you don’t upload, it will keep current logo.</div>
              </div>

              <?php if (!empty($edit_partner['logo'])): ?>
                <div class="mb-3">
                  <div class="small text-muted mb-1">Current Logo:</div>
                  <img src="<?= htmlspecialchars($edit_partner['logo']) ?>" alt="logo"
                       style="max-width:180px; max-height:70px; object-fit:contain;">
                </div>
              <?php endif; ?>

              <div class="d-flex gap-2">
                <button class="btn btn-primary">Save</button>
                <a class="btn btn-outline-secondary" href="partners-admin.php">Clear</a>
              </div>
            </form>

          </div>
        </div>
      </div>

      <!-- LIST -->
      <div class="col-lg-7">
        <div class="card shadow-sm" style="border-radius:16px;">
          <div class="card-body">
            <h5 class="fw-bold mb-3">Current Partners (<?= count($partners) ?>)</h5>

            <?php if (count($partners) === 0): ?>
              <div class="text-muted">No partners yet. Add your first partner using the form.</div>
            <?php else: ?>
              <div class="table-responsive">
                <table class="table align-middle">
                  <thead>
                    <tr>
                      <th style="width:90px;">Logo</th>
                      <th>Name</th>
                      <th style="width:220px;">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($partners as $p): ?>
                      <tr>
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
                        <td class="d-flex gap-2 flex-wrap">
                          <a class="btn btn-sm btn-outline-primary" href="partners-admin.php?edit=<?= urlencode($p['id']) ?>">Edit</a>
                          <a class="btn btn-sm btn-outline-secondary" href="partner-detail.php?id=<?= urlencode($p['id']) ?>" target="_blank">Preview</a>

                          <a class="btn btn-sm btn-outline-danger"
                             href="partners-admin.php?delete=<?= urlencode($p['id']) ?>"
                             onclick="return confirm('Delete this partner? This will also delete its logo file.');">
                             Delete
                          </a>
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

    </div>

  </div>
</main>

<?php include "footer.php"; ?>