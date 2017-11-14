//Javascript

jQuery(document).ready(function ($) {
    $('#suscribe-formulaire').hide(1000);

    $('.inscription').on('click', function () {
        $('#suscribe-formulaire').show(1000);
    });

    $('#close.close-form').on('click', function () {
        $('#suscribe-formulaire').hide(1000);
    });

    function animateForm(target, element) {
        $(target).on('focus', function () {
            $(element).animate({"margin-left": "85%"});
        })

        $(target).on('focusout', function () {
            $(element).animate({"margin-left" : "5px"});
        })
    }

    animateForm("input[type='text']", ".fa-user");
    animateForm("input[type='password']", ".fa-lock");
    animateForm("input#email_suscribe", "#envelope-suscribe");
})
