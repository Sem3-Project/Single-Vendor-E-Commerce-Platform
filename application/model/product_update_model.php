<?php
// include '.;C:\xampp\php\PEAR;C:\xampp\htdocs\Single-Vendor-E-Commerce-Platform';

require_once '../controller/product_update.class.php';
 //include '../controller/product_update.class.php';
 //echo( get_include_path());

$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new product_update();
if(isset($_POST['search'])){
     $product_name=$_POST['product_name'];
     $funObj->search_category($conn,$product_name);
     $dimension=$_POST['dimension'];
    // $email = $_POST['email'];  
    // $password = $_POST['password']; 
    // $first_name = $_POST['first_name'];
    // $last_name = $_POST['last_name'];
    // $user = $funObj->customerRegister($conn,$first_name, $last_name, $email, $password);  
    // $funObj ->isUserExist($email);
    // if ($user) {  
    //     // Registration Success  
    //    header("location:../../index.php");  
    // } else {  
    //     // Registration Failed  
    //     echo "<script>alert('Emailid / Password Not Match')</script>";  
    // }  }


}  

include '../View/admin/product_update.php';
?>