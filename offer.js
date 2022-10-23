function getOffer(){
    $('.loading').show();
    let idOffer = $('#idOffer').text();
    console.log(idOffer);

    $.ajax({
        type: "POST",
        url: "setOffer.php",
        data: {
            idOffer: idOffer
        },
        cache: false,
        success: function(data) {
            console.log(data);

            // Zwrócenie poprawnego wyniku
            if(/success/.test(data)){
                $('.loading').hide();
                $('#success-p').html('Odebrałeś zlecenie. Wykonaj wszystko według instrukcji.');
                $('#send').show();
                window.location = 'umowa.docx';
                
            }

            // Serwer wyłączony / awaria
            if(/servers/.test(data)){
                alert('Błąd serwera! Przepraszamy za niedogodności i prosimy o skontaktowanie się z administracją!')
            }
        }
    });

    
}