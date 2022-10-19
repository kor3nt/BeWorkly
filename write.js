// Wypisanie danych z bazy danych
var tabMarkers = [];
$.ajax({
    type: "GET",
    url: "getOfferts.php",
}).done(function(data){
    if(/none/.test(data)){
        $('.none').show();
    }
    else{

        var offerts = $.parseJSON(data);
        for(var i = 0; i<offerts.length; i++){
            tabMarkers[i] = {
                "lat": offerts[i]['lat'], 
                "lng": offerts[i]['lng'],
                "content": '<h1>' + offerts[i]['nazwa_pracy'] + '</h1>'
                +' <p class="map-location"><i class="fa fa-map-marker" aria-hidden="true"></i> ' + offerts[i]['adres'] + '</p>' 
                + '<p class="map-user"><i class="fa fa-user" aria-hidden="true"></i> ' + offerts[i]['zleceniodawca_id'] + '</p>' 
                + '<br>' + '<a class="map-btn" href="#">Przejdź do ogłoszenia</a>'
            }

            $('.scrollElement').append(
                '<div class="offert">'
                    + '<div class="row">'
                        + '<div class="left-offert">'
                            + '<img src="img/' + offerts[i]['nazwa'] + '.png" alt="' + offerts[i]['nazwa'] + '">'
                        + '</div>'
                        + '<div class="center-offert">'
                                + '<h2>'+ offerts[i]['nazwa_pracy'] +'</h2>'
                                + '<small class="info">'
                                + '<span id="location-offer"><i class="fa fa-map-marker" aria-hidden="true"></i> ' + offerts[i]['adres'] + '</span>'
                                + '&nbsp; &nbsp; &nbsp;'
                                + '<span id="user-offert"><i class="fa fa-user" aria-hidden="true"></i> '+ offerts[i]['zleceniodawca_id'] +'</span>'
                            + '</small>'
                        + '</div>'
                        + '<div class="right-offert">'
                            + '<h1 class="price">'+ offerts[i]['kwota'] +' zł </h1>'
                        + '</div>'
                    + '</div>'
                + '</div>'
            );
        }
    }
});