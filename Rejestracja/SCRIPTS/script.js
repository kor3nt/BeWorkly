// Zmienne pomocnicze

var underAge = true;
var id;

// Zmiana kroków rejestracji

function lastStep(){
    $("#step2").hide(200);
    $("#step3").show(200);
    $("#steps").children(".step").eq(1).removeClass("nextStep");
    $("#steps").children(".step").eq(1).addClass("activeStep");
    $("#steps").children(".line").eq(1).addClass("activeLine");
    $("#steps").children(".step").eq(2).addClass("nextStep");
    $(".error").hide();
}

$("#btnStep1").click(() => {
    if($(".error").is(":visible") || $(".empty").is(":visible")) return;
    if(!underAge){
        lastStep();
        $("#step1").hide(200);
        $("#steps").children(".step").first().removeClass("nextStep");
        $("#steps").children(".step").first().addClass("activeStep");
        $("#steps").children(".line").first().addClass("activeLine");
        $("#steps").children(".step").eq(1).addClass("nextStep");
        return;
    }
        $("#step1").hide(200);
        $("#step2").show(200);
        $("#steps").children(".step").first().removeClass("nextStep");
        $("#steps").children(".step").first().addClass("activeStep");
        $("#steps").children(".line").first().addClass("activeLine");
        $("#steps").children(".step").eq(1).addClass("nextStep");
        $(".error").hide();
    
});
$("#btnStep2").click(() => {
    if($(".error").is(":visible") || $(".empty").is(":visible")) return;
    lastStep();
});

$("#btnStep3").click(() => {
    if($("#pass").val()!=$("#pass2").val()){
        $("#errorPassMatch").show();
        return;
    } 
    else{
        $("#errorPassMatch").hide();
    }

    if($(".error").is(":hidden") && $(".empty").is(":hidden")){
        return;
    } 
});

// Walidacja - puste pola
$("input").blur((event) => {
    let id;
    if(event.target.id.search("parent") != -1){
        id = event.target.id.slice(7);
    } 
    else{
        id = event.target.id;
    } 

    if(!$.trim(event.target.value)){
        $("#error"+id).show(); 
        $("#"+event.target.id).addClass("errorInput");
        $("#"+event.target.id).addClass("empty");
    }else{
        $("#error"+id).hide(); 
        $("#"+event.target.id).removeClass("errorInput");
        $("#"+event.target.id).removeClass("empty");
    }
});

// Walidacja - mail
// Blokada cyfr

$('#fname').keypress((event) => { 
    if(!isNaN(event.key)) event.preventDefault();
});
$('#sname').keypress((event) => {
    if(!isNaN(event.key)) event.preventDefault();
});
$('#parent_fname').keypress((event) => {
    if(!isNaN(event.key)) event.preventDefault();
});
$('#parent_sname').keypress((event) => {
    if(!isNaN(event.key)) event.preventDefault();
});

// Walidacja - mail

var mailpattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9._%+-]+.[a-zA-Z0-9._%+-]$/;

// Użytkownik
$("#email").blur(()  => {
    if(!$.trim($("#email").val().match(mailpattern))){
        $("#errorWrongEmail").show();
        $("#email").addClass("errorInput");
    }
    else{
        $("#errorWrongEmail").hide(); 
        $("#email").removeClass("errorInput"); 
    }  
});

//Rodzic
$("#parent_email").blur(()  => {
    if(!$.trim($("#parent_email").val().match(mailpattern))){
        $("#errorWrongEmail").show();
        $("#parent_email").addClass("errorInput");
    }
    else{
        $("#errorWrongEmail").hide(); 
        $("#parent_email").removeClass("errorInput"); 
    }  
});

// Walidacja - nr tel

var telpattern = /^[0-9]{3}-[0-9]{3}-[0-9]{3}$/;

// Użytkownik
$("#tel").blur(()  => {
    if(!$.trim($("#tel").val().match(telpattern))){
        $("#errorTel").show();
        $("#tel").addClass("errorInput");
    }
    else{
        $("#errorTel").hide(); 
        $("#tel").removeClass("errorInput"); 
    }  
});

//Rodzic
$("#parent_tel").blur(()  => {
    if(!$.trim($("#parent_tel").val().match(telpattern))){
        $("#errorTel").show();
        $("#parent_tel").addClass("errorInput");
    }
    else{
        $("#errorTel").hide(); 
        $("#parent_tel").removeClass("errorInput"); 
    }  
});

// Input Pattern - nr telefonu

// Użytkownik
$('#tel').keypress((event) => {
    //Blokada liter
    if(isNaN(event.key)) event.preventDefault();
    //Dodawanie pauz
    if($('#tel').val().length==3) 
            $("#tel").val(() => {
                return $("#tel").val() + '-';
            });
    if($('#tel').val().length==7) 
            $("#tel").val(() => {
                return $("#tel").val() + '-';
    });
});    

//Rodzic
$('#parent_tel').keypress((event) => {
    //Blokada liter
    if(isNaN(event.key)) event.preventDefault();
    //Dodawanie pauz
    if($('#parent_tel').val().length==3) 
            $("#parent_tel").val(() => {
                return $("#parent_tel").val() + '-';
            });
    if($('#parent_tel').val().length==7) 
            $("#parent_tel").val(() => {
                return $("#parent_tel").val() + '-';
    });
});

// Walidacja - wiek

$("#date").blur(() => {
    var toDay = new Date().getTime();
    var UserDate = new Date($("#date").val());
    var Age = Math.floor((toDay-UserDate)/(1000*60*60*24*365));
    

    if(Age>=18) underAge=false;
    if(Age<13){
        $("#errorage").show();
        $("#date").addClass("errorInput");
    }else{
        $("#errorage").hide();
        $("#date").removeClass("errorInput");
    }
});

// Walidacja - hasło 

$("#pass").blur(() => { 
    if ($("#pass").val().trim().search(/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$/) < 0) {
        $("#errorPassPattern").show();
    }
    else{
        $("#errorPassPattern").hide();
    }
});

// Walidacja - zajęty email

// Przesyłanie danych z js do php
$("#email").blur(() => {
    $.ajax({
        type: "POST",
        url: "PHP/EmailOccupied.php",
        data: {
            email: $("#email").val(),
    },
    cache: false,
    success: function(data) {
        const returnEmail = /emails/;
        if(returnEmail.test(data)) $("#errorOccEmail").show();
        else $("#errorOccEmail").hide();
    }
    });
});
