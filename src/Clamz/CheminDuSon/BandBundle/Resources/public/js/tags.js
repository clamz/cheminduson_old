$(function(){
	waitForKeyElements ('#band-tags-container',function(node){
		node.mouseenter(function(e) {
			$('#band-tags-list').show('fast');
		}).mouseleave(function(e) {
			$('#band-tags-list').hide('fast');
		});
	});
});