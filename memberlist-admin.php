<?php

session_start();

define('ADMIN_PASS', '123456'); // change to your 6-digit password

/* Logout + redirect helper (auto logout when leaving admin) */
if (isset($_GET['logout_to']) && $_GET['logout_to'] !== '') {
  $to = $_GET['logout_to'];

  $allow = ['view-memberlist.php', 'index.php'];
  if (!in_array($to, $allow, true)) $to = 'view-memberlist.php';

  unset($_SESSION['memberlist_admin_authed']);
  session_destroy();

  header("Location: " . $to);
  exit;
}

/* Login handler */
$errAuth = '';
if (isset($_POST['auth_action']) && $_POST['auth_action'] === 'login') {
  $pass = trim($_POST['admin_pass'] ?? '');
  if ($pass === ADMIN_PASS) {
    $_SESSION['memberlist_admin_authed'] = true;
    header("Location: memberlist-admin.php");
    exit;
  } else {
    $errAuth = "Wrong password. Please try again.";
  }
}

/* Logout */
if (isset($_GET['logout']) && $_GET['logout'] === '1') {
  unset($_SESSION['memberlist_admin_authed']);
  session_destroy();
  header("Location: memberlist-admin.php");
  exit;
}

/* Guard */
$authed = !empty($_SESSION['memberlist_admin_authed']);
if (!$authed):
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Member List Admin Login</title>
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
        <h1 class="h4 fw-bold mb-1">Member List Admin</h1>
        <p class="text-muted mb-3">Enter 6-digit password to continue.</p>

        <?php if ($errAuth): ?>
          <div class="alert alert-danger py-2"><?= htmlspecialchars($errAuth) ?></div>
        <?php endif; ?>

        <form method="POST" action="memberlist-admin.php" autocomplete="off">
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
          <button class="btn btn-success w-100 mt-3">View Membership List</button>
        </form>
      </div>
    </div>
  </main>
</body>
</html>
<?php
  exit;
endif;

/* ===== after auth, load your normal page ===== */

$active = 'members';
$page_css = ['sections.css'];
include "header.php";

include "members-data.php";

$members = load_members();

$msg = '';
$err = '';
$id_error = '';

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$edit_id = $_GET['edit'] ?? '';
$delete_id = $_GET['delete'] ?? '';

/* Delete */
if ($delete_id) {
  $members = array_values(array_filter($members, fn($m) => ($m['id'] ?? '') !== $delete_id));
  if (save_members($members)) $msg = "Member deleted successfully.";
  else $err = "Failed to delete (check members-data.json permission).";
}

/* Save (Add/Update) */
if ($action === 'save') {
  $id = clean_member_id($_POST['id'] ?? '');
  $editing_id = trim($_POST['editing_id'] ?? '');

  $status = trim($_POST['membership_status'] ?? '');
  if (!in_array($status, ['Paid', 'Overdue', ''], true)) $status = '';

  $data = [
    'id' => $id,
    'name' => trim($_POST['name'] ?? ''),
    'membership_no' => trim($_POST['membership_no'] ?? ''),
    'membership_grade' => trim($_POST['membership_grade'] ?? ''),
    'membership_title' => trim($_POST['membership_title'] ?? ''),
    'branch' => trim($_POST['branch'] ?? ''),
    'areas' => trim($_POST['areas'] ?? ''),
    'certified_grade' => trim($_POST['certified_grade'] ?? ''),
    'membership_status' => $status, // NEW
  ];

  if ($id === '') {
    $id_error = "ID is required.";
    $err = "Please fix the highlighted fields.";
  } else {
    $dup = false;
    foreach ($members as $m) {
      if (($m['id'] ?? '') === $id) { $dup = true; break; }
    }
    if ($dup && $editing_id !== $id) {
      $id_error = "This ID is already used. Please choose another ID.";
      $err = "Please fix the highlighted fields.";
    }
  }

  if ($err === '') {
    if ($data['name'] === '' || $data['membership_no'] === '') {
      $err = "Name and Membership No are required.";
    } else {
      $found = false;
      foreach ($members as &$m) {
        if (($m['id'] ?? '') === $id) {
          $m = array_merge($m, $data);
          $found = true;
          break;
        }
      }
      unset($m);

      if (!$found) $members[] = $data;

      if (save_members($members)) $msg = $found ? "Member updated successfully." : "Member added successfully.";
      else $err = "Failed to save (check members-data.json permission).";
    }
  }
}

/* Load edit member */
$edit_member = null;
if ($edit_id) {
  foreach ($members as $m) {
    if (($m['id'] ?? '') === $edit_id) { $edit_member = $m; break; }
  }
}

/* Sticky values */
$sticky_id = $edit_member['id'] ?? ($_POST['id'] ?? '');
$sticky_name = $edit_member['name'] ?? ($_POST['name'] ?? '');
$sticky_no = $edit_member['membership_no'] ?? ($_POST['membership_no'] ?? '');
$sticky_grade = $edit_member['membership_grade'] ?? ($_POST['membership_grade'] ?? '');
$sticky_title = $edit_member['membership_title'] ?? ($_POST['membership_title'] ?? '');
$sticky_branch = $edit_member['branch'] ?? ($_POST['branch'] ?? '');
$sticky_areas = $edit_member['areas'] ?? ($_POST['areas'] ?? '');
$sticky_cert = $edit_member['certified_grade'] ?? ($_POST['certified_grade'] ?? '');
$sticky_status = $edit_member['membership_status'] ?? ($_POST['membership_status'] ?? '');
?>

<main>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Member List Admin</h1>
    <p class="text-muted mb-0">Add, edit, and delete SIET member records.</p>
  </div>
</section>
<br>
<section class="section-pad">
  <div class="container">

    <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-3">
      <div>
        <h2 class="h5 fw-bold mb-1"><?= $edit_member ? "Edit Member" : "Add New Member" ?></h2>
        <div class="text-muted small">Data saved in members-data.json</div>
      </div>

      <div class="d-flex gap-2 flex-wrap">
        <a href="memberlist-admin.php?logout_to=view-memberlist.php" class="btn btn-outline-secondary btn-sm rounded-pill">
          View Members Page
        </a>
        <!-- <a href="memberlist-admin.php?logout=1" class="btn btn-outline-danger btn-sm rounded-pill">
          Logout
        </a> -->
      </div>
    </div>

    <?php if ($msg): ?>
      <div class="alert alert-success"><?= h($msg) ?></div>
    <?php endif; ?>
    <?php if ($err): ?>
      <div class="alert alert-danger"><?= h($err) ?></div>
    <?php endif; ?>

    <div class="row g-4">
      <!-- FORM -->
      <div class="col-lg-5">
        <div class="card shadow-sm" style="border-radius:16px;">
          <div class="card-body">
            <form method="POST" action="memberlist-admin.php">
              <input type="hidden" name="action" value="save">
              <input type="hidden" name="editing_id" value="<?= h($edit_member['id'] ?? '') ?>">

              <div class="mb-3">
                <label class="form-label fw-semibold">ID (unique)</label>
                <input
                  type="text"
                  name="id"
                  class="form-control <?= $id_error ? 'is-invalid' : '' ?>"
                  value="<?= h($sticky_id) ?>"
                  placeholder="example: chit-phone"
                  <?= $edit_member ? 'readonly' : '' ?>
                  required>
                <?php if ($id_error): ?>
                  <div class="invalid-feedback d-block"><?= h($id_error) ?></div>
                <?php else: ?>
                  <div class="form-text">Use lowercase letters/numbers/hyphen only.<span style="color: red;">(Recommond: Use Membership No)</span></div>
                <?php endif; ?>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Name</label>
                <input type="text" name="name" class="form-control" value="<?= h($sticky_name) ?>" required>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Membership No</label>
                <input type="text" name="membership_no" class="form-control" value="<?= h($sticky_no) ?>" required>
              </div>

              <!-- NEW: Membership Status -->
              <div class="mb-3">
                <label class="form-label fw-semibold">Membership Status</label>
                <select name="membership_status" class="form-select">
                  <option value="" <?= $sticky_status==='' ? 'selected' : '' ?>>Select Membership Status</option>
                  <option value="Paid" <?= $sticky_status==='Paid' ? 'selected' : '' ?>>Paid</option>
                  <option value="Overdue" <?= $sticky_status==='Overdue' ? 'selected' : '' ?>>Overdue</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Membership Grade</label>
                <input type="text" name="membership_grade" class="form-control" value="<?= h($sticky_grade) ?>">
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Membership Title</label>
                <input type="text" name="membership_title" class="form-control" value="<?= h($sticky_title) ?>">
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Branch of Engineering</label>
                <input type="text" name="branch" class="form-control" value="<?= h($sticky_branch) ?>">
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Areas of Certification</label>
                <input type="text" name="areas" class="form-control" value="<?= h($sticky_areas) ?>">
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Certified Grade</label>
                <input type="text" name="certified_grade" class="form-control" value="<?= h($sticky_cert) ?>">
              </div>

              <div class="d-flex gap-2">
                <button class="btn btn-primary rounded-pill">Save</button>
                <a class="btn btn-outline-secondary rounded-pill" href="memberlist-admin.php">Clear</a>
              </div>

            </form>
          </div>
        </div>
      </div>

      <!-- LIST -->
      <div class="col-lg-7">
        <div class="card shadow-sm" style="border-radius:16px;">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
              <h3 class="h6 fw-bold mb-0">Members List (<?= count($members) ?>)</h3>
            </div>

            <div class="table-responsive">
              <table class="table table-hover align-middle">
                <thead>
                  <tr>
                    <th style="width:60px;">No</th>
                    <th>Name</th>
                    <th>Membership No</th>
                    <th>Status</th>
                    <th style="width:190px;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php if (count($members) === 0): ?>
                  <tr><td colspan="5" class="text-muted">No members yet.</td></tr>
                <?php else: ?>
                  <?php foreach($members as $i => $m): ?>
                    <tr>
                      <td><?= $i + 1 ?></td>
                      <td class="fw-semibold"><?= h($m['name'] ?? '') ?></td>
                      <td><?= h($m['membership_no'] ?? '') ?></td>
                      <td><?= h($m['membership_status'] ?? '') ?></td>
                      <td class="d-flex gap-2 flex-wrap">
                        <a class="btn btn-sm btn-outline-primary" href="memberlist-admin.php?edit=<?= urlencode($m['id']) ?>">Edit</a>
                        <a class="btn btn-sm btn-outline-secondary" href="view-memberlist.php?view=<?= urlencode($m['id']) ?>" target="_blank">View</a>
                        <a class="btn btn-sm btn-outline-danger"
                           href="memberlist-admin.php?delete=<?= urlencode($m['id']) ?>"
                           onclick="return confirm('Delete this member?');">
                           Delete
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<br>
</main>

<?php include "footer.php"; ?>