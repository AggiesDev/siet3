<?php
  $active = 'news';
  $page_css = ['sections.css'];
  include 'header.php';

  $events = [
    'talk-ethics' => [
      'title' => 'Professional Ethics & Competency Talk',
      'date' => 'Feb 2026',
      'location' => 'Singapore',
      'banner' => 'images/1.jpg',
      'desc' => [
        'Overview of the SIET–TPC pathway and ethics preparation resources.',
        'Includes Q&A and guidance for applicants preparing professional reports and interviews.',
      ],
      'downloads' => [
        ['Engineering Ethics Guide (PDF)', 'downloadables/guides/engineering_ethics_guide.pdf'],
      ]
    ],
    'seminar-cpd' => [
      'title' => 'CPD Planning Workshop',
      'date' => 'Mar 2026',
      'location' => 'Online',
      'banner' => 'images/1.jpg',
      'desc' => [
        'Practical steps to plan CPD activities, calculate PDU, and maintain certification renewal requirements.',
      ],
      'downloads' => []
    ],
    'networking' => [
      'title' => 'Networking Night for Technologists',
      'date' => '2025',
      'location' => 'Singapore',
      'banner' => 'images/1.jpg',
      'desc' => [
        'A past event highlight celebrating community, recognition and professional progression.',
      ],
      'downloads' => []
    ],
  ];

  $id = $_GET['id'] ?? '';
  $event = $events[$id] ?? null;
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2"><?php echo $event ? htmlspecialchars($event['title']) : 'Event Details'; ?></h1>
    <?php if ($event): ?>
      <div class="meta-row">
        <span class="pill">📅 <?php echo htmlspecialchars($event['date']); ?></span>
        <span class="pill">📍 <?php echo htmlspecialchars($event['location']); ?></span>
      </div>
    <?php else: ?>
      <p class="text-muted mb-0">Event not found. Please return to Events.</p>
    <?php endif; ?>
  </div>
</section>

<section class="section-pad">
  <div class="container">
    <?php if ($event): ?>
      <img src="<?php echo htmlspecialchars($event['banner']); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>" class="w-100 rounded-4 img-hover" style="max-height:360px; object-fit:cover;" />

      <div class="row g-4 mt-1">
        <div class="col-lg-8">
          <div class="lead-card">
            <h4 class="mb-2">About this event</h4>
            <?php foreach ($event['desc'] as $p): ?>
              <p class="text-muted mb-2"><?php echo htmlspecialchars($p); ?></p>
            <?php endforeach; ?>
          </div>

          <div class="lead-card mt-4">
            <h5 class="mb-3">Gallery</h5>
            <div class="gallery-grid">
              <?php for ($i=1; $i<=6; $i++): ?>
                <div class="gallery-item">
                  <img src="images/1.jpg" alt="Event photo <?php echo $i; ?>" class="img-hover" />
                  <div class="cap">Event Highlight <?php echo $i; ?></div>
                </div>
              <?php endfor; ?>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="lead-card">
            <h5 class="mb-2">Back</h5>
            <a class="btn btn-outline-primary w-100" href="events.php">← Back to Events</a>
          </div>

          <div class="lead-card mt-4">
            <h5 class="mb-2">Downloads</h5>
            <p class="text-muted mb-3">Files are provided as placeholders so download buttons work immediately.</p>
            <?php if (!empty($event['downloads'])): ?>
              <?php foreach ($event['downloads'] as $d): ?>
                <a class="btn btn-primary btn-download w-100 mb-2" href="<?php echo htmlspecialchars($d[1]); ?>" download><?php echo htmlspecialchars($d[0]); ?></a>
              <?php endforeach; ?>
            <?php else: ?>
              <p class="text-muted mb-0">No downloads for this event.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php else: ?>
      <div class="lead-card">
        <p class="mb-0">Please return to <a href="events.php">Events</a>.</p>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php include 'footer.php'; ?>
