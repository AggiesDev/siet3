<?php
  $active = 'organisational-partnership';
  $page_css = ['organisational-partnership.css'];
  include "header.php";

  include "partners-data.php";
  $partners = load_partners();

  $id = $_GET['id'] ?? '';
  $partner = null;

  foreach ($partners as $p) {
    if (($p['id'] ?? '') === $id) { $partner = $p; break; }
  }

  // Gallery (max 10 stored by admin)
  $gallery = [];
  if ($partner && !empty($partner['gallery']) && is_array($partner['gallery'])) {
    $gallery = array_values(array_filter($partner['gallery'], fn($x) => is_string($x) && trim($x) !== ''));
  }

  // Other partners (scrollable)
  $others = [];
  if ($partner) {
    foreach ($partners as $p) {
      if (($p['id'] ?? '') !== ($partner['id'] ?? '')) $others[] = $p;
    }
    $others = array_values($others);
  }
?>

<main>
  <section class="op-detail-hero2">
    <div class="container-fluid px-3 px-lg-5">

      <div class="op-breadcrumb">
        <a href="organisational-partnership.php">Organisational Partnership</a>
        <span class="op-sep">›</span>
        <span class="op-current"><?= htmlspecialchars($partner['name'] ?? 'Partner Detail'); ?></span>
      </div>

      <?php if(!$partner): ?>
        <div class="op-detail-card2">
          <h1 class="op-detail-title2 mb-2">Partner not found</h1>
          <p class="text-muted mb-0">The partner you’re looking for does not exist or was removed.</p>
          <div class="mt-3">
            <a href="organisational-partnership.php" class="btn btn-primary rounded-pill">Back to Partners</a>
          </div>
        </div>
      <?php else: ?>

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
                <!-- <span class="op-badge">Organisational Partner</span> -->
                <?php if (!empty($partner['id'])): ?>
                  <!-- <span class="op-badge op-badge-soft">ID: <?= htmlspecialchars($partner['id']); ?></span> -->
                <?php endif; ?>
              </div>

              <h1 class="op-detail-title2"><?= htmlspecialchars($partner['name'] ?? ''); ?></h1>

              <div class="op-detail-actions2">
                <?php if (!empty($partner['website'])): ?>
                  <a class="btn btn-primary rounded-pill" href="<?= htmlspecialchars($partner['website']); ?>" target="_blank" rel="noopener">
                    Visit Website
                  </a>
                <?php endif; ?>
                <a class="btn btn-outline-secondary rounded-pill" href="organisational-partnership.php">
                  Back to Partners
                </a>
              </div>
            </div>
          </div>

          <hr class="op-hr2">

          <!-- About + Gallery (2 columns if gallery exists) -->
          <div class="row g-4 align-items-start">
            <div class="<?= count($gallery) ? 'col-12 col-lg-6' : 'col-12' ?>">
              <h2 class="op-detail-h2">About the Organisation</h2>

              <?php if (!empty($partner['about'])): ?>
                <p class="op-detail-about2 mb-0">
                  <?= nl2br(htmlspecialchars($partner['about'])); ?>
                </p>
              <?php else: ?>
                <p class="text-muted mb-0">No detail information has been added for this partner yet.</p>
              <?php endif; ?>
            </div>

            <?php if (count($gallery) > 0): ?>
              <div class="col-12 col-lg-6">
                <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
                  <h2 class="op-detail-h2 mb-0">Gallery Section</h2>
                  <div class="text-muted small"><?= count($gallery) ?> image(s)</div>
                </div>

                <div class="op-gallery-grid2 mt-2" aria-label="Partner gallery">
                  <?php foreach ($gallery as $idx => $img): ?>
                    <button
                      type="button"
                      class="op-gallery-item2"
                      data-bs-toggle="modal"
                      data-bs-target="#galleryLightbox"
                      data-full="<?= htmlspecialchars($img); ?>"
                      data-cap="<?= htmlspecialchars(($partner['name'] ?? 'Partner') . ' — Image ' . ($idx + 1)); ?>"
                      aria-label="Open gallery image <?= $idx + 1 ?>"
                    >
                      <img
                        src="<?= htmlspecialchars($img); ?>"
                        alt="Gallery image <?= $idx + 1 ?>"
                        loading="lazy"
                        onerror="this.style.display='none';"
                      />
                      <span class="op-gallery-shine"></span>
                      <span class="op-gallery-zoom">+</span>
                    </button>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; ?>
          </div>

        </div>

        <!-- Other Partners (scroll) -->
        <?php if (count($others) > 0): ?>
          <div class="op-other-wrap2">
            <div class="op-other-head2">
              <h2 class="op-other-title2">Other Partners</h2>
              <a class="op-other-link2" href="organisational-partnership.php">View all</a>
            </div>

            <div class="op-other-scroll">
              <?php foreach ($others as $o): ?>
                <a class="op-other-card2" href="partner-detail.php?id=<?= urlencode($o['id']); ?>">
                  <div class="op-other-logo2">
                    <img
                      src="<?= htmlspecialchars($o['logo'] ?? ''); ?>"
                      alt="<?= htmlspecialchars($o['name'] ?? ''); ?>"
                      loading="lazy"
                      onerror="this.src='images/global/placeholder.png';"
                    />
                  </div>
                  <div class="op-other-name2"><?= htmlspecialchars($o['name'] ?? ''); ?></div>
                </a>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

      <?php endif; ?>

    </div>
  </section>
</main>

<style>
/* Page wrap */
.op-detail-hero2{
  padding: 26px 0 52px;
  background: linear-gradient(180deg, rgba(13,110,253,.10), rgba(255,255,255,0) 55%);
}

/* Breadcrumb */
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

/* Card */
.op-detail-card2{
  background: #fff;
  border: 1px solid rgba(0,0,0,.08);
  border-radius: 18px;
  padding: 18px;
  box-shadow: 0 12px 30px rgba(0,0,0,.06);
}

/* Top section */
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
.op-detail-meta2{ min-width: 0; flex: 1 1 auto; }
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
}

/* Gallery: 3 images per row + vertical scroll */
.op-gallery-grid2{
  --gap: 12px;

  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: var(--gap);

  max-height: 380px;
  overflow-y: auto;
  overflow-x: hidden;

  padding-right: 6px;
  scroll-snap-type: y mandatory;
  -webkit-overflow-scrolling: touch;
}

.op-gallery-item2{
  scroll-snap-align: start;
  scroll-snap-stop: always;

  position: relative;
  border: 0;
  padding: 0;
  width: 100%;
  border-radius: 16px;
  overflow: hidden;
  cursor: pointer;
  background: #f8fafc;
  border: 1px solid rgba(0,0,0,.10);
  box-shadow: 0 10px 25px rgba(0,0,0,.06);
  transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
}
.op-gallery-item2:hover{
  transform: translateY(-2px);
  box-shadow: 0 18px 44px rgba(0,0,0,.14);
  border-color: rgba(13,110,253,.22);
}
.op-gallery-item2 img{
  width: 100%;
  height: 160px;
  object-fit: cover;
  display: block;
  transform: scale(1);
  transition: transform .28s ease;
}
.op-gallery-item2:hover img{
  transform: scale(1.05);
}

/* Shine overlay */
.op-gallery-shine{
  position:absolute;
  inset:0;
  background: linear-gradient(120deg, rgba(255,255,255,0) 0%, rgba(255,255,255,.20) 45%, rgba(255,255,255,0) 70%);
  transform: translateX(-120%);
  transition: transform .5s ease;
  pointer-events:none;
}
.op-gallery-item2:hover .op-gallery-shine{
  transform: translateX(120%);
}

/* Zoom badge */
.op-gallery-zoom{
  position:absolute;
  right: 10px;
  bottom: 10px;
  width: 30px;
  height: 30px;
  border-radius: 999px;
  display:flex;
  align-items:center;
  justify-content:center;
  font-weight: 900;
  color:#fff;
  background: rgba(17,24,39,.72);
  border: 1px solid rgba(255,255,255,.22);
  backdrop-filter: blur(4px);
}

/* Nicer vertical scrollbar */
.op-gallery-grid2::-webkit-scrollbar{
  width: 10px;
}
.op-gallery-grid2::-webkit-scrollbar-track{
  background: rgba(0,0,0,.06);
  border-radius: 999px;
}
.op-gallery-grid2::-webkit-scrollbar-thumb{
  background: rgba(13,110,253,.35);
  border-radius: 999px;
}

/* Other partners scroll */
.op-other-wrap2{ margin-top: 18px; }
.op-other-head2{
  display:flex;
  align-items: baseline;
  justify-content: space-between;
  gap: 12px;
  margin: 0 0 10px;
}
.op-other-title2{ font-weight: 900; margin: 0; }
.op-other-link2{ font-weight: 800; text-decoration: none; }
.op-other-link2:hover{ text-decoration: underline; }

.op-other-scroll{
  display: grid;
  grid-auto-flow: column;
  grid-auto-columns: 280px;
  gap: 12px;
  overflow-x: auto;
  padding-bottom: 8px;
  scroll-snap-type: x mandatory;
  -webkit-overflow-scrolling: touch;
}
.op-other-card2{
  scroll-snap-align: start;
  text-decoration: none;
  background: #fff;
  border: 1px solid rgba(0,0,0,.08);
  border-radius: 16px;
  padding: 12px;
  box-shadow: 0 10px 25px rgba(0,0,0,.05);
  transition: transform .15s ease, box-shadow .15s ease, border-color .15s ease;
  display:flex;
  gap: 10px;
  align-items:center;
}
.op-other-card2:hover{
  transform: translateY(-2px);
  box-shadow: 0 18px 40px rgba(0,0,0,.10);
  border-color: rgba(13,110,253,.22);
}
.op-other-logo2{
  width: 74px;
  height: 52px;
  border-radius: 12px;
  border: 1px solid rgba(0,0,0,.06);
  background: #f8fafc;
  overflow: hidden;
  display:flex;
  align-items:center;
  justify-content:center;
  flex: 0 0 auto;
}
.op-other-logo2 img{
  width: 100%;
  height: 100%;
  object-fit: contain;
  padding: 8px;
  background:#fff;
}
.op-other-name2{
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

/* Responsive */
@media (max-width: 991.98px){
  .op-other-scroll{ grid-auto-columns: 78%; }
  .op-gallery-grid2{ grid-template-columns: repeat(2, minmax(0, 1fr)); }
  .op-gallery-item2 img{ height: 150px; }
}
@media (max-width: 575.98px){
  .op-detail-logo2{ width: 120px; height: 88px; }
  .op-other-scroll{ grid-auto-columns: 86%; }
  .op-gallery-grid2{ grid-template-columns: 1fr; max-height: 420px; }
  .op-gallery-item2 img{ height: 160px; }
}
</style>

<script>
  // Uses Bootstrap modal in your footer: #galleryLightbox
  document.addEventListener("DOMContentLoaded", function(){
    const modal = document.getElementById("galleryLightbox");
    const imgEl = document.getElementById("galleryLightboxImg");
    const capEl = document.getElementById("galleryLightboxCap");
    if (!modal || !imgEl || !capEl) return;

    document.querySelectorAll(".op-gallery-item2").forEach(btn => {
      btn.addEventListener("click", function(){
        const full = this.getAttribute("data-full") || "";
        const cap  = this.getAttribute("data-cap") || "";
        imgEl.src = full;
        imgEl.alt = cap;
        capEl.textContent = cap;
      });
    });

    modal.addEventListener("hidden.bs.modal", function(){
      imgEl.src = "";
      imgEl.alt = "";
      capEl.textContent = "";
    });
  });
</script>

<?php include "footer.php"; ?>