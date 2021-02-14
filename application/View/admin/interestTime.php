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
        <link rel="stylesheet" href="../../../public/css/login2.css" />
        <title>Most interst time period</title> 
    </head>
    <body >

    <center><form method="POST" style="margin-top:90px;fontSize: 25px">
    
    <h2 class="page-header" >Most intersted time period/s to a product</h2>
        Product:
        <select name="product" width="200px">
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
        
        <table align="center" border="1px" style="width:700px; line-height:40px; background-color:white"> 
	        <tr> 
		        <th> Product </th> 
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
    </body>
   
</html>