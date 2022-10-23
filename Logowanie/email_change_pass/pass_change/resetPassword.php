<?php
require_once "../../../connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);

try 
{
	$connect = new mysqli($host, $db_user, $db_password, $db_name);
	// Uzyskanie danych z pliku js
	$token = mysqli_real_escape_string($connect, $_POST['token']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	$tokenNew = md5(rand());

	$password = password_hash($password, PASSWORD_DEFAULT);

	if ($connect->connect_errno!=0)
	{
		throw new Exception(mysqli_connect_errno());
	}
	else
	{
		// Sprawdzenie maila i tokenu
		$result = $connect->query("SELECT id FROM users WHERE email='$email' AND token='$token'");		

        if (!$result) throw new Exception($connect->error);
			
		$how_many_results = $result->num_rows;
		if($how_many_results > 0)
		{
            if ($connect->query("UPDATE users SET password='$password', token='$tokenNew' WHERE token LIKE '$token' AND email='$email'"))
            {
                echo 'success';
            }
            else
            {
                throw new Exception($connect->error);
            }
		}
        else{
            echo 'token';
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