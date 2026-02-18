<?php
  $active = 'organisational-partnership';
  $page_css = ['organisational-partnership.css'];
  include "header.php";

  include "partners-data.php";

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

<?php include "footer.php"; ?>