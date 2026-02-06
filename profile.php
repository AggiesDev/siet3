<?php
  $active = "profile";
  $page_css = ["sections.css"];
  include "header.php";

  function h($v){ return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

  $name = $_GET['name'] ?? 'SIET Profile';
  $role = $_GET['role'] ?? 'Member';
  $org  = $_GET['org']  ?? 'Singapore Institute of Engineering Technologists';
  $img  = $_GET['img']  ?? 'images/1.jpg';
  $bio  = $_GET['bio']  ?? 'Profile details will be shown here based on the button you clicked.';
?>
<main>
<section class="page-hero">
  <div class="container py-5">
    <div class="d-flex flex-column flex-lg-row gap-4 align-items-lg-center">
      <div class="profile-avatar-wrap">
        <img src="<?php echo h($img); ?>" alt="<?php echo h($name); ?>" class="profile-avatar">
      </div>
      <div>
        <div class="badge bg-primary-subtle text-primary mb-2"><?php echo h($role); ?></div>
        <h1 class="mb-1"><?php echo h($name); ?></h1>
        <p class="text-muted mb-0"><?php echo h($org); ?></p>
      </div>
    </div>

    <div class="card shadow-sm border-0 mt-4">
      <div class="card-body p-4">
        <h2 class="h5 mb-3">About</h2>
        <p class="mb-0"><?php echo nl2br(h($bio)); ?></p>
      </div>
    </div>

    <div class="mt-4">
      <a href="javascript:history.back()" class="btn btn-outline-secondary">Back</a>
    </div>
  </div>
</section>

<style>
.profile-avatar-wrap{width:110px;height:110px;border-radius:18px;overflow:hidden;box-shadow:0 12px 30px rgba(15,23,42,.15);}
.profile-avatar{width:100%;height:100%;object-fit:cover;}
</style>


</main>
<?php include "footer.php"; ?>
