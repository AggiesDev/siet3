<?php
// events-data.php (NO DB)
// Stores events in a JSON file

function events_data_file(): string {
  return __DIR__ . '/events-data.json';
}

function load_events_data(): array {
  $file = events_data_file();
  if (!file_exists($file)) {
    return [
      "gallery" => [],
      "categories" => ["Upcoming Events","Special Events","Past Events"],
      "events" => []
    ];
  }
  $raw = file_get_contents($file);
  $data = json_decode($raw, true);
  if (!is_array($data)) $data = [];

  if (!isset($data["gallery"]) || !is_array($data["gallery"])) $data["gallery"] = [];
  if (!isset($data["categories"]) || !is_array($data["categories"])) {
    $data["categories"] = ["Upcoming Events","Special Events","Past Events"];
  }
  if (!isset($data["events"]) || !is_array($data["events"])) $data["events"] = [];
  return $data;
}

function save_events_data(array $data): bool {
  $file = events_data_file();
  $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  return file_put_contents($file, $json) !== false;
}

function clean_event_id(string $s): string {
  $s = trim(strtolower($s));
  $s = preg_replace("/[^a-z0-9\-]+/", "-", $s);
  $s = preg_replace("/\-+/", "-", $s);
  return trim($s, "-");
}

function find_event_by_id(array $events, string $id): ?array {
  foreach ($events as $e) {
    if (($e['id'] ?? '') === $id) return $e;
  }
  return null;
}

function ensure_category(array &$data, string $cat): void {
  $cat = trim($cat);
  if ($cat === '') return;
  if (!isset($data['categories']) || !is_array($data['categories'])) {
    $data['categories'] = ["Upcoming Events","Special Events","Past Events"];
  }
  $exists = false;
  foreach ($data['categories'] as $c) {
    if (mb_strtolower(trim($c)) === mb_strtolower($cat)) { $exists = true; break; }
  }
  if (!$exists) $data['categories'][] = $cat;
}