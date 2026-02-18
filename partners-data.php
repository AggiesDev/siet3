<?php
// partners-data.php
// Read partners from JSON file (no DB)

function partners_json_path(): string {
  return __DIR__ . "/partners-data.json";
}

function load_partners(): array {
  $path = partners_json_path();
  if (!file_exists($path)) return [];

  $raw = file_get_contents($path);
  $data = json_decode($raw, true);

  return is_array($data) ? $data : [];
}

function save_partners(array $partners): bool {
  $path = partners_json_path();
  $json = json_encode($partners, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
  return file_put_contents($path, $json) !== false;
}

