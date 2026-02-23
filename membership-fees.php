<?php
  $active = 'membership';
  $page_css = ['sections.css'];
  include 'header.php';
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Cost of SIET Professional Membership</h1>
    <p class="text-muted mb-0">Registration/Entrance fees are one-time payments. Annual subscription applies yearly.</p>
  </div>
</section>

<section class="section-pad">
  <div class="container">
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead>
          <tr>
            <th>Membership Category</th>
            <th>Registration / Entrance Fee<br><span class="text-muted small">(One-time payment)</span></th>
            <th>Annual Subscription<br><span class="text-muted small">(Yearly)</span></th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Honorary Fellows (HonFSIET)</td><td>NIL</td><td>NIL</td></tr>
          <tr><td>Fellow (FSIET)</td><td>S$80.00</td><td>S$100.00</td></tr>
          <tr><td>Member (MSIET)</td><td>S$60.00</td><td>S$80.00</td></tr>
          <tr><td>Associate Member (AMSIET)</td><td>S$40.00</td><td>S$60.00</td></tr>
          <tr><td>Associate (Assoc. SIET)</td><td>S$30.00</td><td>S$50.00</td></tr>
        </tbody>
      </table>
    </div>

    <div class="callout mt-4">
      <h5 class="mb-1">Download</h5>
      <p class="text-muted mb-3">Membership application form and extracts of membership requirements (Bye-Laws) can be provided as a downloadable PDF.</p>
      <a class="btn btn-download" href="assets/pdfs/SIETMembershipForm2025.pdf">Download Membership Application Form</a>
    </div>
  </div>
</section>
<br><br>

<?php include 'footer.php'; ?>
