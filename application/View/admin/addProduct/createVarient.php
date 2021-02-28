<!-- using mysql_connect in this page -->
<?php
// Include config file
require_once "addProduct.php";
 
// Define variables and initialize with empty values

//`varient_id`, `product_id`, `SKU`, `price`, `image`, `varient_1`, `varient_2`, `quantity`
$product_id = $SKU = $price = $image = $varient_1 = $varient_2 =$quantity= "";
$product_id_err = $SKU_err = $price_err = $image_err = $varient_1_err = $varient_2_err=$quantity_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_product_id = trim($_POST["product_id"]);
    if(empty($input_product_id)){
        $product_id_err = "Please enter a product_id.";
    } 
    // elseif(!filter_var($input_product_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    //     $product_name_err = "Please enter a valid product name.";
    // }
     else{
        $product_id = $input_product_id;
    }
    
    // Validate address
    $input_SKU = trim($_POST["SKU"]);

    //this one can be replace with following if clause
    // $SKU = $input_SKU;
    if(empty($input_SKU)){
        $SKU_err = "Please enter an SKU.";     
    } else{
        $SKU = $input_SKU;
    }
    
    // Validate salary
    $input_price = trim($_POST["price"]);
    // $price = $input_price;
    if(empty($input_price)){
        $price_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_price)){
        $price_err = "Please enter a positive integer value.";
    } else{
        $price = $input_price;
    }


    $input_image = trim($_POST["image"]);
    if(empty($input_image)){
        $image_err = "Please enter the image ";     
    }  else{
        $image = $input_image;
    }

    // if(getimagesize($_FILES['image']['tmp_name'])==false){
    //     $image_err = "Please enter the image "; 
    // }else{

    // }


    $input_varient_1 = trim($_POST["varient_1"]);
    // $varient_1 = $input_varient_1;
    if(empty($input_varient_1)){
        $varient_1_err = "Please enter the varient_1 ";     
    }  else{
        $varient_1 = $input_varient_1;
    }

    $input_varient_2 = trim($_POST["varient_2"]);
    // $varient_1 = $input_varient_1;
    if(empty($input_varient_2)){
        $varient_2_err = "Please enter the varient_2 ";     
    }  else{
        $varient_2 = $input_varient_2;
    }

    $input_quantity = trim($_POST["quantity"]);
    // $quantity = $input_quantity;
    if(empty($input_quantity)){
        $quantity_err = "Please enter the quantity ";     
    }  else{
        $quantity = $input_quantity;
    }

    //$product_name_err = $SKU_err = $price_err = $image_err = $varient_1_err = $quantity_err
    
    // Check input errors before inserting in database
    // if(empty($product_name_err)){
        // Prepare an insert statement

        if(empty($product_id_err) && empty($SKU_err) && empty($price_err)&&
    empty($image_err) && empty($varient_1_err) && empty($quantity_err)){
        $sql = "INSERT INTO varient (product_id,SKU, price, image, varient_1, varient_2, quantity) VALUES (?, ?, ?,?,?,?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "issbssi", $param_product_id, $param_SKU, $param_price,
            $param_image, $param_varient_1,$param_varient_2, $param_quantity);
            
            // Set parameters
            $param_product_id= $product_id;
            $param_SKU = $SKU;
            $param_price = $price;

            $param_image= $image;
            $param_varient_1 = $varient_1;
            $param_varient_2 = $varient_2;
            $param_quantity= $quantity;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: indexVarient.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add Varient record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/from-data" method="post">


                    <!-- $product_name_err = $SKU_err = $price_err = $image_err = $varient_1_err = $quantity_err -->
                    <!-- $product_name = $SKU = $price = $image = $varient_1 = $quantity = ""; -->
                        <div class="form-group <?php echo (!empty($product_name_err)) ? 'has-error' : ''; ?>">
                            <label>product id</label>
                            <input type="int" name="product_id" class="form-control" value="<?php echo $product_id; ?>">
                            <span class="help-block"><?php echo $product_id_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($SKU_err)) ? 'has-error' : ''; ?>">
                            <label>sku</label>
                            <input type="text" name="SKU" class="form-control" value="<?php echo $SKU; ?>">
                            <span class="help-block"><?php echo $SKU_err;?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>

                        

                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>image</label>
                            <input type="file" name="image">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($varient_1_err)) ? 'has-error' : ''; ?>">
                            <label>varient_1</label>
                            <input type="text" name="varient_1" class="form-control" value="<?php echo $varient_1; ?>">
                            <span class="help-block"><?php echo $varient_1_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($varient_2_err)) ? 'has-error' : ''; ?>">
                            <label>varient_2</label>
                            <input type="text" name="varient_2" class="form-control" value="<?php echo $varient_2; ?>">
                            <span class="help-block"><?php echo $varient_2_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($quantity_err)) ? 'has-error' : ''; ?>">
                            <label>quantity</label>
                            <input type="int" name="quantity" class="form-control" value="<?php echo $quantity; ?>">
                            <span class="help-block"><?php echo $quantity_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>




</body>
</html>