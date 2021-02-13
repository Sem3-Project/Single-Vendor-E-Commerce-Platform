<?php
include 'DbConnection.class.php';

session_start();

class SignInRegister {  
            
    function __construct() {  
          
        // make the connection with database  
        $connector = new DbConnection();
        $conn = $connector->connect();  
    }  
    function __destruct() {  
          
    } 
    public function customerRegister($conn,$first_name, $last_name, $email, $password){  
            $password = md5($password);  
            $register = mysqli_query($conn,"INSERT INTO customer(email, password,payment_number, first_name, last_name, zip_code, address_line_1, address_line_2, city, state, mobile_num) VALUES ('".$email."','".$password."','','".$first_name."','".$last_name."','','','','','','')") or die(mysqli_error($conn));  
            return $register;      
    }  

    public function login($conn,$email, $password){  
        $result = mysqli_query($conn,"SELECT * FROM customer WHERE email = '".$email."' AND password = '".md5($password)."'");  
        $user_data = mysqli_fetch_array($result);  
     
        $no_rows = mysqli_num_rows($result);  
          
        if ($no_rows == 1)   
        {  
            $_SESSION['login'] = true;   
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['customer_id'] = $user_data['customer_id'];
            return TRUE;  
        }  
        else  
        {  
            return FALSE;  
        }  
    }
    
    // public function getID($conn){
    //     $result = mysqli_query($conn,"SELECT customer_id from customer");
    //     return $result;
    // }

    public function isUserExist($conn,$email){  
        $qr = mysqli_query($conn,"SELECT * FROM customer WHERE email = '".$email."'");  
        $row = mysqli_num_rows($qr);  
        if($row > 0){  
            return true;  
        } else {  
            return false;  
        }  
    }
    
    public function editProfile($conn,$customer_id,$email,$payment_number,$first_name,$last_name,$zip_code,$address_line_1,$address_line_2,$city,$state,$mobile_num){  
        $updateQr = mysqli_query($conn,"UPDATE customer SET email='".$email."',payment_number='".$payment_number."',first_name='".$first_name."',last_name='".$last_name."',zip_code='".$zip_code."',address_line_1='".$address_line_1."',address_line_2='".$address_line_2."',city='".$city."',state='".$state."',mobile_num='".$mobile_num."' WHERE customer_id = '.$customer_id.'");  
        return $updateQr;
    }

    public function loadProfile($conn,$customer_id){
        $loadQr = mysqli_query($conn,"SELECT * FROM customer WHERE customer_id = '".$customer_id."'");  
        return $loadQr;
    }
    
}  
?>  
