<?php
    include("functions1.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\composer\vendor\autoload.php';

    $req_ID = $_GET['id'];
    $query = "select * from `reqsport_player` where `reqsport_id` = '$req_ID'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
			$atlet_ic =$row['reqsport_ic'];
			$atlet_FN =$row['reqsport_FN'];
			$atlet_LN =$row['reqsport_LN'];
			$atlet_age =$row['reqsport_age'];
			$atlet_email =$row['reqsport_email'];
			$atlet_address=$row['reqsport_address'];
			$atlet_postcode=$row['reqsport_postcode'];
			$atlet_phonenum=$row['reqsport_phonenum'];
			$atlet_phonenumpp=$row['reqsport_phonenumpp'];
			$atlet_pass =$row['reqsport_pass'];
			$atlet_status=$row['reqsport_status'];
			$atlet_gender =$row['reqsport_gender'];
			$atlet_nation =$row['reqsport_nation'];
			$atlet_religion =$row['reqsport_religion'];
			$atlet_stateofbirth =$row['reqsport_stateofbirth'];	
			$atlet_dob =$row['reqsport_dob'];	
			$atlet_sport =$row['reqsport_sport'];	
			
			$nosched ='n/a';			
			$nopic ='n/a';
			$subject = 'Request Accepted !';
			
			
			
             $query = "INSERT INTO atlet(atlet_ic,atlet_FN,atlet_LN,atlet_age,atlet_email,atlet_address,atlet_postcode,atlet_phonenum,atlet_phonenumpp,atlet_pass,atlet_status,atlet_gender,atlet_nation,atlet_religion,atlet_stateofbirth,atlet_dob,atlet_sport,atlet_pic,atlet_schedule) VALUES ('$atlet_ic','$atlet_FN','$atlet_LN','$atlet_age','$atlet_email','$atlet_address','$atlet_postcode','$atlet_phonenum','$atlet_phonenumpp','$atlet_pass','$atlet_status','$atlet_gender','$atlet_nation','$atlet_religion','$atlet_stateofbirth','$atlet_dob','$atlet_sport','$nopic','$nosched');";
					
	
				
        }
		
		
        $query .= "DELETE FROM `reqsport_player` WHERE `reqsport_player`.`reqsport_id` = '$req_ID';";
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
		
		
		$message1 = "Hello $atlet_FN $atlet_LN  \n";
	    $message3 = "Identity Card : $atlet_ic \n";
		$message2= "Your request has been accepted. You may login using your requested password and change it if you want. If this registration is not be done by you please contact MSN TERRENGANU (06-22****) \n";
		
		
		$mail->isHTML(true);
		$mail->setFrom("admin-no-reply@yourdomain.com");
		$mail->addAddress($atlet_email);
		$mail->Subject =$subject;
		$mail->Body = nl2br($message1.$message3.$message2);
		 
		$mail->send();
		
		echo "<script>alert('Message has been sent !');window.location.href = 'atletrequest.php';</script>";
	}
		catch (Exception $e)
		{
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
			
		
		
		
	
    
?>
<br/><br/>
<a href="atletrequest.php">Back</a>