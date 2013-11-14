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
					var start = data.indexOf('[');
					var end = data.lastIndexOf(']');
					if (end-start!=1) {
						var json = data.substring(start+1, end);
						var retData = jQuery.parseJSON(json);
						var tytul = retData.tytul;
						$('.edit').find('.tytul').val(tytul);
						var tresc = retData.tresc;
						$('.edit').find('.tresc').val(tresc);
					}else{
						$('.edit').find('.tytul').val('');
						$('.edit').find('.tresc').val('');
					};
				}).always(function(){

				});
			}else if (subClass[1]=='member'){
				$.post('ajax.php', {ajax_id:id, ajax_table:'members'}, function(data){

				}).always(function(){
					
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
					var start = data.indexOf('[');
					var end = data.lastIndexOf(']');
					if (end-start!=1) {
						var json = data.substring(start+1, end);
						var retData = jQuery.parseJSON(json);
						var tytul = retData.tytul;
						var tresc = retData.tresc;
						$('.view').remove();
						$('<div class="view"></div>').css('display', 'block').css('margin', '15px').css('border', '1px solid black').insertAfter(clicked);
						$('.view').html(tytul+'<br>'+tresc);
					}else{
						$('.view').remove();
					};
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