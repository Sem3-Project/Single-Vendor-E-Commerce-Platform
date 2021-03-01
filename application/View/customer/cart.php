<?php
include "../../controller/DisplayCart.class.php";

//$connector = new DbConnection();

$funObj = new DisplayCart();
$cus_id = $_SESSION['customer_id'];

//$conn = $connector->connect1();
// include '../../model/cart.php';
$cart_product_id = $funObj->getCartProdId($con1, $cus_id);

$maxQty = $funObj->getMaxVarientQty($con1, $cus_id);
if (isset($_POST['delete'])) {

    $chkarr = $_POST['checkbox'];
    foreach ($chkarr as $id) {
        mysqli_query($con1, "DELETE FROM cart_product WHERE cart_product_id=" . $id);
    }
    header("Location:cart.php");
}
if (isset($_POST['proceed'])) {
    //$tot = 0.00;
    $tot = $_POST['price'];
    $chkarr = $_POST['checkbox'];
    foreach ($chkarr as $id) {
        //$tot = $tot + (int)($_POST['qty'])*(float)$price;
        mysqli_query($con1, "UPDATE cart_product SET quantity=" . $_POST['qty'] . ",selected=1 WHERE cart_product_id=" . $id);
    }
    mysqli_query($con1, "UPDATE cart SET total_value=". $tot. " WHERE customer_id=$cus_id");
    //echo $tot;
    header("Location:../../model/account/order_place.php");
}
// if (isset($_POST['total_bill'])) {
//     $sum = 0.00;
//     $chkarr = $_POST['checkbox'];
//     foreach ($chkarr as $id) {
//       //  mysqli_query($conn, "SELECT quantity,price FROM cart_display WHERE cart_product_id=" . $id);
//         $tot = (int)($_POST['qty']) * (float)$price;
//         $sum +=$tot;
//     }
//     echo $tot;
//     header("Location:cart_view.php");
// }
// if (isset($_GET["checkbox"])) {
//     $select = $_GET["checkbox"];
//     $count = count($select);
//     echo $count;
//     // $tot = 0.0;
//     // for ($i = 0; $i < $count; $i++) {

//     // }
// }

?>

<!doctype html>
<html>

<head>
    <title>Shopping Cart</title>
    <!-- <link href='style.css' rel='stylesheet' type='text/css'> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../../../public/css/login.css" />
    
    <!-- <script>
        function calc() {
            var price = document.getElementById("item_price").innerHTML;
            var noItems = document.getElementById("num").value;
            var total = parseFloat(price) * noItems
            if (!isNaN(total))
                document.getElementById("total").innerHTML = total
        }
    </script> -->
    <style type="text/css">
        .wrapper{
            width: 85%;
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
        
    </style>
</head>

<body>
    <a href="HomeCustomer.php"><img class="login" src="../../../public/images/homeic.gif" style="width:6.5%; margin-top:13px;  position: relative;"></a>

    <a href="../../view/logout-user.php"><img class="login" src="../../../public/images/logout.gif" style="width:7%; margin-top:13px;margin-left:25px; position: absolute;"></a>
    <div class="wrapper" style="margin-left:100px">
    <div class='container'>
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    
    
        <form method='post' action='cart.php'>
        <div class="page-header clearfix">
                        <h2 class="pull-left" >Shopping Cart</h2>
        </div>
            <center><p style="background-color:black; color:white; height:40px; padding:10px"><label style="font-size:17px; color:white" > Total : </label> $<input type="text" name="price" id="price" readonly style="border:1px solid black;background-color:black;"/></p></center>
            <!-- <button id="sum" type="button">Calculate</button><br /> -->

            <br><br>
            <table width="100%" class='table table-bordered table-striped'>
                <tr >
                    <th>Select</th>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                    <!-- <th>Total price per product</th> -->
                </tr>

                <?php
                $query = "SELECT * FROM cart_display where customer_id = $cus_id";
                $result = mysqli_query($con1, $query);

                $count = 1;
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['cart_product_id'];
                    $username = $row['product_name'];
                    $quantity = $row['quantity'];
                    $price = $row['price'];
                    if ((int)$maxQty != 0) { ?>
                        <tr id='tr_<?= $id ?>'>
                            <td><input type='checkbox' name='checkbox[]' value=<?php echo $row['cart_product_id'] ?>></td>
                            <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="120" height="120"/>' ?></td>
                            <td><?= $username ?></td>
                            <td><input type=number name='qty' value=<?php echo $row['quantity'] ?> id="num" oninput="calc()" required min=1 max=<?php echo $maxQty ?>></td>
                            <td>$ <span id="item_price"><input type=text value=<?php echo $row['price'] ?> readonly></td>
                            <!-- <td>$<span id="total" name="input[]" value=<--?php echo $row['cart_product_id'] ?>><input type="text" value=<?php echo $row['price'] * $row['quantity'] ?> readonly></span></td> -->
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
            <br><br>
            <input type='submit' id="delete" value='Delete' class="btn btn-primary" name='delete' style="background-color:rgb(236, 185, 17); color:black; border:rgb(236, 185, 17)">
            <input type='submit' id="proceed" value='Place order' class="btn btn-primary" name='proceed' style="background-color:rgb(236, 185, 17); color:black; border:rgb(236, 185, 17)">
            <!-- <input type='submit' id="total_bill" value='Total amount' name='total_bill'>
            $<input type="number" value=<--?php echo 1234 ?> name="tot_amt" readonly> -->
            <!-- <p>Calculated Price: $<input type="text" name="price" id="price" disabled /></p> -->

            <script>
                $(document).ready(function() {

                    function calculateSum() {
                        var sumTotal = 0;
                        $('table tbody tr').each(function() {
                            var $tr = $(this);
                            if ($tr.find('input[type="checkbox"]').is(':checked')) {
                                var $columns = $tr.find('td').next('td').next('td');
                                var $Qnty = parseInt($tr.find('input[type="number"]').val());
                                //var $Cost = parseInt($columns.next('td').html());
                                var $cost = parseInt($tr.find('input[type="text"]').val());
                                sumTotal += $Qnty * $cost;
                            }
                        });
                        $("#price").val(sumTotal);
                    }
                    $('#sum').on('click', function() {
                        calculateSum();
                    });
                    $("input[type='number']").keyup(function() {
                        calculateSum();
                    });
                    $("input[type='checkbox']").change(function() {
                        calculateSum();
                    });
                });
            </script>
        </form>
        <br><br>
    </div>
    </div>

    </div>
   
    </div>
    </div>
    
</body>

</html>

