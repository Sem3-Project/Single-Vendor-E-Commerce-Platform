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

    public function createCart($conn){  

        $cart= mysqli_query($conn,"SELECT * FROM display") or die(mysqli_error($conn));  
        return $cart;      
    } 

}

?>