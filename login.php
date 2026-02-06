<?php
require_once 'auth.php';

$err = '';
// $next = $_GET['next'] ?? 'home1.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';
  $next = $_GET['next'] ?? 'index.php';

  if ($email === 'editdata@gmail.com' && $password === 'asd@123') {
    $_SESSION['siet_admin'] = true;

    if (!empty($_POST['remember'])) {
      $token = hash('sha256', 'editdata@gmail.com' . '|asd@123|SIET_REMEMBER_V1');
      setcookie('siet_remember', $token, [
        'expires'  => time() + (30 * 24 * 60 * 60),
        'path'     => '/',
        'secure'   => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
        'httponly' => true,
        'samesite' => 'Lax'
      ]);
    }

    header('Location: ' . $next);
    exit;
  } else {
    $err = 'Invalid email or password.';
  }
}


$page_css = ['sections.css'];
include 'header.php';
?>
<section class="page-hero">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm border-0">
          <div class="card-body p-4">
            <h1 class="h4 mb-3">Admin Login</h1>
            <?php if ($err): ?>
              <div class="alert alert-danger mb-3"><?php echo htmlspecialchars($err); ?></div>
            <?php endif; ?>
            <form method="post" autocomplete="off">
              <input type="hidden" name="next" value="<?php echo htmlspecialchars($next); ?>">
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control" name="email" type="text" placeholder="editdata@gmail.com" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input class="form-control" name="password" type="password" placeholder="asd@123" required>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" value="1">
                <label class="form-check-label" for="remember">Remember me</label>
              </div>

              <button class="btn btn-primary w-100" type="submit">Login</button>
            </form>
            <!-- <p class="text-muted small mt-3 mb-0">
              This login is file-based (no database).
            </p> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'footer.php'; ?>