jQuery(document).ready(function ($) {
    $('#forget_pass_hide').hide();

    $('#email_forget').on('focus', function () {
            $('#email_forget').attr('placeholder', 'email@email.com');
            $('#forget_pass_hide').show().animate({top: '-20px', display : 'block'});
            if($('#forget_pass_hide').text() == 'Votre email')
            {
                $('#forget_pass_hide').text('');
            }
            else
            {
                $('#forget_pass_hide').append('Tapez votre email');
            }
    })

    $('#email_forget').on('focusout', function () {
        $('#email_forget').attr('placeholder', 'Tapez votre email');
        $('#forget_pass_hide').hide().animate({top: '10px', display : 'none'});
        if($('#forget_pass_hide').text() == 'Tapez votre email')
        {
            $('#forget_pass_hide').text('');
        }
    })
})