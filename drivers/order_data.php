<?php
session_start();
include('bd.php');

$stmt = $pdo->prepare('SELECT order_id, order_price,
order_date FROM orders WHERE driver_id = ?');
$stmt->execute([$_SESSION['id']]);
$data = $stmt->fetchAll();

echo json_encode($data);

?>