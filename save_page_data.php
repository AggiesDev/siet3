<?php
require_once 'auth.php';
require_login();

header('Content-Type: application/json; charset=utf-8');

$page = preg_replace('/[^a-zA-Z0-9_-]/', '', $_POST['page'] ?? '');
$data_json = $_POST['data'] ?? '';

if ($page === '' || $data_json === '') {
  http_response_code(400);
  echo json_encode(['ok' => false, 'error' => 'Missing page or data']);
  exit;
}

$data = json_decode($data_json, true);
if ($data === null) {
  http_response_code(400);
  echo json_encode(['ok' => false, 'error' => 'Invalid JSON']);
  exit;
}

$dir = __DIR__ . '/editdata';
if (!is_dir($dir)) { mkdir($dir, 0755, true); }

$file = $dir . '/' . $page . '.json';

$pretty = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
file_put_contents($file, $pretty);

echo json_encode(['ok' => true]);
?>