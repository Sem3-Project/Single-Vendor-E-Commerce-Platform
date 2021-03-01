<html>

<head>
    <title>Place order</title>
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width-device-width initial-scale=1.0">
</head>
<h1>Order Confirmation</h1>

<form method="POST" action="#">
    <table width=100%>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <!-- <--?php if (empty($num)) : ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no orders placed yet</td>
                </tr>
                <--?php else : -->
            <?php
            while ($rows = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($rows['image']) . '" width="120" height="120"/>' ?></td>
                    <td><?php echo $rows['quantity'] ?> </td>
                </tr>

            <?php } ?>
            <!-- <--?php endif; ?> -->

    </table>
</form>

<br>
</form>

<form method="POST" action="#" autocomplete="off">
    <table>
        <link rel="stylesheet" href="../../public/css/table1.css">
        <tr>
            <th>Total amount</th>
            <td><?php echo $total_payment ?></td>
        </tr>
        <tr>
            <th>Zip Code</th>
            <td><input type="text" value="<?php echo $zip_code ?>" name="zip_code" required></td>
        </tr>
        <tr>
            <th>Address Line 1</th>
            <td><input type="text" value="<?php echo $address_line_1 ?>" name="address_line_1" required></td>
        </tr>
        <tr>
            <th>Address Line 2</th>
            <td><input type="text" value="<?php echo $address_line_2 ?>" name="address_line_2"></td>
        </tr>
        <tr>
            <th>Main City</th>
            <td><input type="text" value="<?php echo $city ?>" name="city" required></td>
        </tr>
        <tr>
            <th>State</th>
            <td><input type="text" value="<?php echo $state ?>" name="state" required></td>
        </tr>
        <tr>
            <th>Payment method</th>
            <td>
                <select name="payment_method" required>
                    <option value="not selected">---Select---</option>
                    <option value="CashONDelivery">Cash on delivery</option>
                    <option value="VISA">Visa</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Delivery method</th>
            <td>
                <select name="delivery_method" required>
                    <!-- <option value="not selected">---Select---</option> -->
                    <option value="Postal">Postal</option>
                    <option value="Courier">Courier</option>
                    <option value="In-store_pickup">In store pickup</option>
                </select>
            </td>
        </tr>
    </table>
    <input type="submit" value="Back" name="back" readonly>
    <input type="submit" value="Confirm" name="confirm">
</form>

</html>