<?php require_once 'auth.php'; ?>
<?php
  // Sessions are used for lightweight profile storage (no database)
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  // Page helpers
  $active = $active ?? '';
  $page_css = $page_css ?? [];
  if (!is_array($page_css)) { $page_css = []; }

  // For the navbar search suggestions
  $nav_search_items = [
    ["Home", "index.php"],

    // About SIET
    ["About SIET - Introduction", "introduction.php"],
    ["About SIET - Organisation Structure", "organisation.php"],
    ["About SIET - Our Honorary Patron & Fellows", "fellows.php"],
    ["About SIET - Executive Council 2025/2026", "council.php"],
    ["About SIET - Our Founders and Past Councils", "founders.php"],
    ["About SIET - History and Milestones", "history.php"],

    // Membership
    // ["Membership - Directory of Members & Status", "membership-directory.php"],
    ["Membership - Why Become SIET Member", "why-member.php"],
    // ["Membership - SIET Benefits", "membership-benefits.php"],
    ["Membership - Membership Pathways", "membership-pathways.php"],
    // ["Membership - Membership Grades vs Requirements", "membership-grades.php"],
    ["Membership - Mature Candidate Scheme", "mature-candidate.php"],
    ["Membership - Students as Members", "students-members.php"],
    ["Membership - Membership Fees", "membership-fees.php"],
    // ["Membership - Renewal (Quick Renew)", "membership-renewal.php"],

    // Certifications
    // ["Certifications - Directory of Professionals", "cert-directory.php"],
    ["Certifications - Professionals of Examinations", "professionalexaminations.php"],
    ["Certifications - Certification & Progression", "cert-vs-membership.php"],
    ["Certifications - SIET – TPC", "siet-tpc.php"],
    ["Certifications - Certification Application", "cert-application.php"],
    ["Certifications - Certification Fees", "cert-fees.php"],

    // Renewal & CPD
    ["Renewal & CPD - Renewal of Professional Registration", "cpd-renewal.php"],
    ["Renewal & CPD - Types of CPD", "cpd-types.php"],

    // Accreditations
    ["Accreditations - International Accreditation", "accreditation-international.php"],
    ["Accreditations - Local Accreditation", "accreditation-local.php"],

    // Global Network
    ["Global Network - Global Founding Members", "global-founding.php"],
    ["Global Network - International Recognitions", "global-recognitions.php"],
    ["Global Network - Global Affiliations", "global-affiliations.php"],
    // ["Global Network - Global Network", "global-network.php"],
    ["Global Network - Links", "global-links.php"],

    // Partnerships & Recognition
    ["Partnerships & Recognition - organisational partnership", "organisational-partnership.php.php"],
    ["Partnerships & Recognition - Sponsorship", "sponsorship.php"],
    ["Partnerships & Recognition - Awards", "awards.php"],
    ["Partnerships & Recognition - Expert Services", "resources.php"],

    // Contact
    ["Contact Us", "contact.php"],

    // Profile
    // ["Profile", "profile.php"],
  ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SIET | Singapore Institute of Engineering Technologists</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Base CSS (every page) -->
  <link rel="stylesheet" href="css/base.css" />

  <!-- Page CSS (only when needed) -->
  <?php foreach ($page_css as $css): ?>
    <link rel="stylesheet" href="css/<?php echo htmlspecialchars($css); ?>" />
  <?php endforeach; ?>

  <style>
  /* =========================================
     BRAND / LOGO (Banner image)
     ========================================= */
  .brand-stack{
    display:flex;
    flex-direction:column;
    align-items:flex-start;
    gap:0;
    text-decoration:none;
    min-width: 0;
  }

  /* Banner image responsiveness */
  .brand-logo{
    height: 62px;            /* desktop default */
    width: auto;
    max-width: 620px;
    object-fit: contain;
    display:block;
  }
/* tablet default */
  @media (max-width: 1199.98px){
    .brand-logo{
      height: 75px;
      max-width: 480px;
    }
  }
/* mobile default */
  @media (max-width: 575.98px){
    .brand-logo{
      height: 50px;
      max-width: 370px;
    }
  }

  /* Old text spans not needed when banner contains the text */
  .brand-stack span{ display:none !important; }


  /* =========================================
     DROPDOWN CATEGORY HEADER STYLE
     ========================================= */
  .dropdown-header{
    font-weight: 900;
    color: rgba(17,24,39,.65);
    padding: .4rem 1.5rem .25rem;
    text-transform: uppercase;
  }


  /* =========================================
     SEARCH ICON: remove on mobile/small screens
     ========================================= */
  @media (max-width: 1199.98px){
    .nav-search-desktop{ display:none !important; }
  }


  /* =========================================
     DESKTOP SEARCH PREVIEW
     ========================================= */
  #navSearchPanel .nav-search-panel__inner{
    position: relative;
  }

  #navSearchPanel .nav-search-results{
    position: static !important;   /* ✅ important fix */
    top: auto !important;
    left: auto !important;
    right: auto !important;

    display: none;                 /* JS will set to block */
    margin-top: 8px !important;
    max-height: 320px;
    overflow-y: auto;
  }

  /* Keep mobile dropdown behaviour */
  .nav-search-mobile{
    position: relative;
  }

  .nav-search-mobile .nav-search-results{
    position: absolute !important;
    top: calc(100% + 6px) !important;
    left: 0 !important;
    right: 0 !important;
    z-index: 1050;
  }


  /* =========================================
     SEARCH ICON
     ========================================= */
  #navSearchToggle.nav-search-icon{
    width: 44px !important;
    height: 44px !important;
    padding: 0 !important;
    margin: 0 !important;
    border: 0 !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    cursor: pointer !important;
    pointer-events: auto !important;
    position: relative;
    z-index: 1060;
  }

  #navSearchToggle.nav-link{
    padding: 0 !important;
  }

  #navSearchToggle .nav-search-glyph{
    pointer-events: none; /* click goes to button, not emoji */
  }
</style>
</head>

<?php $page_id = $page_id ?? pathinfo($_SERVER["PHP_SELF"], PATHINFO_FILENAME); ?>
<body class="smooth-scroll" data-pageid="<?php echo htmlspecialchars($page_id); ?>">

<?php if (is_logged_in()): ?>
<div id="editToolbar">
  <div class="container-fluid px-3 px-lg-5 d-flex align-items-center gap-2 flex-wrap">
    <button id="btnEditToggle" class="btn btn-light btn-sm">Edit Page</button>
    <button id="btnEditSave" class="btn btn-warning btn-sm">Save</button>
    <small id="editStatus" class="ms-2">...</small>
    <a class="btn btn-outline-light btn-sm ms-auto" href="logout.php">Logout</a>
  </div>
</div>
<?php endif; ?>

<!-- ================= TOP BAR (Login moved here) ================= -->
<div class="siet-topbar">
  <div class="container-fluid px-3 px-lg-5">
    <div class="siet-topbar__inner">
      <div class="siet-topbar__left">
        <span class="siet-topbar__badge">Official Website</span>
        <span class="siet-topbar__text d-none d-md-inline">Singapore Institute of Engineering Technologists</span>
      </div>

      <div class="siet-topbar__right">
        <?php if (is_logged_in()): ?>
          <span class="siet-topbar__hello d-none d-sm-inline">Admin Mode</span>
          <a href="logout.php" class="btn btn-outline-light btn-sm siet-topbar__btn">Logout</a>
        <?php else: ?>
          <a href="login.php" class="btn btn-primary btn-sm siet-topbar__btn">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- ======================
       NAVBAR
     ====================== -->
<nav class="navbar navbar-expand-xl navbar-light bg-white shadow-sm sticky-top">
  <div class="container-fluid px-3 px-lg-5">

    <!-- Brand: banner image (contains Chinese + English) -->
    <a class="navbar-brand brand-stack" href="index.php" aria-label="SIET Home">
      <img
        src="images/SIET Logo and Banner/sietlonglogo.PNG"
        alt="Singapore Institute of Engineering Technologists (SIET)"
        class="brand-logo"
      />
      <!-- old spans kept but hidden -->
      <!-- <span>SIET Website Logo Chinese Text</span>
      <span>SIET Website Logo English Text</span> -->
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
      aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto mb-2 mb-xl-0 align-items-xl-center navbar-nav-wrap">

        <!-- SEARCH (Mobile/Tablet: inside menu) -->
        <li class="nav-item w-100 d-xl-none mb-3">
          <div class="nav-search-mobile">
            <input id="navSearchInputMobile" class="form-control" type="search" placeholder="Search..." autocomplete="off" />
            <div id="navSearchResultsMobile" class="nav-search-results" aria-label="Search results"></div>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo ($active==='home') ? 'active' : ''; ?>" href="index.php">Home</a>
        </li>

        <!-- ABOUT SIET -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php echo (str_starts_with($active,'about')) ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About SIET
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="introduction.php">Introduction</a></li>
            <li><a class="dropdown-item" href="organisation2.php">Organisation Structure</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="fellows.php">Our Honorary Patron &amp; Fellows</a></li>
            <li><a class="dropdown-item" href="council.php">Executive Council 2025/2026</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="founders.php">Our Founders and Past Councils</a></li>
            <li><a class="dropdown-item" href="history.php">History and Milestones</a></li>
          </ul>
        </li>

        <!-- MEMBERSHIP -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php echo (str_starts_with($active,'membership')) ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Membership
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="why-member.php">Why Become SIET Member</a></li>
            <!-- <li><a class="dropdown-item" href="membership-benefits.php">SIET Benefits</a></li> -->
            <li><a class="dropdown-item" href="membership-pathways.php">Membership Pathways</a></li>
            <!-- <li><a class="dropdown-item" href="membership-grades.php">Membership Grades vs Requirements</a></li> -->
            <li><a class="dropdown-item" href="mature-candidate.php">Mature Candidate Scheme</a></li>
            <li><a class="dropdown-item" href="students-members.php">Students as Members</a></li>
            <li><a class="dropdown-item" href="membership-fees.php">Membership Fees</a></li>
          </ul>
        </li>

        <!-- CERTIFICATIONS -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php echo (str_starts_with($active,'cert')) ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Certification
          </a>
          <ul class="dropdown-menu">
            <!-- <li><a class="dropdown-item" href="cert-directory.php">Directory of Professionals</a></li> -->
            <li><a class="dropdown-item" href="professionalexaminations.php">Professional Examinations</a></li>
            <li><a class="dropdown-item" href="cert-vs-membership.php">Certification &amp; Progression</a></li>
            <li><a class="dropdown-item" href="siet-tpc.php">SIET – TPC</a></li>
            <li><a class="dropdown-item" href="cert-application.php">Certification Application</a></li>
            <li><a class="dropdown-item" href="cert-fees.php">Certification Fees</a></li>
          </ul>
        </li>

        <!-- ACCREDITATION -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php echo (str_starts_with($active,'accredit')) ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Accreditation
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="introductionofaccreditation.php">Introduction</a></li>
            <li><a class="dropdown-item" href="accreditation-international.php">International Accreditation</a></li>
            <li><a class="dropdown-item" href="accreditation-local.php">Local Accreditation</a></li>
            <li><a class="dropdown-item" href="accredited-courses.php">Accredited Courses</a></li>
          </ul>
        </li>

        <!-- RENEWAL & CPD -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php echo (str_starts_with($active,'cpd')) ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Renewal &amp; CPD
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="cpd-renewal.php">Renewal of Professional Registration</a></li>
            <li><a class="dropdown-item" href="cpd-types.php">Types of CPD</a></li>
          </ul>
        </li>

        <!-- GLOBAL NETWORK -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php echo (str_starts_with($active,'global')) ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Global Network
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="global-founding.php">Founding Members</a></li>
            <li><a class="dropdown-item" href="global-recognitions.php">International Recognitions</a></li>
            <li><a class="dropdown-item" href="global-affiliations.php">Global Affiliations</a></li>
            <li><a class="dropdown-item" href="global-links.php">Links</a></li>
          </ul>
        </li>

        <!-- Partnerships & Recognition -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php echo (str_starts_with($active,'news')) ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Partnerships &amp; Recognition
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="organisational-partnership.php">organisational partnership</a></li>
            <li><h5 class="dropdown-header">Recognition</h5></li>
            <li><a class="dropdown-item" href="sponsorship.php">Sponsorship</a></li>
            <li><a class="dropdown-item" href="awards.php">Awards</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><h5 class="dropdown-header">Resources</h5></li>
            <li><a class="dropdown-item" href="resources.php">Expert Services</a></li>
            <!-- <li><a class="dropdown-item" href="#">Other benefits</a></li> -->
          </ul>
        </li>

        <!-- Desktop Search Icon -->
        <li class="nav-item nav-search-desktop align-items-center">
          <button id="navSearchToggle" class="nav-link btn btn-link nav-search-icon" type="button" aria-label="Toggle search" aria-expanded="false">
            <span class="nav-search-glyph" aria-hidden="true">🔍</span>
          </button>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!--  Desktop Search Panel -->
<div id="navSearchPanel" class="nav-search-panel" hidden>
  <div class="container-fluid px-3 px-lg-5">
    <div class="nav-search-panel__inner">
      <input id="navSearchInput" class="form-control" type="search" placeholder="Search…" autocomplete="off" />
      <div id="navSearchResults" class="nav-search-results" aria-label="Search results"></div>
    </div>
  </div>
</div>

<script>
window.__NAV_SEARCH_ITEMS__ = <?php echo json_encode($nav_search_items, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>;

(function(){
  const items = (window.__NAV_SEARCH_ITEMS__ || []).map(([t,u]) => ({ t: String(t||''), u: String(u||'') }));

  const panel = document.getElementById('navSearchPanel');
  const toggleBtn = document.getElementById('navSearchToggle');

  const desktopInput = document.getElementById('navSearchInput');
  const desktopResults = document.getElementById('navSearchResults');

  const mobileInput = document.getElementById('navSearchInputMobile');
  const mobileResults = document.getElementById('navSearchResultsMobile');

  function escapeHtml(s){
    return s.replace(/[&<>\"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','\"':'&quot;','\'':'&#39;'}[c]));
  }

  //  Highlight typed keyword inside result title (preview)
  function highlightText(text, query){
    const t = String(text || '');
    const q = String(query || '').trim();
    if (!q) return escapeHtml(t);

    const lowerT = t.toLowerCase();
    const lowerQ = q.toLowerCase();
    const idx = lowerT.indexOf(lowerQ);
    if (idx === -1) return escapeHtml(t);

    const before = t.slice(0, idx);
    const match  = t.slice(idx, idx + q.length);
    const after  = t.slice(idx + q.length);

    return `${escapeHtml(before)}<strong>${escapeHtml(match)}</strong>${escapeHtml(after)}`;
  }

  function render(resultsEl, q){
    if (!resultsEl) return;
    const query = (q || '').trim();
    const queryLower = query.toLowerCase();

    if (!query){
      resultsEl.style.display = 'none';
      resultsEl.innerHTML = '';
      return;
    }

    const matches = [];
    for (let i=0; i<items.length; i++){
      const it = items[i];
      if (it.t.toLowerCase().includes(queryLower)) matches.push(it);
      if (matches.length >= 8) break;
    }

    if (!matches.length){
      resultsEl.innerHTML = '<div class="nav-search-empty">No results found.</div>';
      resultsEl.style.display = 'block';
      return;
    }

    resultsEl.innerHTML = matches
      .map(it => {
        const titleHtml = highlightText(it.t, query);
        return `<a class="nav-search-result" href="${escapeHtml(it.u)}">${titleHtml}</a>`;
      })
      .join('');
    resultsEl.style.display = 'block';
  }

  function bind(inputEl, resultsEl){
    if (!inputEl || !resultsEl) return;
    let t = null;

    inputEl.addEventListener('input', () => {
      window.clearTimeout(t);
      t = window.setTimeout(() => render(resultsEl, inputEl.value), 120);
    });

    inputEl.addEventListener('focus', () => render(resultsEl, inputEl.value));
  }

  bind(desktopInput, desktopResults);
  bind(mobileInput, mobileResults);

  function openPanel(){
    if (!panel) return;
    panel.hidden = false;
    toggleBtn && toggleBtn.setAttribute('aria-expanded', 'true');
    window.setTimeout(() => desktopInput && desktopInput.focus(), 0);
  }

  function closePanel(){
    if (!panel) return;
    panel.hidden = true;
    toggleBtn && toggleBtn.setAttribute('aria-expanded', 'false');
    if (desktopResults) desktopResults.style.display = 'none';
  }

  if (toggleBtn && panel){
    //  reliable click
    toggleBtn.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      if (panel.hidden) openPanel();
      else closePanel();
    });

    //  keyboard support
    toggleBtn.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        e.stopPropagation();
        if (panel.hidden) openPanel();
        else closePanel();
      }
    });
  }

  document.addEventListener('click', (e) => {
    const target = e.target;
    const inPanel = panel && panel.contains(target);
    const inToggle = toggleBtn && toggleBtn.contains(target);

    const inMobile = (mobileInput && mobileInput.contains(target)) || (mobileResults && mobileResults.contains(target));
    if (mobileResults && !inMobile) mobileResults.style.display = 'none';

    if (desktopResults && !inPanel && !inToggle) desktopResults.style.display = 'none';
    if (panel && !panel.hidden && !inPanel && !inToggle) closePanel();
  });
})();
</script>