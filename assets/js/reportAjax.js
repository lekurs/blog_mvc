jQuery(document).ready(function () {
    $('.warning').on('click', function () {
        var parent = $(this).closest('.warning');
        var report = parent.find('.report').val();
        var chapterId = parent.find('.chapterId').val();
        var idComments = parent.find('.idComments').val();
        var  dataString = 'report=' + report + '&chapterId=' + chapterId + '&idComments=' + idComments;

        $.ajax({

            url : 'app/models/comments_report.php',
            type : 'post',
            data: dataString,


            success: function (data) {
                var reponseData = jQuery.parseJSON(data);
                if(reponseData.status == 'success')
                {
                    $('.liste-commentaires').append('<div class="success-report">');
                    if($('.success-report').text() != '')
                    {
                        if($('.success-report').text('') );
                    }
                    else
                    {
                        $('.success-report').show(1000).append(reponseData.message);
                        $('.success-report').hide(3000);
                    }

                }
            }
        });
        return false;
    });
})