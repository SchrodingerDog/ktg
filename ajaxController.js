var globalID;
function removePost (id) {
	globalID = id;
	var clicked = $('.container').find('div#row[row='+id+']');
	var didConfirm = confirm("Czy na pewno chcesz usunac?");
		if (didConfirm == true) {
			$.post('ajax.php', {ajax_rm_id:id}, function(data){
				var curr=$('.container').find('div#row[row='+(id)+']');
				do{
					var now =  curr;
					if(now.find('div').first().attr('class') == 'col-md-6'){
						now.find('div').first().attr('class', 'col-md-6 col-md-offset-6');
					}else{
						now.find('div').first().attr('class', 'col-md-6');
					}
					curr = curr.prev('#row');
					console.log(now);
				}while(curr.length !== 0);
				clicked.remove();
				console.log(height);
			});
		};
}

function editPost (id) {
	globalID = id;
	var clicked = $('#row[row='+id+']');
	$( "#dialog-form" ).dialog( "open" );
	$.post('ajax.php', {ajax_id:id, ajax_table:'posts'}, function(data){
		var start = data.indexOf('[');
		var end = data.lastIndexOf(']');
			if (end-start!=1) {
				var json = data.substring(start+1, end);
				var retData = jQuery.parseJSON(json);
				var tytul = retData.tytul;
				$('#dialog-form').find('.tytul').val(tytul);
				var tresc = retData.tresc;
				$('#dialog-form').find('.tresc').val(tresc);
			};
	});
}


$( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 500,
      width: 800,
      draggable:false,
      resizable:false,
      modal: true,
      buttons: {
        "Akceptuj zmiany post": function() {
          var tytul = $(this).find('.tytul').val();
          var tresc = $(this).find('.tresc').val();
          $.post('ajax.php', {ajax_ed_id:globalID, ajax_ed_tytul:tytul, ajax_ed_tresc:tresc}, function(data){
          	$('.container').find('div#row[row='+globalID+']').find('div').find('div.panel').find('div').find('h3').html(tytul);
          	$('.container').find('div#row[row='+globalID+']').find('div').find('div.panel').find('div.panel-body').html(tresc);
		  });
          $( this ).dialog( "close" );
        },
        'Anuluj': function() {
          $( this ).dialog( "close" );
        }
      },
      close: function() {
        
      }
});