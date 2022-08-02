<?php    

include 'config.php';


if (isset($_POST['update'])) 
{  
	  $user=$_GET['user'];
			$oldimage=$_POST['oldimage'];
	
	
	
	if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!=" "))
			{
			$newimage="coachimg/".$_FILES['image']['name'];
				unlink($oldimage);
				move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
			}
			else{
				$newimage=$oldimage;
			}
	
			
			
	$query="UPDATE coach SET coach_pic='$newimage' WHERE coach_id='$user'";
	$stmt=$link->prepare($query);
			$stmt->bind_param("s",$newimage);
			$stmt->execute();
	
			
			
		
	

				if($query) 
	{
					echo "<script>alert('Successfull Edit !')</script>";
		header("Location: profilepicC.php?user=$user");
					
	} else 
	{ 
		echo $link->error; 
	}
	
			

		}


?> 