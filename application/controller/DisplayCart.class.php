<?php

include 'DbConnection.class.php';
session_start();

class DisplayCart{
    function __construct() {  
          
        // make the connection with database  
        $connector = new DbConnection();
        $conn = $connector->connect();  
    }  
    function __destruct() {  
          
    } //$search_query="SELECT * FROM `product` NATURAL INNER JOIN `category` WHERE product_name='$info[0]'";

    public function createCart($conn,$customer_id){  

        $cart= mysqli_query($conn,"SELECT * FROM cart_display where customer_id='".$customer_id."'") or die(mysqli_error($conn));  
        return $cart;      
    } 

    public function removeItem($conn,$cart_product_id){
        $remove = mysqli_query($conn,"DELETE FROM cart_product WHERE cart_product_id='".$cart_product_id."'") or die(mysqli_error($conn));
        return $remove;
    }

}

?>