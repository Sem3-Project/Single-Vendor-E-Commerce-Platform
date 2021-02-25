<html>

<head>
    <title>Cart</title>
</head>

<div class="cart content-wrapper">
    <h1>Shopping Cart</h1>
    <form action="../../model/cart.php" method="post">
    <input type='submit' name='remove' value='Remove from Cart'>
        <table width=100%>
            <thead>
                <tr>
                    <th></th>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                    <th>Total price per product</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($num)) : ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                    </tr>
                    <?php else :
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><input type="checkbox" name="checkbox[]" value=<?php echo $row['customer_id']?>></td>
                            <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="120" height="120"/>' ?></td>
                            <td><?php echo $row['product_name']  ?></td>
                            <td><input type=number value=<?php echo $row['quantity'] ?> min=1 max="">
                            <td><?php echo $row['price'] ?></td>
                            <td></td>
                            <td>
                                <!-- <input type='submit' name='remove' value='Remove'> -->

                                <?php if (isset($_POST['remove'])) {
                                    $remove = $funObj->removeItem($conn, $cart_product_id);

                                    if ($remove) {
                                        echo "Records were deleted successfully.";
                                    } else {
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                    }
                                    // header("location:cart.php");  
                                } ?>
                            </td>
                        </tr>

                    <?php } ?>
                <?php endif; ?>

        </table>
        <div class="buttons">
            <input type="text" placeholder="Total" name="total" readonly>
            <input type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
</div>

</html>