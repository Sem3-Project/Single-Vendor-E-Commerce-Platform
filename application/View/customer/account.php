<!DOCTYPE html>

<head>
    <title>Account</title>
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width-device-width initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../../../public/css/login.css" />

    <style type="text/css">
        .wrapper {
            width: 50%;
            margin: 0 auto;
            background-color: #f2f2f2;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .page-header h2 {
            margin-top: 0;
        }

        table tr td:last-child a {
            margin-right: 15px;
        }

        .input {
            width: 250%;
            border: 2px solid #e8ebeb;
            border-radius: 5px;
            padding: 5px;
            padding-left: 10px
        }
    </style>

</head>

<body>
    <a href="../../view/customer/HomeCustomer.php"><img class="login" src="../../../public/images/homeic.gif" style="width:6.5%; margin-top:13px; position: relative;"></a>

    <a href="../../view/logout-user.php"><img class="login" src="../../../public/images/logout.gif" style="width:7%; margin-top:13px; margin-left:25px; position: absolute;"></a>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Account Information</h2>
                    </div>
                    <form method="POST" action="#">

                        <table>

                            <tr>
                                <td>Customer ID</td>
                                <td> <input type="text" class="input" name="customer_id" readonly value="<?php echo $customer_id; ?>"></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>First name</td>
                                <td> <input type="text" class="input" name="first_name" value="<?php echo $first_name; ?>"> </td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Last name</td>
                                <td> <input type="text" class="input" name="last_name" value="<?php echo $last_name; ?>"> </td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Card details</td>
                                <td> <input type="text" class="input" name="payment_number" value="<?php echo $payment_number; ?>"> </td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td> <input type="email" class="input" name="email" value="<?php echo $email; ?>"></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Address line 1</td>
                                <td><input type="text" class="input" name="address_line_1" value="<?php echo $address_line_1; ?>"> </td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Address line 2</td>
                                <td><input type="text" class="input" name="address_line_2" value="<?php echo $address_line_2; ?>"> </td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Zip code</td>
                                <td><input type="text" class="input" name="zip_code" value="<?php echo $zip_code; ?>"> </td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td><input type="text" class="input" name="city" value="<?php echo $city; ?>"> </td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>State</td>
                                <td><input type="text" class="input" name="state" value="<?php echo $state; ?>"> </td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Mobile Number</td>
                                <td> <input type="text" class="input" name="mobile_num" value="<?php echo $mobile_num; ?>"></td>
                            </tr>

                        </table>

                        <br><input type="submit" name="update" class="btn btn-primary" style="background-color:rgb(236, 185, 17); color:black; border:rgb(236, 185, 17)" style="margin-bottom: 50px; " value="Update">
                        <br>
                    </form>
                </div>
            </div>
        </div><br>
    </div>
    <br>
</body>

</html>