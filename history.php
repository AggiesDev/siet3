<?php
  
  $page_id  = 'history';
  $active   = "about";
  $page_css = ["about.css","sections.css"]; // keep your normal css if needed
  include "header.php";
?>
<main>

  <!-- ======================
       HERO
       ====================== -->
  <section class="page-hero py-5">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-lg-8">
          <span class="badge-soft mb-3 d-inline-block">About SIET</span>
          <h1 class="mb-2">History & Milestones</h1>
          <p class="lead mb-0">
            Key milestones and achievements in SIET’s journey since 1980.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================
       ACTION BUTTONS (3)
       ====================== -->
  <section class="py-4">
    <div class="container">
      <div class="history-actions">
        <a href="historyfounder.php" class="history-action history-action--blue">
          <span class="ha-ico">👥</span>
          <span class="ha-text">
            <span class="ha-title">Founding Members (1980)</span>
            <span class="ha-sub">Meet the founders poster</span>
          </span>
        </a>

        <a href="notificationundersection.php" class="history-action history-action--dark">
          <span class="ha-ico">📜</span>
          <span class="ha-text">
            <span class="ha-title">Societies Act Notice</span>
            <span class="ha-sub">Official registration record</span>
          </span>
        </a>

        <a href="displaylaw.php" class="history-action history-action--purple">
          <span class="ha-ico">🏛️</span>
          <span class="ha-text">
            <span class="ha-title">Identity & Constitution</span>
            <span class="ha-sub">Evolution of name & documents</span>
          </span>
        </a>
      </div>
    </div>
  </section>

  <!-- ======================
       MILESTONES TABLE (FIXED)
       ====================== -->
  <section class="py-5 milestones-wrap">
    <div class="container">

      <div class="milestones-card">
        <h2 class="milestones-title">Milestones</h2>

        <div class="milestones-table-wrap">
          <table class="milestones-table" role="table" aria-label="Important Milestones of SIET">
            <thead>
              <tr>
                <th class="col-year">Year</th>
                <th>Important Milestones of SIET</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td class="year">1980</td>
                <td>
                  <div class="m-item"><strong>Establishment of SIET</strong></div>
                </td>
              </tr>

              <tr>
                <td class="year">1981</td>
                <td>
                  <div class="m-item"><strong>SIETfirst rented office</strong> : 20-E, Upper Serangoon Road, Singapore 1334.</div>
                  <div class="m-item"><strong>SIET Yearbook</strong> launched (last published in 1999).</div>
                  <div class="m-item"><strong>SIET Quarterly Journals</strong> launched (last issue: December 1999).</div>
                  <div class="m-item">SIET – Advanced Diploma in Civil Engineering (incorporating CEI Part 2 syllabuses).</div>
                </td>
              </tr>

              <tr>
                <td class="year">1982</td>
                <td>
                  <div class="m-item">SIET Constitution amended to enable the Institute to conduct its own <strong>Professional Examinations</strong>.</div>
                </td>
              </tr>

              <tr>
                <td class="year">1984</td>
                <td>
                  <div class="m-item"><strong>SIET 2<sup>nd</sup> rented office</strong>: 50 Chin Swee Road, #08-02, Thong Chai Building, Singapore 0316.</div>
                  <div class="m-item"><strong>SIET</strong> affiliated to the <strong>Institute of Engineers &amp; Technicians, UK</strong> (Founded 1948; Incorporated 1967).</div>
                  <div class="m-item">Suitably qualified members can be registered as EngTech and IEng of UK.</div>
                  <div class="m-item">IET-UK later merged with IIE-UK; IIE-UK later merged with IEE-UK to form the present Institution of Engineering &amp; Technology, UK.</div>
                  <div class="m-item">Website: <a href="https://www.theiet.org" class="milestone-link" target="_blank" rel="noopener">www.theiet.org</a></div>
                </td>
              </tr>

              <tr>
                <td class="year">1985</td>
                <td>
                  <div class="m-item"><strong>SIET 3<sup>rd</sup> rented office</strong>: 11-C, Mackenzie Road, Singapore 1334.</div>
                  <div class="m-item"><strong>SIET</strong> adopted the Society of Engineers, UK as its own qualifying examinations (Established 1854; Incorporated 1910).</div>
                  <div class="m-item">SOE Part 1 → <strong>AMSIET</strong></div>
                  <div class="m-item">SOE Part 2 → <strong>MSIET</strong></div>
                  <div class="m-item">SOE Part 3 → <strong>FSIET</strong></div>
                  <div class="m-item">Members who completed all parts (with required experience) can apply for registration as PEng(UK).</div>
                  <div class="m-item">Website: <a href="https://www.professionalengineers-uk.org" class="milestone-link" target="_blank" rel="noopener">www.professionalengineers-uk.org</a></div>
                </td>
              </tr>

              <tr>
                <td class="year">1986 </td>
                <td>
                  <div class="m-item">SIET changed its name from <strong>“Technicians” to “Technologists”</strong>.</div>
                  <div class="m-item">SIET supported the <strong>Master of Business Administration</strong> (MBA) program awarded by <strong>Oklahoma City University,</strong> USA in Singapore.</div>
                </td>
              </tr>

              <tr>
                <td class="year">1988</td>
                <td>
                  <div class="m-item"><strong>SIET 4<sup>th</sup> rented office</strong>: Block 261, Waterloo Street (Waterloo Centre), #03-01, Singapore 0718.</div>
                  <div class="m-item">SIET elected as a full member of the <strong>Singapore Professional Centre.</strong></div>
                  <div class="m-item">SIET officially adopted the Engineering Council, UK examinations as alternate qualifying examinations:</div>
                  <div class="m-item">EC Part 1 <strong> → </strong>MSIET</div>
                  <div class="m-item">EC Part 2 <strong>→ </strong>FSIET</div>
                </td>
              </tr>

              <tr>
                <td class="year">1989</td>
                <td>
                  <div class="m-item">SIET introduced its first <strong>Graduate Diploma in Management for Technology</strong> (GDMT) programme.</div>
                  <div class="m-item">Tuition classes leading to <strong>UK - EC Part 2 Exam</strong> began.</div>
                </td>
              </tr>

              <tr>
                <td class="year">1990</td>
                <td>
                  <div class="m-item">Signed MOU with the <strong>Technological Association of Malaysia </strong>(TAM).</div>
                  <div class="m-item">Website: <a href="https://www.tam.org.my" class="milestone-link" target="_blank" rel="noopener">www.tam.org.my</a></div>
                </td>
              </tr>

              <tr>
                <td class="year">1991</td>
                <td>
                  <div class="m-item">SIET affiliated to the <strong>Society of Engineers, UK </strong>(Founded 1854; Incorporated 1967).</div>
                  <div class="m-item">SOE-UK later merged with IIE-UK; IIE-UK later merged with IEE-UK to form the present Institution of Engineering &amp; Technology, UK.</div>
                  <div class="m-item">Website: <a href="https://www.theiet.org" class="milestone-link" target="_blank" rel="noopener">www.theiet.org</a></div>
                </td>
              </tr>

              <tr>
                <td class="year">1994</td>
                <td>
                  <div class="m-item">SIET – General Certificate in Engineering launched.</div>
                  <div class="m-item">SIET – Diploma in Engineering Management launched.</div>
                </td>
              </tr>

              <tr>
                <td class="year">1995</td>
                <td>
                  <div class="m-item">Signed MOU with the <strong>Applied Science Technologists and Technicians of British Columbia, Canada.</strong></div>
                  <div class="m-item">Website: <a href="https://www.asttbc.ca" class="milestone-link" target="_blank" rel="noopener">www.asttbc.ca</a></div>
                </td>
              </tr>

              <tr>
                <td class="year">1996</td>
                <td>
                  <div class="m-item">Signed MOU with the <strong>Institute of Professional Engineering Technologists, South Africa.</strong></div>
                  <div class="m-item">Website: <a href="https://www.ipet.co.za" class="milestone-link" target="_blank" rel="noopener">www.ipet.co.za</a></div>
                  <div class="m-item">Signed MOU with the <strong>Institution of Engineers, Australia.</strong></div>
                  <div class="m-item">Website: <a href="https://www.engineersaustralia.org.au" class="milestone-link" target="_blank" rel="noopener">www.engineersaustralia.org.au</a></div>
                </td>
              </tr>

              <tr>
                <td class="year">1997</td>
                <td>
                  <div class="m-item">Founder Member of the<strong> World Federation of Technology Organizations </strong>(WFTO).</div>
                  <div class="m-item">Website: <a href="https://www.wfto.org" class="milestone-link" target="_blank" rel="noopener">www.wfto.org</a></div>
                  <div class="m-item">Signed MOU with the <strong>University of Southern Queensland, Australia.</strong></div>
                  <div class="m-item">Polytechnic Diploma holders can upgrade themselves to “Professional Engineer” level via <strong>the Bachelor of Enginnering Programme by distance Learning.</strong></div>
                  <div class="m-item">Website: <a href="https://www.usq.edu.au" class="milestone-link" target="_blank" rel="noopener">www.usq.edu.au</a></div>
                </td>
              </tr>
              <tr>
                <td class="year">1999</td>
                <td>
                  <div class="m-item"><strong>SIET 5<sup>th</sup> rented office:</strong> 499A, Geylang Road, Singapore 389457.</div>
                  <div class="m-item">Signed MOU with the <strong>University of Newcastle, Australia.</strong></div>

                  <div class="m-item">- Polytechnic Diploma holders in Built Environment disciplines can upgrade themselves to ‘Fellow (FSIET)’ grade via the <strong>Bachelor of Construction Management programme by distance learning.</strong></div>
                  <div class="m-item">[website : <a href="https://www.newcastle.edu.au" class="milestone-link" target="_blank" rel="noopener">www.newcastle.edu.au</a> ]</div>

                  <div class="m-item ms-4"><em>- Last issue of SIET’s Quarterly journal published : December 1999.</em></div>
                  <div class="m-item ms-4"><em>- Last issue of SIET’s Yearbook published : 1999/2000.</em></div>
                </td>
              </tr>

              <tr>
                <td class="year">2005</td>
                <td>
                  <div class="m-item"><strong>Re-birth of SIET.</strong></div>
                </td>
              </tr>

              <tr>
                <td class="year">2006</td>
                <td>
                  <div class="m-item"><strong>SIET’s new registered address at:</strong> RI Centre, 68, Duxton Road, Singapore 089527.</div>
                  <div class="m-item"><strong>SIET Yearbook re-launched :</strong> 2006/2007 issue published.</div>
                </td>
              </tr>

              <tr>
                <td class="year">2008</td>
                <td>
                  <div class="m-item"><strong>SIET – Accreditation Board launched.</strong></div>
                  <div class="m-item"><strong>SIET – Approved Training Centre Scheme introduced.</strong></div>
                  <div class="m-item"><strong>SIET Yearbook 2007/2008 published.</strong></div>
                </td>
              </tr>

              <tr>
                <td class="year">2009</td>
                <td>
                  <div class="m-item"><strong>SIET Certification Scheme introduced:</strong></div>

                  <div class="m-item"><strong>AMSIET ➔</strong> Certified Engineering Associate <strong>(CertEA)*</strong></div>
                  <div class="m-item"><strong>MSIET ➔</strong> Certified Engineering Technologist <strong>(CertET)*</strong></div>
                  <div class="m-item"><strong>FSIET ➔</strong> Certified Technical Specialist <strong>(CertTS)*</strong></div>

                  <div class="m-item">[Must sit and pass the <strong>SIET – Test of Professional Competence</strong> unless exempted, e.g. <strong>BCA-RE</strong> can be registered as <strong>SIET – CertTS</strong>; <strong>BCA – RTO</strong> can be registered as <strong>SIET – CertET</strong> without further exam.]</div>
                </td>
              </tr>

              <tr>
                <td class="year">2010</td>
                <td>
                  <div class="m-item"><strong>SIET’s Professional Activities Centre initiated:</strong> 166A, Sims Avenue, Singapore 387485.</div>

                  <div class="m-item"><strong>SIET – Professional Examinations:</strong></div>

                  <div class="m-item"><strong>Level 1 – Associate Membership Exam</strong> (8 subjects)</div>
                  <div class="m-item">[➔ <strong>SIET – Diploma in Engineering Technology</strong>]</div>

                  <div class="m-item"><strong>Level 2 – Membership Exam</strong> (8 subjects)</div>
                  <div class="m-item">[➔ <strong>SIET – Advanced Diploma in Engineering Technology</strong>]</div>

                  <div class="m-item"><strong>Level 3 – Fellowship Exam</strong> (6 subjects)</div>
                  <div class="m-item">[➔ <strong>SIET – Graduate Diploma in Engineering Technology or Engineering Management</strong>]</div>
                </td>
              </tr>

              <tr>
                <td class="year">2011</td>
                <td>
                  <div class="m-item"><strong>SIET’s Operation Office at SCWO opened:</strong> 96 Waterloo Street, #02-02, Singapore 187967.</div>

                  <div class="m-item">SIET officially adopted <strong>The institution of Engineers, Malaysia/Board of Engineers, Malaysia (IEM/BEM) Graduate Examinations (March 2011 edition)</strong> as its alternate Qualifying Examinations (Engineering Stream : Civil; Electrical; Mechanical; Chemical):</div>

                  <div class="m-item"><strong>IEM/BEM Part 1</strong> (8 subjects) ➔ <strong>MSIET</strong></div>
                  <div class="m-item"><strong>IEM/BEM Part 2</strong> (6 compulsory subjects) ➔ <strong>FSIET</strong></div>

                  <div class="m-item">[websites : <a href="https://www.iem.org.my" class="milestone-link" target="_blank" rel="noopener">www.iem.org.my</a> ; <a href="https://www.bem.org.my" class="milestone-link" target="_blank" rel="noopener">www.bem.org.my</a> ]</div>
                </td>
              </tr>


            </tbody>
          </table>
        </div>

      </div>

    </div>
  </section>

  <!-- ======================
       CSS (Milestones style + buttons)
       ====================== -->
  <style>
    /* ===== Buttons (3) ===== */
    .history-actions{
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 12px;
    }

    .history-action{
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px 14px;
      border-radius: 14px;
      text-decoration: none;
      background: #ffffff;
      border: 1px solid rgba(0,0,0,.10);
      box-shadow: 0 12px 22px rgba(0,0,0,.08);
      transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
      height: 100%;
    }

    .history-action:hover{
      transform: translateY(-2px);
      box-shadow: 0 16px 28px rgba(0,0,0,.12);
      border-color: rgba(13,110,253,.25);
    }

    .ha-ico{
      width: 44px;
      height: 44px;
      border-radius: 12px;
      display: grid;
      place-items: center;
      font-size: 20px;
      border: 1px solid rgba(0,0,0,.08);
      flex: 0 0 auto;
    }

    .ha-text{
      display: flex;
      flex-direction: column;
      line-height: 1.2;
    }

    .ha-title{
      font-weight: 900;
      color: #111827;
      font-size: 1rem;
    }

    .ha-sub{
      margin-top: 4px;
      font-size: .9rem;
      color: #6b7280;
    }

    .history-action--blue .ha-ico{
      background: rgba(13,110,253,.10);
      color: #0d6efd;
    }

    .history-action--dark .ha-ico{
      background: rgba(17,24,39,.07);
      color: #111827;
    }

    .history-action--purple .ha-ico{
      background: rgba(124,58,237,.10);
      color: #7c3aed;
    }

    @media (max-width: 992px){
      .history-actions{ grid-template-columns: 1fr; }
    }

    /* ===== Milestones table style (matches your images) ===== */
    .milestones-wrap{
      background: #f6f7f9;
    }

    .milestones-card{
      background: #fff;
      border: 1px solid rgba(0,0,0,.10);
      border-radius: 12px;
      box-shadow: 0 18px 35px rgba(0,0,0,.10);
      padding: 18px;
    }

    .milestones-title{
      font-family: "Times New Roman", Times, serif;
      color: #0037ff; /* same strong blue */
      font-weight: 900;
      font-size: 1.9rem;
      margin: 0 0 12px 0;
      letter-spacing: .2px;
    }

    .milestones-table-wrap{
      border: 1px solid rgba(0,0,0,.25);
      overflow: auto;
      background: #fff;
    }

    .milestones-table{
      width: 100%;
      border-collapse: collapse;
      min-width: 900px; /* keep like scanned wide table */
      font-family: "Times New Roman", Times, serif;
      color: #111;
    }

    .milestones-table th,
    .milestones-table td{
      border: 1px solid rgba(0,0,0,.35);
      padding: 10px 10px;
      vertical-align: top;
      font-size: 16px;
      line-height: 1.45;
    }

    .milestones-table thead th{
      font-weight: 900;
      background: #f8fafc;
    }

    .col-year{
      width: 110px;
      text-align: left;
      font-weight: 900;
    }

    .year{
      font-weight: 900;
      white-space: nowrap;
    }

    .m-item{
      margin: 0 0 4px 0;
    }

    .m-item:last-child{
      margin-bottom: 0;
    }

    .milestone-link{
      color: #0d6efd;
      text-decoration: underline;
      font-weight: 700;
    }

    @media (max-width: 576px){
      .milestones-title{ font-size: 1.6rem; }
    }
  </style>

</main>
<?php include "footer.php"; ?>
