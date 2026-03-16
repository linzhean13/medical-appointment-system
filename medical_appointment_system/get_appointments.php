<?php
require 'db.php';

$patient_id = $_GET['user_id'] ?? '';

$stmt = $pdo->prepare("
  SELECT a.appointment_id, a.appointment_time, a.status,
         u.name AS doctor_name, d.specialty
  FROM appointments a
  JOIN doctors d ON a.doctor_id = d.doctor_id
  JOIN users u ON d.user_id = u.user_id
  WHERE a.patient_id = ?
  ORDER BY a.appointment_time ASC
");
$stmt->execute([$patient_id]);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($appointments);
?>
