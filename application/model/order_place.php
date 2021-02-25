<?php

include '../controller/place_order.class.php';

$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new Order();

$order_id = $funObj->get_orderID($conn, 15);

$num = $funObj->num_of_rows($conn, $order_id);
$result = $funObj->loadItems($conn, $order_id);
$total_pay = $funObj->getTotalPayment($conn, $order_id);
$row = $total_pay->fetch_assoc();
$total_payment = $row['total_payment'];

$address = $funObj->getAddress($conn, 14);
$zip_code = $address['zip_code'];
$address_line_1 = $address['address_line_1'];
$address_line_2 = $address['address_line_2'];
$city = $address['city'];
$state = $address['state'];

if (isset($_POST['confirm'])) {
    $date = date("Y-m-d");
    $payment_method = $_POST['payment_method'];
    $zip_code = $_POST['zip_code'];
    $address_line_1 = $_POST['address_line_1'];
    $address_line_2 = $_POST['address_line_2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $insert = $funObj->saveConfirmation($conn, $date, $payment_method, $order_id, $zip_code, $address_line_1, $address_line_2, $city, $state);

    if (($_POST['payment_method'] != 'Cash on delivery') || ($_POST['payment_method'] != 'Visa')) {
        echo "<script>alert('Please enter a payment method')</script>";
    } else {
        header("location:../view/customer/order_status.php");
    }
}

if (isset($_POST['back'])) {
    header("location:cart.php");
}

include '../view/customer/placeOrder.php';
