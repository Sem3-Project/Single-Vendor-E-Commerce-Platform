<!-- using mysql_connect in this page -->
<?php
// Include config file
require_once "addProduct.php";
 
// Define variables and initialize with empty values
$product_id = $SKU = $price = $image = $varient_1 = $varient_2= $quantity = "";
$product_id_err = $SKU_err = $price_err = $image_err = $varient_1_err = $varient_2_err= $quantity_err ="";
 
// Processing form data when form is submitted
if(isset($_POST["varient_id"]) && !empty($_POST["varient_id"])){
    // Get hidden input value
    $product_id = $_POST["varient_id"];
    
    // Validate name
    $input_product_id= trim($_POST["product_id"]);
    if(empty($input_product_id)){
        $product_id_err = "Please enter a product_id.";
    } 
    // elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    //     $name_err = "Please enter a valid name.";
    // } 
    else{
        $product_id = $input_product_id;
    }
    
    // Validate address address
    // $input_address = trim($_POST["address"]);
    // if(empty($input_address)){
    //     $address_err = "Please enter an address.";     
    // } else{
    //     $address = $input_address;
    // }
    
    // // Validate salary
    // $input_salary = trim($_POST["salary"]);
    // if(empty($input_salary)){
    //     $salary_err = "Please enter the salary amount.";     
    // } elseif(!ctype_digit($input_salary)){
    //     $salary_err = "Please enter a positive integer value.";
    // } else{
    //     $salary = $input_salary;
    // }

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
    } else{
        $price = $input_price;
    }


    $input_image = "";
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif');
        
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $input_image = addslashes(file_get_contents($image)); }}

    // $input_image = trim($_POST["image"]);
    // // $image = $input_image;
    // if(empty($input_image)){
    //     // $image_err = "Please enter the image ";     
    // }  else{
    //     $image = $input_image;
    // }

    $input_varient_1 = trim($_POST["varient_1"]);
    // $varient_1 = $input_varient_1;
    if(empty($input_varient_1)){
        // $varient_1_err = "Please enter the varient_1 ";     
    }  else{
        $varient_1 = $input_varient_1;
    }

    $input_varient_2 = trim($_POST["varient_2"]);
    // $varient_1 = $input_varient_1;
    if(empty($input_varient_2)){
        // $varient_1_err = "Please enter the varient_1 ";     
    }  else{
        $varient_2 = $input_varient_2;
    }

    $input_quantity = trim($_POST["quantity"]);
    // $quantity = $input_quantity;
    if(empty($input_quantity)){
        // $quantity_err = "Please enter the quantity ";     
    }  else{
        $quantity = $input_quantity;
    }
    
    // Check input errors before inserting in database
    if(empty($product_id_err) && empty($SKU_err) && empty($price_err)&&
    empty($image_err) && empty($varient_1_err) && empty($varient_2_err)&& empty($quantity_err)){
        // Prepare an update statement
        // $sql = "UPDATE product SET  product_id=?,SKU=?, price=?, image=?, varient_1=?, quantity=? WHERE product_id=?";
        $sql = "UPDATE varient SET  product_id=?,SKU=?, price=?, image=?, varient_1=?, varient_2=?,quantity=? WHERE varient_id=?";
        // echo "oh yeah";
        if($stmt = mysqli_prepare($link, $sql)){
            
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "isdbssii", $param_product_id, $param_SKU, $param_price,
            $param_image, $param_varient_1, $param_varient_2,$param_quantity, $param_varient_id);
            
            // Set parameters
            $param_product_id= $product_id;
            $param_SKU = $SKU;
            $param_price = $price;

            $param_image= $image;
            $param_varient_1 = $varient_1;
            $param_varient_2=$varient_2;
            $param_quantity= $quantity;

            $param_varient_id = $product_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["varient_id"]) && !empty(trim($_GET["varient_id"]))){
        // Get URL parameter
        $varient_id =  trim($_GET["varient_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM varient WHERE varient_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_varient_id);
            
            // Set parameters
            $param_varient_id = $varient_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $product_id = $row["product_id"];
                    $SKU = $row["SKU"];
                    $price = $row["price"];

                    $image = $row["image"];
                    $varient_1 = $row["varient_1"];
                    $varient_2 = $row["varient_2"];
                    $quantity = $row["quantity"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <!-- <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div> -->

                        <div class="form-group <?php echo (!empty($product_id_err)) ? 'has-error' : ''; ?>">
                            <label>product id</label>
                            <input type="int" name="product_id" class="form-control" value="<?php echo $product_id; ?>">
                            <span class="help-block"><?php echo $product_id_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($SKU_err)) ? 'has-error' : ''; ?>">
                            <label>SKU</label>
                            <input type='text' name="SKU" class="form-control" value="<?php echo $SKU; ?>">
                            <span class="help-block"><?php echo $SKU_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>price</label>
                            <input type="number" name="price" step=0.01 class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>

                        <!-- ---------------------------- -->
                        
                        <!-- ---------------------------------->

                        <!-- ------------------------------------ -->
                    
                        <!-- ----------------------------------- -->

                        

                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>image</label>
                            <input type="file" name="image" class="form-control"></textarea>
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
                            <input type="number" name="quantity" step=1 class="form-control" value="<?php echo $quantity; ?>">
                            <span class="help-block"><?php echo $quantity_err;?></span>
                        </div>

                        <input type="hidden" name="varient_id" value="<?php echo $varient_id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>