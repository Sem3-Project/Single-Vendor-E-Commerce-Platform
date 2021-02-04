<!DOCTYPE html>
<head>
<title>Sign up & Sign in</title>
</head>
<link rel="stylesheet" href="../../../public/css/login1.css" />
<link rel="stylesheet" href="../../../public/css/register.css" />

<div class="forms">
    <ul class="tab-group">
        <li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab"><a href="#signup">Sign Up</a></li>
    </ul>
    <form action="#" id="login">
          <h1 >Login on C-Smart</h1>
          <div class="input-field">
            <label for="username">User Name</label>
            <input type="username" name="username" required="username" />
            <label for="password">Password</label> 
            <input type="password" name="password" required/>
            <input type="submit" value="Login" class="button"/>
            <p class="text-p"> <a href="#">Forgot password?</a> </p>
          </div>
      </form>
      <form action="#" id="signup">
          <h1>Sign Up on C-Smart</h1>
          <div class="input-field">
            <label for="username">User Name</label> 
            <input type="username" name="username" required="username"/>
            <label for="email">Email</label> 
            <input type="email" name="email" required="email"/>
            <label for="password">Password</label> 
            <input type="password" name="password" required/>
            <label for="password">Confirm Password</label> 
            <input type="password" name="password" required/>
            <input type="submit" value="Sign up" class="button" />
          </div>
      </form>
</div>


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
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