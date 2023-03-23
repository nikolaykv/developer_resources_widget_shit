$(function () {
    $(document).on('ready', function () {
        $('#devresource_btn').on('click', function () {

            var selectDate = {date: $(this).attr('data-select-date')};

            $.ajax({
                url: '/content/devresource',
                method: 'get',
                dataType: 'json',
                data: selectDate,
                success: function (data) {

                    if (data.hasOwnProperty('data')) {

                        var html = "<ul>";
                        $(data.data).each(function (key, item) {


                            html += '<li><a href="' + item.slug + '">' + item.title + '</a></li><span>' + item.date_pub + '</span><br>'
                        })
                        html += "</ul>"

                        $('.devreource-wrap').html(html)
                    } else {
                        $('.devreource-wrap').html("<p>Произошла ошибка во время Ajax запроса!</p>")
                    }

                }
            });

        })
    });

});