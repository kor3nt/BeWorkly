<?php
session_start();

require_once "../connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);
try 
{
	$connect = new mysqli($host, $db_user, $db_password, $db_name);
	// Uzyskanie danych z pliku js
	$work = $_POST['work'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $other = $_POST['other'];
    $photo = $_POST['photo'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];

	if ($connect->connect_errno!=0)
	{
		throw new Exception(mysqli_connect_errno());
	}
	else
	{	
	    if ($connect->query("INSERT INTO orders VALUES (NULL, '$username', '$password', '$name', '$surname', '$email', 0, '$otp', 'user', '$token')"))
		{

				if ($connect->query("INSERT INTO zsebet_amount VALUES (NULL, '$username', 1000)"))
				{
					$_SESSION['verify'] = 0;
					$_SESSION['otp'] = $otp;
					$_SESSION['username'] = $username;
					$_SESSION['email'] = $email;
					echo 'success';

					require_once "sendMail.php";
					sendMail($email, $otp);
					
					// $mailer = sendMail($email, $otp);
					// if($mailer){
					// 	echo 'send';
					// }
					// else{
					// 	echo 'error';
					// }
				}
				else
				{
					throw new Exception($connect->error);
				}
        }
		else{
			throw new Exception($connect->error);
		}
				
		$connect->close();
    }
			
}
catch(Exception $e){
	echo 'servers';
	echo 'Informacja developerska: '.$e;
}
?>