<?php
session_start();
// Zmienne odebrane z js
$email=$_POST['email'];

require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);

try 
{
	$connect = new mysqli($host, $db_user, $db_password, $db_name);
	$its_ok = true;


	if ($connect->connect_errno!=0)
	{
		throw new Exception(mysqli_connect_errno());
	}
	else
	{
		// Whether the email is in the database
		$result = $connect->query("SELECT id FROM users WHERE email='$email'");		

        if (!$result) throw new Exception($connect->error);
			
		$how_many_emails = $result->num_rows;
		if($how_many_emails>0)
		{
			$its_ok = false;
			echo 'emails';
		}		
				
		if ($its_ok == true)
		{
			echo 'success';		
		}
				
		$connect->close();
    }
			
    }
    catch(Exception $e)
    {
        echo 'servers';
        echo 'Informacja developerska: '.$e;
    }
?>




