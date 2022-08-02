<?php
require 'config.php';
$user=$_GET['user'];

$query="SELECT sport_name FROM sportlist WHERE sport_id=$user";
$stmt=$conn->prepare($query);
$stmt->execute();
$result=$stmt->get_result();

while($row=$result->fetch_assoc()){
	$name = $row['sport_name'];
	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 <link rel="stylesheet" href="css/admin-dashboard.css">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Sport List</title>

    <!-- Favicon  -->
   

    <!-- Style CSS -->
    <link rel="stylesheet" href="stylelist.css">
<style>
.topnav {
  overflow: hidden;
  background-color: #ffa500;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: black;
  color: white;
}

</style>
</head>

<body>
   

<div class="topnav">
  <a href="admin-dashboard.php"><b>Home</b></a>
  <a href="coachlist.php"><b>Coach Record</b></a>
  <a href="atletlist.php"><b>Atlet Record</b></a>
  <a style="float:right" href="adminlogin.php"><b>Logout</b></a>
</div>
	<!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="bootstrap.min1.css">

<!-- jQuery library -->
<script src="jquery.min.js"></script>

<!-- Popper JS -->
<script src="popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-10">
<hr>

<div class="row">

<div class="col-md-8">
<?php
$query="SELECT * FROM atlet WHERE atlet_sport ='$name'";
$stmt=$conn->prepare($query);
$stmt->execute();
$result=$stmt->get_result();
?>
<h3 class="text-center text-info">Player List</h3>
<table class="table table-hover">
    <thead>
     	<tr>
<th>Atlet ID</th>
<th>Atlet IC</th>
<th>Atlet Name</th>
<th>Atlet Age</th>
<th>Atlet Email Address</th>
<th>Atlet Phone Number</th>
<th>Atlet Phone Number Parent</th>
<th>Atlet Address</th>
<th>Atlet Postcode</th>
     	</tr>
    </thead>
    <tbody>
<?php 
	while($row=$result->fetch_assoc()){
?>
     	<tr>
<td><?= $row['atlet_id']; ?></td>
<td><?= $row['atlet_ic']; ?></td>
<td><?= $row['atlet_FN']; ?> <?= $row['atlet_LN']; ?></td>
<td><?= $row['atlet_age']; ?></td>
<td><?= $row['atlet_email']; ?></td>
<td><?= $row['atlet_phonenum']; ?></td>
<td><?= $row['atlet_phonenumpp']; ?></td>
<td><?= $row['atlet_address']; ?></td>
<td><?= $row['atlet_postcode']; ?></td>
			

 <td> 

</td>
<?php }?>
     	</tr>
   	</tbody>
  </table>

</div>
</div>

</body>
	
</html>
