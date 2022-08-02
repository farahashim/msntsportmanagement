<?php
	session_start();
	
	include ("config.php");
	
	$update=false;
    $attendance_id="";
	$coach_id="";
	$attendance_date="";
	$attendance_file="";

    
	
	if(isset($_GET['delete']))
	{
		$attendance_id=$_GET['delete'];
		
	
		$query="DELETE FROM attendance WHERE attendance_id=?";
		$stmt=$link->prepare($query);
		$stmt->bind_param("i",$attendance_id);
		$stmt->execute();
		
		
		header('location:attendancelist.php');
		$_SESSION['response']="Succesfully Deleted!";
		$_SESSION['res_type']="danger";
	}

	
?>