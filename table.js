$('tbody tr').not('table tbody tr td table tr').click(function () {
    var clicked = $(this);
    $('tbody tr').not('table tbody tr td table tr').css('background-color', '#FFF');
    $(this).not('table tbody tr td table tr').css('background-color', 'rgb(204, 169, 255)');
    $('.niewidoczny').stop(true).slideUp(200);
    clicked.next('.niewidoczny').stop(true).slideDown(200);
    $('.niewidoczny').css('background-color', '#FFDBDB');
});