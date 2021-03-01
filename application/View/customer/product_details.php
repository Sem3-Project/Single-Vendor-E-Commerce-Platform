
<?php
// include '../../controller/DbConnection.class.php';
include '../../controller/product_details.class.php';

$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new ProductDetails();
$product_id="";
$product_id=$_POST['Select'];

$load = $funObj->loadProduct($conn,$product_id);           // need to change

if ($load){
    if(mysqli_num_rows($load) > 0){
        while($row = mysqli_fetch_array($load)){
            $product_name = $row ['product_name'];
            $description = $row ['description'];
            $weight = $row ['weight'];
            $dimension = $row ['dimension'];
            
		}
	}
}

//$result1 = mysqli_query($conn,"SELECT DISTINCT varient_1 FROM varient where product_id = 8");        //need to change
 $result = mysqli_query($conn,"SELECT DISTINCT varient_1 FROM varient where product_id = '".$product_id."'");

//$result2 = mysqli_query($conn,"SELECT DISTINCT varient_2 FROM varient where product_id = 8");        //need to change
$result = mysqli_query($conn,"SELECT DISTINCT varient_1 FROM varient where product_id = '".$product_id."'");

//$result = mysqli_query($conn,"SELECT price,`image`,quantity FROM varient where product_id = 8");


if(isset($_POST['Search'])){
	// $product_name=$_POST['product_name'];
	$varient_1=$_POST['varient_1'];
	$varient_2=$_POST['varient_2'];
	
	$query="SELECT quantity,price FROM `varient` where (product_id=$customer_id and varient_1=$varient_1 and varient_2=$varient_2)";
  $search_result=mysqli_query($conn,$query);

  $search_result=filter($query);
}
else{
	$query="CALL Selection()";
	$search_result=filter($query);
}


function filter($query){
	// include '../controller/DbConnection.class.php';
	$connector = new DbConnection();
	$conn = $connector->connect();
	$filter_result=mysqli_query($conn,$query);
	return $filter_result;

}

// include '../controller/DbConnection.class.php';
// $connector = new DbConnection();
// $conn = $connector->connect();
// $result = mysqli_query($conn,"SELECT * FROM product order by product_id");
//include '../view/customer/product_details.php';
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
	<form action="product_details.php" method="POST">
		<div class="form-group">
        <br><br>
        
        <h2><?php echo $product_name?></h2>
        </div>
        <div class='element'>
      
   

	
		
		</div>
	
        <div class="form-group">
        <table width="60%">
        <link href="../../../public/css/table1.css" rel="stylesheet" />
        <tr><td><h5>Description</h5></td><td><?php echo $description?></td></tr>
        <tr><td><h5>Weight</h5></td><td><?php echo $weight?></td></tr>
        <tr><td><h5>Dimention</h5></td><td><?php echo $dimension?></td></tr>

        <tr><td><h5>Variant Type 1</h5></td><td>
        <select class="form-control" id="varient" name="varient_1">
		  <option value="">Select Variant Type 1</option>
		    <?php
			while($row = mysqli_fetch_array($result1)) {
			?>
				<option value="<?php echo $row["varient_id"];?>"><?php echo $row["varient_1"];?></option>
			<?php
			}
			?>
			 </select>
        </td></tr>
        <tr><td><h5>Variant Type 2</h5></td><td>
        <select class="form-control" id="varient" name="varient_2">
		  <option value="">Select Variant Type 2</option>
		    <?php
			while($row = mysqli_fetch_array($result2)) {
			?>
				<option value="<?php echo $row["varient_id"];?>"><?php echo $row["varient_2"];?></option>
			<?php
			}
			?>
			 </select>
        </td></tr></table>
        
        <br><center><input type="submit" class="link" name="update" style="margin-bottom: 50px; width:50%; height:40px;background-color:  rgb(236, 185, 17);" value="Check Available Quantity and Price"></center>
        </div>

</form>
        
        <form action="cart.view.php" method="POST">
        <div class='element'>
        <table>
        <tr><td><h5>Available Quantity</h5></td><td>
        <?php
			while($row=mysqli_fetch_array($search_result)):?>

				<?php echo $row ['quantity'];?><?php
			
			?><?php endwhile;?></td></tr>
        <tr><td><h5>Unit Price</h5></td><td>
        <?php
			while($row=mysqli_fetch_array($search_result)):?>

				<!-- /// image part-->
		
        <?php echo $row ['price'];?><?php
			
			?><?php endwhile;?>
      </td></tr>
      <tr><td><h5>Quantity</h5></td><td><input type="number" name="Select Quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Select Quantity" required>   </td></tr>
        </table>
        <input type="hidden" name="product_id" value="<?=$product['product_id']?>">
        <input type="hidden" name="varient_id" value="<?=$product['varient_id']?>">
       
           
           
        
        <br><center><input type="submit" class="link" name="update" style="margin-bottom: 50px; width:50%; height:40px;background-color:  rgb(236, 185, 17);" value="Add to Cart"></center>
        
        </div>

		</form>


</body>
</html>
