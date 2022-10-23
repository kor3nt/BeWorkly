<?php
    session_start();

    if ((isset($_SESSION['fname']))){
        header('Location: ../../');
        exit();
    }

    if((isset($_SESSION['email']))){
        header('Location: ../../');
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
                        <p id="slogan">Zmiana hasła!</p>
                        <form>
                            <label for="email">E-mail:</label><br>
                            <input type="email" id="email" name="email" required><br>
                            <div id="btnCenter">
                                <button id="btnSubmit" type="button">Wyślij</button><br>
                            </div>
                            <p id="errorEmail" class="error" style="display: none;">Konto o podanym emailu nie istnieje!</p>    
                        </form>
                    </div>
                    <div id="checkEmail" style="display: none;">
                        <p id="slogan">Wysłaliśmy wiadomość!</p>
                        <p id="text">Sprawdź swoją skrzynkę pocztową, wysłaliśmy na nią link do zmiany hasła.</p>
                    </div>
                </div>
                <div class="column1">
                        <img src="IMG/image_email_confirm.svg" alt="image_email_confirm">
                </div>
            </div>
        </main>
        <footer>
            <p>
                BeWorkly &copy; 2022 Wszelkie prawa zastrzeżone. <br>
                Stworzone przez <a href="#">Duoly</a>
            </p>
        </footer>
        <script src="SCRIPTS/ajax.js"></script>
    </body>
</html>