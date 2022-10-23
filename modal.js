// Wyświetlanie lub zamykanie Modalu
var modal = document.getElementById("addModal");
var btn = document.getElementById("addBtn");
var span = document.getElementsByClassName("close")[0];

btn.addEventListener("click", ()=> {
    modal.style.display = "block";
})

span.addEventListener("click", ()=> {
  modal.style.display = "none";
})

window.addEventListener("click", (event)=> {
  if (event.target == modal) {
    modal.style.display = "none";
  }
})


// Walidacja danych w Modalu
let lng = 0;
let lat = 0;

var btnAdd = document.getElementById('btnModal');
btnAdd.addEventListener("click", ()=> {

  var work = document.getElementById('work');
  var price = document.getElementById('price');
  var location = document.getElementById('location-modal');
  var photo = choosePhoto(work.value.trim())

  var errorWork = validateOption(work)
  var errorPrice = validatePrice(price)
  var errorLocation = validateLocation(location)


  if(errorWork && errorPrice && errorLocation){
    if(work.value == 'Inne' && validateText(document.getElementById('other')) || work.value != 'Inne'){
      $('.loading').show();
      $.ajax({
        type: "POST",
        url: "addWork.php",
        data: {
          work: work.value.trim(),
          price: parseInt(price.value.trim()),
          location: location.value.trim(),
          other: document.getElementById('other').value.trim(),
          photo: photo,
          lat: lat,
          lng: lng
        },
        cache: false,
        success: function(data) {
          // Zwrócenie poprawnego wyniku
          if(/success/.test(data)){
            $('.loading').hide();
            $('#success-p').html('Utworzyłeś swoje zlecenie.');
            $('#send').show();
            modal.style.display = "none";
          }

          // Serwer wyłączony / awaria
          if(/servers/.test(data)){
            alert('Błąd serwera! Przepraszamy za niedogodności i prosimy o skontaktowanie się z administracją!')
          }
        }
      });
    }
  }
})


// Walidacja danych - Funkcje
function validatePrice(price){
  console.log(parseInt(price.value.trim()))
  if(price.value.trim() < 10){
    price.style.border = '2px solid #EF233C';
    return false;
  }

  price.style.border = '1px solid #818181';
  return true;
}

function validateOption(element){
  
  if(!element.value.trim()){
    element.style.border = '2px solid #EF233C';
    return false;
  }

  if(element.value == 'Inne'){
    $("#other-input").show()
  }
  else{
    $("#other-input").hide()
  }
  
  element.style.border = '1px solid #818181';
  return true;
}

function validateLocation(element){
  if(!element.value.trim()){
    element.style.border = '2px solid #EF233C';
    return false;
  }

  if(lng == 0 && lat == 0){
    element.style.border = '2px solid #EF233C';
    return false;
  }
  
  if(!(/^[a-zA-Z0-9ąćśżźńłóęĄĆŚŻŹŃŁÓĘ., ]+$/.test(element.value.trim()))){ 
    element.style.border = '2px solid #EF233C';
    return false;
  }

  element.style.border = '1px solid #818181';
  return true;
}

function validateText(element){
  if(!element.value.trim()){
    element.style.border = '2px solid #EF233C';
    return false;
  }
  
  if(!(/^[a-zA-ZąćśżźńłóęĄĆŚŻŹŃŁÓĘ., ]+$/.test(element.value.trim()))){ 
    element.style.border = '2px solid #EF233C';
    return false;
  }

  element.style.border = '1px solid #818181';
  return true;
}


// Wybór zdjęcie
function choosePhoto(work){
  let photo;
  switch(work){
    case 'Koszenie trawnika':
      photo = 'kosiarka'
      break;
    case 'Opieka nad zwierzątkiem':
      photo = 'zwierzatko'
      break;
    case 'Sprzątanie':
      photo = 'sprzatanie'
      break;
    case 'Porządki w ogródku':
      photo = 'ogrod'
      break;
    default: 
      photo = 'inne'
  }

  return photo;
}

// Z profilu
function AddWorkProfile(){
  modal.style.display = "block";
}