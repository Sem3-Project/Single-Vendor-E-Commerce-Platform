
<?php
// include '../../controller/DbConnection.class.php';
include '../../controller/product_details.class.php';

$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new ProductDetails();
$product_id=$_SESSION['product_id'];


//echo $product_id;
$customer_id=$_SESSION['customer_id'];
$varient_1='';
$varient_2='';
//$varient_id= $_SESSION['varient_id'];

$quantity='';

$cart_id=$funObj->getCartId($conn, $customer_id);
$load = $funObj->loadProduct($conn,$product_id);

if (isset($_POST['varient_1'])){
  $varient_1=$_POST['varient_1'];
  }
if (isset($_POST['varient_2'])){
  $varient_2=$_POST['varient_2'];
  }

$result1 = mysqli_query($conn,"SELECT DISTINCT varient_1 FROM varient where product_id = $product_id");
		while($row = mysqli_fetch_array($result1)) {
    

$result2 = mysqli_query($conn,"SELECT DISTINCT varient_2 FROM varient where product_id = $product_id");
		while($row = mysqli_fetch_array($result2)) {    
    
    if(isset($_POST['search'])){
      // $product_name=$_POST['product_name'];
      $varient_1=$_POST['varient_1'];
      $varient_2=$_POST['varient_2'];
      
      
      
      
      $query="SELECT quantity,price FROM `varient` where (product_id=$product_id and varient_1='$varient_1' and varient_2='$varient_2')";
      $search_result=mysqli_query($conn,$query);
      
      //header("Location:product_details.php");
      //$search_result=filter($query);
    } 


if ($varient_1!='' || $varient_2!='') {
  $varient_id=$funObj->getVarientId($conn, $product_id,$varient_1,$varient_2);
  $_SESSION['varient_id']=$varient_id;
  //echo $_SESSION['varient_id'];
}else{
  $varient_id= $_SESSION['varient_id'];
}



    if(isset($_POST['confirm'])){
     // $varient_id=$_SESSION['varient_id'];
      //$quantity=$_POST['quantity'];
     
      mysqli_query($conn,"INSERT INTO cart_product(cart_id,varient_id,product_id,quantity) VALUES ('$cart_id','$varient_id','$product_id',".$_POST['quantity'].")");
     // header("Location:product_details.php");
    }
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>  
   <link rel="stylesheet" href="../../../public/css/login2.css" /> 

  
</head>
<body>
<div class="container">

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
        
        <h2><?php echo $product_name?></h2>
        </div>
        <div class='element'>
        <?php
      $result= mysqli_query($con1,"SELECT DISTINCT `image` FROM varient where product_id = $product_id");
      while($row = mysqli_fetch_array($result)) {
      echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" style="width:40%;
        height: 350px;"  class="img1" />'; }?>

      
   

	
		
		 </div>
	
        <div class="form-group">
        
        <table width="60%">
        <link href="../../../public/css/table1.css" rel="stylesheet" />
        <tr><td><h5>Description</h5></td><td><?php echo $description?></td></tr>
        <tr><td><h5>Weight</h5></td><td><?php echo $weight?></td></tr>
        <tr><td><h5>Dimention</h5></td><td><?php echo $dimension?></td></tr>

        <tr><td><h5>Variant Type 1</h5></td><td><?php echo $varient_1 ?>
        <!-- <select class="form-control" id="varient_1" name="varient_1">
		  <option value="">Select Variant Type 1</option>
		    <?php
       
			?>
				<option value="<?php echo $row["varient_1"];?>" <?php if ($row["varient_1"]==$varient_1){ echo 'selected';} ?>><?php echo $row["varient_1"];?></option>
			<?php
			}
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
			}
			?>
			 </select> -->
        </td></tr></table>
        
        <!-- <br><center><input type="submit" class="link" name="search" style="margin-bottom: 50px; width:50%; height:40px;background-color:  rgb(236, 185, 17);" value="Check Available Quantity and Price"></center> -->
        </div>

       
        <table>
        <tr><td><h5>Available Quantity</h5></td><td>
        <?php
         
        
			while($row=mysqli_fetch_array($search_result)):?>

				<?php echo $row ['quantity'];?><?php
			
			?></td></tr>
        <tr><td><h5>Unit Price</h5></td><td>
		
        <?php echo $row ['price'];?><?php
			
			?><?php endwhile;?>
      </td></tr>
      <tr><td><h5>Quantity</h5></td><td><input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Select Quantity" required>   </td></tr>
        </table>
       <?php 
      
        ?>
                 
        
        <br><center><a href="HomeCustomer.php" class="btn btn-default" style="background-color:rgb(236, 185, 17); color:black; border:rgb(236, 185, 17)">Back to Home</a>&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-default" name="confirm" style="background-color:  rgb(236, 185, 17);" value="Add to Cart"></center>
        <br><br>
        </div>

		</form>


</body>
</html>
