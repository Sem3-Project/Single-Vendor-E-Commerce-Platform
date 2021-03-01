<?php
require_once "addProduct.php";
// $product_id="";
if(isset($_POST["product_id"]) && !empty($_POST["product_id"])){
    // Get hidden input value
    $product_id = $_POST["product_id"];
}
if(isset($_GET["product_id"]) && !empty(trim($_GET["product_id"]))){
    // Get URL parameter
    $product_id =  trim($_GET["product_id"]);
}
// echo $product_id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Varient Edition</title>
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
                        <h2 class="pull-left">Varient Details</h2>
                        <!-- <a href='VarientCreate.php' class="btn btn-success pull-right">Add New Varient</a> -->
                       

                    </div>
                    <?php
                    require_once "addProduct.php";
                    // $product_id="";
                    if(isset($_POST["product_id"]) && !empty($_POST["product_id"])){
                        // Get hidden input value
                        $product_id = $_POST["product_id"];
                    }
                    if(isset($_GET["product_id"]) && !empty(trim($_GET["product_id"]))){
                        // Get URL parameter
                        $product_id =  trim($_GET["product_id"]);
                    }
                    echo "<a href='VarientCreate.php?product_id=". $product_id ."' class='btn btn-success pull-right'>Add New Varient</a><br><br>";   
                    // echo $product_id;
// echo $product_id;
                    // if(isset($_GET["product_id"]) && !empty(trim($_GET["product_id"]))){
                    //     // Get URL parameter
                    //     $product_id =  trim($_GET["product_id"]);
                    // $sql = "SELECT `varient_id`, `product_id`, `SKU`, `price`, `image`, `varient_1`, `varient_2`, `quantity` FROM `varient`
                    //  where product_id=$product_id";
                    // echo $product_id;
                    $sql = "SELECT `varient_id`, `product_id`, `SKU`, `price`, `image`, `varient_1`, `varient_2`, `quantity` FROM `varient`
                     where product_id=$product_id";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Product id</th>";
                                        echo "<th>SKU</th>";
                                        echo "<th>price</th>";
                                        echo "<th>image</th>";
                                        echo "<th>varient 1</th>";
                                        echo "<th>varient 2</th>";
                                        echo "<th>quantity</th>";

                                        echo "<th>Action</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['varient_id'] . "</td>";
                                        echo "<td>" . $row['product_id'] . "</td>";
                                        echo "<td>" . $row['SKU'] . "</td>";
                                        echo "<td>" . $row['price'] . "</td>";
                                        // echo "<td>" . $row['image'] . "</td>";
                                        echo "<td>".'<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"  width="150" height="150" />'. "</td>";
                                        echo "<td>" . $row['varient_1'] . "</td>";

                                        echo "<td>" . $row['varient_2'] . "</td>";
                                        echo "<td>" . $row['quantity'] . "</td>";
                                        
                                        echo "<td>";
                                            // echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='updateVarient.php?varient_id=". $row['varient_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='deleteVarient.php?varient_id=". $row['varient_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";

                                    echo "</tr>";
                                    
                                    
                                }
                                echo "</tbody>"; 
                                echo "</table>";                         
                                // echo "<a href='VarientCreate.php?product_id=". $product_id ."' class='btn btn-success pull-right'>Add New Varient</a>";   
                            // Free result set
                        mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
                // }
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>