<?php
include 'DbConnection.class.php';

class UpdateStatus{  
            
    function __construct() {  
          
        // make the connection with database  
        $connector = new DbConnection();
        $conn = $connector->connect();  
    }  
    function __destruct() {  
          
    } 
    
    

    public function updateStatus($conn,$order_id,$delivery_status,$additional_notes){  
        $updateQr = mysqli_query($conn,"UPDATE delivery SET delivery_status='".$delivery_status."',additional_notes='".$additional_notes."', WHERE order_id = '".$order_id."'");  
        
       
        return $updateQr;
    }


  
}  
?>  
