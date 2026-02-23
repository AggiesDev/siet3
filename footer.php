  <!-- ======================
  FOOTER
  ====================== -->
  
  <?php
    // Footer uses quick links from header.php (auto updates).
    $ql = $SIET_FOOTER_QUICKLINKS ?? [];
    //form for the quick link arrays (if header.php doesn't define them, we use these defaults):
    $membership = $ql['Membership'] ?? [
      ['title'=>'Why Become a Member','href'=>'why-member.php'],
      ['title'=>'Membership Pathways','href'=>'membership-pathways.php'],
      ['title'=>'Mature Candidate Scheme (MCS)','href'=>'mature-candidate.php'],
      ['title'=>'Membership Application Form','href'=>'member-application.php'],
    ];

    $certifications = $ql['Certifications'] ?? [
      ['title'=>'Certification Application','href'=>'cert-application.php'],
      ['title'=>'Membership vs Certifications','href'=>'cert-vs-membership.php'],
      ['title'=>'Directory of Professionals','href'=>'cert-directory.php'],
      ['title'=>'SIET – TPC','href'=>'siet-tpc.php'],
      ['title'=>'Assessment & Registration Fee','href'=>'cert-fees.php'],
    ];

    $global = $ql['Global Networks'] ?? [
      ['title'=>'Founding Members and Members','href'=>'global-founding.php'],
      ['title'=>'International Recognitions','href'=>'global-recognitions.php'],
      ['title'=>'Global Recongnitions & Affiliations','href'=>'global-affiliations.php'],
      ['title'=>'Collaborative Partners','href'=>'global-links.php'],
    ];

    $cpd = $ql['CPD'] ?? [
      ['title'=>'CPD Renewal','href'=>'cpd-renewal.php'],
      ['title'=>'Types of CPD Activities','href'=>'cpd-types.php'],
    ];

    $accreditation = $ql['Accreditation'] ?? [
      ['title'=>'Local Polytechnics & ITE','href'=>'accreditation-local.php'],
      ['title'=>'International Certification','href'=>'accreditation-international.php'],
    ];
  ?>

  <style>

.footer-brand-logo{
  display: block;
  width: 100%;
  max-width: 240px;  /*default for normal screens*/
  height: auto;
  object-fit: contain;
}

/* Mobile (small screen) */
@media (max-width: 575.98px){
  .footer-brand-logo{
    max-width: 200px;   /* smaller on phone */
    /* margin-left: auto; */
    margin-right: auto; /* center on mobile */
  }

  
}

/* Tablet */
@media (min-width: 576px) and (max-width: 991.98px){
  .footer-brand-logo{
    max-width: 220px;
  }
}

/* Desktop / Large */
@media (min-width: 992px){
  .footer-brand-logo{
    max-width: 260px;  /* bigger on desktop */
  }
}
.footer-brand-logo{
  max-height: 64px;
}
@media (max-width: 575.98px){
  .footer-brand-logo{ max-height: 56px; }
}
@media (min-width: 992px){
  .footer-brand-logo{ max-height: 70px; }
}
       </style>

  <footer class="site-footer bg-dark text-white pt-5">
    <div class="container-fluid px-3 px-lg-5">
      <div class="row g-4">

        <div class="col-md-3">
          <img src="images/SIET Logo and Banner/sietlonglogo.PNG"  class="footer-brand-logo mb-3" alt="SIET" />

          <p class="small mb-2">
            Singapore Institute of Engineering Technologists
          </p>

          <p class="small mb-1">📍 Singapore</p>
          <p class="small mb-1">☎ +65 XXXX XXXX</p>
          <p class="small mb-1">✉ info@siet.org.sg</p>
          <p class="small mb-3">🕘 Mon – Fri: 9:00 AM – 5:00 PM</p></div>

        <div class="col-md-3">
  <h6 class="fw-bold">Membership</h6>
  <ul class="list-unstyled small">

    <?php
      // Keep your exact layout: first 3 items, then "More"
      $first = array_slice($membership, 0, 3);
      $more  = array_slice($membership, 3);
    ?>

    <?php foreach($first as $item): ?>
      <li><a href="<?= htmlspecialchars($item['href']) ?>" class="footer-link"><?= htmlspecialchars($item['title']) ?></a></li>
    <?php endforeach; ?>

    <li class="mt-2 text-secondary fw-semibold">More</li>
    <?php foreach($more as $item): ?>
      <li><a href="<?= htmlspecialchars($item['href']) ?>" class="footer-link"><?= htmlspecialchars($item['title']) ?></a></li>
    <?php endforeach; ?>

  </ul>
</div>

<div class="col-md-3">
  <h6 class="fw-bold">Certifications</h6>
  <ul class="list-unstyled small">

    <?php foreach($certifications as $item): ?>
      <li><a href="<?= htmlspecialchars($item['href']) ?>" class="footer-link"><?= htmlspecialchars($item['title']) ?></a></li>
    <?php endforeach; ?>

    <li class="mt-2 text-secondary fw-semibold">CPD</li>
    <?php foreach($cpd as $item): ?>
      <li><a href="<?= htmlspecialchars($item['href']) ?>" class="footer-link"><?= htmlspecialchars($item['title']) ?></a></li>
    <?php endforeach; ?>

  </ul>
</div>

<div class="col-md-3">
  <h6 class="fw-bold">Global Networks</h6>
  <ul class="list-unstyled small">

    <?php foreach($global as $item): ?>
      <li><a href="<?= htmlspecialchars($item['href']) ?>" class="footer-link"><?= htmlspecialchars($item['title']) ?></a></li>
    <?php endforeach; ?>

    <li class="mt-2 text-secondary fw-semibold">Accreditation</li>
    <?php foreach($accreditation as $item): ?>
      <li><a href="<?= htmlspecialchars($item['href']) ?>" class="footer-link"><?= htmlspecialchars($item['title']) ?></a></li>
    <?php endforeach; ?>

  </ul>
</div>


        <!-- <div class="col-md-3">
          <h6 class="fw-bold">Location Map</h6>
          <iframe
            src="https://www.google.com/maps?q=Singapore&output=embed"
            width="100%"
            height="200"
            style="border:0; border-radius:8px;"
            loading="lazy"
            title="SIET Location Map">
          </iframe>
        </div> -->

      </div>

      <hr class="border-secondary my-4">

      <div class="row align-items-center pb-3">
        <div class="col-md-6 text-center text-md-start small">
          © 2026 Singapore Institute of Engineering Technologists (SIET). All Rights Reserved.
        </div>

        <div class="col-md-6 text-center text-md-end small">
          <span class="text-secondary">Developed By</span>
          <span class="fw-semibold text-light ms-1">AggiesDEV</span>
        </div>
      </div>
    </div>
  </footer>

  <!-- Gallery Lightbox Modal (Bootstrap) -->
  <div class="modal fade" id="galleryLightbox" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content" style="border-radius:18px; overflow:hidden;">
        <div class="modal-body p-0 bg-dark">
          <img id="galleryLightboxImg" src="" alt="" style="width:100%; height:auto; display:block;" />
          <div class="p-3 bg-dark text-white small" id="galleryLightboxCap"></div>
        </div>
        <button type="button" class="btn-close btn-close-white position-absolute" data-bs-dismiss="modal" aria-label="Close" style="top:14px; right:14px;"></button>
      </div>
    </div>
  </div>

  <!-- Go to top (icon only) -->
  <button id="goTopBtn" class="go-top" type="button" aria-label="Go to top">↑</button>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->


  <!-- Lightweight JS (fast) -->
  <script src="js/search.js"></script>
  <script src="js/main.js" defer></script>
  <script src="js/gallery.js" defer></script>

  <script>
    /* =========================================================
       SUBMENU JS 
       ========================================================= */
    document.addEventListener("DOMContentLoaded", function () {
      const nav = document.getElementById("mainNav");
      if (!nav) return;

      function isMobileOrTablet() {
        return window.matchMedia("(max-width: 991.98px)").matches;
      }

      // Close all submenus
      function closeAllSubmenus(exceptLi) {
        document.querySelectorAll(".dropdown-submenu").forEach(li => {
          if (exceptLi && li === exceptLi) return;
          li.classList.remove("show");
          const dm = li.querySelector(":scope > .dropdown-menu");
          if (dm) dm.classList.remove("show");
          const a = li.querySelector(":scope > a.submenu-toggle");
          if (a) a.setAttribute("aria-expanded", "false");
        });
      }

      // Handle submenu toggle (mobile/tablet)
      nav.addEventListener("click", function (e) {
        const toggle = e.target.closest("a.submenu-toggle");
        if (!toggle) return;

        if (!isMobileOrTablet()) return; // desktop hover handles it
        e.preventDefault();
        e.stopPropagation();

        const li = toggle.closest(".dropdown-submenu");
        const dm = li ? li.querySelector(":scope > .dropdown-menu") : null;
        if (!li || !dm) return;

        const isOpen = li.classList.contains("show");

        closeAllSubmenus(li); // close others
        li.classList.toggle("show", !isOpen);
        dm.classList.toggle("show", !isOpen);
        toggle.setAttribute("aria-expanded", String(!isOpen));
      });

      // When main dropdown closes, also close nested submenus
      document.querySelectorAll(".nav-item.dropdown").forEach(drop => {
        drop.addEventListener("hidden.bs.dropdown", function () {
          closeAllSubmenus();
        });
      });

      // On resize: reset submenu states (no reload)
      window.addEventListener("resize", function () {
        closeAllSubmenus();
      });
    });
  </script>
<script src="js/editdata.js"></script>
</body>
</html>