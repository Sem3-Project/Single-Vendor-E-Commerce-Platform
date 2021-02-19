<html>

<head>
    <title>Place order</title>
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width-device-width initial-scale=1.0">
</head>
<h1>Order Confirmation</h1>

<form method="POST" action="#">
    <table>
        <link rel="stylesheet" href="../../public/css/table1.css">
        <tr>
            <th>Total amount</th>
            <td><input type="text" name="total_payment" readonly></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><input type="text" name="address" readonly></td>
        </tr>
        <tr>
            <th>Payment method</th>
            <td>
                <select name="payment_method"></option>
                    <option value="not done">---Select---</option>
                    <option value="CashONDelivery" <?php if ($_POST['CashONDelivery'] == "CashONDelivery") echo 'selected="selected"'; ?>>Cash on delivery</option>
                    <option value="VISA" <?php if ($_POST['VISA'] == "VISA") echo 'selected="selected"'; ?>>Visa</option>
                    <option value="Paypal" <?php if ($_POST['Paypal'] == "Paypal") echo 'selected="selected"'; ?>>Paypal</option>
                </select>
            </td>
        </tr>
    </table>
    <input type="submit" value="Back" name="back" readonly>
    <input type="submit" value="Confirm" name="confirm">
</form>

</html>