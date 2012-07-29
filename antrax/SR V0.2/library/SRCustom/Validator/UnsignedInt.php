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
        else
        {
            return false;
        }
	}

    /**
     * Méthode static public vérifiant que le paramétre est un entier positif bornée entre min et max
     * @param [string, int] $a_val, la donnée à vérifier
     * @param [uint] $a_min, valeur à laquelle $a_val ne doit pas être inférieure
     * @param [uint] $a_max, valeur à laquelle $a_val ne doit pas être supérieure
     * @return [bool] renvoie vrai si le paramétre est un entier faux sinon
     * @throws Exception see preg_match
     */
    public static function isMinMaxUInt($a_val, $a_min, $a_max)
    {
        if(!Valide_UnsignedInt::isUInt($a_val) || $a_val < $a_min || $a_val > $a_max)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
};
?>