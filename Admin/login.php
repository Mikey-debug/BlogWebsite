<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['email']))
{
    header("location: /blog/admin/");
    exit;
}
require "../partials/_dbconnect.php";

$email = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['email'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter email and password";
    }
    else{
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
    }

    if(empty($err)){
      $sql = "SELECT * FROM users WHERE email='$email'";
      $result =  mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $num_row = mysqli_num_rows($result);

      if($num_row == 1){
        while($row){
          if(password_verify($password, $row['password'])){
            // this means the password is corrct. Allow user to login
            session_start();
            $_SESSION["username"] = $row['username'];
            $_SESSION["email"] = $email;
            $_SESSION["id"] = $row['id'];
            $_SESSION["loggedin"] = true;
            header("location: /blog/admin/");
          }
          else{
            $err = "Invalid Login Credentials";
          }
        }
      }
      else{
        $err = "Invalid Login Credentials";
      }
    }
}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Login | Code Ranger</title>
    <link rel="stylesheet" href="css/loginSignup.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="cover">
      <div class="front">
        <img src="Images/frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="login.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Enter your email" name="email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="password" required>
              </div>
              <div class="error" style="margin-bottom: 10px">
                <?php echo $err; ?>
              </div>
              <!-- <div class="text"><a href="#">Forgot password?</a></div> -->
              <div class="button input-box">
                <input type="submit" value="Sumbit">
              </div>
              <!-- <div class="text sign-up-text">Don't have an account? <label for="flip"><a href="signup.php">Sigup now</a></label></div> -->
            </div>
        </form>
      </div>
    </div>
    </div>
  </div>
</body>
</html>
