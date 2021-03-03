<?php
// Process delete operation after confirmation
if(isset($_POST["product_id"]) && !empty($_POST["product_id"])){
    // Include config file
    require_once "addProduct.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM product WHERE product_id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_product_id);
        
        // Set parameters
        $param_product_id = trim($_POST["product_id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page
            header("location: index.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["product_id"]))){
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
    <title>Remove Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../../../../public/css/login.css" />
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
            background-color: white;
            margin-top: 50px;
            margin-bottom: 20px;
            border-left: 1px solid rgb(236, 185, 17);
            border-right: 1px solid rgb(236, 185, 17);
        }
    </style>
</head>
<body>
    <a href="../Homeadmin.php"><img class="login" src="../../../../public/images/homeic.gif" style="width:6.5%; margin-top:13px;  position: relative;"></a>

    <a href="../../../view/signin/logout-user.php"><img class="login" src="../../../../public/images/logout.gif" style="width:7%; margin-top:13px;margin-left:25px; position: absolute;"></a>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Remove Product</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in" style="background-color:#e8ebeb; color:black; border:1px solid #e8ebeb">
                            <input type="hidden" name="product_id" value="<?php echo trim($_GET["product_id"]); ?>"/>
                            <p>Are you sure you want to remove this product?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger" style="background-color:rgb(236, 185, 17); color:black; border:rgb(236, 185, 17)">
                                <a href="index.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>