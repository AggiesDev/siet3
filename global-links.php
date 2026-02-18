<?php
  $active = 'global';
  $page_css = ['sections.css'];
  include 'header.php';

  $links = [
    "soc" => [
      [
        "name" => "ASEAN Federation of Engineering Organisations",
        "url"  => "https://www.afeo.org/",
        "img"  => "images/global/afeo.png",
        "tag"  => "Society"
      ],
      [
        "name" => "World Federation of Technology Organizations",
        "url"  => "https://wfto.com/",
        "img"  => "images/Affiliated Organisations Logo/SIET Affiliations Logo/logoWFTO.jpg",
        "tag"  => "Society"
      ],
      [
        "name" => "Global Technological Alliance",
        "url"  => "https://mbot.org.my/",
        "img"  => "images/global/gta.png",
        "tag"  => "Alliance"
      ],
    ],
    "ins" => [
      [
        "name" => "Engineering Council",
        "url"  => "https://www.engc.org.uk/",
        "img"  => "images/Affiliated Organisations Logo/SIET Affiliations Logo/Engineering Council UK Logo.jpg",
        "tag"  => "Institute"
      ],
      [
        "name" => "Engineers Australia",
        "url"  => "https://www.engineersaustralia.org.au/",
        "img"  => "images/Affiliated Organisations Logo/SIET Affiliations Logo/Engineers Australia Logo.svg",
        "tag"  => "Institute"
      ],
      [
        "name" => "Institution of Engineering and Technology",
        "url"  => "https://www.theiet.org/",
        "img"  => "images/global/iet.png",
        "tag"  => "Institute"
      ],
    ],
    "oth" => [
      [
        "name" => "Singapore Professional Centre",
        "url"  => "https://singaporeprofessionalcentre.com/",
        "img"  => "images/global/spc.png",
        "tag"  => "Partner"
      ],
      [
        "name" => "Malaysia Board of Technologists",
        "url"  => "https://www.mbot.org.my/",
        "img"  => "images/global/mbot.png",
        "tag"  => "Board"
      ],
    ],
  ];
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Global Links</h1>
    <p class="text-muted mb-0">Official websites and affiliations connected to SIET’s global network.</p>
  </div>
</section>
<br>
<section class="section-pad">
  <div class="container">

    <!--  TABS  -->
    <div class="gl-tabs-wrap">
      <ul class="nav gl-tabs" id="linksTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="gl-tab active" id="soc-tab" data-bs-toggle="tab" data-bs-target="#soc" type="button" role="tab">
            Societies
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="gl-tab" id="ins-tab" data-bs-toggle="tab" data-bs-target="#ins" type="button" role="tab">
            Institutes
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="gl-tab" id="jrn-tab" data-bs-toggle="tab" data-bs-target="#jrn" type="button" role="tab">
            Journals And Publishers
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="gl-tab" id="oth-tab" data-bs-toggle="tab" data-bs-target="#oth" type="button" role="tab">
            Others
          </button>
        </li>
      </ul>
    </div>

    <!--  CONTENT  -->
    <div class="tab-content gl-content">

      <!-- Societies -->
      <div class="tab-pane fade show active" id="soc" role="tabpanel" aria-labelledby="soc-tab">
        <ul class="gl-list">
          <?php foreach($links["soc"] as $item): ?>
            <li>
              <a href="<?php echo htmlspecialchars($item["url"]); ?>" target="_blank" rel="noopener">
                <?php echo htmlspecialchars($item["name"]); ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Institutes -->
      <div class="tab-pane fade" id="ins" role="tabpanel" aria-labelledby="ins-tab">
        <ul class="gl-list">
          <?php foreach($links["ins"] as $item): ?>
            <li>
              <a href="<?php echo htmlspecialchars($item["url"]); ?>" target="_blank" rel="noopener">
                <?php echo htmlspecialchars($item["name"]); ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Journals And Publishers  -->
      <div class="tab-pane fade" id="jrn" role="tabpanel" aria-labelledby="jrn-tab">
        <div class="gl-empty">
          <div class="gl-empty-title">No links added yet</div>
          <div class="text-muted">Add journal & publisher links in your PHP array when ready.</div>
        </div>
      </div>

      <!-- Others -->
      <div class="tab-pane fade" id="oth" role="tabpanel" aria-labelledby="oth-tab">
        <ul class="gl-list">
          <?php foreach($links["oth"] as $item): ?>
            <li>
              <a href="<?php echo htmlspecialchars($item["url"]); ?>" target="_blank" rel="noopener">
                <?php echo htmlspecialchars($item["name"]); ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

    </div>

  </div>
</section>
<br>
<style>
/* ==========================
   Global Links - Match image
   ========================== */

.gl-tabs-wrap{
  border: 1px solid rgba(0,0,0,.10);
  border-radius: 4px;
  background: #f2f2f2;
  overflow: hidden;
}

.gl-tabs{
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  margin: 0;
  padding: 0;
}

.gl-tab{
  width: 100%;
  border: 0;
  background: #eeeeee;
  color: #555;
  font-weight: 700;
  padding: 10px 12px;
  font-size: .92rem;
  border-right: 1px solid rgba(0,0,0,.10);
}

.gl-tabs .nav-item:last-child .gl-tab{
  border-right: 0;
}

/* Active orange tab like image */
.gl-tab.active{
  background: #f59e0b; /* orange */
  color: #fff;
}

/* Content area spacing */
.gl-content{
  padding: 12px 0 0;
}

/*  Bullet list style like image */
.gl-list{
  list-style: none;
  margin: 0;
  padding: 8px 0 0 0;
}

.gl-list li{
  position: relative;
  padding-left: 18px;
  margin: 6px 0;
}

.gl-list li::before{
  content: "";
  position: absolute;
  left: 0;
  top: 9px;
  width: 6px;
  height: 6px;
  background: #f59e0b; /* orange bullet */
  border-radius: 2px;
}

.gl-list a{
  color: #1f2937;
  text-decoration: underline;
  text-underline-offset: 2px;
}

.gl-list a:hover{
  color: #0d6efd;
}

/* Empty message style */
.gl-empty{
  border: 1px dashed rgba(0,0,0,.18);
  border-radius: 8px;
  padding: 18px;
  background: #fff;
}
.gl-empty-title{
  font-weight: 900;
  margin-bottom: 6px;
}

/* Responsive: keep tabs readable on small screens */
@media (max-width: 575.98px){
  .gl-tabs{
    grid-template-columns: repeat(2, 1fr);
  }
  .gl-tab{
    border-bottom: 1px solid rgba(0,0,0,.10);
  }
}
</style>

<?php include 'footer.php'; ?>