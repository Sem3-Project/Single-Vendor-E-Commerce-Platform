<?php

include '../controller/place_order.class.php';

$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new Order();

$order_id = $funObj->get_orderID($conn,15);

$num = $funObj->num_of_rows($conn,$order_id);
$result = $funObj->loadItems($conn,$order_id);
$total_pay = $funObj->getTotalPayment($conn,$order_id);
$row = $total_pay->fetch_assoc();
$total_payment = $row['total_payment'];

$address = $funObj->getAddress($conn,14);

if(isset($_POST['confirm'])){
    $date = date("Y-m-d");
    $payment_method = $_POST['payment_method'];
    $insert = $funObj->saveConfirmation($conn, $date, $payment_method, $order_id);
    header("location:cart.php"); 
}

if(isset($_POST['back'])){
    header("location:cart.php");  
}

include '../view/customer/placeOrder.php';
