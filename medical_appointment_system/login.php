<?php
require 'db.php';

// 檢查參數
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    http_response_code(400);
    echo json_encode(['error' => '缺少帳號或密碼']);
    exit;
}

// 查詢使用者資訊與是否為醫生
$stmt = $pdo->prepare("
    SELECT u.user_id, u.name, u.email, u.password, d.doctor_id
    FROM users u
    LEFT JOIN doctors d ON u.user_id = d.user_id
    WHERE u.email = ?
");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// 檢查使用者與密碼
if (!$user || $password !== $user['password']) {
    http_response_code(401);
    echo json_encode(['error' => '帳號或密碼錯誤']);
    exit;
}

// 判斷角色
$role = $user['doctor_id'] ? 'doctor' : 'patient';
error_log(json_encode($user)); // 寫入伺服器錯誤日誌查看真實值

// 回傳登入資訊
echo json_encode([
    'user_id' => $user['user_id'],
    'name' => $user['name'],
    'role' => $role
]);
