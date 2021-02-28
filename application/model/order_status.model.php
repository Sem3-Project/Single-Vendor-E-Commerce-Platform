<?php
include '../controller/order_status_update.class.php';

$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new UpdateStatus();

$update = $funObj->updateStatus($conn,$order_id,$delivery_status,$additional_notes);

if (isset($_POST['update'])){
    $order_id = $_POST['order_id'];  
    $delivery_status = $_POST['delivery_status'];  
    $additional_notes = $_POST['additional_notes'];  

    $update = $funObj->updateStatus($conn,$_POST['order_id'],$_POST['delivery_status'],$_POST['additional_notes']);
}


?>
