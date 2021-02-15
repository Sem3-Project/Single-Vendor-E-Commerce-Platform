<?php
include '../controller/DisplayCart.class.php';
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">';
$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new DisplayCart();
// $funObj1 = new SignInRegister();
// $output = $funObj1->login();
echo '<title>Cart</title>';
$result = $funObj->createCart($conn,15); //set session to get customer id==========================
if ($result){
    if(mysqli_num_rows($result) > 0){
        echo "<table width='100%'>";
            echo "<tr>";
                echo "<th></th>";
                echo "<th>Product</th>";
                echo "<th>Name</th>";
                echo "<th>Unit price</th>";
                echo "<th>Quantity</th>";
                echo "<th></th>";
            echo "</tr>";
    
    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
            echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" width="150" height="150"/></td>';
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";  
            echo "<td><input type=number value=" . $row['quantity'] . " min=1></td>";
            echo "<td><input type='submit' name='remove' value='Remove'></td>";
        echo "</tr>";

        if(isset($_POST['remove'])){
            $funObj->removeItem($conn,8);
        }

    }echo "</table>";
}
else{
    echo "You have not added any items to cart";
}  
} 
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

echo "<input type='submit' name='buy' value='Buy' style='float: right;'>";
?>
<html>
<input type='button' name='home' value='Home' style='float: left' onClick="document.location.href='../../index.php'">

</html>
<!-- 
<input type="button" value="Home" class="homebutton" id="btnHome" 
onClick="document.location.href='some/page'" /> -->

<!-- //////////////////not working///////////////////////////

if(isset($_POST['buy'])){
    header("Location: ../view/customer/placeOrder.php");
}

if(isset($_POST['home'])){
  
    header("Location: ../../index.php");
}

?> -->