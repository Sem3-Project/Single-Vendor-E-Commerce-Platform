<?php
// include '../../controller/DbConnection.class.php';
include '../../controller/product_details.class.php';

$connector = new DbConnection();
$conn = $connector->connect();

$customer_id=$_SESSION['customer_id'];
$product_id=$_SESSION['product_id'];
$varient_id= $_SESSION['varient_id'];


$funObj = new ProductDetails();
$cart_id=$funObj->getCartId($con1, $customer_id);
$load = $funObj->loadProduct($con1,$product_id);
if ($load){
    if(mysqli_num_rows($load) > 0){
        while($row = mysqli_fetch_array($load)){
            $product_name = $row ['product_name'];
            //echo $product_name;

        }}}

        if(isset($_POST['confirm'])){
            //$varient_id=$_SESSION['varient_id'];
            $quantity=$_POST['quantity'];
            //$cartResult='';
            $q="SELECT COUNT(varient_id) FROM cart_product WHERE varient_id='$varient_id'";
            $r=mysqli_query($con1,$q);
            $row=mysqli_fetch_row($r);
            if($row[0] >= 1) {
           
            $cartResult = $funObj->getCartItemByProduct($con1,$varient_id);
           // $result=mysqli_fetch_assoc($cartResult);

            //echo $cartResult;
            $newQuantity = (int)$cartResult + $quantity;
            mysqli_query($con1,"UPDATE cart_product SET quantity='$newQuantity' WHERE varient_id = '" . $varient_id . "'");
            }
            else{
					//$shoppingCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
					
            mysqli_query($con1,"INSERT INTO cart_product(cart_id,varient_id,product_id,quantity) VALUES ('$cart_id','$varient_id','$product_id','$quantity')");
        }
    }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Added to Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../../../../public/css/login2.css" />
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
            background-color: white;
            margin-top: 50px;
            margin-bottom: 20px;
            border-left: 1px solid rgb(236, 185, 17);
            border-right: 1px solid rgb(236, 185, 17);
        }
    </style>
</head>
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                       
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in" style="background-color:#e8ebeb; color:black; border:1px solid #e8ebeb">

                            
                            <p> <h4><?php echo $product_name?> has been successfully added to your cart.</h4></p><br>
                            
                            <p>
                            <a href="cart.php" class="btn btn-default" style="background-color:rgb(236, 185, 17); color:black; border:rgb(236, 185, 17)">View Cart</a>
                                <a href="HomeCustomer.php" class="btn btn-default">Continue Shopping</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
