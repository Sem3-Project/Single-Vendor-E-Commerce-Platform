<?php
// Include config file
require_once "config.php";
 
// `product_id`,`product_name`,`description`,`weight`,`dimension`,`sku`,`price`,`varient_1`,`varient_2`,`quantity` 
// Define variables and initialize with empty values
$product_name = $description = $weight =$dimension= $sku= $price= $varient_1=$varient_2=$quantity = "";
$product_name_err = $description_err = $weight_err = $dimension_err = $sku_err= $price_err= $varient_1_err=$varient_2_err=$quantity_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_product_name = trim($_POST["product_name"]);
    if(empty($input_product_name)){
        $procuct_name_err = "Please enter a product name.";
    } elseif(!filter_var($input_product_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $product_name_err = "Please enter a valid name.";
    } else{
        $product_name = $input_product_name;
    }
    
    // Validate description
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Please enter description.";     
    } else{
        $description = $input_description;
    }


    $input_weight = trim($_POST["weight"]);
    if(empty($input_weight)){
        $weight_err = "Please enter weight";     
    } else{
        $weight = $input_weight;
    }


    $input_dimension = trim($_POST["dimension"]);
    if(empty($input_dimension)){
        $weight_err = "Please enter dimension";     
    } else{
        $dimension = $input_dimension;
    }

    $input_sku = trim($_POST["sku"]);
    if(empty($input_sku)){
        $sku_err = "Please enter sku";     
    } else{
        $sku = $input_sku;
    }


    $input_price= trim($_POST["price"]);
    if(empty($input_price)){
        $price_err = "Please enter dimension";     
    } else{
        $price = $input_price;
    }


    $input_varient_1= trim($_POST["varient_1"]);
    if(empty($input_varient_1)){
        $varient_1_err = "Please enter varient_1";     
    } else{
        $varient_1 = $input_varient_1;
    }

    $input_varient_2= trim($_POST["varient_2"]);
    if(empty($input_varient_2)){
        $varient_2_err = "Please enter varient_2";     
    } else{
        $varient_2 = $input_varient_2;
    }


    $input_quantity= trim($_POST["quantity"]);
    if(empty($input_quantity)){
        $quantity_err = "Please enter dimension";     
    } else{
        $quantity = $input_quantity;
    }
    
    // Validate salary
    // $input_salary = trim($_POST["salary"]);
    // if(empty($input_salary)){
    //     $salary_err = "Please enter the salary amount.";     
    // } elseif(!ctype_digit($input_salary)){
    //     $salary_err = "Please enter a positive integer value.";
    // } else{
    //     $salary = $input_salary;
    // }
    // $procuct_name_err = $description_err = $weight_err = $dimension_err = $sku_err= $price_err= $varient_1_err=$varient_2_err=$quantity_err
    // Check input errors before inserting in database
    if(empty($product_name_err) && empty($description_err) && empty($weight_err)&&empty($dimension_err) && empty($sku_err) && empty($price_err)&&empty($varient_1_err) && empty($varient_2_err) && empty($quantity_err)){
        // Prepare an insert statement
        // $sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";
        $sql="INSERT INTO (product inner join varient using (product_id))(`product_name`,`description`,`weight`,`dimension`,`sku`,`price`,`varient_1`,`varient_2`,`quantity`) 
        VALUES ('$product_name','$description','$weight','$dimension','$sku','$price','$varient_1','$varient_2','$quantity')";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_product_name, $param_description, $param_weight, $param_dimension, $param_sku, $param_price
        ,$param_varient_1, $param_varient_2, $param_quantity);
            
            // Set parameters
            $param_product_name = $product_name;
            $param_description = $description;
            $param_weight = $weight;

            $param_dimension = $dimension;
            $param_sku = $sku;
            $param_price = $price;

            $param_varient_1 = $varient_1;
            $param_varient_2 = $varient_2;
            $param_quantity = $quantity;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
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
                    <p>Please fill this form and submit to add product record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <!-- $product_name = $description = $weight =$dimension= $sku= $price= $varient_1=$varient_2=$quantity = "";
                        $product_name_err = $description_err = $weight_err = $dimension_err = $sku_err= $price_err= $varient_1_err=$varient_2_err=$quantity_err = ""; -->
 

                        <div class="form-group <?php echo (!empty($product_name_err)) ? 'has-error' : ''; ?>">
                            <label>Product Name</label>
                            <input type="text" name="product_name" class="form-control" value="<?php echo $product_name; ?>">
                            <span class="help-block"><?php echo $product_name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                            <label>Description</label>
                            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                            <span class="help-block"><?php echo $description_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($weight_err)) ? 'has-error' : ''; ?>">
                            <label>weight</label>
                            <input type="text" name="weight" class="form-control" value="<?php echo $weight; ?>">
                            <span class="help-block"><?php echo $weight_err;?></span>
                        </div>


                         <!-- $product_name = $description = $weight =$dimension= $sku= $price= $varient_1=$varient_2=$quantity = "";
                        $product_name_err = $description_err = $weight_err = $dimension_err = $sku_err= $price_err= $varient_1_err=$varient_2_err=$quantity_err = ""; -->
 

                        <div class="form-group <?php echo (!empty($dimension_err)) ? 'has-error' : ''; ?>">
                            <label>dimension</label>
                            <input type="text" name="dimension" class="form-control" value="<?php echo $dimension; ?>">
                            <span class="help-block"><?php echo $dimension_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($sku_err)) ? 'has-error' : ''; ?>">
                            <label>sku</label>
                            <input type="text" name="sku" class="form-control" value="<?php echo $sku; ?>">
                            <span class="help-block"><?php echo $sku_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>

                        <!-- $product_name = $description = $weight =$dimension= $sku= $price= $varient_1=$varient_2=$quantity = "";
                        $product_name_err = $description_err = $weight_err = $dimension_err = $sku_err= $price_err= $varient_1_err=$varient_2_err=$quantity_err = ""; -->
 

                        <div class="form-group <?php echo (!empty($varient_1_err)) ? 'has-error' : ''; ?>">
                            <label>varient 1</label>
                            <input type="text" name="varient_1" class="form-control" value="<?php echo $varient_1; ?>">
                            <span class="help-block"><?php echo $varient_1_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($varient_2_err)) ? 'has-error' : ''; ?>">
                            <label>varient 2</label>
                            <input type="text" name="varient_2" class="form-control" value="<?php echo $varient_2; ?>">
                            <span class="help-block"><?php echo $varient_2_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($quantity_err)) ? 'has-error' : ''; ?>">
                            <label>quantity</label>
                            <input type="text" name="quantity" class="form-control" value="<?php echo $quantity; ?>">
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