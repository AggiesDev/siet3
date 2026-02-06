<?php
  $active = 'news';
  $page_css = ['sections.css'];
  include 'header.php';

  $items = [
    'membership-drive' => [
      'title' => 'SIET Membership Drive 2026',
      'date' => 'Jan 2026',
      'image' => 'images/1.jpg',
      'body' => [
        'SIET professional membership is more than a credential. It connects technologists and technicians to a trusted network, pathways to certification, and global recognition.',
        'Explore membership grades, fees, and admission criteria under the Membership tab. If you are unsure which pathway fits you, start with Membership Pathways and the Mature Candidate Scheme pages.'
      ]
    ],
    'cpd-renewal' => [
      'title' => 'Renewal & CPD Reminder',
      'date' => 'Jan 2026',
      'image' => 'images/1.jpg',
      'body' => [
        'Certified Professionals are encouraged to track CPD activities early and ensure renewal requirements are met.',
        'Reminder: CPD renewal is measured in PDU units; and membership renewal is required to keep professional certification valid.'
      ]
    ],
    'global-network' => [
      'title' => 'Global Network Updates',
      'date' => '2025',
      'image' => 'images/1.jpg',
      'body' => [
        'SIET continues building partnerships and recognition pathways with global professional bodies.',
        'Visit the Global Network pages to see founding memberships, recognitions, affiliations and link directories.'
      ]
    ],
  ];

  $id = $_GET['id'] ?? 'membership-drive';
  $post = $items[$id] ?? reset($items);
?>

<section class="page-hero">
  <div class="container py-5">
    <div class="meta-row mb-2">
      <span class="pill">News</span>
      <span class="text-muted">• <?php echo htmlspecialchars($post['date']); ?></span>
    </div>
    <h1 class="mb-0"><?php echo htmlspecialchars($post['title']); ?></h1>
  </div>
</section>

<section class="section-pad">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-7">
        <img src="<?php echo htmlspecialchars($post['image']); ?>" class="w-100 rounded-4 img-hover" alt="<?php echo htmlspecialchars($post['title']); ?>" />
        <div class="lead-card mt-4">
          <?php foreach ($post['body'] as $p): ?>
            <p class="text-muted mb-3"><?php echo htmlspecialchars($p); ?></p>
          <?php endforeach; ?>

          <div class="d-flex flex-wrap gap-2">
            <a class="btn btn-outline-primary btn-download" href="news.php">← Back to News</a>
            <a class="btn btn-primary btn-download" href="events.php">View Events</a>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="lead-card">
          <h5 class="mb-2">Quick Links</h5>
          <ul class="feature-list mb-0">
            <li><a href="why-member.php">Why Become SIET Member</a></li>
            <li><a href="membership-fees.php">Membership Fees</a></li>
            <li><a href="cpd-renewal.php">Renewal &amp; CPD</a></li>
            <li><a href="global-founding.php">Global Network</a></li>
          </ul>
        </div>

        <div class="lead-card mt-4">
          <h5 class="mb-2">Downloads</h5>
          <p class="text-muted mb-3">Placeholder documents are provided so buttons work immediately.</p>
          <a class="btn btn-primary btn-download" href="downloadables/forms/siet_membership_application_form.pdf" download>Download Membership Application (PDF)</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
