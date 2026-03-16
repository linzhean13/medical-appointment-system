<?php
require 'db.php';
$doctor_id = $_GET['doctor_id'] ?? 0;
$date = $_GET['date'] ?? date('Y-m-d');

$stmt = $pdo->prepare("SELECT * FROM schedules WHERE doctor_id = ? AND date = ?");
$stmt->execute([$doctor_id, $date]);
$schedules = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($schedules);
?>