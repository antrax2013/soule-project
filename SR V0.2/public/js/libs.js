/**
* Fonction v�rrifiant le format du champ de saisi de type email
* @param [string] a_valeur, chaine contenant le mail � v�rifier
* @return [bool] renvoie vrai si les donn�es sont valid�es faux sinon.
*/
function IsEmail(a_valeur)
{
 return (a_valeur.search("^[a-z0-9._-]+@[a-z0-9.-]{2,}[.][a-z]{2,3}$") != -1);
}

/**
* Fonction v�rrifiant le format du champ de saisi de type email et modifie le formulaire si un probl�me survient
* @param [string] a_input, noeud type input, ne pas oublier le #
* @param [string] a_label, noeud type label, ne pas oublier le #
* @return [bool] renvoie vrai si les donn�es sont valid�es faux sinon.
*/
function valide_mail(a_input, a_label)
{
	var valeur = $(a_input).val();
	
	if(!IsEmail(valeur)) 
	{
		$("#lbl_email").addClass("rouge");
		$("#in_email").addClass("ui-state-error");
		return false;
	}
	
	$("#lbl_email").removeClass("rouge");
	$("#in_email").removeClass("ui-state-error");
	return true;
}