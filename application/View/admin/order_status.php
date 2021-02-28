<?php
//include '../../model/order_status.model.php';
include '../../controller/order_status_update.class.php';

$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new UpdateStatus();

//$order_id='';
//$delivery_status='';
//$additional_notes='';

//$update = $funObj->updateStatus($conn,$order_id,$delivery_status,$additional_notes);
if (isset($_POST['Search'])){
    $order_id = $_POST['order_id'];  
    $delivery_status = $_POST['delivery_status'];  
    $additional_notes = $_POST['additional_notes'];  

    //$update = $funObj->updateStatus($conn,$_POST['order_id'],$_POST['delivery_status'],$_POST['additional_notes']);
    $query="SELECT delivery_status,additional_notes FROM delivery WHERE order_id = '$order_id'";
    $query_run=mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($query_run)){
    }}
    


if (isset($_POST['Update'])){
    $order_id = $_POST['order_id'];  
    $delivery_status = $_POST['delivery_status'];  
    $additional_notes = $_POST['additional_notes'];  

    //$update = $funObj->updateStatus($conn,$_POST['order_id'],$_POST['delivery_status'],$_POST['additional_notes']);
    $update="UPDATE delivery SET delivery_status='$delivery_status',additional_notes='$additional_notes' WHERE order_id = '$order_id'";
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
    <div class="container">
	<form action="order_status.php" method="POST">
		<div class="form-group">
        <br><br>
        
       
        <h1 align='left' margin="100px" ><i>Update Order Status</i></h1>
        <br><br>
           
        <table width="80%">
        <link href="../../../public/css/table1.css" rel="stylesheet" />
           
            <thead>
                <tr>
                   
                    <th>Order ID</th>
                    <th>Delivery Status</th>
                    <th>Additional Notes</th>
                    
                </tr>
            </thead>
            <tbody>
            
            <tr>
            <td><input type="num" placeholder="Enter Order ID" name="order_id" >&nbsp;<input type="submit" class="link" name="search" style="margin-bottom: 50px; width:15%; height:40px;background-color:  rgb(236, 185, 17);" value="Search"> </td>
           
        <td> <select name="delivery_status">
            <option value="yes">yes</option>
            <option value="no">no</option>
            <option value="in_transit">in_transit</option>
            </select> </td>
            <td><input type="text" placeholder="Add addtional notes" name="additional_notes" > </td>
            
            </tbody>
        </table>
        <br>
        <br><center><input type="submit" class="link" name="update" style="margin-bottom: 50px; width:15%; height:40px;background-color:  rgb(236, 185, 17);" value="Update"></center>
        </div>
        </form>
        </div>
    </body>
   
</html>
