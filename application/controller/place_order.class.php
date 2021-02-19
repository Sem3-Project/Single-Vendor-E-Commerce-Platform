<?php
include 'DbConnection.class.php';

class Order
{
    function __construct()
    {

        $connector = new DbConnection();
        $conn = $connector->connect();
    }
    function __destruct()
    {
    }

    public function getTotalPayment($conn, $order_id){
        $total = mysqli_query($conn, "SELECT total_payment FROM order WHERE order_id = '".$order_id."'");
      //  $row=mysqli_fetch_array($total);
        return $total;
    }

    public function getAddress($conn, $customer_id)
    {
        $address = mysqli_query($conn, "SELECT * FROM address WHERE customer_id='" . $customer_id . "'") or die(mysqli_error($conn));
        $result = mysqli_fetch_array($address);
        return implode("<br>", $result);
    }

    public function saveConfirmation($conn, $date, $payment_method, $order_id)
    {
        $updateQr = mysqli_query($conn,"UPDATE order SET date = '".$date."' ,payment_method='".$payment_method."' WHERE order_id='" . $order_id . "'");  
        return $updateQr;
    }

    public function num_of_rows($conn,$order_id){
        $num = mysqli_query($conn,"SELECT count($order_id) FROM order_product") or die(mysqli_error($conn));
        $row=mysqli_fetch_array($num);
        return $row[0];
    }
    
    public function loadItems($conn, $order_id)
    {
        $load = mysqli_query($conn, "SELECT image, quantity FROM order_confirmation WHERE order_id='" . $order_id . "'") or die(mysqli_error($conn));
        return $load;
    }

   
}
