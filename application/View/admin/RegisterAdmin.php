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
        <title>Register admins</title> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
        <link rel="stylesheet" href="../../../public/css/login.css" />
        <style type="text/css">
        .wrapper{
            width: 70%;
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
            width:35%; 
            border:2px solid #e8ebeb; 
            border-radius:5px; 
            padding:5px; 
            padding-left:10px
            
        }
        
        </style>
    </head>
    <body >
    <a href="Homeadmin.php"><img class="login" src="../../../public/images/homeic.gif" style="width:6.5%; margin-top:13px; position: relative;"></a>

    <a href="../../view/logout-user.php"><img class="login" src="../../../public/images/logout.gif" style="width:7%; margin-top:13px; margin-left:25px; position: absolute;"></a>
    <div class="wrapper" >
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
    <center><form method="POST" style="margin-top:90px;fontSize: 25px">
    
    <h2 class="page-header" >Register New Admins</h2>
        Email addresses:
        <select name="email" class="input">
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
                echo '<b>'.$getemail.'</b> is registered as an admin.';
                $result = mysqli_query($conn, "INSERT INTO admin (first_name,last_name,password,email,code,status) SELECT first_name,last_name,password,email,code,status FROM customer where email='$getemail'");  
                $del = mysqli_query($conn,"DELETE FROM customer where email='$getemail'");
            }
               
        ?>
        
        <br><br><br><br>
    </div>
            </div>        
        </div>
        </div>
    </body>
   


</html>
