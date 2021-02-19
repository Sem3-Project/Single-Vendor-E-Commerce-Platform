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
    <title>Create a New Password</title>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/register.css">
    <link rel="stylesheet" href="../../public/css/login2.css" />
</head>

<body>
    <div class="forms">
        <form action="new-password.php" method="POST" autocomplete="off">
            <center><h3 style="color:#666;border-top: 3px solid rgb(236, 185, 17)">New Password</h3></center>
            <?php 
                if(isset($_SESSION['info'])){
                    ?>
                    <div class="alert alert-success text-center">
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
            <br><p class="text-center">Enter your new password</p>
            
            <div class="input-field">
                <label for="email">New Password</label>
                <input type="password" name="password" required />
                <label for="email">Confirm Password</label>
                <input type="password" name="cpassword" required />
                <input type="submit" name='change-password' value="Change" class="button"/>
                
            </div>
        </form>
    </div>    
</body>
</html>