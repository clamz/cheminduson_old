window.addEvent('domready',function() {

// mouseenter: function(){
// // this refers to the element in an event
//		    	$('connexionBd').morph({
//		    		'opacity':1
//		    	});
//		    },       
//		    mouseleave:function(event){
//		    	$('connexionBd').morph({
//		    		
//		            'opacity':0
//			      });
//		    }


	$('connexionBd').set('morph', {
	    duration: 500
	});
	
	$('connexionLink').addEvents({
	    mouseenter:function(e){
	    	$('connexionBd').show();
	    },
	    mouseleave:function(e){
	    	$('connexionBd').hide();
	    }
	});
});


