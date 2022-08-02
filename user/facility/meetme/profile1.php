<?php
require 'init.php';
if(isset($_SESSION['user_id']) && isset($_SESSION['StudID'])){
    $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
    if($user_data ===  false){
        header('Location: logout.php');
        exit;
    }
    // FETCH ALL USERS WHERE ID IS NOT EQUAL TO MY ID
    $all_users = $user_obj->all_users($_SESSION['user_id']);
}
else{
    header('Location: logout.php');
    exit;
}
// REQUEST NOTIFICATION NUMBER
$get_req_num = $frnd_obj->request_notification($_SESSION['user_id'], false);
// TOTAL FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['user_id'], false);
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>MeetMe Personal</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/popup/magnific-popup.css">
        <link rel="stylesheet" href="vendors/flaticon/flaticon.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item active"><a class="nav-link" href="profile.php">Home</a>
								</li> 
								<li class="nav-item">
									<a class="nav-link" href="notifications.php">About<span class="badge <?php
                if($get_req_num > 0){
                    echo 'redBadge';
                }
                ?>"><?php echo $get_req_num;?></span></a></li> 
								
								<li class="nav-item">
									<a class="nav-link" href="friends.php">Services<span class="badge"><?php echo $get_frnd_num;?></span></a>
								</li> 
								
								<?php
				if($login_user = $user_data->Stud_status=='Inter')
				{
					echo'
								<li class="nav-item">
									<a class="nav-link" href="edit-profileInter.php">Edit</a>
								</li>
								'; 
								
				}
				else if($login_user = $user_data->Stud_status=='Local')
				{
					echo'
								<li class="nav-item">
									<a class="nav-link" href="edit-profile.php">Edit</a>
								</li>
								'; 
					
					
				}
				?>			
								
								
								
								<li class="nav-item"><a class="nav-link" href="listfriend.php">ALL KAWAN</a></li>
								
								<li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>
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
								<img  src="<?php echo $user_data->Stud_image; ?>" alt="">
							</div>
							<div class="media-body">
								<div class="personal_text">
									<h6>Hello ! Welcome Back</h6>
									<h3><?php echo  $user_data->Stud_FN;?> <?php echo  $user_data->Stud_LN;?></h3>
									
									<h4><?php echo  $user_data->Stud_school;?></h4>
									
									<p>Currently you only can change email / password / phone number / Bio .Changing new picture still in maintenance </p>
									<ul class="list basic_info">
										<li><a href="#"><i class="lnr lnr-calendar-full"></i> <?php echo  $user_data->Stud_dob;?></a></li>
										<li><a href="#"><i class="lnr lnr-phone-handset"></i>  <?php echo  $user_data->Stud_phonenum;?></a></li>
										
										<li><a href="#"><i class="lnr lnr-envelope"></i> <?php echo  $user_data->Stud_email;?></a></li>
										<li><a href="#"><i class="lnr lnr-home"></i>  <?php echo  $user_data->Stud_campus;?></a></li>
										
										<li><a href="#"><i class="lnr lnr-map"></i>  <?php echo  $user_data->Stud_country;?></a></li>
										
										<li><a href="#"><i class="lnr lnr-paperclip"></i>  <?php echo  $user_data->Stud_aboutme;?></a></li>
										
										
									</ul>
									<ul class="list personal_social">
										<li class="disable"><a href="#"><i class="fa fa-facebook" ></i></a></li>
										<li class="disable"><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li class="disable"><a href="#"><i class="fa fa-linkedin"></i></a></li>
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
        
        <!--================End Welcome Area =================-->
        
        <!--================My Tabs Area =================-->
        
        <!--================End My Tabs Area =================-->
        
        <!--================Feature Area =================-->
        
        <!--================End Feature Area =================-->
        
        <!--================Home Gallery Area =================-->
        
        <!--================End Home Gallery Area =================-->
        
        <!--================Testimonials Area =================-->
        
        <!--================End Testimonials Area =================-->
        
        <!--================Footer Area =================-->
        <footer class="footer_area p_120">
        	<div class="container">
        		<div class="row footer_inner">
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget ab_widget">
        					
        					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        				</aside>
        			</div>
        			
        			
        		</div>
        	</div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/popup/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>