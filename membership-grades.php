<?php
  $active = 'membership';
  $page_css = ['sections.css'];
  include 'header.php';
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Membership Grades vs Requirements</h1>
    <p class="text-muted mb-0">A quick comparison of Qualifications (Q), Age (A), and Experience (E) for each grade.</p>
  </div>
</section>

<section class="section-pad">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="lead-card">
          <h3 class="h5 fw-bold">Associate Member (AMSIET)</h3>
          <ul class="mb-0">
            <li><strong>Q:</strong> ITE – Higher Nitec (or equivalent)</li>
            <li><strong>A:</strong> ≥ 23 years old</li>
            <li><strong>E:</strong> ≥ 3 years</li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="lead-card">
          <h3 class="h5 fw-bold">Member (MSIET)</h3>
          <ul class="mb-0">
            <li><strong>Q:</strong> Polytechnic Diploma (or equivalent)</li>
            <li><strong>A:</strong> ≥ 25 years old</li>
            <li><strong>E:</strong> ≥ 5 years</li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="lead-card">
          <h3 class="h5 fw-bold">Fellow (FSIET)</h3>
          <ul class="mb-0">
            <li><strong>Q:</strong> Polytechnic Advanced Diploma / University BTech / BEng (or equivalent)</li>
            <li><strong>A:</strong> ≥ 30 years old</li>
            <li><strong>E:</strong> ≥ 5 years in a senior position of responsibility</li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="lead-card">
          <h3 class="h5 fw-bold">Notes</h3>
          <ol class="mb-0">
            <li><strong>Mature Candidate Scheme (MCS):</strong> Alternative entry route via experience (Technical Report + Oral Exam).</li>
            <li>If you cannot enter AMSIET yet, you may start as <strong>Associate (Assoc. SIET)</strong>.</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
