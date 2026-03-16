<?php
header('Content-Type: application/json');
require_once 'db.php'; // 你的 db.php 使用 PDO

try {
    $stmt = $pdo->query("
        SELECT d.doctor_id, u.name AS doctor_name
        FROM doctors d
        JOIN users u ON d.user_id = u.user_id
    ");
    $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($doctors);
} catch (PDOException $e) {
    echo json_encode(['error' => '查詢失敗: ' . $e->getMessage()]);
}
?>
