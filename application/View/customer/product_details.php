<?php
// include '../../controller/DbConnection.class.php';
include '../../controller/product_details.class.php';

// $connector = new DbConnection();
// $conn = $connector->connect();
$funObj = new ProductDetails();

//session_start();
//$product_id=$_POST['Select'];
$product_id=8;
$customer_id=$_SESSION['customer_id'];
$varient_1='';
$varient_2='';
$quantity='';
//echo $_SESSION['product_id'];
// if(isset($_GET['cat'])){
    
//   $get_id = $_GET['cat'];
  

if (isset($_POST['varient1'])){
  $varient1=$_POST['varient1'];
  }
if (isset($_POST['varient2'])){
  $varient2=$_POST['varient2'];
  }
//$product_id=$_POST['Select'];

  
// if ($load){
//     if(mysqli_num_rows($load) > 0){
//         while($row = mysqli_fetch_array($load)){
//             $product_name = $row ['product_name'];
//             $description = $row ['description'];
//             $weight = $row ['weight'];
//             $dimension = $row ['dimension'];
            
// 		}
// 	}
//   //header("Location:product_details.php");
// }

//$result1 = mysqli_query($conn,"SELECT DISTINCT varient_1 FROM varient where product_id = 8");        //need to change


//$result = mysqli_query($conn,"SELECT price,`image`,quantity FROM varient where product_id = 8");


       
       
        //   $query="CALL Selection()";
        //   $search_result=filter($query);
        // }

        
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>  
   <link rel="stylesheet" href="../../../public/css/login2.css" /> 

  
</head>
<body>
<div class="container">

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
        
        <h2><?php echo $product_name?></h2>
        </div>
        <div class='element'>
      
   

	
		
		 </div>
	
        <div class="form-group">
        
        <table width="60%">
        <link href="../../../public/css/table1.css" rel="stylesheet" />
        <tr><td><h5>Description</h5></td><td><?php echo $description?></td></tr>
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
        
        <br><center><input type="submit" class="link" name="search" style="margin-bottom: 50px; width:50%; height:40px;background-color:  rgb(236, 185, 17);" value="Check Available Quantity and Price"></center>
        </div>

        </form>
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