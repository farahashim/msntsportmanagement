<?php
    session_start(); //we need session for the log in thingy XD 
    include("functions1.php");
    include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Coach Sign Up</title>

    <!-- Icons font CSS-->
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
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 11px;
  margin: 4px 2px;
  cursor: pointer;
}

.button4 {border-radius: 12px;}
	
	</style>
</head>
	<?php
        if(isset($_POST['register']))
        {
		$reqcoach_ic =$_POST['reqcoach_ic'];
        $reqcoach_FN=$_POST['reqcoach_FN'];
        $reqcoach_LN=$_POST['reqcoach_LN'];
		$reqcoach_age=$_POST['reqcoach_age'];
		$reqcoach_email =$_POST['reqcoach_email'];
		$reqcoach_address =$_POST['reqcoach_address'];
		$reqcoach_postcode=$_POST['reqcoach_postcode'];
        $reqcoach_phonenum=$_POST['reqcoach_phonenum'];	
		$reqcoach_pass=$_POST['reqcoach_pass'];
		$reqcoach_status=$_POST['reqcoach_status'];	
		$reqcoach_gender=$_POST['reqcoach_gender'];
		$reqcoach_nation=$_POST['reqcoach_nation'];
		$reqcoach_religion=$_POST['reqcoach_religion'];
		$reqcoach_stateofbirth=$_POST['reqcoach_stateofbirth'];
		$reqcoach_dob=$_POST['reqcoach_dob'];	
        $reqcoach_sport=$_POST['reqcoach_sport'];
		
        
			$hash = password_hash($reqcoach_pass, PASSWORD_DEFAULT);
			
			
			$query = "SELECT * FROM reqsport_coach WHERE reqcoach_ic='$reqcoach_ic'";
			$valid_number = filter_var($reqcoach_phonenum,FILTER_SANITIZE_NUMBER_INT);
			
			if(count(fetchAll($query))>0)
			{
				echo "<script>alert('This identity card has been registered!')</script>";
				
			}
			else if(strlen($valid_number)<10 || strlen($valid_number)>11)
			{
			echo "<script>alert('invalid phone number')</script>";
				
			}
			else
			{
				
				
        $query = "INSERT INTO reqsport_coach (reqcoach_ic,reqcoach_FN,reqcoach_LN,reqcoach_age,reqcoach_email,reqcoach_address,reqcoach_postcode,reqcoach_phonenum,reqcoach_pass,reqcoach_status,reqcoach_gender,reqcoach_nation,reqcoach_religion,reqcoach_stateofbirth,reqcoach_dob,reqcoach_sport) VALUES ('$reqcoach_ic','$reqcoach_FN','$reqcoach_LN','$reqcoach_age','$reqcoach_email','$reqcoach_address','$reqcoach_postcode','$reqcoach_phonenum','$hash','$reqcoach_status','$reqcoach_gender','$reqcoach_nation','$reqcoach_religion','$reqcoach_stateofbirth','$reqcoach_dob','$reqcoach_sport')";
        if(performQuery($query)){
            echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation and will be acknowledge through requested email. Thank you.')</script>";
        }else
        {
            echo "<script>alert('Unknown error occured.')</script>";
        }
    }
		}
		
    ?>
	
	
	
<body>
    <div class="page-wrapper bg-img-kawan p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
					
					
					<br>
						
                    <form name="form1" action="coach_signup.php" method="POST" enctype="multipart/form-data" >
                       
						
						<div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Kad Pengenalan" name="reqcoach_ic" required>
                        </div>
						
						<div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Nama Pertama" name="reqcoach_FN" required>
                        </div>
						
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Nama Terakhir" name="reqcoach_LN" required>
                        </div>
						
						<div class="input-group">
                            <input class="input--style-3" type="int" placeholder="Umur" name="reqcoach_age" required>
                        </div>
						
						 <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="reqcoach_email" required>
                        </div>
						
						<div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Alamat" name="reqcoach_address" required>
                        </div>
						
						<div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Poskod" name="reqcoach_postcode" required>
                        </div>
						
                    	<div class="input-group">
                            <input class="input--style-3" type="tel" placeholder="Nombor Telefon" name="reqcoach_phonenum" required>
                        </div>
						
						
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="reqcoach_pass" required>
                        </div>
						
						<div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="reqcoach_status" required>
                                    <option disabled="disabled" selected="selected">Status Perkahwinan</option>
                                    <option>Bujang</option>
                                    <option>Kahwin</option>
									<option>Bercerai</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
	
                      
                   
						
						<div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="reqcoach_gender" required>
                                    <option disabled="disabled" selected="selected">Jantina</option>
                                    <option>Lelaki</option>
                                    <option>Perempuan</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
						
						<div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="reqcoach_nation" required>
                                    <option disabled="disabled" selected="selected">Bangsa</option>
                                    <option>Melayu</option>
                                    <option>Cina</option>
									<option>India</option>
									<option>Lain-lain</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
						
						<div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="reqcoach_religion" required>
                                    <option disabled="disabled" selected="selected">Agama</option>
                                    <option>Islam</option>
                                    <option>Buddha</option>
									<option>Hindu</option>
									<option>Kristian</option>
									<option>Lain-lain</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
						
						<div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                                <select name="reqcoach_stateofbirth" required>
                                    <option disabled="disabled" selected="selected">Negeri Kelahiran</option>
                                    <option>JOHOR</option>
                                    <option>KEDAH</option>
                                    <option>KELANTAN</option>
									<option>MELAKA</option>
									<option>NEGERI SEMBILAN</option>
									<option>PAHANG</option>
									<option>PENANG</option>
									<option>PERAK</option>
									<option>PERLIS</option>
									<option>SABAH</option>
									<option>SARAWAK</option>
									<option>SELANGOR</option>
									<option>TERENGGANU</option>
                                </select>
                                <div class="select-dropdown"></div>
                        </div>
                        </div>
						 
						<div class = "input-group">
<input type="date" name="reqcoach_dob"  class="input--style-3"  placeholder="Tarikh Kelahiran" required>	
   </div>
						
						<?php
$query="SELECT sport_name FROM sportlist";
$stmt=$conn->prepare($query);
$stmt->execute();
$result=$stmt->get_result();
?>
				<div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
    <select name="reqcoach_sport" required>
		<option disabled="disabled" selected="selected">SUKAN</option>
		<?php while($row=$result->fetch_assoc()){	?>
    <option value="<?= $row['sport_name']; ?>"><?= $row['sport_name']; ?></option>
		<?php }?>
	</select>
                                <div class="select-dropdown"></div>
							
                        </div>
                        </div>
						
					
					
                       
                        <div class="p-t-10">
                        
                            <button name="register" class="btn btn--pill btn--green" type="submit" >Submit</button>

                        </div>
                        <br>
                        <a href="stulogin.php" class="button button4">Go back to login page</a>
						
						<a href="index.php" class="button button4">HOME</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
	
	
	
	
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

    
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
