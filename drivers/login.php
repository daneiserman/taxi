<?php
session_start();
include('bd.php');

$stmt = $pdo->prepare('SELECT driver_id FROM drivers WHERE driver_login = ?');
$stmt->execute([$_POST['driver_login']]);
$id = $stmt->fetchColumn();

$stmt = $pdo->prepare('SELECT driver_password FROM drivers WHERE driver_login = ?');
$stmt->execute([$_POST['driver_login']]);
$password =  $stmt->fetchColumn();

if(empty($id)) echo 'Пользователь с таким именем не зарегестрирован.';
else
{
    if($password != $_POST['driver_password']) echo 'Неверный пароль.';
    else {
        $_SESSION['id'] = $id;
        echo 'success';
        exit();
    }
}
?>


