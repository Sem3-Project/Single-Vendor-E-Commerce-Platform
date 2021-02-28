<?php
include '../../model/order_status.model.php';
?>
<!DOCTYPE html>
    <head>
        <title>Update Order Status </title>
        <meta charset ="UTF-8">
        <meta name="viewpoint" content="width-device-width initial-scale=1.0">
       
        
        <link rel="stylesheet" href="../../../public/css/login2.css" />
       
    </head>
    <body>
        
       
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
            <td><input type="num" placeholder="Enter Order ID" name="order_id" value="<?=$order_id?>"> </td>
            <td> <select name="delivery_status">
            <option value="yes">YES</option>
            <option value="no">NO</option>
            <option value="in_transit">In transit</option>
            </select> </td>
            <td><input type="text" placeholder="Add addtional notes" name="additional_notes" value="<?=$additional_notes?>"> </td>
        
           
           
           
                
            </tbody>
        </table>
        <br>
        <br><center><input type="submit" class="link" name="update" style="margin-bottom: 50px; width:15%; height:40px;background-color:  rgb(236, 185, 17);" value="Update"></center>
        
    </body>
   
</html>
