<?php 
// Include the database configuration file  
require_once 'addProduct.php'; 
// if(isset($_POST["product_id"]) && !empty($_POST["product_id"])){
//     // Get hidden input value
//     $product_id = $_POST["product_id"];
// }
if(isset($_GET["product_id"]) && !empty(trim($_GET["product_id"]))){
    // Get URL parameter
    $product_id =  trim($_GET["product_id"]);
}
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
            // $insert = $link->query("INSERT into varient (product_id, SKU, price, image, varient_1, varient_2, quantity) 
            // VALUES ('$product_id','$SKU','$price','$imgContent','$varient_1','$varient_2','$quantity') where $product_id=?");
            
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
    <title>Create Varient</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../../../../public/css/login.css" />

    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
            background-color: white;
            margin-top: 30px;
            margin-bottom: 20px;
            border-left: 1px solid rgb(236, 185, 17);
            border-right: 1px solid rgb(236, 185, 17);
        }
        .input{
            width:100%; 
            border:2px solid #e8ebeb; 
            border-radius:5px; 
            padding:5px; 
            padding-left:10px
           
        }
    </style>
</head>
<body>
    <a href="../Homeadmin.php"><img class="login" src="../../../../public/images/homeic.gif" style="width:6.5%; margin-top:13px;  position: relative;"></a>

    <a href="../../../view/logout-user.php"><img class="login" src="../../../../public/images/logout.gif" style="width:7%; margin-top:13px;margin-left:25px; position: absolute;"></a>
    
    <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h2>Create Record</h2>
                        </div>
                        <p>Please fill this form and submit to add varients.</p>
                        <form action="VarientCreate.php" method="post" enctype="multipart/form-data">

                            <label>Enter product id:</label><br>
                            <input type="int" name="product_id" class="input" value=<?php echo $product_id;?>><br><br>
                        
                            <label>Enter SKU:</label><br>
                            <input type="text" name="SKU" class="input" required><br><br>

                            <label>Enter price:</label><br>
                            <input type="number" name="price" class="input" step=0.01 required><br><br>

                            <label>Select image file:</label>
                            <input type="file" name="image" required><br>

                            <label>Enter characteristic 1:</label><br>
                            <input type="text" name="varient_1" class="input" required><br><br>
                            
                            <label>Enter characteristic 2:</label><br>
                            <input type="text" name="varient_2" class="input"><br><br>

                            <label>Enter quantity:</label><br>
                            <input type="number" name="quantity" class="input" step=1 required><br><br>

                            
                            <input type="submit" name="submit" class="btn btn-default" style="background-color:rgb(236, 185, 17); color:black; border:rgb(236, 185, 17)" value="Upload">
                            <a href="index.php" class="btn btn-default">Cancel</a>
                        </form>
                        <br>
                    </div>
                </div>        
            </div>
        </div>


        <br><br><br>
    </body>
</html>