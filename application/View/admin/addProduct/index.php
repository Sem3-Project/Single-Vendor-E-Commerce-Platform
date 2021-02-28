<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Edition</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../../../../public/css/login.css" />
    <style type="text/css">
        .wrapper{
            width: 85%;
            margin: 0 auto;
            background-color: #f2f2f2;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
        
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <a href="../Homeadmin.php"><img class="login" src="../../../../public/images/homeic.gif" style="width:6.5%; margin-top:13px;  position: relative;"></a>

    <a href="../../../view/logout-user.php"><img class="login" src="../../../../public/images/logout.gif" style="width:7%; margin-top:13px;margin-left:25px; position: absolute;"></a>
   
    <div class="wrapper" style="margin-left:100px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left" >Product Details</h2>
                        <a href="create.php" class="btn btn-success pull-right" style="background-color:rgb(236, 185, 17); color:black; border:rgb(236, 185, 17)">Add New Product</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "addProduct.php";
                    
                    // Attempt select query execution
                    // $sql = "SELECT * FROM `product` ";
                    $sql = "SELECT product_id,product_name,description,weight,dimension,product.category_id,category.category_name,
                        product.subcat_id,subcategory.subcat_name from (product inner join category using (category_id)) 
                        inner join subcategory using (subcat_id) order by (product_id)";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Product Name</th>";
                                        echo "<th>Category id</th>";
                                        echo "<th>Category name</th>";
                                        echo "<th>Sub category id</th>";
                                        echo "<th>Sub category name</th>";
                                        echo "<th>Description</th>";
                                        echo "<th>Weight</th>";
                                        echo "<th>Dimension</th>";

                                        // echo "<th>varient id</th>";
                                        // echo "<th>sku</th>";

                                        echo "<th>Product update/ remove</th>";
                                        echo "<th>Varient update</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['product_id'] . "</td>";
                                        echo "<td>" . $row['product_name'] . "</td>";
                                        echo "<td>" . $row['category_id'] . "</td>";
                                        echo "<td>" . $row['category_name'] . "</td>";
                                        echo "<td>" . $row['subcat_id'] . "</td>";
                                        echo "<td>" . $row['subcat_name'] . "</td>";

                                        echo "<td>" . $row['description'] . "</td>";
                                        echo "<td>" . $row['weight'] . "</td>";
                                        echo "<td>" . $row['dimension'] . "</td>";

                                        // echo "<td>" . $row['varient_id'] . "</td>";
                                        // echo "<td>" . $row['sku'] . "</td>";

                                        echo "<td>";
                                            // echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<center><a href='update.php?product_id=". $row['product_id'] ."' title='Update Product' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil' style='color:black'></span></a></center>";
                                            
                                            echo "<center><a href='delete.php?product_id=". $row['product_id'] ."' title='Remove Product' data-toggle='tooltip'><span class='glyphicon glyphicon-trash' style='color:black'></span></a></center>";
                                        echo "</td>";

                                        // ------------
                                        echo "<td>";
                                        echo "<center><a href='indexVarient.php?product_id=". $row['product_id'] ."' title='Update Varient' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil' style='color:black'></span></a></center>";
                                    echo "</td>";


                                        // -----------------
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                        mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                    <br>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>