<?php
  $active = 'cert';
  $page_css = ['sections.css'];
  include 'header.php';
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Directory of Professionals</h1>
    <p class="text-muted mb-0">
      List of practicing professionals registered under SIET Certification Scheme.
    </p>
  </div>
</section>

<section class="section-pad">
  <div class="container">

    <!-- ======================
         NEW: Certification Scheme Summary (from your uploaded slides)
         ====================== -->
    <div class="row g-4 mb-4">
      <div class="col-12">
        <div class="lead-card cert-summary">
          <h2 class="cert-summary-title mb-2">SIET Professional Certification Scheme</h2>

          <p class="cert-p">
            Established in 2008 and officially launched in 2009, SIET’s Professional Certification Scheme upholds industry
            standards and promotes professional excellence. Complementing this, the Examination &amp; Accreditation Board (EAB),
            instituted in 2008, rigorously reviews and assesses institutional qualifications to safeguard the quality and integrity
            of engineering education and training.
          </p>

          <p class="cert-p mb-2">
            <strong>Three levels</strong> of SIET Certification Scheme for Engineering and IT Professionals are:
          </p>
          <ul class="cert-ul">
            <li>Level 1 – Certified Engineering Associate (<span class="cert-code">CertEA</span>) for ‘Engineering Technician’;</li>
            <li>Level 2 – Certified Engineering Technologist (<span class="cert-code">CertET</span>) for ‘Engineering Technologist’; and</li>
            <li>Level 3 – Certified Technical Specialist (<span class="cert-code">CertTS</span>) for ‘Technical Engineer’.</li>
          </ul>

          <h3 class="cert-h3">Assessment Process</h3>
          <p class="cert-p">
            All applicants are assessed by a Committee of members and via a professional report and an interview or a written test on
            <strong>‘Engineering Ethics’</strong> for registration as <span class="cert-code">CertTS</span> and <span class="cert-code">CertET</span>
            respectively. For <span class="cert-code">CertTN</span>, it will be assessed based on written case studies and passing multiple choice
            questions (MCQs) on <strong>‘Engineering Ethics’</strong>.
          </p>

          <ul class="cert-ul">
            <li>Professional report evaluation</li>
            <li>Part A: Written case studies and MCQs on Engineering Ethics (for <span class="cert-code">CertTN</span>)</li>
            <li>Part B: Interview or written test on Engineering Ethics (for <span class="cert-code">CertTS</span> and <span class="cert-code">CertET</span>)</li>
          </ul>

          <h3 class="cert-h3">Continuous Professional Development (CPD)</h3>
          <p class="cert-p mb-0">
            All members registered under SIET Certification Scheme are required to attend <strong>at least 20 PDU units</strong> or its equivalent
            over a period of three consecutive years to renew its registration. <strong>[1 PDU = 3 hours of CPD]</strong>
          </p>

          <!-- NEW: Download button (good design + good position) -->
          <div class="cert-actions mt-3">
            <a class="btn btn-primary cert-btn" href="assets/pdfs/SIET Certification _ Application Form 2025 _ R1.pdf" download>
              <span class="cert-btn-ico">⬇</span>
              Download Application Form (PDF)
            </a>
          </div>

        </div>
      </div>
    </div>

    <!-- ======================
         Directory cards (keep original structure, improved UI)
         ====================== -->
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="lead-card directory-card">
          <div class="dir-head">
            <h3 class="mb-1">Certified Engineering Technician (CertTN)</h3>
            <span class="dir-badge dir-badge-tn">CertTN</span>
          </div>
          <p class="text-muted mb-0">
            Directory listing for registered professionals under CertTN.
          </p>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="lead-card directory-card">
          <div class="dir-head">
            <h3 class="mb-1">Certified Engineering Technologist (CertET)</h3>
            <span class="dir-badge dir-badge-et">CertET</span>
          </div>
          <p class="text-muted mb-0">
            Directory listing for registered professionals under CertET.
          </p>
        </div>
      </div>

      <div class="col-12">
        <div class="lead-card directory-card">
          <div class="dir-head">
            <h3 class="mb-1">Certified Technical Specialist (CertTS)</h3>
            <span class="dir-badge dir-badge-ts">CertTS</span>
          </div>

          <p class="text-muted mb-3">
            Directory listing for registered professionals under CertTS.
          </p>

          <!-- NEW: mini filter row (optional UI, keeps design clean) -->
          <div class="dir-toolbar mb-3">
            <div class="dir-search">
              <span class="dir-search-ico">🔎</span>
              <input class="form-control dir-search-input" type="text" placeholder="Search by name / discipline (demo UI)">
            </div>
            <div class="dir-note text-muted">
              *Sample view only — replace with actual directory data.
            </div>
          </div>

          <div class="table-responsive">
            <table class="table align-middle dir-table">
              <thead>
                <tr>
                  <th style="min-width:200px;">Name</th>
                  <th style="width:110px;">Grade</th>
                  <th style="min-width:220px;">Discipline</th>
                  <th style="width:120px;">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="dir-name">Sample Professional</td>
                  <td><span class="badge text-bg-primary">CertTS</span></td>
                  <td>Mechanical Engineering</td>
                  <td><span class="badge text-bg-success">Current</span></td>
                </tr>
                <tr>
                  <td class="dir-name">Sample Professional</td>
                  <td><span class="badge text-bg-info">CertET</span></td>
                  <td>Civil Engineering</td>
                  <td><span class="badge text-bg-secondary">Pending</span></td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>

  </div>
</section>

<!-- =========================================================
     PAGE CSS
     ========================================================= -->
<style>
  .cert-summary{
    border: 1px solid rgba(0,0,0,.08);
    box-shadow: 0 18px 35px rgba(0,0,0,.08);
    border-radius: 12px;
  }

  .cert-summary-title{
    font-weight: 900;
    letter-spacing: .2px;
    color: #111827;
  }

  .cert-p{
    margin: 0 0 14px 0;
    line-height: 1.65;
    color: #111;
  }

  .cert-ul{
    margin: 0 0 14px 22px;
    padding: 0;
    line-height: 1.65;
    color: #111;
  }

  .cert-h3{
    margin: 14px 0 8px 0;
    font-weight: 900;
    color: #111827;
  }

  .cert-code{
    font-weight: 900;
    text-decoration: underline;
  }

  /* Download button */
  .cert-actions{
    display: flex;
    justify-content: flex-end;
    gap: 10px;
  }

  .cert-btn{
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 10px 14px;
    border-radius: 12px;
    font-weight: 900;
    box-shadow: 0 14px 26px rgba(0,0,0,.12);
    border: 1px solid rgba(13,110,253,.35);
    transition: transform .18s ease, box-shadow .18s ease, filter .18s ease;
  }
  .cert-btn:hover{
    transform: translateY(-1px);
    box-shadow: 0 18px 34px rgba(0,0,0,.18);
    filter: brightness(1.02);
  }
  .cert-btn-ico{
    width: 34px;
    height: 34px;
    border-radius: 10px;
    display: grid;
    place-items: center;
    background: rgba(255,255,255,.18);
    border: 1px solid rgba(255,255,255,.25);
  }

  /* Directory cards */
  .directory-card{
    border: 1px solid rgba(0,0,0,.08);
    box-shadow: 0 18px 35px rgba(0,0,0,.08);
    border-radius: 12px;
  }

  .dir-head{
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 6px;
  }

  .dir-badge{
    font-weight: 900;
    padding: 6px 10px;
    border-radius: 999px;
    border: 1px solid rgba(0,0,0,.12);
    background: rgba(0,0,0,.04);
    white-space: nowrap;
  }
  .dir-badge-tn{ color:#0b5ed7; background: rgba(13,110,253,.10); border-color: rgba(13,110,253,.18); }
  .dir-badge-et{ color:#198754; background: rgba(25,135,84,.10); border-color: rgba(25,135,84,.18); }
  .dir-badge-ts{ color:#a855f7; background: rgba(168,85,247,.12); border-color: rgba(168,85,247,.18); }

  .dir-toolbar{
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    flex-wrap: wrap;
  }

  .dir-search{
    display: flex;
    align-items: center;
    gap: 10px;
    background: #f8fafc;
    border: 1px solid rgba(0,0,0,.10);
    border-radius: 12px;
    padding: 8px 10px;
    min-width: 320px;
    box-shadow: 0 10px 18px rgba(0,0,0,.05);
  }

  .dir-search-ico{ font-size: 16px; opacity: .85; }

  .dir-search-input{
    border: 0 !important;
    box-shadow: none !important;
    background: transparent !important;
    padding: 0 !important;
  }

  .dir-table thead th{
    font-weight: 900;
    background: #f8fafc;
    white-space: nowrap;
  }

  .dir-name{ font-weight: 800; }

  @media (max-width: 576px){
    .cert-actions{ justify-content: stretch; }
    .cert-btn{ width: 100%; justify-content: center; }
    .dir-search{ min-width: 100%; width: 100%; }
  }
</style>

<?php include 'footer.php'; ?>
