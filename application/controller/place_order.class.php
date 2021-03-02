<?php
include 'controllerUserData.php';

class Order
{
    public function getTotalPayment($conn, $customer_id)
    {
        $load = mysqli_query($conn, "SELECT `total_value` FROM `cart` WHERE `customer_id`='$customer_id'") or die(mysqli_error($conn));
        return $load;
    }

    public function getAddress($conn, $customer_id)
    {
        $address = mysqli_query($conn, "SELECT `zip_code`,`address_line_1`,`address_line_2`,`city`,`state` FROM address WHERE customer_id='" . $customer_id . "'") or die(mysqli_error($conn));
        $result = mysqli_fetch_assoc($address);
        return $result;
    }

    public function getCartId($conn, $customer_id)
    {
        $idQry = mysqli_query($conn, "SELECT `cart_id` FROM cart WHERE customer_id='" . $customer_id . "'");
        $result = mysqli_fetch_assoc($idQry);
        return $result['cart_id'];
    }

    public function saveConfirmation($conn, $customer_id,$date, $payment_method, $total_payment, $zip_code, $address_line_1, $address_line_2, $city, $state)
    {
        $insertQr = mysqli_query($conn, "INSERT INTO `order` (`order_id`,`customer_id`,`date`,`payment_method`,`total_payment`,`zip_code`,`address_line_1`,`address_line_2`,`city`,`state`) VALUES (NULL,'".$customer_id."','".$date."' ,'".$payment_method."','".$total_payment."','".$zip_code."','".$address_line_1."','".$address_line_2."','".$city."','".$state."')");
        return $insertQr;
    }

    public function saveDelivery($conn, $order_id, $delivery_method)
    {
        $insertDelivery = mysqli_query($conn, "INSERT INTO delivery(order_id,delivery_method) VALUES('" . $order_id . "','" . $delivery_method . "')");
        return $insertDelivery;
    }

    // public function num_of_rows($conn, $order_id)
    // {
    //     $num = mysqli_query($conn, "SELECT count($order_id) FROM order_product") or die(mysqli_error($conn));
    //     $row = mysqli_fetch_array($num);
    //     return $row[0];
    // }

    public function loadItems($conn, $cart_id)
    {
        $load = mysqli_query($conn, "SELECT image, quantity FROM confirmed_order WHERE cart_id='" . $cart_id . "'") or die(mysqli_error($conn));
        return $load;
    }



    public function updateVarient($conn, $order_id)
    {
        $updateVarientQry = mysqli_query($conn, "UPDATE varient SET quantity=quantity-(int)(SELECT quantity FROM order_product WHERE order_id = '" . $order_id . "')");
    }

    public function update_order_product($conn)
    {
        $query = mysqli_query($conn, "UPDATE order_product");
    }

    public function back($conn, $cart_id)
    {
        $query = mysqli_query($conn, "UPDATE cart_product SET selected=0 WHERE cart_id = '" . $cart_id . "'");
        return $query;
    }

    public function totalset_zero($conn, $customer_id)
    {
        $query = mysqli_query($conn, "UPDATE cart SET total_value=0.00 WHERE customer_id = '" . $customer_id . "'");
        return $query;
    }

    public function get_orderID($conn, $customer_id,$date)
    {
        $orderID = mysqli_query($conn, "SELECT `order_id` FROM `order` WHERE customer_id='" . $customer_id . "' and date='" . $date . "'") or die(mysqli_error($conn));
        //$orderID = mysqli_query($conn, "SELECT max(order_id) FROM `order` WHERE customer_id='" . $customer_id . "'") or die(mysqli_error($conn));
        $result = mysqli_fetch_assoc($orderID);
        return $result['order_id'];
    }

    public function order_details($conn, $order_id,$cart_id)
    {
       // INSERT INTO `order_product` (product_id,varient_id,quantity,order_id) SELECT product_id,varient_id,quantity,27 FROM cart_product WHERE selected = 1 AND cart_id = 17;
        $query = mysqli_query($conn, "INSERT INTO `order_product` (product_id,varient_id,quantity,order_id) SELECT product_id,varient_id,quantity,$order_id FROM cart_product WHERE cart_id = '" . $cart_id . "' AND selected = 1");
        return $query;
        // $countQuery = mysqli_query($conn, "SELECT count(cart_id) FROM confirmed_order WHERE cart_id= '" . $cart_id . "'");
        // $count = mysqli_fetch_assoc($countQuery)[0];
        // while($count){

        // $query = mysqli_query($conn, "SELECT (product_id,varient_id,quantity) FROM confirmed_order WHERE cart_id= '" . $cart_id . "'");
        // $i=-1;
        // while ($row = mysqli_fetch_assoc($query)) {
        //     $i++;
        //     $output[$i]['product_id'] = $row['product_id'];
        //     $output[$i]['varient_id'] = $row['varient_id'];
        //     $output[$i]['quantity'] = $row['quantity'];
        //     $getvalues = mysqli_query($conn,"INSERT INTO order_product(order_id,product_id,varient_id,quantity) VALUES ('".$order_id."','".$output[$i]['product_id']."','". $output[$i]['varient_id']."','".$output[$i]['quantity']."')");
        //     return $getvalues;
        // }

        //$arr = mysqli_fetch_array($query);

        // $getvalues = mysqli_query($conn,"INSERT INTO order_product(order_id,product_id,varient_id,quantity) VALUES ('".$order_id."','".$product_id."','".$varient_id."','".$quantity."')");
        // return $getvalues;
    }

    // public function varient_update($conn)
    // {
    //     $query = mysqli_query($conn,"UPDATE varient varient.quantity SET quantity=varient.quentity");
    // }

    public function dltCartproduct($conn, $cart_id)
    {
        $query = mysqli_query($conn, "DELETE FROM cart_product WHERE selected=1 and cart_id='" . $cart_id . "'");
        return $query;
    }
}
?>