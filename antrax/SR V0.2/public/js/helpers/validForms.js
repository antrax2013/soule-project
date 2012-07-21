/** ****************************
	Script JS: validForms
	Controleur: site-map/index
	Fichier: public\js\helpers\validForms
	Objectif: Validation asynchrone de formulaire à l'aide de JQuery
	Auteur: Cyril Cophignon
	Todo: Rendre générique, aujoud'hui ne travail que pour le formulaire contactez-nous
***************************** */

/**
Méthode Principale
*/
$(document).ready((function()
{
    //console.log('start');
    // A la sortie d'un input
	$("input").blur(function()
    {
        //On récupère l'attribut "for" de la balise label.
		var formElementId = $(this).parent().prev().find('label').attr('for');
		
		//On lance la validation de l'élément
		doValidation(formElementId);
    });
}));

/**
Méthode de validation des éléments, insère dans le dom les erreurs
@param id  attribut id de l'élément à vérifier
*/
function doValidation(id)
{
    var url = '/contactez-nous/validateform'; //url de l'action à appeler sous la forme controler/action
    var data = {}; //pour signaler au browser un retour en json
	var name='';
    
	$("input").each(function() //serrialisation des infos transmises
    {
        name = $(this).attr('name');
		//Cas particulier du Captcha
		if(name == 'captcha')
		{
			data[name+'-input'] = $(this).val();
			data[name+'-id'] = $('captcha-id').val();
		}
		//autres éléments
		else data[name] = $(this).val();
    });
	
	//console.log(data);
	$.post(url,data,function(resp) //Récupération par post-back asynchorne (ajax) des messages d'erreurs eventuels
    {
        $("#"+id).parent().next().find('.errors').remove();  //suppresion du DOM des anciens messages d'erreurs attachés à l'élément      
		$("#"+id).parent().next('td').append(getErrorHtml(resp[id], id)); //ajout de l'erreur au DOM
    },'json');
}

/**
Méthode de création des éléments html erreurs
@param formErrors tableau contenant les messages d'erreurs à ajouter
@param id  attribut id de l'élément à vérifier
@return renvoie le html à ajouter au DOM
*/
function getErrorHtml(formErrors , id)
{
    var cout = '<span id="errors-'+id+'" class="errors">';
	
    for(errorKey in formErrors) cout += formErrors[errorKey];
    cout += '</span>';
    return cout;
}