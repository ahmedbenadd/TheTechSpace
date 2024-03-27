<?php
	include('smtp/PHPMailerAutoload.php');
	function smtp_mailer($to,$subject, $msg){
		$mail = new PHPMailer(); 
		$mail->IsSMTP(); 
		$mail->SMTPAuth = true; 
		$mail->SMTPSecure = 'tls'; 
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587; 
		$mail->IsHTML(true);
		$mail->CharSet = 'UTF-8';
		$mail->Username = "thetechspacecontact@gmail.com";
		$mail->Password = "jsdkqklsyukmzuzr";
		$mail->SetFrom("thetechspacecontact@gmail.com");
		$mail->Subject = $subject;
		$mail->Body =$msg;
		$mail->AddAddress($to);
		$mail->SMTPOptions=array('ssl'=>array(
			'verify_peer'=>false,
			'verify_peer_name'=>false,
			'allow_self_signed'=>false
		));
		if(!$mail->Send()){
			return false;
		}else{
			return true;
		}
	}
	if(isset($_POST)){
		$f_name = $_POST['fullName'];
		$y_email = $_POST['email'];
		$y_subject = $_POST['subject'];
		$y_message = $_POST['message'];
		$full_email = "Full Name: $f_name | Email: $y_email | Subject: $y_subject | Message: $y_message";
		$r_email = "Hi $f_name, your email has been received. Thank you for contacting us.";

		if (smtp_mailer("$y_email", "The TechSpace Contact", "$r_email")) {
			if (smtp_mailer('thetechspacecontact@gmail.com', "Sent by $f_name", $full_email)) {
				$response = "email_sent";
			} else {
				$response = "sending_error";
			}
		} else {
			$response = "invalid_email";
		}
	
		echo json_encode($response);
	}
	
?>