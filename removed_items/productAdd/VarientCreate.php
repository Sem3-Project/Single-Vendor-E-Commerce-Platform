<?php 
// Include the database configuration file  
require_once 'addProduct.php'; 
// if(isset($_POST["product_id"]) && !empty($_POST["product_id"])){
//     // Get hidden input value
//     $product_id = $_POST["product_id"];
// }
// if(isset($_GET["product_id"]) && !empty(trim($_GET["product_id"]))){
//     // Get URL parameter
//     $product_id =  trim($_GET["product_id"]);
// }
// If file upload form is submitted 
// $status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $product_id=$_POST['product_id'];
    $SKU=$_POST['SKU'];
    $price=$_POST['price'];
    $varient_1=$_POST['varient_1'];
    $varient_2=$_POST['varient_2'];
    $quantity=$_POST['quantity'];
    $imgContent=""; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif');
        
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); }
         
            // Insert image content into database 
            // $insert = mysqli_query("INSERT into image (product_id,SKU,price,image, varient_1,varient_2,quantity) 
            // VALUES ('$product_id','$SKU','$price','$imgContent','$varient_1','$varient_2','$quantity' )");
            $insert = $link->query("INSERT into varient (product_id, SKU, price, image, varient_1, varient_2, quantity) 
            VALUES ('$product_id','$SKU','$price','$imgContent','$varient_1','$varient_2','$quantity')");
        // echo "done"; 
    }}
             
            
         
 
// Display status message 
 
?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create varient</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
<h2>Create Record</h2>
<p>Please fill this form and submit to add varient record to the database.</p>
<form action="VarientCreate.php" method="post" enctype="multipart/form-data">

    <label>Enter product id:</label>
    <input type="int" name="product_id"><br><br>

    <label>Enter SKU:</label>
    <input type="text" name="SKU"><br><br>

    <label>Enter price:</label>
    <input type="text" name="price"><br><br>

    <label>Select Image File:</label>
    <input type="file" name="image"><br><br>

    <label>Enter varient 1:</label>
    <input type="text" name="varient_1"><br><br>
    
    <label>Enter varient 2:</label>
    <input type="text" name="varient_2"><br><br>

    <label>Enter quantity:</label>
    <input type="int" name="quantity"><br><br>

    
    <input type="submit" name="submit" value="Upload">
    <a href="index.php" class="btn btn-default">Cancel</a>
</form>
    
</body>
</html>