<!DOCTYPE html>
    <head>
        <title>Order Status</title>
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
            width:250%; 
            border:2px solid #e8ebeb; 
            border-radius:5px; 
            padding:5px; 
            padding-left:10px
            
        }
        
        </style>
    </head>
    <body>
    <a href="HomeCustomer.php"><img class="login" src="../../../public/images/homeic.gif" style="width:6.5%; margin-top:13px; position: relative;"></a>

    <a href="../../view/signin/logout-user.php"><img class="login" src="../../../public/images/logout.gif" style="width:7%; margin-top:13px; margin-left:25px; position: absolute;"></a>
    <div class="wrapper" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left" >Order Status</h2>
                    </div>

       
        
           
        <table width="80%" class='table table-bordered table-striped'>
        <!--link href="../../../public/css/table1.css" rel="stylesheet" /-->
           
            <thead>
                <tr>
                    <th>Order Date</th>
                    <th>Order ID</th>
                    <th>Total Payment</th>
                    <th>Delivery Status</th>
                    <th>Delivery Estimate</th>
                </tr>
            </thead>
        
            <tbody>
            <?php
require '../../controller/order_status.class.php';
//$connector = new DbConnection();
//$conn = $connector->connect1();
$funObj = new OrderStatus();

$load = $funObj->loadStatus($con1,$_SESSION['customer_id']); 

if ($load){
    if(mysqli_num_rows($load) > 0){
        while($row = mysqli_fetch_array($load)){
            echo "<tr>";
            echo "<td>" . $row['date'] . "</td>";

            echo "<td>" . $row['order_id'] . "</td>";

            echo "<td>" . $row['total_payment'] . "</td>";

            echo "<td>" . $row['delivery_status'] . "</td>";

            echo "<td>" . $row['delivery_estimate'] . "</td>";

            echo "</tr>";

            // $date = $row ['date'];
            // $order_id = $row ['order_id'];
            // $total_payment = $row ['total_payment'];
            // $delivery_status = $row ['delivery_status'];
           
        }
    }
    
}


?>
            
           
                
            </tbody>
        </table>
        </div>
            </div>        
        </div><br>
    </div>
    <br>
    </body>
</html>
