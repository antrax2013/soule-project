/**
 * 	@title addCssFlashMessenger.js
 * 	@description Mise en forme des FlashMessenger à l'aide de JQuery
 * 	@file public\js\helpers\addCssFlashMessenger
 * 	@author Cyril Cophignon
 */
////console.log(data);

/**
 * @class addCssFlashMessenger
 * @description classe modifiant la mise en forme d'un flashMessenger
 */
var addCssFlashMessenger = function () {

    var _listeClasse = "error warning info success";

    /**
     *  Méthode Principale qui lit la première classe CSS référencée
     */
    this.init= function()
    {
        var $target = $('#SR_FlashMessage');

        //Découpage de la chaine des class CSS
        var _class = $target.attr('class');
        if(_class instanceof Array)
        {
            _class = _class.split(' ');

            for(i = 0; i< _class.length; i++)
            {
                //console.log(_class[i]);
                if(_listeClasse.indexOf(_class[i])!=-1)
                {
                    //i = class.lenght;
                    addCss(_class[i], $target);
                    break;
                }

            }
        }
        else
        {
            console.log(_listeClasse.indexOf(_class)!=-1);
            if(_listeClasse.indexOf(_class)!=-1)
            {
                addCss(_class, $target);
            }
        }
    }


    function addCss(classe, $cible)
    {
        var elmt ='';
        console.log(classe);
        switch(classe)
        {
            case 'error':
                /*elmt = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" id="SR_FlashMessage"><p class="error"><span class="ui-icon ui-icon-alert"></span>#</p></div></div>';
            break;
            case 'warning':
                elmt = '<div class="ui-state-warning ui-corner-all" id="SR_FlashMessage"><p class="warning"><span class="ui-icon ui-icon-info"></span>#</p></div>';
            break;
            case 'info':*/
                elmt = '<div class="ui-state-info ui-corner-all" id="SR_FlashMessage"><p class="info"><span class="ui-icon ui-icon-info"></span>#</p></div>';
            break;
            case 'success':
                elmt = '</div><div class="ui-state-success ui-corner-all" id="SR_FlashMessage"><p class="success"><span class="ui-icon ui-icon-circle-check"></span>#</p></div>';
            break;
        }

        if(elmt != '')
        {
            console.log(elmt.replace("#", $cible.children().text()));
            $cible.after(elmt.replace("#", $cible.children().text()));
            $cible.remove();
        }
    }

};