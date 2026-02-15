<?php
  $active = 'accreditation';
  $page_css = ['sections.css'];
  include 'header.php';
?>

<!-- ======================
     INTRO SECTION (NEW)
     ====================== -->
<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Accreditation – International Certification</h1>
  </div>
</section>

<section class="section-pad pt-0">
  <div class="container">
    <div class="intl-card">
      <h2 class="intl-subtitle">International Certifications</h2>

      <p class="intl-text">
        SIET recognizes a distinguished range of international certifications that have been rigorously assessed for:
      </p>

      <ul class="intl-list">
        <li><span class="k">Relevance</span> – ensuring applicability to real-world engineering and technology practice</li>
        <li><span class="k">Practicality</span> – reflecting competencies that can be applied across diverse industries</li>
        <li><span class="k">Depth</span> – demonstrating advanced knowledge and technical mastery</li>
        <li><span class="k">Global alignment</span> – benchmarked against international standards of excellence</li>
      </ul>

      <p class="intl-text mb-0">
        These certifications represent the highest levels of professional achievement and are recognized as meeting the
        standards required for consideration at the Fellow (FSIET) grade.
      </p>
    </div>
  </div>
</section>

<!-- ======================
     OVERSEAS TABLE SECTION
     ====================== -->
<section class="section-pad pt-0">
  <div class="container">

    <div class="accr-wrap">
      <div class="table-responsive">
        <table class="table accr-table align-middle mb-0">
          <thead>
            <tr>
              <th colspan="2" class="accr-head text-center">
                Overseas Certification Recognised by SIET
              </th>
            </tr>
            <tr>
              <th colspan="2" class="accr-subhead text-center">
                For the membership grade of Fellow (FSIET)
              </th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td class="accr-left">
                <div class="accr-left-title">
                  1. American Association of Cost Engineers, USA (AACE International, USA)
                </div>
                <a class="accr-link" href="https://web.aacei.org" target="_blank" rel="noopener">
                  https://web.aacei.org
                </a>
              </td>
              <td class="accr-right">
                Certified Cost Engineer
              </td>
            </tr>

            <tr>
              <td class="accr-left">
                <div class="accr-left-title">
                  2. Association of Energy Engineers (AEE, USA)
                </div>
                <a class="accr-link" href="https://www.aeecenter.org/" target="_blank" rel="noopener">
                  https://www.aeecenter.org/
                </a>
              </td>
              <td class="accr-right">
                <ul class="accr-list mb-0">
                  <li>Certified Energy Auditor (CEA)</li>
                  <li>Certified Renewable Energy Professional (CREP)</li>
                  <li>Certified Energy Manager (CEM)</li>
                </ul>
              </td>
            </tr>

            <tr>
              <td class="accr-left">
                <div class="accr-left-title">
                  3. Society of Manufacturing Engineers, USA (SME)
                </div>
                <a class="accr-link" href="https://www.sme.org/" target="_blank" rel="noopener">
                  https://www.sme.org/
                </a>
              </td>
              <td class="accr-right">
                Certified Manufacturing Engineer (CME)
              </td>
            </tr>

            <tr>
              <td class="accr-left">
                <div class="accr-left-title">
                  4. Project Management Institute, USA (PMI-USA)
                </div>
                <a class="accr-link" href="https://www.pmi.org/" target="_blank" rel="noopener">
                  https://www.pmi.org/
                </a>
              </td>
              <td class="accr-right">
                Project Management Professional (PMP)
              </td>
            </tr>

            <tr>
              <td class="accr-left">
                <div class="accr-left-title">
                  5. American Society for Quality (ASQ – USA)
                </div>
                <a class="accr-link" href="https://asq.org/" target="_blank" rel="noopener">
                  https://asq.org/
                </a>
              </td>
              <td class="accr-right">
                <ul class="accr-list mb-0">
                  <li>Certified Quality Engineer (CQE)</li>
                  <li>Certified Reliability Engineer (CRE)</li>
                </ul>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>

<style>
  /* ===== New Intro Card (International Certification) ===== */
  .intl-card{
    background:#fff;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 14px;
    padding: 26px 26px;
    box-shadow: 0 18px 35px rgba(0,0,0,.06);
  }

  .intl-subtitle{
    font-size: 1.15rem;
    font-weight: 800;
    margin: 0 0 16px;
    color:#111;
  }

  .intl-text{
    color:#111;
    font-size: 1.02rem;
    line-height: 1.7;
    margin: 0 0 14px;
  }

  .intl-list{
    margin: 0 0 16px 18px;
    padding: 0;
    line-height: 1.7;
    font-size: 1.02rem;
  }

  .intl-list li{
    margin: 6px 0;
  }

  .intl-list .k{
    font-weight: 900;
  }

  /* ===== Accreditation (International) table style ===== */
  .accr-wrap{
    background:#fff;
    border:2px solid rgba(0,0,0,.25);
    box-shadow: 0 18px 35px rgba(0,0,0,.06);
    border-radius: 12px;
    overflow:hidden;
  }

  .accr-table{
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
    margin: 0;
  }

  .accr-table th,
  .accr-table td{
    border: 2px solid rgba(0,0,0,.35);
  }

  .accr-head,
  .accr-subhead{
    background:#fff200;
    color:#000;
    font-weight: 900;
    font-size: 1.25rem;
    padding: 14px 10px;
  }

  .accr-subhead{
    font-size: 1.15rem;
    padding-top: 12px;
    padding-bottom: 12px;
  }

  .accr-left{
    background:#fff200;
    font-weight: 800;
    color:#000;
    padding: 14px 14px;
    width: 62%;
    vertical-align: top;
  }

  .accr-right{
    background:#d9e1f2;
    color:#000;
    padding: 14px 14px;
    width: 38%;
    vertical-align: top;
    font-weight: 500;
  }

  .accr-left-title{
    font-weight: 900;
    margin-bottom: 8px;
    line-height: 1.25;
    padding-left: 30px;
  }

  .accr-link{
    display:inline-block;
    color:blue;
    font-weight: 900;
    text-decoration: underline;
    word-break: break-word;
    text-align: left;
    padding-left: 40px;
  }

  .accr-link:hover{
    color:#111;
    text-decoration-thickness: 3px;
  }

  .accr-list{
    list-style: none;
    padding-left: 0;
    margin: 0;
  }
  .accr-list li{ margin: 4px 0; }

  @media (max-width: 991.98px){
    .accr-head{ font-size: 1.05rem; }
    .accr-subhead{ font-size: 1rem; }
    .accr-left, .accr-right{ width:auto; }
    .intl-card{ padding: 18px; }
  }
</style>

<?php include 'footer.php'; ?>
