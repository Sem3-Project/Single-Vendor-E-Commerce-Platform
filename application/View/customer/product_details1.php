
<?php
// include '../../controller/DbConnection.class.php';
include '../../controller/product_details.class.php';

// $connector = new DbConnection();
// $conn = $connector->connect();
$funObj = new ProductDetails();
$product_id=$_SESSION['product_id'];


//echo $product_id;
$customer_id=$_SESSION['customer_id'];
$varient_1='';
$varient_2='';
//$varient_id= $_SESSION['varient_id'];

$quantity='';

$cart_id=$funObj->getCartId($con1, $customer_id);
$load = $funObj->loadProduct($con1,$product_id);

if (isset($_POST['varient_1'])){
  $varient_1=$_POST['varient_1'];
  }
if (isset($_POST['varient_2'])){
  $varient_2=$_POST['varient_2'];
  }

$result1 = mysqli_query($con1,"SELECT DISTINCT varient_1 FROM varient where product_id = $product_id");
		while($row = mysqli_fetch_array($result1)) {
    

$result2 = mysqli_query($con1,"SELECT DISTINCT varient_2 FROM varient where product_id = $product_id");
		while($row = mysqli_fetch_array($result2)) {    
    
    if(isset($_POST['search'])){
      $varient_1=$_POST['varient_1'];
      $varient_2=$_POST['varient_2'];
      if ($varient_1!='' && $varient_2!='') {
      // $product_name=$_POST['product_name'];
     
      $query="SELECT quantity,price FROM `varient` where (product_id=$product_id and varient_1='$varient_1' and varient_2='$varient_2')";
      $search_result=mysqli_query($con1,$query);
      }else{
        echo"select both varient types";
      }
      
      //header("Location:product_details.php");
      //$search_result=filter($query);
    } 
  }}

if ($varient_1!='' && $varient_2!='') {
  $varient_id=$funObj->getVarientId($con1, $product_id,$varient_1,$varient_2);
  $_SESSION['varient_id']=$varient_id;
  //echo $_SESSION['varient_id'];
}else{
  $varient_id= $_SESSION['varient_id'];
}



    //if(isset($_POST['confirm'])){
      //$varient_id=$_SESSION['varient_id'];
      //$quantity=$_POST['quantity'];
      //$insert = $funObj->addToCart($con1,$cart_id,$varient_id,$product_id,$quantity);
      //echo $_SESSION['varient_id'];
      // $productResult = $funObj->getProductByCode($con1,$varient_id);
			// $cartResult = $funObj->getCartItemByProduct($productResult[0]["id"], $member_id);
					
			// 		if (! empty($cartResult)) {
			// 			// Update cart item quantity in database
			// 			$newQuantity = $cartResult[0]["quantity"] + 1;
			// 			$shoppingCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
			// 		} else {
						//Add to cart table
           // mysqli_query($con1,"INSERT INTO cart_product(cart_id,varient_id,product_id,quantity) VALUES ('$cart_id','$varient_id','$product_id','$quantity')");
					//}
      
   
     
      
     // header("Location:product_details.php");
   // }
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../../../public/css/login.css" />
  
  <style type="text/css">
  .wrapper{
      width: 80%;
      margin: 0 auto;
      background-color: #f2f2f2;
      margin-top: 20px;
      margin-bottom: 20px;
      border-radius: 5px;
  }
  .page-header h2{
      margin-top: 0;
  }
  table tr td:last-child a{
      margin-right: 15px;
  }
  .input{
      width:50%; 
      border:2px solid #e8ebeb; 
      border-radius:5px; 
      padding:5px; 
      padding-left:10px
    
  }
  
</style>
</head>
<body>
<a href="HomeCustomer.php"><img class="login" src="../../../public/images/homeic.gif" style="width:6.5%; margin-top:13px; position: relative;"></a>

<a href="../../view/signin/logout-user.php"><img class="login" src="../../../public/images/logout.gif" style="width:7%; margin-top:13px; margin-left:25px; position: absolute;"></a>

<div class="container">
<div class="wrapper" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
	<form action="goto_cart.php" method="POST">
		<div class="form-group">
        <br><br>
        <?php
        

//if ($varient_1!='' || $varient_2!='') {
  if ($load){
      if(mysqli_num_rows($load) > 0){
          while($row = mysqli_fetch_array($load)){
              $product_name = $row ['product_name'];
              $description = $row ['description'];
              $weight = $row ['weight'];
              $dimension = $row ['dimension'];
              
      }
    }
    //header("Location:product_details.php");
  }?>
        
        <center><h2><?php echo $product_name?></h2></center>
        </div>
        <br>
        <div class='element'>
        <center><?php
      $result= mysqli_query($con1,"SELECT DISTINCT `image` FROM varient where product_id = $product_id");
      while($row = mysqli_fetch_array($result)) {
      echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" style="width:40%;
        height: 350px;"  class="img1" />'; }?>
      </center>
      
      <br>

	
		
		 </div>
	
        <div class="form-group">
        
        <table width="60%" class='table table-bordered table-striped'>
        <!--link href="../../../public/css/table1.css" rel="stylesheet" /-->
        <tr><td style="width:15%"><h5>Description</h5></td><td><?php echo $description?></td></tr>
        <tr><td><h5>Weight</h5></td><td><?php echo $weight?></td></tr>
        <tr><td><h5>Dimention</h5></td><td><?php echo $dimension?></td></tr>

        <tr><td><h5>Variant Type 1</h5></td><td><?php echo $varient_1 ?>
        <!-- <select class="form-control" id="varient_1" name="varient_1">
		  <option value="">Select Variant Type 1</option>
		    <?php
       
			?>
				<option value="<?php echo $row["varient_1"];?>" <?php if ($row["varient_1"]==$varient_1){ echo 'selected';} ?>><?php echo $row["varient_1"];?></option>
			<?php
			//}
			?>
			 </select> -->
        </td></tr>
        <tr><td><h5>Variant Type 2</h5></td><td><?php echo $varient_2 ?>
        <!-- <select class="form-control" id="varient_2" name="varient_2">
		  <option value="">Select Variant Type 2</option>
		    <?php
        
			?>
				<option value="<?php echo $row["varient_2"];?>" <?php if ($row["varient_2"]==$varient_2){ echo 'selected';} ?>><?php echo $row["varient_2"];?></option>
			<?php
			//}
			?>
			 </select> -->
        </td></tr></table>
        
        <!-- <br><center><input type="submit" class="link" name="search" style="margin-bottom: 50px; width:50%; height:40px;background-color:  rgb(236, 185, 17);" value="Check Available Quantity and Price"></center> -->
        </div>

       
        <table class='table table-bordered table-striped'>
        <tr><td style="width:15%"><h5>Available Quantity</h5></td><td>
        <?php
         
        
			while($row=mysqli_fetch_array($search_result)):?>

				<?php echo $row ['quantity'];?><?php
			
			?></td></tr>
        <tr><td><h5>Unit Price</h5></td><td>
		
        <?php echo $row ['price'];?><?php
			
			?><?php endwhile;?>
      </td></tr>
      <tr><td><h5>Quantity</h5></td><td><input type="number" class="input" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Select Quantity" required>   </td></tr>
        </table>
       <?php 
      
        ?>
                 
        
        <br>
        <br><input type="submit" name="confirm" class="btn btn-success pull-right" style="margin-right:47%; background-color:rgb(236, 185, 17); color:black; border:rgb(236, 185, 17)" value="Add to Cart">

        <!--input type="submit" class="btn btn-default" name="confirm" style="background-color:  rgb(236, 185, 17);" value="Add to Cart"></center-->
        <br><br><br><br>
        </div>

		</form>
    </div>
            </div>        
        </div>
    </div>

</body>
</html>
