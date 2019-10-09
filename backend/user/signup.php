<?php include("functions/init.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php
if (logged_in()) {
    redirect("profile.php");
}
?>
<head>
    <meta charset="UTF-8">
    <title>Anwesha CA | Login</title>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
      <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">       -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
      <meta name="viewport" content="width=device-width">
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <link rel="stylesheet" href="./css/login.css">
    <link href="./images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="./images/favicon.ico" rel="apple-touch-icon">
</head>

<body>
  <div class="card-container">
    <div class="card" id="cards">
      <div class="front">
        <form id="login_form" name="login_form" method="post">
          <h1>Log in</h1>
          <?php display_message() ?>
          <?php login_signup() ?>
          <input class="not-radio" id="anweshaid" name="anweshaid" required="required" placeholder="Anwesha ID" />
          <input class="not-radio" type="password" id="password" name="password" required="required" placeholder="Password" />
          <input type="checkbox" name="remember" id="password" />
          <span class="lever"></span>
          Remember Me
          <a href="#">Forgot your password?</a>
          <button type="submit" name="login" id="login" >Sign In</button>
          <p /*id="card"*/>Don't have an account?</p>
          <p><a href="./casignup.php">SignUp now !!</a></p>
        </form>
      </div>
      <!-- <div class="back">
        <form action="#">              
          <h1>Create Account</h1>
          <span>or use your email for registration</span>
          <input class="not-radio" type="text" placeholder="Name" />
          <input class="not-radio" type="email" placeholder="Email" />
          <input class="not-radio" type="password" placeholder="Password" />
          Want to apply as CA?
          <label>
          <input type="radio" name="ca" value="yes"> YES
          <input type="radio" name="ca" value="no"> NO<br></label>
          <button>Sign Up</button>
          <p id="carded">Already have a account?</p>
        </form>
      </div> -->
    </div>
  </div>
  <div class="fixed-action-btn toolbar">
    <a class="btn-floating btn-large amber black-text">
        Menu
    </a>
    <ul>
        <li><a class="indigo center" href="../../">Home</a></li>
        <li><a class="blue center" href="../../ca/ca.php">Campus Ambassador</a></li>
        <!-- <li><a class="red center" href="../../sponsors.html">Sponsors</a></li> -->
        <li><a class="red center" href="./signup.php">Login/Signup</a></li>
    </ul>
  </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<script src="./js/login.js"></script>
</html>