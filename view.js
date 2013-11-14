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
					if (id=='') {
						$('.edit').find('.tytul').val('');
						$('.edit').find('.tresc').val('');
					};
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
				});
			}else if (subClass[1]=='member'){
				$.post('ajax.php', {ajax_id:id, ajax_table:'members'}, function(data){
					if (id=='') {
						$('.edit.member').find('.imie').val('');
						$('.edit.member').find('.nazwisko').val('');
						$('.edit.member').find('.opis').val('');
					};
					var start = data.indexOf('[');
					var end = data.lastIndexOf(']');
					if (end-start!=1) {
						var json = data.substring(start+1, end);
						var retData = jQuery.parseJSON(json);
						var imie = retData.imie;
						var nazwisko = retData.nazwisko;
						var opis = retData.opis;
						$('.edit.member').find('.imie').val(imie);
						$('.edit.member').find('.nazwisko').val(nazwisko);
						$('.edit.member').find('.opis').val(opis);
					}else{
						$('.edit.member').find('.imie').val('');
						$('.edit.member').find('.nazwisko').val('');
						$('.edit.member').find('.opis').val('');
					};
				});
			}else if (subClass[1]=='wyjazd'){
				$.post('ajax.php', {ajax_id:id, ajax_table:'wyprawy'}, function(data){
					if (id=='') {
						$('.edit.wyjazd').find('.cel').val('');
						$('.edit.wyjazd').find('.data').val('');
					};
					var start = data.indexOf('[');
					var end = data.lastIndexOf(']');
					if (end-start!=1) {
						var json = data.substring(start+1, end);
						var retData = jQuery.parseJSON(json);
						var cel = retData.cel;
						var data = retData.data;
						$('.edit.wyjazd').find('.cel').val(cel);
						$('.edit.wyjazd').find('.data').val(data);
					}else{
						$('.edit.wyjazd').find('.cel').val('');
						$('.edit.wyjazd').find('.data').val('');
					};
				});
			}
		}else if (subClass[0]=='delete') {
			var type = 'delete';
			if(subClass[1]=='post'){
				$.post('ajax.php', {ajax_id:id, ajax_table:'posts'}, function(data){
					if (id=='') {
						$('.view').remove();
					};
					var start = data.indexOf('[');
					var end = data.lastIndexOf(']');
					if (end-start!=1) {
						var json = data.substring(start+1, end);
						var retData = jQuery.parseJSON(json);
						var tytul = retData.tytul;
						var tresc = retData.tresc;
						$('.view').remove();
						$('<div class="view"></div>').css('display', 'block').css('margin', '15px').css('border', '1px solid black').css('max-width', '500px').insertAfter(clicked);
						$('.view').html(tytul+'<br>'+tresc);
					}else{
						$('.view').remove();
					};
				});
			}else if (subClass[1]=='member'){
				$.post('ajax.php', {ajax_id:id, ajax_table:'members'}, function(data){
					if (id=='') {
						$('.view').remove();
					};
					var start = data.indexOf('[');
					var end = data.lastIndexOf(']');
					if (end-start!=1) {
						var json = data.substring(start+1, end);
						var retData = jQuery.parseJSON(json);
						var imie = retData.imie;
						var nazwisko = retData.nazwisko;
						var opis = retData.opis;
						$('.view').remove();
						$('<div class="view"></div>').css('display', 'block').css('margin', '15px').css('border', '1px solid black').css('max-width', '500px').insertAfter(clicked);
						$('.view').html(imie+' '+nazwisko+'<br>'+opis);
					}else{
						$('.view').remove();
					};
				});
			}else if (subClass[1]=='wyjazd'){
				$.post('ajax.php', {ajax_id:id, ajax_table:'wyprawy'}, function(data){
					if (id=='') {
						$('.view').remove();
					};
					var start = data.indexOf('[');
					var end = data.lastIndexOf(']');
					if (end-start!=1) {
						var json = data.substring(start+1, end);
						var retData = jQuery.parseJSON(json);
						var cel = retData.cel;
						var data = retData.data;
						$('.view').remove();
						$('<div class="view"></div>').css('display', 'block').css('margin', '15px').css('border', '1px solid black').css('max-width', '500px').insertAfter(clicked);
						$('.view').html(cel+' ('+data+')');
					}else{
						$('.view').remove();
					};
				});
			}
		};
});
$('form').submit(function() {
	if($('.delete').find('.id').val()!=''){
		
		var didConfirm = confirm("Czy na pewno chcesz usunac?");
		if (didConfirm != true) {
			event.preventDefault();
		}
	}
});
// val changed->
//post val->
//get element by id->
//val:wybory na pods. klasy 
//wartosci z bazy do val ponizszych