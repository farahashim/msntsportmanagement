<?php
include 'config.php';
require 'initA.php';
if(isset($_SESSION['user_id']) && isset($_SESSION['user_icA'])){
    $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
    if($user_data ===  false){
        header('Location: logoutA.php');
        exit;
    }
    // FETCH ALL USERS WHERE ID IS NOT EQUAL TO MY ID
    
}
else{
    header('Location: logoutA.php');
    exit;
}



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profile Picture</title>
	
	 <style>
	  .button {
  background: linear-gradient(to bottom, #ff6666 0%, #ff9933 100%);
  border: none;
  color: white;
  padding: 5px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button4 {border-radius: 12px;}
	  </style>
</head>

<body>
	
	<form method="post" class="form-horizontal" action="profilepicA-action.php?user=<?php echo $user_data->atlet_id ?>" enctype="multipart/form-data">
		<div class="form-group">
		
<div class="col-sm-8">
	<img src="<?php echo $user_data->atlet_pic; ?>" width="300" height="200" style="border:solid 1px #000">
		</div>
		
		</div>
		
		<div class="form-group">
												<label class="col-sm-4 control-label">Upload Profile Picture<span style="color:red">*</span></label>
												<div class="col-sm-8">
													<input type="hidden" name="oldimage" value"<?= $user_data->atlet_pic; ?>">
											<input type="file" name="image" class="custome-file" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="button button4" name="update" type="submit">Update</button>
												</div>
											</div>
		
		
		
					
											
		
	</form>
	<div class="col-sm-8 col-sm-offset-4">
								<a href="editatlet-pic.php"  class="button button4">Back</a>
						
												</div>
</body>
</html>