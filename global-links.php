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
        "name" => "World Federation of Technology Organizations ",
        "url"  => "https://wfto.com/",
        "img"  => "images/Affiliated Organisations Logo/SIET Affiliations Logo/logoWFTO.jpg",
        "tag"  => "Society"
      ],
      [
        "name" => "Global Technological Alliance ",
        "url"  => "https://mbot.org.my/",
        "img"  => "images/global/gta.png",
        "tag"  => "Alliance"
      ],
    ],
    "ins" => [
      [
        "name" => "Engineering Council ",
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
        "name" => "Singapore Professional Centre ",
        "url"  => "https://singaporeprofessionalcentre.com/",
        "img"  => "images/global/spc.png",
        "tag"  => "Partner"
      ],
      [
        "name" => "Malaysia Board of Technologists ",
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

<section class="section-pad">
  <div class="container">

    <ul class="nav nav-pills mb-3 global-tabs" id="linksTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="soc-tab" data-bs-toggle="pill" data-bs-target="#soc" type="button" role="tab">
          Societies
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="ins-tab" data-bs-toggle="pill" data-bs-target="#ins" type="button" role="tab">
          Institutes
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="oth-tab" data-bs-toggle="pill" data-bs-target="#oth" type="button" role="tab">
          Others
        </button>
      </li>
    </ul>

    <div class="tab-content">

      <!-- Societies -->
      <div class="tab-pane fade show active" id="soc" role="tabpanel" aria-labelledby="soc-tab">
        <div class="row g-3">
          <?php foreach($links["soc"] as $item): ?>
            <div class="col-md-6 col-lg-4">
              <a class="global-link-card" href="<?php echo htmlspecialchars($item["url"]); ?>" target="_blank" rel="noopener">
                <div class="glc-logo">
                  <img src="<?php echo htmlspecialchars($item["img"]); ?>" alt="<?php echo htmlspecialchars($item["name"]); ?>"
                       onerror="this.src='images/global/placeholder.png';" />
                </div>
                <div class="glc-body">
                  <div class="glc-title"><?php echo htmlspecialchars($item["name"]); ?></div>
                  <div class="glc-url"><?php echo htmlspecialchars($item["url"]); ?></div>
                </div>
                <span class="glc-tag"><?php echo htmlspecialchars($item["tag"]); ?></span>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Institutes -->
      <div class="tab-pane fade" id="ins" role="tabpanel" aria-labelledby="ins-tab">
        <div class="row g-3">
          <?php foreach($links["ins"] as $item): ?>
            <div class="col-md-6 col-lg-4">
              <a class="global-link-card" href="<?php echo htmlspecialchars($item["url"]); ?>" target="_blank" rel="noopener">
                <div class="glc-logo">
                  <img src="<?php echo htmlspecialchars($item["img"]); ?>" alt="<?php echo htmlspecialchars($item["name"]); ?>"
                       onerror="this.src='images/global/placeholder.png';" />
                </div>
                <div class="glc-body">
                  <div class="glc-title"><?php echo htmlspecialchars($item["name"]); ?></div>
                  <div class="glc-url"><?php echo htmlspecialchars($item["url"]); ?></div>
                </div>
                <span class="glc-tag"><?php echo htmlspecialchars($item["tag"]); ?></span>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Others -->
      <div class="tab-pane fade" id="oth" role="tabpanel" aria-labelledby="oth-tab">
        <div class="row g-3">
          <?php foreach($links["oth"] as $item): ?>
            <div class="col-md-6 col-lg-4">
              <a class="global-link-card" href="<?php echo htmlspecialchars($item["url"]); ?>" target="_blank" rel="noopener">
                <div class="glc-logo">
                  <img src="<?php echo htmlspecialchars($item["img"]); ?>" alt="<?php echo htmlspecialchars($item["name"]); ?>"
                       onerror="this.src='images/global/placeholder.png';" />
                </div>
                <div class="glc-body">
                  <div class="glc-title"><?php echo htmlspecialchars($item["name"]); ?></div>
                  <div class="glc-url"><?php echo htmlspecialchars($item["url"]); ?></div>
                </div>
                <span class="glc-tag"><?php echo htmlspecialchars($item["tag"]); ?></span>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </div>
</section>

<style>
  /* ===== Global Links Cards ===== */

  .global-tabs .nav-link{
    border-radius: 999px;
    padding: .55rem 1rem;
    font-weight: 700;
  }

  .global-link-card{
    display: flex;
    gap: 14px;
    align-items: center;
    position: relative;
    padding: 14px 14px;
    border: 1px solid rgba(0,0,0,.10);
    border-radius: 14px;
    background: #fff;
    text-decoration: none;
    transition: transform .15s ease, box-shadow .15s ease, border-color .15s ease;
    min-height: 92px;
  }
  .global-link-card:hover{
    transform: translateY(-2px);
    box-shadow: 0 14px 30px rgba(0,0,0,.10);
    border-color: rgba(13,110,253,.35);
  }

  .glc-logo{
    width: 62px;
    height: 62px;
    border-radius: 14px;
    border: 1px solid rgba(0,0,0,.10);
    background: #f8fafc;
    display: grid;
    place-items: center;
    flex: 0 0 auto;
    overflow: hidden;
  }
  .glc-logo img{
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 8px;
    display: block;
  }

  .glc-body{
    min-width: 0;
  }
  .glc-title{
    font-weight: 800;
    color: #111827;
    line-height: 1.2;
    margin-bottom: 4px;
    font-size: 1rem;
  }
  .glc-url{
    color: #2563eb;
    font-size: .85rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 100%;
  }

  .glc-tag{
    position: absolute;
    top: 10px;
    right: 12px;
    font-size: .75rem;
    font-weight: 800;
    padding: 4px 10px;
    border-radius: 999px;
    background: rgba(13,110,253,.10);
    border: 1px solid rgba(13,110,253,.18);
    color: #0b5ed7;
  }

  @media (max-width: 575.98px){
    .global-link-card{
      padding: 12px;
      min-height: 86px;
    }
    .glc-logo{
      width: 56px;
      height: 56px;
      border-radius: 12px;
    }
  }
</style>

<?php include 'footer.php'; ?>
