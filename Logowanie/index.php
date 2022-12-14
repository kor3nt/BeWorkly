<?php
    session_start();

    if ((isset($_SESSION['fname']))){
        header('Location: ../');
        exit();
    }

    if((isset($_SESSION['email']))){
        header('Location: ../');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Duoly">
        <link rel="icon" href="img/favicon.png">
        <title>BeWorkly</title>
        <link rel="stylesheet" href="CSS/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <nav>
            <h1>BeWorkly</h1>
        </nav>
        <main>
            <div class="row">
                <div class="column">
                    <div id="formright">
                        <p id="slogan">Zacznij już teraz!</p>
                        <form>
                            <label for="email">E-mail:</label><br>
                            <input type="email" id="email" name="email" required><br>
                            <label for="pass">Hasło:</label><br>
                            <input type="password" id="pass" name="pass" required><br><br>
                            <div id="btnCenter">
                                <button id="btnSubmit" type="button">Zaloguj się</button><br>
                            </div>
                            <p id="errorEmailPass" class="error" style="display: none;">Niepoprawyn email lub hasło!</p>    
                        </form>
                        <div id="helpAndCreate">
                            <a id="passSize" href="email_change_pass/">Nie pamiętasz hasła?</a><br>
                            <div id="widthOr">
                                <p><span>LUB</span></p>
                            </div>
                            <a id="btnCreate" href="../Rejestracja">Stwórz konto</a>
                        </div>
                    </div>
                </div>
                <div class="column1">
                        <img src="IMG/grafika_panel_logowanie.svg" alt="grafika_panel_logowanie">
                </div>
            </div>
        </main>
        <footer>
            <p>
                BeWorkly &copy; 2022 Wszelkie prawa zastrzeżone. <br>
                Stworzone przez <a target="_blank" href="https://www.facebook.com/DuolyStudio">Duoly</a>
            </p>
        </footer>
        <script src="SCRIPTS/ajax.js"></script>
    </body>
</html>