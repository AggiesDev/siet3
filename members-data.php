<?php
// members-data.php (no database)

function members_json_path(): string {
  return __DIR__ . "/members-data.json";
}

function load_members(): array {
  $path = members_json_path();
  if (!file_exists($path)) return [];
  $raw = file_get_contents($path);
  $data = json_decode($raw, true);
  return is_array($data) ? $data : [];
}

function save_members(array $members): bool {
  $path = members_json_path();
  $json = json_encode(array_values($members), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  return file_put_contents($path, $json) !== false;
}

function clean_member_id(string $s): string {
  $s = trim($s);
  $s = strtolower($s);
  $s = preg_replace("/[^a-z0-9\-]+/", "-", $s);
  $s = preg_replace("/\-+/", "-", $s);
  return trim($s, "-");
}

function h($s): string {
  return htmlspecialchars((string)($s ?? ''), ENT_QUOTES, 'UTF-8');
}