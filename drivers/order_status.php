<?php
session_start();
include('bd.php');

if(isset($_SESSION['order_id'])) {
    $stmt = $pdo->prepare('SELECT client_address, target_address, order_status, client_id, order_time, order_price FROM orders WHERE order_id = ? LIMIT 1');
    $stmt->execute([$_SESSION['order_id']]);
    $data = $stmt->fetch();
    $json = array(
        'id' => $_SESSION['order_id'],
        'status' => $data['order_status'],
        'client_id' => $data['client_id'],
        'location' => $data['client_address'],
        'target' => $data['target_address'],
        'time' => $data['order_time'],
        'price' => $data['order_price']
    );
    if($data['status'] == 'canceled') unset($_SESSION['order_id']);

    echo json_encode($json);
}
else {
    $stmt = $pdo->prepare('SELECT order_id, client_address, target_address FROM orders WHERE order_status = "waiting" AND driver_id = ? LIMIT 1');
    $stmt->execute([$_SESSION['id']]);
    $data = $stmt->fetch();
    $json = array(
        'id' => $data['order_id'],
        'status' => '',
        'client_id' => $data['client_id'],
        'location' => $data['client_address'],
        'target' => $data['target_address'],
        'time' => $data['order_time'],
        'price' => $data['order_price']
    );
    if(!empty($data))
    {
        $json['status'] = 'waiting';
        $_SESSION['order_id'] = $data['id'];
    }
    else
        $json['status'] = 'none';
    echo json_encode($json);
}
?>