<?php
$products = array();
$subtotal = 0.00;
$per_product_total = 0.00;

include '../controller/DisplayCart.class.php';
$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new DisplayCart();

$cus_id = 15;

$cart_product_id =10;
$num = $funObj->num_of_rows($conn,$cus_id);
$result = $funObj->createCart($conn,$cus_id);
$cart_product_id = $funObj->getCartProdId($conn,$cus_id);

// $max = $funObj->getMaxVarientQty($conn,$cus_id);

// while ($row = mysqli_fetch_array($max)){
//    // echo $row[];
// }

// if(isset($_POST['remove'])){
//     $remove = $funObj->removeItem($conn,$cart_product_id);

//     if($remove){
//         echo "Records were deleted successfully.";
//     } else{
//         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
//     }
//    // header("location:cart.php");  
// }
//onclick= "resetForm()" 

// if(isset($_POST['placeorder'])){
  
// }


include '../view/customer/cart.view.php';


//remove from cart
//add order_id to order table
//add item to the order_product table
//fill each column in tables, order and order_product
