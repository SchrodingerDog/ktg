$('.row').hover(
	function(){
		$('.przyciski').css('display', 'none');
		$(this).find('.przyciski').css('display', 'inline');
		// $('<div class = "col-md-3">Hej!</div>').insertAfter($(this).find('div').last()).css('display', 'inline');
}, 	function(){
		$('.przyciski').css('display', 'none');
});

var globalID;
function removeMember (id) {
	globalID = id;
	var clicked = $('.wrapper').find('.row[id='+id+']');
	var didConfirm = confirm("Czy na pewno chcesz usunac?");
		if (didConfirm == true) {
			$.post('ajax.php', {ajax_rm_m_id:id}, function(data){
				clicked.remove();
			});
		};
}

function editMember (id) {
	globalID = id;
	var clicked = $('.wrapper').find('.row[id='+id+']');
	$( "#dialog-form" ).dialog( "open" );
	$('[pole=1]').each(function(){
		$(this).val('');
	});
	$.post('ajax.php', {ajax_id:id, ajax_table:'members'}, function(data){
		var start = data.indexOf('[');
		var end = data.lastIndexOf(']');
			if (end-start!=1) {
				var json = data.substring(start+1, end);
				var retData = jQuery.parseJSON(json);
				var imie = retData.imie;
				$('#dialog-form').find('.imie').val(imie);
				var nazwisko = retData.nazwisko;
				$('#dialog-form').find('.nazwisko').val(nazwisko);
				var opis = retData.opis;
				$('#dialog-form').find('.opis').val(opis);
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
          var imie = $(this).find('.imie').val();
          var nazwisko = $(this).find('.nazwisko').val();
          var opis = $(this).find('.opis').val();
          $.post('ajax.php', {
          	ajax_ed_m_id:globalID, 
          	ajax_ed_m_imie:imie, 
          	ajax_ed_m_nazwisko:nazwisko,
          	ajax_ed_m_opis:opis
          }, function(data){
          	$('.wrapper').find('div.row[id='+globalID+']').find('div.panel').find('div.panel-title').html(nazwisko+' '+imie);
          	$('.wrapper').find('div.row[id='+globalID+']').find('div.panel').find('div.panel-body').html(opis);
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