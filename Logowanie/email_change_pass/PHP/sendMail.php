<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require "../../../PHPMailer/PHPMailer.php";
require "../../../PHPMailer/SMTP.php";
require "../../../PHPMailer/Exception.php";

function sendMail($email, $link){
        $mail = new PHPMailer();

		//smtp settings 
		$mail->CharSet = "UTF-8";
        $mail -> isSMTP();
        // $mail ->Host = "ssl0.ovh.net";
        $mail ->Host = "smtp.gmail.com";
        $mail -> SMTPAuth = true;
        $mail -> Username = "zsecup@zse.krakow.pl";
        $mail -> Password = 'zse123zse';
        $mail -> Port = 465;
        $mail -> SMTPSecure = "ssl";

		//email settings
		$mail -> isHTML(true);
		$mail -> setFrom("zsecup@zse.krakow.pl");
		$mail -> addAddress($email);
		$mail -> Subject = "Odzyskaj hasło";
		$mail -> Body = $link;

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