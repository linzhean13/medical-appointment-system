<?php
require 'db.php';
header('Content-Type: text/plain');

// 讀取 JSON 資料
$data = json_decode(file_get_contents('php://input'), true);

// 取出參數
$doctor_id = $data['doctor_id'] ?? '';
$date = $data['date'] ?? '';
$time = $data['time'] ?? '';

if (!$doctor_id || !$date || !$time) {
    http_response_code(400);
    echo '資料不完整';
    exit;
}

try {
    $stmt = $pdo->prepare("
        UPDATE schedules 
        SET is_available = 0 
        WHERE doctor_id = ? 
          AND date = ? 
          AND start_time = ?
        LIMIT 1
    ");
    $stmt->execute([$doctor_id, $date, $time]);

    echo '班表已更新為不可預約';
} catch (PDOException $e) {
    http_response_code(500);
    echo '更新失敗：' . $e->getMessage();
}
?>
