<?php
  $active = 'news';
  $page_css = ['sections.css'];
  include 'header.php';

  include 'events-data.php';

  $data = load_events_data();
  $events = $data['events'] ?? [];

  $groups = [];
  foreach ($events as $e){
    $cat = $e['category'] ?? 'Other';
    $groups[$cat][] = $e;
  }
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Events</h1>
    <p class="text-muted mb-0">Events can include talks, seminars, conferences, and activities with photos/videos.</p>
  </div>
</section>
<br>
<section class="section-pad">
  <div class="container">

    <!-- NEW: top action row (Gallery removed) -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
      <div>
        <h2 class="section-title mb-1">Event Listings</h2>
        <p class="text-muted mb-0">Browse upcoming, special and past events.</p>
      </div>

      <div class="d-flex gap-2 flex-wrap">

        <!-- Admin button -->
        <a href="event-admin.php" class="btn btn-outline-primary rounded-pill px-4 btn-lg">
          Edit Events
        </a>
      </div>
    </div>

    <?php foreach($groups as $cat => $list): ?>
      <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
        <h4 class="mb-0"><?php echo htmlspecialchars($cat); ?></h4>
        <span class="pill"><?php echo count($list); ?> item(s)</span>
      </div>

      <div class="row g-4 mb-4">
        <?php foreach($list as $e): ?>
          <div class="col-md-4">
            <a class="link-card" href="event-detail.php?id=<?php echo urlencode($e['id'] ?? ''); ?>">
              <div class="doc-card h-100 card-hover">
                <img class="doc-thumb" src="<?php echo htmlspecialchars($e['image'] ?? 'images/1.jpg'); ?>" alt="<?php echo htmlspecialchars($e['title'] ?? ''); ?>" />
                <div class="p-3">
                  <div class="meta-row mb-2">
                    <span class="badge-soft"><?php echo htmlspecialchars($e['date'] ?? ''); ?></span>
                    <span class="text-muted small"><?php echo htmlspecialchars($e['location'] ?? ''); ?></span>
                  </div>
                  <h5 class="mb-1"><?php echo htmlspecialchars($e['title'] ?? ''); ?></h5>
                  <p class="text-muted mb-0"><?php echo htmlspecialchars($e['summary'] ?? ''); ?></p>
                </div>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>

    <!-- <div class="callout mt-3">
      <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
        <div>
          <h4 class="mb-1">Need to add photos or videos?</h4>
          <p class="text-muted mb-0">This page supports gallery, downloads and YouTube videos in each event detail.</p>
        </div>
        <a class="btn btn-primary btn-download" href="publications-circulars.php">View Circulars</a>
      </div>
    </div> -->

  </div>
</section>
<br>
<?php include 'footer.php'; ?>