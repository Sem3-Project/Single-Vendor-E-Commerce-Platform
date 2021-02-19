<?php
$products = array();
$subtotal = 0.00;

include '../controller/DisplayCart.class.php';
$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new DisplayCart();

$cus_id = 15;


$num = $funObj->num_of_rows($conn,$cus_id);
$result = $funObj->createCart($conn,$cus_id);
$cart_product_id = $funObj->getCartProdId($conn,$cus_id);
//$remove = $funObj->removeItem($conn,$cart_product_id);

// if(isset($_POST['remove'])){
//     //header("location:cart.php");  
//     echo $remove;
// }
//onclick= "resetForm()" 

// if(isset($_POST['placeorder'])){
  
// }


include '../view/customer/cart.view.php';


//remove from cart
//add order_id to order table
//add item to the order_product table
//fill each column in tables, order and order_product
