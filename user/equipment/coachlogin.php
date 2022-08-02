<?php
require 'initC.php';

if(isset($_POST['user_icC'])&& isset($_POST['user_password']))
{
	$result = $user_obj->loginUser($_POST['user_icC'],$_POST['user_password']);
	
}
	//ni dh login
	if(isset($_SESSION['user_icC']))
	{
		header('Location: ../attendance/coachprofile.php');
		exit;
}
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Atlet Login</title>
 <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Vendor CSS-->
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="css/login.css" rel="stylesheet" media="all">
	  
	 <link rel="shortcut icon" href="picture/karya2.png" type="image/x-icon">
	<link rel="icon" href="picture/karya2.png" type="image/x-icon">
	  
	  <style>
	  .button {
  background: linear-gradient(to bottom, #ff6666 0%, #ff9933 100%);
  border: none;
  color: white;
  padding: 5px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button4 {border-radius: 12px;}
	  </style>
</head>

<body>
	
	  <div class="page-wrapper bg-img-kawan p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-body">
                <div class="container">
	 <form method="POST" action="">
            <h2 class="title">Sign In</h2>
              <div class="input-group">
                  <input class="input--style-3" type="text" id="user_icC" name="user_icC" placeholder="Identity Card" spellcheck="false" required autofocus>
              </div>
              <div class="input-group">
                  <input class="input--style-3" type="password" id="user_password" name="user_password" placeholder="Password" required>
              </div>
              <div class="p-t-10">
                  <button name="login"class="btn btn--pill btn--green" type="submit" value="Login">Login</button>
                  <?php
        if(isset($result['errorMessage'])){
          echo '<p class="errorMsg">'.$result['errorMessage'].'</p>';
        }
        if(isset($result['successMessage'])){
          echo '<p class="successMsg">'.$result['successMessage'].'</p>';
        }
      ?>    
				  
				  <a href="coach_signup.php" class="btn btn--pill btn--green">Register</a>
					  
				 <a href="../../index.html" class="btn btn--pill btn--green">Homepage</a>
              </div>
              
            </form>
					</div>
					      </div>
            </div>
         </div>       
      </div>
	
	
	 <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
</body>
</html>