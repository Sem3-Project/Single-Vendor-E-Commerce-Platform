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
    public function getestiDate($conn,$order_id){
        $date = mysqli_query($conn,"SELECT `date` from estimate_delivery where order_id='".$order_id."'");
        $city = mysqli_query($conn,"SELECT city from estimate_delivery where order_id='".$order_id."'");
        
        
        if ($city=='Colombo'){
            $result= $date->modify('+5 day');
        }
        else{
            $result= $date->modify('+7 day');
        }
        $result = $delivery_estimate->fetch_assoc();
        return $result['delivery_estimate'];
    }
    // public function loadOrder($conn,$order_id){
    //     $loadQr = mysqli_query($conn,"SELECT delivery_status,additional_notes FROM delivery WHERE order_id = '".$order_id."'");  
    //     return $loadQr;
    // }
    
    

    // public function updateStatus($conn,$order_id,$delivery_status,$additional_notes){  
    //     $updateQr = mysqli_query($conn,"UPDATE delivery SET delivery_status='$delivery_status',additional_notes='$additional_notes', WHERE order_id = '$order_id'");  
        
       
    //     return $updateQr;
    // }


  
}  
?>  
