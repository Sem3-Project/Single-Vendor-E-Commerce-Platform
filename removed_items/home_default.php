<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Default Home page</title>

    <a href="#">Log in</a><br>
  <a href="#">Sign up</a>

</head>
<body>
<form method="POST" action="../model/Home.php">
<div class="header">
<input type="text" name="product" placeholder="Enter the product name"><br>


<?php
include '../controller/Home.class.php';
$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new Home();
$data=$funObj->category($conn);

echo "<select name=category id='category_id' class='form-control'>";
while($row=$data->fetch_assoc()){
    echo "<option value=$row[category_id]>$row[category_name]</option>";
}
echo"</select>";

$data2=$funObj->subcategory($conn);
echo "<select name=subcategory id='subcat_id' class='form-control2'>";
while($row=$data2->fetch_assoc()){
    echo "<option value=$row[subcat_id]>$row[subcat_name]</option>";
}
echo"</select>";

?>

<input type="submit" name="Search" value="Search">

</div>
</form>  
</body>
</html>