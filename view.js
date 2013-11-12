$("input.id")
// $('.wyjazd input[type="text"], .wyjazd textarea')
.focus(function () {
	var clicked = $(this);
    // console.log(this);
    // console.log($(this).parent(this));
    // $(clicked).parent(clicked).each(function(){
    	$(this).val('Nanana');
    	console.log(clicked);
    // })
    // $('<div id="view"></div>').css('display', 'inline').css('margin', '15px').insertAfter(this);
    // $('#view').text('Tresc, tresc');
})
    .focusout(function () {
    	$(this).val("");
});