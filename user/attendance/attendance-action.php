<?php    
include('../../user/topnav.php');
include 'config.php';

 

if(isset($_POST['upload'])) 
{   
	    $user=$_GET['user'];
	    $attendance_date=$_POST['attendance_date'];
	    $attendance_file=$_FILES["attendance_file"]["name"];
	
	  	move_uploaded_file($_FILES["attendance_file"]["tmp_name"],"attendance/".$_FILES["attendance_file"]["name"]);
	
			$query="INSERT INTO attendance (coach_id,attendance_date,attendance_file) VALUES (?,?,?)";
	        $stmt=$link->prepare($query);
			$stmt->bind_param("sss",$user,$attendance_date,$attendance_file);
			$stmt->execute();
			
			
	

				if($query) 
	{
					
		header("Location: attendance.php");
					 echo "<script>alert('Successfully uploaded')</script>";
					
	} else 
	{ 
		echo $conn->error; 
	}
	
			

		}


?> 