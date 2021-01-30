<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="author" content="Sahil Kumar" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Sign up and Sign in</title>
    <link href="../../../public/css/fonts.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../../public/css/signNReg.css" />
    <script src="../../../public/js/jquery.js"></script>
    <script type="text/javascript" src="../../../public/js/signNReg.js"></script>
  </head>
  <body>
    <div id="main">
      <!-- Tab Buttons -->
      <div id="tab-btn">
        <a href="#" class="login-tab active">Sign In</a>
        <a href="#" class="register-tab">Sign Up</a>
      </div>
      <!-- Login Form -->
      <div class="login-box">
        <h2>Get Started!</h2>
        <form action="#" method="post" id="login-form">
          <input type="text" name="username" placeholder="Username" class="inp" required autofocus /><br />
          <input type="password" name="password" placeholder="Password" class="inp" required /><br />
          <a href="#" id="forgot">Forgot Password?</a><br />
          <input type="submit" name="submit" value="SIGN IN" class="sub-btn" />
        </form>
      </div>
      <!-- Registration Form -->
      <div class="register-box">
        <h2>Register With Us!</h2>
        <form action="#" method="post" id="reg-form">
          <input type="text" name="uname" placeholder="Enter Username" class="inp" required autofocus /><br />
          <input type="email" name="email" placeholder="Enter Email" class="inp" required /><br />
          <input type="password" name="pass" placeholder="Enter Password" class="inp" required /><br />
          <input type="password" name="repass" placeholder="Confirm Password" class="inp" required /><br />
          <input type="submit" name="submit" value="SIGN UP" class="sub-btn" />
        </form>
      </div>
    </div>
  </body>
</html>