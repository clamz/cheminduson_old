$(function(){
	waitForKeyElements('.ckeditor',function(node){
		CKEDITOR.replace(node.attr('id'));
	});
});