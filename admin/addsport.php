<?php
	session_start();
	include 'config.php';
	
	$update=false;
    $sport_id="";
	$sport_name="";
	$sport_coach="";
    
	

	if(isset($_POST['add'])){
		$sport_id=$_POST["sport_id"];
		$sport_name=$_POST["sport_name"];
		$sport_coach=$_POST["sport_coach"];
	
		
		$query="INSERT INTO sportlist (sport_name,sport_coach)VALUES(?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("ss",$sport_name,$sport_coach);
		$stmt->execute();
		
		
		
		header('location:sportlist.php');
		$_SESSION['response']="Succesfully Added!";
		$_SESSION['res_type']="success";
	}
	if(isset($_GET['delete']))
	{
		$sport_id=$_GET['delete'];
		
	
		$query="DELETE FROM sportlist WHERE sport_id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$sport_id);
		$stmt->execute();
		
		
		header('location:sportlist.php');
		$_SESSION['response']="Succesfully Deleted!";
		$_SESSION['res_type']="danger";
	}

if(isset($_GET['edit'])){
	$sport_id=$_GET['edit'];
	$query="SELECT * FROM sportlist WHERE sport_id=?";
	$stmt=$conn->prepare($query);
	$stmt->bind_param("i",$sport_id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row=$result->fetch_assoc();
	    
	
	    $sport_id=$row["sport_id"];
		$sport_name=$row["sport_name"];
		$sport_coach=$row["sport_coach"];
		

		$update=true;
}	
		if(isset($_POST['update'])){
			
		$sport_id=$_POST["sport_id"];
		$sport_name=$_POST["sport_name"];
		$sport_coach=$_POST["sport_coach"];
					
					
			$query="UPDATE sportlist SET sport_name='$sport_name',sport_coach='$sport_coach' WHERE sport_id ='$sport_id'";
			$stmt=$conn->prepare($query);
			$stmt->bind_param("ss",$sport_name,$sport_coach);
			$stmt->execute();
			
		

			header('location:sportlist.php');
			$_SESSION['response']="Successfuly updated!";
			$_SESSION['res_type']="success";

		}
?>