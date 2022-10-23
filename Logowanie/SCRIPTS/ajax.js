
$("#btnSubmit").click(() => {
    var email = $("#email").val();
    var pass = $("#pass").val();

    $.ajax({
        type: "POST",
        url: "PHP/send.php",
        data: {
            email: email,
            password: pass,
    },
    cache: false,
    success: function(data) {
        const returnEmail = /error/;
        if(returnEmail.test(data)) $("#errorEmailPass").show();
        else $("#errorEmailPass").hide();

        if(/success/.test(data)){
            window.location.href = "../";
        }

        if(/servers/.test(data)){
            alert('Błąd serwera! Przepraszamy za niedogodności i prosimy o skontaktowanie się z administracją!')
        }
    }
    });
});










