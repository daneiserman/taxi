<?php
session_start();
include('bd.php');

$stmt = $pdo->prepare('UPDATE orders SET order_status = "progress" WHERE order_id = ?');
$stmt->execute([$_SESSION['order_id']]);
?>