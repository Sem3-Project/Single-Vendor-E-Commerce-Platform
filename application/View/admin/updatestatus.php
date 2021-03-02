<!-- using mysql_connect in this page -->
<?php
// Include config file
require_once "addProduct/addProduct.php";
 
// Define variables and initialize with empty values
//$delivery_status = $category_id = $subcat_id = $description = $weight = $dimension = "";
//$delivery_status_err = $category_id_err = $subcat_id_err = $description_err = $weight_err = $dimension_err ="";
$delivery_status="";
$delivery_status_err="";
// Processing form data when form is submitted
if(isset($_POST["order_product_id"]) && !empty($_POST["order_product_id"])){
    // Get hidden input value
    $order_product_id = $_POST["order_product_id"];
    
    // Validate name
    $input_delivery_status= trim($_POST["delivery_status"]);
    if(empty($input_delivery_status)){
        $delivery_status_err = "Please enter a delivery_status.";
    } 
    // elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    //     $name_err = "Please enter a valid name.";
    // } 
    else{
        $delivery_status = $input_delivery_status;
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

    // $input_category_id = trim($_POST["category_id"]);

    // //this one can be replace with following if clause
    // // $category_id = $input_category_id;
    // if(empty($input_category_id)){
    //     $category_id_err = "Please enter an category_id.";     
    // } else{
    //     $category_id = $input_category_id;
    // }
    
    // Validate salary
    // $input_subcat_id = trim($_POST["subcat_id"]);
    // // $subcat_id = $input_subcat_id;
    // if(empty($input_subcat_id)){
    //     $subcat_id_err = "Please enter the salary amount.";     
    // } elseif(!ctype_digit($input_subcat_id)){
    //     $subcat_id_err = "Please enter a positive integer value.";
    // } else{
    //     $subcat_id = $input_subcat_id;
    // }


    // $input_description = trim($_POST["description"]);
    // // $description = $input_description;
    // if(empty($input_description)){
    //     // $description_err = "Please enter the description ";     
    // }  else{
    //     $description = $input_description;
    // }

    // $input_weight = trim($_POST["weight"]);
    // // $weight = $input_weight;
    // if(empty($input_weight)){
    //     // $weight_err = "Please enter the weight ";     
    // }  else{
    //     $weight = $input_weight;
    // }

    // $input_dimension = trim($_POST["dimension"]);
    // // $dimension = $input_dimension;
    // if(empty($input_dimension)){
    //     // $dimension_err = "Please enter the dimension ";     
    // }  else{
    //     $dimension = $input_dimension;
    // }
    
    // Check input errors before inserting in database
    if(empty($delivery_status_err)){
        // Prepare an update statement
        // $sql = "UPDATE product SET  delivery_status=?,category_id=?, subcat_id=?, description=?, weight=?, dimension=? WHERE product_id=?";
        $sql = "UPDATE product SET  delivery_status=?,category_id=?, subcat_id=?, description=?, weight=?, dimension=? WHERE product_id=?";
        // echo "oh yeah";
        if($stmt = mysqli_prepare($link, $sql)){
            
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "siisssi", $param_delivery_status, $param_category_id, $param_subcat_id,
            $param_description, $param_weight, $param_dimension, $param_product_id);
            
            // Set parameters
            $param_delivery_status= $delivery_status;
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
                    $delivery_status = $row["delivery_status"];
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
    <title>Update Product Details</title>
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
                        <h2>Update Product Details</h2>
                    </div>
                    <p>Please edit the input values and submit to update the details.</p>
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

                        <div class="form-group <?php echo (!empty($delivery_status_err)) ? 'has-error' : ''; ?>">
                            <label>Product name</label>
                            <input type="text" name="delivery_status" class="form-control" value="<?php echo $delivery_status; ?>">
                            <span class="help-block"><?php echo $delivery_status_err;?></span>
                        </div>

                        <!-- <div class="form-group <?php echo (!empty($category_id_err)) ? 'has-error' : ''; ?>">
                            <label>category id</label>
                            <input type='int' name="category_id" class="form-control" value="<?php echo $category_id; ?>">
                            <span class="help-block"><?php echo $category_id_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($subcat_id_err)) ? 'has-error' : ''; ?>">
                            <label>subcat_id</label>
                            <input type="int" name="subcat_id" class="form-control" value="<?php echo $subcat_id; ?>">
                            <span class="help-block"><?php echo $subcat_id_err;?></span>
                        </div> -->

                        <!-- ---------------------------- -->
                        <?php
                        $conn=mysqli_connect("localhost","admin","1234","singlevendor");
                        $result2 = mysqli_query($conn,"SELECT * FROM category where category_id=$category_id");
                        $result3=mysqli_query($conn,"SELECT * FROM subcategory where subcat_id=$subcat_id");
                        $cat=mysqli_fetch_array($result2);
                        $subcat=mysqli_fetch_array($result3);
                        // echo $cat["category_name"];
                        // echo $subcat["subcat_name"];
                        ?>
                        <label for="sel1">Category</label>
		                <select class="form-control" id="category" name="category_id" >
		                <option value=""><?php echo $cat["category_name"]; ?></option>
                        <!-- <option value="">Select category name</option> -->
                        
		                <?php
                        $conn=mysqli_connect("localhost","admin","1234","singlevendor");
                        $result = mysqli_query($conn,"SELECT * FROM category order by category_name");
			            while($row = mysqli_fetch_array($result)) {
			            ?>

				            <option value="<?php echo $row["category_id"];?>"><?php echo $row["category_name"];?></option>
			            <?php
			            }
			            ?>
			            </select>
                        <!-- ---------------------------------->
                        <br>
                        <!-- ------------------------------------ -->
                        <label for="sel2">Sub category</label>
		                <select class="form-control" id="subcat_id" name="subcat_id">
		                <option value=""><?php echo $subcat["subcat_name"]; ?></option>
                        <!-- <option value="">Select subcategory name</option> -->

		                <?php
                        // $conn=mysqli_connect("localhost","admin","1234","singlevendor");
                        $result = mysqli_query($conn,"SELECT * FROM subcategory inner join category using(category_id) order by category_id");
			            while($row = mysqli_fetch_array($result)) {
			            ?>
				            <option value="<?php echo $row["subcat_id"];?>"><?php echo $row["category_name"];?> - <?php echo $row["subcat_name"];?></option>
			            <?php
			            }
			            ?>
			            </select>
                        <!-- ----------------------------------- -->

                        <br>

                        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                            <label>Description</label>
                            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                            <span class="help-block"><?php echo $description_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($weight_err)) ? 'has-error' : ''; ?>">
                            <label>Weight</label>
                            <input type="text" name="weight" class="form-control" value="<?php echo $weight; ?>">
                            <span class="help-block"><?php echo $weight_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($dimension_err)) ? 'has-error' : ''; ?>">
                            <label>Dimension</label>
                            <input type="text" name="dimension" class="form-control" value="<?php echo $dimension; ?>">
                            <span class="help-block"><?php echo $dimension_err;?></span>
                        </div>

                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>"/>
                        <input type="submit" class="btn btn-primary" style="background-color:rgb(236, 185, 17); color:black; border:rgb(236, 185, 17)" value="Submit">
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