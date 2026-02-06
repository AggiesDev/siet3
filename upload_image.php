<?php
require_once 'auth.php';
require_login();

header('Content-Type: application/json; charset=utf-8');

$page = preg_replace('/[^a-zA-Z0-9_-]/', '', $_POST['page'] ?? '');
$index = intval($_POST['index'] ?? -1);

if ($page === '' || $index < 0) {
  http_response_code(400);
  echo json_encode(['ok' => false, 'error' => 'Missing page or index']);
  exit;
}

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
  http_response_code(400);
  echo json_encode(['ok' => false, 'error' => 'Upload failed']);
  exit;
}

$ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
$allowed = ['jpg','jpeg','png','webp','gif'];
if (!in_array($ext, $allowed, true)) {
  http_response_code(400);
  echo json_encode(['ok' => false, 'error' => 'Invalid file type']);
  exit;
}

$assetsDir = __DIR__ . '/editdata/assets';
if (!is_dir($assetsDir)) { mkdir($assetsDir, 0755, true); }

/* Replacement system:
   Each image slot uses a stable filename and is overwritten on upload.
*/
$filename = $page . '_img_' . $index . '.' . $ext;
$target = $assetsDir . '/' . $filename;

if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  http_response_code(500);
  echo json_encode(['ok' => false, 'error' => 'Could not save file']);
  exit;
}

$publicPath = 'editdata/assets/' . $filename;

// Update page json
$jsonFile = __DIR__ . '/editdata/' . $page . '.json';
$data = [];
if (file_exists($jsonFile)) {
  $raw = file_get_contents($jsonFile);
  $data = json_decode($raw, true);
}
if (!is_array($data)) { $data = []; }
if (!isset($data['img']) || !is_array($data['img'])) { $data['img'] = []; }
$data['img'][$index] = $publicPath;

file_put_contents($jsonFile, json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

echo json_encode(['ok' => true, 'path' => $publicPath]);
?>