<?php
$conn=mysqli_connect("localhost","root","","demo");
$image = $varient_1="";
$varient_2_err=$quantity_err ="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
$input_varient_1 = trim($_POST["varient_1"]);
    if(empty($input_varient_1)){
        $varient_1_err = "Please enter the varient_1 ";     
    }  else{
        $varient_1 = $input_varient_1;
    }


    $input_image = trim($_POST["image"]);
    if(empty($input_image)){
        $image_err = "Please enter the image ";     
    }  else{
        $image = $input_image;
    }

}
mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>image inserting</h1>


    <form methos="post" action="" enctype="multipart/from-data">
    
        <div class="form-group">
        <label>image</label>
        <!-- <input type="file" name="image" class="form-control" value="<?PHP echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"  width="150" height="150" />';?>"> -->
        <input type="file" name="image" class="form-control">

        </div>

        <div class="form-group ">
        <label>varient_1</label>
        <input type="text" name="varient_1" class="form-control">

        <!-- <input type="text" name="varient_1" class="form-control" value="<?php echo $varient_1; ?>"> -->
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="Submit">

    </form>
</body>
</html>