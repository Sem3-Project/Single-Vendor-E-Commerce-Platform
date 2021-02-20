<?php 
require_once "../controller/controllerUserData.php"; 
?>
<?php 
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
        <form action="user-otp.php" method="POST" autocomplete="off">
            <center><h3 style="color:#666;border-top: 3px solid rgb(236, 185, 17)">Code Verification</h3></center>
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
            
                <div class="input-field">
                
                <input type="number" name="otp" required />
                <input type="submit" name='check' value="Submit" class="button"/>
                
            </div>
        </form>
    </div>  
    
                   
</body>
</html>