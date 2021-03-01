<?php

include 'controllerUserData.php';

class DisplayCart{
    // function __construct() {  
          
    //     // make the connection with database  
    //     $connector = new DbConnection();
    //     $conn = $connector->connect1();  
    // }  
    function __destruct() {  
          
    } //$search_query="SELECT * FROM `product` NATURAL INNER JOIN `category` WHERE product_name='$info[0]'";

    public function createCart($conn,$customer_id){  

        $cart= mysqli_query($conn,"SELECT * FROM cart_display where customer_id='".$customer_id."'") or die(mysqli_error($conn));  
        return $cart;      
    } 

    public function removeItem($conn,$cart_product_id){
        $remove = mysqli_query($conn,"DELETE FROM cart_product WHERE cart_product_id='$cart_product_id") or die(mysqli_error($conn));
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

    public function getMaxVarientQty ($conn,$customer_id){
        $cart_prod_id = mysqli_query($conn,"SELECT cart_product_id from cart_display where customer_id='".$customer_id."'");
        $result = $cart_prod_id->fetch_assoc();
        $id =  $result['cart_product_id'];       
        $varientID_qry = mysqli_query($conn, "SELECT varient_id FROM cart_product WHERE cart_product_id=$id");
        $result2 = $varientID_qry->fetch_assoc();
        $varient_id = $result2['varient_id'];
        $get_qty = mysqli_query($conn, "SELECT quantity FROM varient WHERE varient_id=$varient_id");
        $result3 = $get_qty->fetch_assoc();
        return $result3['quantity'];
        //$varient = mysqli_query($conn,"SELECT cart_product_id FROM cart_display WHERE customer_id='".$customer_id."' ORDER BY cart_product_id");
       // $qty_array = [];
      
        // while ($row = mysqli_fetch_array($varient)) {
        //     $select_qty = mysqli_query($conn,"SELECT quantity FROM varient NATURAL JOIN cart_product ON $row ORDER BY cart_product_id");
        //     array_push($qty_array,$select_qty);
        // }
             
        // $varient_id_from_cart_prod = mysqli_query($conn,"SELECT varient_id FROM cart_product WHERE cart_product_id='$varient_result'");
        // $cart_prod_res = $varient_id_from_cart_prod->fetch_assoc();
        //$qty = $select_qty->fetch_assoc();
  
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
