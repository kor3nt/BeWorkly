<?php
session_start();

require_once "connect.php";
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

	$userID = '1';

	if($work == 'inne'){
		$work = $other;
	}

	if ($connect->connect_errno!=0)
	{
		throw new Exception(mysqli_connect_errno());
	}
	else
	{	
	    if ($connect->query("INSERT INTO oferta VALUES (NULL, '$userID', '$work', '$price', '$location', '$lng', '$lat', '$photo', NULL, 0)"))
		{
			echo 'success';
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