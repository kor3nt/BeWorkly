<?php

$email = $_POST["email"];

    session_start();

    require_once "../../../connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try 
    {
        $connect = new mysqli($host, $db_user, $db_password, $db_name);

        if ($connect->connect_errno!=0)
        {
            throw new Exception(mysqli_connect_errno());
        }
        else
        {
            if ($result = @$connect->query(
            sprintf("SELECT * FROM users WHERE email LIKE '%s'",
            mysqli_real_escape_string($connect, $email))))
            {
                    $users = $result->num_rows;
                    if($users > 0){
                        $row = $result->fetch_assoc();
                        
                        if($email==$row['email']){
                            // Mail

                                $token = $row['token'];

                                
                                require_once "sendMail.php";
                                sendMail($email, $token);

                                echo 'success';
                                return false;
                            
                        }
                    }
            }       
            $connect->close();
        }
        echo 'error';
                
    }
    catch(Exception $e)
    {
        echo 'servers';
        // echo 'Informacja developerska: '.$e;
    }
?>
