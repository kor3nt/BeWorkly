<?php 
    session_start();
    require_once "../connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $connect = new mysqli($host, $db_user, $db_password, $db_name);

        if ($connect->connect_errno!=0)
        {
            throw new Exception(mysqli_connect_errno());
        }
        else{

            $email = $_SESSION['email'];
            $user = @$connect->query("SELECT * FROM users WHERE email LIKE '$email'");
            $user = $user->fetch_assoc();
            $userID = $user['id'];

            $about = $_POST['about'];

            if ($connect->query("UPDATE users_data SET about='$about' WHERE id='$userID'"))
            {
                echo 'success';
            }
            else{
                throw new Exception($connect->error);
            }
        }
    }
    catch(Exception $e)
    {
        echo 'servers';
        // echo 'Informacja developerska: '.$e;
    }
?>