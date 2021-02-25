<!DOCTYPE html>
    <head>
        <title>Order Status</title>
        <meta charset ="UTF-8">
        <meta name="viewpoint" content="width-device-width initial-scale=1.0">
       
        
        <link rel="stylesheet" href="../../../public/css/login2.css" />
       
    </head>
    <body>
        
       
        <h1 align='left' margin="100px" ><i>Order Status</i></h1>
           
        <table width="80%">
        <link href="../../../public/css/table1.css" rel="stylesheet" />
           
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Order ID</th>
                    <!-- <th>Order</th> -->
                    <th>Total Payment</th>
                    <th>Delivery Status</th>
                </tr>
            </thead>
        
            <tbody>
            <?php
include '../../controller/order_status.class.php';

$connector = new DbConnection();
$conn = $connector->connect1();
$funObj = new OrderStatus();

$load = $funObj->loadStatus($conn,14); 



if ($load){
    if(mysqli_num_rows($load) > 0){
        while($row = mysqli_fetch_array($load)){
            echo "<tr>";
            echo "<td>" . $row['date'] . "</td>";

            echo "<td>" . $row['order_id'] . "</td>";

            echo "<td>" . $row['total_payment'] . "</td>";

            echo "<td>" . $row['delivery_status'] . "</td>";

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
        
    </body>
</html>
