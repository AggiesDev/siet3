<?php
  $active = 'pub';
  $page_css = ['sections.css'];
  include 'header.php';

  $docs = [
    ['title'=>'Technical Paper (Sample)','date'=>'2026','file'=>'downloadables/publications/technical/technical_paper_sample.pdf','img'=>'images/1.jpg','desc'=>'Placeholder technical paper PDF for immediate download.'],
  ];
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Technical Papers</h1>
    <p class="text-muted mb-0">Research, knowledge-sharing, and professional learning resources.</p>
  </div>
</section>

<section class="section-pad">
  <div class="container">
    <div class="row g-4">
      <?php foreach ($docs as $d): ?>
      <div class="col-md-6 col-lg-4">
        <div class="doc-card h-100">
          <img src="<?php echo htmlspecialchars($d['img']); ?>" class="doc-thumb img-hover" alt="<?php echo htmlspecialchars($d['title']); ?>" />
          <div class="p-3">
            <div class="meta-row mb-2">
              <span class="pill">📄 PDF</span>
              <span class="pill">🗓 <?php echo htmlspecialchars($d['date']); ?></span>
            </div>
            <h5 class="mb-2"><?php echo htmlspecialchars($d['title']); ?></h5>
            <p class="text-muted mb-3"><?php echo htmlspecialchars($d['desc']); ?></p>
            <a class="btn btn-primary btn-download" href="<?php echo htmlspecialchars($d['file']); ?>" download>Download</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="callout mt-4">
      <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
        <div>
          <h4 class="mb-1">Tip for easy uploading</h4>
          <p class="text-muted mb-0">Replace files in <code>downloadables/publications/technical/</code> and update the array.</p>
        </div>
        <a class="btn btn-outline-primary btn-download" href="publications-media.php">Media Releases</a>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
