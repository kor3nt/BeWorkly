<?php
    session_start();

    if (!(isset($_SESSION['fname']))){
        header('Location: Logowanie');
        exit();
    }

    if(!(isset($_SESSION['email']))){
        header('Location: Logowanie');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeWorkly</title>

    <link rel='stylesheet' href='style.css'>

    <!-- Ikony -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <!-- Ekran ładowania -->
    <div class="loading">
        <div class="lds-ring"><div></div><div></div></div>
    </div>

    <!-- Ekran powodzenia -->
    <div id="send">
        <div class="wrapper">
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>
        </div>

        <div class="text-success">
            <h1>Powodzenie!</h1>
            <p id='success-p'></p><br>
            <a class='return-button' onclick='location.reload()'>OK</a>
        </div>
    </div>

    <nav>
        <div class="nav-content">
            <h1 class='logo'>BeWorkly</h1>

            <a href='logout.php' class='profil'><span class='profile-icon'><i class="fa fa-user-o" aria-hidden="true"></i></span> <?php echo $_SESSION['fname']; ?></a>
        </div>
    </nav>

    <!-- Modal Dodaj -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            
            <h2>Dodaj Prace</h2>
            
            <form>
                <div class="input">
                    <label for='work'>Nazwa zadania:</label><br>
                    <select id='work' onchange='validateOption(this)'>
                        <option value="" selected disabled hidden>Wybierz nazwę zadania</option>
                        <option value="Koszenie trawnika">Koszenie trawnika</option>
                        <option value="Opieka nad zwierzątkiem">Opieka nad zwierzątkiem</option>
                        <option value="Sprzątanie">Sprzątanie</option>
                        <option value="Porządki w ogródku">Porządki w ogródku</option>
                        <option value="Inne">Inne</option>
                    </select>
                </div>

                <div class="input" id='other-input'>
                    <label for='other'>Wprowadź nazwę zadanie:</label><br>
                    <input type='text' id='other' placeholder='Wprowadź zadanie'>
                </div>

                <div class="input">
                    <label for='price'>Cena:</label><br>
                    <input type='number' id='price' min='10' placeholder='Wprowadź kwotę'>
                    <small>Minimalna kwota to 10 zł</small>
                </div>

                <div class="input">
                        <label for='location-modal'>Lokalizacja:</label><br>
                        <input type='text' id='location-modal'>
                </div>

                <div class="input-btn">
                    <button type='button' id='btnModal'>Dodaj</button>
                </div>
            </form>
        </div>
    </div>

    <div class="main">
        <div class="row">
            <div class="left">
                
                <div class="row">
                    <button type='button' id='addBtn'>Dodaj</button>
                    <div class="filter">
                        <div class="input-filter" id='div_search'>
                            <input type='text' id='search' placeholder='Wyszukaj'>
                        </div>

                        <div class="input-filter" id='div_location'>
                            <input type='text' id='location' placeholder='Lokalizacja'>
                        </div>
                    </div>
                </div>

                <div class="oferts">
                    <div class="scrollElement">
                        <div class="none">
                            <div class="none">
                                <h1><i class="fa fa-exclamation-circle" aria-hidden="true"></i></h1>
                                <p>Brak ofert na ten moment!</p>
                            </div>
                        </div>


                    </div>
                    
                </div>
            </div>
            <div class="right">
                <div class="right-element">
                    <div id="map"></div>
                </div>
            </div>


            
        </div>
    </div>


    <div id="ModalOffer" class="modalOffer" style='display:none'>
        <div class="modal-content">
            <span id="closeModal">&times;</span>
            <div class="main-modal">
                <div class="title-modal">
                    <h1 id='title-offer'></h1>
                </div>
                <div class="info-modal">
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> <span id="location-offer-modal"></span></p>
                    <p><i class="fa fa-user" aria-hidden="true"></i> <span id="user-offer-modal"></span></p><br>
                    <p id='idOffer' style='display:none'></p>
                    
                    <p>Zarobek: <span id="cost-offer-modal"><span id='amount-modal'></span> zł</span></p><br>

                    <small>1. W celu skontakowania się z zleceniodawcą odbierz zlecenie.</small><br>
                    <small>2. Uzgodnij z zleceniodawcą szczegóły.</small><br>
                    <small>3. Następnie wygeneruje się umowa, którą należy uzupełnić.</small><br>
                    <small>4. Gdy już wszystko uzgodnione udaj się na miejsce, aby wykonać zlecenie.</small>
                </div>

                <div class="button-content">
                    <button class='btnModalOffer' type='button' onclick="getOffer()">Odbierz</button>
                </div>
            </div>
            
        </div>
    </div>

    <script src='map.js'></script>
    <script src='modal.js'></script>
    <script src='write.js'></script>
    <script src='modalOffer.js'></script>
    
    <script>
        function getOffer(){
            $('.loading').show();
            let idOffer = $('#idOffer').text();
            console.log(idOffer);

            $.ajax({
                type: "POST",
                url: "setOffer.php",
                data: {
                    idOffer: idOffer
                },
                cache: false,
                success: function(data) {
                    console.log(data);

                    // Zwrócenie poprawnego wyniku
                    if(/success/.test(data)){
                        $('.loading').hide();
                        $('#success-p').html('Odebrałeś zlecenie. Wykonaj wszystko według instrukcji.');
                        $('#send').show();
                        window.location = 'umowa.docx';
                        
                    }

                    // Serwer wyłączony / awaria
                    if(/servers/.test(data)){
                        alert('Błąd serwera! Przepraszamy za niedogodności i prosimy o skontaktowanie się z administracją!')
                    }
                }
            });

            
        }
    </script>

    <?php
    if(isset($_SESSION['fun'])){
        echo "<script>".$_SESSION["fun"].";</script>";
        unset($_SESSION['fun']);
    }
    ?>

    <!-- google -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqQcsuIdAemTykF1UZ0AN_1yifNyj1IDU&callback=initMap&v=weekly&libraries=places&solution_channel=GMP_QB_addressselection_v1_cAC" defer></script>
</body>
</html>