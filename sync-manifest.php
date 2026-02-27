<?php
// sync-manifest.php (LIVE SERVER)

require_once __DIR__ . '/sync-config.php';

$token = $_GET['token'] ?? '';
if (!hash_equals(SYNC_TOKEN, $token)) {
  http_response_code(403);
  echo "Forbidden";
  exit;
}

function is_blocked_path(string $rel, array $blockDirs, array $blockFiles): bool {
  $rel = ltrim(str_replace('\\','/',$rel), '/');

  foreach ($blockFiles as $bf) {
    if ($rel === $bf) return true;
  }

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
  // allow root php files (like index.php) also:
  if (preg_match('/^[^\/]+\.php$/i', $rel)) return true;

  return false;
}

$root = __DIR__;
$files = [];

$it = new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS)
);

foreach ($it as $f) {
  /** @var SplFileInfo $f */
  if (!$f->isFile()) continue;

  $full = $f->getPathname();
  $rel = ltrim(str_replace('\\','/', substr($full, strlen($root))), '/');

  if (is_blocked_path($rel, $SYNC_BLOCK_DIRS, $SYNC_BLOCK_FILES)) continue;
  if (!dir_allowed($rel, $SYNC_ALLOW_DIRS)) continue;
  if (!ext_allowed($rel, $SYNC_ALLOW_EXT)) continue;

  $files[] = [
    'path' => $rel,
    'size' => $f->getSize(),
    'mtime' => $f->getMTime(),
    'sha1' => sha1_file($full),
  ];
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode([
  'generated_at' => time(),
  'count' => count($files),
  'files' => $files
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);