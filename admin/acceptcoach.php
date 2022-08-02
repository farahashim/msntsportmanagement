<?php
    include("functions1.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\composer\vendor\autoload.php';

    $req_ID = $_GET['id'];
    $query = "select * from `reqsport_coach` where `reqcoach_id` = '$req_ID'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
			$coach_ic =$row['reqcoach_ic'];
			$coach_FN =$row['reqcoach_FN'];
			$coach_LN =$row['reqcoach_LN'];
			$coach_age =$row['reqcoach_age'];
			$coach_email =$row['reqcoach_email'];
			$coach_address=$row['reqcoach_address'];
			$coach_postcode=$row['reqcoach_postcode'];
			$coach_phonenum=$row['reqcoach_phonenum'];
			$coach_pass =$row['reqcoach_pass'];
			$coach_status=$row['reqcoach_status'];
			$coach_gender =$row['reqcoach_gender'];
			$coach_nation =$row['reqcoach_nation'];
			$coach_religion =$row['reqcoach_religion'];
			$coach_stateofbirth =$row['reqcoach_stateofbirth'];	
			$coach_dob =$row['reqcoach_dob'];	
			$coach_sport =$row['reqcoach_sport'];	
			
			$nosched ='n/a';			
			$nopic ='n/a';
			$subject = 'Request Accepted !';
			
			
             $query = "INSERT INTO coach(coach_ic,coach_FN,coach_LN,coach_age,coach_email,coach_address,coach_postcode,coach_phonenum,coach_pass,coach_status,coach_gender,coach_nation,coach_religion,coach_stateofbirth,coach_dob,coach_sport,coach_pic,coach_schedule) VALUES ('$coach_ic','$coach_FN','$coach_LN','$coach_age','$coach_email','$coach_address','$coach_postcode','$coach_phonenum','$coach_pass','$coach_status','$coach_gender','$coach_nation','$coach_religion','$coach_stateofbirth','$coach_dob','$coach_sport','$nopic','$nosched');";
					
	
				
        }
		
		
        $query .= "DELETE FROM `reqsport_coach` WHERE `reqsport_coach`.`reqcoach_id` = '$req_ID';";
        if(performQuery($query)){
            echo "Account has been accepted.";
		
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }

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
		
		
		$message1 = "Hello $coach_FN $coach_LN  \n";
	    $message3 = "Identity Card : $coach_ic \n";
		$message2= "Your request has been accepted. You may login using your requested password and change it if you want. If this registration is not be done by you please contact MSN TERRENGANU (06-22****) \n";
		
		
		$mail->isHTML(true);
		$mail->setFrom("admin-no-reply@yourdomain.com");
		$mail->addAddress($coach_email);
		$mail->Subject =$subject;
		$mail->Body = nl2br($message1.$message3.$message2);
		 
		$mail->send();
		
		echo "<script>alert('Message has been sent !');window.location.href = 'coachrequest.php';</script>";
	}
		catch (Exception $e)
		{
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
			
		
		
		
	
    
?>
<br/><br/>
<a href="coachrequest.php">Back</a>