<html>
<head>
<title>Cart</title>
</head>

<div class="cart content-wrapper">
    <h1>Shopping Cart</h1>
    <form action="../../model/cart.php" method="post">
        <table width=100%>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                    <th><th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($num)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: 
                    while($row = mysqli_fetch_array($result)){ ?>
        <tr>
            <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" width="120" height="120"/>' ?></td>
            <td><?php  echo $row['product_name']  ?></td>
            <td><input type=number value=<?php echo $row['quantity']?> min=1>
            <td><?php echo $row['price'] ?></td>
            <td><input type='submit' name='remove' value='Remove'>
        </tr>

    <?php } ?>
    <?php endif; ?>

        </table>
        <div class="buttons">
            <input type="text" value="Total" name="total" readonly>
            <input type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
</div>

</html>