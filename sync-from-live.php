<?php
// sync-from-live.php (LOCAL)
// Run: php sync-from-live.php
// It will download allowed files from live server and overwrite local copies.

$LIVE_BASE = 'https://aggiesdev.infinityfreeapp.com/'; //  change this
$TOKEN = '0ec77b41fa44032ecd33ed761169352ff183574efc030f6dd3b5aacdaf8a6e21'; //  same as sync-config.php

$manifestUrl = rtrim($LIVE_BASE, '/') . '/sync-manifest.php?token=' . urlencode($TOKEN);

function fetch_url(string $url): string|false {
  $ctx = stream_context_create(['http' => ['timeout' => 25]]);
  return @file_get_contents($url, false, $ctx);
}

$manifestRaw = fetch_url($manifestUrl);
if ($manifestRaw === false) {
  echo "[ERROR] Cannot fetch manifest.\n";
  exit(1);
}

$manifest = json_decode($manifestRaw, true);
if (!is_array($manifest) || !isset($manifest['files'])) {
  echo "[ERROR] Invalid manifest JSON.\n";
  exit(1);
}

$files = $manifest['files'];
echo "Manifest: " . count($files) . " file(s)\n";

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
    echo "[FAILED] $rel\n";
    continue;
  }

  file_put_contents($localPath, $content);
  $updated++;
  echo "[OK] Updated: $rel\n";
}

echo "\nDone. Updated=$updated, Skipped=$skipped\n";