<?php

//include '../controller/DbConnection.class.php';
include '../controller/SignInRegister.class.php';
$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new SignInRegister();
if(isset($_POST['signup'])){  
    $email = $_POST['email'];  
    $password = $_POST['password']; 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user = $funObj->customerRegister($conn,$first_name, $last_name, $email, $password);  
    $funObj ->isUserExist($email);
    if ($user) {  
        // Registration Success  
       header("location:../../index.php");  
    } else {  
        // Registration Failed  
        echo "<script>alert('Emailid / Password Not Match')</script>";  
    }  
}  
?>