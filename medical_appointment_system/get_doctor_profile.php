<?php
require 'db.php';

header('Content-Type: application/json');

$user_id = $_GET['user_id'] ?? '';

if (!$user_id) {
  http_response_code(400);
  echo json_encode(['error' => '缺少 user_id']);
  exit;
}

$stmt = $pdo->prepare("
  SELECT u.name, d.specialty, d.bio
  FROM doctors d
  JOIN users u ON d.user_id = u.user_id
  WHERE d.user_id = ?
");
$stmt->execute([$user_id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($data ?: []);
