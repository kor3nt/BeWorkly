
$("#btnSubmit").click(() => {
    var email = $("#email").val();

    $.ajax({
        type: "POST",
        url: "PHP/send.php",
        data: {
            email: email,
    },
    cache: false,
    success: function(data) {
        const returnEmail = /error/;
        if(returnEmail.test(data)) $("#errorEmail").show();
        else $("#errorEmail").hide();

        if(/success/.test(data)){
            $("#formright").hide();
            $("#checkEmail").show();
        }

        if(/servers/.test(data)){
            alert('Błąd serwera! Przepraszamy za niedogodności i prosimy o skontaktowanie się z administracją!')
        }
    }
    });
});










