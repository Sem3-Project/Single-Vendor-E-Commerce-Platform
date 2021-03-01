<?php

include '../controller/place_order.class.php';

// $connector = new DbConnection();
// $conn = $connector->connect1();

//begin transaction
$con1->begin_transaction();

try {
    $funObj = new Order();

<<<<<<< HEAD
    $cust_id = $_SESSION['customer_id'];
=======

    $cust_id = 22;

>>>>>>> d24ffdb4de6cb38772abc132d96387a787723f98

    // $order_id = $funObj->get_orderID($conn, $cust_id);
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
<<<<<<< HEAD
        //$insert = $funObj->saveConfirmation($conn, $date, $payment_method, $order_id, $zip_code, $address_line_1, $address_line_2, $city, $state);
        //$del_method = $funObj->saveDelivery($conn, $order_id, $delivery_method);
        //header("location:../view/customer/order_status.php");
=======


        //$insert = $funObj->saveConfirmation($conn, $date, $payment_method, $order_id, $zip_code, $address_line_1, $address_line_2, $city, $state);
        //$del_method = $funObj->saveDelivery($conn, $order_id, $delivery_method);
        //header("location:../view/customer/order_status.php");

        // $insert = $funObj->saveConfirmation($conn, $date, $payment_method, $order_id, $zip_code, $address_line_1, $address_line_2, $city, $state);


        $insert = $funObj->saveConfirmation($conn, $cust_id,$date, $payment_method,$total_payment, $zip_code, $address_line_1, $address_line_2, $city, $state);
        // $order_id = $funObj->get_orderID($conn, $cust_id, $date);

        // $del_method = $funObj->saveDelivery($conn, $order_id, $delivery_method);

        // $order_prod = $funObj->order_details($conn, $order_id);
        //$enter_order_prod = $funObj->order_details($conn,$cart_id,$order_id);
        // $dltFromCartProduct = $funObj->dltCartproduct($conn,$cart_id);

       // header("location:../view/customer/order_status.php");


        // header("location:../view/customer/order_status.php");

>>>>>>> d24ffdb4de6cb38772abc132d96387a787723f98
        // }
    }

    if (isset($_POST['back'])) {
        $return = $funObj->back($con1, $cart_id);
        $set_zero = $funObj->totalset_zero($con1, $cust_id);
        header("location:../view/customer/cart_view.php");
    }
<<<<<<< HEAD
    $con1->commit();
=======
    $conn->commit();
    clearstatcache();
>>>>>>> d24ffdb4de6cb38772abc132d96387a787723f98
} catch (mysqli_sql_exception $exception) {
    $con1->rollback();
    throw $exception;
}


include '../view/customer/order_place.php';
