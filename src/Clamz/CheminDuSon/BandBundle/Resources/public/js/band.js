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
	waitForKeyElements ("#band-accueil #tabs",
			function(node){
				node.tabs({ 
					 active:$('#'+node.attr('id')+' li.active').index(),
					 beforeLoad: function( event, ui ) {
			            ui.jqXHR.error(function() {
			                ui.panel.html(
			                    "Couldn't load this tab. We'll try to fix this as soon as possible. " +
			                    "If this wouldn't be a demo." );
			            });
			            
			            ui.jqXHR.abort();
			            
			    		var newPanel = ui.panel,
			    			newTab = ui.tab,
			    			link = $(newTab.children('a')[0]).attr('href');
			    		load_tab_content(link, link, false, newPanel);		           
			        }
				});
			}
	);
	
	function load_tab_content(title,url,skipHistory,element) {
		element.empty().html('<img src="/images/ajax-loader.gif" style="display:block;margin:auto;" />');
        $.get(url,function (data) {
                //On met à jour le titre de la page
                document.title = title;
                //On défini l'objet d'état
                var stateObj = {
                        title: title,
                        url: url
                };
                //Si la variable skipHistory est à false, on lance la méthode pushstate
                if (!skipHistory) {
                        //On vérifie que la fonction pushState est bien définie
                        if (typeof window.history.pushState == 'function') {
                                window.history.pushState(stateObj,title,url);
                        }
                }
                //On charge le contenu
                element.html(data);
        });
       
       
       
	}
	//On détecte les événement sur la pile de l'historique
	window.onpopstate = function(event) {
	        //Si event.state est définie (c'est à dire que la page précédente fait partie de l'historique courant), on charge le contenu
	        if (event.state) {
	                load_content(event.state.title, window.location.pathname, true);
	        } else {
	                //Si event.state n'est pas définie, on créer un nouvel objet d'état
	                var stateObj = {
	                        title: document.title,
	                        url: window.location.pathname
	                };
	                //On modifie l'entrée actuelle
	                window.history.replaceState(stateObj,document.title,window.location.pathname);
	        }
	};
	
//	var values = $('#tags-values').text().split(',');
//	$('#band_tags').textBoxlist({values: values});
});

