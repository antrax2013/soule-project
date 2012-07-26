<?php
require_once "SRCustom/Exception.php";

/**
* Class gérant le concepte de joueur de soule, herite de Element
* @see Element
* @class Souleur
* @category Moteur
* @author Cyril Cophignon
*/
class Souleur extends Element
{
	/**
	* Nombre de points de vie du souleur
	* @var integer
	*/
	private $_ptVie;

	/** 
	* Accesseur privé en lecture le nombre de points de vie
	* @return [int] la position
	*/
	private function lire_ptVie() 
	{
		return $this->_ptVie;
	}

	/** 
	* Accesseur privé en écriture sur le nombre de points de vie, remis à null en cas d'exception
	* @param [int] $a_val, une nombre de points de vie
	* @return [int, null] le nombre de points de vie ou null en cas d'exception
	* @throws Soule_Format_Exception, Souleur_Internal_Exception
	*/
	private function ecrire_ptVie($a_val) 
	{
		require_once "SRCustom/Validator/UnsignedInt.php";
		if(Valide_UnsignedInt::isUInt($a_val))
		{
			$this->_ptVie = $a_val;
		}
		else
		{
			$this->_ptVie = null; //remise a� null
			if($a_val < 1) 
			{ 
				throw new Souleur_Internal_Exception("Le nombre de point est inferieur a� 1");
            }
			else
			{
				throw new Soule_Format_Exception("Le format invalide, un int est attendu.");
			}
		}
		return $this->lire_ptVie();
	}
	
	/** 
	* Accesseur public en lecture sur les champs
	* @param [string] $a_name, le nom du champ à lire
	* @return [object, null] la valeur du champ ou null en cas d'exception
	* @throws Soule_Indefine_Field_Exception
	*/
	public function __get($a_name) 
	{
		switch($a_name)
		{
			case "ptVie": 
				return $this->lire_ptVie();
			default: 
				return parent::__get($a_name);
		} 
	}
	
	/** 
	* Accesseur public en écriture sur les champs
	* @param [string] $a_name, le nom du champ à modifier
	* @param [object] $a_val, la valeur à écrire dans le champ
	* @return [object, null] la valeur du champ ou null en cas d'exception
	* @example $souleur->ptVie = 3
	* @throws Soule_Indefine_Field_Exception, Soule_Format_Exception, Souleur_Internal_Exception
	*/
	public function __set($a_name, $a_val) 
	{
		switch($a_name)
		{
			case "ptVie": 
				return $this->ecrire_ptVie($a_val);
			default: 
				return parent::__set($a_name, $a_val);
		}
	} 
	
	/** 
	* Méthode declenchée lors de l'appelle d'une fonction n'existant pas
	* @return null
	* @throws Soule_Indefine_Field_Exception
	*/
	public function __call($a_name, $a_val="")
	{ 
		throw new Soule_Indefine_Methode_Exception("La Méthode \"$a_name\" est inexistante.");
    }
	
	/** 
	* Constructeur parametre, par defaut avec une position à 0 et 4 points de vie
	* @param [souleur, null] renvoi l'objet créé ou null en cas d'exception
	* @throws Soule_Indefine_Field_Exception, Soule_Format_Exception, Souleur_Internal_Exception
	*/		
	public function __construct($a_position=0, $a_ptVie=4) 
	{ 
		parent::__construct($a_position); 
		$this->ecrire_ptVie($a_ptVie);
		return $this; 
	}
	
	/** 
	* Méthode diminuant de 1 le nombre de point de vie d'un souleur
	*/		
	public function PerdPtVie() 
	{ 
		return $this->_ptVie--; 
	}
	 
	 /**
	 * Méthode pour savoir si le joueur est Ko
	 * @return [bool] renvoie vrai si le souleur est ko, faux sinon
	 */
	public function Ko() 
	{
		return $this->lire_ptVie() <= 0;
	}
	
	/**
	* Méthode public gérant le fait qu'un souleur en tappe un autre
	* @param [&Souleur] le souleur qui va être frappé, passé par reference
	* @return [bool] renvoie vrai si le souleur objet de la méthode est touché, false sinon
	*/
	public function Frappe(Souleur &$a_frappe)
	{
		if($this->position != $a_frappe->position) 
		{
			return false;
		}
		$a_frappe->PerdPtVie();
		return true;
	}

	/**
	* Méthode public d'impression sur la sortie standard
	* @deprecated à n'utiliser qu'en debug
	* @return [string] une chaine position/ptVie
	*/
	public function __toString() 
	{
		return $this->position."/".$this->ptVie;
	}
};
?>