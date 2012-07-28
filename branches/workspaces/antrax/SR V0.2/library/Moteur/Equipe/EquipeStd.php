<?php
require_once "Moteur/AbstractEquipe.php";

class Equipe extends AEquipe
{
	/** 
	* Contrcuteur
	* @return [Equipe] renvoie this
	*/		
	public function __construct() 
	{ 
		for ($i=1; $i<= 11; $i++) 
		{
			$this->offsetSet($i, new Souleur()); 
		}
		return $this;
	}	
};
?>