<?php
include 'addatlet.php';
include ('topnav2.php');

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
    <title>Atlet Record</title>

   

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
<?php } //unset($_SESSION['response']); ?>
	
<div class="row">
<div class="col-md-1">
	<button onclick="myFunction()">Add New Atlet</button>
	<div id="myDIV" style="display: none">
<h5 class="text-center text-info">New Atlet</h5>
<form action="addatlet.php" method="post" enctype="multipart/form-data">
	<div class = "form-group">
<input type="hidden" name="atlet_id" value="<?= $atlet_id; ?>" class="form-control" required>	
   </div>
<div class = "form-group">
<input type="text" name="atlet_ic" value="<?= $atlet_ic; ?>" class="form-control"  placeholder="identity card" required>	
   </div>
	 <div class = "form-group">
<input type="text" name="atlet_FN" value="<?= $atlet_FN; ?>" class="form-control"  placeholder="First name" required>	
   </div>
   <div class = "form-group">
<input type="text" name="atlet_LN" value="<?= $atlet_LN; ?>" class="form-control"  placeholder="Last Name" required>	
   </div>
<div class = "form-group">
<input type="number" name="atlet_age" value="<?= $atlet_age; ?>" class="form-control"  placeholder="Age" required>	
   </div>
<div class = "form-group">
<input type="text" name="atlet_email" value="<?= $atlet_email; ?>" class="form-control"  placeholder="Email">	
   </div>
<div class = "form-group">
<input type="text" name="atlet_address" value="<?= $atlet_address; ?>" class="form-control"  placeholder="Address" required>
   </div>

<div class = "form-group">
<input type="number" name="atlet_postcode" value="<?= $atlet_postcode; ?>" class="form-control"  placeholder="Postcode" required>	
   </div>
	
	<div class = "form-group">
<input type="text" name="atlet_phonenum" value="<?= $atlet_phonenum; ?>" class="form-control"  placeholder="Phone number" required>	
   </div>
	
	
	<div class = "form-group">
<input type="password" name="atlet_pass" value="<?= $atlet_pass; ?>" class="form-control"  placeholder="Password" required>	
   </div>
	
	<div class = "form-group">
 <select name="atlet_status" required>
    <option disabled="disabled" selected="selected" value="<?= $atlet_status; ?>">Status Perkahwinan</option>
       <option>Bujang</option>
       <option>Kahwin</option>
	   <option>Bercerai</option>
         </select>
    <div class="select-dropdown"></div>	
   </div>
	
<div class = "form-group">
 <select name="atlet_gender" required>
   <option disabled="disabled" selected="selected" value="<?= $atlet_gender; ?>">Jantina</option>
     <option>Lelaki</option>
      <option>Perempuan</option>
      </select>
      <div class="select-dropdown"></div>
   </div>
	
	<div class = "form-group">
 <select name="atlet_nation" required>
   <option disabled="disabled" selected="selected" value="<?= $atlet_nation; ?>">Bangsa</option>
        <option>Melayu</option>
        <option>Cina</option>
	    <option>India</option>
		<option>Lain-lain</option>
      </select>
      <div class="select-dropdown"></div>
   </div>
	
	<div class = "form-group">
 <select name="atlet_religion" required>
   <option disabled="disabled" selected="selected" value="<?= $atlet_religion; ?>">Agama</option>
    <option>Islam</option>
    <option>Buddha</option>
	<option>Hindu</option>
	<option>Kristian</option>
	<option>Lain-lain</option>
      </select>
      <div class="select-dropdown"></div>
   </div>
	
	
	<div class = "form-group">
 <select name="atlet_stateofbirth" required>
         <option disabled="disabled" selected="selected" value="<?= $atlet_stateofbirth; ?>">Negeri Kelahiran</option>
          <option>JOHOR</option>
          <option>KEDAH</option>
          <option>KELANTAN</option>
		  <option>MELAKA</option>
		  <option>NEGERI SEMBILAN</option>
		<option>PAHANG</option>
			<option>PENANG</option>
			<option>PERAK</option>
			<option>PERLIS</option>
			<option>SABAH</option>
			<option>SARAWAK</option>
			<option>SELANGOR</option>
			<option>TERENGGANU</option>
            </select>
            <div class="select-dropdown"></div>
   </div>
	
	<div class = "form-group">
<input type="date" name="atlet_dob" value="<?= $atlet_dob; ?>" class="form-control"  placeholder="date" required>	
   </div>
	
	<?php
$query="SELECT sport_name FROM sportlist";
$stmt=$conn->prepare($query);
$stmt->execute();
$result=$stmt->get_result();
?>
	<div class = "form-group">
	<select name="atlet_sport">
		<option value="n/a" selected="selected">Sport</option>
		<?php while($row=$result->fetch_assoc()){	?>
		<option value="<?= $row['sport_name']; ?>"><?= $row['sport_name']; ?></option>
	<?php }?>
	</select>
                                <div class="select-dropdown"></div>
  		
 </div>

	

		
	
<div class = "text1">
<h6>Upload image</h6>	
   </div>
<div class = "form-group">
<input type="hidden" name="oldimage" value"<?= $atlet_pic; ?>">
<input type="file" name="image" class="custom-file">	
<img src"<?= $atlet_pic; ?>" width="150" class="img-thumbnail">
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
	</div>

<div class="col-md-8">
<?php
$query="SELECT * FROM atlet";
$stmt=$conn->prepare($query);
$stmt->execute();
$result=$stmt->get_result();
?>
<h3 class="text-center text-info">Atlet Record</h3>
<table class="table table-hover">
    <thead>
     	<tr>
<th>No</th>
<th>IC</th>
<th>Nama Pertama</th>
<th>Nama terakhir</th>
<th>Umur</th>
<th>Email</th>
<th>Address</th>
<th>Poskod</th>
<th>No telefon</th>
<th>No telefon Penjaga</th>
<th>Status</th>
<th>Gender</th>
<th>Nation</th>
<th>Religion</th>
<th>State of birth</th>
<th>Date of birth</th>
<th>Sport</th>
<th>Picture</th>
<th>Action</th>
     	</tr>
    </thead>
    <tbody>
<?php while($row=$result->fetch_assoc()){	
?>
     	<tr>
<td><?= $row['atlet_id']; ?></td>
<td><?= $row['atlet_ic']; ?></td>
<td><?= $row['atlet_FN']; ?></td>
<td><?= $row['atlet_LN']; ?></td>
<td><?= $row['atlet_age']; ?></td>
<td><?= $row['atlet_email']; ?></td>
<td><?= $row['atlet_address']; ?></td>
<td><?= $row['atlet_postcode']; ?></td>
<td><?= $row['atlet_phonenum']; ?></td>
<td><?= $row['atlet_phonenumpp']; ?></td>
<td><?= $row['atlet_status']; ?></td>
<td><?= $row['atlet_gender']; ?></td>
<td><?= $row['atlet_nation']; ?></td>
<td><?= $row['atlet_religion']; ?></td>
<td><?= $row['atlet_stateofbirth']; ?></td>
<td><?= $row['atlet_dob']; ?></td>
<td><?= $row['atlet_sport']; ?></td>
<td><img src="<?= $row['atlet_pic']; ?>" width="25"></td>


 <td> 
<a href="atletlist.php?edit=<?= $row['atlet_id']; ?>" class="badge badge-success" p-5>Edit</a>
<a href="addatlet.php?delete=<?= $row['atlet_id']; ?>" class="badge badge-danger" p-5 onClick="return confirm('Do you want to delete this record?')">Delete</a>

</td>
<?php }?>
     	</tr>
   	</tbody>
  </table>

</div>
</div>

</body>
	<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
</html>
