<?php
// include '../controller/DbConnection.class.php';
// $connector = new DbConnection();
// $conn = $connector->connect();
$conn=mysqli_connect("localhost","customer","1234","singlevendor");
if(isset($_POST['Search'])){
	// $product_name=$_POST['product_name'];
	$category_id=$_POST['category_id'];
	$subcat_id=$_POST['subcat_id'];
	$query="SELECT product_name,product_id,`image`,price FROM `product` inner join `varient` using(product_id) where (category_id='$category_id' and subcat_id='$subcat_id')";
	$prod_id = mysqli_fetch_array($query);  
	$product_id = $prod_id['product_id'];
	$_SESSION['product_id'] = $product_id;
	$search_result=filter($query);

}else{
	$query="CALL ProductSelection()";
	$search_result=filter($query);
}



function filter($query){
	$conn=mysqli_connect("localhost","customer","1234","singlevendor");
	// $connector = new DbConnection();
	// $conn = $connector->connect();
	$filter_result=mysqli_query($conn,$query);
	return $filter_result;

}

$result = mysqli_query($conn,"SELECT * FROM category order by category_name");
// include '../View/customer/Home-customer.php';
?>