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
      	var id = clicked.val();
		var parent = clicked.parent('div');
		var className = parent.attr('class');
		var subClass = className.split(' ');
		if (subClass[0]=='edit') {
			var type = 'edit';
			if(subClass[1]=='post'){
				$.post('ajax.php', {ajax_id:id, ajax_table:'posts'}, function(data){
					console.log('asdf');
					console.log(data['tytul']);
				}).always(function(){
					console.log(id);
				});
			}else if (subClass[1]=='member'){
				$.post('ajax.php', {ajax_id:id, ajax_table:'members'}, function(data){
					console.log('asdf');
				}).always(function(){
					console.log('asdf');
				});
			}else if (subClass[1]=='wyjazd'){
				$.post('ajax.php', {ajax_id:id, ajax_table:'wyprawy'}, function(data){
					console.log('asdf');
				}).always(function(){
					console.log('asdf');
				});
			}
		}else if (subClass[0]=='delete') {
			var type = 'delete';
			if(subClass[1]=='post'){
				$.post('ajax.php', {ajax_id:id, ajax_table:'posts'}, function(data){
					console.log('asdf');
					console.log(data['tytul']);
				}).always(function(){
					console.log(id);
				});
			}else if (subClass[1]=='member'){
				$.post('ajax.php', {ajax_id:id, ajax_table:'members'}, function(data){
					console.log('asdf');
				}).always(function(){
					console.log('asdf');
				});
			}else if (subClass[1]=='wyjazd'){
				$.post('ajax.php', {ajax_id:id, ajax_table:'wyprawy'}, function(data){
					console.log('asdf');
				}).always(function(){
					console.log('asdf');
				});
			}
		};
});
// val changed->
//post val->
//get element by id->
//val:wybory na pods. klasy 
//wartosci z bazy do val ponizszych