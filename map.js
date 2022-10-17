function initMap() {
    // Opcje
    const options =   {
        zoom: 15,
        center: {lat: 50.06150395284862, lng: 19.93267669291806},
        disableDefaultUI: true,
    }

    // Utworzenie mapy
    const map = new google.maps.Map(document.getElementById("map"), {mapId: "8dcbc94f9673a06d", options});

    // Punkty na mapie
    addMarker({coords: {lat: 50.06150395284862, lng: 19.93267669291806},
        // icon: 'https://www.shareicon.net/data/512x512/2015/11/02/665856_flag_512x512.png',
        content: '<h1>ELOO</h1><p>Witamy</p>'
    });
    
    addMarker({coords: {lat: 50.06177344880018, lng: 19.934279599981885},
        // icon: 'https://www.shareicon.net/data/512x512/2015/11/02/665856_flag_512x512.png',
        content: '<h1>ELOO</h1><p>Witamy</p>'
    });
    
    addMarker({coords: {lat: 50.061200069834555, lng: 19.93203316205854},
        // icon: 'https://www.shareicon.net/data/512x512/2015/11/02/665856_flag_512x512.png',
        content: '<h1>ELOO</h1><p>Witamy</p>'
    });

    // Dodawanie punktów na mapie
    function addMarker(props){
        let marker = new google.maps.Marker({
            position: props.coords,
            map: map,
            // icon: props.icon,
        });

        let infoWindow = new google.maps.InfoWindow({
            content: props.content
        });

        marker.addListener('click', function(){
            infoWindow.open(map, marker);
        });
    }


    // Uzupełnianie automatyczne inputa w Module
    const autocompleteInput = document.getElementById('location-modal');
    const autocomplete = new google.maps.places.Autocomplete(autocompleteInput, {
        fields: ["address_components", "geometry", "name"],
        types: ["address"],
    });
    autocomplete.addListener('place_changed', function () {
        const place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert('Nie znaleźliśmy takiego miejsca jak: \'' + place.name + '\'');
            return;
        }
        lat = parseFloat(place.geometry.location.lng());
        lng = parseFloat(place.geometry.location.lat());
    });

}

window.initMap = initMap;