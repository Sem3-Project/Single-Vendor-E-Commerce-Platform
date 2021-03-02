<?php

include '../../controller/place_order.class.php';

// $connector = new DbConnection();
// $conn = $connector->connect1();

//begin transaction
$con1->begin_transaction();

try {
    $funObj = new Order();

    $cust_id = $_SESSION['customer_id'];

    $cart_id = $funObj->getCartId($con1, $cust_id);

    //  $num = $funObj->num_of_rows($conn, $order_id);
    $result = $funObj->loadItems($con1, $cart_id);
    $total_pay = $funObj->getTotalPayment($con1, $cust_id);
    $row = $total_pay->fetch_assoc();
    $total_payment = $row['total_value'];

    $address = $funObj->getAddress($con1, $cust_id);
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
        $delivery_method = $_POST['delivery_method'];

        // if (($_POST['payment_method'] != 'Cash on delivery') || ($_POST['payment_method'] != 'Visa')) {
        //     echo "<script>alert('Please enter payment method')</script>";
        // } else {
            
        $funObj->saveConfirmation($con1, $cust_id, $date, $payment_method, $total_payment, $zip_code, $address_line_1, $address_line_2, $city, $state);
        $order_id = $funObj->get_orderID($con1, $cust_id, $date);
        $del_method = $funObj->saveDelivery($con1, $order_id, $delivery_method);
        $funObj->order_details($con1,$order_id,$cart_id);

        //$funObj->dltCartproduct($con1,$cart_id);

        //header("location:../view/customer/order_status.php");
        // }
    }

    if (isset($_POST['back'])) {
        $return = $funObj->back($con1, $cart_id);
        $set_zero = $funObj->totalset_zero($con1, $cust_id);
        header("location:../../view/customer/cart.php");
    }
    $con1->commit();
} catch (mysqli_sql_exception $exception) {
    $con1->rollback();
    throw $exception;
}


include '../../view/customer/order_place.php';
