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
            $register = mysqli_query($conn,"INSERT INTO customer(email, password, first_name, last_name, zip_code, address_line_1, address_line_2, city, state) VALUES ('".$email."','".$password."','".$first_name."','".$last_name."','','','','','')") or die(mysqli_error($conn));  
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
            return TRUE;  
        }  
        else  
        {  
            return FALSE;  
        }  
    }  

    public function isUserExist($email){  
        $qr = mysqli_query("SELECT * FROM customer WHERE email = '".$email."'",$this);  
        echo $row = mysqli_num_rows($qr);  
        if($row > 0){  
            return true;  
        } else {  
            return false;  
        }  
    }  
}  
?>  
