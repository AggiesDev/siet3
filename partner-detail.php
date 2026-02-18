<?php
  $active = 'organisational-partnership';
  $page_css = ['organisational-partnership.css'];
  include "header.php";

  include "partners-data.php";

  $id = $_GET['id'] ?? '';
  $partner = null;

  foreach($partners as $p){
    if ($p['id'] === $id) { $partner = $p; break; }
  }
?>

<main>
  <section class="op-detail-hero">
    <div class="container">
      <a class="op-back" href="organisational-partnership.php">← Back to Organisational Partnership</a>

      <?php if(!$partner): ?>
        <div class="op-detail-card">
          <h1 class="op-detail-title">Partner not found</h1>
          <p class="text-muted mb-0">The partner you’re looking for does not exist.</p>
        </div>
      <?php else: ?>
        <div class="op-detail-card">
          <div class="op-detail-top">
            <div class="op-detail-logo">
              <img src="<?= htmlspecialchars($partner['logo']); ?>" alt="<?= htmlspecialchars($partner['name']); ?>">
            </div>

            <div class="op-detail-meta">
              <h1 class="op-detail-title"><?= htmlspecialchars($partner['name']); ?></h1>
              <p class="op-detail-subtitle text-muted mb-3">
                Organisational Partner / Corporate Member
              </p>

              <?php if(!empty($partner['website'])): ?>
                <a class="btn btn-primary btn-sm rounded-pill" href="<?= htmlspecialchars($partner['website']); ?>" target="_blank" rel="noopener">
                  Visit Website
                </a>
              <?php endif; ?>
            </div>
          </div>

          <hr class="my-4">

          <h2 class="op-detail-h2">About</h2>
          <p class="op-detail-about">
            <?= nl2br(htmlspecialchars($partner['about'])); ?>
          </p>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php include "footer.php"; ?>