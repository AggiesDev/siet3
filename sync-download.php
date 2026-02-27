<?php
// sync-download.php (LIVE SERVER)

require_once __DIR__ . '/sync-config.php';

$token = $_GET['token'] ?? '';
if (!hash_equals(SYNC_TOKEN, $token)) {
  http_response_code(403);
  echo "Forbidden";
  exit;
}

$path = $_GET['path'] ?? '';
$path = ltrim(str_replace('\\','/',$path), '/');

if ($path === '' || str_contains($path, '..')) {
  http_response_code(400);
  echo "Bad request";
  exit;
}

// reuse same allow rules from manifest
function is_blocked_path(string $rel, array $blockDirs, array $blockFiles): bool {
  $rel = ltrim(str_replace('\\','/',$rel), '/');
  foreach ($blockFiles as $bf) if ($rel === $bf) return true;
  foreach ($blockDirs as $bd) {
    $bd = trim($bd, '/');
    if ($bd === '') continue;
    if ($rel === $bd || str_starts_with($rel, $bd . '/')) return true;
  }
  return false;
}
function ext_allowed(string $file, array $allowExt): bool {
  $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
  return in_array($ext, $allowExt, true);
}
function dir_allowed(string $rel, array $allowDirs): bool {
  $rel = ltrim(str_replace('\\','/',$rel), '/');
  foreach ($allowDirs as $d) {
    $d = trim($d, '/');
    if ($d === '') continue;
    if ($rel === $d || str_starts_with($rel, $d . '/')) return true;
  }
  if (preg_match('/^[^\/]+\.php$/i', $rel)) return true;
  return false;
}

if (is_blocked_path($path, $SYNC_BLOCK_DIRS, $SYNC_BLOCK_FILES)) {
  http_response_code(403);
  echo "Blocked";
  exit;
}
if (!dir_allowed($path, $SYNC_ALLOW_DIRS) || !ext_allowed($path, $SYNC_ALLOW_EXT)) {
  http_response_code(403);
  echo "Not allowed";
  exit;
}

$full = __DIR__ . '/' . $path;
if (!is_file($full)) {
  http_response_code(404);
  echo "Not found";
  exit;
}

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($path) . '"');
header('Content-Length: ' . filesize($full));
readfile($full);
exit;