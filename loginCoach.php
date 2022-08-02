<?php
session_start();
$message="";
if(count($_POST)>0) {
 include('config2.php');
$result = mysqli_query($link,"SELECT * FROM coach WHERE coach_ic='" . $_POST["ic"] . "' and coach_pass = '". $_POST["password"]."'");
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["coach_ic"] = $row['coach_ic'];
$_SESSION["coach_id"] = $row['coach_id'];
$_SESSION["coach_FN"] = $row['coach_FN'];
} else {
$message = "Invalid Username or Password!";
}
if(isset($_SESSION["coach_ic"])) {
  header("Location:../sukan/user/equipment/crud.php");
}else{
  header("Location:loginCoach.php");
}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container-a">
      <div class="forms-container-a">
        <div class="signin-signup-a">
          <form action="" method="post" class="sign-in-form-a">
            <div class="message"><?php if($message!="") { echo $message; } ?></div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="IC Number" name="ic" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password"/>
            </div>
            <input type="submit" value="Login" name="submit" class="btn solid" />
            <a href="atletlogin.php" >Login Sebagai Atlet</a><br>
            <a href="loginAdmin.php" >Login Sebagai Admin</a>

          </form>
          
        </div>
      </div>
  </body>
</html>
