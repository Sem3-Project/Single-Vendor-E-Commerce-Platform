<?php
include '../controller/DisplayCart.class.php';

$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new DisplayCart();
$result = $funObj->createCart($conn);
if ($result){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th></th>";
                echo "<th>Product</th>";
                echo "<th>Price</th>";
                echo "<th>Image</th>";
                echo "<th>Quantity</th>";
            echo "</tr>";
    
    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
            echo"<td><input type='checkbox' name='item'</td>"; 
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/></td>';
            echo "<td><input type=number value=" . $row['quantity'] . "></td>";
        echo "</tr>";
    }echo "</table>";
}
else{
    echo "You have not added any items to cart";
}  
} 
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

echo "<input type='submit' name='checkout' value='check out'>";
?>