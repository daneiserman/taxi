<?php
include('bd.php');
session_start();

unset($_SESSION['id']);
if(isset($_SESSION['request_id'])) unset($_SESSION['request_id']);
if(isset($_SESSION['order_id'])) unset($_SESSION['order_id']);
session_destroy();

header('Location: index.html');  
exit();
?>
