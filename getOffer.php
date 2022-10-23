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

            if ($result = @$connect->query("SELECT oferta.id, zleceniodawca_id, nazwa_pracy, kwota, adres, lng, lat, nazwa, odbiorca, odebrana, fname FROM oferta INNER JOIN users_data ON oferta.zleceniodawca_id = users_data.id WHERE zleceniodawca_id != $userID AND odebrana != 1"))
            {
                $numberOffer = $result->num_rows;
                if($numberOffer > 0){
                    while($row = $result->fetch_assoc()){
                        $table[] = $row;
                    }
                    echo json_encode($table);
                }
                else{
                    echo 'none';
                }
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