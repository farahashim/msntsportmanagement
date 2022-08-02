<?php
require 'initC.php';
include 'filesLogicC.php';
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
	

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		
       
        <title>Coach Profile</title>
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
       
	
		 
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
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
								<li class="nav-item">
									<a class="nav-link" href="../equipment/crud.php">Booking</a>
								</li>
								
								<li class="nav-item"><a class="nav-link" href="logoutC.php">LOGOUT</a></li>
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
           	<div class="container box_1620">
           		<div class="banner_inner d-flex align-items-center">
					<div class="banner_content">
						<div class="media">
							<div class="d-flex">
								<img  src="<?php echo $user_data->coach_pic; ?>" alt="" style="width:500px;height:600px;">
							</div>
							<div class="media-body">
								<div class="personal_text">
									<h6>Hello ! Welcome Back</h6>
									<h3><?php echo  $user_data->coach_FN;?> <?php echo  $user_data->coach_LN;?></h3>
									
									<h4><?php echo  $user_data->coach_ic;?></h4>
									
									
									
									
									<p> </p>
									<ul class="list basic_info">
										<li><a href="#"><i class="lnr lnr-dice"></i> <?php echo  $user_data->coach_gender;?></a></li>
										<li><a href="#"><i class="lnr lnr-book"></i> <?php echo  $user_data->coach_sport;?></a></li>
										<li><a href="#"><i class="lnr lnr-home"></i>  <?php echo  $user_data->coach_age;?></a></li>
										<li><a href="#"><i class="lnr lnr-flag"></i> <?php echo  $user_data->coach_stateofbirth;?></a></li>
										<li><a href="#"><i class="lnr lnr-phone-handset"></i>  <?php echo  $user_data->coach_phonenum;?></a></li>
										
										<li><a href="#"><i class="lnr lnr-envelope"></i> <?php echo  $user_data->coach_email;?></a></li>
										
										
										
										
										
									
									</ul>
									
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Welcome Area =================-->
         <section class="welcome_area p_120">
        	<div class="container">
        		<div class="row welcome_inner">
        			<div class="col-lg-6">
        				<div class="welcome_text">
		<h4>Schedule</h4>
		<h3>
			<a href="coachprofile.php?file_id=<?php echo $user_data->coach_id;?>">Download</a>
							
							</h3>
		
						</div>
						</div>
					</div>
				</div>
			 </div>
		</section>
		
		
		
        
        <!--================Footer Area =================-->
        <footer class="footer_area p_120">
        	<div class="container">
        		<div class="row footer_inner">
        			<div class="col-lg-5 col-sm-6">
        				
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