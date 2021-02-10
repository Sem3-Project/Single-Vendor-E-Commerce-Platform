<?php
include 'DbConnection.class.php';

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

    // public function Login($emailid, $password){  
    //     $res = mysqli_query("SELECT * FROM users WHERE emailid = '".$emailid."' AND password = '".md5($password)."'",$this);  
    //     $user_data = mysqli_fetch_array($res);  
    //     //print_r($user_data);  
    //     $no_rows = mysqli_num_rows($res);  
          
    //     if ($no_rows == 1)   
    //     {  
       
    //         $_SESSION['login'] = true;  
    //         $_SESSION['uid'] = $user_data['id'];  
    //         $_SESSION['username'] = $user_data['username'];  
    //         $_SESSION['email'] = $user_data['emailid'];  
    //         return TRUE;  
    //     }  
    //     else  
    //     {  
    //         return FALSE;  
    //     }  
    // }  
    public function isUserExist($email){  
        $qr = mysqli_query("SELECT * FROM users WHERE email = '".$email."'",$this);  
        echo $row = mysqli_num_rows($qr);  
        if($row > 0){  
            return true;  
        } else {  
            return false;  
        }  
    }  
}  
?>  
