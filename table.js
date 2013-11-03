$('tbody tr').not('table tbody tr td table tr').click(function () {
    var clicked = $(this);
    $('tbody tr').not('table tbody tr td table tr').css('background-color', '#FFA22C');
    $(this).not('table tbody tr td table tr').css('background-color', 'rgb(255, 71, 0)');
    $('.niewidoczny').stop(true).slideUp(200);
    clicked.next('.niewidoczny').stop(true).slideDown(200);
    $('.niewidoczny').css('background-color', '#DADADA');
});