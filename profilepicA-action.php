<?php    

include 'config.php';


if (isset($_POST['update'])) 
{  
	  $user=$_GET['user'];
			$oldimage=$_POST['oldimage'];
	
	
	
	if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!=" "))
			{
			$newimage="atletimg/".$_FILES['image']['name'];
				unlink($oldimage);
				move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
			}
			else{
				$newimage=$oldimage;
			}
	
			
			
	$query="UPDATE atlet SET atlet_pic='$newimage' WHERE atlet_id='$user'";
	$stmt=$conn->prepare($query);
			$stmt->bind_param("s",$newimage);
			$stmt->execute();
	
			
			
		
	

				if($query) 
	{
					echo "<script>alert('Successfull Edit !')</script>";
		header("Location: profilepicA.php?user=$user");
					
	} else 
	{ 
		echo $conn->error; 
	}
	
			

		}


?> 