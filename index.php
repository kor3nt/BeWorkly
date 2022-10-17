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
    
    <nav>
        <div class="nav-content">
            <h1 class='logo'>BeWorkly</h1>

            <p class='profil'><span class='profile-icon'><i class="fa fa-user-o" aria-hidden="true"></i></span> Klaudiusz</p>
        </div>
    </nav>

    <div id="addModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            
            <h2>Dodaj Prace</h2>
            
            <form>
                <div class="input">
                    <label for='work'>Typ zadania:</label><br>
                    <input type='text' id='work'>
                </div>

                <div class="input">
                    <label for='price'>Cena:</label><br>
                    <input type='number' id='price' min='10'>
                </div>

                <div class="input">
                        <label for='street'>Ulica:</label><br>
                        <input type='text' id='street'>
                </div>

                <div class="input">
                    <label for='city'>Miasto:</label><br>
                    <input type='text' id='city'><br><br>
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

                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span id='location-offer'><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span id='user-offert'><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>


                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>20 zł</h1>
                                </div>
                            </div>
                        </div>

                        <div class="offert">
                            <div class="row">
                                <div class="left-offert">
                                    <img src='img/kosiarka.png' alt='kosiarka'>
                                </div>
                                <div class="center-offert">
                                    <h1>Koszenie trawnika</h1>
                                    <small class='info'>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Kraków ul. Loretańska 16</span>
                                        &nbsp; &nbsp; &nbsp;
                                        <span><i class="fa fa-user" aria-hidden="true"></i> Patryk</span>
                                    </small>
                                </div>
                                <div class="right-offert">
                                    <h1 class='price'>1000 zł</h1>
                                </div>
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

    <script src='map.js'></script>
    <script src='modal.js'></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqQcsuIdAemTykF1UZ0AN_1yifNyj1IDU&callback=initMap&v=weekly" defer></script>
</body>
</html>