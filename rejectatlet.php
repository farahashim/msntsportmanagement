<?php

    include 'config.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\composer\vendor\autoload.php';


if(isset($_POST['reject']))
{
    $req_ID = $_GET['id'];
	$subject = 'Athlete Registration Request Rejected';
	$messege = $_POST['reason'];
	
	
	$sql = "select * from reqsport_player where reqsport_id = '$req_ID'";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$result=$stmt->get_result();
	$row=$result->fetch_assoc();
	
	        $reqsport_ic = $row['reqsport_ic'];
	        $reqsport_email = $row['reqsport_email'];
            $reqsport_FN = $row['reqsport_FN'];
            $reqsport_LN = $row['reqsport_LN'];
            $reqsport_pass = $row['reqsport_pass'];
		
	
	
	
	$query1="DELETE FROM reqsport_player WHERE reqsport_id='$req_ID'";
		$stmt1=$conn->prepare($query1);
		$stmt1->execute();
	
	
		$mail = new PHPMailer(true);
	
	try {
		$mail->isSMTP();
		$mail->SMTPDebug = 0;
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Username = "sukanterengganu@gmail.com";
		$mail->Password = "2242748d98";
		$mail->Port = 587; //465 (SSL) 587 (TLS)
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
			)
		);
		
		
		$message1 = "Hello $reqsport_FN $reqsport_LN  \n";
		$message3 = "Identity Card : $reqsport_ic \n";
		$message2= "We would like to say sorry that your request have been rejected to due \n";
		
		
		$mail->isHTML(true);
		$mail->setFrom("admin-no-reply@yourdomain.com");
		$mail->addAddress($reqsport_email);
		$mail->Subject =$subject;
		$mail->Body = nl2br($message1.$message3.$message2.$messege);
		 
		$mail->send();
		
		echo "<script>alert('Message has been sent !');window.location.href = 'atletrequest.php';</script>";
	}
		catch (Exception $e)
		{
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
			
		
		
		
	}
	
   
	
	
       


?>
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	 <form method="post" action="">
                <div class="form-group">
					<h1>Reason of rejection</h1>
                  <input type="text" class="form-control" name="reason" placeholder="Enter your reason">
                </div>
               
             
                <div class="form-group">
                
					<button type="submit" name="reject" value="reject" >Reject</button>
                </div>
              </form>
	
	
	</body>

</html>

