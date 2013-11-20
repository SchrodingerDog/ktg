$('.wrapper').sortable({
    axis: 'y',
    update: function () {
        var inputs = $(this).sortable('toArray');
        $.post('ajax.php', {
            ajax_order: inputs
        }, function (data) {});
    }
});