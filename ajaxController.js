var globalID;
function removePost (id) {
	globalID = id;
	var clicked = $('#row[row='+id+']');
	var didConfirm = confirm("Czy na pewno chcesz usunac?");
		if (didConfirm == true) {
			$.post('ajax.php', {ajax_rm_id:id}, function(data){

			});
		};
	clicked.remove();
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
          	$('#row[row='+globalID+']').find('h3').html(tytul);
          	$('#row[row='+globalID+']').find('.panel-body').html(tresc);
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