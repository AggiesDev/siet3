<?php
// data-config.php
define('DATA_DIR', __DIR__ . '/storage'); 
// On hosting, change to your safe folder path outside deploy if possible.

if (!is_dir(DATA_DIR)) {
  @mkdir(DATA_DIR, 0775, true);
}

function data_path(string $filename): string {
  return rtrim(DATA_DIR, '/\\') . DIRECTORY_SEPARATOR . $filename;
}