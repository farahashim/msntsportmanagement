<?php
error_reporting(0);

	include 'config.php';
	
	$update=false;
    $atlet_id="";
	$atlet_ic="";
	$atlet_FN="";
	$atlet_LN="";
	$atlet_age="";
	$atlet_email="";
    $atlet_address="";
    $atlet_postcode="";
    $atlet_phonenum="";
	$atlet_phonenumpp="n/a";
	$atlet_pass="";
	$atlet_status="";
	$atlet_gender="";
	$atlet_nation="";
	$atlet_religion="";
    $atlet_stateofbirth="";
    $atlet_dob="";
	$atlet_sport="";
    $atlet_pic="";

    
	

	if(isset($_POST['add'])){
		$atlet_ic=$_POST["atlet_ic"];
		$atlet_FN=$_POST["atlet_FN"];
		$atlet_LN=$_POST["atlet_LN"];
		$atlet_age=$_POST["atlet_age"];
		$atlet_email=$_POST["atlet_email"];
		$atlet_address=$_POST["atlet_address"];
		$atlet_postcode=$_POST["atlet_postcode"];
		$atlet_phonenum=$_POST["atlet_phonenum"];
		$atlet_pass=$_POST["atlet_pass"];
		$atlet_status=$_POST["atlet_status"];
		$atlet_gender=$_POST["atlet_gender"];
		$atlet_nation=$_POST["atlet_nation"];
		$atlet_religion=$_POST["atlet_religion"];
		$atlet_stateofbirth=$_POST["atlet_stateofbirth"];
		$atlet_dob=$_POST["atlet_dob"];
		$atlet_sport=$_POST["atlet_sport"];
		$atlet_schedule="n/a";
		$atlet_phonenumpp="n/a";
			
		$atlet_pic=$_FILES['image']['name'];
		$upload="atletimg/".$atlet_pic;
		
		
		
		 
		
	   $hash = password_hash($atlet_pass, PASSWORD_DEFAULT);
		
		
		
		
		$query="INSERT INTO atlet (atlet_ic,atlet_FN,atlet_LN,atlet_age,atlet_email,atlet_address,atlet_postcode,atlet_phonenum,atlet_phonenumpp,atlet_pass,atlet_status,atlet_gender,atlet_nation,atlet_religion,atlet_stateofbirth,atlet_dob,atlet_sport,atlet_pic,atlet_schedule)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssssssssssssssss",$atlet_ic,$atlet_FN,$atlet_LN,$atlet_age,$atlet_email,$atlet_address,$atlet_postcode,$atlet_phonenum,$atlet_phonenumpp,$hash,$atlet_status,$atlet_gender,$atlet_nation,$atlet_religion,$atlet_stateofbirth,$atlet_dob,$atlet_sport,$upload,$atlet_schedule);
		$stmt->execute();
		
		
		move_uploaded_file($_FILES['image']['tmp_name'], $upload);
		
		
		header('location:atletlist.php');
		$_SESSION['response']="Succesfully Added!";
		$_SESSION['res_type']="success";
	}
	if(isset($_GET['delete']))
	{
		$atlet_id=$_GET['delete'];
		
		$sql="SELECT atlet_pic FROM atlet WHERE atlet_id=?";
		$stmt2=$conn->prepare($sql);
		$stmt2->bind_param("i",$atlet_id);
		$stmt2->execute();
		$result2=$stmt2->get_result();
		$row=$result2->fetch_assoc();
		
		$imagepath=$row['atlet_pic'];
		unlink($imagepath);
		
		
		$query="DELETE FROM atlet WHERE atlet_id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$atlet_id);
		$stmt->execute();
		
		
		header('location:atletlist.php');
		$_SESSION['response']="Succesfully Deleted!";
		$_SESSION['res_type']="danger";
	}

if(isset($_GET['edit'])){
	$atlet_id=$_GET['edit'];
	$query="SELECT * FROM atlet WHERE atlet_id=?";
	$stmt=$conn->prepare($query);
	$stmt->bind_param("i",$atlet_id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row=$result->fetch_assoc();
	    
	
	    $atlet_id=$row["atlet_id"];
		$atlet_ic=$row["atlet_ic"];
		$atlet_FN=$row["atlet_FN"];
		$atlet_LN=$row["atlet_LN"];
		$atlet_age=$row["atlet_age"];
		$atlet_email=$row["atlet_email"];
		$atlet_address=$row["atlet_address"];
		$atlet_postcode=$row["atlet_postcode"];
		$atlet_phonenum=$row["atlet_phonenum"];
	    $atlet_phonenumpp=$row["atlet_phonenumpp"];
		$atlet_pass=$row["atlet_pass"];
		$atlet_status=$row["atlet_status"];
		$atlet_gender=$row["atlet_gender"];
		$atlet_nation=$row["atlet_nation"];
		$atlet_religion=$row["atlet_religion"];
		$atlet_stateofbirth=$row["atlet_stateofbirth"];
		$atlet_dob=$row["atlet_dob"];
		$atlet_sport=$row["atlet_sport"];
	    $atlet_pic=$row["atlet_pic"];

		$update=true;
}	
		if(isset($_POST['update'])){
			
		$atlet_id=$_POST["atlet_id"];
		$atlet_email=$_POST["atlet_email"];
		$atlet_address=$_POST["atlet_address"];
		$atlet_postcode=$_POST["atlet_postcode"];
		$atlet_phonenum=$_POST["atlet_phonenum"];
		$atlet_phonenumpp=$_POST["atlet_phonenumpp"];
		$atlet_pass=$_POST["atlet_pass"];
		$atlet_status=$_POST["atlet_status"];	
	    
			
			$hashnew = password_hash($atlet_pass, PASSWORD_DEFAULT);
			
			
			
			
						
					
			$query="UPDATE atlet SET atlet_email='$atlet_email',atlet_address='$atlet_address',atlet_postcode='$atlet_postcode',atlet_phonenum='$atlet_phonenum',atlet_phonenumpp='$atlet_phonenumpp',atlet_pass='$hashnew',atlet_status='$atlet_status' WHERE atlet_id ='$atlet_id'";
			$stmt=$conn->prepare($query);
			$stmt->bind_param("sssssss",$atlet_email,$atlet_address,$atlet_postcode,$atlet_phonenum,$atlet_phonenumpp,$hashnew,$atlet_status);
			$stmt->execute();
			
		

			header('location:atletlist.php');
			$_SESSION['response']="Successfuly updated!";
			$_SESSION['res_type']="success";

		}
?>