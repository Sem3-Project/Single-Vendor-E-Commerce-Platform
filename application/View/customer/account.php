<?php
//include '../../model/profile.php';
?>

<!DOCTYPE html>
    <head>
        <title>Account</title>
        <meta charset ="UTF-8">
        <meta name="viewpoint" content="width-device-width initial-scale=1.0">
        <link rel="stylesheet" href="../../../public/css/login1.css" />

    </head>
    <body>
    <h1 align='left' margin="100px" ><i>Account Information</i></h1>
    <center><img class="user" src="../../../public/images/user1.png" ></center>
        <table>
            <link rel="stylesheet" href="../../../public/css/table1.css">
                <tr>
                    <td>Customer ID</td> <td> <input type="text" style="width: 100%" name="customer_id" readonly value="<?php  if (isset($_POST['customer_id'])) echo $row ['customer_id'];?>"></td>
                </tr>
                <tr>
                    <td>First name</td> <td> <input type="text" style="width: 100%" name="first_name" value="<?php  if (isset($_POST['first_name'])) echo $row ['first_name'];?>"> </td>
                </tr>
                <tr>
                    <td>Last name</td> <td> <input type="text" style="width: 100%" name="last_name" value="<?php  if (isset($_POST['last_name'])) echo $row ['last_name'];?>"> </td>
                </tr>
                <tr>
                    <td>Card details</td> <td> <input type="text" style="width: 100%" name="payment_number" value="<?php  if (isset($_POST['payment_number'])) echo $row ['payment_number'];?>"> </td>
                </tr>
                <tr>
                    <td>Email</td> <td> <input type="email" style="width: 100%" name="email" value="<?php  if (isset($_POST['email'])) echo $row ['email'];?>"></td>
                </tr>
        
                <tr>
                    <td>Address line 1</td> <td><input type="text" style="width: 100%" name="address_line_1" value="<?php  if (isset($_POST['address_line_1'])) echo $row ['address_line_1'];?>"> </td>
                </tr>
                <tr>
                    <td>Address line 2</td> <td><input type="text" style="width: 100%" name="address_line_2" value="<?php  if (isset($_POST['address_line_2'])) echo $row ['address_line_2'];?>"> </td>
                </tr>
                <tr>
                    <td>City</td> <td><input type="text" style="width: 100%" name="city" value="<?php  if (isset($_POST['city'])) echo $row ['city'];?>"> </td>
                </tr>
                <tr>
                    <td>State</td> <td><input type="text" style="width: 100%" name="state" value="<?php  if (isset($_POST['state'])) echo $row ['state'];?>"> </td>
                </tr>
                <tr>
                    <td>Mobile Number</td> <td> <input type="text" style="width: 100%" name="mobile_num" value="<?php  if (isset($_POST['mobile_num'])) echo $row ['mobile_num'];?>"></td>
                </tr>
               
</table>
<br>
<br><center><input type="submit" class="link" name="update" style="margin-bottom: 50px; width:50%; height:40px;background-color:  rgb(236, 185, 17);" value="Update"></center>

              
            
                
              
</body>
</html>
        
        
        
        
