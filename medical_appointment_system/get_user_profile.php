<?php
require 'db.php';

$user_id = $_GET['user_id'] ?? '';

$stmt = $pdo->prepare("SELECT name, phone FROM users WHERE user_id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($user);
?>
