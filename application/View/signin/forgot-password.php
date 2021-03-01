<?php 
require_once "../../controller/controllerUserData.php"; 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Forgot Password</title>
        <link rel="stylesheet" href="../../../public/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../public/css/register.css">
        <link rel="stylesheet" href="../../../public/css/login2.css" />
    </head>

    <body>
        <div class="forms">
            <form action="forgot-password.php" method="POST" autocomplete="">
                <center>
                    <h1 style="color:#666;border-top: 3px solid rgb(236, 185, 17)">Forgot Password</h1>
                    <p class="text-center">Enter your email address</p>
                </center><br>
                <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php 
                                foreach($errors as $error){
                                    echo $error;
                                }
                            ?>
                        </div>
                        <?php
                    }
                ?>
                <div class="input-field">
                    <label for="email">Email</label>
                    <input type="email" name="email" required value="<?php echo $email ?>" />
                    <input type="submit" name='check-email' value="Continue" class="button"/> 
                </div>
            </form>
        </div>
    </body>
</html>