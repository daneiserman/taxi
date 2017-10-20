<?php
include('bd.php');

$stmt = $pdo->prepare('SELECT * FROM drivers WHERE driver_login = ?');
$stmt->execute([$_POST['login']]);
$data = $stmt->fetch();

echo(empty($data));
exit();
?>