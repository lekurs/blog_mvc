//javascript

jQuery(document).ready(function ($) {
    $('.regex-mail').hide();
    $('.regex-mail-valide').hide();
    $('input#email_suscribe').on('focus', function (event) {
        var email = event.target.value;
        var regexEmail = /.+@.+\..+/;
        if(!regexEmail.test(email))
        {
            var mailInvalide = "Mail invalide";

            $('.regex-mail').show();
            $('.regex-mail').append(mailInvalide);
        }
        if(regexEmail.test(email))
        {
            var mailValide = "Mail valide";
            $('.regex-mail').hide();
            $('.regex-mail-valide').show();
            if($('.regex-mail-valide').text() == mailValide)
            {
                $('.regex-mail-valide').text(mailValide);
            }
            else
            {
                $('.regex-mail-valide').append(mailValide);
            }
        }
    });

    $('input#email_suscribe').on('focusout', function () {
        $('.regex-mail').hide();
        $('.regex-mail-valide').hide();
        if($('.regex-mail').text() == 'Mail invalide')
        {
            $('.regex-mail').text('');
        }
    });



    $('.regex-password').hide();
    $('input#password_suscribe').on('focus', function (event) {
        var pass = event.target.value;
        var regexPass = /^[A-Z?!\/\\:;.,§&é"'(-è_çà)=+\d]+.[a-zA-Z?!\/\\:;.,§&é"'(-è_çà)=+]+.\d\S/;
        if(!regexPass.test(pass))
        {
            var mailValide = "Première lettre en Majuscule ou un caractère spécial. <br> 8 caractères minimum et sans espace";
            $('.regex-password').show();
            $('.regex-password').append(mailValide);
        }
        else
        {
            $('.regex-password').hide();
        }
    });
    $('input#password_suscribe').on('focusout', function (event) {
        $('.regex-password').hide();
        $('.regex-password').text('');
    });
})