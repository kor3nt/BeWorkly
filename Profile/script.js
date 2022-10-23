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
    var x = document.getElementById("about_me").value;
    document.getElementById("o_mnie").innerHTML = x;            
    about.style.display = "none";
}



//Generator - umowa

