<?php
  $active = 'organisational-partnership';
  $page_css = ['organisational-partnership.css'];
  include "header.php";

  include "partners-data.php";
  $partners = load_partners();

  // Sorting
  $sort = $_GET['sort'] ?? 'az';

  $sorted = $partners; // copy
  usort($sorted, function($a, $b) use ($sort){
    $nameA = mb_strtolower($a['name']);
    $nameB = mb_strtolower($b['name']);
    if ($sort === 'za') return $nameB <=> $nameA;
    return $nameA <=> $nameB; // default az
  });
?>

<main>

  <!-- Page Hero -->
  <section class="op-hero">
    <div class="container">
      <div class="op-hero-inner">
        <div>
          <div class="op-kicker">CORPORATE MEMBERS</div>
          <h1 class="op-title">Organisational Partnership</h1>
          <p class="op-subtitle">
            Our corporate members and partner organisations supporting professional recognition, collaboration, and industry growth.
          </p>
        </div>

        <form class="op-sort" method="GET" action="">
          <label class="op-sort-label" for="sortSelect">Sorting</label>
          <select id="sortSelect" name="sort" class="form-select form-select-sm op-sort-select" onchange="this.form.submit()">
            <option value="az" <?= $sort==='az'?'selected':''; ?>>A → Z</option>
            <option value="za" <?= $sort==='za'?'selected':''; ?>>Z → A</option>
          </select>
        </form>
      </div>
    </div>
  </section>

  <!-- Grid -->
  <section class="op-section">
    <div class="container">
<!-- admin button -->
   <div class="d-flex align-items-center gap-2 flex-wrap">

  <!--  Admin button -->
  <a href="partners-admin.php" class="btn btn-admin btn-sm rounded-pill">
    <span class="btn-admin-icon">⚙</span>
    Edit Company List
  </a>
</div>
<br>
<!-- list of company -->
      <div class="op-grid">
        <?php foreach($sorted as $p): ?>
          <a class="op-card" href="partner-detail.php?id=<?= urlencode($p['id']); ?>">
            <div class="op-logo-wrap">
              <img src="<?= htmlspecialchars($p['logo']); ?>" alt="<?= htmlspecialchars($p['name']); ?>">
            </div>
            <div class="op-name"><?= htmlspecialchars($p['name']); ?></div>
            <div class="op-link">Read More</div>
          </a>
        <?php endforeach; ?>
      </div>

    </div>
  </section>
</main>
<style>
  /* ==========================
   Admin Button (Partners)
   ========================== */
.btn-admin{
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-weight: 800;
  border: 1px solid rgba(0,0,0,.10);
  background: #111827;
  color: #fff;
  box-shadow: 0 10px 22px rgba(0,0,0,.12);
  transition: transform .15s ease, box-shadow .15s ease, background .15s ease;
}

.btn-admin:hover{
  background: #0b1220;
  color: #fff;
  transform: translateY(-1px);
  box-shadow: 0 16px 36px rgba(0,0,0,.18);
}

.btn-admin:active{
  transform: translateY(0);
  box-shadow: 0 10px 22px rgba(0,0,0,.12);
}

.btn-admin-icon{
  display:inline-flex;
  width: 22px;
  height: 22px;
  border-radius: 999px;
  align-items:center;
  justify-content:center;
  background: rgba(255,255,255,.14);
  font-size: 14px;
  line-height: 1;
}

/* Partner detail card full width */
.op-detail-card{
  width: 100%;
}

/* If you have any wrapper limiting width, remove it */
.op-detail-shell{
  max-width: none !important;
}

/* The image container (same height for every card) */
.op-logo-wrap{
  height: 170px;                 /* adjust if you want a bit taller/shorter */
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;

  background: #fff;
  border: 1px solid rgba(0,0,0,.08);
  border-radius: 14px;
  padding: 10px;                 /* gives the same spacing like company 2 */
}

/* The logo image itself */
.op-logo-wrap img{
  width: 100%;
  height: 100%;
  object-fit: contain;           /* keeps full image visible */
  display: block;
}

/* Tablet */
@media (max-width: 991.98px){
  .op-logo-wrap{ height: 160px; }
}

/* Mobile */
@media (max-width: 575.98px){
  .op-logo-wrap{ height: 150px; }
}
</style>
<?php include "footer.php"; ?>