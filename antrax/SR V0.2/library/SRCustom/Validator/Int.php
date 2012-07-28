<?php
/**
* Fichier regroupant les validateurs de données
* @author Cyril Cophignon
*/

/**
 * @see Zend_Validate_Int
 */
require_once "Zend/Validate/Int.php";

/**
 * @see Exception
 */
require_once "SRCustom/Exception.php";

/**
* Class vérifiant des données sont des ints
* @class Valide_Int
* @category Validator
* @author Cyril Cophignon
*/
class Valide_Int extends Zend_Validate_Int 
{ 
	/** 
	* Méthode static public vérifiant que le paramétre est un entier
	* @param [string, int] $a_val, la donnée à vérifier
	* @return [bool] renvoie vrai si le paramétre est un entier faux sinon
	* @throws Exception see preg_match
	*/
	public static function isInt($a_val)
	{
		if(func_num_args() != 1) //Cas particulier exemple Valide_Int(3,2) => transformé en 2 paramétres entier ce qui entrainerait une validation ou pas de paramétre
		{
			return false;
		}
		if(is_bool($a_val)) 
		{
			return false; //Gestion des booleans
		}

		$retour = preg_match("/^[\-]?[0-9]{1,}$/", $a_val);

		if($retour === 0) 
		{
			return false;
		}
		return true;
	}
};
?>