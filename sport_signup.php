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
    <title>Atlet Sign Up</title>

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
		$reqsport_ic =$_POST['reqsport_ic'];
        $reqsport_FN=$_POST['reqsport_FN'];
        $reqsport_LN=$_POST['reqsport_LN'];
		$reqsport_age=$_POST['reqsport_age'];
		$reqsport_email =$_POST['reqsport_email'];
		$reqsport_address =$_POST['reqsport_address'];
		$reqsport_postcode=$_POST['reqsport_postcode'];
        $reqsport_phonenum=$_POST['reqsport_phonenum'];
		$reqsport_phonenumpp=$_POST['reqsport_phonenumpp'];	
		$reqsport_pass=$_POST['reqsport_pass'];
		$reqsport_status=$_POST['reqsport_status'];	
		$reqsport_gender=$_POST['reqsport_gender'];
		$reqsport_nation=$_POST['reqsport_nation'];
		$reqsport_religion=$_POST['reqsport_religion'];
		$reqsport_stateofbirth=$_POST['reqsport_stateofbirth'];
		$reqsport_dob=$_POST['reqsport_dob'];	
        $reqsport_sport=$_POST['reqsport_sport'];
		
        
			$hash = password_hash($reqsport_pass, PASSWORD_DEFAULT);
			
			
			$query = "SELECT * FROM reqsport_player WHERE reqsport_ic='$reqsport_ic'";
			$valid_number = filter_var($reqsport_phonenum,FILTER_SANITIZE_NUMBER_INT);
			
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
				
				
        $query = "INSERT INTO reqsport_player (reqsport_ic,reqsport_FN,reqsport_LN,reqsport_age,reqsport_email,reqsport_address,reqsport_postcode,reqsport_phonenum,reqsport_phonenumpp,reqsport_pass,reqsport_status,reqsport_gender,reqsport_nation,reqsport_religion,reqsport_stateofbirth,reqsport_dob,reqsport_sport) VALUES ('$reqsport_ic','$reqsport_FN','$reqsport_LN','$reqsport_age','$reqsport_email','$reqsport_address','$reqsport_postcode','$reqsport_phonenum','$reqsport_phonenumpp','$hash','$reqsport_status','$reqsport_gender','$reqsport_nation','$reqsport_religion','$reqsport_stateofbirth','$reqsport_dob','$reqsport_sport')";
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
						
                    <form name="form1" action="sport_signup.php" method="POST" enctype="multipart/form-data" >
                       
						
						<div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Kad Pengenalan" name="reqsport_ic" required>
                        </div>
						
						<div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Nama Pertama" name="reqsport_FN" required>
                        </div>
						
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Nama Terakhir" name="reqsport_LN" required>
                        </div>
						
						<div class="input-group">
                            <input class="input--style-3" type="int" placeholder="Umur" name="reqsport_age" required>
                        </div>
						
						 <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="reqsport_email" required>
                        </div>
						
						<div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Alamat" name="reqsport_address" required>
                        </div>
						
						<div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Poskod" name="reqsport_postcode" required>
                        </div>
						
                    	<div class="input-group">
                            <input class="input--style-3" type="tel" placeholder="Nombor Telefon" name="reqsport_phonenum" required>
                        </div>
						
						<div class="input-group">
                            <input class="input--style-3" type="tel" placeholder="Telefon Penjaga" name="reqsport_phonenumpp" required>
                        </div>
						
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="reqsport_pass" required>
                        </div>
						
						<div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="reqsport_status" required>
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
                                <select name="reqsport_gender" required>
                                    <option disabled="disabled" selected="selected">Jantina</option>
                                    <option>Lelaki</option>
                                    <option>Perempuan</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
						
						<div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="reqsport_nation" required>
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
                                <select name="reqsport_religion" required>
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
                                <select name="reqsport_stateofbirth" required>
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
<input type="date" name="reqsport_dob"  class="input--style-3"  placeholder="Tarikh Kelahiran" required>	
   </div>
						
							<?php
$query="SELECT sport_name FROM sportlist";
$stmt=$conn->prepare($query);
$stmt->execute();
$result=$stmt->get_result();
?>
				<div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
    <select name="reqsport_sport" required>
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
                        <a href="atletlogin.php" class="button button4">Go back to login page</a>
						
						<!--<a href="index.php" class="button button4">HOME</a>-->
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
