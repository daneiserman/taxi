<?php
session_start();
include('bd.php');

$allowed = array('driver_name', 'driver_surname', 'driver_lastname','driver_gender', 'driver_phone', 'driver_login', 'driver_password');
$sql = "INSERT INTO drivers SET " . pdoSet($allowed, $values) . ", driver_regdate = NOW(), driver_status = 'available";
$stmt = $pdo->prepare($sql);
$stmt->execute($values);
$stmt = $pdo->query('SELECT MAX(driver_id) FROM drivers');
$id = $stmt->fetchColumn();
            
$_SESSION['id'] = $id;
exit(); 
?>
