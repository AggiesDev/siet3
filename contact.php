<?php
  $active = "contact";
  $page_css = ["sections.css", "contact.css"];
  include "header.php";
?>
<main>
<?php $page_id = 'contact'; ?>


<!-- ======================
     CONTACT US
     ====================== -->
<section class="page-hero py-5">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <span class="badge-soft mb-3 d-inline-block">Contact</span>
        <h1 class="mb-2">Contact Us</h1>
        <p class="lead mb-0">
          For membership enquiries, accreditation, partnerships, or general information, reach out to us anytime.
        </p>
      </div>
      <div class="col-lg-5">
        <div class="lead-card contact-quick">
          <div class="d-flex justify-content-between align-items-start gap-3">
            <div>
              <div class="fw-bold">Office Address</div>
              <div class="text-muted">96 Waterloo Street #02-02, Singapore 187967</div>
            </div>
            <a class="btn btn-sm btn-outline-primary" href="#message">Send a message</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row g-4">

      <div class="col-lg-5">
        <div class="contact-card h-100">
          <h2 class="h5 fw-bold mb-3">How to reach us</h2>

          <div class="contact-item">
            <div class="contact-ico">📍</div>
            <div>
              <div class="fw-semibold">Address</div>
              <div class="text-muted">96 Waterloo Street #02-02, Singapore 187967</div>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-ico">☎</div>
            <div>
              <div class="fw-semibold">Phone</div>
              <div class="text-muted">+65 XXXX XXXX</div>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-ico">✉</div>
            <div>
              <div class="fw-semibold">Email</div>
              <div class="text-muted">info@siet.org.sg</div>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-ico">🕘</div>
            <div>
              <div class="fw-semibold">Office hours</div>
              <div class="text-muted">Mon–Fri: 9:00 AM – 5:00 PM</div>
            </div>
          </div>

          <hr class="my-4" />

          <div class="d-flex flex-wrap gap-2">
            <a class="btn btn-outline-secondary btn-sm" href="https://facebook.com/sietorg.sg" target="_blank" rel="noopener">Facebook</a>
            <a class="btn btn-outline-secondary btn-sm" href="#" aria-disabled="true">LinkedIn</a>
            <a class="btn btn-outline-secondary btn-sm" href="#" aria-disabled="true">YouTube</a>
          </div>
        </div>
      </div>

      <div class="col-lg-7" id="message">
        <div class="contact-card">
          <h2 class="h5 fw-bold mb-1">Send us a message</h2>
          <p class="text-muted mb-4">This form is a placeholder (no database). You can connect it to email or admin panel later.</p>

          <form action="#" method="post" onsubmit="event.preventDefault(); alert('Thanks! This is a placeholder form.');">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" placeholder="Your name" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="you@example.com" required>
              </div>
              <div class="col-12">
                <label class="form-label">Subject</label>
                <input type="text" class="form-control" placeholder="Membership / Accreditation / Partnerships" required>
              </div>
              <div class="col-12">
                <label class="form-label">Message</label>
                <textarea class="form-control" rows="6" placeholder="Write your message..." required></textarea>
              </div>
              <div class="col-12 d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div class="text-muted small">By sending, you agree that SIET may contact you to follow up.</div>
                <button type="submit" class="btn btn-primary px-4">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="col-12">
        <div class="contact-map">
          <iframe
            src="https://www.google.com/maps?q=96%20Waterloo%20Street%20Singapore&output=embed"
            width="100%"
            height="320"
            style="border:0;"
            loading="lazy"
            title="SIET Office Map"></iframe>
        </div>
      </div>

    </div>
  </div>
</section>


</main>
<?php include "footer.php"; ?>
