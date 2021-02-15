<?php
include 'DbConnection.class.php';

class Profile{  
            
    function __construct() {  
          
        // make the connection with database  
        $connector = new DbConnection();
        $conn = $connector->connect();  
    }  
    function __destruct() {  
          
    } 
    
    public function editProfile($conn,$customer_id,$email,$payment_number,$first_name,$last_name,$zip_code,$address_line_1,$address_line_2,$city,$state,$mobile_num){  
        $updateQr = mysqli_query($conn,"UPDATE customer SET email='".$email."',payment_number='".$payment_number."',first_name='".$first_name."',last_name='".$last_name."',zip_code='".$zip_code."',address_line_1='".$address_line_1."',address_line_2='".$address_line_2."',city='".$city."',state='".$state."',mobile_num=$mobile_num WHERE customer_id = '".$customer_id."'");  
        
       //$updateQr = mysqli_query($conn,"UPDATE customer SET email=$email,payment_number=$payment_number,first_name=$first_name,last_name=$last_name,zip_code=$zip_code,address_line_1=$address_line_1,address_line_2=$address_line_2,city=$city,state=$state,mobile_num=$mobile_num WHERE customer_id ='".$customer_id."'");  

      // $updateQr = mysqli_query($conn,"UPDATE customer SET email=$email,payment_number=$payment_number,first_name=$first_name,last_name=$last_name,zip_code=$zip_code WHERE customer_id ='".$customer_id."'");  

        return $updateQr;
    }

    public function loadProfile($conn,$customer_id){
        $loadQr = mysqli_query($conn,"SELECT * FROM customer WHERE customer_id = '".$customer_id."'");  
        return $loadQr;
    }
  //  public function editProfile($conn,$customer_id,$email,$payment_number,$first_name,$last_name,$zip_code,$address_line_1,$address_line_2,$city,$state,$mobile_num){  

    // public function updateproflile($conn,$customer_id,$address_line_1){
    //     $updateq = mysqli_query($conn,"UPDATE customer SET address_line_1='".$address_line_1."' WHERE customer_id=$customer_id");
    // return $updateq;
    // }
}  
?>  
