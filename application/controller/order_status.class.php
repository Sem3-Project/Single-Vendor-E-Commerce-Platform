<?php
include 'controllerUserData.php';

class OrderStatus{  
            
    //function __construct() {  
          
        // make the connection with database  
       // $connector = new DbConnection();
       // $conn = $connector->connect1();  
   // }  
   // function __destruct() {  
          
    //} 
    
    

    public function loadStatus($con1,$customer_id){
        $loadQr = mysqli_query($con1,"SELECT * FROM order_status WHERE customer_id = '".$customer_id."'");  
        return $loadQr;
    }
  
}  
?>  
