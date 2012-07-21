<?php
//Tableau contenant les informations à destination de l'utilisateur
$info = Array (	"envoi" => "",
				"err_code" => "",
				"err_mail" => "",
				"err_nom" => "",
				"err_equipe" => "",
				"err_sujet" => "",
				"err_message" => ""					
				);
$label = Array ("envoi" => "Envoi effectué.",
				"err_envoi_err_form" => "Erreur: Envoi impossible temps qu'il reste des erreurs dans les informations saisies.",
				"err_envoi_err_inconnue" => "Erreur: Une erreur est survenue durant l'envoi. Merci de renouveler votre demande ultérieument.",
				"err_code" => "Erreur: Le code anti-flood n'est pas bon.",
				"err_mail" => "Erreur: Adresse email invalide.",
				"err_nom" => "Erreur: Ce champ est obligatoire.",
				"err_equipe" => "",
				"err_sujet" => "Erreur: Ce champ est obligatoire.",
				"err_message" => "Erreur: Ce champ est obligatoire."					
				);

/**
* Fonction vérrifiant que les données du formulaire sont correctement remplies et ajout des messages d'erreurs dans le formulaire en cas de problèmes
* @param [string, string] $a_valeur, tableau associatif contenant les données passées au travers du formulaire
* @return [bool] renvoie vrai si les données sont validées faux sinon.
*/
function validation_formulaire($a_valeur, &$info, $label)
{
	$retour = true;
	//Vérification du code anti-spam
    if(!isset($_SESSION['livreor']) || strcmp(strtoupper($_SESSION['livreor']),strtoupper($a_valeur['code']))!=0)
    {
		$info["err_code"]=setRed($label["err_code"]);
		$retour = false;
    }
    //Vérification du mail
    if(!isset($a_valeur['email']) || !validateEmail($a_valeur['email'])) 
    {
       $info["err_mail"]=setRed($label["err_mail"]);
       $retour = false;
    }
	
	//Vérification du nom
    if(!isset($a_valeur['nom']) || empty($a_valeur['nom'])) 
    {
       $info["err_nom"]=setRed($label["err_nom"]);
       $retour = false;
    }
	
	//Vérification du sujet
    if(!isset($a_valeur['sujet']) || empty($a_valeur['sujet'])) 
    {
       $info["err_sujet"]=setRed($label["err_sujet"]);
       $retour = false;
    }
	
	//Vérification du nom
    if(!isset($a_valeur['message']) || empty($a_valeur['message'])) 
    {
       $info["err_message"]=setRed($label["err_message"]);
       $retour = false;
    }
	
	return $retour;	
}

function send_mail($a_valeur, $a_siteMail, $a_auteurMail, &$info)
{
	global $libsPath;
	include_once $libsPath."PHPMailer_v2.0.4/SoulePHPMailer.php";
	
	$m = new SoulePHPMailer();
	$m->From=$a_siteMail;
	$m->FromName=$a_siteMail;
	
	foreach(preg_split("#;#", $a_auteurMail) as $mail)	$m->AddAddress($mail);
	unset($mail);
	$RC = "<br><br>";
	
	$m->AddBr($a_valeur["message"]);
	
	$m->Subject=$a_valeur["sujet"];
	$message= "Bonjour,".$RC."Vous venez de recevoir un mail de:".$RC;
	$message.="Nom: ".$a_valeur["nom"].$RC;
	$message.="Equipe: ".$a_valeur["equipe"].$RC;
	$message.="Message:".$RC.$a_valeur["message"];
	$m->Body=$message;	// set the body	
	
	return $m->Send();
}

if(isset($_POST['valider']) && $_POST['valider']=='Envoyer')
{
	clean_http_request();
	if(validation_formulaire($_POST, $info, $label))
	{
		if(send_mail($_POST, $siteMail, $auteurMail, $info)) $info["envoi"].=setGreen($label["envoi"]);
		else $info["envoi"].=setRed($label["err_envoi_err_inconnue"]);
	}
	else $info["envoi"].=setRed($label["err_envoi_err_form"]);
	free_http_request();
}
?>