<?php
require_once __DIR__ . '/admin-auth.php';
require_once __DIR__ . '/events-data.php';

$AREA = "memberlist";

// logout_to support
if (isset($_GET['logout_to']) && $_GET['logout_to'] !== '') {
  $to = $_GET['logout_to'];
  $allow = ['view-memberlist.php','index.php'];
  if (!in_array($to, $allow, true)) $to = 'view-memberlist.php';

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
    header("Location: memberlist-admin.php");
    exit;
  } else {
    $errAuth = "Wrong email or password. Please try again.";
  }
}

if (isset($_GET['logout']) && $_GET['logout'] === '1') {
  admin_logout($AREA);
  session_destroy();
  header("Location: memberlist-admin.php");
  exit;
}

if (!admin_is_authed($AREA)):
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Memberlist Admin Login</title>
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
        <h1 class="h4 fw-bold mb-1">Memberlist Admin</h1>
        <p class="text-muted mb-3">Login with admin email and password.</p>

        <?php if ($errAuth): ?>
          <div class="alert alert-danger py-2"><?= htmlspecialchars($errAuth) ?></div>
        <?php endif; ?>

        <form method="POST" action="memberlist-admin.php" autocomplete="off">
          <input type="hidden" name="auth_action" value="login">

          <label class="form-label fw-semibold">Admin Email</label>
          <input type="email" name="admin_email" class="form-control" placeholder="admin@siet.org.sg" required>

          <label class="form-label fw-semibold mt-3">Password</label>
          <input type="password" name="admin_pass" class="form-control" placeholder="Your password" required>

          <button class="btn btn-primary w-100 mt-3">Login</button>
          <a href="view-memberlist.php" class="btn btn-success w-100 mt-3">View Memberlist</a>
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

$active = 'members';
$page_css = ['sections.css'];
include "header.php";

include "members-data.php";
$members = load_members();

$cert_status_options = [
  '',
  'Certified',
  'In Progress',
  'Pending Review',
  'Expired',
  'Renewal Due',
  'Suspended/Withdrawn'
];

$msg = '';
$err = '';
$id_error = '';

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$edit_id = $_GET['edit'] ?? '';
$delete_id = $_GET['delete'] ?? '';

/* Helpers */
function status_badge_admin($status){
  $s = trim((string)$status);
  if ($s === 'Paid') return '<span class="ms-badge ms-paid">Paid</span>';
  if ($s === 'Overdue') return '<span class="ms-badge ms-overdue">Overdue</span>';
  return '<span class="ms-badge ms-unknown">N/A</span>';
}
function cert_status_badge_admin($status){
  $s = trim((string)$status);
  if ($s === '') return '<span class="cs-badge cs-unknown">N/A</span>';
  $map = [
    'Certified' => 'cs-ok',
    'In Progress' => 'cs-prog',
    'Pending Review' => 'cs-pend',
    'Expired' => 'cs-exp',
    'Renewal Due' => 'cs-due',
    'Suspended/Withdrawn' => 'cs-stop',
  ];
  $cls = $map[$s] ?? 'cs-unknown';
  return '<span class="cs-badge '.$cls.'">'.h($s).'</span>';
}

/* Delete */
if ($delete_id) {
  $members = array_values(array_filter($members, fn($m) => ($m['id'] ?? '') !== $delete_id));
  if (save_members($members)) $msg = "Member deleted successfully.";
  else $err = "Failed to delete (check members-data.json permission).";
}

/* Save */
if ($action === 'save') {
  $id = clean_member_id($_POST['id'] ?? '');
  $editing_id = trim($_POST['editing_id'] ?? '');

  $status = trim($_POST['membership_status'] ?? '');
  if (!in_array($status, ['Paid', 'Overdue', ''], true)) $status = '';

  $cert_status = trim($_POST['certification_status'] ?? '');
  if (!in_array($cert_status, $cert_status_options, true)) $cert_status = '';

  $data = [
    'id' => $id,
    'name' => trim($_POST['name'] ?? ''),
    'post_nominal' => trim($_POST['post_nominal'] ?? ''),
    'membership_no' => trim($_POST['membership_no'] ?? ''),
    'certification_no' => trim($_POST['certification_no'] ?? ''),
    'membership_grade' => trim($_POST['membership_grade'] ?? ''),
    'certified_grade' => trim($_POST['certified_grade'] ?? ''),
    'membership_title' => trim($_POST['membership_title'] ?? ''),
    'branch' => trim($_POST['branch'] ?? ''),
    'areas' => trim($_POST['areas'] ?? ''),
    'membership_status' => $status,
    'certification_status' => $cert_status,
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
      $err = "Name and Member No are required.";
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

/* Load edit */
$edit_member = null;
if ($edit_id) {
  foreach ($members as $m) {
    if (($m['id'] ?? '') === $edit_id) { $edit_member = $m; break; }
  }
}

/* Sticky values */
$sticky_id = $edit_member['id'] ?? ($_POST['id'] ?? '');
$sticky_name = $edit_member['name'] ?? ($_POST['name'] ?? '');
$sticky_post = $edit_member['post_nominal'] ?? ($_POST['post_nominal'] ?? '');
$sticky_no = $edit_member['membership_no'] ?? ($_POST['membership_no'] ?? '');
$sticky_certno = $edit_member['certification_no'] ?? ($_POST['certification_no'] ?? '');
$sticky_status = $edit_member['membership_status'] ?? ($_POST['membership_status'] ?? '');
$sticky_cert_status = $edit_member['certification_status'] ?? ($_POST['certification_status'] ?? '');
$sticky_grade = $edit_member['membership_grade'] ?? ($_POST['membership_grade'] ?? '');
$sticky_cert_level = $edit_member['certified_grade'] ?? ($_POST['certified_grade'] ?? '');
$sticky_title = $edit_member['membership_title'] ?? ($_POST['membership_title'] ?? '');
$sticky_branch = $edit_member['branch'] ?? ($_POST['branch'] ?? '');
$sticky_areas = $edit_member['areas'] ?? ($_POST['areas'] ?? '');
?>

<main>

<section class="page-hero">
  <div class="container py-5">
    <div class="d-flex align-items-end justify-content-between flex-wrap gap-2">
      <div>
        <h1 class="mb-2">Member List Admin</h1>
        <p class="text-muted mb-0">Add, edit, and delete SIET member records.</p>
      </div>

      <div class="d-flex gap-2 flex-wrap">
        <a href="memberlist-admin.php?logout_to=view-memberlist.php" class="btn btn-outline-secondary rounded-pill">View Members Page</a>

        <button type="button" class="btn btn-primary rounded-pill"
                data-bs-toggle="modal" data-bs-target="#memberModal">
          <?= $edit_member ? "Edit Member" : "Add Member" ?>
        </button>
      </div>
    </div>
  </div>
</section>
<br>
<section class="section-pad pt-0">
  <div class="container">

    <?php if ($msg): ?><div class="alert alert-success"><?= h($msg) ?></div><?php endif; ?>
    <?php if ($err): ?><div class="alert alert-danger"><?= h($err) ?></div><?php endif; ?>

    <div class="card shadow-sm mla-card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
          <h3 class="h6 fw-bold mb-0">Members List (<?= count($members) ?>)</h3>
          <div class="text-muted small">Scroll appears only when needed.</div>
        </div>

        <div class="mla-scrollwrap">
          <table class="table align-middle table-hover mb-0 mla-table">
            <thead>
              <tr>
                <th style="width:60px;">No</th>
                <th>Name</th>
                <th>Member No</th>
                <th>Certification No</th>
                <th>Membership Grade</th>
                <th>Certification Level</th>
                <th>Membership Title</th>
                <th>Certification Post-nominal</th>
                <th>Branch of Engineering</th>
                <th>Specialisation</th>
                <th>Membership Status</th>
                <th>Certification Status</th>
                <th style="width:420px;">Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php if (count($members) === 0): ?>
              <tr><td colspan="13" class="text-muted">No members yet.</td></tr>
            <?php else: ?>
              <?php foreach($members as $i => $m): ?>
                <tr>
                  <td><?= $i + 1 ?></td>
                  <td class="fw-semibold"><?= h($m['name'] ?? '') ?></td>
                  <td><?= h($m['membership_no'] ?? '') ?></td>
                  <td><?= h($m['certification_no'] ?? '') ?></td>
                  <td><?= h($m['membership_grade'] ?? '') ?></td>
                  <td><?= h($m['certified_grade'] ?? '') ?></td>
                  <td><?= h($m['membership_title'] ?? '') ?></td>
                  <td><?= h($m['post_nominal'] ?? '') ?></td>
                  <td><?= h($m['branch'] ?? '') ?></td>
                  <td><?= h($m['areas'] ?? '') ?></td>
                  <td><?= status_badge_admin($m['membership_status'] ?? '') ?></td>
                  <td><?= cert_status_badge_admin($m['certification_status'] ?? '') ?></td>
                  <td>
                    <div class="mla-actions">
                      <a class="btn btn-sm btn-outline-primary " href="memberlist-admin.php?edit=<?= urlencode($m['id']) ?>">Edit</a>
                      <a class="btn btn-sm btn-outline-secondary " href="view-memberlist.php?view=<?= urlencode($m['id']) ?>" target="_blank">View</a>
                      <a class="btn btn-sm btn-outline-danger "
                         href="memberlist-admin.php?delete=<?= urlencode($m['id']) ?>"
                         onclick="return confirm('Delete this member?');">Delete</a>
                    </div>
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
</section>
<br>
<!-- MODAL: Add / Edit Member (DESIGN ONLY) -->
<div class="modal fade" id="memberModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content mla-modal">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">
          <?= $edit_member ? "Edit Member" : "Add New Member" ?>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" action="memberlist-admin.php">
          <input type="hidden" name="action" value="save">
          <input type="hidden" name="editing_id" value="<?= h($edit_member['id'] ?? '') ?>">

          <div class="row g-3">

            <div class="col-md-6">
              <label class="form-label fw-semibold">ID (unique)</label>
              <input type="text" name="id" class="form-control <?= $id_error ? 'is-invalid' : '' ?>"
                     value="<?= h($sticky_id) ?>" <?= $edit_member ? 'readonly' : '' ?> required>
              <?php if ($id_error): ?>
                <div class="invalid-feedback d-block"><?= h($id_error) ?></div>
              <?php else: ?>
                <div class="form-text">
                  Use lowercase letters/numbers/hyphen only.
                  <br><span class="text-danger">(Recommend: Use Membership No)</span>
                </div>
              <?php endif; ?>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Name</label>
              <input type="text" name="name" class="form-control" value="<?= h($sticky_name) ?>" required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Certification Post-nominal</label>
              <input type="text" name="post_nominal" class="form-control" value="<?= h($sticky_post) ?>">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Membership No.</label>
              <input type="text" name="membership_no" class="form-control" value="<?= h($sticky_no) ?>" required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Certification No.</label>
              <input type="text" name="certification_no" class="form-control" value="<?= h($sticky_certno) ?>">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Membership Grade</label>
              <input type="text" name="membership_grade" class="form-control" value="<?= h($sticky_grade) ?>">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Certification Level</label>
              <input type="text" name="certified_grade" class="form-control" value="<?= h($sticky_cert_level) ?>">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Membership Title</label>
              <input type="text" name="membership_title" class="form-control" value="<?= h($sticky_title) ?>">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Branch of Engineering</label>
              <input type="text" name="branch" class="form-control" value="<?= h($sticky_branch) ?>">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Specialisation (Areas of Certification)</label>
              <input type="text" name="areas" class="form-control" value="<?= h($sticky_areas) ?>">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Membership Status</label>
              <select name="membership_status" class="form-select">
                <option value="" <?= $sticky_status==='' ? 'selected' : '' ?>>Select Membership Status</option>
                <option value="Paid" <?= $sticky_status==='Paid' ? 'selected' : '' ?>>Paid</option>
                <option value="Overdue" <?= $sticky_status==='Overdue' ? 'selected' : '' ?>>Overdue</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Certification Status</label>
              <select name="certification_status" class="form-select">
                <option value="" <?= $sticky_cert_status==='' ? 'selected' : '' ?>>Select Certification Status</option>
                <?php foreach ($cert_status_options as $opt): ?>
                  <?php if ($opt === '') continue; ?>
                  <option value="<?= h($opt) ?>" <?= $sticky_cert_status===$opt ? 'selected' : '' ?>><?= h($opt) ?></option>
                <?php endforeach; ?>
              </select>
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
.mla-card{
  border-radius: 18px;
  border: 1px solid rgba(0,0,0,.08);
  box-shadow: 0 12px 30px rgba(0,0,0,.06);
}

/* Scroll wrapper: auto scrollbars only when needed */
.mla-scrollwrap{
  max-height: 560px;
  overflow: auto;
  border-radius: 14px;
  border: 1px solid rgba(0,0,0,.06);
  position: relative;
}

/* Wider table because many columns */
.mla-table{
  min-width: 1800px;
  border-collapse: separate;
  border-spacing: 0;
}

/* Sticky header inside scroll container */
.mla-table thead th{
  /* position: sticky; */
  top: 0;
  background: #fff;
  z-index: 6;
  border-bottom: 1px solid rgba(0,0,0,.10);
  white-space: nowrap;
}
.mla-table td{
  white-space: nowrap;
  background: #fff;
}

/* Make Name + Specialisation wrap */
.mla-table td:nth-child(2){
  white-space: normal;
  min-width: 220px;
}
.mla-table td:nth-child(10){
  white-space: normal;
  min-width: 240px;
}

/* Sticky "No" column */
.mla-table thead th:nth-child(1),
.mla-table tbody td:nth-child(1){
  position: sticky;
  left: 0;
  z-index: 7;
  background: #fff;
  box-shadow: 1px 0 0 rgba(0,0,0,.08);
}
.mla-table thead th:nth-child(1){ z-index: 8; }

/* Sticky "Actions" column */
.mla-table thead th:last-child,
.mla-table tbody td:last-child{
  /* position: sticky; */
  right: 0;
  z-index: 7;
  background: #fff;
  box-shadow: -1px 0 0 rgba(0,0,0,.08);
  min-width: 420px;
}
.mla-table thead th:last-child{ z-index: 8; }

/* Bigger action buttons */
.mla-actions{
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
  justify-content: end;
  max-width: 400px;
}
.mla-btn{
  width: 100%;
  text-align: center;
  font-weight: 800;
  white-space: nowrap;
  padding: .45rem .9rem;
  font-size: .95rem;
  border-radius: 999px;
}

/* Nicer scrollbars */
.mla-scrollwrap::-webkit-scrollbar{ height: 10px; width: 10px; }
.mla-scrollwrap::-webkit-scrollbar-track{ background: rgba(0,0,0,.06); border-radius: 999px; }
.mla-scrollwrap::-webkit-scrollbar-thumb{ background: rgba(13,110,253,.28); border-radius: 999px; }
.mla-scrollwrap::-webkit-scrollbar-thumb:hover{ background: rgba(13,110,253,.40); }

/* Modal styling */
.mla-modal{
  border-radius: 18px;
  overflow: hidden;
}
.modal-header{
  background: linear-gradient(180deg, rgba(13,110,253,.10), rgba(255,255,255,0));
}

/* Mobile: stack action buttons */
@media (max-width: 575.98px){
  .mla-actions{ grid-template-columns: 1fr; max-width: none; }
}

/* Badges */
.ms-badge{
  display:inline-flex;
  align-items:center;
  padding: 4px 10px;
  border-radius: 999px;
  font-weight: 900;
  font-size: .78rem;
  line-height: 1;
  border: 1px solid rgba(0,0,0,.12);
}
.ms-paid{ background: rgba(13,110,253,.16); border-color: rgba(13,110,253,.35); color: #0d6efd; }
.ms-overdue{ background: rgba(220,53,69,.16); border-color: rgba(220,53,69,.35); color: #dc3545; }
.ms-unknown{ background: rgba(108,117,125,.16); border-color: rgba(108,117,125,.35); color: #6c757d; }

.cs-badge{
  display:inline-flex;
  align-items:center;
  padding: 4px 10px;
  border-radius: 999px;
  font-weight: 900;
  font-size: .78rem;
  line-height: 1;
  border: 1px solid rgba(0,0,0,.12);
}
.cs-ok{ background: rgba(25,135,84,.14); border-color: rgba(25,135,84,.25); color: #198754; }
.cs-prog{ background: rgba(13,110,253,.14); border-color: rgba(13,110,253,.25); color: #0d6efd; }
.cs-pend{ background: rgba(255,193,7,.18); border-color: rgba(255,193,7,.25); color: #b58100; }
.cs-exp{ background: rgba(220,53,69,.14); border-color: rgba(220,53,69,.25); color: #dc3545; }
.cs-due{ background: rgba(111,66,193,.14); border-color: rgba(111,66,193,.25); color: #6f42c1; }
.cs-stop{ background: rgba(33,37,41,.10); border-color: rgba(33,37,41,.20); color: #212529; }
.cs-unknown{ background: rgba(108,117,125,.14); border-color: rgba(108,117,125,.20); color: #6c757d; }
</style>

<!-- Auto open modal when editing OR when there is validation error after submit -->
<script>
document.addEventListener("DOMContentLoaded", function(){
  const shouldOpen = <?= json_encode((bool)$edit_member || (bool)$err || (bool)$id_error) ?>;
  if (!shouldOpen) return;

  const modalEl = document.getElementById("memberModal");
  if (!modalEl) return;

  const modal = new bootstrap.Modal(modalEl);
  modal.show();
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include "footer.php"; ?>