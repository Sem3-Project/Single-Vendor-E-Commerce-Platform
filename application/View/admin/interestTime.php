<?php
include '../../controller/DbConnection.class.php';
$connector = new DbConnection();
$conn = $connector->connect();
?>

<!DOCTYPE html>
<html lang="en"> 

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Most interst time period</title> 
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

    <a href="../../view/signin/logout-user.php"><img class="login" src="../../../public/images/logout.gif" style="width:7%; margin-top:13px; margin-left:25px; position: absolute;"></a>
    <div class="wrapper" >
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
    <center><form method="POST" style="margin-top:90px;fontSize: 25px">
    
        
    <h2 class="page-header" >Most Intersted Time Period/s to a Product</h2>
        Product:
        <select name="product" class="input">
        <option disabled selected >-- Select Product --</option>
            <?php 
                $records = mysqli_query($conn, "SELECT DISTINCT product_name as product From yearmonth"); 
                while($data = mysqli_fetch_array($records)){ 
                    echo "<option value='". $data['product'] ."'>" .$data['product'] ."</option>";  
                }
            ?>  
        </select>
        
        <input type="submit" name="submit" value="Search"/><br><br>

        <?php 
            if (isset($_POST['submit'])){
                $getproduct = $_POST['product'];
                echo '<b>Product : </b>'.$getproduct;
                $result = mysqli_query($conn, "SELECT year,month from yearmonth where product_name='$getproduct' and yearCount=(select max(yearCount) from yearmonth where product_name='$getproduct')");  
        ?>
        
        <table class='table table-bordered table-striped'> 
	        <tr > 
		        <th > Product </th> 
                <th> Year </th> 
                <th> Month </th> 
			</tr> 
		
            <?php   while($data = mysqli_fetch_array($result)){ 
                $month_name = date("F", mktime(0, 0, 0, $data['month'], 10)); 
            ?>

            <tr align="center"> 
                <td><?php echo $getproduct; ?></td> 
                <td><?php echo $data['year']; ?></td> 
                <td><?php echo $month_name; ?></td> 
            </tr> 
            <?php   
                }   
            }  
            ?>   
        </form></center>
        <center><div style="width:600px;hieght:auto;text-align:center;margin-top:50px">
        </div> </center> 
    
    </table>
    <br><br><br><br>
    </div>
            </div>        
        </div>
        </div>
    </body>
   


</html>

