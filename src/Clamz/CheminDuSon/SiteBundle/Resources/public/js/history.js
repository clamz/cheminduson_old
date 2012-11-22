$(document).ready(function(){
        $('nav a').click(function() {
                //On met l'élément courant dans une variable, pour améliorer les performances
                var $t = $(this);
                //On appelle la fonction qui fera la requete en ajax, et gérera la pile de l'historique
                load_content($t.attr('href'),$t.attr('href'));
                //On ne suit pas le lien
                return false;
        });
});
function load_content(title,url,skipHistory) {
        $.get(url,function (data) {
                //On met à jour le itre de la page
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
                $('#content').html(data);
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