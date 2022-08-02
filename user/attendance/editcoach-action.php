<?php    

include 'config.php';
 

if(isset($_POST['update'])) 
{   
	     
	    $user=$_GET['user'];
	    $coach_pass=$_POST['coach_pass'];
	    $coach_phonenum=$_POST['coach_phonenum'];
	    $coach_address=$_POST['coach_address'];
	    $coach_postcode=$_POST['coach_postcode'];
		$hash = password_hash($coach_pass, PASSWORD_DEFAULT);
	
			
	
			$query="UPDATE coach SET coach_address='$coach_address',coach_postcode='$coach_postcode',coach_phonenum='$coach_phonenum',coach_pass='$hash' WHERE coach_id ='$user'";
	        $stmt=$link->prepare($query);
			$stmt->bind_param("ssss",$coach_address,$coach_postcode,$coach_phonenum,$hash);
			$stmt->execute();
			
			
	

				if($query) 
	{
		header("Location: coach-edit.php?user=$user");
					
	} else 
	{ 
		echo $link->error; 
	}
	
			

		}


?> 