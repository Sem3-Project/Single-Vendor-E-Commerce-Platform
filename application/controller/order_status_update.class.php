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
        $date_result= mysqli_fetch_assoc($date);
        $city = mysqli_query($conn,"SELECT city from estimate_delivery where order_id='".$order_id."'");
        
        $date1 = strtotime($date_result['date']);
        $date2 = new DateTime($date_result['date']);
        
        //echo $date2->format('Y-m-d');
        //$date2 = str_replace('-', '/', $date1);
        

        $city_result= mysqli_fetch_assoc($city);
        
        
        $city1 = strtolower($city_result['city']);
        
        //$city1=strtolower($city);
        
        if ($city1=='colombo'){
            //$result= $date->modify('+5 day');
            $date2->add(new DateInterval('P5D')); 
            $delivery_estimate = $date2->format('Y-m-d');
        }
        else{
            //$result= $date->modify('+7 day');
            $date2->add(new DateInterval('P7D')); 
            $delivery_estimate = $date2->format('Y-m-d');
        }
        $result = mysqli_query($conn,"UPDATE `delivery` SET `delivery_estimate`='".$delivery_estimate."' WHERE order_id ='". $order_id."'");
        return $result;
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
