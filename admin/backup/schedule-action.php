<?php    

include 'config.php';
 

if(isset($_POST['upload'])) 
{   
	     
	    $sport_name=$_POST['sport_name'];
	    $sport_schedule=$_FILES["sport_schedule"]["name"];
	
	  	move_uploaded_file($_FILES["sport_schedule"]["tmp_name"],"schedule/".$_FILES["sport_schedule"]["name"]);
	
			$query="UPDATE atlet SET atlet_schedule='$sport_schedule' WHERE atlet_sport ='$sport_name'";
	        $stmt=$conn->prepare($query);
			$stmt->bind_param("s",$sport_schedule);
			$stmt->execute();
	
			$query="UPDATE coach SET coach_schedule='$sport_schedule' WHERE coach_sport ='$sport_name'";
	        $stmt=$conn->prepare($query);
			$stmt->bind_param("s",$sport_schedule);
			$stmt->execute();
			
			
	

				if($query) 
	{
					
		header("Location: schedule.php");
					 echo "<script>alert('Successfully uploaded')</script>";
					
	} else 
	{ 
		echo $conn->error; 
	}
	
			

		}


?> 