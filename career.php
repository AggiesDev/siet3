<?php
  $active = 'news';
  $page_css = ['sections.css'];
  include 'header.php';

  $jobs = [
    ['id'=>'job1','title'=>'Engineering Technologist (Civil)','type'=>'Full-time','location'=>'Singapore','summary'=>'Support planning, coordination and site execution with strong practical skills.'],
    ['id'=>'job2','title'=>'Engineering Technician (Mechanical)','type'=>'Contract','location'=>'Singapore','summary'=>'Assist operations, maintenance and testing with hands-on competence.'],
    ['id'=>'job3','title'=>'IT Technologist (Systems)','type'=>'Internship','location'=>'Online / Hybrid','summary'=>'Support systems, data and security work aligned with practical technology skills.'],
  ];
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Career Opportunities</h1>
    <p class="text-muted mb-0">Browse opportunities and share openings with the SIET community.</p>
  </div>
</section>

<section class="section-pad">
  <div class="container">
    <div class="row g-4">
      <?php foreach ($jobs as $j): ?>
        <div class="col-md-6 col-lg-4">
          <a class="link-card" href="career-detail.php?id=<?php echo urlencode($j['id']); ?>">
            <div class="lead-card h-100 card-hover">
              <div class="meta-row mb-2">
                <span class="pill"><?php echo htmlspecialchars($j['type']); ?></span>
                <span class="pill">📍 <?php echo htmlspecialchars($j['location']); ?></span>
              </div>
              <h5 class="mb-2"><?php echo htmlspecialchars($j['title']); ?></h5>
              <p class="text-muted mb-0"><?php echo htmlspecialchars($j['summary']); ?></p>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="callout mt-4">
      <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
        <div>
          <h4 class="mb-1">Have a job to share?</h4>
          <p class="text-muted mb-0">This page uses a simple array for now. You can later connect it to an admin upload panel.</p>
        </div>
        <a class="btn btn-primary btn-download" href="publications-circulars.php">Post via Circulars</a>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
