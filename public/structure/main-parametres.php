<?php //$root="http://soule.royale.free.fr";

$tmpName = $_SERVER["SERVER_NAME"];
$pos = strstr ("http://", $tmpName);
if($pos===false) 
{
	$siteName=$_SERVER["SERVER_NAME"];
	//Pour que l'url soit valide malgre le vhost
	if(!strstr("localhost",$_SERVER["SERVER_NAME"])) $siteURLHome="http://".$_SERVER["SERVER_NAME"];
}
else
{
	$siteName=str_replace("http://","",$_SERVER["SERVER_NAME"]);
	$siteURLHome=$_SERVER["SERVER_NAME"];
}
$siteURLHome."/";

$siteMail="soule.royale@free.fr";
$auteurMail="cyrilcophignon@yahoo.fr;philippe.debroas@free.fr";

if(isset($title)) $title="Soule Royale - ".$title;
else $title="Soule Royale";

if(!isset($meta)) $meta="soule,soule royale,royale,équipes soule,équipe soule,équipe,equipe,equipes,équipes,souleur,souleurs";
if(!isset($desc)) $desc="Soule royale est un jeu en ligne, gratuit multijoueur. Jouable entièrement dans un navigateur web, sans téléchargement. Soyez fin stratége pour mener votre équipe hauts sommets.";


if(!isset($rootPath)) $rootPath="./";
?>
