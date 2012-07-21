<?PHP
	// fonction permettant de mettre en rouge les champs mal saisis
	function setRed($my_field) 
	{
		return "<span style=\"color:red\">".$my_field."</span>";
	}
	
	// fonction permettant de mettre en rouge les champs mal saisis
	function setGreen($my_field) 
	{
		return "<span style=\"color:green\">".$my_field."</span>";
	}
	
	function formatte_nom($chaine)
	{
		$tab=explode("/",$chaine);
		if(is_array($tab))
		{
			return ucwords($tab[count($tab)-1]);
		}
		else ucwords(chaine);
	}
	
	// Fonction validant les mails
	function validateEmail($emailaddress, $checkdomain = 0)
	{
		global $REMOTE_ADDR;

		// Pattern matching general pour valider la forme de l'email
		$pattern = "^([a-z0-9]+([._-]?[a-z0-9]+)*)+\@([a-z0-9]+([.-]?[a-z0-9]+)*\.[a-z]{2,3})$";
	
		if(eregi($pattern, trim($emailaddress), $mailparts))
		{
			if($checkdomain)
			{
				if(checkdnsrr($mailparts[3], "MX"))
					return true;
				else
				{
				if(checkdnsrr($mailparts[3], "ANY"))
					return true;
				else
					return false;
				}
			}
			return true;
		}
		else return false;
	}
	
	/**
	* @fn clean_http_request()
	* @brief function pour éviter l'injection de code dans les supers globales
	*/
	function clean_http_request()
	{
		if(isset($_REQUEST)) foreach($_REQUEST as $key => $value) $_REQUEST[$key] = strip_tags($value);		
		if(isset($_POST)) foreach($_POST as $key => $value) $_POST[$key] = strip_tags($value);
		if(isset($_GET)) foreach($_GET as $key => $value) $_GET[$key] = strip_tags($value);	
	}
	
	function free_http_request()
	{
		if(isset($_REQUEST)) foreach($_REQUEST as $key => $value) $_REQUEST[$key] = stripslashes($value);		
		if(isset($_POST)) foreach($_POST as $key => $value) $_POST[$key] = stripslashes($value);
		if(isset($_GET)) foreach($_GET as $key => $value) $_GET[$key] = stripslashes($value);	
	}
?>