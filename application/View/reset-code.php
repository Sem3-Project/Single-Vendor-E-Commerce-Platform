<?php 
require_once "../controller/controllerUserData.php"; 

$email = $_SESSION['email'];
if($email == false){
  header('Location: loginRegister.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/register.css">
    <link rel="stylesheet" href="../../public/css/login2.css" />
</head>

<body>
    <div class="forms">   
        <form action="reset-code.php" method="POST" autocomplete="off">
            <center><h1 style="color:#666;border-top: 3px solid rgb(236, 185, 17)">Code Verification</h1></center>
            <?php 
                if(isset($_SESSION['info'])){
                    ?>
                    <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                        <?php echo $_SESSION['info']; ?>
                    </div>
                    <?php
                }
                ?>
                <?php
                if(count($errors) > 0){
                    ?>
                    <div class="alert alert-danger text-center">
                        <?php
                        foreach($errors as $showerror){
                            echo $showerror;
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
                <br><p class="text-center">Enter your verification code</p>
                <div class="input-field">
                <label for="email">Verification code</label>
                <input type="number" name="otp" required />
                <input type="submit" name='check-reset-otp' value="Submit" class="button"/>
                    
            </div>
        </form>
    </div>
</body>
</html>