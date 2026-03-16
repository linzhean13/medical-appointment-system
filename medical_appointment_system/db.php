<?php
$host = 'localhost';
$db = 'medical_appointment_system';
$user = 'root';
$pass = ''; // 你有設密碼就填密碼

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
} catch (PDOException $e) {
    die("資料庫連線失敗: " . $e->getMessage());
}
?>
