//Javascript

jQuery(document).ready(function ($) {
    $('#login-form').hide(1000);

    $('.connection').on('click', function () {
        $('#login-form').show(1000);
    });

    $('#close.close-form').on('click', function () {
        $('#login-form').hide(1000);
    });


    function animateForm(target, element) {
        $(target).on('focus', function () {
            $(element).animate({"margin-left": "85%"});
        })

        $(target).on('focusout', function () {
            $(element).animate({"margin-left" : "5px"});
        })
    }

    animateForm("input[type='password']", ".fa-lock");
    animateForm("input#email", "#envelope-login");
})

