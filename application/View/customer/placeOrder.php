<html>
    <head>
    <title>Place order</title>
            <meta charset ="UTF-8">
            <meta name="viewpoint" content="width-device-width initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <h1>Order Confirmation</h1>

    <form method="POST" action="#">
        <table>
            <tr>
                <th>Total amount</th>
                <td><input type="text" name="total_payment"></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <th>Payment method</th>
                <td>
                    <select name="payment_method"></option>
                        <option value="not done">---Select---</option>
                        <option value="CashONDelivery" <?php if($_POST['CashONDelivery']=="CashONDelivery") echo 'selected="selected"'; ?>>Cash on delivery</option>
                        <option value="VISA"  <?php if($_POST['VISA']=="VISA") echo 'selected="selected"'; ?>>Visa</option>
                        <option value="Paypal"<?php if($_POST['Paypal']=="Paypal") echo 'selected="selected"'; ?>>Paypal</option>
                    </select>
                </td>
            </tr>
        </table>
    </form>

</html>