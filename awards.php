<?php
  $active = 'news';
  $page_css = ['sections.css'];
  include 'header.php';

  $awards = [
    ['title'=>'SIET Scholarship','desc'=>'Support for students and emerging technologists to pursue learning and professional growth.','img'=>'images/1.jpg'],
    // ['title'=>'Osman Foundation','desc'=>'A legacy-inspired foundation supporting recognition and community impact.','img'=>'images/1.jpg'],
    // ['title'=>'Allan Ang Foundation','desc'=>'Encouraging advancement in engineering and technology through opportunities and support.','img'=>'images/1.jpg'],
  ];
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Awards</h1>
    <p class="text-muted mb-0">Scholarships and foundations supporting the profession.</p>
  </div>
</section>
<br>
<section class="section-pad">
  <div class="container">
    <div class="row g-4">
      <?php foreach ($awards as $a): ?>
        <div class="col-md-4">
          <div class="doc-card h-100">
            <img src="<?php echo htmlspecialchars($a['img']); ?>" alt="<?php echo htmlspecialchars($a['title']); ?>" class="doc-thumb img-hover" />
            <div class="p-3">
              <h5 class="mb-1"><?php echo htmlspecialchars($a['title']); ?></h5>
              <p class="text-muted mb-3"><?php echo htmlspecialchars($a['desc']); ?></p>
              <a class="btn btn-primary btn-download" href="sponsorship.php">Support This Initiative</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="callout mt-4">
      <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
        <div>
          <h4 class="mb-1">Want to sponsor awards or scholarships?</h4>
          <p class="text-muted mb-0">Download the sponsorship form and email it with your logo.</p>
        </div>
        <a class="btn btn-primary btn-download" href="downloadables/forms/siet_sponsorship_application_form.pdf" download>Download Sponsorship Form</a>
      </div>
    </div>
  </div>
</section>
<br><br>
<?php include 'footer.php'; ?>
