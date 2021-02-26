<?php
include 'DbConnection.class.php';

class Order
{
    function __construct()
    {

        $connector = new DbConnection();
        $conn = $connector->connect1();
    }
    function __destruct()
    {
    }

    public function getTotalPayment($conn, $order_id)
    {
        $load = mysqli_query($conn, "SELECT `total_payment` FROM `order` WHERE `order_id`='$order_id'") or die(mysqli_error($conn));
        return $load;
    }

    public function getAddress($conn, $customer_id)
    {
        $address = mysqli_query($conn, "SELECT `zip_code`,`address_line_1`,`address_line_2`,`city`,`state` FROM address WHERE customer_id='" . $customer_id . "'") or die(mysqli_error($conn));
        $result = mysqli_fetch_assoc($address);
        // return implode("<br>", $result);
        return $result;
    }

    public function saveConfirmation($conn, $date, $payment_method, $order_id, $zip_code, $address_line_1, $address_line_2, $city, $state)
    {
        $updateQr = mysqli_query($conn, "UPDATE `order` SET `date` = '$date' ,`payment_method`='$payment_method',`zip_code`='$zip_code',`address_line_1`='$address_line_1',`address_line_2`='$address_line_2',`city`='$city',`state`='$state' WHERE `order_id`='$order_id'");
        return $updateQr;
    }

    public function saveDelivery($conn, $order_id, $delivery_method)
    {
        $insertDelivery = mysqli_query($conn, "INSERT INTO delivery(order_id,delivery_method) VALUES('" . $order_id . "','" . $delivery_method . "')");
        return $insertDelivery;
    }

    public function num_of_rows($conn, $order_id)
    {
        $num = mysqli_query($conn, "SELECT count($order_id) FROM order_product") or die(mysqli_error($conn));
        $row = mysqli_fetch_array($num);
        return $row[0];
    }

    public function loadItems($conn, $order_id)
    {
        $load = mysqli_query($conn, "SELECT image, quantity FROM order_confirmation WHERE order_id='" . $order_id . "'") or die(mysqli_error($conn));
        return $load;
    }

    public function get_orderID($conn, $customer_id)
    {
        $orderID = mysqli_query($conn, "SELECT `order_id` FROM `order` WHERE `customer_id`='$customer_id'") or die(mysqli_error($conn));
        return mysqli_fetch_assoc($orderID)['order_id'];
    }
}
