<?php
include '../model/SignInRegister.php';
?>

<!DOCTYPE html>
<head>
<title>Sign up & Sign in</title>
</head>
<link rel="stylesheet" href="../../public/css/login2.css" />
<link rel="stylesheet" href="../../public/css/register.css" />

<div class="forms">
    <ul class="tab-group">
        <li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab"><a href="#signup">Sign Up</a></li>
    </ul>
    <form action="#" id="login" method="POST" name="login">
          <h1 >Login on C-Smart</h1>
          <div class="input-field">
            <label for="email">Email</label>
            <input type="email" name="email" required="email" />
            <label for="password">Password</label> 
            <input type="password" name="password" required/>
            <input type="submit" name='login' value="Login" class="button"/>
            <p class="text-p"> <a href="#">Forgot password?</a> </p>
          </div>
      </form>
      <form action="#" id="signup" name="signup" method="POST">  
          <h1>Sign Up on C-Smart</h1>
          <div class="input-field">
            <label for="first_name">First Name</label> 
            <input type="text" name="first_name" required="first_name"/>
            <label for="last_name">Last Name</label> 
            <input type="text" name="last_name" required="last_name"/>
            <label for="email">Email</label> 
            <input type="email" name="email" required="email"/>
            <label for="password">Password</label> 
            <input type="password" name="password" required/>
            <label for="password">Confirm Password</label> 
            <input type="password" name="confirm_password" required/>
            <input type="submit" name="signup" value="Sign up" class="button" />
          </div>
      </form>
</div>


<script src='../../public/js/jquery.min.js'></script>
<script type="text/javascript">
$(document).ready(function(){
      $('.tab a').on('click', function (e) {
      e.preventDefault();
       
      $(this).parent().addClass('active');
      $(this).parent().siblings().removeClass('active');
       
      var href = $(this).attr('href');
      $('.forms > form').hide();
      $(href).fadeIn(500);
    });
});
</script>


</html>