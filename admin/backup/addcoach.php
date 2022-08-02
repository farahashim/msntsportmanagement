<?php
	session_start();
	include 'config.php';
	
	$update=false;
    $coach_id="";
	$coach_ic="";
	$coach_FN="";
	$coach_LN="";
	$coach_age="";
	$coach_email="";
    $coach_address="";
    $coach_postcode="";
    $coach_phonenum="";
	$coach_pass="";
	$coach_status="";
	$coach_gender="";
	$coach_nation="";
	$coach_religion="";
    $coach_stateofbirth="";
    $coach_dob="";
	$coach_sport="";
    $coach_pic="";
	
    
	

	if(isset($_POST['add'])){
		$coach_id=$_POST["coach_id"];
		$coach_ic=$_POST["coach_ic"];
		$coach_FN=$_POST["coach_FN"];
		$coach_LN=$_POST["coach_LN"];
		$coach_age=$_POST["coach_age"];
		$coach_email=$_POST["coach_email"];
		$coach_address=$_POST["coach_address"];
		$coach_postcode=$_POST["coach_postcode"];
		$coach_phonenum=$_POST["coach_phonenum"];
		$coach_pass=$_POST["coach_pass"];
		$coach_status=$_POST["coach_status"];
		$coach_gender=$_POST["coach_gender"];
		$coach_nation=$_POST["coach_nation"];
		$coach_religion=$_POST["coach_religion"];
		$coach_stateofbirth=$_POST["coach_stateofbirth"];
		$coach_dob=$_POST["coach_dob"];
		$coach_sport=$_POST["coach_sport"];
		$coach_schedule="n/a";
		
		$coach_pic=$_FILES['image']['name'];
		$upload="coachimg/".$coach_pic;	
		
		
		
		
		 
		
	   $hash = password_hash($coach_pass, PASSWORD_DEFAULT);
		
		
		
		
		$query="INSERT INTO coach (coach_ic,coach_FN,coach_LN,coach_age,coach_email,coach_address,coach_postcode,coach_phonenum,coach_pass,coach_status,coach_gender,coach_nation,coach_religion,coach_stateofbirth,coach_dob,coach_sport,coach_pic,coach_schedule)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("ssssssssssssssssss",$coach_ic,$coach_FN,$coach_LN,$coach_age,$coach_email,$coach_address,$coach_postcode,$coach_phonenum,$coach_pass,$coach_status,$coach_gender,$coach_nation,$coach_religion,$coach_stateofbirth,$coach_dob,$coach_sport,$upload,$coach_schedule);
		$stmt->execute();
		
		
		move_uploaded_file($_FILES['image']['tmp_name'], $upload);	
		
		
		header('location:coachlist.php');
		$_SESSION['response']="Succesfully Added!";
		$_SESSION['res_type']="success";
	}
	if(isset($_GET['delete']))
	{
		$coach_id=$_GET['delete'];
		
		$sql="SELECT coach_pic FROM coach WHERE coach_id=?";
		$stmt2=$conn->prepare($sql);
		$stmt2->bind_param("i",$coach_id);
		$stmt2->execute();
		$result2=$stmt2->get_result();
		$row=$result2->fetch_assoc();
		
		$imagepath=$row['coach_pic'];
		unlink($imagepath);
		
		
		$query="DELETE FROM coach WHERE coach_id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$coach_id);
		$stmt->execute();
		
		
		header('location:coachlist.php');
		$_SESSION['response']="Succesfully Deleted!";
		$_SESSION['res_type']="danger";
	}

if(isset($_GET['edit'])){
	$coach_id=$_GET['edit'];
	$query="SELECT * FROM coach WHERE coach_id=?";
	$stmt=$conn->prepare($query);
	$stmt->bind_param("i",$coach_id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row=$result->fetch_assoc();
	    
	
	    $coach_id=$row["coach_id"];
		$coach_ic=$row["coach_ic"];
		$coach_FN=$row["coach_FN"];
		$coach_LN=$row["coach_LN"];
		$coach_age=$row["coach_age"];
		$coach_email=$row["coach_email"];
		$coach_address=$row["coach_address"];
		$coach_postcode=$row["coach_postcode"];
		$coach_phonenum=$row["coach_phonenum"];
		$coach_pass=$row["coach_pass"];
		$coach_status=$row["coach_status"];
		$coach_gender=$row["coach_gender"];
		$coach_nation=$row["coach_nation"];
		$coach_religion=$row["coach_religion"];
		$coach_stateofbirth=$row["coach_stateofbirth"];
		$coach_dob=$row["coach_dob"];
		$coach_sport=$row["coach_sport"];
	    $coach_pic=$row["coach_pic"];

		$update=true;
}	
		if(isset($_POST['update'])){
			
		$coach_id=$_POST["coach_id"];
		$coach_email=$_POST["coach_email"];
		$coach_address=$_POST["coach_address"];
		$coach_postcode=$_POST["coach_postcode"];
		$coach_phonenum=$_POST["coach_phonenum"];
		$coach_pass=$_POST["coach_pass"];
		$coach_status=$_POST["coach_status"];	
			
			$hashnew = password_hash($coach_pass, PASSWORD_DEFAULT);
			
			
			
			
			
						
					
			$query="UPDATE coach SET coach_email='$coach_email',coach_address='$coach_address',coach_postcode='$coach_postcode',coach_phonenum='$coach_phonenum',coach_pass='$hashnew',coach_status='$coach_status' WHERE coach_id ='$coach_id'";
			$stmt=$conn->prepare($query);
			$stmt->bind_param("sssssss",$coach_email,$coach_address,$coach_postcode,$coach_phonenum,$hashnew,$coach_status);
			$stmt->execute();
			
		

			header('location:coachlist.php');
			$_SESSION['response']="Successfuly updated!";
			$_SESSION['res_type']="success";

		}
?>