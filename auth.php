<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
// Auto-login via "remember me" cookie (no DB)
if (!isset($_SESSION['siet_admin']) && isset($_COOKIE['siet_remember'])) {
  $expected = hash('sha256', 'dafaultgmail.com' . '|asd@123|SIET_REMEMBER_V1');
  if (hash_equals($expected, $_COOKIE['siet_remember'])) {
    $_SESSION['siet_admin'] = true;
  }
}

function is_logged_in(): bool {
  return isset($_SESSION['siet_admin']) && $_SESSION['siet_admin'] === true;
}

function require_login(): void {
  if (!is_logged_in()) {
    header('Location: login.php?next=' . urlencode($_SERVER['REQUEST_URI']));
    exit;
  }
}
?>