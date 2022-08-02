<?php
	$conn = new mysqli("localhost", "root", "", "sport");
	if($conn->connect_error){
		die("Could not connect to database!".$conn->connect_error);
	}
?>