<?php

    session_start(); //we need session for the log in thingy XD
    include('functions1.php');
?>




<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Coach Request</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/admin-dashboard.css">
	
	 <link rel="shortcut icon" href="picture/karya2.png" type="image/x-icon">
	<link rel="icon" href="picture/karya2.png" type="image/x-icon">
	
	<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
	background-image: url("images/background1.png");
 	background-repeat:no-repeat;
	background-position:center;
	background-attachment: fixed;
	background-size:cover;
}

.topnav {
  overflow: hidden;
  background-color: #333;
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
  background-color: #4CAF50;
  color: white;
}

</style>
	
<?php  
include('topnav.php');
?>

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap.min1.css">

<!-- jQuery library -->
<script src="jquery.min.js"></script>

<!-- Popper JS -->
<script src="popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
</head>

<body>
	
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<h3 class="text-center text-dark mt-2">Coach Registration Request</h3>
				<hr>
				<div class="container">
            <?php
            
                $query = "select * from `reqsport_coach`;";
                if(count(fetchAll($query))>0){
                    foreach(fetchAll($query) as $row){
                        ?>
                
                    <h1 class="jumbotron-heading"><?php echo $row['reqcoach_ic'] ?></h1>
					<h1><?php echo $row['reqcoach_FN']?><?php echo $row['reqcoach_LN']?></h1>
					
					<h1><?php echo $row['reqcoach_phonenum']?></h1>
					<h1><?php echo $row['reqcoach_sport']?></h1>
					
                     
                      <p>
                        <a href="acceptcoach.php?id=<?php echo $row['reqcoach_id'] ?>" class="btn btn-primary my-2">Accept</a>
						  
						  <a href="rejectcoach.php?id=<?php echo $row['reqcoach_id'] ?>" class="btn btn-primary my-2">Reject</a> 
						  
						
                      </p>
					
					
				
            <?php
	
                    }
					
				
                }else{
                    echo "No Pending Requests.";
                }
            ?>
          
        </div>
					</div>
		
		</div>	

  </div>
	
	 <!-- Modal content-->
<div class="modal fade" id="rejectreason" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body">
          <form method="post" action="rejectcoach.php?id=<?php echo $id ?>">
                <div class="form-group">
					<h1>Reason of rejection</h1>
                  <input type="text" class="form-control" name="reason" placeholder="Enter your reason">
                </div>
               
             <?php 
			  echo $id;
			  
			  ?>
                <div class="form-group">
                
					<button type="submit" name="reject" value="reject" >Reject</button>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	
	
  
  
	
	
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	
	
	
</body>
	
	
	
	
</html>