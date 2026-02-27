<?php

require_once __DIR__ . '/data-config.php';

function partners_json_path(): string {
  return data_path('partners-data.json');
}

function load_partners(): array {
  $path = partners_json_path();
  if (!file_exists($path)) return [];

  $raw = file_get_contents($path);
  $data = json_decode($raw, true);

  if (!is_array($data)) return [];

  // Normalize: ensure each partner has expected keys (optional safety)
  foreach ($data as &$p) {
    if (!isset($p['id'])) $p['id'] = '';
    if (!isset($p['name'])) $p['name'] = '';
    if (!isset($p['logo'])) $p['logo'] = '';
    if (!isset($p['about'])) $p['about'] = '';
    if (!isset($p['website'])) $p['website'] = '';

    // Gallery field (array of image paths)
    if (!isset($p['gallery']) || !is_array($p['gallery'])) {
      $p['gallery'] = [];
    }
  }
  unset($p);

  return $data;
}

function save_partners(array $partners): bool {
  // Keep clean array indexes
  $partners = array_values($partners);

  $path = partners_json_path();
  $json = json_encode($partners, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

  return file_put_contents($path, $json) !== false;
}