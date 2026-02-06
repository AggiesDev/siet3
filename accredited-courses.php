<?php
  $active = 'accreditation'; // change if your navbar uses different key
  $page_css = ['sections.css'];
  include 'header.php';
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">SIET Accredited Polytechnic &amp; ITE Courses in Singapore</h1>
    <p class="text-muted mb-0">
      A consolidated reference list of accredited diploma and ITE programmes.
    </p>
  </div>
</section>

<section class="section-pad">
  <div class="container">

    <!-- Top actions -->
    <div class="row g-3 align-items-stretch mb-4">
      <div class="col-lg-8">
        <div class="lead-card p-4 h-100">
          <div class="d-flex flex-column flex-md-row gap-3 justify-content-between align-items-md-center">
            <div>
              <h2 class="h5 fw-bold mb-1">Browse by institution</h2>
              <div class="text-muted">
                Use the search box to quickly find a programme (e.g., <b>Cybersecurity</b>, <b>AI</b>, <b>Aerospace</b>).
              </div>
            </div>

            <!-- <div class="d-flex gap-2">
              <a class="btn btn-primary px-4"
                 href="assets/downloads/SIET_Accredited_Polytechnic_and_ITE_courses_in_Singapore.docx"
                 download>
                Download DOCX
              </a>
            </div> -->
          </div>

          <hr class="my-3">

          <label for="courseSearch" class="form-label fw-semibold mb-2">Search programmes</label>
          <div class="input-group input-group-lg">
            <span class="input-group-text">🔎</span>
            <input
              type="text"
              id="courseSearch"
              class="form-control"
              placeholder="Type a keyword… (AI, Data, Engineering, Robotics, Security, etc.)"
              autocomplete="off"
            />
            <button class="btn btn-outline-secondary" type="button" id="clearSearch">Clear</button>
          </div>

          <div class="small text-muted mt-2">
            Tip: Search works across all institutions.
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="lead-card p-4 h-100">
          <h3 class="h6 fw-bold mb-2">What’s inside</h3>
          <ul class="text-muted mb-0">
            <li>Nanyang Polytechnic</li>
            <li>Ngee Ann Polytechnic</li>
            <li>Republic Polytechnic</li>
            <li>Singapore Polytechnic</li>
            <li>Temasek Polytechnic</li>
            <li>Institute of Technical Education (ITE)</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Accordion -->
    <div class="lead-card p-3 p-md-4">
      <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
        <h2 class="h5 fw-bold mb-0">Accredited Programmes</h2>
        <span class="badge text-bg-secondary" id="matchCountBadge">Search: showing all</span>
      </div>

      <div class="accordion" id="institutionsAccordion">

        <!-- 1) Nanyang Polytechnic -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingNYP">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNYP" aria-expanded="true" aria-controls="collapseNYP">
              Nanyang Polytechnic
            </button>
          </h2>
          <div id="collapseNYP" class="accordion-collapse collapse show" aria-labelledby="headingNYP" data-bs-parent="#institutionsAccordion">
            <div class="accordion-body">
              <div class="course-grid">
                <ul class="course-list">
                  <li class="course-item">Diploma in Advanced &amp; Digital Manufacturing</li>
                  <li class="course-item">Diploma in Aerospace Engineering</li>
                  <li class="course-item">Diploma in AI &amp; Analytics</li>
                  <li class="course-item">Diploma in AI &amp; Data Engineering</li>
                  <li class="course-item">Diploma in Biologics &amp; Process Technology</li>
                  <li class="course-item">Diploma in Biomedical Engineering</li>
                  <li class="course-item">Diploma in Biomedical Science with Analytics</li>
                  <li class="course-item">Diploma in Business &amp; Financial Technology</li>
                  <li class="course-item">Diploma in Cloud Engineering</li>
                  <li class="course-item">Diploma in Cybersecurity &amp; Digital Forensics</li>
                  <li class="course-item">Diploma in Electronic &amp; Computer Engineering</li>
                  <li class="course-item">Diploma in Game Development &amp; Technology</li>
                  <li class="course-item">Diploma in Information Technology</li>
                  <li class="course-item">Diploma in Robotics &amp; Mechatronics</li>
                  <li class="course-item">Diploma in Sustainability in Engineering with Business</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- 2) Ngee Ann Polytechnic -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingNP">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNP" aria-expanded="false" aria-controls="collapseNP">
              Ngee Ann Polytechnic
            </button>
          </h2>
          <div id="collapseNP" class="accordion-collapse collapse" aria-labelledby="headingNP" data-bs-parent="#institutionsAccordion">
            <div class="accordion-body">
              <div class="course-grid">
                <ul class="course-list">
                  <li class="course-item">Diploma in Aerospace Engineering</li>
                  <li class="course-item">Diploma in Applied AI &amp; Analytics</li>
                  <li class="course-item">Diploma in Biomedical Engineering</li>
                  <li class="course-item">Diploma in Biomedical Science</li>
                  <li class="course-item">Diploma in Chemical &amp; Biomolecular Engineering</li>
                  <li class="course-item">Diploma in Computing with Law</li>
                  <li class="course-item">Diploma in Cybersecurity &amp; Digital Forensics</li>
                  <li class="course-item">Diploma in Design</li>
                  <li class="course-item">Diploma in Electrical Engineering</li>
                  <li class="course-item">Diploma in Electronic &amp; Computer Engineering</li>
                  <li class="course-item">Diploma in Engineering Science</li>
                  <li class="course-item">Diploma in Environmental Science &amp; Sustainability</li>
                  <li class="course-item">Diploma in Information Technology</li>
                  <li class="course-item">Diploma in Mechanical Engineering</li>
                  <li class="course-item">Diploma in Mechatronics &amp; Robotics</li>
                  <li class="course-item">Diploma in Offshore &amp; Sustainable Engineering</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- 3) Republic Polytechnic -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingRP">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRP" aria-expanded="false" aria-controls="collapseRP">
              Republic Polytechnic
            </button>
          </h2>
          <div id="collapseRP" class="accordion-collapse collapse" aria-labelledby="headingRP" data-bs-parent="#institutionsAccordion">
            <div class="accordion-body">
              <div class="course-grid">
                <ul class="course-list">
                  <li class="course-item">Diploma in Aerospace Engineering</li>
                  <li class="course-item">Diploma in Applied AI &amp; Analytics</li>
                  <li class="course-item">Diploma in Aviation Management</li>
                  <li class="course-item">Diploma in Biomedical Sciences</li>
                  <li class="course-item">Diploma in Business Process &amp; Engineering Management</li>
                  <li class="course-item">Diploma in Cybersecurity &amp; Digital Forensics</li>
                  <li class="course-item">Diploma in Design</li>
                  <li class="course-item">Diploma in Electrical &amp; Electronic Engineering</li>
                  <li class="course-item">Diploma in Engineering</li>
                  <li class="course-item">Diploma in Enterprise Cloud Computing &amp; Management</li>
                  <li class="course-item">Diploma in Events &amp; Project Management</li>
                  <li class="course-item">Diploma in Finance Technology</li>
                  <li class="course-item">Diploma in Information Technology</li>
                  <li class="course-item">Diploma in Mobility &amp; Robotic Systems</li>
                  <li class="course-item">Diploma in Supply Chain Management</li>
                  <li class="course-item">Diploma in Sustainable Built Environment</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- 4) Singapore Polytechnic -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingSP">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSP" aria-expanded="false" aria-controls="collapseSP">
              Singapore Polytechnic
            </button>
          </h2>
          <div id="collapseSP" class="accordion-collapse collapse" aria-labelledby="headingSP" data-bs-parent="#institutionsAccordion">
            <div class="accordion-body">
              <div class="course-grid">
                <ul class="course-list">
                  <li class="course-item">Diploma in Aeronautical Engineering</li>
                  <li class="course-item">Diploma in Aerospace Electronics</li>
                  <li class="course-item">Diploma in Applied AI &amp; Analytics</li>
                  <li class="course-item">Diploma in Applied Chemistry</li>
                  <li class="course-item">Diploma in Architecture</li>
                  <li class="course-item">Diploma in Biomedical Science</li>
                  <li class="course-item">Diploma in Chemical Engineering</li>
                  <li class="course-item">Diploma in Civil Engineering</li>
                  <li class="course-item">Diploma in Computer Engineering</li>
                  <li class="course-item">Diploma in Computer Science</li>
                  <li class="course-item">Diploma in Cybersecurity &amp; Digital Forensics</li>
                  <li class="course-item">Diploma in Electrical &amp; Electronic Engineering</li>
                  <li class="course-item">Diploma in Engineering with Business</li>
                  <li class="course-item">Diploma in Facilities Management</li>
                  <li class="course-item">Diploma in Food Science &amp; Technology</li>
                  <li class="course-item">Diploma in Integrated Events &amp; Project Management</li>
                  <li class="course-item">Diploma in Interior Design</li>
                  <li class="course-item">Diploma in Marine Engineering</li>
                  <li class="course-item">Diploma in Maritime Business</li>
                  <li class="course-item">Diploma in Mechanical Engineering</li>
                  <li class="course-item">Diploma in Mechatronics &amp; Robotics</li>
                  <li class="course-item">Diploma in Nautical Studies</li>
                  <li class="course-item">Diploma in Optometry</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- 5) Temasek Polytechnic -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTP">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTP" aria-expanded="false" aria-controls="collapseTP">
              Temasek Polytechnic
            </button>
          </h2>
          <div id="collapseTP" class="accordion-collapse collapse" aria-labelledby="headingTP" data-bs-parent="#institutionsAccordion">
            <div class="accordion-body">
              <div class="course-grid">
                <ul class="course-list">
                  <li class="course-item">Diploma in Aerospace Electronics</li>
                  <li class="course-item">Diploma in Aerospace Engineering</li>
                  <li class="course-item">Diploma in Applied Artificial Intelligence</li>
                  <li class="course-item">Diploma in Architectural Technology &amp; Building Services</li>
                  <li class="course-item">Diploma in Aviation Management</li>
                  <li class="course-item">Diploma in Big Data &amp; Analytics</li>
                  <li class="course-item">Diploma in Biomedical Engineering</li>
                  <li class="course-item">Diploma in Business Process &amp; Systems Engineering</li>
                  <li class="course-item">Diploma in Chemical Engineering</li>
                  <li class="course-item">Diploma in Computer Engineering</li>
                  <li class="course-item">Diploma in Cybersecurity &amp; Digital Forensics</li>
                  <li class="course-item">Diploma in Electronics</li>
                  <li class="course-item">Diploma in Immersive Media &amp; Game Development</li>
                  <li class="course-item">Diploma in Information Technology</li>
                  <li class="course-item">Diploma in Integrated Facility Management</li>
                  <li class="course-item">Diploma in Interior Architecture &amp; Design</li>
                  <li class="course-item">Diploma in Mechatronics</li>
                  <li class="course-item">Diploma in Medical Biotechnology</li>
                  <li class="course-item">Diploma in Product Experience &amp; Design</li>
                  <li class="course-item">Polytechnic Foundation Programme</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- 6) ITE -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingITE">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseITE" aria-expanded="false" aria-controls="collapseITE">
              Institute of Technical Education (ITE)
            </button>
          </h2>
          <div id="collapseITE" class="accordion-collapse collapse" aria-labelledby="headingITE" data-bs-parent="#institutionsAccordion">
            <div class="accordion-body">
              <div class="row g-3">
                <div class="col-lg-6">
                  <div class="p-3 rounded-3 border bg-light h-100">
                    <div class="fw-bold mb-2">Higher Nitec (IT / Digital)</div>
                    <ul class="course-list mb-0">
                      <li class="course-item">Higher Nitec in AI Applications</li>
                      <li class="course-item">Higher Nitec in Business Information Systems</li>
                      <li class="course-item">Higher Nitec in Cyber &amp; Network Security</li>
                      <li class="course-item">Higher Nitec in Data Engineering</li>
                      <li class="course-item">Higher Nitec in Electronics Engineering</li>
                      <li class="course-item">Higher Nitec in Immersive Applications &amp; Game</li>
                      <li class="course-item">Higher Nitec in IT Applications Development</li>
                      <li class="course-item">Higher Nitec in IT Systems &amp; Networks</li>
                      <li class="course-item">Higher Nitec in Operational &amp; Information Technology</li>
                      <li class="course-item">Higher Nitec in Security System Integration</li>
                    </ul>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="p-3 rounded-3 border bg-light h-100">
                    <div class="fw-bold mb-2">Higher Nitec (Engineering)</div>
                    <ul class="course-list mb-0">
                      <li class="course-item">Higher Nitec in Advanced Manufacturing</li>
                      <li class="course-item">Higher Nitec in Aerospace Engineering</li>
                      <li class="course-item">Higher Nitec in Applied Food Science</li>
                      <li class="course-item">Higher Nitec in Architectural Technology</li>
                      <li class="course-item">Higher Nitec in Automotive Engineering</li>
                      <li class="course-item">Higher Nitec in Bio-Chemical Technology</li>
                      <li class="course-item">Higher Nitec in Chemical Process Technology</li>
                      <li class="course-item">Higher Nitec in Civil &amp; Structural Engineering Design</li>
                      <li class="course-item">Higher Nitec in Electrical Engineering</li>
                      <li class="course-item">Higher Nitec in Electronics Engineering</li>
                      <li class="course-item">Higher Nitec in Facilities Management &amp; Engineering</li>
                      <li class="course-item">Higher Nitec in Integrated Mechanical &amp; Electrical Design</li>
                      <li class="course-item">Higher Nitec in Landscape Management &amp; Design</li>
                      <li class="course-item">Higher Nitec in Marine &amp; Offshore Engineering</li>
                      <li class="course-item">Higher Nitec in Mechanical Engineering</li>
                      <li class="course-item">Higher Nitec in Mechatronics Engineering</li>
                      <li class="course-item">Higher Nitec in Rapid Transit Engineering</li>
                      <li class="course-item">Higher Nitec in Vertical Transportation</li>
                    </ul>
                  </div>
                </div>

                <div class="col-12">
                  <div class="p-3 rounded-3 border bg-white">
                    <div class="fw-bold mb-2">Other ITE Programmes</div>
                    <ul class="course-list mb-0">
                      <li class="course-item">Nitec in Technology - Mechanical Technology</li>
                      <li class="course-item">Work-Study Diploma in Mechanical &amp; Electrical Services Supervision</li>
                      <li class="course-item">Work-Study Diploma in AI &amp; Data Intelligence (Data Engineering)</li>
                      <li class="course-item">Work-Study Diploma in Aircraft Cabin Engineering</li>
                      <li class="course-item">Work-Study Diploma in Aircraft Maintenance Engineering</li>
                      <li class="course-item">Work-Study Diploma in Electronics &amp; Computer Engineering (Applied Electronics &amp; AI)</li>
                      <li class="course-item">Work-Study Diploma in Electronics &amp; Computer Engineering (IoT &amp; Data Engineering)</li>
                      <li class="course-item">Work-Study Diploma in Land Transport Engineering (Operations Management)</li>
                      <li class="course-item">Work-Study Diploma in Land Transport Engineering (Rail)</li>
                      <li class="course-item">Work-Study Diploma in Marine &amp; Offshore Engineering - Production (Repair &amp; Maintenance)</li>
                      <li class="course-item">Work-Study Diploma in Marine &amp; Offshore Engineering (Engineering Design)</li>
                      <li class="course-item">Work-Study Diploma in Security Systems Engineering</li>
                    </ul>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div><!-- /accordion -->
    </div><!-- /lead-card -->

  </div>
</section>

<style>
  /* Lightweight local styles (safe add-on; doesn't break your existing sections.css) */
  .course-grid{ width:100%; }
  .course-list{
    margin: 0;
    padding-left: 1.1rem;
    display: grid;
    gap: .35rem;
  }
  .course-item{
    padding: .2rem 0;
  }
  .course-item mark{
    padding: 0 .15rem;
    border-radius: .25rem;
  }
</style>

<script>
(function(){
  const input = document.getElementById('courseSearch');
  const clearBtn = document.getElementById('clearSearch');
  const badge = document.getElementById('matchCountBadge');

  const items = Array.from(document.querySelectorAll('.course-item'));
  const originalText = new Map(items.map(li => [li, li.textContent]));

  function escapeRegExp(s){ return s.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); }

  function highlight(li, q){
    const text = originalText.get(li) || li.textContent;
    if(!q){ li.innerHTML = text; return; }
    const re = new RegExp(escapeRegExp(q), 'ig');
    li.innerHTML = text.replace(re, (m) => `<mark>${m}</mark>`);
  }

  function filter(){
    const q = (input.value || '').trim().toLowerCase();
    let shown = 0;

    items.forEach(li => {
      const txt = (originalText.get(li) || '').toLowerCase();
      const match = !q || txt.includes(q);
      li.style.display = match ? '' : 'none';
      if(match) shown++;
      highlight(li, q ? input.value.trim() : '');
    });

    badge.textContent = q ? `Search: ${shown} match(es)` : 'Search: showing all';
  }

  input.addEventListener('input', filter);
  clearBtn.addEventListener('click', () => { input.value=''; filter(); input.focus(); });

  filter();
})();
</script>

<?php include 'footer.php'; ?>
