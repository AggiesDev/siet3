<?php
  $active = 'news';
  $page_css = ['sections.css'];
  include 'header.php';
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Sponsorship</h1>
    <p class="text-muted mb-0">Partner with SIET today. Publish your logo with pride. Together, We can Achieve More.</p>
  </div>
</section>

<section class="section-pad">
  <div class="container">

    
    <!-- ======================
         KEEP YOUR EXISTING DESIGN (no design changes)
         ====================== -->
    <div class="row g-4 mt-1">
      <div class="col-lg-8">

        <div class="lead-card h-100">
          <!-- ======================
         UPDATED CONTENT 
         ====================== -->
    <div class="lead-card">
      <p class="mb-3">
        Under the Constitution and Bye-laws, it is lawful for the Institute to receive gifts, donations and bequests in furtherance of its objectives,
        provided that such acceptances do not contravene any law that is in force in Singapore.
        Every sponsorship is not just lawful, but purposeful: it strengthens SIET’s mission and fuels our vision.
      </p>

      <h4 class="mb-2">Why Sponsor SIET?</h4>

      <ol class="text-muted mb-0">
        <li><strong>Empower Careers:</strong> Recognition, growth, and professional pathways for technologists and technicians.</li>
        <li><strong>Fuel Innovation:</strong> Scholarships, awards, technology activities, workshops, and initiatives that drive progress.</li>
        <li><strong>Open Doors:</strong> Scholarships and awards help aspiring professionals achieve their dreams and celebrate excellence.</li>
        <li><strong>Build Community:</strong> Strengthen an inclusive network across generations and disciplines.</li>
        <li><strong>Go Global:</strong> Expand partnerships and connections across industries and nations.</li>
        <li><strong>Show Your Commitment:</strong> Your logo will shine on SIET platforms, reflecting your dedication to excellence and community.</li>
      </ol>

      <p class="mt-3 mb-0">
        Sponsoring SIET means investing in people, innovation, and the future of technology.
        Together, we shape a future built on collaboration, compassion, and achievement.
      </p>

      <p class="mt-3 fw-bold mb-0">
        ✨ Partner with SIET today. Publish your logo with pride. Elevate your impact with us. Together, We can Achieve More. ✨
      </p>
    </div>

          <h5 class="mb-3">How to confirm your Sponsorship</h5>
          <ol class="text-muted mb-0">
            <li>Download and complete the Sponsorship Application Form.</li>
            <li>Prepare your company logo (high-resolution PNG or SVG preferred).</li>
            <li>Email the completed form, payment transaction details, and logo for publishing on the SIET website.</li>
          </ol>

          <div class="mt-3 d-flex flex-column flex-sm-row gap-2">
            <a class="btn btn-primary btn-download" href="assets/pdfs/SIET_Sponsorship_Application_Form_2026.pdf" download>
              Download Sponsorship Form (PDF)
            </a>
            <!-- <a class="btn btn-outline-primary btn-download" href="publications-media.php">
              View Media Releases
            </a> -->
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="lead-card h-100">
          <h5 class="mb-3">Sponsor Showcase</h5>
          <p class="text-muted">Sample layout (replace with real sponsor logos anytime).</p>
          <div class="gallery-grid">
            <?php for ($i=1; $i<=6; $i++): ?>
              <div class="gallery-item">
                <img src="images/1.jpg" alt="Sponsor Logo <?php echo $i; ?>" class="img-hover" />
                <div class="cap">Sponsor <?php echo $i; ?></div>
              </div>
            <?php endfor; ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<?php include 'footer.php'; ?>
