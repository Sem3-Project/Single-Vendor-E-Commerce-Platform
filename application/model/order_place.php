<?php

include '../controller/place_order.class.php';

$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new Order();

$order_id =11;

$num = $funObj->num_of_rows($conn,$order_id);
$result = $funObj->loadItems($conn,$order_id);
$total_pay = $funObj->getTotalPayment($conn,$order_id);

if(isset($_POST['confirm'])){
    
    $date = date("Y-m-d");
    $payment_method = $_POST['payment_method'];
    $insert = $funObj->saveConfirmation($conn, $date, $payment_method, 11);
    
}

if(isset($_POST['back'])){
    header("location:cart.php");  
}


echo $total_pay;

//echo $funObj->getAddress($conn,15);


include '../view/customer/placeOrder.php';

?>
