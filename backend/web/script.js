$(document).on('ready pjax:success', function () {
    $('a[data-rel^=lightcase]').lightcase();
});

$('.need_count_letters').on('keydown load', function () {
    $(this).parent('div').find('.help-block').html('Количество символов: ' + $(this).val().length);
});

$(document).ready(function () {
    $('#send-button').on('click', function () {
        var v = $(this).attr('data-id');
        // console.info(v);
        $.ajax({
            type: 'get',
            url: '/admin/submit/index',
            data: 'id=' + v,
            success: function (data) {
                console.info(data);
            },
        });
        $(this).hide();
        $('.div-news-subscribe').html('Рассылка начата');
    });


    $(document).on('click', '[data-delete-image]', function (event) {
        event.preventDefault();
        console.info($(this).attr('href'));
        $.ajax({
            url: $(this).attr('href'),
            type: 'post',
            success: function (data) {

                $('#image-edit').html(data);

            }
        });
        return false;
    });



})

//CKEDITOR.dtd.$removeEmpty.span = 0;

