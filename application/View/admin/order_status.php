<?php
//include '../../model/order_status.model.php';
include '../../controller/order_status_update.class.php';

$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new UpdateStatus();

$order_id='';
$delivery_status='';
$additional_notes='';
$delivery_estimate='';

// if (isset($_POST['Search'])){
//     $order_id = $_POST['order_id'];  
    
//     $query="SELECT delivery_status,additional_notes FROM delivery WHERE order_id = '$order_id'";
//     $query_run=mysqli_query($conn,$query);
//    }
    
$sql = mysqli_query($conn, "SELECT *  from (`order` inner join `order_product` using (order_id)) inner join `delivery` using(order_id)");
$row = mysqli_fetch_array($sql);
$zipCode =$row['total_payment'];
if (isset($_POST['Update'])){
    $order_id = $_POST['order_id'];  
    $delivery_status = $_POST['delivery_status'];  
    $additional_notes = $_POST['additional_notes'];  
    $delivery_estimate=$funObj->getestiDate($conn, $order_id);
    
    $update="UPDATE `delivery` SET `delivery_status`='$delivery_status',`additional_notes`='$additional_notes' WHERE order_id = $order_id";
   
    mysqli_query($conn, $update);
    
}
//value="<?php echo $row['order_id'] 

?>
<!DOCTYPE html>
    <head>
        <title>Update Order Status </title>
        <meta charset ="UTF-8">
        <meta name="viewpoint" content="width-device-width initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
        <link rel="stylesheet" href="../../../public/css/login.css" />
        
        <style type="text/css">
        .wrapper{
            width: 80%;
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
        .input{
            width:100%; 
            border:2px solid #e8ebeb; 
            border-radius:5px; 
            padding:5px; 
            padding-left:10px
            
        }
        
        </style>
    </head>
    <body>
    <a href="Homeadmin.php"><img class="login" src="../../../public/images/homeic.gif" style="width:6.5%; margin-top:13px; position: relative;"></a>

    <a href="../../view/signin/logout-user.php"><img class="login" src="../../../public/images/logout.gif" style="width:7%; margin-top:13px; margin-left:25px; position: absolute;"></a>
    <div class="wrapper" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <br>
                    <div class="page-header clearfix">
                        <h2 class="pull-left" >Update Order Status</h2>
                    </div>
    
        <br><br>
        
        <form action="" method="POST">
       
          
         
        <table width="60%" class='table table-bordered table-striped'>
        <!--link href="../../../public/css/table1.css" rel="stylesheet" /-->
           
            <thead>
                <tr>
                   
                <th>Order ID</th>
                    <th>Delivery Status</th>
                    <th>Additional Notes</th>
                   
                </tr>
            </thead>
            <tbody>
            <!-- <?php //while($row = mysqli_fetch_array($query_run)){}?> -->
            <tr><td>
            <input type="num" class="input" placeholder="Enter Order ID" name="order_id" value="<?php echo $order_id ?>"> 
            </td>
            
            <td> <select name="delivery_status" class="input" value= <?php echo $delivery_status?>>
            <option value="Not dispatched">Not dispatched</option>
            <option value="In transition">In transition</option>
            <option value="Delivered">Delivered</option>
            </select> </td>
            <td><input type="text" class="input" placeholder="Add addtional notes" name="additional_notes" value="<?php echo $additional_notes ?>"
             > </td>
            
            </tbody>
        </table>
        <br>
        <!--br><center><input type="submit" class="link" name="Update" style="margin-bottom: 50px; width:15%; height:40px;background-color:  rgb(236, 185, 17);" value="Update"></center-->
        <br><input type="submit" name="Update" class="btn btn-success " style="margin-left:45%; background-color:rgb(236, 185, 17); color:black; border:rgb(236, 185, 17)" value="Update">

        </form>
        </div>
            </div>        
        </div><br>
    </div>

    <?php
                    // Include config file
                    //require_once "addProduct/addProduct.php";
                    
                    // Attempt select query execution
                    // $sql = "SELECT * FROM `product` ";
                    $sql = "SELECT *  from (`order` inner join `order_product` using (order_id)) inner join `delivery` using(order_id) where `delivery`.`delivery_status`!='Delivered'";

                    if($result = mysqli_query($conn, $sql)){
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
                                    //$string = $string1 . "," . $string2 . "," . $string3;
                                    $address_line1 = $row['address_line_1'];
                                    $address_line2 = $row['address_line_2'];
                                    $city = $row['city'];
                                    $zipcode = $row['zip_code'];
                                    $address = $address_line1 . "," . $address_line2 . "," . $city . "," . $zipcode; 
                                    echo "<tr>";
                                        echo "<td>" . $row['order_product_id'] . "</td>";
                                        echo "<td>" . $row['order_id'] . "</td>";
                                        echo "<td>" . $row['delivery_status'] . "</td>";
                                        echo "<td>" . $row['delivery_method'] . "</td>";
                                        echo "<td>" . $row['payment_method'] . "</td>";
                                        echo "<td>" . $row['quantity'] . "</td>";
                                        echo "<td>" . $row['total_payment'] . "</td>";

                                        echo "<td>" . $row['varient_id'] . "</td>";
                                        echo "<td>" . $address . "</td>";
                                        

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
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
    </body>
   
</html>
