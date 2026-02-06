<?php
  $active = 'pub';
  $page_css = ['sections.css'];
  include 'header.php';

  $docs = [
    ['title'=>'Media Release (Sample)','date'=>'2026','file'=>'downloadables/publications/media/media_release_sample.pdf','img'=>'images/1.jpg','desc'=>'Placeholder media release PDF for immediate download.'],
  ];
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Publications – Media Release</h1>
    <p class="text-muted mb-0">Media announcements and official statements.</p>
  </div>
</section>

<section class="section-pad">
  <div class="container">
    <div class="row g-4">
      <?php foreach ($docs as $d): ?>
        <div class="col-md-4">
          <div class="doc-card h-100">
            <img src="<?php echo htmlspecialchars($d['img']); ?>" class="doc-thumb img-hover" alt="<?php echo htmlspecialchars($d['title']); ?>" />
            <div class="p-3">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="mb-0"><?php echo htmlspecialchars($d['title']); ?></h5>
                <span class="badge-soft"><?php echo htmlspecialchars($d['date']); ?></span>
              </div>
              <p class="text-muted mb-3"><?php echo htmlspecialchars($d['desc']); ?></p>
              <a class="btn btn-primary btn-download w-100" href="<?php echo htmlspecialchars($d['file']); ?>" download>Download PDF</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="callout mt-4">
      <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
        <div>
          <h4 class="mb-1">Tip for easy uploading</h4>
          <p class="text-muted mb-0">Replace files in <code>downloadables/publications/media/</code> and update the array.</p>
        </div>
        <a class="btn btn-outline-primary btn-download" href="publications-circulars.php">Circulars &amp; Notifications</a>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
