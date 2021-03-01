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
    public function getCartId($conn,$customer_id){
        $cart_id = mysqli_query($conn,"SELECT cart_id from cart_update where customer_id='".$customer_id."'");
        $result = $cart_id->fetch_assoc();
        return $result['cart_id'];
    }

     public function getVarientId($conn, $product_id,$varient_1,$varient_2){
        $varient_id = mysqli_query($conn,"SELECT varient_id FROM varient WHERE product_id='".$product_id."'and varient_1='".$varient_1."'and varient_2='".$varient_2."'") ;
        $result1 = $varient_id->fetch_assoc();
        return $result1['varient_id'];;
        
    //     try {
    //         //check if
    //         if($result1['varient_id']!= null) {
    //           //throw exception if email is not valid
    //           return $result1['varient_id'];;
    //         }
    //       }
          
    //       catch (customException $e) {
    //         //display custom message
    //         echo $e->errorMessage();
            
        
    // }
}  
}
?>  
