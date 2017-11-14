jQuery(document).ready(function () {
$('.check_ok').hide();
$('.check_ko').hide();
$('input#submit_suscribe_btn').prop('disabled', true);

$('input#email_suscribe').on('focusout', function () {
    var email = $('input#email_suscribe').val();
    var dataString = 'email_suscribe=' + email;

    $.ajax({
        type: 'POST',
        url: 'app/models/suscribe_check.php',
        data: dataString,

        success: function (data) {
            var reponseData = jQuery.parseJSON(data);
            if(reponseData.status == 'error')
            {
                $('.check_ok').hide();
                $('.check_ko').fadeIn();
                $('.check_ko').text(reponseData.message);
                $('#submit-suscribe-ok').hide();
            }
            else
            {
                $('.check_ko').hide();
                $('.check_ok').fadeIn();
                $('.check_ok').text(reponseData.message);
                $('input#submit_suscribe_btn').prop('disabled', false);
                $('#submit-suscribe-ok').show();
            }
        }
    });
    return false;
});
});