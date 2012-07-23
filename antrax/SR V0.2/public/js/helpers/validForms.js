/**
 * 	@title validForms.js
 * 	@description Validation asynchrone de formulaire à l'aide de JQuery
 * 	@file public\js\helpers\validForms
 * 	@author Cyril Cophignon
 * 	Todo: Rendre générique, aujoud'hui ne travail que pour le formulaire contactez-nous
 */

/**
 * @class validForm
 * @description classe de validation asynchorne de formulaire via Ajax
 */
var validForm = function () {

    /**
     * Variable stockant l'url du controleur et de l'action associée
     */
    var _url = 'index/';

    /**
     * Accesseur en écriture sur le champ Url
     * @param valeur url de l'action à appeler sous la forme controler/action
     */
    this.setAction = function (valeur) { _url = valeur ;}

    /**
     *  Méthode Principale
     */
    this.init= function()
    {
        //Ajout des méthodes évenementiellees
        callBack_Blur($("input"));
        callBack_Blur($("textarea"));
    }

    /**
     * Méthode lançant la vérification du contenu de l'élément
     * @event OnBlur
     * @param element
     */
    function callBack_Blur(element)
    {
        element.blur(function()
        {
            //On récupère l'attribut "for" de la balise label.
            var formElementId = $(this).parent().prev().find('label').attr('for');

            //On lance la validation de l'élément
            doValidation(formElementId);
        });
    }

    /**
     * Méthode de validation des éléments, insère dans le dom les erreurs
     * @param id  attribut id de l'élément à vérifier
     */
    function doValidation(id)
    {
        var data = {}; //pour signaler au browser un retour en json
        var name='';
        var source = this;

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
        $.post(_url,data,function(resp) //Récupération par post-back asynchorne (ajax) des messages d'erreurs eventuels
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
        var cout = '<span id="errors-' + id + '" class="errors">';
        var erroKey;

        for(errorKey in formErrors) cout += formErrors[errorKey];
        cout += '</span>';
        return cout;
    }
}