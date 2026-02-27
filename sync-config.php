<?php
// sync-config.php (LIVE SERVER)
// Change token and allowed directories/files here.

define('SYNC_TOKEN', '0ec77b41fa44032ecd33ed761169352ff183574efc030f6dd3b5aacdaf8a6e21');

// Only allow syncing these directories (relative to site root)
$SYNC_ALLOW_DIRS = [
  'assets',
  'css',
  'js',
  'images',
  'downloadables',
  'downloads',
  'editdata',       // if you have editable json files here
  'storage',        // if your json files are here
];

// Only allow these file extensions
$SYNC_ALLOW_EXT = [
  'php','css','js','json','png','jpg','jpeg','webp','svg','pdf','doc','docx'
];

// Block these directories even if inside allowed dirs
$SYNC_BLOCK_DIRS = [
  '.git', '.github', 'vendor', 'node_modules'
];

// Block these exact files
$SYNC_BLOCK_FILES = [
  'sync-config.php',
];