<?php
include 'DbConnection.class.php';

class orderPDF{  
            
    function __construct() {  
 
        $connector = new DbConnection();
        $conn = $connector->connect();  
    }  
    function __destruct() {  
          
    } 
    

    public function orderTable($conn,$customer_id){
        $loadQr = mysqli_query($conn,"SELECT * FROM (order_product inner join order using (order_id))inner join product using(product_id) WHERE customer_id = '".$customer_id."'");  
        return $loadQr;
    }
  
}  
?>  
