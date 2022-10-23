<?php 
    session_start();
    // if ((isset($_SESSION['fname']))){
    //     header('Location: ../../../');
    //     exit();
    // }

    // if((isset($_SESSION['email']))){
    //     header('Location: ../../../');
    //     exit();
    // }

    // if(!$_GET['token'] || !$_GET['email']){
    //     header('Location: ../');
    //     exit();
    // }
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Duoly">
        <title>BeWorkly</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </head>
    <body>
        <!-- Ekran ładowania -->
        <div class="loading">
            <div class="lds-ring"><div></div><div></div></div>
        </div>


        <nav>
            <h1>BeWorkly</h1>
        </nav>

        

        <main>
            <div class="row">
                <div class="column">
                    

                    <!-- Ekran powodzenia -->
                    <div id="send">
                        <div class="wrapper">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>
                        </div>

                        <div class="text-success">
                            <h1>Zmieniono!</h1>
                            <p>Twoje hasło zostało zmienione.</p><br>
                            <a class='return-button' href='../../'>Powrót</a>
                        </div>
                    </div>

                    <div id="formright">
                        <p id="slogan">Zmiana hasła!</p>
                        <form>
                            <input type="text" style='display: none' id="token" name="token" value='<?php echo $_GET['token'] ?>' required><br>

                            <input type="email" style='display: none' id="email" name="email" value='<?php echo $_GET['email'] ?>' disabled required><br>

                            <label for="newpass">Wpisz nowe hasło:</label><br>
                            <input type="password" id="newpass" name="newpass" required>
                            <p class='error' id='errors-password'></p>

                            <label for="newpass1">Potwierdź nowe hasło:</label><br>
                            <input type="password" id="newpass1" name="newpass1" required>
                            <p class='error' id='errors-password2'></p>

                            <div id="btnCenter">
                                <button id="btnSubmit" type="button">Zmień</button><br>
                                <p class='error' id='error'></p>
                            </div>
                            
                        </form>
                    </div>
                </div>
                <div class="column1">
                        <img src="IMG/image_change_pass.svg" alt="image_change_pass">
                </div>
            </div>
        </main>
        <footer>
            <p>
                BeWorkly &copy; 2022 Wszelkie prawa zastrzeżone. <br>
                Stworzone przez <a href="#">Duoly</a>
            </p>
        </footer>

        <script src="script.js"></script>
    </body>
</html>