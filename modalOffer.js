// Wyświetlanie lub zamykanie Modalu
var modalOffer = document.getElementById("ModalOffer");
var spanOffer = document.getElementById("closeModal");

spanOffer.addEventListener("click", ()=> {
    modalOffer.style.display = "none";
})

window.addEventListener("click", (event)=> {
    if (event.target == modalOffer) {
        modalOffer.style.display = "none";
    }
})

function openModal(offer){
    modalOffer.style.display = "block";

    for(var i = 0; i<tabMarkers.length; i++){
        if(tabMarkers[i]['id'] == offer){
            $('#title-offer').html(tabMarkers[i]['work']);
            $('#location-offer-modal').html(tabMarkers[i]['location']);
            $('#user-offer-modal').html(tabMarkers[i]['person']);
            $('#amount-modal').html(tabMarkers[i]['cost']);
            break;
        }
    }
}