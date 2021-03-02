<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Status Edition</title>
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
                        <h2 class="pull-left" >Order Status</h2>
                    </div>
                    <?php
                    // Include config file
                    require_once "addProduct/addProduct.php";
                    
                    // Attempt select query execution
                    // $sql = "SELECT * FROM `product` ";
                    $sql = "SELECT *  from (`order` inner join `order_product` using (order_id)) inner join `delivery` using(order_id)";

                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Order ID</th>";
                                        echo "<th>Delivery Status</th>";
                                        echo "<th>Delivery Method</th>";
                                        echo "<th>Payment Method</th>";
                                        echo "<th>Quantity</th>";
                                        echo "<th>Total Payment</th>";
                                        echo "<th>Varient ID</th>";
                                        echo "<th>Address</th>";
                                        //echo "<th>Action</th>";

                                        // echo "<th>varient id</th>";
                                        // echo "<th>sku</th>";

                                        // echo "<th>Product update/ remove</th>";
                                        // echo "<th>Varient update</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['order_product_id'] . "</td>";
                                        echo "<td>" . $row['order_id'] . "</td>";
                                        echo "<td>" . $row['delivery_status'] . "</td>";
                                        echo "<td>" . $row['delivery_method'] . "</td>";
                                        echo "<td>" . $row['payment_method'] . "</td>";
                                        echo "<td>" . $row['quantity'] . "</td>";
                                        echo "<td>" . $row['total_payment'] . "</td>";

                                        echo "<td>" . $row['varient_id'] . "</td>";
                                        echo "<td>" . $row['city'] . "</td>";
                                        

                                        // echo "<td>" . $row['varient_id'] . "</td>";
                                        // echo "<td>" . $row['sku'] . "</td>";

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