<?php
  $active = 'news';
  $page_css = ['sections.css'];
  include 'header.php';

  $events = [
    [
      'id' => 'talk-ethics',
      'category' => 'Upcoming Events',
      'title' => 'Professional Ethics & Competency Talk',
      'date' => 'Feb 2026',
      'location' => 'Singapore',
      'summary' => 'An overview of the SIET–TPC pathway and ethics preparation resources.',
      'image' => 'images/1.jpg'
    ],
    [
      'id' => 'seminar-cpd',
      'category' => 'Special Events',
      'title' => 'CPD Planning Workshop',
      'date' => 'Mar 2026',
      'location' => 'Online',
      'summary' => 'How to plan your CPD hours, track PDU, and renew certification smoothly.',
      'image' => 'images/1.jpg'
    ],
    [
      'id' => 'networking-night',
      'category' => 'Past Events',
      'title' => 'Global Networking Night',
      'date' => '2025',
      'location' => 'Singapore',
      'summary' => 'Highlights from SIET’s engagement with global partners and technologists.',
      'image' => 'images/1.jpg'
    ],
  ];

  $gallery = [
    ['title'=>'Seminars & Talks', 'image'=>'images/1.jpg'],
    ['title'=>'Professional Sharing', 'image'=>'images/1.jpg'],
    ['title'=>'Community & Networking', 'image'=>'images/1.jpg'],
    ['title'=>'Industry Visits', 'image'=>'images/1.jpg'],
    ['title'=>'Training Sessions', 'image'=>'images/1.jpg'],
    ['title'=>'Awards & Recognition', 'image'=>'images/1.jpg'],
  ];

  $groups = [];
  foreach ($events as $e){
    $groups[$e['category']][] = $e;
  }
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Events</h1>
    <p class="text-muted mb-0">Events can include talks, seminars, conferences, and activities with photos/videos.</p>
  </div>
</section>

<section class="section-pad">
  <div class="container">
    <h2 class="section-title mb-3">Gallery</h2>
    <div class="gallery-grid mb-5">
      <?php foreach($gallery as $g): ?>
        <div class="gallery-item">
          <img class="img-hover" src="<?php echo htmlspecialchars($g['image']); ?>" alt="<?php echo htmlspecialchars($g['title']); ?>" />
          <div class="cap"><?php echo htmlspecialchars($g['title']); ?></div>
        </div>
      <?php endforeach; ?>
    </div>

    <h2 class="section-title mb-3">Event Listings</h2>

    <?php foreach($groups as $cat => $list): ?>
      <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
        <h4 class="mb-0"><?php echo htmlspecialchars($cat); ?></h4>
        <span class="pill"><?php echo count($list); ?> item(s)</span>
      </div>
      <div class="row g-4 mb-4">
        <?php foreach($list as $e): ?>
          <div class="col-md-4">
            <a class="link-card" href="event-detail.php?id=<?php echo urlencode($e['id']); ?>">
              <div class="doc-card h-100 card-hover">
                <img class="doc-thumb" src="<?php echo htmlspecialchars($e['image']); ?>" alt="<?php echo htmlspecialchars($e['title']); ?>" />
                <div class="p-3">
                  <div class="meta-row mb-2">
                    <span class="badge-soft"><?php echo htmlspecialchars($e['date']); ?></span>
                    <span class="text-muted small"><?php echo htmlspecialchars($e['location']); ?></span>
                  </div>
                  <h5 class="mb-1"><?php echo htmlspecialchars($e['title']); ?></h5>
                  <p class="text-muted mb-0"><?php echo htmlspecialchars($e['summary']); ?></p>
                </div>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>

    <div class="callout mt-3">
      <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
        <div>
          <h4 class="mb-1">Need to add photos or videos?</h4>
          <p class="text-muted mb-0">This page is built for easy upgrades: replace images or connect to a CMS later.</p>
        </div>
        <a class="btn btn-primary btn-download" href="publications-circulars.php">View Circulars</a>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
