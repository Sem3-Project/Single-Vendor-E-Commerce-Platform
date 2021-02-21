<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$product_name = $category_id = $subcat_id = $description = $weight = $dimension = "";
$product_name_err = $category_id_err = $subcat_id_err = $description_err = $weight_err = $dimension_err ="";
 
// Processing form data when form is submitted
if(isset($_POST["product_id"]) && !empty($_POST["product_id"])){
    // Get hidden input value
    $product_id = $_POST["product_id"];
    
    // Validate name
    $input_product_name= trim($_POST["product_name"]);
    if(empty($input_product_name)){
        $product_name_err = "Please enter a product_name.";
    } 
    // elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    //     $name_err = "Please enter a valid name.";
    // } 
    else{
        $product_name = $input_product_name;
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

    $input_category_id = trim($_POST["category_id"]);

    //this one can be replace with following if clause
    // $category_id = $input_category_id;
    if(empty($input_category_id)){
        $category_id_err = "Please enter an category_id.";     
    } else{
        $category_id = $input_category_id;
    }
    
    // Validate salary
    $input_subcat_id = trim($_POST["subcat_id"]);
    // $subcat_id = $input_subcat_id;
    if(empty($input_subcat_id)){
        $subcat_id_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_subcat_id)){
        $subcat_id_err = "Please enter a positive integer value.";
    } else{
        $subcat_id = $input_subcat_id;
    }


    $input_description = trim($_POST["description"]);
    // $description = $input_description;
    if(empty($input_description)){
        $description_err = "Please enter the description ";     
    }  else{
        $description = $input_description;
    }

    $input_weight = trim($_POST["weight"]);
    // $weight = $input_weight;
    if(empty($input_weight)){
        $weight_err = "Please enter the weight ";     
    }  else{
        $weight = $input_weight;
    }

    $input_dimension = trim($_POST["dimension"]);
    // $dimension = $input_dimension;
    if(empty($input_dimension)){
        $dimension_err = "Please enter the dimension ";     
    }  else{
        $dimension = $input_dimension;
    }
    
    // Check input errors before inserting in database
    if(empty($product_name_err) && empty($category_id_err) && empty($subcat_id_err)&&
    empty($description_err) && empty($weight_err) && empty($dimension_err)){
        // Prepare an update statement
        // $sql = "UPDATE product SET  product_name=?,category_id=?, subcat_id=?, description=?, weight=?, dimension=? WHERE product_id=?";
        $sql = "UPDATE product SET  product_name=?,category_id=?, subcat_id=?, description=?, weight=?, dimension=? WHERE product_id=?";
        // echo "oh yeah";
        if($stmt = mysqli_prepare($link, $sql)){
            
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "siisssi", $param_product_name, $param_category_id, $param_subcat_id,
            $param_description, $param_weight, $param_dimension, $param_product_id);
            
            // Set parameters
            $param_product_name= $product_name;
            $param_category_id = $category_id;
            $param_subcat_id = $subcat_id;

            $param_description= $description;
            $param_weight = $weight;
            $param_dimension= $dimension;

            $param_product_id = $product_id;
            
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
    if(isset($_GET["product_id"]) && !empty(trim($_GET["product_id"]))){
        // Get URL parameter
        $product_id =  trim($_GET["product_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM product WHERE product_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_product_id);
            
            // Set parameters
            $param_product_id = $product_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $product_name = $row["product_name"];
                    $category_id = $row["category_id"];
                    $subcat_id = $row["subcat_id"];

                    $description = $row["description"];
                    $weight = $row["weight"];
                    $dimension = $row["dimension"];
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

                        <div class="form-group <?php echo (!empty($product_name_err)) ? 'has-error' : ''; ?>">
                            <label>product name</label>
                            <input type="text" name="product_name" class="form-control" value="<?php echo $product_name; ?>">
                            <span class="help-block"><?php echo $product_name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($category_id_err)) ? 'has-error' : ''; ?>">
                            <label>category id</label>
                            <input type='int' name="category_id" class="form-control" value="<?php echo $category_id; ?>">
                            <span class="help-block"><?php echo $category_id_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($subcat_id_err)) ? 'has-error' : ''; ?>">
                            <label>subcat_id</label>
                            <input type="int" name="subcat_id" class="form-control" value="<?php echo $subcat_id; ?>">
                            <span class="help-block"><?php echo $subcat_id_err;?></span>
                        </div>

                        

                        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                            <label>description</label>
                            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                            <span class="help-block"><?php echo $description_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($weight_err)) ? 'has-error' : ''; ?>">
                            <label>weight</label>
                            <input type="text" name="weight" class="form-control" value="<?php echo $weight; ?>">
                            <span class="help-block"><?php echo $weight_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($dimension_err)) ? 'has-error' : ''; ?>">
                            <label>dimension</label>
                            <input type="text" name="dimension" class="form-control" value="<?php echo $dimension; ?>">
                            <span class="help-block"><?php echo $dimension_err;?></span>
                        </div>

                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>