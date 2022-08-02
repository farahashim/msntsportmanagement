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

if(isset($_GET['user']))
{
	$user = $_GET['user'];
	$get_user = $conn->query("SELECT * from coach WHERE coach_ic ='$user'");
	$user_d = $get_user->fetch_assoc();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo  $user_data->coach_FN;?></title>
	
	
	
	
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	
	
	
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
	
	
	<div class="form-group">
	
	<div class="col-sm-3">
		
		Profile Picture <img src="<?php echo $user_data->coach_pic; ?>" width="300" height="200" style="border:solid 1px #000">
		<a href="profilepicC.php?imgid=<?php echo $user_data->coach_id ?>">Change Profile Picture</a>
		
		
		<br>
		
		
		
		</div>
	</div>
	
		</div>
			</div>
	</section>
	
	
	
	
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