<?php
include '../controller/DbConnection.class.php';
$connector = new DbConnection();
$conn = $connector->connect();
if(isset($_POST['Search'])){
	$product_name=$_POST['product_name'];
	$category_id=$_POST['category_id'];
	$subcat_id=$_POST['subcat_id'];
	$query="SELECT product_name,product_id FROM `product` where (product_name='$product_name' or (category_id='$category_id' and subcat_id='$subcat_id'))";
	$search_result=filter($query);

}else{
	$query="SELECT product_name,product_id from `product` where product_id<15 order by product_name";
	$search_result=filter($query);
}

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