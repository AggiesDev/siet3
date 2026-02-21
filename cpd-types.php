<?php
  $active = 'cert';
  $page_css = ['sections.css'];
  include 'header.php';
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Types of CPD Activities</h1>
    <p class="text-muted mb-0">
      SIET Certified Professionals are required to accumulate at least 20 PDUs over three consecutive years
      for renewal. (1 PDU = 3 hours of CPD)
    </p>
  </div>
</section>
<br>
<section class="section-pad pt-0">
  <div class="container">

    <!-- ========= Top Note ========= -->
    <div class="lead-card p-4 p-md-5 mb-4">
      <div class="cpd-note">
        <div class="cpd-note-title">CPD Requirement</div>
        <div class="cpd-note-text">
          SIET members registered under the SIET Certification Scheme must attend <strong>at least 20 PDUs</strong>
          (or equivalent) over <strong>three consecutive years</strong> to renew registration.
          <span class="cpd-note-chip">1 PDU = 3 hours of CPD</span>
        </div>
      </div>
    </div>

    <!-- ========= Structured ========= -->
    <div class="cpd-block mb-4">
      <div class="cpd-block-head">
        <h2 class="cpd-block-title">Structured Activities</h2>
        <p class="cpd-block-sub">Formal learning, qualified events, and professional contributions.</p>
      </div>

      <div class="cpd-accordion accordion" id="cpdStructured">

        <!-- Category 1(a) -->
        <div class="accordion-item cpd-item">
          <h3 class="accordion-header" id="s1aHead">
            <button class="accordion-button collapsed cpd-btn" type="button"
              data-bs-toggle="collapse" data-bs-target="#s1a" aria-expanded="false" aria-controls="s1a">
              <span class="cpd-code">A1</span>
              <span class="cpd-title">Category 1(a): Qualified formal study courses</span>
              <span class="cpd-arrow" aria-hidden="true"></span>
            </button>
          </h3>
          <div id="s1a" class="accordion-collapse collapse" aria-labelledby="s1aHead" data-bs-parent="#cpdStructured">
            <div class="accordion-body cpd-body">
              <div class="cpd-grid">
                <div>
                  <div class="cpd-label">Criteria</div>
                  <p class="mb-0">
                    Relevant post-graduate or diploma courses on engineering and/or construction/project management
                    accredited by SIET.
                  </p>
                </div>
                <div>
                  <div class="cpd-label">CPD Points</div>
                  <div class="cpd-points">1 CPD for each contact hour</div>
                </div>
              </div>

              <div class="cpd-label mt-3">Examples</div>
              <ul class="cpd-list">
                <li>MSc (Engineering)</li>
                <li>BEng (Mechanical / Electrical / Electronic / Marine / Aeronautical / Biomedical Engineering / IT, etc.)</li>
                <li>BSc (Project Management)</li>
                <li>BSc (Construction Management)</li>
                <li>Postgrad Diploma (Construction Management)</li>
                <li>Advance Diploma (Engineering and Construction Management)</li>
                <li>Diploma (Civil / Mechanical / Electrical / Electronic / Marine / Aeronautical / Biomedical Engineering / IT etc.)</li>
                <li>Diploma in Information Technology, Diploma in Data Centre, etc.</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Category 1(b) -->
        <div class="accordion-item cpd-item">
          <h3 class="accordion-header" id="s1bHead">
            <button class="accordion-button collapsed cpd-btn" type="button"
              data-bs-toggle="collapse" data-bs-target="#s1b" aria-expanded="false" aria-controls="s1b">
              <span class="cpd-code">A2</span>
              <span class="cpd-title">Category 1(b): Qualified lectures, short courses, conferences, workshops &amp; seminars</span>
              <span class="cpd-arrow" aria-hidden="true"></span>
            </button>
          </h3>
          <div id="s1b" class="accordion-collapse collapse" aria-labelledby="s1bHead" data-bs-parent="#cpdStructured">
            <div class="accordion-body cpd-body">
              <div class="cpd-grid">
                <div>
                  <div class="cpd-label">Criteria</div>
                  <p class="mb-0">
                    Lectures, short courses, conferences, workshops &amp; seminars relevant for Certified Professionals on
                    technical, management, professional development, legal or regulatory matters.
                  </p>
                </div>
                <div>
                  <div class="cpd-label">CPD Points</div>
                  <div class="cpd-points">1 CPD for each contact hour</div>
                </div>
              </div>

              <div class="cpd-label mt-3">Examples</div>
              <ul class="cpd-list">
                <li>Seminars on regulatory requirements by government agencies (e.g., BCA, FSB, ENV, LTA, NSAS, URA, HDB, JTC, etc.)</li>
                <li>Workshops &amp; seminars on engineering topics by ITE, SP, NP, NYP, RP, TP, SIT, NUS, NTU, SUTD, SUSS, etc.</li>
                <li>Workshops &amp; seminars by Professional Institutions &amp; specialised societies (e.g., EA, EC, IMechE, SIET, AEE, GeoSS, SEAS, SWA, TUCSS, etc.)</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- E-training -->
        <div class="accordion-item cpd-item">
          <h3 class="accordion-header" id="sEtHead">
            <button class="accordion-button collapsed cpd-btn" type="button"
              data-bs-toggle="collapse" data-bs-target="#sEt" aria-expanded="false" aria-controls="sEt">
              <span class="cpd-code">A3</span>
              <span class="cpd-title">E-training: Online viewing / online learning (with verifiable assessment)</span>
              <span class="cpd-arrow" aria-hidden="true"></span>
            </button>
          </h3>
          <div id="sEt" class="accordion-collapse collapse" aria-labelledby="sEtHead" data-bs-parent="#cpdStructured">
            <div class="accordion-body cpd-body">
              <div class="cpd-grid">
                <div>
                  <div class="cpd-label">Criteria</div>
                  <ul class="cpd-list mb-0">
                    <li>Viewing of qualified video recordings of Category 1(b) activities online</li>
                    <li>Online learning with verifiable assessment (must have course organizer, evaluation of outcomes, and evidence of participation/enrolment/registration)</li>
                  </ul>
                  <div class="cpd-callout mt-3">
                    CPD obtained from E-training is limited to <strong>10 points</strong>.
                  </div>
                </div>
                <div>
                  <div class="cpd-label">CPD Points</div>
                  <div class="cpd-points">1 CPD for each 2 hours of e-training (Maximum 10 CPDs)</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Category 1(c) -->
        <div class="accordion-item cpd-item">
          <h3 class="accordion-header" id="s1cHead">
            <button class="accordion-button collapsed cpd-btn" type="button"
              data-bs-toggle="collapse" data-bs-target="#s1c" aria-expanded="false" aria-controls="s1c">
              <span class="cpd-code">A4</span>
              <span class="cpd-title">Category 1(c): Qualified in-house training</span>
              <span class="cpd-arrow" aria-hidden="true"></span>
            </button>
          </h3>
          <div id="s1c" class="accordion-collapse collapse" aria-labelledby="s1cHead" data-bs-parent="#cpdStructured">
            <div class="accordion-body cpd-body">
              <div class="cpd-grid">
                <div>
                  <div class="cpd-label">Criteria</div>
                  <p class="mb-0">
                    Structured in-house training relevant to certified professionals on technical, management,
                    professional development, legal or regulatory matters. (CV of speakers to be similar to Category 1(a) or 1(b)).
                  </p>
                </div>
                <div>
                  <div class="cpd-label">CPD Points</div>
                  <div class="cpd-points">1 CPD for each contact hour</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Category 2 -->
        <div class="accordion-item cpd-item">
          <h3 class="accordion-header" id="s2Head">
            <button class="accordion-button collapsed cpd-btn" type="button"
              data-bs-toggle="collapse" data-bs-target="#s2" aria-expanded="false" aria-controls="s2">
              <span class="cpd-code">A5</span>
              <span class="cpd-title">Category 2: Participation in professional Boards, Committees and Societies</span>
              <span class="cpd-arrow" aria-hidden="true"></span>
            </button>
          </h3>
          <div id="s2" class="accordion-collapse collapse" aria-labelledby="s2Head" data-bs-parent="#cpdStructured">
            <div class="accordion-body cpd-body">
              <div class="cpd-label">Criteria &amp; CPD Points</div>

              <div class="cpd-split mt-2">
                <div class="cpd-split-card">
                  <div class="cpd-split-title">(a) Member of Boards</div>
                  <p class="mb-2">
                    Member of Boards of local professional institutions or relevant government agencies.
                  </p>
                  <div class="cpd-points">8 CPDs per organisation</div>
                  <div class="cpd-label mt-3">Examples</div>
                  <ul class="cpd-list mb-0">
                    <li>Board Member of BCA, LTA, HDB, URA, JTC, PEB, BOA, IMDA, etc.</li>
                    <li>Council Member of professional institutions (e.g., SIET, EA, IET, IMechE, etc.)</li>
                  </ul>
                </div>

                <div class="cpd-split-card">
                  <div class="cpd-split-title">(b) Member of technical/working committees</div>
                  <p class="mb-2">
                    Member of relevant technical or working committees of professional associations and government agencies.
                  </p>
                  <div class="cpd-points">10 CPDs per committee <span class="text-muted">(Maximum 12 CPDs)</span></div>
                  <div class="cpd-label mt-3">Examples</div>
                  <ul class="cpd-list mb-0">
                    <li>Technical committees of government departments &amp; statutory boards</li>
                    <li>Committees of EA, IMechE, SIET, IET, etc.</li>
                    <li>Approved technical societies</li>
                  </ul>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- Category 3 (A6) -->
        <div class="accordion-item cpd-item">
          <h3 class="accordion-header" id="s3Head">
            <button class="accordion-button collapsed cpd-btn" type="button"
              data-bs-toggle="collapse" data-bs-target="#s3" aria-expanded="false" aria-controls="s3">
              <span class="cpd-code">A6</span>
              <span class="cpd-title">Category 3: Contribution to relevant engineering or management knowledge</span>
              <span class="cpd-arrow" aria-hidden="true"></span>
            </button>
          </h3>

          <div id="s3" class="accordion-collapse collapse" aria-labelledby="s3Head" data-bs-parent="#cpdStructured">
            <div class="accordion-body cpd-body">

              <div class="cpd-grid3-head d-none d-lg-grid">
                <div>Activity</div>
                <div>Description</div>
                <div class="text-end">CPD Points</div>
              </div>

              <div class="cpd-klist">
                <div class="cpd-krow3">
                  <div class="cpd-kcol cpd-kcol--title">(a) Conduct lectures (first time)</div>
                  <div class="cpd-kcol cpd-kcol--desc">
                    Conduct lectures/seminars/conferences/training courses qualified for CPD by SIET for the first time
                    (Exclude regular lectures by full-time lecturers).
                  </div>
                  <div class="cpd-kcol cpd-kcol--points">
                    <span class="cpd-points-chip">4 CPDs for each lecture hour or part thereof</span>
                    <!-- <span class="cpd-points-sub">for each lecture hour or part thereof</span> -->
                  </div>
                </div>

                <div class="cpd-krow3">
                  <div class="cpd-kcol cpd-kcol--title">(b) Conduct lectures (after first time)</div>
                  <div class="cpd-kcol cpd-kcol--desc">
                    Conduct lectures/seminars/conferences/training courses qualified for CPD by SIET after the first time
                    (Exclude regular lectures by full-time lecturers).
                  </div>
                  <div class="cpd-kcol cpd-kcol--points">
                    <span class="cpd-points-chip">2 CPDs for each lecture hour or part thereof</span>
                    <!-- <span class="cpd-points-sub">for each lecture hour or part thereof</span> -->
                  </div>
                </div>

                <div class="cpd-krow3">
                  <div class="cpd-kcol cpd-kcol--title">(c) Write or edit technical articles/papers</div>
                  <div class="cpd-kcol cpd-kcol--desc">
                    Write or edit technical articles or papers published in distinguished publications, conference proceedings,
                    professional journals or books.
                  </div>
                  <div class="cpd-kcol cpd-kcol--points">
                    <span class="cpd-points-chip">15 CPDs for each topic</span>
                    <!-- <span class="cpd-points-sub">for each topic</span> -->
                  </div>
                </div>

                <div class="cpd-krow3">
                  <div class="cpd-kcol cpd-kcol--title">(d) Engineering patents</div>
                  <div class="cpd-kcol cpd-kcol--desc">
                    Engineering patents registered during the year.
                  </div>
                  <div class="cpd-kcol cpd-kcol--points">
                    <span class="cpd-points-chip">15 CPDs for each patent</span>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- ========= Unstructured ========= -->
    <div class="cpd-block">
      <div class="cpd-block-head">
        <h2 class="cpd-block-title">Unstructured Activities</h2>
        <p class="cpd-block-sub">Self-study, informal training and activities that support professional growth.</p>
      </div>

      <div class="cpd-accordion accordion" id="cpdUnstructured">

        <div class="accordion-item cpd-item">
          <h3 class="accordion-header" id="uAHead">
            <button class="accordion-button collapsed cpd-btn" type="button"
              data-bs-toggle="collapse" data-bs-target="#uA" aria-expanded="false" aria-controls="uA">
              <span class="cpd-code">B1</span>
              <span class="cpd-title">Category A: Self-study of relevant topics</span>
              <span class="cpd-arrow" aria-hidden="true"></span>
            </button>
          </h3>
          <div id="uA" class="accordion-collapse collapse" aria-labelledby="uAHead" data-bs-parent="#cpdUnstructured">
            <div class="accordion-body cpd-body">
              <div class="cpd-grid">
                <div>
                  <div class="cpd-label">Criteria</div>
                  <ul class="cpd-list mb-0">
                    <li>Reading relevant technical, professional, financial, legal or business literature</li>
                    <li>Listening/viewing audio/video tapes on relevant topics or taking correspondence courses</li>
                  </ul>
                </div>
                <div>
                  <div class="cpd-label">CPD Points</div>
                  <div class="cpd-points">1 CPD for every 2 hours <span class="text-muted">(Maximum 16 CPDs)</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item cpd-item">
          <h3 class="accordion-header" id="uBHead">
            <button class="accordion-button collapsed cpd-btn" type="button"
              data-bs-toggle="collapse" data-bs-target="#uB" aria-expanded="false" aria-controls="uB">
              <span class="cpd-code">B2</span>
              <span class="cpd-title">Category B: Informal in-house training and discussion</span>
              <span class="cpd-arrow" aria-hidden="true"></span>
            </button>
          </h3>
          <div id="uB" class="accordion-collapse collapse" aria-labelledby="uBHead" data-bs-parent="#cpdUnstructured">
            <div class="accordion-body cpd-body">
              <div class="cpd-grid">
                <div>
                  <div class="cpd-label">Criteria</div>
                  <ul class="cpd-list mb-0">
                    <li>Conducting informal in-house training and presentations to colleagues</li>
                    <li>Attending informal in-house training and presentations</li>
                  </ul>
                </div>
                <div>
                  <div class="cpd-label">CPD Points</div>
                  <div class="cpd-points">1 CPD for every 2 hours <span class="text-muted">(Maximum 20 CPDs)</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item cpd-item">
          <h3 class="accordion-header" id="uCHead">
            <button class="accordion-button collapsed cpd-btn" type="button"
              data-bs-toggle="collapse" data-bs-target="#uC" aria-expanded="false" aria-controls="uC">
              <span class="cpd-code">B3</span>
              <span class="cpd-title">Category C: Professional membership</span>
              <span class="cpd-arrow" aria-hidden="true"></span>
            </button>
          </h3>
          <div id="uC" class="accordion-collapse collapse" aria-labelledby="uCHead" data-bs-parent="#cpdUnstructured">
            <div class="accordion-body cpd-body">
              <div class="cpd-grid">
                <div>
                  <div class="cpd-label">Criteria</div>
                  <p class="mb-0">Membership of professional engineering or management bodies.</p>
                </div>
                <div>
                  <div class="cpd-label">CPD Points</div>
                  <div class="cpd-points">2 CPDs per organisation <span class="text-muted">(Maximum 16 CPDs)</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item cpd-item">
          <h3 class="accordion-header" id="uDHead">
            <button class="accordion-button collapsed cpd-btn" type="button"
              data-bs-toggle="collapse" data-bs-target="#uD" aria-expanded="false" aria-controls="uD">
              <span class="cpd-code">C1</span>
              <span class="cpd-title">Category D: Non-accredited engineering activities</span>
              <span class="cpd-arrow" aria-hidden="true"></span>
            </button>
          </h3>
          <div id="uD" class="accordion-collapse collapse" aria-labelledby="uDHead" data-bs-parent="#cpdUnstructured">
            <div class="accordion-body cpd-body">
              <div class="cpd-grid">
                <div>
                  <div class="cpd-label">Criteria</div>
                  <ul class="cpd-list mb-0">
                    <li>Attending professional and technical courses which are not accredited</li>
                    <li>Attending organised group technical site visits and exhibitions</li>
                  </ul>
                </div>
                <div>
                  <div class="cpd-label">CPD Points</div>
                  <div class="cpd-points">1 CPD for every 2 hours <span class="text-muted">(Maximum 16 CPDs)</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>
<br>
<style>
  /* =========================
     CPD TYPES – UI (Accordion)
     ========================= */
  .cpd-note{
    display: grid;
    gap: 8px;
  }
  .cpd-note-title{
    font-weight: 900;
    font-size: 1.15rem;
    color: #111827;
  }
  .cpd-note-text{
    color: #374151;
    line-height: 1.7;
    font-size: 1rem;
  }
  .cpd-note-chip{
    display: inline-block;
    margin-left: 8px;
    padding: 4px 10px;
    border-radius: 999px;
    background: rgba(59,130,246,.10);
    border: 1px solid rgba(59,130,246,.22);
    color: #1d4ed8;
    font-weight: 800;
    font-size: .9rem;
    white-space: nowrap;
  }

  .cpd-block-head{ margin-bottom: 12px; }
  .cpd-block-title{
    font-weight: 900;
    font-size: 1.4rem;
    margin: 0;
  }
  .cpd-block-sub{
    margin: 6px 0 0;
    color: #6b7280;
  }

  .cpd-accordion{
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid rgba(17,24,39,.12);
    box-shadow: 0 12px 26px rgba(0,0,0,.06);
    background: #fff;
  }

  .cpd-item{
    border: 0;
    border-bottom: 1px solid rgba(17,24,39,.08);
  }
  .cpd-item:last-child{ border-bottom: 0; }

  .cpd-btn{
    padding: 16px 16px;
    font-weight: 800;
    background: #f8fafc;
    color: #111827;
    box-shadow: none !important;
  }
  .cpd-btn:hover{ background: #f1f5f9; }
  .cpd-btn::after{ display: none; } /* hide bootstrap caret */

  .cpd-code{
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 44px;
    height: 28px;
    border-radius: 8px;
    background: rgba(59,130,246,.12);
    border: 1px solid rgba(59,130,246,.18);
    color: #1d4ed8;
    font-weight: 900;
    margin-right: 10px;
    font-size: .95rem;
  }

  .cpd-title{
    flex: 1 1 auto;
    font-size: 1rem;
    line-height: 1.25;
  }

  .cpd-arrow{
    width: 34px;
    height: 34px;
    border-radius: 10px;
    background: #fff;
    border: 1px solid rgba(17,24,39,.12);
    position: relative;
    flex: 0 0 auto;
    transition: transform .2s ease, background .2s ease;
  }
  .cpd-arrow::before{
    content: "";
    position: absolute;
    inset: 0;
    margin: auto;
    width: 10px;
    height: 10px;
    border-right: 2px solid #111827;
    border-bottom: 2px solid #111827;
    transform: rotate(45deg);
    top: 10px;
  }
  .accordion-button:not(.collapsed) .cpd-arrow{
    background: rgba(34,197,94,.10);
    border-color: rgba(34,197,94,.25);
    transform: rotate(180deg);
  }

  .cpd-body{
    background: #fff;
    padding: 18px 18px 20px;
    color: #111827;
  }

  .cpd-label{
    font-weight: 900;
    font-size: .95rem;
    color: #111827;
    margin-bottom: 6px;
  }

  .cpd-grid{
    display: grid;
    grid-template-columns: 1fr 280px;
    gap: 18px;
    align-items: start;
  }

  .cpd-points{
    display: inline-block;
    padding: 10px 12px;
    border-radius: 12px;
    background: rgba(245,158,11,.12);
    border: 1px solid rgba(245,158,11,.22);
    color: #92400e;
    font-weight: 900;
    line-height: 1.35;
  }

  .cpd-list{
    margin: 0;
    padding-left: 18px;
    color: #374151;
    line-height: 1.7;
  }

  .cpd-callout{
    padding: 10px 12px;
    border-radius: 12px;
    background: rgba(236,72,153,.08);
    border: 1px solid rgba(236,72,153,.18);
    color: #9d174d;
    font-weight: 800;
  }

  .cpd-split{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
  }
  .cpd-split-card{
    border-radius: 14px;
    border: 1px solid rgba(17,24,39,.12);
    background: #fff;
    padding: 14px;
  }
  .cpd-split-title{
    font-weight: 900;
    margin-bottom: 6px;
  }

  @media (max-width: 991.98px){
    .cpd-grid{ grid-template-columns: 1fr; }
    .cpd-split{ grid-template-columns: 1fr; }
  }

  /* =========================
     A6 (Category 3) – match A4 style (but 3 columns)
     ========================= */
  .cpd-grid3-head{
    grid-template-columns: 260px 1fr 260px;
    gap: 14px;
    padding: 10px 12px;
    border-radius: 12px;
    border: 1px solid rgba(17,24,39,.10);
    background: rgba(17,24,39,.03);
    font-weight: 900;
    color: #111827;
    margin-bottom: 12px;
  }

  .cpd-klist{
    display: grid;
    gap: 12px;
  }

  .cpd-krow3{
    display: grid;
    grid-template-columns: 260px 1fr 260px;
    gap: 14px;
    padding: 12px;
    border-radius: 14px;
    border: 1px solid rgba(17,24,39,.10);
    background: #fbfdff;
  }

  .cpd-kcol--title{
    font-weight: 900;
    color: #111827;
  }
  .cpd-kcol--desc{
    color: #374151;
    line-height: 1.7;
  }
  .cpd-kcol--points{
    text-align: right;
    font-weight: 900;
  }

  .cpd-points-chip{
    display:inline-block;
    padding: 8px 10px;
    border-radius: 12px;
    background: rgba(245,158,11,.12);
    border: 1px solid rgba(245,158,11,.22);
    color: #92400e;
    font-weight: 900;
    line-height: 1.1;
    white-space: none;
  }

  .cpd-points-sub{
    display:block;
    margin-top: 6px;
    color: #6b7280;
    font-weight: 800;
    line-height: 1.3;
  }

  @media (max-width: 991.98px){
    .cpd-grid3-head{ display:none !important; }
    .cpd-krow3{ grid-template-columns: 1fr; }
    .cpd-kcol--points{ text-align: left; }
  }
</style>

<?php include 'footer.php'; ?>