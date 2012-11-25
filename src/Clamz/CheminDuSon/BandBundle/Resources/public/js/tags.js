$(function(){
	waitForKeyElements ('#band-tags-container',function(node){
		node.mouseenter(function(e) {
			$('#band-tags-list').show('slow');
		}).mouseleave(function(e) {
			$('#band-tags-list').hide('slow');
		});
	});
});