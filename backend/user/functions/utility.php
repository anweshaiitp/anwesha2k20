<?php

function send_email($email,$subject,$msg,$headers){
// 	return (mail($email,$subject,$msg,$headers));

	require "PHPMailerAutoload.php";

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 4;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'tls://mail.celesta.org.in';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = "pranaykgupta21@gmail.com";                 // SMTP username
	$mail->Password = "9717107893"; 
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('pranaykgupta21@gmail.com', 'Anwesha2k20');
	$mail->addAddress($email);     // Add a recipient
	//$mail->addAddress('ellen@example.com');               // Name is optional
	$mail->addReplyTo('pranaykgupta21@gmail.com', 'Information');
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $subject;
	$mail->Body    = $msg;
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	    // echo 'Message could not be sent.';
		// echo 'Mailer Error: ' . $mail->ErrorInfo;
	    return false;
	} else {
	  //  echo 'Message has been sent';
	    return true;
	}
}

//Function to generate random anweshaid
function getAnweshaId(){
	$sql="SELECT anweshaid FROM users ORDER BY id DESC LIMIT 1";
	$result=query($sql);
	if(row_count($result)){
		$row=fetch_array($result);
		$anw=substr($row['anweshaid'],3,7);
		$anw= (int)$anw + 1 ;
		$anweshaid= "ANW".$anw;
	}else{
		$anweshaid="ANW2000";
	}
	return $anweshaid;
}

// TO check if a user is ca or not
function isUserCA($email){
	$sql="SELECT id from ca_users where email='$email'";
	$result=query($sql);
	if(row_count($result)==1){
		return true;
	}else{
		return false;
	}
}

//To check if the given phone number already exists or not
function phone_exists($email){
	$sql="SELECT id FROM users WHERE phone='$phone'";
	$result=query($sql);
	if(row_count($result)==1){
		return true;
	}
	else{
		return false;
	}
}

// To check if the user exists or not
function refrral_id_exist($referral_id){
	$sql = "SELECT id, active FROM ca_users WHERE anweshaid ='".$referral_id."'";
	$result = query($sql);
	if(row_count($result)==1){
		$row=fetch_array($result);
		if($row['active']==1){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}


//To check if the given email address already exists or not
function email_exists($email){
	$sql="SELECT id FROM users WHERE email='$email'";
	$result=query($sql);
	if(row_count($result)==1){
		return true;
	}
	else{
		return false;
	}
}

// Add referral points
function update_referral_points($referral_id){
	$sql = "SELECT score FROM ca_users WHERE anweshaid='$referral_id'";
	$result = query($sql);
	if(row_count($result)==1){
		$row=fetch_array($result);
		$points=$row['score'];
		$points = $points + 10;

		$sql1 = "UPDATE ca_users SET score=$points WHERE anweshaid='$referral_id'";
		$result1 = query($sql1);
		confirm($result1);
	}
}
