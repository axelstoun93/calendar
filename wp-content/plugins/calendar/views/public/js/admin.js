$('document').ready(function () {
    $('.cell-calendar').on('click',function (e) {
        var getDate = $(this).attr('data-full-data');
        //var date = {'date': getDate};
        var url = 'http://'+location.host + '/wp-admin/admin.php?page=calendar.php&dateSet='+getDate;
        var defaulUrl = 'http://'+location.host + '/wp-admin/admin.php?page=calendar.php';
        $.ajax(
            {
                asyns:true,
                url:url,
                method:'GET',
                dataType:'html',
                success:function()
                {
                    location.reload(defaulUrl);
                },
                error:function(e)
                {

                    alert('Ошибка при получении данных');
                }
            });
    });

    //Клики по кнопкам навигации
    $('#data-prev').click(function()
    {
        var date = this.getAttribute('data-prev');
        var updateUrl = 'http://' + location.host + '/wp-admin/admin.php?page=calendar.php&' + date;
        location.assign(updateUrl);
    });
    $('#data-next').click(function()
    {
        var date = this.getAttribute('data-next');
        var updateUrl = 'http://' + location.host + '/wp-admin/admin.php?page=calendar.php&'  + date;
        location.assign(updateUrl);
    });
    $('#data-now').click(function()
    {
        var updateUrl = 'http://' + location.host + '/wp-admin/admin.php&page=calendar.php';
        location.assign(updateUrl);
    });

});