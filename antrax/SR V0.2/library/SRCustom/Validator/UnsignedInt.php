<?php
/**
 * @see Valide_Int
 */
require_once "SRCustom/Validator/Int.php";


class Valide_UnsignedInt
{ 
	/** 
	* Méthode static public vérifiant que le paramétre est un entier positif
	* @param [string, int] $a_val, la donnée à vérifier
	* @return [bool] renvoie vrai si le paramétre est un entier faux sinon
	* @throws Exception see preg_match
	*/
	public static function isUInt($a_val) 
	{
		if(Valide_Int::isInt($a_val)) 
		{
			return $a_val >= 0;
		}
	}
};
?>