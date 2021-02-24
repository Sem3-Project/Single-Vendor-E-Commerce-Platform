<?php

include '../../controller/DbConnection.class.php';
$connector = new DbConnection();
$conn = $connector->connect();

//$insert = mysqli_query($conn,"INSERT INTO admin first_name,last_name,password,email,code,status SELECT first_name,last_name,password,email,code,status FROM customer where")

?>

<!DOCTYPE html>
<html lang="en"> 

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../public/css/login.css" />
        <title>Register admins</title> 
    </head>
    <body >
    <a href="Homeadmin.php"><img class="login" src="../../../public/images/homeic.gif" style="width:6.5%; position: relative;"></a>

    <a href="../../view/logout-user.php"><img class="login" src="../../../public/images/logout.gif" style="width:7%; margin-left:25px; position: absolute;"></a>

    <center><form method="POST" style="margin-top:90px;fontSize: 25px">
    
    <h2 class="page-header" >Register New Admins</h2>
        Email addresses:
        <select name="email" width="200px">
        <option disabled selected >-- Select Email Address --</option>
            <?php 
                $records = mysqli_query($conn, "SELECT email From customer"); 
                while($data = mysqli_fetch_array($records)){ 
                    echo "<option value='". $data['email'] ."'>" .$data['email'] ."</option>";  
                }
            ?>  
        </select>
        
        <input type="submit" name="submit" value="Register"/><br><br>

        <?php 
            if (isset($_POST['submit'])){
                $getemail = $_POST['email'];
                echo '<b>Email : </b>'.$getemail;
                $result = mysqli_query($conn, "INSERT INTO admin (first_name,last_name,password,email,code,status) SELECT first_name,last_name,password,email,code,status FROM customer where email='$getemail'");  
                $del = mysqli_query($conn,"DELETE FROM customer where email='$getemail'");
            }
               
        ?>
        
        
    </body>
   


</html>
