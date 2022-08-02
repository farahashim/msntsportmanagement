<?php
session_start();
$message="";
$error = "";
if(count($_POST)>0) {
 include('config2.php');
$result = mysqli_query($link,"SELECT * FROM admin WHERE admin_username='" . $_POST["username"] . "' and admin_pass = '". $_POST["password"]."'");
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["admin_id"] = $row['admin_id'];
$_SESSION["admin_username"] = $row['admin_username'];
} else {
$message = "Invalid Username or Password!";
}
if(isset($_SESSION["admin_id"])) {
  header("Location:../sukan/admin/equipment/crud.php");
}else{
  header("Location:loginAdmin.php");
  $error = "Invalid Username or Password!";
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
            <div class="message" style="color:yellow"><?php if($error!="") { echo $error; } ?></div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password"/>
            </div>
            <input type="submit" value="Login" name="submit" class="btn solid" />
            <a href="index.html" >Kembali ke Halaman Utama</a>
          </form>
          <style>
body {
  background-image: url('bootstrap.jpg');
}
</style>
        </div>
      </div>
  </body>
</html>
