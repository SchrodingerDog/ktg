// $("input.id")
// $('.wyjazd input[type="text"], .wyjazd textarea')
// .focus(function () {
	// var clicked = $(this);
    // console.log(this);
    // console.log($(this).parent(this));
    // $(clicked).parent(clicked).each(function(){
    	// $(this).val('Nanana');
    // })
    // $('<div id="view"></div>').css('display', 'inline').css('margin', '15px').insertAfter(this);
    // $('#view').text('Tresc, tresc');
// })
    // .focusout(function () {
    	// $(this).val("");
// });
$('input.id').on('keyup change', function(){
      var clicked = $(this);
		var parent = clicked.parent('div');
		var className = parent.attr('class');
		console.log(className+'Batman');
});
// val changed->
//post val->
//get element by id->
//val:wybory na pods. klasy 
//wartosci z bazy do val ponizszych