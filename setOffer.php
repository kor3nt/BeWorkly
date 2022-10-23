<?php 
    // Pobieranie ofert
    session_start();
    require_once "connect.php";
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

            $idOffer = $_POST['idOffer'];

            if ($connect->query("UPDATE oferta SET odbiorca='$userID', odebrana=1 WHERE id='$idOffer'"))
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