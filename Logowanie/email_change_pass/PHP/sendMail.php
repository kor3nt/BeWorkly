<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require "../../../PHPMailer/PHPMailer.php";
require "../../../PHPMailer/SMTP.php";
require "../../../PHPMailer/Exception.php";

function sendMail($email, $token){
        $mail = new PHPMailer();

		//smtp settings 
		$mail->CharSet = "UTF-8";
        $mail -> isSMTP();
        // $mail ->Host = "ssl0.ovh.net";
        $mail ->Host = "smtp.gmail.com";
        $mail -> SMTPAuth = true;
        $mail -> setFrom("twojemail@gmail.com");
        $mail -> Password = 'haslo';
        $mail -> Port = 465;
        $mail -> SMTPSecure = "ssl";

		//email settings
		$mail -> isHTML(true);
		$mail -> setFrom("twojemail@gmail.com");
		$mail -> addAddress($email);
		$mail -> Subject = "Odzyskaj hasło";
		$mail -> Body = "http://localhost/BeWorkly/Logowanie/email_change_pass/pass_change.php?token=".$token."&email=".$email;

		if($mail -> Send()){
            $mail -> smtpClose();
			return true;
		}
		else{
            $mail -> smtpClose();
			return false;
		}	
}

?>