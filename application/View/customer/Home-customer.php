<!-- /// -->
<?php
include '../../controller/DbConnection.class.php';
$connector = new DbConnection();
$conn = $connector->connect();
if(isset($_POST['Search'])){
	// $product_name=$_POST['product_name'];
	$category_id=$_POST['category_id'];
	$subcat_id=$_POST['subcat_id'];
	// $query="SELECT product_name,product_id FROM `product` where (product_name='$product_name' or (category_id='$category_id' and subcat_id='$subcat_id'))";
	// $query="SELECT product_name,product_id,`image` FROM `product` inner join `varient` using(product_id) where (product_name='$product_name' or (category_id='$category_id' and subcat_id='$subcat_id'))";
	$query="SELECT product_name,product_id,`image` FROM `product` inner join `varient` using(product_id) where (category_id='$category_id' and subcat_id='$subcat_id')";

	$search_result=filter($query);

}else{
	// $query="SELECT product_name,product_id from `product` where product_id<15 order by product_name";
	// $query="SELECT product_name,product_id,`image` FROM `product` inner join `varient` using(product_id)  where product_id<15 order by product_name";
	$query="CALL ProductSelection()";
	$search_result=filter($query);
}


// if(isset($_POST['Select'])){

// 	$product_id=$_POST['product_id'];

// }



function filter($query){
	// include '../controller/DbConnection.class.php';
	$connector = new DbConnection();
	$conn = $connector->connect();
	$filter_result=mysqli_query($conn,$query);
	return $filter_result;

}


// <!-- //// -->




// include '../controller/DbConnection.class.php';
// $connector = new DbConnection();
// $conn = $connector->connect();
$result = mysqli_query($conn,"SELECT * FROM category order by category_name");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <a href="#">Log in</a><br>
  <a href="#">Log out</a><br>
  <a href="#">Cart</a><br>
  <a href="#">Orders</a><br>
  <a href="#">Report</a><br>
  <a href="#">Sign up</a>

</head>
<body>
<div class="container">
	<form action="Home-customer.php" method="POST">
		<div class="form-group">
        <br><br>
        <!-- <input type="text" name="product_name" placeholder="Enter the product name"><br> -->

		  <label for="sel1">Category</label>
		  <select class="form-control" id="category" name="category_id">
		  <option value="">Select Category</option>
		    <?php
			while($row = mysqli_fetch_array($result)) {
			?>
				<option value="<?php echo $row["category_id"];?>"><?php echo $row["category_name"];?></option>
			<?php
			}
			?>
			
		  </select>
		</div>
		<div class="form-group">
		  <label for="sel1">Sub Category</label>
		  <select class="form-control" id="subcat_id" name="subcat_id">
			
		  </select>

          <input type="submit" name="Search" value="Search">
		</div>



		</form>
<!-- // -->
<form action="../../../removed_items/prduct_details.php" method="POST">
<div class='element'>
<h2>Product List</h1>
		<?php
			while($row=mysqli_fetch_array($search_result)):?>

				<!-- /// image part-->
		<?php
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"  width="150" height="150" />';
		
		?>
<!-- //// -->


			<button name="Select" type="submit" value="<?php echo $row["product_id"];?>"><?php
				echo $row['product_name'];
				
			?></button><br><br>
		

		<?php endwhile;?>
		
		</div></form>

<!-- /// -->
	<!-- </form> -->
</div>
<script>
$(document).ready(function() {
	$('#category').on('change', function() {
			var category_id = this.value;
			$.ajax({
				url: "../get_subcat.php",
				type: "POST",
				data: {
					category_id: category_id
				},
				cache: false,
				success: function(dataResult){
					$("#subcat_id").html(dataResult);
				}
			});
		
		
	});
});
</script>
</body>
</html>
