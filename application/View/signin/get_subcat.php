<?php
	include '../../controller/DbConnection.class.php';
	$connector = new DbConnection();
	$conn = $connector->connect();
	$category_id=$_POST["category_id"];
	$result = mysqli_query($conn,"SELECT * FROM subcategory where category_id=$category_id order by subcat_name");
?>
<option value="">Select SubCategory</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
	<option value="<?php echo $row["subcat_id"];?>"><?php echo $row["subcat_name"];?></option>
<?php
}
?>