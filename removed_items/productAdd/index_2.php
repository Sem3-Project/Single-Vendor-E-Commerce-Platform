<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Edition</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Product Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Product</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    // $sql = "SELECT * FROM `product` ";
                    $sql = "select product_id,product_name,description,weight,dimension,product.category_id,category.category_name,
                        product.subcat_id,subcategory.subcat_name from (product inner join category using (category_id)) 
                        inner join subcategory using (subcat_id) order by (product_id)";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Product Name</th>";
                                        echo "<th>category id</th>";
                                        echo "<th>category name</th>";
                                        echo "<th>sub category id</th>";
                                        echo "<th>sub category name</th>";
                                        echo "<th>Description</th>";
                                        echo "<th>Weight</th>";
                                        echo "<th>Dimension</th>";

                                        // echo "<th>varient id</th>";
                                        // echo "<th>sku</th>";

                                        echo "<th>Action</th>";
                                        echo "<th>Varient Action</th>";
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
                                            echo "<a href='update.php?product_id=". $row['product_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?product_id=". $row['product_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";

                                        echo"<td>";?>
                                        <form action="indexVarient.php" method='post'>
                                        <!-- // echo "<a href='indexVarient.php?product_id=". $row['product_id'] ."' title='Varient' data-toggle='tooltip'><labeL>varient</label></a>"; -->
                                        <button name="Select" type="submit" value="<?php echo $row["product_id"];?>"><?php
				                            echo "Varient";?></button>
                                        
                                        <?php
                                        echo "</td>";
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
                </div>
            </div>        
        </div>
    </div>
</body>
</html>