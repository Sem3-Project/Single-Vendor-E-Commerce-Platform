<?php
include 'database.php';
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
  <a href="#">Sign up</a>

</head>
<body>
<div class="container">
	<form>
		<div class="form-group">
        <br><br>
        <input type="text" name="product_name" placeholder="Enter the product name"><br>

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
		  <select class="form-control" id="sub_category" name="subcat_id">
			
		  </select>

          <input type="submit" name="Search" value="Search">
		</div>
	</form>
</div>
<script>
$(document).ready(function() {
	$('#category').on('change', function() {
			var category_id = this.value;
			$.ajax({
				url: "get_subcat.php",
				type: "POST",
				data: {
					category_id: category_id
				},
				cache: false,
				success: function(dataResult){
					$("#sub_category").html(dataResult);
				}
			});
		
		
	});
});
</script>
</body>
</html>
