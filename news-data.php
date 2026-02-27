<?php
require_once __DIR__ . '/data-config.php';

function news_data_file(): string {
  return data_path('news-data.json');
}

function load_news_data(): array {
  $file = news_data_file();
  if (!file_exists($file)) {
    return [
      "categories" => ["Latest News","Special News","Past News"],
      "news" => []
    ];
  }
  $raw = file_get_contents($file);
  $data = json_decode($raw, true);
  if (!is_array($data)) $data = [];

  if (!isset($data["categories"]) || !is_array($data["categories"])) {
    $data["categories"] = ["Latest News","Special News","Past News"];
  }
  if (!isset($data["news"]) || !is_array($data["news"])) $data["news"] = [];
  return $data;
}

function save_news_data(array $data): bool {
  $file = news_data_file();
  $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  return file_put_contents($file, $json) !== false;
}

function clean_news_id(string $s): string {
  $s = trim(strtolower($s));
  $s = preg_replace("/[^a-z0-9\-]+/", "-", $s);
  $s = preg_replace("/\-+/", "-", $s);
  return trim($s, "-");
}

function find_news_by_id(array $items, string $id): ?array {
  foreach ($items as $n) {
    if (($n['id'] ?? '') === $id) return $n;
  }
  return null;
}

function ensure_news_category(array &$data, string $cat): void {
  $cat = trim($cat);
  if ($cat === '') return;

  if (!isset($data['categories']) || !is_array($data['categories'])) {
    $data['categories'] = ["Latest News","Special News","Past News"];
  }

  $exists = false;
  foreach ($data['categories'] as $c) {
    if (mb_strtolower(trim($c)) === mb_strtolower($cat)) { $exists = true; break; }
  }
  if (!$exists) $data['categories'][] = $cat;
}

function is_youtube_url_news(string $url): bool {
  $u = trim($url);
  if ($u === '') return true;
  return (bool)preg_match("~^(https?://)?(www\.)?(youtube\.com|youtu\.be)/~i", $u);
}

function youtube_embed_url_news(string $url): string {
  $url = trim($url);
  if ($url === '') return '';
  if (preg_match("~youtu\.be/([A-Za-z0-9_\-]{6,})~", $url, $m)) return "https://www.youtube.com/embed/" . $m[1];
  if (preg_match("~v=([A-Za-z0-9_\-]{6,})~", $url, $m)) return "https://www.youtube.com/embed/" . $m[1];
  if (preg_match("~youtube\.com/embed/([A-Za-z0-9_\-]{6,})~", $url, $m)) return "https://www.youtube.com/embed/" . $m[1];
  return '';
}