<?php
include 'addsport.php';
include 'topnav2.php';
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
<?php if(isset($_SESSION['response'])){ ?>
<div class="alert alert-<?= $_SESSION['res_type']; ?> 
alert-dismissible text-center">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
<b><?= $_SESSION['response']; ?></b>
</div>

</div>

</div>	

</div>
<?php } unset($_SESSION['response']); ?>
<div class="row">
<div class="col-md-2">
<h5 class="text-center text-info">Add New</h5>
<form action="addsport.php" method="post" enctype="multipart/form-data">
	<div class = "form-group">
<input type="hidden" name="sport_id" value="<?= $sport_id; ?>" class="form-control" required>	
   </div>
<div class = "form-group">
<input type="text" style="text-transform: uppercase" onKeyDown="upperCaseF(this)" name="sport_name" value="<?= $sport_name; ?>" class="form-control"  placeholder="Sport name" required>	
   </div>
	
	<?php
$query="SELECT coach_FN FROM coach";
$stmt=$conn->prepare($query);
$stmt->execute();
$result=$stmt->get_result();
?>
	<div class = "form-group">
	<select name="sport_coach">
		<option value="n/a" selected="selected">Coach</option>
		<?php while($row=$result->fetch_assoc()){	?>
		<option value="<?= $row['coach_FN']; ?>"><?= $row['coach_FN']; ?></option>
	<?php }?>
	</select>
                                <div class="select-dropdown"></div>
  		
 </div>
	
	
<div class = "form-group">
<?php if($update == true){?>
<input type="submit" name="update" class="btn btn-success btn-block" value="Update Record" >	
<?php } else{ ?>
<input type="submit" name="add" class="btn btn-primary btn-block" value="Add Record">
<?php } ?>
   </div>
</form>
</div>

<div class="col-md-8">
<?php
$query="SELECT * FROM sportlist";
$stmt=$conn->prepare($query);
$stmt->execute();
$result=$stmt->get_result();
?>
<h3 class="text-center text-info">Atlet Record</h3>
<table class="table table-hover">
    <thead>
     	<tr>
<th>No</th>
<th>Sport Name</th>
<th>Coach Name</th>
<th>Player List</th>
<th>Action</th>
     	</tr>
    </thead>
    <tbody>
<?php while($row=$result->fetch_assoc()){	
?>
     	<tr>
<td><?= $row['sport_id']; ?></td>
<td><?= $row['sport_name']; ?></td>
<td><?= $row['sport_coach']; ?></td>
<td><a href="sportplayer.php?user=<?php echo $row['sport_id']?>">View</a></td>

 <td> 
<a href="sportlist.php?edit=<?= $row['sport_id']; ?>" class="badge badge-success" p-5>Edit</a>
<a href="addsport.php?delete=<?= $row['sport_id']; ?>" class="badge badge-danger" p-5 onClick="return confirm('Do you want to delete this record?')">Delete</a>

</td>
<?php }?>
     	</tr>
   	</tbody>
  </table>

</div>
</div>

</body>
	<script>
	function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}
</script>
</html>
