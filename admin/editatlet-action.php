<?php    

include 'config.php';
 

if(isset($_POST['update'])) 
{   
	     
	    $user=$_GET['user'];
	    $atlet_pass=$_POST['atlet_pass'];
	    $atlet_phonenum=$_POST['atlet_phonenum'];
	    $atlet_phonenumpp=$_POST['atlet_phonenumpp'];
	    $atlet_address=$_POST['atlet_address'];
	    $atlet_postcode=$_POST['atlet_postcode'];
		$hash = password_hash($atlet_pass, PASSWORD_DEFAULT);
	
			
	
			$query="UPDATE atlet SET atlet_address='$atlet_address',atlet_postcode='$atlet_postcode',atlet_phonenum='$atlet_phonenum',atlet_phonenumpp='$atlet_phonenumpp',atlet_pass='$hash' WHERE atlet_id ='$user'";
	        $stmt=$conn->prepare($query);
			$stmt->bind_param("sssss",$atlet_address,$atlet_postcode,$atlet_phonenum,$atlet_phonenumpp,$hash);
			$stmt->execute();
			
			
	

				if($query) 
	{
		header("Location: atlet-edit.php?user=$user");
					
	} else 
	{ 
		echo $conn->error; 
	}
	
			

		}


?> 