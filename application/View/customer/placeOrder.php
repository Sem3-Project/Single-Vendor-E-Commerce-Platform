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
            <?php if (empty($num)) : ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no orders placed yet</td>
                </tr>
                <?php else :
                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="120" height="120"/>' ?></td>
                        <td><input type=text value=<?php echo $row['quantity'] ?> readonly>
                    </tr>

                <?php } ?>
            <?php endif; ?>

    </table>
</form>

<br>
</form>

<form method="POST" action="#">
    <table>
        <link rel="stylesheet" href="../../public/css/table1.css">
        <tr>
            <th>Total amount</th>
            <td><input type="text" name="total_payment" readonly></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><input type="text" name="address" readonly value=""></td>
        </tr>
        <tr>
            <th>Payment method</th>
            <td>
                <select name="payment_method">
                    <option value="not done">---Select---</option>
                    <option value="CashONDelivery">Cash on delivery</option>
                    <option value="VISA">Visa</option>
                    <option value="Paypal">Paypal</option>
                </select>
            </td>
        </tr>
    </table>
    <input type="submit" value="Back" name="back" readonly>
    <input type="submit" value="Confirm" name="confirm">
</form>

</html>