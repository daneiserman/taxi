<?php
session_start();
include('bd.php');

$stmt = $pdo->prepare('SELECT driver_name, driver_lastname FROM drivers WHERE driver_id = ?');
$stmt->execute([$_SESSION['id']]);
$data = $stmt->fetch();

echo $data['driver_name'] . ' ' . $data['driver_lastname'];
?>