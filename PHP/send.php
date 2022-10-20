<?php
session_start();
// Zmienne odebrane z js
$fname=$_POST['firstname'];
$sname=$_POST['surname'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$date=$_POST['date'];
$parent_fname=$_POST['parent_firstname'];
$parent_sname=$_POST['parent_surname'];
$parent_email=$_POST['parent_email'];
$parent_tel=$_POST['parent_tel'];
$password=$_POST['password'];

require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);

try 
{
	$connect = new mysqli($host, $db_user, $db_password, $db_name);
	$its_ok = true;
	$password = password_hash($password, PASSWORD_DEFAULT);
    $token = md5(rand());

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
            if($parent_fname!="-"){
                if ($connect->query("INSERT INTO parents VALUES (NULL, '$parent_fname', '$parent_sname', '$parent_tel', '$parent_email')")) {
                    $result = $connect->query("SELECT id FROM parents WHERE email='$parent_email'");
                    $row = $result->fetch_assoc();
                    $parent_id = $row['id'];
                }
                else throw new Exception($connect->error);
            }
			if ($connect->query("INSERT INTO users_data VALUES (NULL, '$fname', '$sname', '$tel', '$date', '$parent_id', '$token')"))
			{

				if ($connect->query("INSERT INTO users VALUES (NULL, '$email', '$password')"))
				{
					$_SESSION['email'] = $email;
					echo 'success';

					// require_once "sendMail.php";
					// sendMail($email);
                    // sendMail($parent_email);

				}
				else
				{
					throw new Exception($connect->error);
				}
			}
			else
			{
				throw new Exception($connect->error);
			}
					
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




