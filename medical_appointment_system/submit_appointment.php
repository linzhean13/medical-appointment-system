<?php
require 'db.php';

// 從前端以 POST 傳來的表單資料讀取
$patient_id = $_POST['user_id'] ?? '';
$doctor_id = $_POST['doctor_id'] ?? '';
$date = $_POST['date'] ?? '';
$time = $_POST['time'] ?? '';

if (!$patient_id || !$doctor_id || !$date || !$time) {
  http_response_code(400);
  echo '資料不完整';
  exit;
}

try {
  // // ✅ 1. 更新該醫師的時段為不可預約
  // $stmt = $pdo->prepare("
  //   UPDATE schedules 
  //   SET is_available = 0 
  //   WHERE doctor_id = ? AND date = ? AND start_time = ?
  // ");
  // $stmt->execute([$doctor_id, $date, $time]);

  // ✅ 2. 插入一筆新的預約記錄
  $appointment_time = "$date $time:00";  // 預約時間格式
  $stmt = $pdo->prepare("
    INSERT INTO appointments (patient_id, doctor_id, schedule_id, appointment_time, status)
    SELECT ?, ?, s.schedule_id, ?, 'pending'
    FROM schedules s
    WHERE s.doctor_id = ? AND s.date = ? AND s.start_time = ?
    LIMIT 1
  ");
  $stmt->execute([$patient_id, $doctor_id, $appointment_time, $doctor_id, $date, $time]);

  echo '預約成功';
} catch (Exception $e) {
  http_response_code(500);
  echo '預約失敗：' . $e->getMessage();
}
?>
