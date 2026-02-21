<?php
  $active = 'cert';
  $page_css = ['sections.css'];
  include 'header.php';
?>
<br>
<!-- ======================
     CERT FEES (TABLE ONLY)
     ====================== -->
<section class="section-pad">
  <div class="container">

    <!-- Title (match slide look) -->
    <div class="fees-title-wrap">
      <h1 class="fees-title">Cost of Professional Membership &amp; Certifications</h1>
    </div>

    <!-- Table -->
    <div class="table-responsive fees-table-wrap">
      <table class="fees-table">
        <thead>
          <!-- Big header bar -->
          <tr>
            <th class="fees-tophead" colspan="5">Cost of Certifications</th>
          </tr>

          <!-- Column headers -->
          <tr>
            <th class="fees-th fees-th-left" rowspan="2" style="width:220px;">Membership Grade</th>
            <th class="fees-th" rowspan="2" style="width:380px;">Professional Certified Grade</th>
            <th class="fees-th" style="width:160px;">Assessment Fee</th>
            <th class="fees-th" style="width:160px;">Registration Fee</th>
            <th class="fees-th" style="width:220px;">Total = Assessment Fee<br>+<br>Registration Fee</th>
          </tr>

          <!-- One-time payment note under the last 3 columns -->
          <tr>
            <th class="fees-onetime" colspan="3">(One-time payment)</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td class="fees-td">
              Fellow<br>
              <span class="fees-blue">(FSIET)</span>
            </td>
            <td class="fees-td">
              Certified Technical Specialist<br>
              <span class="fees-pink">(CertTS)</span>
            </td>
            <td class="fees-td fees-center">S$300.00</td>
            <td class="fees-td fees-center">S$50.00</td>
            <td class="fees-td fees-center">S$350.00</td>
          </tr>

          <tr>
            <td class="fees-td">
              Member<br>
              <span class="fees-blue">(MSIET)</span>
            </td>
            <td class="fees-td">
              Certified Engineering Technologist<br>
              <span class="fees-pink">(CertET)</span>
            </td>
            <td class="fees-td fees-center">S$200.00</td>
            <td class="fees-td fees-center">S$50.00</td>
            <td class="fees-td fees-center">S$250.00</td>
          </tr>

          <tr>
            <td class="fees-td">
              Associate Member<br>
              <span class="fees-blue">(AMSIET)</span>
            </td>
            <td class="fees-td">
              Certified Engineering Associate<br>
              <span class="fees-pink">(CertEA)</span>
            </td>
            <td class="fees-td fees-center">S$100.00</td>
            <td class="fees-td fees-center">S$50.00</td>
            <td class="fees-td fees-center">S$150.00</td>
          </tr>

          <tr>
            <td class="fees-td">
              Associate<br>
              <span class="fees-blue">(Assoc. SIET)</span>
            </td>
            <td class="fees-td">N.A.</td>
            <td class="fees-td fees-center">N.A.</td>
            <td class="fees-td fees-center">N.A.</td>
            <td class="fees-td fees-center">N.A.</td>
          </tr>
        </tbody>
      </table>
    </div>
<div>
  <p>The Executive  Council reserves the right to revise the Certification Fees.</p>
  <h3>Payment for Application as a Certified Professional</h3>
  <p>
    Please refer to the details provided in the application form when making payment for your certification application. 
Kindly ensure that payment is made to the bank account of the <span style="font: bold; color: blue;">“Singapore Institute of Engineering Technologists”</span>.
For accuracy, applicants are strongly advised to double-check the payee details before completing the transaction.

  </p>
</div>

  </div>
</section>
<br>
<style>
  /* =========================
     CERT FEES - SLIDE STYLE
     ========================= */

  .fees-title-wrap{
    background:#fff;
    padding: 6px 0 18px;
  }

  .fees-title{
    font-weight: 900;
    font-size: clamp(1.7rem, 2.6vw, 3.2rem);
    line-height: 1.1;
    text-align: center;
    margin: 0;
    color: #111;
    text-shadow: 2px 2px 0 rgba(0,0,0,.18);
  }

  .fees-table-wrap{
    background:#fff;
    padding: 0;
  }

  .fees-table{
    width: 100%;
    min-width: 980px;          /* keep same proportions like slide */
    border-collapse: collapse;
    border: 3px solid #000;    /* thick outer border */
    background: #fff;
  }

  .fees-tophead{
    font-weight: 900;
    color: #ff2f7a;            /* pink header text like slide */
    font-size: 1.6rem;
    text-align: center;
    padding: 14px 10px;
    border: 3px solid #000;
  }

  .fees-th{
    font-weight: 900;
    text-align: center;
    padding: 12px 10px;
    border: 3px solid #000;    /* thick header borders */
    vertical-align: top;
    background: #fff;
    color: #111;
  }

  .fees-th-left{
    text-align: left;
  }

  .fees-onetime{
    font-weight: 900;
    text-align: center;
    padding: 10px 10px;
    border: 3px solid #000;
    color: #ff2f7a;
    background: #fff;
  }

  .fees-td{
    padding: 14px 10px;
    border: 2.5px solid #000;  /* thick gridlines like slide */
    vertical-align: top;
    font-size: 1.05rem;
    color: #111;
    background: #fff;
  }

  .fees-center{
    text-align: center;
    white-space: nowrap;
  }

  .fees-blue{
    color: #0b3dff;
    font-weight: 900;
  }

  .fees-pink{
    color: #ff2f7a;
    font-weight: 900;
  }

  @media (max-width: 576px){
    .fees-td{ font-size: 1rem; }
  }
</style>

<?php include 'footer.php'; ?>
