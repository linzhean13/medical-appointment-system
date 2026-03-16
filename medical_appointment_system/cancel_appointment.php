<?php
require 'db.php';
$app_id = $_POST['appointment_id'] ?? 0;

$stmt = $pdo->prepare("UPDATE appointments SET status = 'canceled' WHERE appointment_id = ?");
$result = $stmt->execute([$app_id]);

echo json_encode(['success' => $result]);
?>