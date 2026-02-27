<?php
// sync-from-live.php (LOCAL)
// Run: php sync-from-live.php
// It downloads allowed files from live server and overwrites local copies.
//
// IMPORTANT: InfinityFree may return an AES/anti-bot HTML page unless we send browser-like headers.
// This version includes headers to avoid that.

$LIVE_BASE = 'https://aggiesdev.infinityfreeapp.com'; // ✅ your live site base
$TOKEN = '0ec77b41fa44032ecd33ed761169352ff183574efc030f6dd3b5aacdaf8a6e21'; // ✅ must match live sync-config.php token

$manifestUrl = rtrim($LIVE_BASE, '/') . '/sync-manifest.php?token=' . urlencode($TOKEN);

function fetch_url(string $url): string|false {
  $ctx = stream_context_create([
    'http' => [
      'timeout' => 30,
      'header' =>
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0 Safari/537.36\r\n" .
        "Accept: application/json,text/plain,*/*\r\n" .
        "Accept-Language: en-US,en;q=0.9\r\n" .
        "Connection: close\r\n"
    ]
  ]);
  return @file_get_contents($url, false, $ctx);
}

// ===== Fetch manifest =====
$manifestRaw = fetch_url($manifestUrl);
if ($manifestRaw === false) {
  echo "[ERROR] Cannot fetch manifest.\nURL: $manifestUrl\n";
  exit(1);
}

// Debug: show first 200 chars if not JSON
$manifest = json_decode($manifestRaw, true);
if (!is_array($manifest) || !isset($manifest['files'])) {
  echo "[ERROR] Invalid manifest JSON.\n";
  echo "URL: $manifestUrl\n";
  echo "First 200 chars from server:\n";
  echo substr($manifestRaw, 0, 200) . "\n\n";
  echo "JSON error: " . json_last_error_msg() . "\n";
  exit(1);
}

$files = $manifest['files'];
echo "Manifest OK. Total files: " . count($files) . "\n";

$updated = 0;
$skipped = 0;

foreach ($files as $f) {
  $rel = $f['path'] ?? '';
  $sha = $f['sha1'] ?? '';

  if ($rel === '' || $sha === '') { $skipped++; continue; }

  $localPath = __DIR__ . '/' . $rel;
  $localDir = dirname($localPath);
  if (!is_dir($localDir)) mkdir($localDir, 0775, true);

  $need = true;
  if (is_file($localPath)) {
    $localSha = sha1_file($localPath);
    if ($localSha === $sha) $need = false;
  }

  if (!$need) {
    $skipped++;
    continue;
  }

  $downloadUrl = rtrim($LIVE_BASE, '/') . '/sync-download.php?token=' . urlencode($TOKEN) . '&path=' . urlencode($rel);
  $content = fetch_url($downloadUrl);

  if ($content === false) {
    echo "[FAILED] $rel (cannot download)\n";
    continue;
  }

  // If server returns HTML again, warn
  if (str_starts_with(ltrim($content), '<html') || str_contains($content, '/aes.js')) {
    echo "[FAILED] $rel (server returned HTML protection page)\n";
    continue;
  }

  file_put_contents($localPath, $content);
  $updated++;
  echo "[OK] Updated: $rel\n";
}

echo "\nDone. Updated=$updated, Skipped=$skipped\n";