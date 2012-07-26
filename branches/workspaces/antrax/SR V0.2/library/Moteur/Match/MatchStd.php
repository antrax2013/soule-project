<?php
require_once "Moteur/AbstractMatch.php";
require_once "SRCustom/Exception.php";

class Match extends AMatch
{
	/** 
	* Constructeur
	* @return [Match] renvoi $this
	*/		
	public function __construct() 
	{ 
		$this->_soule = new Soule();
		$this->_nbTourMax = 7;
		$this->_longeurTerrain = 3;
		$this->_nbTouchDown = 1;
		$this->_numeroTourEnCours = 0;
		$this->_joueurActif = 0; //En match Standard c'est le joueur 1 qui commence
		$this->_buteur = 0;
		
		$this->_equipe[] = new Equipe();
		$this->_equipe[] = new Equipe();
		
		$this->_nbJoueurs = 11;
		
		return $this;
	}
	
	/**
	* Méthode public appliquant les actions des deux équipes
	* @param [string] $a_action1, chaine contenant les positions des joueurs de l'équipe 1 séparées par un ";"
	* @param [string] $a_action2, chaine contenant les positions des joueurs de l'équipe 2 séparées par un ";"
	* @return [bool] renvoie vrai si un tuchdown est marqué faux sinon
	*/
	public function JoueTour($a_action1, $a_action2)
	{
		//Si initiale on déroute vars la méthode de gestion des initiales
		if($this->_numeroTourEnCours == 0) 
		{
			return $this->Init($a_action1, $a_action2);
		}
		
		//Validation des actions
		$this->CheckAction($a_action1);
		$this->CheckAction($a_action2);
		
		$this->_numeroTourEnCours++;
		
		//Découpage de la chaine
		$tmp_action[] = $this->DecoupeChaine($a_action1);
		$tmp_action[] = $this->DecoupeChaine($a_action2);
		
		for($i=0,$num=1; $i < $this->_nbJoueurs; $i++, $num++) //Les clés d'accés aux joueurs sont leurs numéros.
		{
			//Si un tuchdown est marqué on arrete le tour
			$this->TraiteAction($tmp_action[$this->_joueurActif][$i], $num);
			if ($this->Marque()) 
			{
				return $this->GestionMarque($num);
			}
			else $this->AlterneJoueur();
			
			$this->TraiteAction($tmp_action[$this->_joueurActif][$i], $num);
			if ($this->Marque())
			{
				return $this->GestionMarque($num);
			}
		}		
		return false;
	}
	
	/**
	* Méthode public stockant le nom du buteur
	* @param [int] $a_numSouleur, le numéro du buteur
	* @return [bool] renvoie toujours vrai
	*/
	private function GestionMarque($a_numSouleur) 
	{ 
		//$this->AlterneJoueur(); //Il faut réinversé le joueur actif
		$this->_buteur = $a_numSouleur;
		return true;
	}
	
	/**
	* Méthode privée verifiant que l'intiale passée en paramétre est correctement formattée
	* @param [string] $a_init, chaine contenant les positions initiales des joueurs de l'équipe séparées par un ";"
	* @return [bool] renvoie Vrai si l'initiale est bien formattée
	* @throws Soule_Format_Exception
	* @see preg_match
	*/
	protected function CheckInit($a_init) 
	{ 
		$tmp = preg_replace("/[;]/", "", $a_init); //on élimine les ";"
		$tmp = preg_match("/[1-3]{".$this->_nbJoueurs."}/", $tmp);
		if($tmp == 0 || $tmp == false) throw new Soule_Format_Exception("Initiale invalide");
		else return true;
	}
	
	
	/**
	* Méthode protégée verifiant que l'intiale passée en paramétre est correctement formattée
	* @param [string] $a_init, chaine contenant les positions initiales des joueurs de l'équipe séparées par un ";"
	* @return [bool] renvoie Vrai si l'initiale est bien formattée false sinon
	* @throws Soule_Format_Exception
	* @see preg_match
	*/
	protected function CheckAction($a_action) 
	{ 
		$tmp = preg_replace("/[;]/", "", $a_action); //on élimine les ";"
		$tmp = preg_match("/[0-9A-BX+\-]{".$this->_nbJoueurs."}/i", $tmp); //insensible à la casse
		if($tmp == 0 || $tmp == false) throw new Soule_Format_Exception("Action invalide");
		else return true;
	}
	
	/**
	* Méthode publique d'impression sur la sortie standard
	* @todo à améliorer
	* @deprecated à n'utiliser qu'en debug
	*/
	public function __toString()
	{
		//return parent::__toString();
		$chaine= "**************<br>Tour N:".$this->_numeroTourEnCours." ";
		$chaine.= "Joueur Actif:".($this->_joueurActif+1)."<br />";
		
		$ligne_Blessure="<th>Tableau Blessures</th>";
		$ligne_Blessure_Eq1="<td>Equipe 1</td>";
		$ligne_Blessure_Eq2="<td>Equipe 2</td>";
		
		//Dessin du tableau des blessures
		for($i=1;$i<= $this->_nbJoueurs; $i++)
		{
			$ligne_Blessure.="<th>".$i."</th>";
			$ligne_Blessure_Eq1.="<td>".$this->_equipe[0][$i]->ptVie."</td>";
			$ligne_Blessure_Eq2.="<td>".$this->_equipe[1][$i]->ptVie."</td>";
			//$ligne_Blessure_Eq1.="<td>".$this->_equipe[0][$i]->ptVie."/".$this->_equipe[0][$i]->position."</td>";
			//$ligne_Blessure_Eq2.="<td>".$this->_equipe[1][$i]->ptVie."/".$this->_equipe[1][$i]->position."</td>";		
		}
		
		$chaine.="<table border='1'>";
		$chaine.="<tr>".$ligne_Blessure."</tr>";
		$chaine.="<tr style='color:red;'>".$ligne_Blessure_Eq1."</tr>";
		$chaine.="<tr style='color:blue;'>".$ligne_Blessure_Eq2."</tr>";
		$chaine.="</table>";
		
		$ligne="";
		//Dessin du terrain
		if($this->MatchTermine())
		{
			if(empty($this->_buteur)) $ligne.= "<p>Match Termin�</p>";
			else $ligne.= "<p>TuchDown du numero ".$this->_buteur." de l'equipe ".$this->_joueurActif."</p>";
		}
		$ligne.="<br> <table border='1'><tr>";
		$ligneSoule="";
		
		for($j=-3;$j<=3;$j++)
		{
			$ligne .="<th colspan='2'>".$j."</th>";
			if($this->_soule->position == $j) $ligneSoule.="<td style='color:brown;' colspan='2'>S</td>";
			else $ligneSoule.="<td colspan='2'>&nbsp;</td>";
		}
		$ligneSoule.="</tr><tr align='center'>";
		$ligne.="</tr>";
		for($i=1;$i<= $this->_nbJoueurs; $i++)
		{
			$ligne.="<tr align='center'>";
			if($i==7) $ligne.= $ligneSoule;
			for($j=-3;$j<=3;$j++)
			{
				if($this->_equipe[0][$i]->position == $j)
				{
					$tmp = $this->_equipe[0][$i]->Ko() ? "X":$i;
					$ligne.="<td style='color:red;'>".$tmp."</td>";
				}
				else $ligne.="<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				
				if($this->_equipe[1][$i]->position == $j)
				{
					$tmp = $this->_equipe[1][$i]->Ko() ? "X":$i;
					$ligne.="<td style='color:blue;'>".$tmp."</td>";
				}
				else $ligne.="<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
			}
			$ligne.="</tr>";
		}
		$ligne.="</table>";
		return $chaine.$ligne;
	}
}
?>