<?php
require_once 'auth.php';
$_SESSION = [];
session_destroy();
setcookie('siet_remember', '', time() - 3600, '/');
header('Location: index.php');
exit;
?>