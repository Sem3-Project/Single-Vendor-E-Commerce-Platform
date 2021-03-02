<html>

<head>
    <title>Place order</title>
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width-device-width initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../../../public/css/login.css" />
    
    <style type="text/css">
        .wrapper{
            width: 90%;
            margin: 0 auto;
            background-color: #f2f2f2;
            margin-top: 40px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
        .input{
            width:100%; 
            border:2px solid #e8ebeb; 
            border-radius:5px; 
            padding:5px; 
            padding-left:10px
           
        }
        
    </style>
</head>
<body>
    <a href="../../view/customer/HomeCustomer.php"><img class="login" src="../../../public/images/homeic.gif" style="width:6.5%; margin-top:13px;  position: relative;"></a>

    <a href="../../view/logout-user.php"><img class="login" src="../../../public/images/logout.gif" style="width:7%; margin-top:13px;margin-left:25px; position: absolute;"></a>
    <div class="wrapper" style="margin-left:100px">
    <div class='container'>
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="page-header clearfix">
                    <h2 class="pull-left" >Order Confirmation</h2>
                </div>  

<form method="POST" action="#">
    <table class='table table-bordered table-striped' >
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

<form method="POST" action="#">
    <table class='table table-bordered table-striped'>
        
        <tr>
            <th>Total amount</th>
            <td><?php echo $total_payment ?></td>
        </tr>
        <tr>
            <th>Zip Code</th>
            <td><input type="text" class="input" value="<?php echo $zip_code ?>" name="zip_code" required></td>
        </tr>
        <tr>
            <th>Address Line 1</th>
            <td><input type="text" class="input" value="<?php echo $address_line_1 ?>" name="address_line_1" required></td>
        </tr>
        <tr>
            <th>Address Line 2</th>
            <td><input type="text" class="input" value="<?php echo $address_line_2 ?>" name="address_line_2"></td>
        </tr>
        <tr>
            <th>Main City</th>
            <td><input type="text" class="input" value="<?php echo $city ?>" name="city" required></td>
        </tr>
        <tr>
            <th>State</th>
            <td><input type="text" class="input" value="<?php echo $state ?>" name="state" required></td>
        </tr>
        <tr>
            <th>Payment method</th>
            <td>
                <select name="payment_method" required class="input">
                    <!-- <option value="not selected">---Select---</option> -->
                    <option value="CashONDelivery">Cash on delivery</option>
                    <option value="VISA">Visa</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Delivery method</th>
            <td>
                <select name="delivery_method" required class="input">
                    <!-- <option value="not selected">---Select---</option> -->
                    <option value="Postal">Postal</option>
                    <option value="Courier">Courier</option>
                    <option value="In-store_pickup">In store pickup</option>
                </select>
            </td>
        </tr>
    </table>
    <input type="submit" value="Back" name="back" readonly class="btn btn-primary" style="background-color:rgb(236, 185, 17); color:black; border:rgb(236, 185, 17)">
    <input type="submit" value="Confirm" name="confirm" class="btn btn-primary" style="background-color:rgb(236, 185, 17); color:black; border:rgb(236, 185, 17)">
</form>
</div>
    </div>

    </div>
   
    </div>
    </div>
    
</body>
</html>