<?php
include('bd.php');
session_start();
$active_order = $_SESSION['active_order'];
$available_order = $_SESSION['available_order'];
if(isset($_POST['submit1']))
{
	$stmt = $pdo->prepare('UPDATE orders SET order_status = "In progress" WHERE order_id = ?');
	$stmt->execute([$available_order['order_id']]);
	/*$stm = $pdo->prepare('UPDATE drivers SET driver_status = "On leave" WHERE driver_id = ?');
	$stm->execute([$_SESSION['id']]);*/
	header('Location: test.php');
}

if(isset($_POST['submit2']))
{
	$stmt = $pdo->prepare('UPDATE orders SET order_status = "Completed" WHERE order_id = ?');
	$stmt->execute([$active_order['order_id']]);
	/*$stm = $pdo->prepare('UPDATE drivers SET driver_status = "Available" WHERE driver_id = ?');
	$stm->execute([$_SESSION['id']]);*/
	header('Location: test.php');
}
?>