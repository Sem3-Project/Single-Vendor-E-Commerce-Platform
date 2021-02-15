<?php
session_start();
include '../controller/DisplayCart.class.php';
$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new DisplayCart();


// If there are products in cart

    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    // $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    // $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    //$stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    //$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal


    // foreach ($products as $product) {
    //     $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    // }

   

$_GET['customer_id'];
?>

 <!-- <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">&dollar;<--?=$subtotal?></span>
        </div> -->