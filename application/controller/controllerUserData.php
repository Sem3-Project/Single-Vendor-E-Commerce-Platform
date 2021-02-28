<?php 
session_start();
require "DbConnection.class.php";
$email = "";
$name = "";
$errors = array();

$connector = new DbConnection();
$con = $connector->connect();  
$con1 = $connector->connect1();  

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require '../../PHPMailer/src/Exception.php'; 
require '../../PHPMailer/src/PHPMailer.php'; 
require '../../PHPMailer/src/SMTP.php'; 

//signup as a customer
if(isset($_POST['signup'])){
    $first_name = mysqli_real_escape_string($con1, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con1, $_POST['last_name']);
    $email = mysqli_real_escape_string($con1, $_POST['email']);
    $password = mysqli_real_escape_string($con1, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con1, $_POST['confirm_password']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM customer WHERE email = '$email'";
    $res = mysqli_query($con1, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO customer (first_name, last_name, email, password, code, status)
                        values('$first_name','$last_name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con1, $insert_data);
        if($data_check){
            $mail = new PHPMailer; 
  
            $mail->isSMTP();                      // Set mailer to use SMTP 
            $mail->Host = '
smtp.gmail.com
';       // Specify main and backup SMTP servers 
            $mail->SMTPAuth = true;               // Enable SMTP authentication 
            $mail->Username = 'csmartcse@gmail.com';   // SMTP username 
            $mail->Password = 'csmartcse123';   // SMTP password 
            $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
            $mail->Port = 587;                    // TCP port to connect to 
            
            // Sender info 
            $mail->setFrom('csmartcse@gmail.com', 'C-Smart'); 
            $mail->addReplyTo('csmartcse@gmail.com', 'C-Smart'); 
            
            // Add a recipient 
            $mail->addAddress($email); 
            
            // Set email format to HTML 
            $mail->isHTML(true); 
            
            // Mail subject 
            $subject = "Email Verification Code";
            $mail->Subject = $subject;
            
            // Mail body content 
            $message = "Your verification code is $code"; 
            $mail->Body    = $message; 
            
            // Send email            

            $sender = "From: csmartcse@gmail.com";

            if($mail->send()){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
//if customer click verification code submit button
if(isset($_POST['check'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM customer WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE customer SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($con, $update_otp);
        if($update_res){
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header('location: customer/HomeCustomer.php');
            exit();
        }else{
            $errors['otp-error'] = "Failed while updating code!";
        }
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//if user click login button
if(isset($_POST['login'])){
    //customer login
    $email1 = mysqli_real_escape_string($con1, $_POST['email']);
    $password1 = mysqli_real_escape_string($con1, $_POST['password']);
    $check_email_customer = "SELECT * FROM customer WHERE email = '$email1'";
    $res = mysqli_query($con1, $check_email_customer);
    if(mysqli_num_rows($res) > 0){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if(password_verify($password1, $fetch_pass)){
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            if($status == 'verified'){
                $_SESSION['email'] = $email1;
                $_SESSION['password'] = $password1;
                header('location: customer/HomeCustomer.php');
            }else{
                $info = "It's look like you haven't still verify your email - $email";
                $_SESSION['info'] = $info;
                header('location: user-otp.php');
            }
        }else{
            $errors['email'] = "Incorrect email or password!";
        }
    }else{
        $errors['email'] = "It's look like you're not yet a member! Sign up to be a member.";
    }
    //admin login
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_email_admin = "SELECT * FROM admin WHERE email = '$email'";
    $res1 = mysqli_query($con, $check_email_admin);
    if(mysqli_num_rows($res1) > 0){
        $fetch = mysqli_fetch_assoc($res1);
        $fetch_pass = $fetch['password'];
        if(password_verify($password, $fetch_pass)){
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            if($status == 'verified'){
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: admin/Homeadmin.php');
            }else{
                $info = "It's look like you haven't still verify your email - $email";
                $_SESSION['info'] = $info;
                header('location: user-otp.php');
            }
        }else{
            $errors['email'] = "Incorrect email or password!";
        }
    }else{
        $errors['email'] = "It's look like you're not yet a member! Sign up to be a member.";
    }
}

    //if user click continue button in forgot password form
if(isset($_POST['check-email'])){
    //send email to customer
    $email = mysqli_real_escape_string($con1, $_POST['email']);
    $check_email = "SELECT * FROM customer WHERE email='$email'";
    $run_sql = mysqli_query($con1, $check_email);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE customer SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($con1, $insert_code);
        if($run_query){
            $mail = new PHPMailer; 

            $mail->isSMTP();                      // Set mailer to use SMTP 
            $mail->Host = '
smtp.gmail.com
';       // Specify main and backup SMTP servers 
            $mail->SMTPAuth = true;               // Enable SMTP authentication 
            $mail->Username = 'csmartcse@gmail.com';   // SMTP username 
            $mail->Password = 'csmartcse123';   // SMTP password 
            $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
            $mail->Port = 587;                    // TCP port to connect to 

            // Sender info 
            $mail->setFrom('csmartcse@gmail.com', 'C-Smart'); 
            $mail->addReplyTo('csmartcse@gmail.com', 'C-Smart'); 

            // Add a recipient 
            $mail->addAddress($email); 

            // Set email format to HTML 
            $mail->isHTML(true); 

            // Mail subject 
            $subject = "Password Reset Code";
            $mail->Subject = $subject;

            // Mail body content 
            $message = "Your password reset code is $code"; 
            $mail->Body    = $message;
          

            $sender = "From: csmartcse@gmail.com";

            if($mail->send()){
                $info = "We've sent a passwrod reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: reset-code.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Something went wrong!";
        }
    }else{
        $errors['email'] = "This email address does not exist!";
        
    }
    //send email to admin
    $email1 = mysqli_real_escape_string($con, $_POST['email']);
    $check_email1 = "SELECT * FROM admin WHERE email='$email1'";
    $run_sql1 = mysqli_query($con, $check_email1);
    if(mysqli_num_rows($run_sql1) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE admin SET code = $code WHERE email = '$email1'";
        $run_query =  mysqli_query($con, $insert_code);
        if($run_query){
            $mail = new PHPMailer; 

            $mail->isSMTP();                      // Set mailer to use SMTP 
            $mail->Host = '
smtp.gmail.com
';       // Specify main and backup SMTP servers 
            $mail->SMTPAuth = true;               // Enable SMTP authentication 
            $mail->Username = 'csmartcse@gmail.com';   // SMTP username 
            $mail->Password = 'csmartcse123';   // SMTP password 
            $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
            $mail->Port = 587;                    // TCP port to connect to 

            // Sender info 
            $mail->setFrom('csmartcse@gmail.com', 'C-Smart'); 
            $mail->addReplyTo('csmartcse@gmail.com', 'C-Smart'); 

            // Add a recipient 
            $mail->addAddress($email1); 

            // Set email format to HTML 
            $mail->isHTML(true); 

            // Mail subject 
            $subject = "Password Reset Code";
            $mail->Subject = $subject;

            // Mail body content 
            $message = "Your password reset code is $code"; 
            $mail->Body    = $message;
     $sender = "From: csmartcse@gmail.com";

            if($mail->send()){
                $info = "We've sent a passwrod reset otp to your email - $email1";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email1;
                header('location: reset-code.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Something went wrong!";
        }
    }else{
        $errors['email'] = "This email address does not exist!";
        
    }
}

//if user click check reset otp button
if(isset($_POST['check-reset-otp'])){
    $_SESSION['info'] = "";
    //customer
    $otp_code = mysqli_real_escape_string($con1, $_POST['otp']);
    $check_code = "SELECT * FROM customer WHERE code = $otp_code";
    $code_res = mysqli_query($con1, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: new-password.php');
        exit();
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
        
    }
    //admin
    $otp_code1 = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code1 = "SELECT * FROM admin WHERE code = $otp_code1";
    $code_res1 = mysqli_query($con, $check_code1);
    if(mysqli_num_rows($code_res1) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res1);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: new-password.php');
        exit();
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
        
    }
}

//if user click change password button
if(isset($_POST['change-password'])){
    $_SESSION['info'] = "";
    //customer
    $password = mysqli_real_escape_string($con1, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con1, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }else{
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE customer SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($con1, $update_pass);
        if($run_query){
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: password-changed.php');
        }else{
            $errors['db-error'] = "Failed to change your password!";
        }
    }
    //admin
    $password1 = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword1 = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password1 !== $cpassword1){
        $errors['password'] = "Confirm password not matched!";
    }else{
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password1, PASSWORD_BCRYPT);
        $update_pass = "UPDATE customer SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if($run_query){
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: password-changed.php');
        }else{
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}

//if login now button click
if(isset($_POST['login-now'])){
    header('Location: loginRegister.php');
}
?>