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
  


  var errorWork = validateOption(work)
  var errorPrice = validatePrice(price)
  var errorLocation = validateText(location)


  if(errorWork && errorPrice && errorLocation){
    if(work.value == 'Inne' && validateText(document.getElementById('other')) || work.value != 'Inne'){
      console.log('success')
    }
  }
})


// Walidacja danych - Funkcje
function validatePrice(price){
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

function validateText(element){
  if(!element.value.trim()){
    element.style.border = '2px solid #EF233C';
    return false;
  }

  if(lng == 0 && lat == 0){
    element.style.border = '2px solid #EF233C';
    return false;
  }
  
  element.style.border = '1px solid #818181';
  return true;
}

