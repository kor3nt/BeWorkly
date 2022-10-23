$(document).ready(function() {
    $("#btnSubmit").click(function( event ){
        // Pozyskanie danych z inputów
        const token = $("#token").val();
        const email = $("#email").val();
        const password = $("#newpass").val(); 
        const password2 = $("#newpass1").val();
        
        // Przesłanie danych do pliku php
        if(checkPassword(password) && CheckConfirmPassowrd(password2, password)){
            $('.loading').show();
            $.ajax({
                type: "POST",
                url: "resetPassword.php",
                data: {
                    token: token.trim(),
                    email: email.trim(),
                    password: password.trim()
            },
            cache: false,
            success: function(data) {
                // Email lub Token niepoprawny
                if(/token/.test(data)){
                    document.getElementById('error').innerHTML = "Nie poprawne dane!";
                    $('.loading').hide();
                }

                // Zwrócenie poprawnego wyniku
                if(/success/.test(data)){
                    $('.loading').hide();
                    $('#send').show();
                    $('#formright').hide();
                }

                // Serwer wyłączony / awaria
                if(/servers/.test(data)){
                    alert('Błąd serwera! Przepraszamy za niedogodności i prosimy o skontaktowanie się z administracją!')
                }
            }
            });
        }
        event.preventDefault();
    });
    
});


// Walidacjia Hasła
function checkPassword(password){
    if(!password.trim()){
        document.getElementById('errors-password').innerHTML = 'Podaj hasło!';
        return false;
    }   
    else if(password.trim().length < 8){
        document.getElementById('errors-password').innerHTML = 'Hasło musi być dłuższe niż 8 znaków!';
        return false;
    }
    else if (password.trim().search(/[a-z]/i) < 0) {
        document.getElementById('errors-password').innerHTML = "Hasło musi zawierać literę!";
        return false;
    }
    else if (password.trim().search(/[A-Z]/i) < 0) {
        document.getElementById('errors-password').innerHTML = "Hasło musi zawierać duża literę!";
        return false;
    }
    else if (password.trim().search(/[0-9]/) < 0) {
        document.getElementById('errors-password').innerHTML = "Hasło musi zawierać liczbę!";
        return false;
    }
    else if(password.trim().search(/\W|_/g) < 0){
        document.getElementById('errors-password').innerHTML = "Hasło musi zawierać znak specjalny!";
        return false;
    }
    else{
        document.getElementById('errors-password').innerHTML = "";
        return true;
    }
}

// Walidacja potwierdzającego hasła
function CheckConfirmPassowrd(password2, password){
    if(!password2.trim()){
        document.getElementById('errors-password2').innerHTML = 'Musisz potwierdzić hasło!';
        return false;

    } 
    else if(password2.trim() !== password.trim()){
        document.getElementById('errors-password2').innerHTML =  'Hasła nie są podobne!';
        return false;
    }
    else{
        document.getElementById('errors-password2').innerHTML = "";
        return true;
    }
}