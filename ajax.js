// Tablica na dane

let tab;

// Przesłanie danych z pól do js

$("#btnStep1").click(() => {
    tab.push($("$fname").val());
    tab.push($("$sname").val());
    tab.push($("$email").val());
    tab.push($("$tel").val());
    tab.push($("$date").val());
});
$("#btnStep2").click(() => {
    if($("$parent_fname").val()=="")tab.push("");
    else tab.push($("$parent_fname").val());
    if($("$parent_sname").val()=="")tab.push("");
    else tab.push($("$parent_fname").val());
    if($("$parent_email").val()=="")tab.push("");
    else tab.push($("$parent_fname").val());
    if($("$parent_tel").val()=="")tab.push("");
    else tab.push($("$parent_fname").val());
});
$("#btnStep3").click(() => {
    tab.push($("$pass").val());
    console.log(tab);
});



// Przesyłanie danych z js do php

$.ajax({
    type: "POST",
    url: "send.php",
    data: {
        firstname: tab[0].trim(),
        surname: tab[1].trim(),
        email: tab[2].trim(),
        tel: tab[3].trim(),
        date: tab[4].trim(),
        parent_firstname: tab[5].trim(),
        parent_surname: tab[6].trim(),
        parent_email: tab[7].trim(),
        parent_tel: tab[8].trim(),
        password: tab[9].trim(),
},
cache: false,
success: function(data) {
    
    // Email already used
    const returnEmail = /emails/;
    if(returnEmail.test(data)){
        document.getElementById('errors-email').innerHTML = "Istnieje już konto przypisane do tego adresu e-mail!";
        $('.loading').hide();
    }

    // Successfully returned
    if(/success/.test(data)){
        $("#formright").hide();
        $(".done").show();
    }

    // The server is down
    if(/servers/.test(data)){
        alert('Błąd serwera! Przepraszamy za niedogodności i prosimy o skontaktowanie się z administracją!')
    }
}
});