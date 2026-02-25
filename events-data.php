<?php

function events_data_file(): string {
  return __DIR__ . '/events-data.json';
}

function load_events_data(): array {
  $file = events_data_file();

  if (!file_exists($file)) {
    return [
      "gallery" => [],
      "categories" => ["Upcoming Events","Special Events","Past Events"],
      "subcategories_map" => [], //  category => [sub1, sub2...]
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

  //  NEW: map of subcategories by category
  if (!isset($data["subcategories_map"]) || !is_array($data["subcategories_map"])) {
    $data["subcategories_map"] = [];
  }

  if (!isset($data["events"]) || !is_array($data["events"])) $data["events"] = [];

  // Ensure each category has an array key in subcategories_map
  foreach ($data["categories"] as $c) {
    $c = trim((string)$c);
    if ($c === '') continue;
    if (!isset($data["subcategories_map"][$c]) || !is_array($data["subcategories_map"][$c])) {
      $data["subcategories_map"][$c] = [];
    }
  }

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
  if (!isset($data["subcategories_map"]) || !is_array($data["subcategories_map"])) {
    $data["subcategories_map"] = [];
  }

  $exists = false;
  foreach ($data['categories'] as $c) {
    if (mb_strtolower(trim($c)) === mb_strtolower($cat)) { $exists = true; break; }
  }
  if (!$exists) $data['categories'][] = $cat;

  // make sure map entry exists
  if (!isset($data["subcategories_map"][$cat]) || !is_array($data["subcategories_map"][$cat])) {
    $data["subcategories_map"][$cat] = [];
  }
}

//  NEW: subcategory depends on category
function ensure_subcategory(array &$data, string $category, string $sub): void {
  $category = trim($category);
  $sub = trim($sub);
  if ($category === '' || $sub === '') return;

  if (!isset($data["subcategories_map"]) || !is_array($data["subcategories_map"])) {
    $data["subcategories_map"] = [];
  }
  if (!isset($data["subcategories_map"][$category]) || !is_array($data["subcategories_map"][$category])) {
    $data["subcategories_map"][$category] = [];
  }

  $exists = false;
  foreach ($data["subcategories_map"][$category] as $s) {
    if (mb_strtolower(trim($s)) === mb_strtolower($sub)) { $exists = true; break; }
  }
  if (!$exists) $data["subcategories_map"][$category][] = $sub;
}