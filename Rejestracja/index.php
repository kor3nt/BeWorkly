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
        <link rel="stylesheet" href="CSS/done.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <nav>
            <h1>BeWorkly</h1>
        </nav>
        <main>
            <div class="row">
                <div class="column">
                    <div class="done" style="display:none"> 
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> 
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> 
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                    </div>
                    <div id="formright">
                        <div id="steps">
                            <div class="step nextStep">1</div>
                            <div class="line"></div>
                            <div class="step ">2</div>
                            <div class="line"></div>
                            <div class="step">3</div>
                        </div>
                        <p id="slogan">Utwórz konto</p>
                        <form>
                            <div id="step1">
                                <label for="fname">Imie:</label><br>
                                <input type="text" id="fname" name="fname" class="empty" required><br>
                                <label for="sname">Nazwisko:</label><br>
                                <input type="text" id="sname" name="sname" class="empty" required><br>
                                <label for="email">E-mail:</label><br>
                                <input type="email" id="email" name="email" class="empty" required><br>
                                <label for="tel">Telefon:</label><br>
                                <input type="tel" id="tel" name="tel" maxlength="11" class="empty" required><br>
                                <label for="date">Data urodzenia:</label><br>
                                <input type="date" id="date" name="date" class="empty" required><br><br>
                                <div class="btnCenter">
                                    <button id="btnStep1" class="btnSubmit" type="button">Dalej</button><br>
                                </div>
                            </div>
                            <div id="step2" style="display:none">
                                <label for="parent_fname">Imie rodzica/opiekuna:</label><br>
                                <input type="text" id="parent_fname" name="parent_fname" class="empty" required><br>
                                <label for="parent_sname">Nazwisko rodzica/opiekuna:</label><br>
                                <input type="text" id="parent_sname" name="parent_sname" class="empty" required><br>
                                <label for="parent_email">E-mail rodzica/opiekuna:</label><br>
                                <input type="email" id="parent_email" name="parent_email" class="empty" required><br>
                                <label for="parent_tel">Telefon rodzica/opiekuna::</label><br>
                                <input type="tel" id="parent_tel" name="parent_tel" maxlength="11" class="empty" required><br>
                                <div class="btnCenter">
                                    <button id="btnStep2" class="btnSubmit" type="button">Dalej</button><br>
                                </div>
                            </div>
                            <div id="step3" style="display:none">
                                <label for="pass">Hasło:</label><br>
                                <input type="password" id="pass" name="pass" class="empty" required><br>
                                <label for="pass2">Potwierdź hasło:</label><br>
                                <input type="password" id="pass2" name="pass2" class="empty" required><br>
                                <div class="btnCenter">
                                    <button id="btnStep3" class="btnSubmit" type="button">Zarajestruj</button><br>
                                </div>
                            </div>
                            <p id="errorfname" class="error" style="display: none;">Podaj imię!</p>
                            <p id="errorsname" class="error" style="display: none;">Podaj nazwisko!</p>
                            <p id="erroremail" class="error" style="display: none;">Podaj email!</p>
                            <p id="errorWrongEmail" class="error" style="display: none;">Podaj poprawny email!</p>
                            <p id="errorTel" class="error" style="display: none;">Podaj numer telefonu!</p>
                            <p id="errordate" class="error" style="display: none;">Podaj date urodzenia!</p>
                            <p id="errorpass" class="error" style="display: none;">Podaj hasło!</p>
                            <p id="errorpass2" class="error" style="display: none;">Potwierdź hasło!</p>
                            <p id="errorage" class="error" style="display: none;">Jesteś za młody, aby założyć konto!</p>
                            <p id="errorPassMatch" class="error" style="display: none;">Hasła nie są takie same</p>
                            <p id="errorPassPattern" class="error" style="display: none;">Hasło musi składać się z minimum 8 znaków <br>oraz zawierać wielką literę, przynajmniej jedną<br> cyfre oraz znak specjalny!</p>
                            <p id="errorOccEmail" class="error" style="display: none;">Konto o podanym emailu już istnieje!</p>    
                        </form>
                        <div class="btnCenter">
                            <div id="helpAndCreate">
                                <p><span>LUB</span></p>
                            </div>
                            <a id="btnLogin" href="../Logowanie">Masz już konto? Zaloguj się</a><br>
                        </div>
                    </div>
                </div>
                <div class="column1">
                        <img src="IMG/grafika_panel_logowanie.svg" alt="grafika_panel_logowanie">
                </div>
            </div>
        </main>
        <script src="SCRIPTS/script.js"></script>
        <script src="SCRIPTS/ajax.js"></script>
        
    </body>
</html>