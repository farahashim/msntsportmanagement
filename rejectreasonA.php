<?php
include("functions1.php");
$req_ID = $_GET['id'];

$query = "select reqsport_id from 'reqsport_player where reqsport_id ='$req_ID';";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reject Reason</title>
</head>

<body>
	
	<div class="modal fade" id="rejectreason" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Rejection Form</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post" action="rejectatlet.php?id=<?php echo $row['reqsport_id']?>">
                <div class="form-group">
					<h1>Reason of rejection</h1>
                  <input type="text" class="form-control" name="reason" placeholder="Enter your reason">
                </div>
               
             
                <div class="form-group">
                  <input type="submit" name="reject" value="reject" class="btn btn-block">
                </div>
              </form>
            </div>
           
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
	  
</body>
</html>