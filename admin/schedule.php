<?php 
include 'config.php';
include 'topnav2.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Schedule Upload</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
		   <link rel="stylesheet" href="../../sukan/admin/equipment/styleAdm/index.css">
<style>
.container{
	margin: 0 auto !important;
	margin-top: 100px !important;
}
</style>

</head>

<body>
	<form method="post" action="schedule-action.php" enctype="multipart/form-data">
		
		<?php
$query="SELECT sport_name FROM sportlist";
$stmt=$conn->prepare($query);
$stmt->execute();
$result=$stmt->get_result();
?>
<div class="container">
	<h1><strong>JADUAL</strong></h1>
	<div class="col">
	<div class = "form-group">

	<select class="input--style-3" name="sport_name">
		<option value="n/a" selected="selected">Sport</option>
		<?php while($row=$result->fetch_assoc()){	?>
		<option value="<?= $row['sport_name']; ?>"><?= $row['sport_name']; ?></option>
	<?php }?>
	</select>

                                <div class="select-dropdown"></div>
  		
 </div>
		
			<div class="form-group">
			</div>
<div class="col-sm-4">
Files <span style="color:red">*</span><input class="submit" type="file" name="sport_schedule" required>
</div>
</div>
		<input name="upload" class="submit" type="submit" value="Upload">
	
	</form>
</div>
</body>
</html>