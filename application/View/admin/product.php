<!doctype html>
<?php
// include '../../controller/DbConnection.class.php';
// try{
//     $connector = new DbConnection();
//     $conn = $connector->connect();

// }catch(Exception $ex){
//     echo 'Error in connecting';
// }

$host="localhost";
$user = "root";
$password = "";
$productbase = "singlevendor";

$product_name="";
$dimension="";
$weight="";
$description="";
$category_name="";
$category_id="";
$category_name="";
$subcat_id="";
$subcat_name="";
$varient_id="";
$SKU="";
$price="";
$image="";
$varient_1="";
$varient_2="";
$quantity="";

// connect to mysql productbase
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try{
    $connect = mysqli_connect($host, $user, $password, $productbase);
    
}catch(Exception $ex){
    echo 'Error in connecting';
}

//get product from the form
function getproduct(){
    $product=array();
    $product[0]=$_POST['product_name'];
    $product[1]=$_POST['dimension'];
    $product[2]=$_POST['weight'];
    $product[3]=$_POST['description'];
    $product[4]=$_POST['category_id'];
    $product[5]=$_POST['category_name'];
    $product[6]=$_POST['subcat_id'];
    $product[7]=$_POST['subcat_name'];
    $product[8]=$_POST['varient_id'];
    $product[9]=$_POST['SKU'];
    $product[10]=$_POST['price'];
    $product[11]=$_POST['image'];
    $product[12]=$_POST['varient_1'];
    $product[13]=$_POST['varient_2'];
    $product[14]=$_POST['quantity'];
   
    return $product;
}

//search
if(isset($_POST['Search'])){
    $info=getproduct();
    // $search_query="SELECT * FROM `product`,`category` WHERE (product_name='$info[0]' and `category`.category_id='$info[4]') ";
    // $search_query="SELECT * FROM `product` inner join `category` using (category_id) WHERE product_name='$info[0]'";
    // $search_query="SELECT * FROM ((`product` NATURAL INNER JOIN `category`) NATURAL INNER JOIN `subcategory`)NATURAL INNER JOIN `varient`  WHERE (product_name='$info[0]' and varient_1='$info[12]'and varient_2='$info[13]')";
    $search_query="SELECT * FROM ((`product` NATURAL INNER JOIN `category`) NATURAL INNER JOIN `subcategory`)NATURAL INNER JOIN `varient`  WHERE (product_name='$info[0]')";
    $search_query2="SELECT * FROM `varient` natural Inner join `product`   WHERE (varient_1='$info[12]'and varient_2='$info[13]')";
    // $search_query="SELECT * FROM `product` WHERE product_name='$info[0]' ";
    $search_result=mysqli_query($connect,$search_query);
        if($search_result){
            if($search_result){
                if(mysqli_num_rows($search_result)){
                    while($row = mysqli_fetch_array($search_result)){
        
                        $product_name=$row['product_name'];
                        $product_id=$row['product_id'];
                        $dimension=$row['dimension'];
                        $weight=$row['weight'];
                        $description=$row['description'];
                        $category_id=$row['category_id'];
                        $category_name=$row['category_name'];
                        $subcat_id=$row['subcat_id'];
                        $subcat_name=$row['subcat_name'];
                        // $varient_id=$row['varient_id'];
                        // $SKU=$row['SKU'];
                        // $price=$row['price'];
                        // $image=$row['image'];
                        // $varient_1=$row['varient_1'];
                        // $varient_2=$row['varient_2'];
                        // $quantity=$row['quantity'];
                        
                
                    }
                }else{
                    echo("no product are available");
                }
        }else{
            echo("result error");
        }
    }

    $search_result2=mysqli_query($connect,$search_query2);
    if($search_result2){
        if($search_result2){
            if(mysqli_num_rows($search_result2)){
                while($row = mysqli_fetch_array($search_result2)){
    
                    // $product_name=$row['product_name'];
                    // $dimension=$row['dimension'];
                    // $weight=$row['weight'];
                    // $description=$row['description'];
                    // $category_id=$row['category_id'];
                    // $category_name=$row['category_name'];
                    // $subcat_id=$row['subcat_id'];
                    // $subcat_name=$row['subcat_name'];
                    $varient_id=$row['varient_id'];
                    $SKU=$row['SKU'];
                    $price=$row['price'];
                    $image=$row['image'];
                    $varient_1=$row['varient_1'];
                    $varient_2=$row['varient_2'];
                    $quantity=$row['quantity'];
                    
            
                }
            }else{
                echo("no varient are available");
            }
    }else{
        echo("result error");
    }
}

}


//insert
// if(isset($_POST['Insert'])){
//     $info=getproduct();
//     $insert_query="INSERT INTO `product`(`product_name`, `dimension`, `weight`, `description`) 
//     VALUES ('$info[0]','$info[1]','$info[2]','$info[3]') ";
//     try{
//         $insert_result=mysqli_query($connect,$insert_query);
//         if($insert_result){
//             if(mysqli_affected_rows($connect)>0){
//                 echo("product inserted successfully");

//             }else{
//                 echo("product are not inserted");
//             }
//         }
//     }catch(Exception $ex){
//         echo("error inserted".$ex->getMessage());
//     }
// }

//update
// if(isset($_POST['Update'])){
//     $info=getproduct();
//     $update_query="UPDATE `product` SET `product_name`='$info[0]',`dimension`='$info[1]',`weight`='$info[2]',`description`='$info[3]'  
//     WHERE product_name='$info[0]'";

//     try{
//         $pdate_result=mysqli_query($connect,$update_query);
//         if($pdate_result){
//             if(mysqli_affected_rows($connect)>0){
//                 echo("product updated");
//             }else{
//                 echo("product not updated");
//             }
//         }
//     }catch(Exception $ex){
//         echo("error in update".$ex->getMessage());
//     }
// }


?>

<html>
<head>
<meta charset="UTF-8">
<title>product</title>
</head>


<body>
<h1>Product Update</h1>

<form method="POST" action="product.php">
<input type="text" name="product_name" placeholder="Product name" value="<?php echo($product_name);?>"><br><br>
<input type="text" name="varient_1" placeholder="varient 1 " value="<?php echo($varient_1);?>"><br><br>
<input type="text" name="varient_2" placeholder="varient 2" value="<?php echo($varient_2);?>"><br><br>

<input type="submit" name="Search" value="Search">
<!-- <input type="submit" name="Update" value="Update"><br><br> -->

<table >
        <tr>
            <td>
            dimension
            <input type="text" name="dimension" placeholder="dimension" value="<?php echo($dimension);?>"><br><br>
                    
                
            </td>
            <td>
            weight
                <input type="text" name="weight" maxlength="10" value="<?php echo($weight);?>">
            </td>
            </tr>
            <tr>
            <td>
            description
                <input type="text" name="description"  value="<?php echo($description);?>">
            </td>

            
 
        </tr>
        <tr>
            <td>
            category_id
                <input type="text" name="category_id"  value="<?php echo($category_id);?>">
            </td>

            <td>
            category_name
                <input type="text" name="category_name"  value="<?php echo($category_name);?>">
            </td>

            
 
        </tr>

        <tr>
            <td>
            sub category_id
                <input type="text" name="subcat_id"  value="<?php echo($subcat_id);?>">
            </td>

            <td>
            subcategory_name
                <input type="text" name="subcat_name"  value="<?php echo($subcat_name);?>">
            </td>

            
 
        </tr>


        <tr>
            <td>
            SKU
                <input type="text" name="SKU"  value="<?php echo($SKU);?>">
            </td>

            <td>
            price
                <input type="text" name="price"  value="<?php echo($price);?>">
            </td>

            
 
        </tr>

        <tr>
            <td>
            varient_1
                <input type="text" name="varient_1"  value="<?php echo($varient_1);?>">
            </td>

            <td>
            varient_2
                <input type="text" name="varient_2"  value="<?php echo($varient_2);?>">
            </td>

            
 
        </tr>

        <tr>
            <td>
            varient_id
                <input type="text" name="varient_id"  value="<?php echo($varient_id);?>">
            </td>

            <td>
            quantity
                <input type="text" name="quantity"  value="<?php echo($quantity);?>">
            </td>

            
 
        </tr>
    </table>
<br><br>
    
    <br><br>

    <!-- <div>
        <input type="submit" name="Insert" value="Save"> 
         
    </div> -->

</form>
</body>

</html>