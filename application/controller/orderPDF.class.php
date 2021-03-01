<?php
//include 'controllerUserData.php';
include 'DbConnection.class.php';

class orderPDF{  
            
    function __construct() {  
 
        $connector = new DbConnection();
        $conn = $connector->connect1();  
    }  
    function __destruct() {  
          
    } 
    

    // public function orderTable($con1,$customer_id){
    //     $loadQr = mysqli_query($con1,"SELECT * FROM (order_product inner join order using (order_id))inner join product using(product_id) WHERE customer_id = '".$customer_id."'");  
    //     return $loadQr;
    // }
  
}  
?>  
