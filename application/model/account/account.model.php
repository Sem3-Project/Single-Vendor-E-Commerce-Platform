<?php
include '../../controller/Profile.class.php';

// $connector = new DbConnection();
// $conn = $connector->connect1();
$funObj = new Profile();

$load = $funObj->loadProfile($con1, $_SESSION['customer_id']); ////set session to get customer id==========================

if (isset($_POST['update'])) {
    $update = $funObj->editProfile($con1, $_SESSION['customer_id'], $_POST['email'], $_POST['payment_number'], $_POST['first_name'], $_POST['last_name'], $_POST['zip_code'], $_POST['address_line_1'], $_POST['address_line_2'], $_POST['city'], $_POST['state'], $_POST['mobile_num']);
    header("Location:account.model.php");
}
if ($load) {
    if (mysqli_num_rows($load) > 0) {
        while ($row = mysqli_fetch_array($load)) {
            $customer_id = $row['customer_id'];
            $email = $row['email'];
            $first_name = $row['first_name'];
            //  $dispnum = substr($row['cardnumber'], 0, 2) . str_repeat("*", strlen($row['cardnumber'])-2);

            //$payment_number = $row ['payment_number'];
            $last_name = $row['last_name'];
            $zip_code = $row['zip_code'];
            $address_line_1 = $row['address_line_1'];
            $address_line_2 = $row['address_line_2'];
            $city = $row['city'];
            $state = $row['state'];
            $mobile_num = $row['mobile_num'];
            $payment_num = $row['payment_number'];

            // Non-NULL Initialization Vector for decryption 
            $decryption_iv = '1234567891011121';
            $ciphering = "AES-128-CTR";
            // Store the decryption key 
            $decryption_key = "CSmartEcomPlatform";
            $options = 0;
            // Use openssl_decrypt() function to decrypt the data 
            $decryption = openssl_decrypt(
                $payment_num,
                $ciphering,
                $decryption_key,
                $options,
                $decryption_iv
            );

            // if ($row['payment_number'] != "") {
            //     $payment_number = substr($row['payment_number'], 0, 4) . str_repeat("*", strlen($row['payment_number']) - 4);
            // } else {
            //     $payment_number = $row['payment_number'];
            // }
            if ($decryption != "") {
                $payment_number = substr($decryption, 0, 4) . str_repeat("*", strlen($decryption) - 4);
            } else {
                $payment_number = $decryption;
            }
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
