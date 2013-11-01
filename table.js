$('tbody tr').click(function () {
    var clicked = $(this);
    $('.niewidoczny').toggle(

    function () {
        $('.niewidoczny').hide();
        clicked.next('.niewidoczny').show();
    },

    function () {
        $('.niewidoczny').hide();
        clicked.next('.niewidoczny').show();
    });
});