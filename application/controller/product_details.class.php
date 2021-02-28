<?php
include 'DbConnection.class.php';

class ProductDetails{  
            
    function __construct() {  
          
        // make the connection with database  
        $connector = new DbConnection();
        $conn = $connector->connect();  
    }  
    function __destruct() {  
          
    } 
    
    public function loadProduct($conn,$product_id){
        $loadQr = mysqli_query($conn,"SELECT * FROM product_details WHERE product_id = '".$product_id."'");  
        return $loadQr;
    }

    public function addtoCart($conn,$customer_id){
        $order = mysqli_query($conn,"INSERT INTO cart_product(customer_id) VALUES ('".$customer_id."')") or die(mysqli_error($conn));
        return $order;
    }
}  
?>  
