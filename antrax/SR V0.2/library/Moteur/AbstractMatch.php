<?php
require_once "SRCustom/Exception.php";

abstract class AMatch
{
    /**
     * Nombre de tours maximum du match
     * @var unsigned integer
     */
    protected $_nbTourMax;

    /**
     * Nombre de touchdown a inscrire pour gagner le match
     * @var unsigned integer
     */
	protected $_nbTouchDown;

    /**
     * Le numéro du tour en cours
     * @var unsigned integer
     */
	protected $_numeroTourEnCours;

    /**
     * Le nombre de souleurs par équipe
     * @var unsigned integer
     */
	protected $_nbJoueurs;

    /**
     * Tableau contenant les équipes
     * @var Equipe[]
     */
	protected $_equipe = array(); //tableau qui va contenir les équipes

    /**
     * La soule
     * @var Soule
     */
    protected $_soule;

    /**
     * Indice du joueur actif dans le tableau des équipes
     * @var int
     */
    protected $_joueurActif;

    /**
     * nombre de cases par demi-terrain, 3 pour un terrain standard + la case centrale
     * @var unsigned int
     */
	protected $_longeurTerrain;

    /**
     * Tableau des scores
     * @var unsigned int
     */
    protected $_score = array(0,0);


	protected $_buteur; /** @todo à voir ce qu'on en fait */

    /**
     * Séparateur des chaines action et initiale
     * @const char
     */
	const SEPARATEUR = ";"; //

    /**
     * Masque de validation des initiales pour expression régulière
     * @const string
     */
    protected $maskInitial;

    /**
     * Masque de validation des actions pour expression régulière
     * @const string
     */
    protected $maskAction;
	
	/** 
	* Constructeur par défaut
	*/		
	abstract public function __construct(); 
	
	/**
	* Méthode public appliquant les actions des deux équipes
	* @param [string] $a_action1, chaine contenant les positions des joueurs de l'équipe 1 séparées par un ";"
	* @param [string] $a_action2, chaine contenant les positions des joueurs de l'équipe 2 séparées par un ";"
	* @return [bool] renvoie Vrai si le match est termine, false sinon
	*/
	abstract public function JoueTour($a_action1, $a_action2);
	
	/**
	* Méthode protégée verifiant que l'intiale passée en paramétre est correctement formattée
	* @param [string] $a_init, chaine contenant les positions initiales des joueurs de l'équipe séparées par un ";"
	* @return [bool] renvoie Vrai si l'initiale est bien formattée false sinon
	*/
	abstract protected function CheckInit($a_init);
	
	/**
	* Méthode protégée verifiant que l'action passée en paramétre est correctement formattée
	* @param [string] $a_init, chaine contenant les positions initiales des joueurs de l'équipe séparées par un ";"
	* @return [bool] renvoie Vrai si l'initiale est bien formattée false sinon
	*/
	abstract protected function CheckAction($a_action);
	
	/**
	* Méthode protegée chargeant les initiales des souleurs
	* @param [string] $a_init1, chaine contenant les positions des joueurs de l'équipe 1 séparées par un ";"
	* @param [string] $a_init2, chaine contenant les positions des joueurs de l'équipe 2 séparées par un ";"
	*/
	public function Init($a_init1, $a_init2)
	{
		//echo get_class($this)." ".$this->maskInitial;
        $this->_numeroTourEnCours++;

		//Traitement des initiales
		$this->TraiteInit($a_init1, 0);
        $this->TraiteInit($a_init2, 1);
	}
	
	/**
	* Méthode protegée découpant les chaines selon le séparateur
	* @param [string] $a_chaine, chaine à découper
	* @return [string*] renvoi un tableau de chaine contenant les fragments
	*/
	protected function DecoupeChaine($a_chaine) 
	{ 
		return preg_split("/[".self::SEPARATEUR."]+/", $a_chaine);
	}
	
	/**
	* Méthode protégée chargeant les initiales des souleurs
	* @param [string] $a_init, chaine contenant les positions des joueurs de l'équipe séparées par un ";"
	* @param [int] $a_indiceEquipe, indice de l'equipe dans le tableau des equipes (0 ou 1)
	*/
	protected function TraiteInit($a_init, $a_indiceEquipe=0)
	{
        //Validation de l'initiale
		$this->CheckInit($a_init);
		
		//Découpage de la chaine contenant les initiales
		$tmp = $this->DecoupeChaine($a_init); 
				
		//si le numero de l'équipe est 1 les positions des joueurs au moment des initiales sont négatives
		if($a_indiceEquipe == 0)
		{
			$coef = -1;
		}
		else
		{
			$coef = 1;
		}
		
		//$num est la cléf d'accès aux joueurs dans le tableau; le numéro du souleur
		for($i=0,$num=1;$i < $this->_nbJoueurs; $i++,$num++) 
		{	
			$this->_equipe[$a_indiceEquipe][$num]->position = $coef*$tmp[$i];
		}
	}	
	
	/**
	* Méthode public appliquant l'action du joueur et gérant ses conséquences
	* @param [string] $a_action, caractère action 0, +, -, ou un numéro de joueur sous forme hexa
	* @param [int] $a_indiceSouleur, numero du joueur
	*/
	protected function TraiteAction($a_action, $a_indiceSouleur)
	{
		$joueur = $this->_equipe[$this->_joueurActif][$a_indiceSouleur]; //Pour simplifier l'écriture
		
		//Si le souleur n'est pas Ko
		if($joueur->Ko()) 
		{
			return false;
		}
		
		switch($a_action) //En mode standard pas de remplacement
		{
			//case "X" -> non necessaire car traité au dessus => Ko ?
			case "0": 
				break; //Attente
			case "+": 
				if($this->GestionActionAvancer($joueur))
				{
					$this->GestionDeplacementSoule($joueur);
				}
			break;
			case "-": //En mode standard on ne peut pas jouer la soule en reculant 
				$this->GestionActionReculer($joueur);
			break;
			default:
				$val = hexdec($a_action); //A=10, B=11
				$joueur->Frappe($this->_equipe[$this->JoueurPassif()][$val]);
		}
	}
	
	/**
	* Méthode gérant le déplacement de la soule si besoin
	* @param [souleur] souleur ayant agit
	* @return [bool] renvoie vrai si la soule a avancé faux sinon
	*/
	function GestionDeplacementSoule($souleur)
	{
		if($this->_soule->position == $souleur->position)
		{
			if($this->_joueurActif == 0) 
			{
				$this->_soule->avance();
			}
			else 
			{
				$this->_soule->recule();
			}
			return true;
		}
		return false;
	}
	
	/**
	* Méthode gérant l'action avancer
	* @param [&Souleur] souleur objet de l'action, passé par adresse
	* @return [bool] renvoie vrai si le souleur a avancé faux sinon
	*/
	private function GestionActionAvancer(&$souleur)
	{
		if($this->_joueurActif == 0) 
		{
			if(!$this->ActionAvancer($souleur)) 
			{
				return false;				
			}			
		}
		else
		{ 	
			if (!$this->ActionReculer($souleur)) 
			{
				return false;
			}			
		}		
		return true;		
	}
	
	/**
	* Méthode réalisant l'action avancer si possible
	* @param [&Souleur] souleur objet de l'action, passé par adresse
	* @return [bool] renvoie vrai si le souleur a avancé faux sinon
	*/
	private function ActionAvancer(&$souleur)
	{
		$souleur->avance();
		if(!$this->PositionValide($souleur->position)) 
		{
			$souleur->recule(); //Si la position est invalide on annule le déplacement
			return false;			
		}
		return true;			
	}
	
	/**
	* Méthode réalisant l'action reculer si possible
	* @param [&Souleur] souleur objet de l'action, passé par adresse
	* @return [bool] renvoie vrai si le souleur a reculé faux sinon
	*/
	private function ActionReculer(&$souleur)
	{
		$souleur->recule();
		if(!$this->PositionValide($souleur->position)) 
		{
			$souleur->avance(); //Si la position est invalide on annule le déplacement
			return false;			
		}
		return true;			
	}
	
	/**
	* Méthode gérant l'action reculer
	* @param [&Souleur] souleur objet de l'action, passé par adresse
	* @return [bool] renvoie vrai si le souleur a reculé faux sinon
	*/
	private function GestionActionReculer(&$souleur)
	{
		if($this->_joueurActif == 0) 
		{
			if(!$this->ActionReculer($souleur)) 
			{
				return false;				
			}			
		}
		else
		{ 	
			if (!$this->ActionAvancer($souleur)) 
			{
				return false;
			}			
		}		
		return true;
	}
	
	/**
	* Méthode vérifiant que la position passée en paramétre est valide
	* @return [bool] renvoie vrai si la position est valide, false sinon
	*/
	public function PositionValide($a_postion) 
	{ 
		if(abs($a_postion) <= $this->_longeurTerrain)
		{
			return true;
		}
		else return false;
	}
	
	/**
	* Méthode changeant de joueur actif
	* @return [int] renvoie le joueur actif
	*/
	public function AlterneJoueur() 
	{
		if($this->_joueurActif == 0) 
		{
			$this->_joueurActif = 1;
		}
		else 
		{
			$this->_joueurActif = 0;
		}
		return $this->_joueurActif;
	}
	
	/**
	* Accesseur en lecteur sur le numero du joueur passif
	* @return [int] l'indice de l'équipe passive
	*/
	public function JoueurPassif()
	{
		if($this->_joueurActif == 0)
		{
			return 1;
		}
		else return 0; 
	}
	
	/**
	* Méthode public testant si un tuchdown est inscrit par l'équipe active et incrémentant le compteur de score et buteur
	* @return [bool] renvoie vrai si un tuchdown est inscrit, faux sinon
	*/
	protected function Marque() 
	{ 
		if(abs($this->_soule->position) == $this->_longeurTerrain) 
		{
			$this->_score[$this->_joueurActif]++;
			return true;
		}
		return false;
	} 
	
	/**
	* Méthode public testant l'état du match
	* @return [bool] renvoie vrai si le match est terminé, faux sinon
	*/
	public function MatchTermine()
	{
		if($this->_nbTourMax == $this->_numeroTourEnCours)
		{
			return true;
		}
		if($this->_score[0] == $this->_nbTouchDown)
		{
			return true;
		} 
		if($this->_score[1] == $this->_nbTouchDown)
		{
			return true;
		}
		else return false;
	}
	
	/** 
	* Accesseur public en lecture sur les champs privés
	* @param [string] $a_name, le nom du champ à lire
	* @return [object] la valeur du champ
	* @throws Soule_Indefine_Field_Exception
	*/
	public function __get($a_name) 
	{
		switch($a_name)
		{
			case "numeroTourEnCours":
				return $this->_numeroTourEnCours;
            case "numeroJoueurActif":
                return $this->_joueurActif+1;
			default:
                throw new Soule_Indefine_Field_Exception("La propriete \"$a_name\" est indefinie.");
		}
	}

    /**
     * Accesseur en écriture protégé sur le champ _numeroTourEnCours
     * @param [int] $a_val, la valeur à écrire dans le champ _nbTourMax
     * @throws Soule_Format_Exception
     * @return le numéro du tour en cours ou null en cas d'exception
     */
    protected function numeroTourEnCours ($a_val)
    {
        require_once "SRCustom/Validator/UnsignedInt.php";
        if(Valide_UnsignedInt::isUInt($a_val))
        {
            $this->_numeroTourEnCours = $a_val;
        }
        else
        {
            $this->_numeroTourEnCours = null; //remise à null
            throw new Soule_Format_Exception("Le format invalide, un int non signé est attendu.");
        }
        return $this->_numeroTourEnCours;
    }

    /**
     * Accesseur en écriture protégé sur le champ _position de la soule
     * @param [int] $a_val, la valeur à écrire dans le champ
     * @throws Soule_Format_Exception, Soule_Moteur_Iternal_Exception
     * @return la position de la soule affectée ou null en cas d'exception
     */
    protected function positionSoule ($a_val)
    {
        $this->_soule->position = $a_val;
        if(!$this->PositionValide($a_val) )
        {
            try
            {
                $this->_soule->position = null; //remise à null de la position
            }
            catch (Soule_Format_Exception $exception) { } //rien à faire de particulier
            throw new Soule_Moteur_Iternal_Exception("La position de la soule n'est pas valide.");

        }
        return $this->_soule->position;
    }

    /**
     * Accesseur en écriture protégé sur le champ _position de la soule
     * @param [int] $a_val, la valeur à écrire dans le champ
     * @throws Soule_Format_Exception, Soule_Moteur_Iternal_Exception
     * @return le numéro du joueur actif affecté ou null en cas d'exception
     */
    protected function numeroJoueurActif ($a_val)
    {
        require_once "SRCustom/Validator/UnsignedInt.php";
        if(Valide_UnsignedInt::isUInt($a_val))
        {
            if($a_val <= count($this->_equipe) && $a_val!=0)
            {
                $this->_joueurActif = $a_val-1; //le numéro du joueur est le numero de son indice dans le tableau +1
            }
            else
            {
                throw new Soule_Moteur_Iternal_Exception("Numéro de joueur actif invalide (Min:1 Max:". count($this->_equipe).").");
            }
        }
        else
        {
            $this->_nbTourMax = null; //remise à null
            throw new Soule_Format_Exception("Le format invalide, un int non signé est attendu.");
        }
        return $this->_joueurActif;
    }


    /**
	* Méthode publique d'impression sur la sortie standard
	* @deprecated à n'utiliser qu'en debug
	*/
	public function __toString()
	{
		$chaine = "Equipe 1:<br>".$this->_equipe[0];
		$chaine .= "<br><br>Equipe 2:<br>".$this->_equipe[1];
		return $chaine;
	}
};
?>