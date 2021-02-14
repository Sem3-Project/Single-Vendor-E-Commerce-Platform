 <?php
// include '../../model/product_update_model.php';
include '../../controller/DbConnection.class.php';
?>
<!DOCTYPE html>
<head>
<html lang="en">
<meta charset="utf-8">
<title>Update the Product</title>
<link rel ="stylesheet" type="text/css" href="../../../public/CSS/product_update.css">
</head>

<body>
<!-- <form action="#" id="pupdate" method="POST" name="pupdate"> -->
<div class= contain>
    <h1>Update the product</h1>
<form action="" method="POST">
    <table>
    <tr>
    <td>
        <label for="product_name">Product name:</label><br><br>
        <input type="text" id="product_name" name="product_name" ><br><br>
        <input type="submit" class="link" name="search" style="margin-bottom: 50px;" id="search" value="search">

</form>
        <?php
        // $connector = new DbConnection();
        // $conn = $connector->connect();
        $conn=mysqli_connect("localhost","root","","");
        $db=mysqli_select_db($conn,'singlevendor');

        if(isset($_post['search'])){
            $product_name=$_post['product_name'];

            $query="SELECT * FROM 'product' where product_name='$product_name' ";
            $query_run=mysqli_query($conn,$query);

            while ($row = mysqli_fetch_array($query_run)){
                ?>
                <form action="" method="POST">
                <input type="hidden" name="product_name" value="<?php echo $row['product_name']?>"/><br><br>
                <input type="text" id="dimension" name="dimension" value="<?php echo $row['dimension']?>"><br><br>
                <input type="number" step="any" id="weight" name="weight" value="<?php echo $row['weight']?>"><br><br>
                <input type="text" style="width:250px;height:90px;" id="description" name="description" value="<?php echo $row['description']?>"><br><br>

                <input type="submit" class="link" name="update" style="margin-bottom: 50px;" id="update" value="Update">
<!-- <table>

    <tr>
    <td>
    <input type="hidden" name="product_name" value="<?php echo $row['product_name']?>"/><br><br>
    
    </td>
    </tr>
    <tr>
    <td>
        <label for="dimension">Product Dimensions:</label><br><br>
        <input type="text" id="dimension" name="dimension" value="<?php echo $row['dimension']?>"><br><br>
    </td>
    </tr>

    <tr>
    <td>
        <label for="weight">Product Weight(grams):</label><br><br>
        <input type="number" step="any" id="weight" name="weight" value="<?php echo $row['weight']?>"><br><br>
    </td>
    <tr>
    <td>
        <label for="description">About this product:</label><br><br>
        <input type="text" style="width:250px;height:90px;" id="description" name="description" value="<?php echo $row['description']?>"><br><br>
    </td>
    <tr>
</table> -->



</form>
                <?php
            }
        }
        
        ?>

</body>
</html>
