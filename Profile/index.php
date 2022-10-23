
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php
    session_start();
    $fname = $_SESSION['fname'];
    $email = $_SESSION['email'];
    require_once "../connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $connect = new mysqli($host, $db_user, $db_password, $db_name);

        if ($connect->connect_errno!=0)
        {
            throw new Exception(mysqli_connect_errno());
        }
        else{
            if ($result = @$connect->query(
                sprintf("SELECT * FROM users WHERE email LIKE '%s'",
                mysqli_real_escape_string($connect, $email))))
                {
                        $users = $result->num_rows;
                        if($users > 0){
                            $row = $result->fetch_assoc();
                            $id = $row['id'];
                            if ($result1 = @$connect->query("SELECT * FROM users_data WHERE id LIKE $id"))
                            {
                                $numberOffer = $result1->num_rows;
                                if($numberOffer > 0){
                                    $row1 = $result1->fetch_assoc();                     
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
                }
            
        }
    
    catch(Exception $e)
    {
        echo 'servers';
        echo 'Informacja developerska: '.$e;
    }
    ?>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Profil | <?php
        echo $_SESSION['fname'];
    ?></title>
</head>
<body>
    <nav>
        <h1 onclick='location.href="../"'>BeWorkly</h1><br id="resp-nav">
        <div id="profilName">
            <a href="#"><span class='profile-icon'><i class="fa fa-user-o" aria-hidden="true"></i></span><?php echo $_SESSION['fname']; ?></a>
        </div>
    </nav>
    <main>
        <div id="prof">
            <img src="img/avatar.svg" alt="prof-picture" id="avatar">
            <?php
                echo "<h3>Cześć, ".$_SESSION['fname']."!</h3>";
            ?>
            <div id="left">
                <ul>
                    <li><a href="#" class="lnk-prof" id="AddWork">Dodaj pracę</a></li>
                    <li><a href="../" class="lnk-prof">Szukaj zlecenia</a></li>
                    <li><a href="#" class="lnk-prof" id="myBtn" onclick="edit()">Edytuj profil</a></li>
                    <li><a href="#" class="lnk-prof">Zgłoś problem</a></li>
                    <li><a href="logout.php" class="lnk-prof">Wyloguj</a></li>
                </ul>
            </div>
            
            <div id="abou_me">                
                <h4>O mnie</h4>
                <p id="o_mnie"><?php echo $row1['about'];?></p>
            </div>
        </div>

        <div id="myModal" class="modal">  
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>O mnie</h2>
                <form>
                    <textarea maxlength="300" placeholder="Napisz coś o sobie..." id="about_me"></textarea><br>
                    <p id='errors'></p>
                    <button type="button" class="mod-btn" onclick="send_about()">Wyślij</button>
                    <button type="reset" class="mod-btn">Anuluj</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <p>BeWorkly &copy; 2022 Wszelkie prawa zastrzeżone. <br>
        Stworzone przez <a href="https://www.facebook.com/DuolyStudio" target="_blank">Duoly</a></p>        
    </footer>
    <script src="script.js"></script>
</body>
</html>