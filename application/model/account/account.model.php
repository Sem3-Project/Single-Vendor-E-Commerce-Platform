<?php
include '../../controller/Profile.class.php';

// $connector = new DbConnection();
// $conn = $connector->connect1();
$funObj = new Profile();

$load = $funObj->loadProfile($con1,$_SESSION['customer_id']); ////set session to get customer id==========================

if (isset($_POST['update'])){
    $update = $funObj->editProfile($con1,$_SESSION['customer_id'],$_POST['email'],$_POST['payment_number'],$_POST['first_name'],$_POST['last_name'],$_POST['zip_code'],$_POST['address_line_1'],$_POST['address_line_2'],$_POST['city'],$_POST['state'],$_POST['mobile_num']);
}

if ($load){
    if(mysqli_num_rows($load) > 0){
        while($row = mysqli_fetch_array($load)){
            $customer_id = $row ['customer_id'];
            $email = $row ['email'];
            $first_name = $row ['first_name'];
            $payment_number = $row ['payment_number'];
            $last_name = $row ['last_name'];
            $zip_code = $row ['zip_code'];
            $address_line_1 = $row ['address_line_1'];
            $address_line_2 = $row ['address_line_2'];
            $city = $row ['city'];
            $state = $row ['state'];
            $mobile_num = $row ['mobile_num'];
        }
    }
    // if (isset($_POST['update'])){
    //     $update = $funObj->editProfile($conn,$_POST['customer_id'],$_POST['email'],$_POST['payment_number'],$_POST['first_name'],$_POST['last_name'],$_POST['zip_code'],$_POST['address_line_1'],$_POST['address_line_2'],$_POST['city'],$_POST['state'],$_POST['mobile_num']);
    
    //     //$update = $funObj->updateproflile($conn,14,$_POST['address_line_1']);
    //     // $update = $funObj->editProfile($conn,15,$_POST['email'],$_POST['payment_number'],$_POST['first_name'],$_POST['last_name'],$_POST['zip_code']);
    // }
    
}


// if (isset($_POST['update'])){
//     $update = $funObj->editProfile($conn,$_POST['customer_id'],$_POST['email'],$_POST['payment_number'],$_POST['first_name'],$_POST['last_name'],$_POST['zip_code'],$_POST['address_line_1'],$_POST['address_line_2'],$_POST['city'],$_POST['state'],$_POST['mobile_num']);
// }

//$submit_value = "Update";

include '../../view/customer/account.php';
