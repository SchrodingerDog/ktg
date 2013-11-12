$('.edit input[type="text"], .delete input[type="text"],.edit textarea, .delete textarea')
// $('.wyjazd input[type="text"], .wyjazd textarea')
.focus(function () {
    console.log(this);
    console.log($(this).parent(this));
    $(this).parent(this).each(function(){
    	$(this).not($(this).parent(this)).val('Nanana');
    	console.log(this);
    })
    // $('<div id="view"></div>').css('display', 'inline').css('margin', '15px').insertAfter(this);
    // $('#view').text('Tresc, tresc');
})
    .focusout(function () {
    $('#view').remove();
});