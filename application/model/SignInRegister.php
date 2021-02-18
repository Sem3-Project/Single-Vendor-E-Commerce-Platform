<?php

include '../controller/SignInRegister.class.php';

$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new SignInRegister();
if(isset($_POST['signup'])){  
    $email = $_POST['email'];  
    $password = $_POST['password']; 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $confirmPassword = $_POST['confirm_password'];  

    if($password == $confirmPassword){  
        $emailid = $funObj->isUserExist($conn,$email);  
        if(!$emailid){  
            $register = $funObj->customerRegister($conn,$first_name, $last_name, $email, $password);  
            if($register){ 

                 echo "<script>alert('Registration Successful')</script>";  
            }else{  
                echo "<script>alert('Registration Not Successful')</script>";  
            }  
        } else {  
            echo "<script>alert('Email Already Exist')</script>";  
        }  
    } else {  
        echo "<script>alert('Password Not Match')</script>";  
      
    } 
}

if(isset($_POST['login'])){  
    $emailid = $_POST['email'];  
    $password = $_POST['password'];  
    $user = $funObj->login($conn,$emailid, $password);  
    if ($user) {  
        // login Success  
       header("location:../view/customer/Home-customer.php");  
    } else {  
        // login Failed  
        echo "<script>alert('Emailid / Password Not Match')</script>";  
    }  
}  
 
?>