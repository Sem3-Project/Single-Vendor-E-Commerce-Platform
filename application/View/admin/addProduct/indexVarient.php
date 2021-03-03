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
    <title>Update Varient</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../../../../public/css/login.css" />
    <style type="text/css">
        .wrapper{
            width: 75%;
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

    <a href="../../../view/signin/logout-user.php"><img class="login" src="../../../../public/images/logout.gif" style="width:7%; margin-top:13px;margin-left:25px; position: absolute;"></a>
    
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
                    echo "<a href='VarientCreate.php?product_id=". $product_id ."' class='btn btn-success pull-right' style='background-color:rgb(236, 185, 17); color:black; border:rgb(236, 185, 17)'>Add New Varient</a><br><br>";   
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
                                        echo "<th>Price</th>";
                                        echo "<th>Image</th>";
                                        echo "<th>Characteristics I</th>";
                                        echo "<th>Characteristics II</th>";
                                        echo "<th>Quantity</th>";

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
                                            // echo "<a href='update.php?product_id=". $row['product_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='deleteVarient.php?varient_id=". $row['varient_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash' style='color:black'></span></a>";
                                        echo "</td>";

                                    echo "</tr>";
                                    
                                    
                                }
                                echo "</tbody>"; 
                                echo "</table>";                         
                                // echo "<a href='VarientCreate.php?product_id=". $product_id ."' class='btn btn-success pull-right'>Add New Varient</a>";   
                            // Free result set
                        mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No varients were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
                // }
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