<?php
$active = 'members';
$page_css = ['sections.css'];
include "header.php";

include "members-data.php";
$members = load_members();

/* Build dropdown options from existing list */
function unique_sorted(array $items): array {
  $items = array_filter(array_map('trim', $items), fn($v) => $v !== '');
  $items = array_values(array_unique($items));
  sort($items, SORT_NATURAL | SORT_FLAG_CASE);
  return $items;
}

$opt_grade  = unique_sorted(array_map(fn($m) => $m['membership_grade'] ?? '', $members));
$opt_title  = unique_sorted(array_map(fn($m) => $m['membership_title'] ?? '', $members));
$opt_branch = unique_sorted(array_map(fn($m) => $m['branch'] ?? '', $members));
$opt_areas  = unique_sorted(array_map(fn($m) => $m['areas'] ?? '', $members));
$opt_cert   = unique_sorted(array_map(fn($m) => $m['certified_grade'] ?? '', $members));

/* Search filters */
$q = [
  'name'             => trim($_GET['name'] ?? ''),
  'membership_no'    => trim($_GET['membership_no'] ?? ''),
  'membership_grade' => trim($_GET['membership_grade'] ?? ''),
  'membership_title' => trim($_GET['membership_title'] ?? ''),
  'branch'           => trim($_GET['branch'] ?? ''),
  'areas'            => trim($_GET['areas'] ?? ''),
  'certified_grade'  => trim($_GET['certified_grade'] ?? ''),
];

$sort = $_GET['sort'] ?? 'name_az';

/* A–Z filter */
$az = strtoupper(trim($_GET['az'] ?? '')); // A-Z filter by Name first letter
if (!preg_match('/^[A-Z]$/', $az)) $az = '';

/* Filter function (name/no contains, dropdown exact match, plus A-Z) */
$filtered = array_values(array_filter($members, function($m) use ($q, $az){

  if ($q['name'] !== '' && stripos((string)($m['name'] ?? ''), $q['name']) === false) return false;
  if ($q['membership_no'] !== '' && stripos((string)($m['membership_no'] ?? ''), $q['membership_no']) === false) return false;

  $exactFields = ['membership_grade','membership_title','branch','areas','certified_grade'];
  foreach ($exactFields as $f) {
    if ($q[$f] === '') continue;
    if (trim((string)($m[$f] ?? '')) !== $q[$f]) return false;
  }

  // A-Z filter by first letter of Name
  if ($az !== '') {
    $name = trim((string)($m['name'] ?? ''));
    if ($name === '') return false;
    $first = strtoupper(mb_substr($name, 0, 1));
    if ($first !== $az) return false;
  }

  return true;
}));

/* Sorting */
$sortKey = function($m, $key){
  return strtolower(trim((string)($m[$key] ?? '')));
};

usort($filtered, function($a, $b) use ($sort, $sortKey){
  switch ($sort) {
    case 'name_za':
      return $sortKey($b,'name') <=> $sortKey($a,'name');

    case 'grade_az':
      return $sortKey($a,'membership_grade') <=> $sortKey($b,'membership_grade')
          ?: $sortKey($a,'name') <=> $sortKey($b,'name');

    case 'title_az':
      return $sortKey($a,'membership_title') <=> $sortKey($b,'membership_title')
          ?: $sortKey($a,'name') <=> $sortKey($b,'name');

    case 'cert_az':
      return $sortKey($a,'certified_grade') <=> $sortKey($b,'certified_grade')
          ?: $sortKey($a,'name') <=> $sortKey($b,'name');

    case 'name_az':
    default:
      return $sortKey($a,'name') <=> $sortKey($b,'name');
  }
});

/* Selected result card */
$selected = null;
$selected_id = $_GET['view'] ?? '';
if ($selected_id) {
  foreach ($members as $m) {
    if (($m['id'] ?? '') === $selected_id) { $selected = $m; break; }
  }
} elseif (count($filtered) === 1) {
  $selected = $filtered[0];
}
?>

<main>

<section class="page-hero">
  <div class="container py-5">
    <div class="d-flex align-items-end justify-content-between flex-wrap gap-2">
      <div>
        <h1 class="mb-2">Search SIET Members</h1>
        <p class="text-muted mb-0">Search and view SIET members directory.</p>
      </div>
      <a href="memberlist-admin.php" class="btn btn-outline-primary rounded-pill">
        Edit Member List
      </a>
    </div>
  </div>
</section>
<br>
<section class="section-pad">
  <div class="container">

    <!-- TOP: 2 columns (Search + Search Results) -->
    <div class="row g-4 mb-4">

      <!-- Search column -->
      <div class="col-lg-6">
        <div class="card vm-card">
          <div class="card-body">
            <div class="vm-title">Search</div>
            <div class="text-muted small mb-2">Use keywords and filters below.</div>

            <!-- A–Z Bar -->
            <div class="vm-azbar">
              <?php foreach(range('A','Z') as $L): ?>
                <a class="vm-az <?= ($az === $L) ? 'is-active' : '' ?>"
                   href="view-memberlist.php?<?= http_build_query(array_merge($q, ['az'=>$L, 'sort'=>$sort])) ?>">
                  <?= $L ?>
                </a>
              <?php endforeach; ?>

              <a class="vm-az vm-az-clear <?= ($az === '') ? 'is-active' : '' ?>"
                 href="view-memberlist.php?<?= http_build_query(array_merge($q, ['az'=>'', 'sort'=>$sort])) ?>">
                All
              </a>
            </div>

            <form method="GET" action="view-memberlist.php">
              <input type="hidden" name="az" value="<?= h($az) ?>">
              <input type="hidden" name="sort" value="<?= h($sort) ?>">

              <div class="row g-2">
                <div class="col-12">
                  <label class="form-label fw-semibold">Name</label>
                  <input class="form-control" name="name" value="<?= h($q['name']) ?>" placeholder="Search by name">
                </div>

                <div class="col-12">
                  <label class="form-label fw-semibold">Membership No</label>
                  <input class="form-control" name="membership_no" value="<?= h($q['membership_no']) ?>" placeholder="Search by membership number">
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Membership Grade</label>
                  <select class="form-select" name="membership_grade">
                    <option value="">Select Membership Grade</option>
                    <?php foreach($opt_grade as $v): ?>
                      <option value="<?= h($v) ?>" <?= $q['membership_grade']===$v ? 'selected' : '' ?>><?= h($v) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Membership Title</label>
                  <select class="form-select" name="membership_title">
                    <option value="">Select Membership Title</option>
                    <?php foreach($opt_title as $v): ?>
                      <option value="<?= h($v) ?>" <?= $q['membership_title']===$v ? 'selected' : '' ?>><?= h($v) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Branch of Engineering</label>
                  <select class="form-select" name="branch">
                    <option value="">Select Branch of Engineering</option>
                    <?php foreach($opt_branch as $v): ?>
                      <option value="<?= h($v) ?>" <?= $q['branch']===$v ? 'selected' : '' ?>><?= h($v) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Areas of Certification</label>
                  <select class="form-select" name="areas">
                    <option value="">Select Areas of Certification</option>
                    <?php foreach($opt_areas as $v): ?>
                      <option value="<?= h($v) ?>" <?= $q['areas']===$v ? 'selected' : '' ?>><?= h($v) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Certified Grade</label>
                  <select class="form-select" name="certified_grade">
                    <option value="">Select Certified Grade</option>
                    <?php foreach($opt_cert as $v): ?>
                      <option value="<?= h($v) ?>" <?= $q['certified_grade']===$v ? 'selected' : '' ?>><?= h($v) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-12 d-flex gap-2 mt-2">
                  <button class="btn btn-primary btn-lg rounded-pill px-4">Search</button>
                  <a class="btn btn-outline-secondary btn-lg rounded-pill px-4" href="view-memberlist.php">Clear</a>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>

      <!-- Search results column -->
      <div class="col-lg-6">
        <div class="card vm-card">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
              <div class="vm-title">Search Results</div>
              <div class="text-muted small"><?= count($filtered) ?> result(s)</div>
            </div>

            <div class="mt-3 vm-results">
              <?php if (count($filtered) === 0): ?>
                <div class="text-muted small">No members found.</div>
              <?php else: ?>
                <div class="list-group">
                  <?php foreach($filtered as $m): ?>
                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                       href="view-memberlist.php?<?= http_build_query(array_merge($q, ['az'=>$az, 'sort'=>$sort, 'view' => $m['id']])) ?>">
                      <div class="me-2">
                        <div class="fw-semibold"><?= h($m['name']) ?></div>
                        <div class="small text-muted">Membership No: <?= h($m['membership_no']) ?></div>
                      </div>
                      <span class="badge text-bg-light border">View</span>
                    </a>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>

            <?php if ($selected): ?>
              <div class="vm-selected mt-4">
                <div class="vm-title-sm">Member Information</div>
                <div class="table-responsive">
                  <table class="table table-bordered table-dark mb-0 vm-info-table">
                    <tbody>
                      <tr><th>Name:</th><td><?= h($selected['name']) ?></td></tr>
                      <tr><th>Membership No.:</th><td><?= h($selected['membership_no']) ?></td></tr>
                      <tr><th>Membership Grade:</th><td><?= h($selected['membership_grade']) ?></td></tr>
                      <tr><th>Membership Title:</th><td><?= h($selected['membership_title']) ?></td></tr>
                      <tr><th>Branch of Engineering:</th><td><?= h($selected['branch']) ?></td></tr>
                      <tr><th>Areas of Certification:</th><td><?= h($selected['areas']) ?></td></tr>
                      <tr><th>Certified Grade:</th><td><?= h($selected['certified_grade']) ?></td></tr>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php endif; ?>

          </div>
        </div>
      </div>

    </div>

    <!-- UNDER: Table list (sorted + filtered) -->
    <div class="card vm-card">
      <div class="card-body">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
          <div class="vm-title">Members List</div>

          <div class="d-flex align-items-center gap-2 flex-wrap">
            <div class="text-muted small">Total: <?= count($filtered) ?> (filtered)</div>

            <form method="GET" action="view-memberlist.php" class="d-flex align-items-center gap-2">
              <?php foreach($q as $k => $v): ?>
                <input type="hidden" name="<?= h($k) ?>" value="<?= h($v) ?>">
              <?php endforeach; ?>
              <input type="hidden" name="az" value="<?= h($az) ?>">
              <?php if (!empty($_GET['view'])): ?>
                <input type="hidden" name="view" value="<?= h($_GET['view']) ?>">
              <?php endif; ?>

              <select name="sort" class="form-select form-select-sm" onchange="this.form.submit()">
                <option value="name_az"  <?= $sort==='name_az' ? 'selected' : '' ?>>Name (A–Z)</option>
                <option value="name_za"  <?= $sort==='name_za' ? 'selected' : '' ?>>Name (Z–A)</option>
                <option value="grade_az" <?= $sort==='grade_az' ? 'selected' : '' ?>>Membership Grade</option>
                <option value="title_az" <?= $sort==='title_az' ? 'selected' : '' ?>>Membership Title</option>
                <option value="cert_az"  <?= $sort==='cert_az' ? 'selected' : '' ?>>Certified Grade</option>
              </select>
            </form>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-hover align-middle vm-table">
            <thead>
              <tr>
                <th style="width:60px;">No</th>
                <th>Name</th>
                <th>Membership No</th>
                <th>Membership Grade</th>
                <th>Membership Title</th>
                <th>Branch of Engineering</th>
                <th>Areas of Certification</th>
                <th>Certified Grade</th>
              </tr>
            </thead>
            <tbody>
              <?php if (count($filtered) === 0): ?>
                <tr><td colspan="8" class="text-muted">No members found.</td></tr>
              <?php else: ?>
                <?php foreach($filtered as $i => $m): ?>
                  <tr>
                    <td><?= $i + 1 ?></td>
                    <td class="fw-semibold"><?= h($m['name'] ?? '') ?></td>
                    <td><?= h($m['membership_no'] ?? '') ?></td>
                    <td><?= h($m['membership_grade'] ?? '') ?></td>
                    <td><?= h($m['membership_title'] ?? '') ?></td>
                    <td><?= h($m['branch'] ?? '') ?></td>
                    <td><?= h($m['areas'] ?? '') ?></td>
                    <td><?= h($m['certified_grade'] ?? '') ?></td>
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
</main>

<style>
  .vm-card{
    border-radius: 18px;
    border: 1px solid rgba(0,0,0,.08);
    box-shadow: 0 12px 30px rgba(0,0,0,.06);
  }
  .vm-title{
    font-weight: 900;
    font-size: 1.05rem;
  }
  .vm-title-sm{
    font-weight: 900;
    margin-bottom: 10px;
  }
  .vm-info-table th{
    width: 260px;
    white-space: nowrap;
  }
  .vm-table th{
    font-size: .85rem;
    white-space: nowrap;
  }
  .vm-table td{
    font-size: .9rem;
    vertical-align: middle;
  }
  .vm-info-table{
  border-color: #B2BEB5;
}
.vm-info-table th,
.vm-info-table td{
  background: #5b67b0;              /* main background */
  color: #ffffff;                   /* text color */
  border-color: rgba(255,255,255,.15);
}
/* Optional: hover effect */
.vm-info-table tbody tr:hover th,
.vm-info-table tbody tr:hover td{
  background: #16213a;
}

/* Optional: round corners nicer */
.vm-info-table{
  overflow: hidden;
  border-radius: 12px;
}
  .vm-results .list-group{
    max-height: 260px;
    overflow: auto;
  }
  .vm-card .btn-lg{
    font-weight: 800;
  }
  @media (max-width: 575.98px){
    .vm-info-table th{ width: 180px; }
  }

  /* A–Z bar (like screenshot) */
  .vm-azbar{
    display:flex;
    flex-wrap: wrap;
    gap: 6px;
    margin: 10px 0 14px;
  }

  .vm-az{
    width: 30px;
    height: 30px;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    font-weight: 900;
    font-size: .85rem;
    border-radius: 4px;
    background: #111827;
    color: #fff;
    border: 1px solid rgba(255,255,255,.14);
    transition: transform .12s ease, opacity .12s ease;
  }

  .vm-az:hover{ transform: translateY(-1px); opacity: .92; }

  .vm-az.is-active{
    background: #0d6efd;
    border-color: rgba(13,110,253,.55);
  }

  .vm-az-clear{
    width: auto;
    padding: 0 10px;
    background: #ffffff;
    color: #111827;
    border: 1px solid rgba(0,0,0,.15);
  }
  .vm-az-clear.is-active{
    background:#0d6efd;
    color:#fff;
    border-color: rgba(13,110,253,.55);
  }

  @media (max-width: 575.98px){
    .vm-az{ width: 28px; height: 28px; }
  }
</style>

<?php include "footer.php"; ?>