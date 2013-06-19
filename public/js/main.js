$(function() {
    $('.votes span').click(function(e) {
        e.preventDefault();
        var url, element = $(this);

        if ($(this).data('type') == 'question') {
            url = '/questions/vote/';
        } else if ($(this).data('type') == 'answer') {
            url = '/answers/vote/';
        }

        $.ajax({
            url: url + $(this).data('id') + '/' + $(this).data('vote'),
            success: function (data, status) {
                $(element).siblings('span.num').html(data);
            }
        });
    });
});