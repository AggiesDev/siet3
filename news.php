<?php
  $active = 'news';
  $page_css = ['sections.css'];
  include 'header.php';

  include 'news-data.php';

  $data = load_news_data();
  $items = $data['news'] ?? [];

  // group by category
  $groups = [];
  foreach ($items as $n){
    $cat = $n['category'] ?? 'Other';
    $groups[$cat][] = $n;
  }
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">News</h1>
    <p class="text-muted mb-0">Latest updates, announcements, and highlights from SIET.</p>
  </div>
</section>
<br>
<section class="section-pad">
  <div class="container">

    <!-- Top action row -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
      <div>
        <h2 class="section-title mb-1">News Listings</h2>
        <p class="text-muted mb-0">Browse by category and open each news item for details.</p>
      </div>

      <div class="d-flex gap-2 flex-wrap">
        <a href="news-admin.php" class="btn btn-outline-primary rounded-pill px-4 btn-lg">
          Edit News
        </a>
      </div>
    </div>

    <?php if (count($items) === 0): ?>
      <div class="callout">
        <h4 class="mb-1">No news yet</h4>
        <p class="text-muted mb-0">Add your first news item in the admin panel.</p>
      </div>
    <?php endif; ?>

    <?php foreach($groups as $cat => $list): ?>
      <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
        <h4 class="mb-0"><?php echo htmlspecialchars($cat); ?></h4>
        <span class="pill"><?php echo count($list); ?> item(s)</span>
      </div>

      <div class="row g-4 mb-4">
        <?php foreach($list as $n): ?>
          <div class="col-md-4">
            <a class="link-card" href="news-detail.php?id=<?php echo urlencode($n['id'] ?? ''); ?>">
              <div class="doc-card h-100 card-hover">
                <img class="doc-thumb" src="<?php echo htmlspecialchars($n['image'] ?? 'images/1.jpg'); ?>" alt="<?php echo htmlspecialchars($n['title'] ?? ''); ?>" />
                <div class="p-3">
                  <div class="meta-row mb-2">
                    <span class="badge-soft"><?php echo htmlspecialchars($n['date'] ?? ''); ?></span>
                    <span class="text-muted small"><?php echo htmlspecialchars($n['location'] ?? ''); ?></span>
                  </div>
                  <h5 class="mb-1"><?php echo htmlspecialchars($n['title'] ?? ''); ?></h5>
                  <p class="text-muted mb-0"><?php echo htmlspecialchars($n['summary'] ?? ''); ?></p>
                </div>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>

  </div>
</section>

<?php include 'footer.php'; ?>