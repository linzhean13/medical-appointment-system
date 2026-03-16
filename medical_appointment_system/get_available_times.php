<?php
require 'db.php';

$doctor_id = $_GET['doctor_id'] ?? '';
$date = $_GET['date'] ?? '';

if (!$doctor_id || !$date) {
    echo json_encode([]);
    exit;
}

$stmt = $pdo->prepare("
    SELECT DISTINCT start_time
    FROM schedules
    WHERE doctor_id = ?
      AND date = ?
      AND is_available = 1
    ORDER BY start_time
");
$stmt->execute([$doctor_id, $date]);

$times = $stmt->fetchAll(PDO::FETCH_COLUMN);

// 將時間格式成 HH:MM
$formatted = array_map(fn($t) => substr($t, 0, 5), $times);

header('Content-Type: application/json');
echo json_encode($formatted);
?>
