$(function(){
//	$.get(Routing.generate('band_new_form'),function(data){
//		var idDialogBox = 'dialogBox',
//		dialogBox = $('<div>',{
//			id:idDialogBox,
//			html:data
//		});
//		dialogBox.dialog({
//			autoOpen: false,
//			width:500,
//			modal: true
//		});
//		$('#clamz_cheminduson_bandbundle_bandtype_tags').textboxlist();
//	$('#new-band').click(function(){
//		
//			$('#'+idDialogBox).dialog('open');			
//		});
//	});
//	
//	
	
	var values = $('#tags-values').text().split(',');
	$('#band_tags').textBoxlist({values: values});
});

