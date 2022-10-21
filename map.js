function initMap() {
    // Opcje
    const options =   {
        zoom: 15,
        center: {lat: 50.06150395284862, lng: 19.93267669291806},
        disableDefaultUI: true,
    }

    // Utworzenie mapy
    const map = new google.maps.Map(document.getElementById("map"), {mapId: "8dcbc94f9673a06d", options});


    // Dodawanie punktów na mapie
    jQuery(function() {
      var infowindow = new google.maps.InfoWindow({
        content: '',
      });
      
      jQuery.each(tabMarkers, function(i, m) {
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(m.lat, m.lng),
          map: map,
          animation: google.maps.Animation.DROP,
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.close();
          infowindow.setContent(m.content);
          infowindow.open(map, marker);
        });
      });
      
    });



    // Uzupełnianie automatyczne inputa w Module
    const autocompleteInput = document.getElementById('location-modal');
    const autocomplete = new google.maps.places.Autocomplete(autocompleteInput, {
        fields: ["address_components", "geometry", "name"],
        types: ["address"],
        componentRestrictions: { country: "pl" },
    });
    autocomplete.addListener('place_changed', function () {
        const place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert('Nie znaleźliśmy takiego miejsca jak: \'' + place.name + '\'');
            return;
        }

        lng = parseFloat(place.geometry.location.lng());
        lat = parseFloat(place.geometry.location.lat());
    });
}

window.initMap = initMap;