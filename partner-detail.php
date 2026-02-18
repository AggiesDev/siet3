<?php

  $active = 'organisational-partnership';
  $page_css = ['organisational-partnership.css']; // reuse your existing CSS
  include "header.php";

  include "partners-data.php";
  $partners = load_partners();

  $id = $_GET['id'] ?? '';
  $partner = null;

  foreach ($partners as $p) {
    if (($p['id'] ?? '') === $id) { $partner = $p; break; }
  }

  // Optional: build "other partners" list (max 6)
  $others = [];
  if ($partner) {
    foreach ($partners as $p) {
      if (($p['id'] ?? '') !== ($partner['id'] ?? '')) $others[] = $p;
    }
    shuffle($others);
    $others = array_slice($others, 0, 6);
  }
?>

<main>

  <!-- HERO -->
  <section class="op-detail-hero2">
    <div class="container-fluid px-3 px-lg-5">
      <div class="op-breadcrumb">
        <a href="organisational-partnership.php">Organisational Partnership</a>
        <span class="op-sep">›</span>
        <span class="op-current"><?= htmlspecialchars($partner['name'] ?? 'Partner Detail'); ?></span>
      </div>

      <div class="op-detail-shell">

        <?php if(!$partner): ?>
          <div class="op-detail-card2">
            <div class="op-detail-head2">
              <h1 class="op-detail-title2 mb-2">Partner not found</h1>
              <p class="text-muted mb-0">The partner you’re looking for does not exist or was removed.</p>
            </div>

            <div class="mt-3">
              <a href="organisational-partnership.php" class="btn btn-primary rounded-pill">Back to Partners</a>
            </div>
          </div>

        <?php else: ?>

          <!-- TOP CARD -->
          <div class="op-detail-card2">
            <div class="op-detail-top2">

              <div class="op-detail-logo2">
                <img
                  src="<?= htmlspecialchars($partner['logo'] ?? ''); ?>"
                  alt="<?= htmlspecialchars($partner['name'] ?? 'Partner'); ?>"
                  onerror="this.src='images/global/placeholder.png';"
                />
              </div>

              <div class="op-detail-meta2">
                <div class="op-detail-badges">
                  <span class="op-badge">Organisational Partner</span>
                  <?php if (!empty($partner['id'])): ?>
                    <!-- <span class="op-badge op-badge-soft">ID: <?= htmlspecialchars($partner['id']); ?></span> -->
                  <?php endif; ?>
                </div>

                <h1 class="op-detail-title2"><?= htmlspecialchars($partner['name'] ?? ''); ?></h1>

                <?php if (!empty($partner['website'])): ?>
                  <div class="op-detail-actions2">
                    <a class="btn btn-primary rounded-pill" href="<?= htmlspecialchars($partner['website']); ?>" target="_blank" rel="noopener">
                      Visit Website
                    </a>
                    <a class="btn btn-outline-secondary rounded-pill" href="organisational-partnership.php">
                      Back to Partners
                    </a>
                  </div>
                <?php else: ?>
                  <div class="op-detail-actions2">
                    <a class="btn btn-outline-secondary rounded-pill" href="organisational-partnership.php">
                      Back to Partners
                    </a>
                  </div>
                <?php endif; ?>
              </div>
            </div>

            <hr class="op-hr2">

            <!-- ABOUT -->
            <div class="op-detail-body2">
              <h2 class="op-detail-h2">About</h2>

              <?php if (!empty($partner['about'])): ?>
                <p class="op-detail-about2">
                  <?= nl2br(htmlspecialchars($partner['about'])); ?>
                </p>
              <?php else: ?>
                <p class="text-muted mb-0">No detail information has been added for this partner yet.</p>
              <?php endif; ?>
            </div>
          </div>

          <!-- OTHER PARTNERS (Optional) -->
          <?php if (count($others) > 0): ?>
            <div class="op-other-wrap">
              <div class="op-other-head">
                <h2 class="op-other-title">Other Partners</h2>
                <a class="op-other-link" href="organisational-partnership.php">View all</a>
              </div>

              <div class="op-other-grid">
                <?php foreach ($others as $o): ?>
                  <a class="op-other-card" href="partner-detail.php?id=<?= urlencode($o['id']); ?>">
                    <div class="op-other-logo">
                      <img
                        src="<?= htmlspecialchars($o['logo'] ?? ''); ?>"
                        alt="<?= htmlspecialchars($o['name'] ?? ''); ?>"
                        onerror="this.src='images/global/placeholder.png';"
                      />
                    </div>
                    <div class="op-other-name"><?= htmlspecialchars($o['name'] ?? ''); ?></div>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

        <?php endif; ?>

      </div>
    </div>
  </section>

</main>

<style>
/* ==========================
   Partner Detail (Updated)
   ========================== */

.op-detail-hero2{
  padding: 26px 0 52px;
  background: linear-gradient(180deg, rgba(13,110,253,.10), rgba(255,255,255,0) 55%);
}

.op-breadcrumb{
  font-size: .92rem;
  color: rgba(17,24,39,.70);
  margin-bottom: 12px;
}
.op-breadcrumb a{
  color: rgba(17,24,39,.75);
  text-decoration: none;
  font-weight: 700;
}
.op-breadcrumb a:hover{ text-decoration: underline; }
.op-sep{ margin: 0 8px; color: rgba(17,24,39,.45); }
.op-current{ font-weight: 800; color: rgba(17,24,39,.85); }

.op-detail-shell{
  max-width: none;   /* ✅ full width */
  width: 100%;
}

.op-detail-card2{
  background: #fff;
  border: 1px solid rgba(0,0,0,.08);
  border-radius: 18px;
  padding: 18px;
  box-shadow: 0 12px 30px rgba(0,0,0,.06);
}

.op-detail-top2{
  display: flex;
  gap: 16px;
  align-items: center;
  flex-wrap: wrap;
}

.op-detail-logo2{
  width: 140px;
  height: 100px;
  border-radius: 16px;
  background: #f8fafc;
  border: 1px solid rgba(0,0,0,.06);
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  flex: 0 0 auto;
}
.op-detail-logo2 img{
  width: 100%;
  height: 100%;
  object-fit: contain;
  padding: 10px;
  background: #fff;
}

.op-detail-meta2{
  min-width: 0;
  flex: 1 1 auto;
}

.op-detail-badges{
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
  margin-bottom: 8px;
}

.op-badge{
  display: inline-flex;
  align-items: center;
  padding: 6px 10px;
  border-radius: 999px;
  font-weight: 800;
  font-size: .78rem;
  border: 1px solid rgba(13,110,253,.18);
  background: rgba(13,110,253,.10);
  color: #0b5ed7;
}

.op-badge-soft{
  border-color: rgba(0,0,0,.10);
  background: rgba(17,24,39,.06);
  color: rgba(17,24,39,.80);
}

.op-detail-title2{
  font-weight: 900;
  margin: 0 0 10px;
  line-height: 1.15;
}

.op-detail-actions2{
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
}

.op-hr2{
  margin: 16px 0;
  border-color: rgba(0,0,0,.10);
}

.op-detail-h2{
  font-weight: 900;
  margin: 0 0 8px;
}

.op-detail-about2{
  color: rgba(17,24,39,.78);
  line-height: 1.75;
  margin: 0;
}

/* Other partners */
.op-other-wrap{
  margin-top: 18px;
}
.op-other-head{
  display: flex;
  align-items: baseline;
  justify-content: space-between;
  gap: 12px;
  margin: 0 0 10px;
}
.op-other-title{
  font-weight: 900;
  margin: 0;
}
.op-other-link{
  font-weight: 800;
  text-decoration: none;
}
.op-other-link:hover{ text-decoration: underline; }

.op-other-grid{
  display: grid;
  gap: 12px;
  grid-template-columns: repeat(3, minmax(0, 1fr));
}
.op-other-card{
  text-decoration: none;
  background: #fff;
  border: 1px solid rgba(0,0,0,.08);
  border-radius: 16px;
  padding: 12px;
  box-shadow: 0 10px 25px rgba(0,0,0,.05);
  transition: transform .15s ease, box-shadow .15s ease, border-color .15s ease;
  display: flex;
  gap: 10px;
  align-items: center;
}
.op-other-card:hover{
  transform: translateY(-2px);
  box-shadow: 0 18px 40px rgba(0,0,0,.10);
  border-color: rgba(13,110,253,.22);
}
.op-other-logo{
  width: 70px;
  height: 50px;
  border-radius: 12px;
  border: 1px solid rgba(0,0,0,.06);
  background: #f8fafc;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  flex: 0 0 auto;
}
.op-other-logo img{
  width: 100%;
  height: 100%;
  object-fit: contain;
  padding: 8px;
  background: #fff;
}
.op-other-name{
  font-weight: 800;
  color: #111827;
  line-height: 1.2;
  font-size: .95rem;
  min-width: 0;
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}

@media (max-width: 991.98px){
  .op-other-grid{ grid-template-columns: repeat(2, minmax(0, 1fr)); }
}
@media (max-width: 575.98px){
  .op-detail-logo2{
    width: 120px;
    height: 88px;
  }
  .op-other-grid{ grid-template-columns: 1fr; }
}
</style>

<?php include "footer.php"; ?>