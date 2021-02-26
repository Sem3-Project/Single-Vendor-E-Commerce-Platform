<html>

<head>
    <title>Cart</title>
    <!-- <script src="../../../public/js/jquery.js"></script> -->
    <?php
    // if (isset($_POST['remove'])) {

    //     if (isset($_POST['delete'])) {
    //         foreach ($_POST['delete'] as $deleteid) {

    //             $deleteItem = "DELETE from cart_product WHERE id=" . $deleteid;
    //             mysqli_query($conn, $deleteItem);
    //         }
    //     }
    // }
    if (isset($_POST['delete'])) {

        $chkarr = $_POST['checkbox'];
        foreach($chkarr as $id){
            mysqli_query($conn, "DELETE FROM cart_product WHERE cart_product_id=".$id);
        }
        header("Location:cart_view.php");
     }
    ?>
</head>

    <h1>Shopping Cart</h1>
    <div class='container'>
        <form action="cart.view.php" method="post">
            <input type='submit' name=delete' id = "delete" value='Remove from Cart'>
            <table width=100%>
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Unit price</th>
                        <th>Total price per product</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <--?php if (empty($num)) : ?>
                        <tr>
                            <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                        </tr>
                        <--?php else : -->
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            $id = $row['cart_product_id']; ?>
                            <script>
                                function calc() {
                                    var price = document.getElementById("item_price").innerHTML;
                                    var noItems = document.getElementById("num").value;
                                    var total = parseFloat(price) * noItems
                                    if (!isNaN(total))
                                        document.getElementById("total").innerHTML = total
                                }
                            </script>
                            <tr id='tr_<?= $id ?>'>
                                <td><input type='checkbox' name='checkbox[]' value=value=<?php echo $row['cart_product_id'] ?>></td>
                                <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="120" height="120"/>' ?></td>
                                <td><?=$row['product_name']  ?></td>
                                <td><input type=number value=<?php echo $row['quantity'] ?> id="num" oninput="calc()" required min=1 max=<?php echo $maxQty ?>></td>
                                    <!-- <script>
                                    $('input[type="number"]').keydown(function(e) {
                                        e.preventDefault();
                                    });
                                </script> -->

                                
                                <td>$<span id="item_price"><?php echo $row['price'] ?></td>
                                <td>$<span id="total"><input type="text" value=<?php echo $row['price'] * $row['quantity'] ?> readonly></span></td>
                            </tr>

                        <!-- <--?php }endif; ?> -->
            </table>
            <!-- <div class="buttons">
                <input type="text" placeholder="Total" name="total" readonly>
                <input type="submit" value="Place Order" name="placeorder">
            </div> -->
        </form>
    </div>

<?php }?>

</html>