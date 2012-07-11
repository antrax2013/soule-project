<?php 
	session_start();
	
	$rootPath="";
	$currentPath=$rootPath."";					//repertoire courrant
	$structurePath=$rootPath."structure/";		//repertoire structure
	$informationPath=$rootPath."informations/";	//repertoire informations
	$libsPath=$rootPath."libs/";				//repertoire librairie locale
	$ctrlPath=$rootPath."ctrl/";				//repertoire contrôle locale
	
	$page="Contactez-nous";
	$title=$page;
	$desc="Si vous rencontrez un problème ou que vous avez besoin d'informations sur la Soule Royale. C'est ici. Nous sommes à votre disposition.";
	/*include_once $rootPath."libs/Zend/Captcha/Figlet.php";
	
	// Créer une instance de Zend_View
	$view = new Zend_View();
 
	// Requête original :
	$captcha = new Zend_Captcha_Figlet(array(
		'name' => 'foo',
		'wordLen' => 6,
		'timeout' => 300,
	));
	$id = $captcha->generate();*/
	
	//include_once $rootPath."libs/protection.php";	
	include_once $structurePath."header/header.php";
	include_once $structurePath."content/content.php";
	include_once $libsPath."libs.php";
	include_once $ctrlPath."contactez-nous.php";
?>
<h1>Contactez-nous</h1>
<strong>Les champs en gras sont obligatoires.</strong>
<form id="contact_us" method="post" action="contactez-nous.php">
	<table style="padding:2em;">		
		<tr>
			<td colspan="3"><?php echo $info["envoi"];?></td>
		</tr>
		<tr>
			<td>Anti-flood :</td>
			<td colspan="2">Merci de recopier le code contenu dans l'image ci-contre.</td>			
		</tr>
		<tr>
			<td><img src="<?php echo $rootPath?>libs/protection.php?name=livreor&amp;strlen=4" title="anti-flood" alt="anti-flood" /></td>
			<td style="vertical-align:text-top;"><input id="code" name="code" class="ui-widget" value=""/></td>
			<td style="vertical-align:text-top;" class="erreur"><?php echo $info["err_code"];?></td>
		</tr>
		<tr>
			<td><label id="lbl_email" class="obligatoire">Adresse Mail :</label></td>
			<td><input id="in_email" name="email" class="ui-widget" value="<?PHP if(isset($_POST['email'])) echo $_POST['email'];?>"/></td>
			<td class="erreur"><?php echo $info["err_mail"];?></td>
		</tr>
		<tr>
			<td><label id="lbl_nom" class="obligatoire">Identité :</label></td>
			<td><input id="nom" name="nom" class="ui-widget" value="<?PHP if(isset($_POST['nom'])) echo $_POST['nom'];?>"/></td>
			<td class="erreur"><?php echo $info["err_nom"];?></td>
		</tr>
		<tr>
			<td><label>Equipe :</label></td>
			<td><input id="equipe" name="equipe" class="ui-widget" value="<?PHP if(isset($_POST['equipe'])) echo $_POST['equipe'];?>"/></td>
			<td class="erreur"><?php echo $info["err_equipe"];?></td>
		</tr>
		<tr>
			<td><label id="lbl_sujet" class="obligatoire">Sujet :</label></td>
			<td><input id="sujet" name="sujet" class="ui-widget" value="<?PHP if(isset($_POST['sujet'])) echo $_POST['sujet'];?>"/></td>
			<td class="erreur"><?php echo $info["err_sujet"];?></td>
		</tr>
		<tr>
			<td style="vertical-align:text-top;"><label id="lbl_Message"  class="obligatoire">Message :</label></td>
			<td><textarea id="message" name="message" class="ui-widget" rows="10" cols="35"><?PHP if(isset($_POST['message'])) echo $_POST['message'];?></textarea></td>
			<td class="erreur" style="vertical-align:text-top;"><?php echo $info["err_message"];?></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" id="valider" name="valider" value="Envoyer" /></td>
			<td colspan="2" align="center">&nbsp;</td>
		</tr>
	</table>
</form>
<?PHP
/*}
else
{
 echo "<script language='javascript' type='text/javascript'>
      alert('Votre demande à bien été prise en compte.');
      </script>";
}*/
?>
<script type="text/javascript" src="<?php echo $js;?>libs.js"></script>
<script language="javascript" type="text/javascript">
//<![CDATA[
$(document).ready(function(){
	var msg_mail = "Erreur: Adresse email invalide.";
	
	//Fonction déclechée à la sortie du champ email
	$("#in_email").change( function() {if(!valide_mail("#in_email", "#lbl_email")) alert(msg_mail);});
	
	//Fonction déclanchée à l'envoi du formulaire
	$("#contact_us").submit(function() 
	{
		//Validation de l'adresse email
		if(!valide_mail("#in_email", "#lbl_email")) { alert(msg_mail); return false;}
	});
});
//]]>
</script>
<?php include_once $rootPath."structure/footer/footer.php";?>