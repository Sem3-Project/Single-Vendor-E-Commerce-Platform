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
    


if (isset($_POST['Update'])){
    $order_id = $_POST['order_id'];  
    $delivery_status = $_POST['delivery_status'];  
    $additional_notes = $_POST['additional_notes'];  
    //$delivery_estimate=$funObj->getestiDate($conn, $order_id);

    //$update = $funObj->updateStatus($conn,$_POST['order_id'],$_POST['delivery_status'],$_POST['additional_notes']);
    $update="UPDATE delivery SET delivery_status='$delivery_status',additional_notes='$additional_notes' WHERE order_id = '$order_id'";
    //$update="INSERT INTO delivery(order_id,delivery_status,additional_notes) VALUES('$order_id','$delivery_status','$additional_notes')";
    echo $delivery_estimate;
}
//value="<?php echo $row['order_id'] 

?>
<!DOCTYPE html>
    <head>
        <title>Update Order Status </title>
        <meta charset ="UTF-8">
        <meta name="viewpoint" content="width-device-width initial-scale=1.0">
       
        
        <link rel="stylesheet" href="../../../public/css/login2.css" />
       
    </head>
    <body>
    
        <br><br>
        
       
        <h1 align='left' margin="100px" ><i>Update Order Status</i></h1>
        <br><br>
        <form action="" method="POST">
       
         <br>  
         
        <table width="60%">
        <link href="../../../public/css/table1.css" rel="stylesheet" />
           
            <thead>
                <tr>
                   
                <th>Order ID</th>
                    <th>Delivery Status</th>
                    <th>Additional Notes</th>
                    
                </tr>
            </thead>
            <tbody>
            <!-- <?php //while($row = mysqli_fetch_array($query_run)){}?> -->
            <tr><td><input type="num" placeholder="Enter Order ID" name="order_id" value="<?php echo $order_id ?>"
             > </td>
            
            <td> <select name="delivery_status" value= <?php echo $delivery_status?>>
            <option value="yes">yes</option>
            <option value="no">no</option>
            <option value="in_transit">in_transit</option>
            </select> </td>
            <td><input type="text" placeholder="Add addtional notes" name="additional_notes" value="<?php echo $additional_notes ?>"
             > </td>
        
            </tbody>
        </table>
        <br>
        <br><center><input type="submit" class="link" name="Update" style="margin-bottom: 50px; width:15%; height:40px;background-color:  rgb(236, 185, 17);" value="Update"></center>
        
        </form>
        
    </body>
   
</html>
