<?php
include 'addattendance.php';
include 'filesLogicAtt.php';
include('../../admin/topnav.php');
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
    <title>Attendance List</title>

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
$query="SELECT * FROM attendance";
$stmt=$conn->prepare($query);
$stmt->execute();
$result=$stmt->get_result();
?>
<h3 class="text-center text-info">Attendance List</h3>
<table class="table table-hover">
    <thead>
     	<tr>
<th>No</th>
<th>Coach ID</th>
<th>Attendance date</th>
<th>Attendance file</th>

     	</tr>
    </thead>
    <tbody>
<?php while($row=$result->fetch_assoc()){	
?>
     	<tr>
<td><?= $row['attendance_id']; ?></td>
<td><?= $row['coach_id']; ?></td>
<td><?= $row['attendance_date']; ?></td>
<td><a href="attendancelist.php?file_id=<?php echo $row['attendance_id']?>">Download</a> </td>



 <td> 
<a href="addattendance.php?delete=<?= $row['attendance_id']; ?>" class="badge badge-danger" p-5 onClick="return confirm('Do you want to delete this record?')">Delete</a>

</td>
<?php }?>
     	</tr>
   	</tbody>
  </table>

</div>
</div>

</body>

</html>
