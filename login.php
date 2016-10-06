<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
ob_start();
session_start();
include("db.php");
if(isset($_SESSION["username"])){
  header("location:index.php");
}
include("db.php");
 ?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Log in to continue</title>
    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <link rel="stylesheet" href="Assets/reset.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <script type="text/javascript" src="Assets/login-scripts.js"></script>
    <script type="text/javascript" src="Assets/bootstrap-notify.min.js"></script>
    <link rel="stylesheet" href="Assets/login.css">

    
    
    
  </head>

  <body>

        
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  <h1 style="-webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #6C7AB4;"><b>ChatMan LogIn</b></h1><span>Made by <a href='http://safjammed.tk'>Safayat Jamil</a></span>
</div>
<div class="rerun"><a href="">Login</a></div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form action="login.php" method="post">
      <div class="input-container">
        <input type="text" name="login_username" id="Username" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" name="login_password" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit" name="submit_login" id="submit_login"><span>Go</span></button>
      </div>
      <div class="footer"><a id="reg" href="#">Register</a></div>
    </form>
  </div>


  <!-- Regestration panel -->
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form method="post" action="" onsubmit="return validate_form();">
      <div class="input-container">
        <input type="text" name="reg-name" id="reg-name" required="required"/>
        <label for="name">Name</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" name="reg-username" id="reg-username" required="required"/>
        <label for="reg-username" id="username-avl">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="reg-password" id="reg-password" required="required"/>
        <label for="reg-password" id="password-avl">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="reg-repassword" id="reg-repassword" required="required"/>
        <label for="reg-repassword" id="repassword-avl">Repeat Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" name="reg-email" id="reg-email" required="required"/>
        <label for="reg-email" id="email-avl">email</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button name="reg-submit" type="submit"><span>Sign-up</span></button>
      </div>
    </form>
  </div>



</div>
<!-- Portfolio--><a id="portfolio" href="http://safjammed.comli.com/" title="View my portfolio!"><i class="fa fa-link"></i></a>
<!-- CodePen--><a id="codepen" href="http://facebook.com/saf.jammed" title="Follow me!"><i class="fa fa-facebook"></i></a>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script type="text/javascript">
          $('.toggle').on('click', function() {
  $('.container').stop().addClass('active');
});
          $('#reg').on('click', function() {
  $('.container').stop().addClass('active');
});

$('.close').on('click', function() {
  $('.container').stop().removeClass('active');
});

        </script>









    






    
  </body>
</html>
<?php
if(isset($_POST['submit_login'])){
  $login_username = $_POST['login_username'];
  $login_password = $_POST['login_password'];
  $login=mysqli_query($db,"SELECT * FROM `users` WHERE `username`='$login_username' AND `password`='$login_password'");
  
  if(mysqli_num_rows($login)==0){
                  
?>
<script>
alert("invalid Name or password");
</script>
<?php
}
else{
$row=mysqli_fetch_assoc($login);
$_SESSION["username"]=$row["username"];
$_SESSION["password"]=$row["password"];
header("location:index.php");
}
mysqli_close($db);
}

if(isset($_POST['reg-submit'])){
  $name = $_POST['reg-name'];
  $username = $_POST['reg-username'];
  $password = $_POST['reg-password'];
  $email=$_POST['reg-email'];

  $sql = "INSERT INTO `users` (`username`, `password`, `name`, `email`) VALUES ('$username', '$password', '$name', '$email')";

  if(mysqli_query($db,$sql)){
    ?>
    <script>
    alert('Your Regestration Completed Successfully');
      
    </script>
    <?php
  }else{
    ?>
    <script>
    alert('Something went wrong.I am sorry, Dude');
      
    </script>
    <?php
  }
        
  mysqli_close($db);
}



?>