<?php
// include '../../controller/DbConnection.class.php';
include '../../controller/product_details.class.php';

// $connector = new DbConnection();
// $conn = $connector->connect();
$funObj = new ProductDetails();


$product_id=$_POST['Select'];
//session_start();
$_SESSION['product_id'] = $_POST['Select']; 

  
//$product_id=8;
$customer_id=$_SESSION['customer_id'];

$varient_1='';
$varient_2='';
$quantity='';
//echo $_SESSION['product_id'];
// if(isset($_GET['cat'])){
    
//   $get_id = $_GET['cat'];
  

if (isset($_POST['varient_1'])){
  $varient1=$_POST['varient_1'];
  }
if (isset($_POST['varient_2'])){
  $varient2=$_POST['varient_2'];
  }

  

        
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../../../public/css/login.css" />
  
  <style type="text/css">
  .wrapper{
      width: 80%;
      margin: 0 auto;
      background-color: #f2f2f2;
      margin-top: 20px;
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
      width:250%; 
      border:2px solid #e8ebeb; 
      border-radius:5px; 
      padding:5px; 
      padding-left:10px
    
  }
  
</style>
  
</head>
<body>
  <a href="HomeCustomer.php"><img class="login" src="../../../public/images/homeic.gif" style="width:6.5%; margin-top:13px; position: relative;"></a>

  <a href="../../view/signin/logout-user.php"><img class="login" src="../../../public/images/logout.gif" style="width:7%; margin-top:13px; margin-left:25px; position: absolute;"></a>


<div class="container">
<div class="wrapper" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
	<form action="product_details1.php" method="POST">
		<div class="form-group">
        <br><br>
        <?php
        $cart_id=$funObj->getCartId($con1, $customer_id);
        $load = $funObj->loadProduct($con1,$product_id);

//if ($varient_1!='' || $varient_2!='') {
  if ($load){
      if(mysqli_num_rows($load) > 0){
          while($row = mysqli_fetch_array($load)){
              $product_name = $row ['product_name'];
              $description = $row ['description'];
              $weight = $row ['weight'];
              $dimension = $row ['dimension'];
              
      }
    }
    //header("Location:product_details.php");
  }?>
        
        <center><h2><?php echo $product_name?></h2></center>
        </div>
        <br>
        <center>  
      <?php
      $result= mysqli_query($con1,"SELECT DISTINCT `image` FROM varient where product_id = $product_id");
      while($row = mysqli_fetch_array($result)) {
      echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" style="width:40%;
        height: 350px;"  class="img1" />'; }?>
      </center>
      
      <br>
	
        <div class="form-group">
        
        <table width="60%" class='table table-bordered table-striped'>
        <!--link href="../../../public/css/table1.css" rel="stylesheet" /-->
        <tr><td style="width:15%"><h5>Description</h5></td><td><?php echo $description?></td></tr>
        <tr><td><h5>Weight</h5></td><td><?php echo $weight?></td></tr>
        <tr><td><h5>Dimention</h5></td><td><?php echo $dimension?></td></tr>

        <tr><td><h5>Variant Type 1</h5></td><td>
        <select class="form-control" id="varient_1" name="varient_1">
		  <option value="">Select Variant Type 1</option>
		    <?php
        $result1 = mysqli_query($con1,"SELECT DISTINCT varient_1 FROM varient where product_id = $product_id");
			while($row = mysqli_fetch_array($result1)) {
			?>
				<option value="<?php echo $row["varient_1"];?>" <?php if ($row["varient_1"]==$varient_1){ echo 'selected';} ?>><?php echo $row["varient_1"];?></option>
			<?php
			}
			?>
			 </select>
        </td></tr>
        <tr><td><h5>Variant Type 2</h5></td><td>
        <select class="form-control" id="varient_2" name="varient_2">
		  <option value="">Select Variant Type 2</option>
		    <?php
        $result2 = mysqli_query($con1,"SELECT DISTINCT varient_2 FROM varient where product_id = $product_id");
			while($row = mysqli_fetch_array($result2)) {
			?>
				<option value="<?php echo $row["varient_2"];?>" <?php if ($row["varient_2"]==$varient_2){ echo 'selected';} ?>><?php echo $row["varient_2"];?></option>
			<?php
			}
			?>
			 </select>
        </td></tr></table>
        
        <br><input type="submit"  name="search" class="btn btn-success pull-right" style="background-color:rgb(236, 185, 17); color:black; border:rgb(236, 185, 17);margin-right:35%" value="Check Available Quantity and Price">
        
        <br><br><br><br>
                          
        </div>

        </form>
        </div>
            </div>        
        </div>
    </div>
        <!-- <form action="" method="POST">
       
        
        <table>
        <tr><td><h5>Available Quantity</h5></td><td>
        <?php
         if(isset($_POST['search'])){
          // $product_name=$_POST['product_name'];
          $varient_1=$_POST['varient_1'];
          $varient_2=$_POST['varient_2'];
          
          
          
          
          $query="SELECT quantity,price FROM `varient` where (product_id=$product_id and varient_1='$varient_1' and varient_2='$varient_2')";
          $search_result=mysqli_query($con1,$query);
          
          //header("Location:product_details.php");
          //$search_result=filter($query);
        }
        
			while($row=mysqli_fetch_array($search_result)):?>
				<?php echo $row ['quantity'];?><?php
			
			?></td></tr>
        <tr><td><h5>Unit Price</h5></td><td>
		
        <?php echo $row ['price'];?><?php
			
			?><?php endwhile;?>
      </td></tr>
      <tr><td><h5>Quantity</h5></td><td><input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Select Quantity" required>   </td></tr>
        </table>
       <?php 
      
        $varient_id=$funObj->getVarientId($con1, $product_id,$varient_1,$varient_2);
        if(isset($_POST['confirm'])){
    
          //$quantity=$_POST['quantity'];
         
          mysqli_query($con1,"INSERT INTO cart_product(cart_id,varient_id,product_id,quantity) VALUES ('$cart_id','$varient_id','$product_id',".$_POST['quantity'].")");
         // header("Location:product_details.php");
        }?>
                 
        
        <br><center><input type="submit" class="link" name="confirm" style="margin-bottom: 50px; width:50%; height:40px;background-color:  rgb(236, 185, 17);" value="Add to Cart"></center>
        
        </div>
		</form> --> 


</body>
</html>
