<?php
include 'DbConnection.class.php';

class OrderStatus{  
            
    function __construct() {  
          
        // make the connection with database  
        $connector = new DbConnection();
        $conn = $connector->connect();  
    }  
    function __destruct() {  
          
    } 
    
    

    public function loadStatus($conn,$customer_id){
        $loadQr = mysqli_query($conn,"SELECT * FROM order_status WHERE customer_id = '".$customer_id."'");  
        return $loadQr;
    }
  
}  
?>  
