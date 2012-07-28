<?php
    require_once "Moteur/Match/MatchStd.php";
    require_once "SRCustom/Exception.php";

class Simulateur extends Match
{
    const MASK_INITIAL = "0-3\-";

     /**
     * Constructeur
     * @param [int] $a_positionSoule, position de la soule
     * @param [int] $a_numeroTour, numéro du tour en cours
     * @param [int] $a_numeroJoueurActif, numéro du joueur actif
     * @return [Simulateur] renvoi $this
     */
    public function __construct($a_positionSoule, $a_numeroTour, $a_numeroJoueurActif)
    {
        parent::__construct();

        $this->positionSoule = $a_positionSoule;
        $this->numeroTourEnCours = $a_numeroTour;
        $this->numeroJoueurActif = $a_numeroJoueurActif;

        $this->maskInitial = self::MASK_INITIAL;

        return $this;
    }

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
     * Méthode privée chargeant les initiales des souleurs
     * @param [string] $a_init, chaine contenant les positions des joueurs de l'équipe séparées par un ";"
     * @param [int] $a_indiceEquipe, indice de l'equipe dans le tableau des equipes (0 ou 1)
     */
    private function TraiteInit($a_init, $a_indiceEquipe=0)
    {
        //echo "ici";

        //Validation de l'initiale
        $this->CheckInit($a_init);

        //Découpage de la chaine contenant les initiales
        $tmp = $this->DecoupeChaine($a_init);

        //$num est la cléf d'accès aux joueurs dans le tableau; le numéro du souleur
        for($i=0,$num=1;$i < $this->_nbJoueurs; $i++,$num++)
        {
            $this->_equipe[$a_indiceEquipe][$num]->position = $tmp[$i];
        }
    }

};
?>