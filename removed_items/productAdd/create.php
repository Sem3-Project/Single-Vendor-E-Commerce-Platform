<!-- using mysql_connect in this page -->
<?php
// Include config file
require_once "addProduct.php";
 
// Define variables and initialize with empty values

// product_id`, `product_name`, `category_id`, `subcat_id`, `description`, `weight`, `dimension
$product_name = $category_id = $subcat_id = $description = $weight = $dimension = "";
$product_name_err = $category_id_err = $subcat_id_err = $description_err = $weight_err = $dimension_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_product_name = trim($_POST["product_name"]);
    if(empty($input_product_name)){
        $product_name_err = "Please enter a product name.";
    } 
    // elseif(!filter_var($input_product_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    //     $product_name_err = "Please enter a valid product name.";
    // }
     else{
        $product_name = $input_product_name;
    }
    
    // Validate address
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

    //$product_name_err = $category_id_err = $subcat_id_err = $description_err = $weight_err = $dimension_err
    
    // Check input errors before inserting in database
    // if(empty($product_name_err)){
        // Prepare an insert statement

        if(empty($product_name_err) && empty($category_id_err) && empty($subcat_id_err)&&
    empty($description_err) && empty($weight_err) && empty($dimension_err)){
        $sql = "INSERT INTO product (product_name,category_id, subcat_id, description, weight, dimension) VALUES (?, ?, ?,?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_product_name, $param_category_id, $param_subcat_id,
            $param_description, $param_weight, $param_dimension);
            
            // Set parameters
            $param_product_name= $product_name;
            $param_category_id = $category_id;
            $param_subcat_id = $subcat_id;

            $param_description= $description;
            $param_weight = $weight;
            $param_dimension= $dimension;
            
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
                    <p>Please fill this form and submit to add Product record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/from-data" method="post">


                    <!-- $product_name_err = $category_id_err = $subcat_id_err = $description_err = $weight_err = $dimension_err -->
                    <!-- $product_name = $category_id = $subcat_id = $description = $weight = $dimension = ""; -->
                        <div class="form-group <?php echo (!empty($product_name_err)) ? 'has-error' : ''; ?>">
                            <label>product name</label>
                            <input type="text" name="product_name" class="form-control" value="<?php echo $product_name; ?>">
                            <span class="help-block"><?php echo $product_name_err;?></span>
                        </div>

                        <!-- <div class="form-group <?php echo (!empty($category_id_err)) ? 'has-error' : ''; ?>">
                            <label>category id</label>
                            <input type="int" name="category_id" class="form-control" value="<?php echo $category_id; ?>">
                            <span class="help-block"><?php echo $category_id_err;?></span>
                        </div> -->

<!-- -------------------------------------- -->
                        <label for="sel1">Category</label>
		                <select class="form-control" id="category" name="category_id">
		                <option value="">Select Category</option>
                        
		                <?php
                        $conn=mysqli_connect("localhost","root","","singlevendor");
                        $result = mysqli_query($conn,"SELECT * FROM category order by category_name");
			            while($row = mysqli_fetch_array($result)) {
			            ?>
				            <option value="<?php echo $row["category_id"];?>"><?php echo $row["category_name"];?></option>
			            <?php
			            }
			            ?>
			            </select>
                        <!-- ---------------------------------->

                        <!-- ------------------------------------ -->
                        <label for="sel2">Sub Category</label>
		                <select class="form-control" id="subcat_id" name="subcat_id">
		                <option value="">Select sub Category</option>
                        
		                <?php
                        $conn=mysqli_connect("localhost","root","","singlevendor");
                        $result = mysqli_query($conn,"SELECT * FROM subcategory order by category_id");
			            while($row = mysqli_fetch_array($result)) {
			            ?>
				            <option value="<?php echo $row["subcat_id"];?>"><?php echo $row["subcat_name"];?></option>
			            <?php
			            }
			            ?>
			            </select>
        <!-- ------------------------------------------ -->

                        <!-- <div class="form-group <?php echo (!empty($subcat_id_err)) ? 'has-error' : ''; ?>">
                            <label>subcat_id</label>
                            <input type="int" name="subcat_id" class="form-control" value="<?php echo $subcat_id; ?>">
                            <span class="help-block"><?php echo $subcat_id_err;?></span>
                        </div> -->

                        

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

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>




</body>
</html>