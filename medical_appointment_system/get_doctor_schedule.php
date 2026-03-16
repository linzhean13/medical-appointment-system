<?php
require 'db.php';

header('Content-Type: application/json');

$user_id = $_GET['user_id'] ?? '';
$date = $_GET['date'] ?? date('Y-m-d');

if (!$user_id || !$date) {
  echo json_encode([]);
  exit;
}

// 找出 doctor_id
$stmt = $pdo->prepare("SELECT doctor_id FROM doctors WHERE user_id = ?");
$stmt->execute([$user_id]);
$doctor = $stmt->fetch();
if (!$doctor) {
  echo json_encode([]);
  exit;
}
$doctor_id = $doctor['doctor_id'];

// 查詢班表時段
$start = $date . ' 00:00:00';
$end = $date . ' 23:59:59';

$stmt = $pdo->prepare("
  SELECT TIME(start_time) AS time, is_available
  FROM schedules
  WHERE doctor_id = ?
    AND date = ?
  ORDER BY time
");
$stmt->execute([$doctor_id, $start]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>