<?php
  $active = 'news';
  $page_css = ['sections.css'];
  include 'header.php';

  $news = [
    [
      'id' => 'membership-drive',
      'title' => 'SIET Membership Drive 2026',
      'date' => 'Jan 2026',
      'summary' => 'Learn about SIET membership grades, professional certifications, and global recognition pathways.',
      'image' => 'images/1.jpg'
    ],
    [
      'id' => 'cpd-renewal',
      'title' => 'Renewal & CPD Reminder',
      'date' => 'Jan 2026',
      'summary' => 'Certified Professionals are reminded to plan CPD hours and renew registration within the required period.',
      'image' => 'images/1.jpg'
    ],
    [
      'id' => 'global-network',
      'title' => 'Global Network Updates',
      'date' => '2025',
      'summary' => 'SIET continues strengthening global affiliations and recognitions with professional bodies worldwide.',
      'image' => 'images/1.jpg'
    ],
  ];
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">News</h1>
    <p class="text-muted mb-0">Latest updates, announcements and highlights from SIET.</p>
  </div>
</section>

<section class="section-pad">
  <div class="container">
    <div class="row g-4">
      <?php foreach ($news as $n): ?>
        <div class="col-md-4">
          <a class="link-card" href="news-detail.php?id=<?php echo urlencode($n['id']); ?>">
            <div class="doc-card h-100 card-hover">
              <img class="doc-thumb img-hover" src="<?php echo htmlspecialchars($n['image']); ?>" alt="<?php echo htmlspecialchars($n['title']); ?>" />
              <div class="p-3">
                <div class="meta-row mb-2">
                  <span class="pill"><?php echo htmlspecialchars($n['date']); ?></span>
                </div>
                <h5 class="mb-2"><?php echo htmlspecialchars($n['title']); ?></h5>
                <p class="text-muted mb-0"><?php echo htmlspecialchars($n['summary']); ?></p>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="callout mt-4">
      <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
        <div>
          <h4 class="mb-1">Want to publish a news item?</h4>
          <p class="text-muted mb-0">This section is structured for easy update by a non-technical user (replace arrays or connect to CMS later).</p>
        </div>
        <a class="btn btn-primary btn-download" href="publications-media.php">View Media Releases</a>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
