<?php

include 'DbConnection.class.php';

class DisplayCart{
    function __construct() {  
          
        // make the connection with database  
        $connector = new DbConnection();
        $conn = $connector->connect();  
    }  
    function __destruct() {  
          
    } //$search_query="SELECT * FROM `product` NATURAL INNER JOIN `category` WHERE product_name='$info[0]'";

    public function createCart($conn,$customer_id){  

        $cart= mysqli_query($conn,"SELECT * FROM cart_display where customer_id='".$customer_id."'") or die(mysqli_error($conn));  
        return $cart;      
    } 

    public function removeItem($conn,$cart_product_id){
        $remove = mysqli_query($conn,"DELETE FROM cart_product WHERE 1cart_product_id1='$cart_product_id") or die(mysqli_error($conn));
        return $remove;
    }

    public function num_of_rows($conn,$customer_id){
        $num = mysqli_query($conn,"SELECT count($customer_id) FROM cart_display") or die(mysqli_error($conn));
        $row=mysqli_fetch_array($num);
        return $row[0];
    }

    public function getCartProdId ($conn,$customer_id){
        $cart_prod_id = mysqli_query($conn,"SELECT cart_product_id from cart_display where customer_id='".$customer_id."'");
        $result = $cart_prod_id->fetch_assoc();
        return $result['cart_product_id'];
    }

    public function placeOrder($conn,$customer_id){
        $order = mysqli_query($conn,"INSERT INTO order(customer_id) VALUES ('".$customer_id."')") or die(mysqli_error($conn));
        return $order;
    }


    // function runQuery($query,$conn) {
	// 	$result = mysqli_query($this->$conn,$query);
	// 	while($row=mysqli_fetch_assoc($result)) {
	// 		$resultset[] = $row;
	// 	}		
	// 	if(!empty($resultset))
	// 		return $resultset;
	// }
	
	// function numRows($query,$conn) {
	// 	$result  = mysqli_query($this->$conn,$query);
	// 	$rowcount = mysqli_num_rows($result);
	// 	return $rowcount;	
	// }

}

?>