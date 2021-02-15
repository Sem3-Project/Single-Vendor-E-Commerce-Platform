<?php

include '../controller/Profile.class.php';

$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new Profile();

echo '<title>Account</title>';
echo '<meta charset ="UTF-8">';
echo'<meta name="viewpoint" content="width-device-width initial-scale=1.0">';
echo'<link rel="stylesheet" href="../../public/css/login1.css" />';

echo "<h1 align='left' margin='100px' ><i>Account Information</i></h1>";
echo '<center><img class="user" src="../../public/images/user1.png" ></center>';

$load = $funObj->loadProfile($conn,15); ////set session to get customer id==========================
//$id=$_GET['id'];
if ($load){
    if(mysqli_num_rows($load) > 0){
        echo "<table width='100%'>";
        while($row = mysqli_fetch_array($load)){
            echo "<tr>";
                echo "<th>Customer ID</th>";
                echo "<td><input type=number readonly value=" . $row['customer_id'] . " ></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>First Name</th>";
                echo "<td><input type=text name='first_name' value=" . $row['first_name'] . " ></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>Last Name</th>";
                echo "<td><input type=text name='last_name' value=" . $row['last_name'] . "></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>Email</th>";
                echo "<td><input type=email name='email' value=" . $row['email'] . " ></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>Card Details</th>";
                echo "<td><input type=text name='payment_number' value=" . $row['payment_number'] . " ></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>Mobile Number (07xxxxxxxx)</th>";
                echo "<td><input type=number  name='mobile_num' value=" . $row['mobile_num'] . "></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>Address Line1</th>";
                echo "<td><input type=text name='address_line_1' value=" . $row['address_line_1'] . " ></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>Address Line2</th>";
                echo "<td><input type=text name='address_line_2' value=" . $row['address_line_2'] . "></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>Zip Code</th>";
                echo "<td><input type=text name='zip_code' value=" . $row['zip_code'] . " ></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>City</th>";
                echo "<td><input type=text name='city' value=" . $row['city'] . " ></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>State</th>";
                echo "<td><input type=text name='state' value=" . $row['state'] . " ></td>";
            echo "</tr>";
        }   
        echo "</table>";
       
    }
   
}


if(isset($_POST['update'])){
    // $city = $_POST['city'];
    // $funObj->editProfile($conn,$_POST['customer_id'],$_POST['email'],$_POST['payment_number'],$_POST['first_name'],$_POST['last_name'],$_POST['zip_code'],$_POST['address_line_1'],$_POST['address_line_2'],$city,$_POST['state'],$_POST['mobile_num']);
   
}

?>
<html>
<br><br><input type='submit' name='update' value='Update' style='float: left;'>
</html>

<?php
//echo '<br><br><center><input type="submit" class="link" name="update" style="margin-bottom: 50px; width:50%; height:40px;background-color:  rgb(236, 185, 17);" value="Update"></center>';

// if(isset($_POST['update'])){
//     $funObj->editProfile($conn,$_POST['customer_id'],$_POST['email'],$_POST['payment_number'],$_POST['first_name'],$_POST['last_name'],$_POST['zip_code'],$_POST['address_line_1'],$_POST['address_line_2'],$_POST['city'],$_POST['state'],$_POST['mobile_num']);
// }

// $customer_id = $_POST['customer_id'];
// $email = $_POST['email'];
// $payment_number = $_POST['payment_number'];
// $first_name = $_POST['first_name'];
// $last_name = $_POST['last_name'];
// $zip_code = $_POST['zip_code'];
// $address_line_1 = $_POST['address_line_1'];
// $address_line_2 = $_POST['address_line_2'];
// $city = $_POST['city'];
// $state = $_POST['state'];
// $mobile_num = $_POST['mobile_num'];


// $result = $funObj->editProfile($conn,$customer_id,$email,$payment_number,$first_name,$last_name,$zip_code,$address_line_1,$address_line_2,$city,$state,$mobile_num);
// $load = $funObj->loadProfile($conn,14); ////set session to get customer id==========================



// while ($row = mysqli_fetch_array($load))
// {
//     $customer_id = $row['customer_id'];
//     $email = $row['email'];
//     $payment_number = $row['payment_number'];
//     $first_name = $row['first_name'];
//     $last_name = $row['last_name'];
//     $zip_code = $row['zip_code'];
//     $address_line_1 = $row['address_line_1'];
//     $address_line_2 = $row['address_line_2'];
//     $city = $row['city'];
//     $state = $row['state'];
//     $mobile_num = $row['mobile_num'];
// }



//include '../controller/DbConnection.class.php';

// include '../controller/Profile.class.php';

// $connector = new DbConnection();
// $conn = $connector->connect();
// $funObj = new Profile();


// $customer_id = $_POST['customer_id'];
// $email = $_POST['email'];
// $payment_number = $_POST['payment_number'];
// $first_name = $_POST['first_name'];
// $last_name = $_POST['last_name'];
// $zip_code = $_POST['zip_code'];
// $address_line_1 = $_POST['address_line_1'];
// $address_line_2 = $_POST['address_line_2'];
// $city = $_POST['city'];
// $state = $_POST['state'];
// $mobile_num = $_POST['mobile_num'];

// $result = $funObj->editProfile($conn,$customer_id,$email,$payment_number,$first_name,$last_name,$zip_code,$address_line_1,$address_line_2,$city,$state,$mobile_num);
// $load = $funObj->loadProfile($conn,14); ////set session to get customer id==========================



// while ($row = mysqli_fetch_array($load))
// {
//     $customer_id = $row['customer_id'];
//     $email = $row['email'];
//     $payment_number = $row['payment_number'];
//     $first_name = $row['first_name'];
//     $last_name = $row['last_name'];
//     $zip_code = $row['zip_code'];
//     $address_line_1 = $row['address_line_1'];
//     $address_line_2 = $row['address_line_2'];
//     $city = $row['city'];
//     $state = $row['state'];
//     $mobile_num = $row['mobile_num'];
// }


?>