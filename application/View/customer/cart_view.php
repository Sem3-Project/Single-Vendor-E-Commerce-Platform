<?php
include "../../controller/DisplayCart.class.php";

$connector = new DbConnection();

$funObj = new DisplayCart();
$cus_id = 15;

$conn = $connector->connect1();
// include '../../model/cart.php';
$cart_product_id = $funObj->getCartProdId($conn, $cus_id);

$maxQty = $funObj->getMaxVarientQty($conn, $cus_id);
if (isset($_POST['delete'])) {

    $chkarr = $_POST['checkbox'];
    foreach ($chkarr as $id) {
        mysqli_query($conn, "DELETE FROM cart_product WHERE cart_product_id=" . $id);
    }
    header("Location:cart_view.php");
}
if (isset($_POST['proceed'])) {
    $tot = 0;
    $chkarr = $_POST['checkbox'];
    foreach ($chkarr as $id) {
      //  $tot = $tot + (int)(($_POST['qty'])*$price);
        mysqli_query($conn, "UPDATE cart_product SET quantity=".$_POST['qty']." WHERE cart_product_id=" . $id);
    }
   // echo $tot;
    header("Location:cart_view.php");
}
?>

<!doctype html>
<html>

<head>
    <title>Shopping Cart</title>
    <!-- <link href='style.css' rel='stylesheet' type='text/css'> -->
    <h1>Shopping Cart</h1>
    <script>
        function calc() {
            var price = document.getElementById("item_price").innerHTML;
            var noItems = document.getElementById("num").value;
            var total = parseFloat(price) * noItems
            if (!isNaN(total))
                document.getElementById("total").innerHTML = total
        }
    </script>
</head>

<body>
    <div class='container'>
        <form method='post' action='cart_view.php'>
        <label><h3>Total: </h3></label>

            <table width="100%">
                <tr style='background: whitesmoke;'>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                    <th>Total price per product</th>
                    <th>&nbsp;</th>
                </tr>

                <?php
                $query = "SELECT * FROM cart_display where customer_id = $cus_id";
                $result = mysqli_query($conn, $query);

                $count = 1;
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['cart_product_id'];
                    $username = $row['product_name'];
                    $quantity = $row['quantity'];
                    $price = $row['price'];
                ?>
                    <tr id='tr_<?= $id ?>'>
                        <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="120" height="120"/>' ?></td>
                        <td><?= $username ?></td>
                        <td><input type=number name='qty' value=<?php echo $row['quantity'] ?> id="num" oninput="calc()" required min=1 max=<?php echo $maxQty ?>></td>
                        <td>$<span id="item_price"><?php echo $row['price'] ?></td>
                        <td>$<span id="total" name="input[]" value=<?php echo $row['cart_product_id'] ?>><input type="text" value=<?php echo $row['price'] * $row['quantity'] ?> readonly></span></td>

                        <!-- Checkbox -->
                        <td><input type='checkbox' name='checkbox[]' value=<?php echo $row['cart_product_id'] ?>></td>

                    </tr>
                <?php
                }
                ?>
            </table>
            <input type='submit' id="delete" value='Delete' name='delete'>
            <input type='submit' id="proceed" value='Place order' name='proceed'>

        </form>
    </div>
</body>

</html>