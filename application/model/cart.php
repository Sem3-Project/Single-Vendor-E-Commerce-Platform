<?php
$products = array();
$subtotal = 0.00;

include '../controller/DisplayCart.class.php';
$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new DisplayCart();

$num = $funObj->num_of_rows($conn,15);
$result = $funObj->createCart($conn,15);

include '../view/customer/cart.view.php';


?>

