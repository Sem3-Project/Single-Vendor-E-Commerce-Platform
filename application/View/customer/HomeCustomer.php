<?php
include '../../model/Home-customer.model.php';
// $conn=mysqli_connect("localhost","root","","singlevendor");
// $result = mysqli_query($conn,"SELECT * FROM category order by category_name");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../../public/css/newhome.css" />
  <!-- <a href="#">Log in</a><br> -->

</head>

<body>
  <div class="container">
    <form action="HomeCustomer.php" method="POST">
      <a href="../../view/logout-user.php"><img class="login" src="../../../public/images/logout.gif" style="width:7%"></a>
      <a href="cart.view.php"><img class="report" src="../../../public/images/cart.gif" style="width:11.5%; margin-top:70px;"></a>
      <a href="orderPDF.php"><img class="report" src="../../../public/images/order.gif" style="width:11%; margin-top:70px;margin-left:20%"></a>
      <a href="orderPDF.php"><img class="report" src="../../../public/images/orderReport.gif" style="width:15%; margin-top:70px;margin-left:40%"></a>



      <div class="topnav">

        <div class="form-group">
          <select class="form-control" id="category" name="category_id" style="align:left">
            <option value="">Select Category</option>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <option value="<?php echo $row["category_id"]; ?>"><?php echo $row["category_name"]; ?></option>
            <?php
            }
            ?>

          </select>
        </div>

      </div>
      <div class="topnav1">

        <div class="form-group">
          <select class="form-control" id="subcat_id" name="subcat_id">
          </select>
          <br>

        </div>

      </div>

      <input type="submit" name="Search" value="Search" class="search" />






    </form>
    <!-- // -->
    <form action="product_details.php" method="POST">
      <div class='element'><br><br><br><br>
        <h2>Product</h1>

          <?php
          while ($row = mysqli_fetch_array($search_result)) : ?>

            <div class="col-6 col-md-4">
              <div class="col-md-auto">
                <div class="w-100">

                  <div class="container1">
                    <!-- /// image part-->


                    <?php
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" style="width:75%;
        height: 350px;"  class="img1" />'; ?>

                    <center>
                      <div class="content" style='width:75%'>
                        <button name="Select" type="submit" value="<?php echo $row["product_id"]; ?>">

                          <?php
                          echo "<h5 >" . $row['product_name'] . "<br>" . $row['price'] . "</h5>";
                          ?></button>
                      </div>
                    </center>
                  </div><br>
                </div>
              </div>
            </div>
            <!-- //// -->


          <?php endwhile; ?>


      </div>
    </form>

    <!-- /// -->
    <!-- </form> -->
  </div>
  <script>
    $(document).ready(function() {
      $('#category').on('change', function() {
        var category_id = this.value;
        $.ajax({
          url: "../get_subcat.php",
          type: "POST",
          data: {
            category_id: category_id
          },
          cache: false,
          success: function(dataResult) {
            $("#subcat_id").html(dataResult);
          }
        });


      });
    });
  </script>
</body>

</html>
