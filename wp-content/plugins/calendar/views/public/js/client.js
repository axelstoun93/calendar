//Клики по кнопкам навигации
$(document).ready(function () {
    //Кнопки навигации
    var url = window.location.href.split('?')[0];
    $('#data-prev').click(function()
    {
        var date = this.getAttribute('data-prev');
        var updateUrl = url+'?'+date;
        location.assign(updateUrl);
    });
    $('#data-next').click(function()
    {
        var date = this.getAttribute('data-next');
        var updateUrl = url+'?'+date;
        location.assign(updateUrl);
    });
    $('#data-now').click(function()
    {
        var date = this.getAttribute('data-prev');
        var updateUrl = url+'?'+date;
        location.assign(updateUrl);
    });
    // Скроллинг ко календаря
});