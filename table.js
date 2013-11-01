$('tbody tr').click(function () {
    var clicked = $(this);
    $('tbody tr').css('background-color', '#BBBBBB');
    $(this).css('background-color', '#AAAAAA');
    $('.niewidoczny').stop(true).slideUp(200);
    clicked.next('.niewidoczny').stop(true).slideDown(200);
    clicked.next('.niewidoczny').css('background-color', 'white');
});