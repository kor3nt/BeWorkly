// Tablica na dane

let tab=[];

// Przesłanie danych z pól do js

$("#btnStep1").click(() => {
    tab.push($("#fname").val());
    tab.push($("#sname").val());
    tab.push($("#email").val());
    tab.push($("#tel").val());
    tab.push($("#date").val());
});
$("#btnStep2").click(() => {
    if($("#parent_fname").val()=="")tab.push("-");
    else tab.push($("#parent_fname").val());
    if($("#parent_sname").val()=="")tab.push("-");
    else tab.push($("#parent_sname").val());
    if($("#parent_email").val()=="")tab.push("-");
    else tab.push($("#parent_email").val());
    if($("#parent_tel").val()=="")tab.push("-");
    else tab.push($("#parent_tel").val());
});

// Przesyłanie danych z js do php
$("#btnStep3").click(() => {
    if($("#pass").val()!=$("#pass2").val()){
        $("#errorPassMatch").show();
        return;
    } 
    else{
        $("#errorPassMatch").hide();
    }

    if($(".error").is(":visible") || $(".empty").is(":visible")){
        return;
    }

    if(!underAge){
        tab.push("-");
        tab.push("-");
        tab.push("-");
        tab.push("-");
    }
    tab.push($("#pass").val());

    $.ajax({
        type: "POST",
        url: "PHP/send.php",
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
        const returnEmail = /emails/;
        if(returnEmail.test(data)){
            document.getElementById('errors-email').innerHTML = "Istnieje już konto przypisane do tego adresu e-mail!";
        }


        if(/success/.test(data)){
            window.location.href = "../";
        }

        if(/servers/.test(data)){
            alert('Błąd serwera! Przepraszamy za niedogodności i prosimy o skontaktowanie się z administracją!')
        }
    }
    });
});