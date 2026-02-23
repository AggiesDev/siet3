<?php
$active = 'members';
$page_css = ['sections.css'];
include "header.php";

include "members-data.php";
$members = load_members();

function unique_sorted(array $items): array {
  $items = array_filter(array_map('trim', $items), fn($v) => $v !== '');
  $items = array_values(array_unique($items));
  sort($items, SORT_NATURAL | SORT_FLAG_CASE);
  return $items;
}

/* Dropdown sources from table */
$opt_grade  = unique_sorted(array_map(fn($m) => $m['membership_grade'] ?? '', $members));
$opt_title  = unique_sorted(array_map(fn($m) => $m['membership_title'] ?? '', $members));
$opt_branch = unique_sorted(array_map(fn($m) => $m['branch'] ?? '', $members));
$opt_areas  = unique_sorted(array_map(fn($m) => $m['areas'] ?? '', $members));
$opt_cert_level = unique_sorted(array_map(fn($m) => $m['certified_grade'] ?? '', $members)); // Certification Level
$opt_status = unique_sorted(array_map(fn($m) => $m['membership_status'] ?? '', $members));

$cert_status_options = [
  '',
  'Certified',
  'In Progress',
  'Pending Review',
  'Expired',
  'Renewal Due',
  'Suspended/Withdrawn'
];
$opt_cert_status = unique_sorted(array_map(fn($m) => $m['certification_status'] ?? '', $members));
/* keep options consistent with the allowed list */
$opt_cert_status = array_values(array_filter($cert_status_options, fn($v) => $v === '' || in_array($v, $opt_cert_status, true) || $v !== ''));

/* Search order required */
$q = [
  'name'              => trim($_GET['name'] ?? ''),
  'membership_no'     => trim($_GET['membership_no'] ?? ''),      // Member No
  'certification_no'  => trim($_GET['certification_no'] ?? ''),   // Certification No
  'membership_grade'  => trim($_GET['membership_grade'] ?? ''),
  'certified_grade'   => trim($_GET['certified_grade'] ?? ''),    // Certification Level
  'membership_title'  => trim($_GET['membership_title'] ?? ''),
  'post_nominal'      => trim($_GET['post_nominal'] ?? ''),       // Certification Post-norminal
  'branch'            => trim($_GET['branch'] ?? ''),
  'areas'             => trim($_GET['areas'] ?? ''),              // Specialisation
  'membership_status' => trim($_GET['membership_status'] ?? ''),
  'certification_status' => trim($_GET['certification_status'] ?? ''),
];

/* Table sort filter by Name only */
$sort = $_GET['sort'] ?? 'name_az'; // name_az or name_za

/* A–Z filter bar */
$az = strtoupper(trim($_GET['az'] ?? ''));
if (!preg_match('/^[A-Z]$/', $az)) $az = '';

/* Filter */
$filtered = array_values(array_filter($members, function($m) use ($q, $az){
  if ($q['name'] !== '' && stripos((string)($m['name'] ?? ''), $q['name']) === false) return false;

  if ($q['membership_no'] !== '' && stripos((string)($m['membership_no'] ?? ''), $q['membership_no']) === false) return false;
  if ($q['certification_no'] !== '' && stripos((string)($m['certification_no'] ?? ''), $q['certification_no']) === false) return false;

  // dropdown exact matches
  $exactFields = ['membership_grade','certified_grade','membership_title','branch','areas','membership_status','certification_status'];
  foreach ($exactFields as $f) {
    if (($q[$f] ?? '') === '') continue;
    if (trim((string)($m[$f] ?? '')) !== $q[$f]) return false;
  }

  // post-nominal (text contains)
  if ($q['post_nominal'] !== '' && stripos((string)($m['post_nominal'] ?? ''), $q['post_nominal']) === false) return false;

  if ($az !== '') {
    $name = trim((string)($m['name'] ?? ''));
    if ($name === '') return false;
    $first = strtoupper(mb_substr($name, 0, 1));
    if ($first !== $az) return false;
  }

  return true;
}));

/* Sort by Name A-Z / Z-A */
$sortKey = fn($m) => strtolower(trim((string)($m['name'] ?? '')));
usort($filtered, function($a, $b) use ($sort, $sortKey){
  if ($sort === 'name_za') return $sortKey($b) <=> $sortKey($a);
  return $sortKey($a) <=> $sortKey($b);
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

/* Membership status badge */
function status_badge($status){
  $s = trim((string)$status);
  if ($s === 'Paid') return '<span class="ms-badge ms-paid">Paid</span>';
  if ($s === 'Overdue') return '<span class="ms-badge ms-overdue">Overdue</span>';
  return '<span class="ms-badge ms-unknown">N/A</span>';
}

/* Certification status badge */
function cert_status_badge($status){
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
?>

<main>

<section class="page-hero">
  <div class="container py-5">
    <div class="d-flex align-items-end justify-content-between flex-wrap gap-2">
      <div>
        <h1 class="mb-2">Search SIET Members</h1>
        <p class="text-muted mb-0">Search and view SIET members directory.</p>
      </div>
      <a href="memberlist-admin.php" class="btn btn-outline-primary rounded-pill">Edit Member List</a>
    </div>
  </div>
</section>
<br>
<section class="section-pad">
  <div class="container">

    <!-- TOP: 2 columns -->
    <div class="row g-4 mb-4">

      <!-- Search column -->
      <div class="col-lg-6">
        <div class="card vm-card">
          <div class="card-body">
            <div class="vm-title">Search Membership & Certification</div>
            <div class="text-muted small mb-2">Use keywords and filters below.</div>

            <!-- A–Z bar -->
            <div class="vm-azbar">
              <?php foreach(range('A','Z') as $L): ?>
                <a class="vm-az <?= ($az === $L) ? 'is-active' : '' ?>"
                   href="view-memberlist.php?<?= http_build_query(array_merge($q, ['az'=>$L, 'sort'=>$sort])) ?>">
                  <?= $L ?>
                </a>
              <?php endforeach; ?>
              <!-- <a class="vm-az vm-az-clear <?= ($az === '') ? 'is-active' : '' ?>"
                 href="view-memberlist.php?<?= http_build_query(array_merge($q, ['az'=>'', 'sort'=>$sort])) ?>">
                Reset
              </a> -->
            </div>

            <form method="GET" action="view-memberlist.php">
              <input type="hidden" name="az" value="<?= h($az) ?>">
              <input type="hidden" name="sort" value="<?= h($sort) ?>">

              <div class="row g-2">

                <!-- Search arrangement required -->
                <div class="col-12">
                  <label class="form-label fw-semibold">Name</label>
                  <input class="form-control" name="name" value="<?= h($q['name']) ?>" placeholder="Search by name">
                </div>

                <div class="col-12">
                  <label class="form-label fw-semibold">Membership No</label>
                  <input class="form-control" name="membership_no" value="<?= h($q['membership_no']) ?>" placeholder="Search by member no">
                </div>

                <div class="col-12">
                  <label class="form-label fw-semibold">Certification No.</label>
                  <input class="form-control" name="certification_no" value="<?= h($q['certification_no']) ?>" placeholder="Search by certification no">
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Membership Grade</label>
                  <select class="form-select" name="membership_grade">
                    <option value="">Select Member Grade</option>
                    <?php foreach($opt_grade as $v): ?>
                      <option value="<?= h($v) ?>" <?= $q['membership_grade']===$v ? 'selected' : '' ?>><?= h($v) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Certification Level</label>
                  <select class="form-select" name="certified_grade">
                    <option value="">Select Certification Level</option>
                    <?php foreach($opt_cert_level as $v): ?>
                      <option value="<?= h($v) ?>" <?= $q['certified_grade']===$v ? 'selected' : '' ?>><?= h($v) ?></option>
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
                  <label class="form-label fw-semibold">Certification Post-nominal</label>
                  <input class="form-control" name="post_nominal" value="<?= h($q['post_nominal']) ?>" placeholder="e.g., FSIE(T)">
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
                  <label class="form-label fw-semibold">Specialisation (Areas of Certification)</label>
                  <select class="form-select" name="areas">
                    <option value="">Select Specialisation</option>
                    <?php foreach($opt_areas as $v): ?>
                      <option value="<?= h($v) ?>" <?= $q['areas']===$v ? 'selected' : '' ?>><?= h($v) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Membership Status</label>
                  <select class="form-select" name="membership_status">
                    <option value="">Select Membership Status</option>
                    <?php foreach($opt_status as $v): ?>
                      <option value="<?= h($v) ?>" <?= $q['membership_status']===$v ? 'selected' : '' ?>><?= h($v) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Certification Status</label>
                  <select class="form-select" name="certification_status">
                    <option value="">Select Certification Status</option>
                    <?php foreach($cert_status_options as $opt): ?>
                      <?php if ($opt === '') continue; ?>
                      <option value="<?= h($opt) ?>" <?= $q['certification_status']===$opt ? 'selected' : '' ?>><?= h($opt) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-12 d-flex gap-2 mt-2">
                  <button class="btn btn-primary rounded-pill px-4">Search</button>
                  <a class="btn btn-outline-danger rounded-pill px-4" href="view-memberlist.php">Reset</a>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>

      <!-- Results column -->
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
                        <div class="fw-semibold">
                          <?= h($m['name']) ?>
                          <span class="ms-2"><?= status_badge($m['membership_status'] ?? '') ?></span>
                          <span class="ms-2"><?= cert_status_badge($m['certification_status'] ?? '') ?></span>
                        </div>
                        <div class="small text-muted">
                          Member No: <?= h($m['membership_no'] ?? '') ?>
                          <?php if(!empty($m['certification_no'])): ?>
                            • Cert No: <?= h($m['certification_no']) ?>
                          <?php endif; ?>
                        </div>
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
                  <table class="table table-bordered table-info mb-0 vm-info-table">
                    <tbody>
                      <tr><th>Name:</th><td><?= h($selected['name']) ?></td></tr>
                      <tr><th>Member No:</th><td><?= h($selected['membership_no'] ?? '') ?></td></tr>
                      <tr><th>Certification No:</th><td><?= h($selected['certification_no'] ?? '') ?></td></tr>
                      <tr><th>Membership Grade:</th><td><?= h($selected['membership_grade'] ?? '') ?></td></tr>
                      <tr><th>Certification Level:</th><td><?= h($selected['certified_grade'] ?? '') ?></td></tr>
                      <tr><th>Membership Title:</th><td><?= h($selected['membership_title'] ?? '') ?></td></tr>
                      <tr><th>Certification Post-nominal:</th><td><?= h($selected['post_nominal'] ?? '') ?></td></tr>
                      <tr><th>Branch of Engineering:</th><td><?= h($selected['branch'] ?? '') ?></td></tr>
                      <tr><th>Specialisation:</th><td><?= h($selected['areas'] ?? '') ?></td></tr>
                      <tr><th>Membership Status:</th><td><?= status_badge($selected['membership_status'] ?? '') ?></td></tr>
                      <tr><th>Certification Status:</th><td><?= cert_status_badge($selected['certification_status'] ?? '') ?></td></tr>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php endif; ?>

          </div>
        </div>
      </div>

    </div>

    <!-- Table list + Name sort filter -->
    <!-- <div class="card vm-card">
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
                <option value="name_az" <?= $sort==='name_az' ? 'selected' : '' ?>>Name (A–Z)</option>
                <option value="name_za" <?= $sort==='name_za' ? 'selected' : '' ?>>Name (Z–A)</option>
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
              </tr>
            </thead>
            <tbody>
              <?php if (count($filtered) === 0): ?>
                <tr><td colspan="12" class="text-muted">No members found.</td></tr>
              <?php else: ?>
                <?php foreach($filtered as $i => $m): ?>
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
                    <td><?= status_badge($m['membership_status'] ?? '') ?></td>
                    <td><?= cert_status_badge($m['certification_status'] ?? '') ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div> -->

  </div>
</section>
<br>
</main>

<style>
  .vm-card{ border-radius: 18px; border: 1px solid rgba(0,0,0,.08); box-shadow: 0 12px 30px rgba(0,0,0,.06); }
  .vm-title{ font-weight: 900; font-size: 1.05rem; }
  .vm-title-sm{ font-weight: 900; margin-bottom: 10px; }
  .vm-info-table th{ width: 260px; white-space: nowrap; }
  .vm-table th{ font-size: .85rem; white-space: nowrap; }
  .vm-table td{ font-size: .9rem; vertical-align: middle; }
  .vm-results .list-group{ max-height: 260px; overflow: auto; }
  .vm-card .btn-lg{ font-weight: 800; }
  @media (max-width: 575.98px){ .vm-info-table th{ width: 180px; } }

  .vm-azbar{ display:flex; flex-wrap: wrap; gap: 6px; margin: 10px 0 14px; }
  .vm-az{ width: 30px; height: 30px; display:flex; align-items:center; justify-content:center; text-decoration:none;
          font-weight: 900; font-size: .85rem; border-radius: 4px; background: #111827; color: #fff;
          border: 1px solid rgba(255,255,255,.14); transition: transform .12s ease, opacity .12s ease; }
  .vm-az:hover{ transform: translateY(-1px); opacity: .92; }
  .vm-az.is-active{ background: #0d6efd; border-color: rgba(13,110,253,.55); }
  .vm-az-clear{ width: auto; padding: 0 10px; background: #fff; color: #111827; border: 1px solid rgba(0,0,0,.15); }
  .vm-az-clear.is-active{ background:#0d6efd; color:#fff; border-color: rgba(13,110,253,.55); }

  .ms-badge{ display:inline-flex; align-items:center; padding: 4px 10px; border-radius: 999px; font-weight: 900; font-size: .78rem; border: 1px solid rgba(255,255,255,.18); line-height: 1; }
  .ms-paid{ background: rgba(13,110,253,.16); border-color: rgba(13,110,253,.35); color: #0d6efd; }
  .ms-overdue{ background: rgba(220,53,69,.16); border-color: rgba(220,53,69,.35); color: #dc3545; }
  .ms-unknown{ background: rgba(108,117,125,.16); border-color: rgba(108,117,125,.35); color: #6c757d; }

  .cs-badge{ display:inline-flex; align-items:center; padding: 4px 10px; border-radius: 999px; font-weight: 900; font-size: .78rem; line-height: 1; border: 1px solid rgba(0,0,0,.12); }
  .cs-ok{ background: rgba(25,135,84,.14); border-color: rgba(25,135,84,.25); color: #198754; }
  .cs-prog{ background: rgba(13,110,253,.14); border-color: rgba(13,110,253,.25); color: #0d6efd; }
  .cs-pend{ background: rgba(255,193,7,.18); border-color: rgba(255,193,7,.25); color: #b58100; }
  .cs-exp{ background: rgba(220,53,69,.14); border-color: rgba(220,53,69,.25); color: #dc3545; }
  .cs-due{ background: rgba(111,66,193,.14); border-color: rgba(111,66,193,.25); color: #6f42c1; }
  .cs-stop{ background: rgba(33,37,41,.10); border-color: rgba(33,37,41,.20); color: #212529; }
  .cs-unknown{ background: rgba(108,117,125,.14); border-color: rgba(108,117,125,.20); color: #6c757d; }
  .text-muted small{overflow: auto;}
</style>

<?php include "footer.php"; ?>