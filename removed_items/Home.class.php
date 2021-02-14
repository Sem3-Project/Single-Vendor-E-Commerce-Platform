<?php
include 'DbConnection.class.php';

session_start();

class Home {  
            
    function __construct() {  
          
        // make the connection with database  
        $connector = new DbConnection();
        $conn = $connector->connect();  
    }  
    function __destruct() {  
          
    } 
    public function category($conn){
        $result= mysqli_query($conn,"SELECT category_id,category_name from `category` order by category_name") or die(mysqli_error($conn)); 
        return $result;      
    }


    public function subcategory($conn){
        // $result= mysqli_query($conn,"SELECT * from `subcategory` where category_id=`$category_id`  order by subcat_name") or die(mysqli_error($conn)); 
        $result= mysqli_query($conn,"SELECT subcat_id,subcat_name from `subcategory`  order by subcat_name") or die(mysqli_error($conn)); 
        return $result;      
    }
    // public function customerRegister($conn,$first_name, $last_name, $email, $password){  
    //         $password = md5($password);  
    //         $register = mysqli_query($conn,"INSERT INTO customer(email, password, first_name, last_name, zip_code, address_line_1, address_line_2, city, state) VALUES ('".$email."','".$password."','".$first_name."','".$last_name."','','','','','')") or die(mysqli_error($conn));  
    //         return $register;      
    // }  

    // public function login($conn,$email, $password){  
    //     $result = mysqli_query($conn,"SELECT * FROM customer WHERE email = '".$email."' AND password = '".md5($password)."'");  
    //     $user_data = mysqli_fetch_array($result);  
     
    //     $no_rows = mysqli_num_rows($result);  
          
    //     if ($no_rows == 1)   
    //     {  
    //         $_SESSION['login'] = true;   
    //         $_SESSION['email'] = $user_data['email'];  
    //         return TRUE;  
    //     }  
    //     else  
    //     {  
    //         return FALSE;  
    //     }  
    // }  


      
} 




?>  
