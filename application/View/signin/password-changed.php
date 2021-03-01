<?php 
require_once "../../controller/controllerUserData.php"; 
if($_SESSION['info'] == false){
    header('Location: loginRegister.php');  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="../../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/css/register.css">
    <link rel="stylesheet" href="../../../public/css/login2.css" />
</head>

<body>
    <div class="forms">
        <form action="loginRegister.php" method="POST">
            <?php 
                if(isset($_SESSION['info'])){
                    ?>
                    <div class="alert alert-success text-center">
                    <?php echo $_SESSION['info']; ?>
                    </div>
                    <?php
                }
            ?>
            <div class="input-field">
                <input type="submit" name='login-now' value="Login Now" class="button"/>
                    
            </div>
        </form>
    </div>
</body>
</html>