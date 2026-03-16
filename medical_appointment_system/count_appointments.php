<?php
require 'db.php';

header('Content-Type: application/json');

$doctor_id = $_GET['doctor_id'] ?? '';
$date = $_GET['date'] ?? '';
$time = $_GET['time'] ?? '';

if (!$doctor_id || !$date || !$time) {
    http_response_code(400);
    echo json_encode(['error' => '參數不完整']);
    exit;
}

$appointment_time = "$date $time:00";

$stmt = $pdo->prepare("
  SELECT COUNT(*) 
  FROM appointments 
  WHERE doctor_id = ? AND appointment_time = ?
");
$stmt->execute([$doctor_id, $appointment_time]);
$count = $stmt->fetchColumn();

echo json_encode(['count' => $count]);
?>
