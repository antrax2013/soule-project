<?php
abstract class AEquipe implements arrayaccess 
{
	/**
	* Field $_Liste.
	* tableau qui va contenir les souleurs
	*/
	private $_Liste = array();
	
	/** 
	* Constructeur 
	* @return [object] return this
	*/		
	abstract public function __construct();
	
	/**
	* Accesseur public en ecriture à un élément du tableau
	* @param [int, string] $a_key, clé à modifier
	* @param [object] $a_value, la valeur à écrire dans le champ
	* @retrun [object] renvoie la valeur ecrite
	*/
	public function offsetSet($a_key, $a_value) 
	{
        if (is_null($a_key)) 
		{
			$this->_Liste[] = $a_value;
			$a_key = count($this->_Liste)-1;
		}
        else 
		{
			$this->_Liste[$a_key] = $a_value;
		}
		return $this->_Liste[$a_key];
    }
	
	/**
	* Accesseur public en lecture
	* @param [int, string] $a_key, clé à lire
	* @retrun [object, null] renvoie la valeur de la clé ou null
	*/
	public function offsetGet($a_key) 
	{
        if(isset($this->_Liste[$a_key])) 
		{
			return $this->_Liste[$a_key];
		}
		else return null;
    }
    
	/**
	* Méthode public verifiant l'exsitance d'une clé dans la liste
	* @param [int, string] $a_key, clé à modifier
	* @retrun [bool] true ou false
	*/
	public function offsetExists($a_key) 
	{
		return isset($this->_Liste[$a_key]);
	}
    
	/**
	* Méthode public détruisant le contenu de la clé
	* @param [int, string] $a_key, clé à supprimer
	* @retrun [bool] true ou false
	*/
	public function offsetUnset($a_key) 
	{ 
		unset($this->_Liste[$a_key]);  
		return !$this->offsetExists($a_key);
	}

	/**
	* Méthode public d'impression sur la sortie standard
	* @deprecated à n'utiliser qu'en debug
	* @return [string] une chaine [num du souleur]->position/ptVie<br />
	*/
	public function __toString() 
	{
		$chaine = "";
		$i=1;
		foreach($this->_Liste as $elmt) 
		{
			$chaine.="[".($i++)."]->".$elmt."<br />";
		}
		return $chaine;
	}

};
?>