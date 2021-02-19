<?php
include 'DbConnection.class.php';

class Order {

    function __construct() {  
          
        // make the connection with database  
        $connector = new DbConnection();
        $conn = $connector->connect();  
    }  
    function __destruct() {  
          
    } 
    public function getFromOrder($conn,$order_id){
        $order_value = mysqli_query($conn,"SELECT total_payment,payment_method FROM order WHERE order_id='".$order_id."'") or die(mysqli_error($conn));
        return $order_value;
    }

    public function getAddress($conn, $customer_id){
        $address = mysqli_query($conn,"SELECT * FROM address WHERE customer_id='".$customer_id."'") or die(mysqli_error($conn));
        $result1 = implode(',',mysqli_fetch_array($address));
        $result = mysqli_fetch_array($address);
        return $result1;
    }
}
