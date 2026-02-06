<?php
  $active = 'membership';
  $page_css = ['sections.css'];
  include 'header.php';
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Membership Annual Subscription Renewal</h1>
    <p class="text-muted mb-0">Quick action to renew membership and proceed to payment.</p>
  </div>
</section>

<section class="section-pad">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="lead-card">
          <h3 class="h5">Renew in 60 seconds</h3>
          <p class="text-muted">This is a clean placeholder flow. Later, it can be connected to an online payment gateway.</p>
          <form class="row g-3">
            <div class="col-12">
              <label class="form-label">Membership ID</label>
              <input class="form-control" placeholder="e.g., MSIET-000123" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" placeholder="you@example.com" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Grade</label>
              <select class="form-select">
                <option>FSIET</option>
                <option>MSIET</option>
                <option>AMSIET</option>
                <option>Assoc. SIET</option>
              </select>
            </div>
            <div class="col-12">
              <button type="button" class="btn btn-primary btn-download">Proceed to Renew</button>
              <a class="btn btn-outline-primary ms-2" href="membership-fees.php">View Fees</a>
            </div>
          </form>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="lead-card">
          <h3 class="h5">Need help?</h3>
          <p class="text-muted mb-2">Contact SIET Secretariat:</p>
          <ul class="mb-0">
            <li>96 Waterloo Street #02-02, Singapore 187967</li>
            <li>Email: info.sietorgsg@gmail.com</li>
            <li>Facebook: facebook.com/sietorg.sg</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
