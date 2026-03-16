<?php
require 'db.php';

$specialty = $_GET['specialty'] ?? '';

$stmt = $pdo->prepare("
  SELECT d.doctor_id, u.name AS doctor_name
  FROM doctors d
  JOIN users u ON d.user_id = u.user_id
  WHERE d.specialty = ?
");
$stmt->execute([$specialty]);
$doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($doctors);
?>
