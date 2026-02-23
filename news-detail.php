<?php
  $active = 'news';
  $page_css = ['sections.css'];
  include 'header.php';

  include 'news-data.php';

  $data = load_news_data();
  $items = $data['news'] ?? [];

  $id = $_GET['id'] ?? '';
  $news = null;

  foreach ($items as $n){
    if (($n['id'] ?? '') === $id) { $news = $n; break; }
  }
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2"><?php echo $news ? htmlspecialchars($news['title'] ?? '') : 'News Detail'; ?></h1>

    <?php if ($news): ?>
      <div class="meta-row">
        <?php if (!empty($news['date'])): ?>
          <span class="pill">🗓 <?php echo htmlspecialchars($news['date']); ?></span>
        <?php endif; ?>
        <?php if (!empty($news['location'])): ?>
          <span class="pill">📍 <?php echo htmlspecialchars($news['location']); ?></span>
        <?php endif; ?>
        <?php if (!empty($news['category'])): ?>
          <span class="pill"><?php echo htmlspecialchars($news['category']); ?></span>
        <?php endif; ?>
      </div>
    <?php else: ?>
      <p class="text-muted mb-0">News not found. Please return to News.</p>
    <?php endif; ?>
  </div>
</section>

<section class="section-pad">
  <div class="container">
    <?php if ($news): ?>

      <img src="<?php echo htmlspecialchars($news['banner'] ?? ($news['image'] ?? 'images/1.jpg')); ?>"
           alt="<?php echo htmlspecialchars($news['title'] ?? ''); ?>"
           class="w-100 rounded-4 img-hover"
           style="max-height:360px; object-fit:cover;" />

      <div class="row g-4 mt-1">

        <!-- LEFT: content -->
        <div class="col-lg-8">
          <div class="lead-card">
            <h4 class="mb-2">Details</h4>
            <?php foreach (($news['desc'] ?? []) as $p): ?>
              <p class="text-muted mb-2"><?php echo htmlspecialchars($p); ?></p>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- RIGHT: one column blocks -->
        <div class="col-lg-4">

          <div class="lead-card">
            <h5 class="mb-2">Back</h5>
            <a class="btn btn-outline-primary w-100 rounded-pill" href="news.php">← Back to News</a>
          </div>

          <?php $embed = trim($news['youtube_embed'] ?? ''); ?>
          <?php if ($embed !== ''): ?>
            <div class="lead-card mt-4">
              <h5 class="mb-3">Video</h5>
              <div class="nd-media-box">
                <iframe
                  src="<?php echo htmlspecialchars($embed); ?>"
                  title="YouTube video"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  allowfullscreen>
                </iframe>
              </div>
            </div>
          <?php endif; ?>

          <?php
            $gallery_on = !empty($news['gallery_on']);
            $imgs = $news['gallery'] ?? [];
            $imgs = is_array($imgs) ? array_values(array_filter($imgs, fn($x)=>is_string($x) && trim($x)!=='')) : [];
          ?>
          <?php if ($gallery_on && !empty($imgs)): ?>
            <div class="lead-card mt-4">
              <h5 class="mb-3">Gallery</h5>

              <div class="nd-gallery">
                <?php foreach ($imgs as $i => $img): ?>
                  <button
                    type="button"
                    class="nd-gallery-item"
                    data-bs-toggle="modal"
                    data-bs-target="#galleryLightbox"
                    data-img="<?php echo htmlspecialchars($img); ?>"
                    data-cap="News photo <?php echo ($i+1); ?>"
                  >
                    <img src="<?php echo htmlspecialchars($img); ?>" alt="News photo <?php echo ($i+1); ?>" />
                  </button>
                <?php endforeach; ?>
              </div>

              <?php if (count($imgs) > 6): ?>
                <div class="text-muted small mt-2">Scroll to view more images.</div>
              <?php endif; ?>
            </div>
          <?php endif; ?>

          <?php
            $downloads_on = !empty($news['downloads_on']);
            $files = $news['downloads'] ?? [];
            $files = is_array($files) ? array_values(array_filter($files, fn($x)=>is_string($x) && trim($x)!=='')) : [];
            $btnName = trim($news['download_button_name'] ?? '');
          ?>
          <?php if ($downloads_on && !empty($files)): ?>
            <div class="lead-card mt-4">
              <h5 class="mb-2">Downloads</h5>
              <p class="text-muted mb-3">Download related documents.</p>

              <div class="d-grid gap-2">
                <?php foreach ($files as $file): ?>
                  <?php $label = $btnName !== '' ? $btnName : ("Download " . basename($file)); ?>
                  <a class="btn btn-primary rounded-pill" href="<?php echo htmlspecialchars($file); ?>" download>
                    <?php echo htmlspecialchars($label); ?>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

        </div>

      </div>

      <style>
        .nd-media-box{
          position: relative;
          padding-top: 56.25%;
          border-radius: 16px;
          overflow: hidden;
          border: 1px solid rgba(0,0,0,.08);
          background: #000;
        }
        .nd-media-box iframe{
          position: absolute;
          inset: 0;
          width: 100%;
          height: 100%;
          border: 0;
        }

        .nd-gallery{
          display: grid;
          grid-template-columns: repeat(3, minmax(0, 1fr));
          gap: 10px;
          max-height: 260px;
          overflow-y: auto;
          padding-right: 4px;
        }
        .nd-gallery-item{
          padding: 0;
          border: 0;
          background: transparent;
          border-radius: 12px;
          overflow: hidden;
          cursor: pointer;
          box-shadow: 0 10px 18px rgba(0,0,0,.06);
          border: 1px solid rgba(0,0,0,.08);
          transition: transform .15s ease, box-shadow .15s ease;
        }
        .nd-gallery-item:hover{
          transform: translateY(-2px);
          box-shadow: 0 16px 30px rgba(0,0,0,.12);
        }
        .nd-gallery-item img{
          width: 100%;
          height: 78px;
          object-fit: cover;
          display: block;
        }
        .nd-gallery::-webkit-scrollbar{ width: 10px; }
        .nd-gallery::-webkit-scrollbar-track{ background: rgba(0,0,0,.06); border-radius: 999px; }
        .nd-gallery::-webkit-scrollbar-thumb{ background: rgba(13,110,253,.28); border-radius: 999px; }
        .nd-gallery::-webkit-scrollbar-thumb:hover{ background: rgba(13,110,253,.40); }

        @media (max-width: 575.98px){
          .nd-gallery{ max-height: 240px; }
          .nd-gallery-item img{ height: 72px; }
        }
      </style>

      <script>
        document.addEventListener("DOMContentLoaded", function () {
          const modal = document.getElementById("galleryLightbox");
          if (!modal) return;

          modal.addEventListener("show.bs.modal", function (event) {
            const btn = event.relatedTarget;
            if (!btn) return;

            const img = btn.getAttribute("data-img") || "";
            const cap = btn.getAttribute("data-cap") || "";

            const imgEl = document.getElementById("galleryLightboxImg");
            const capEl = document.getElementById("galleryLightboxCap");
            if (imgEl) imgEl.src = img;
            if (capEl) capEl.textContent = cap;
          });
        });
      </script>

    <?php else: ?>
      <div class="lead-card">
        <p class="mb-0">Please return to <a href="news.php">News</a>.</p>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php include 'footer.php'; ?>