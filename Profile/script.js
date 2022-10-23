//Modal - edytuj profil
var about = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var Addbtn = document.getElementById("AddWork");
var span = document.getElementsByClassName("close")[0];




btn.onclick = function(){
    about.style.display = "block";
    }

span.onclick = function() {
    about.style.display = "none";
    }

window.onclick = function(event){
if (event.target == about) {
    about.style.display = "none";
    }
}

Addbtn.onclick = function(){
    window.location.href = "forwarding.php";
}

function send_about(){
    var aboutText = document.getElementById("about_me").value;
    
    if(checkText(aboutText)){
        $.ajax({
            type: "POST",
            url: "setAbout.php",
            data: {
                about: aboutText.trim(),
            },
            cache: false,
            success: function(data) {
            // Zwrócenie poprawnego wyniku
            if(/success/.test(data)){
                about.style.display = "none";
                $('#o_mnie').html(aboutText);
            }
    
            // Serwer wyłączony / awaria
            if(/servers/.test(data)){
                alert('Błąd serwera! Przepraszamy za niedogodności i prosimy o skontaktowanie się z administracją!')
            }
            }
        });
        
    }
}



//Walidacja tekstu 
function checkText(aboutText){
    if(!aboutText.trim()){
        document.getElementById('errors').innerHTML = 'Uzupełnij pole!';
        return false;
    }   
    else if(aboutText.trim().search(/\W|_/g) != -1){
        document.getElementById('errors').innerHTML = 'Uzupełnij pole!';
        return false;
    }
    else{
        document.getElementById('errors').innerHTML = "";
        return true;
    }
}

