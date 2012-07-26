<?php
require_once "/SRCustom/Exception.php";

/**
* Class definissant le concept d'élement
* @class Element
* @category Moteur
* @author Cyril Cophignon
*/
class Element
{
	
	/**
	* Position de l'élement
	* @var integer
	*/
	private $_position;

	/** 
	* Accesseur privé en lecture sur la position
	* @return [int] la position
	*/
	private function lire_position()
	{
		return $this->_position;
	}

	/** 
	* Accesseur privé en écriture sur la position. En cas d'exception, la position est remise à null
	* @param [int] $a_val, une position
	* @return [int, null] la position ou null en cas d'exception
	* @throws Soule_Format_Exception
	*/
	private function ecrire_position($a_val) 
	{

        require_once "SRCustom/Validator/Int.php";
		if(Valide_Int::isInt($a_val))
		{
			$this->_position = $a_val;
		}
		else
		{
			$this->_position = null; //remise à null de la position
			throw new Soule_Format_Exception("Le format invalide, un int est attendu.");
		}
		return $this->lire_position();
	}

	/** 
	* Accesseur public en lecture sur les champs privés
	* @param [string] $a_name, le nom du champ à lire
	* @return [object, null] la valeur du champ ou null en cas d'exception
	* @throws Soule_Indefine_Field_Exception
	*/
	public function __get($a_name) 
	{
		switch($a_name)
		{
			case "position":
				return $this->lire_position();
			default:
				throw new Soule_Indefine_Field_Exception("La propriete \"$a_name\" est indefinie.");
		}
	}

	/** 
	* Accesseur public en écriture sur les champs
	* attention en cas de chainage d'affectation, c'est la dernière operande qui est propagée
	* @param [string] $a_name, le nom du champ à modifier
	* @param [object] $a_val, la valeur à ecrire dans le champ
	* @return [object, null] la valeur du champ ou null en cas d'exception
	* @example $elm->position = 3
	* @throws Soule_Indefine_Field_Exception
	*/
	public function __set($a_name, $a_val) 
	{
		switch($a_name)
		{
			case "position":
				return $this->ecrire_position($a_val);
			default:
				throw new Soule_Indefine_Field_Exception("La propriété \"$a_name\" est indefinie.");
		}
	}

	/** 
	* Méthode declenchée lors de l'appelle d'une fonction n'existant pas
	* @return null
	* @throws Soule_Indefine_Field_Exception
	*/
	public function __call($a_name, $a_val="")
	{
		throw new Soule_Indefine_Methode_Exception("La méthode \"$a_name\" est inexistante.");
	}

	/** 
	* Méthode ajoutant 1 à position
	* @return [int] la position
	*/	
	public function avance()
	{
		return $this->_position ++;
	}

	/** 
	* Méthode retirant 1 à position
	* @return [int] la position
	*/	
	public function recule()
	{
		return $this->_position --;
	}

	/** 
	* Constructeur paramétre, ou par defaut avec une position à 0
	* @param [int] $a_val une position
	* @return [Element, null] renvoi l'objet cree ou null en cas d'exception
	* @throws Soule_Format_Exception
	*/		
	public function __construct($a_val=0) 
	{ 
		$this->ecrire_position($a_val); 
		return $this;
	}
};

class Soule extends Element { };
?>