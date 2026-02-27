<?php
$LIVE_BASE = 'https://aggiesdev.infinityfreeapp.com';
$TOKEN = '0ec77b41fa44032ecd33ed761169352ff183574efc030f6dd3b5aacdaf8a6e21';

$manifestUrl = rtrim($LIVE_BASE, '/') . '/sync-manifest.php?token=' . urlencode($TOKEN);

$ctx = stream_context_create(['http' => ['timeout' => 25]]);
$manifestRaw = @file_get_contents($manifestUrl, false, $ctx);

if ($manifestRaw === false) {
  echo "[ERROR] Cannot fetch manifest.\nURL: $manifestUrl\n";
  exit(1);
}

// 👇 DEBUG: show first 300 chars returned from server
echo "Manifest URL: $manifestUrl\n";
echo "Server response (first 300 chars):\n";
echo substr($manifestRaw, 0, 300) . "\n\n";

$manifest = json_decode($manifestRaw, true);
if (!is_array($manifest) || !isset($manifest['files'])) {
  echo "[ERROR] Invalid manifest JSON.\n";
  echo "JSON error: " . json_last_error_msg() . "\n";
  exit(1);
}