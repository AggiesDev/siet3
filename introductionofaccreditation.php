<?php
  $active = 'accred'; 
  $page_css = ['sections.css'];
  include 'header.php';
?>

<main>
<?php $page_id = 'accreditation'; ?>

<!-- ======================
     HERO
     ====================== -->
<section class="page-hero">
  <div class="container py-5">
    <span class="badge-soft mb-3 d-inline-block">Certification & Accreditation</span>
    <h1 class="mb-2">Accreditation</h1>
    <p class="text-muted mb-0">
      Accreditation with integrity, excellence, and global recognition.
    </p>
  </div>
</section>
<br>
<!-- ======================
     CONTENT
     ====================== -->
<section class="section-pad">
  <div class="container">
    <div class="row g-4">

      <!-- LEFT: Main copy -->
      <div class="col-lg-8">
        <div class="lead-card p-4 p-md-5">

          <h2 class="h5 fw-bold mb-3">Introduction</h2>

          <p class="mb-3">
            The Singapore Institute of Engineering Technologists (SIET) serves as a professional body committed to
            upholding the highest standards of recognition for ICT and engineering technologists and practitioners.
          </p>

          <p class="mb-3">
            Through its accreditation framework, SIET affirms that select academic and professional qualifications;
            both local and international, meet the rigorous criteria for membership, including eligibility for the
            distinguished Fellow (FSIET) grade.
          </p>

          <p class="mb-3">
            The SIET Accreditation Board, established in 2008 has established and revised the procedure in 2025,
            upholds the highest standards of professional and educational excellence for technologists and technicians.
            Our accreditation framework ensures that institutions and programs meet internationally recognized benchmarks,
            fostering graduates who are competent, ethical, and globally competitive.
          </p>

          <p class="mb-0">
            Accreditation is more than compliance, as it is a commitment to quality, integrity, and continuous improvement.
            By aligning with leading international standards, SIET affirms its role as a trusted Professional Body to government,
            industry, and professional bodies worldwide.
          </p>

        </div>
      </div>

      <!-- RIGHT: Quick facts / highlights -->
      <div class="col-lg-4">
        <div class="lead-card p-4">
          <h2 class="h6 fw-bold mb-3">At a glance</h2>

          <ul class="accred-facts">
            <li>
              <span class="k">Board established</span>
              <span class="v">2008</span>
            </li>
            <li>
              <span class="k">Procedure revised</span>
              <span class="v">2025</span>
            </li>
            <li>
              <span class="k">Focus</span>
              <span class="v">Quality, Integrity, Continuous Improvement</span>
            </li>
            <li>
              <span class="k">Outcome</span>
              <span class="v">Globally competitive graduates & professional recognition</span>
            </li>
          </ul>

          <!-- Back button section (reusable) -->
          <div class="mt-3">
            <a href="javascript:history.back()" class="btn btn-outline-primary w-100">
              ← Back
            </a>
          </div>
        </div>
      </div>

      <!-- ======================
           ACCREDITATION PROCEDURE (WITH IMAGE)
           ====================== -->
      <div class="col-12">
        <div class="lead-card p-4 p-md-5">
          <div class="d-flex flex-wrap gap-2 align-items-end justify-content-between">
            <div>
              <h2 class="h5 fw-bold mb-1">Accreditation Procedure</h2>
              <p class="text-muted mb-0">
                Overview of the accreditation workflow and how SIET evaluates institutions and programmes.
              </p>
            </div>
            <span class="badge text-bg-light border procedure-pill">Procedure</span>
          </div>

          <div class="row g-4 mt-2 align-items-start">
            <div class="col-lg-6">
              <!-- <div class="procedure-note">
                <div class="d-flex gap-3 align-items-start">
                  <span class="badge text-bg-primary">Note</span>
                  <div>
                    <div class="fw-bold mb-1">Procedure details</div>
                    <div class="text-muted small mb-0">
                      Add your finalised “Accreditation Procedure” diagram / flow image here.
                      (This section is ready for the official image.)
                    </div>
                  </div>
                </div>
              </div> -->

              <div class="mt-3">
                <ul class="procedure-points">
                  <li><span class="dot"></span> Clear, transparent evaluation steps</li>
                  <li><span class="dot"></span> International benchmark alignment</li>
                  <li><span class="dot"></span> Quality assurance & continuous improvement</li>
                </ul>
              </div>
            </div>

            <div class="col-lg-6">
            <!-- Accreditation Procedure Image -->
            <figure class="proc-image-frame">
              <img
                src="images/accreditation/accerditationprocedure.PNG"
                alt="Accreditation Procedure"
                class="img-fluid proc-image"
                loading="lazy"
                onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
              />

              <!-- Fallback (only shows if image missing) -->
              <div class="proc-fallback" style="display:none;">
                <div class="fallback-icon">🖼️</div>
                <div class="fw-bold mb-1">Upload procedure image</div>
                <div class="text-muted small mb-0">
                  Place your image at:
                  <span class="path">images/accreditation/accerditationprocedure.PNG</span>
                </div>
              </div>
            </figure>
          </div>

          </div>

        </div>
      </div>

      <!-- ======================
           BOARD SECTION 
           ====================== -->
      <div class="col-12">
        <div class="lead-card p-4 p-md-5">
          <h2 class="h5 fw-bold mb-2">SIET Accreditation Board (2025)</h2>
          <p class="text-muted mb-4">
            The SIET Accreditation Board is led by a Chairman and Vice-Chairman, supported by distinguished members from academia,
            industry, and public practice. Together, they safeguard the integrity of SIET’s accreditation processes and uphold
            the highest standards of member output.
          </p>

          <div class="row g-4">

            <!-- Chairman -->
            <div class="col-lg-6">
              <div class="board-card board-card--photo">
                <div class="board-top">
                  <div class="board-photo">
                    <img
                      src="images/About SIET/Photos of Council Member/Dr Sam Man Keong.png"
                      alt="Dr Sam Man Keong"
                      loading="lazy"
                      onerror="this.remove(); this.parentElement.querySelector('.board-photo-fallback').style.display='flex';"
                    />
                    <div class="board-photo-fallback">SM</div>
                  </div>


                  <div class="board-title">
                    <div class="name">Dr Sam Man Keong</div>
                    <div class="role">Chairman, SIET Accreditation Board</div>
                    <div class="meta">Honorary Adviser, SIET Accreditation and Examination Board</div>
                  </div>
                </div>

                <div class="accordion mt-3" id="accBoard">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                        View credentials
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accBoard">
                      <div class="accordion-body text-muted small">
                        CEng, FIET, MICE, PE, MASCE, CEng(UK), MIEI, FCQI, CQP, CPEng, MIE(Aust), LMTAM, FSIET(F),
                        ASEAN Engineer Dip(Civil)(SP), BE(Civil)(Hons)(MelbU), MSc(Civil)(NUS), MSc(GeotEng)(NTU), Ed.D (WMSU)
                      </div>
                    </div>
                  </div>
                </div>

                <div class="board-contact mt-3">
                  <span class="label">Email:</span>
                  <a href="mailto:sammk1951@gmail.com">sammk1951@gmail.com</a>
                </div>
              </div>
            </div>

            <!-- Vice Chairman -->
            <div class="col-lg-6">
              <div class="board-card board-card--photo">
                <div class="board-top">
                  <div class="board-photo board-photo--alt">
                    <img
                      src="images/About SIET/Photos of Council Member/Mr TRC Raja.png"
                      alt="Mr TRC Raja"
                      loading="lazy"
                      onerror="this.remove(); this.parentElement.querySelector('.board-photo-fallback').style.display='flex';"
                    />
                    <div class="board-photo-fallback">TR</div>
                  </div>


                  <div class="board-title">
                    <div class="name">Mr TRC Raja</div>
                    <div class="role">Vice-Chairman, SIET Accreditation Board</div>
                    <div class="meta">Honorary Adviser, SIET Accreditation and Examination Board</div>
                  </div>
                </div>

                <div class="accordion mt-3" id="accBoard2">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                        View credentials
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accBoard2">
                      <div class="accordion-body text-muted small">
                        MSc(NUS), MSc(Eng), PGDip(SA)(NUS), PGDipM(UK), PGDipPM(SIM), Dip(T&amp;D)(UK), ChFC, FSIET
                      </div>
                    </div>
                  </div>
                </div>

                <div class="board-contact mt-3">
                  <span class="label">Email:</span>
                  <a href="mailto:raja.trc@income.com.sg">raja.trc@income.com.sg</a>
                </div>
              </div>
            </div>

          </div>

          <div class="mt-4 d-flex justify-content-end">
            <a href="javascript:history.back()" class="btn btn-primary">
              ← Back
            </a>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
<br>
<!-- ======================
     PAGE STYLES
     ====================== -->
<style>
  .badge-soft{
    display:inline-flex;
    align-items:center;
    font-weight:800;
    font-size:.85rem;
    color:#0d6efd;
    background:rgba(13,110,253,.10);
    border:1px solid rgba(13,110,253,.18);
    padding:8px 12px;
    border-radius:999px;
  }

  .accred-facts{
    list-style:none;
    padding:0;
    margin:0;
    display:grid;
    gap:12px;
  }
  .accred-facts li{
    border:1px solid rgba(0,0,0,.08);
    border-radius:12px;
    padding:12px;
    background:#fff;
    box-shadow:0 10px 20px rgba(0,0,0,.05);
  }
  .accred-facts .k{
    display:block;
    font-weight:800;
    color:#111827;
    margin-bottom:4px;
    font-size:.92rem;
  }
  .accred-facts .v{
    display:block;
    color:#6b7280;
    font-size:.92rem;
    line-height:1.45;
  }

  /* Procedure */
  .procedure-pill{
    border-radius:999px;
    padding:8px 12px;
    font-weight:900;
  }
  .procedure-note{
    border:1px solid rgba(0,0,0,.10);
    background:#fff;
    border-radius:14px;
    padding:14px;
    box-shadow:0 10px 22px rgba(0,0,0,.06);
  }
  .procedure-points{
    list-style:none;
    padding:0;
    margin:0;
    display:grid;
    gap:10px;
  }
  .procedure-points li{
    display:flex;
    gap:10px;
    align-items:flex-start;
    font-weight:800;
    color:#111827;
  }
  .procedure-points .dot{
    width:10px;
    height:10px;
    border-radius:50%;
    background:#0d6efd;
    margin-top:6px;
    flex:0 0 auto;
  }

  .proc-image-frame{
    border:2px solid rgba(17,24,39,.85);
    border-radius:14px;
    padding:12px;
    background:#fff;
    box-shadow:0 18px 35px rgba(0,0,0,.08);
    margin:0;
  }
  .proc-image{
    width:100%;
    height:auto;
    display:block;
    border-radius:10px;
    border:1px solid rgba(0,0,0,.10);
  }
  .proc-fallback{
    display:none;
    min-height:220px;
    border-radius:10px;
    border:2px dashed rgba(13,110,253,.35);
    background:rgba(13,110,253,.06);
    align-items:center;
    justify-content:center;
    flex-direction:column;
    padding:18px;
    text-align:center;
  }
  .fallback-icon{
    font-size:2rem;
    margin-bottom:8px;
  }
  .proc-fallback .path{
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    background:rgba(0,0,0,.06);
    border:1px solid rgba(0,0,0,.10);
    padding:2px 8px;
    border-radius:8px;
    display:inline-block;
    margin-top:6px;
  }

  /* Board cards */
  .board-card{
    border:1px solid rgba(0,0,0,.10);
    border-radius:14px;
    background:#fff;
    box-shadow:0 18px 35px rgba(0,0,0,.08);
    padding:16px;
    height:100%;
  }
  .board-top{
    display:flex;
    gap:12px;
    align-items:center;
  }

  .board-photo{
    width:74px;
    height:74px;
    border-radius:16px;
    overflow:hidden;
    border:2px solid rgba(13,110,253,.25);
    background:rgba(13,110,253,.08);
    flex:0 0 auto;
    display:flex;
    align-items:center;
    justify-content:center;
  }
  .board-photo--alt{
    border-color: rgba(124,58,237,.25);
    background: rgba(124,58,237,.08);
  }
  .board-photo img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
  }
  .board-photo-fallback{
    display:none;
    width:100%;
    height:100%;
    align-items:center;
    justify-content:center;
    font-weight:900;
    font-size:1.2rem;
    color:#0d6efd;
  }
  .board-photo--alt .board-photo-fallback{
    color:#7c3aed;
  }

  .board-title .name{
    font-weight:900;
    color:#111827;
    font-size:1.1rem;
    line-height:1.2;
  }
  .board-title .role{
    font-weight:800;
    color:#0d6efd;
    margin-top:2px;
    font-size:.95rem;
  }
  .board-title .meta{
    color:#6b7280;
    font-size:.9rem;
    margin-top:2px;
  }
  .board-contact{
    display:flex;
    gap:8px;
    align-items:center;
    flex-wrap:wrap;
    color:#111827;
  }
  .board-contact .label{
    font-weight:800;
    color:#111827;
  }
  .board-contact a{
    font-weight:800;
    text-decoration:none;
  }
  .board-contact a:hover{ text-decoration:underline; }

  .accordion-button{ font-weight:900; }
  .accordion-item{
    border-radius:12px;
    overflow:hidden;
    border:1px solid rgba(0,0,0,.10);
  }
  .board-photo img{
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.board-photo-fallback{
  display: none;
  width: 100%;
  height: 100%;
  align-items: center;
  justify-content: center;
  font-weight: 900;
  font-size: 1.2rem;
  color: #0d6efd;
}

.board-photo--alt .board-photo-fallback{
  color: #7c3aed;
}

</style>

</main>

<?php include 'footer.php'; ?>
