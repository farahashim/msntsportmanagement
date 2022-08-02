<?php
include 'config.php';
require 'initC.php';
if(isset($_SESSION['user_id']) && isset($_SESSION['user_icC'])){
    $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
    if($user_data ===  false){
        header('Location: logoutC.php');
        exit;
    }
    // FETCH ALL USERS WHERE ID IS NOT EQUAL TO MY ID
    
}
else{
    header('Location: logoutC.php');
    exit;
}


// REQUEST NOTIFICATION NUMBER

if(isset($_GET['user']))
{
	$user = $_GET['user'];
	$get_user = $link->query("SELECT * from coach WHERE coach_id ='$user'");
	$user_d = $get_user->fetch_assoc();
}
?>
<!doctype html>
<html>
<head>
  <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       
        <title><?php echo  $user_data->coach_FN;?><?php echo  $user_data->coach_LN;?></title>
        <!-- Bootstrap CSS -->
	
	 <link rel="stylesheet" href="meetme/css/bootstrap.css">
        <link rel="stylesheet" href="meetme/vendors/linericon/style.css">
        <link rel="stylesheet" href="meetme/css/font-awesome.min.css">
        <link rel="stylesheet" href="meetme/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="meetme/vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="meetme/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="meetme/vendors/animate-css/animate.css">
        <link rel="stylesheet" href="meetme/vendors/popup/magnific-popup.css">
        <link rel="stylesheet" href="meetme/vendors/flaticon/flaticon.css">
        <!-- main css -->
        <link rel="stylesheet" href="meetme/css/style.css">
        <link rel="stylesheet" href="meetme/css/responsive.css">
       
	
	<script src="js/jquery.min.js"></script>

<!-- Popper JS -->
<script src="js/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="js/bootstrap.min.js"></script>
	
		
	
	<style>
	
	.dropbtn {
  background-color: black;
  
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: black;
  min-width: 160px;
  
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover , .dropdown-content a:active  {background-color: black;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn 
		{
			background-color: black;
		}
	</style>
	
</head>

<body>
	
	<header class="header_area">
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<!-- Brand and toggle get grouped for better mobile display -->
						
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item active"><a class="nav-link" href="coachprofile.php">Home</a>
								</li> 
								 
								<li class="nav-item">
									<a class="nav-link" href="coach-edit.php">Edit Information</a>
								</li>
					
								<li class="nav-item">
									<a class="nav-link" href="editcoach-pic.php">Edit picture</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link" href="attendance.php">Upload Attendance</a>
								</li>
							
							
								
								<li class="nav-item"><a class="nav-link" href="logoutC.php">LOGOUT</a></li>
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
	
	
        <section class="home_banner_area">
           	<div class="container box_1620">
           		<div class="banner_inner d-flex align-items-center">
	
					
					
					<form method="post" action="editcoach-action.php?user=<?php echo $user_data->coach_id?>" enctype="multipart/form-data">
	
						 <h2><?php echo  $user_data->coach_FN;?> <?php echo  $user_data->coach_LN;?>'s Details :</h2>
						
			
			
			<h2>
				<input type="hidden" name="id" value="<?=$user_data->coach_id;?>">
			
			</h2>
			
          
			<br>
			
			<h2>Password: <input type="password" name="coach_pass"  class="form-control"  placeholder="Enter new password" required></h2>
			
			<br>
			
            <h2>Phone Number: <input type="text" name="coach_phonenum" value="<?= $user_data->coach_phonenum; ?>" class="form-control"  placeholder="Phone Number" required></h2>
			
			<br>
					
            
						<h2>Address : 
							<br>
							<textarea name="coach_address" rows="4" cols="50"><?php echo $user_data->coach_address; ?></textarea> </h2>
						<br>
						<h2>Postcode: <input type="number" name="coach_postcode" value="<?= $user_data->coach_postcode; ?>" class="form-control"  placeholder="postcode" required></h2>
						<br>
						
						
			
			<input type="submit" name="update" value"Update profile" />
			
       
			
        <br>
        </form>
					
					
				</div>
			</div>
	</section>
	 <footer class="footer_area p_120">
        	<div class="container">
        		<div class="row footer_inner">
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget ab_widget">
        					
        
        				</aside>
        			</div>
        			
        			
        		</div>
        	</div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="meetme/js/jquery-3.3.1.min.js"></script>
        <script src="meetme/js/popper.js"></script>
        <script src="meetme/js/bootstrap.min.js"></script>
        <script src="meetme/js/stellar.js"></script>
        <script src="meetme/vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="meetme/vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="meetme/vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="meetme/vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="meetme/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="meetme/vendors/popup/jquery.magnific-popup.min.js"></script>
        <script src="meetme/js/jquery.ajaxchimp.min.js"></script>
        <script src="meetme/vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="meetme/vendors/counter-up/jquery.counterup.min.js"></script>
        <script src="meetme/js/mail-script.js"></script>
        <script src="meetme/js/theme.js"></script>
	
</body>
</html>