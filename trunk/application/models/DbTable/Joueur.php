<?php

class Application_Model_DbTable_Joueur extends Zend_Db_Table_Abstract
{
	protected $_name = 'joueur';
	
	public function obtenirJoueur($id)
	{
		$id = (int)$id;
		$row = $this->fetchRow('id_joueur = ' . $id);
		if (!$row) throw new Exception("Impossible de trouver l'enregistrement $id");
		
		return $row->toArray();
	}
	
	public function ajouterJoueur($mail, $mot_passe)
	{
		$data = array(
		'mail' => $mail,
		'mot_passe' => $mot_passe,
		);
		$this->insert($data);
	}
	
	public function modifierJoueur($id_joueur, $mail, $mot_passe)
	{
		$data = array(
		'mail' => $mail,
		'mot_passe' => $mot_passe,);
		$this->update($data, 'id_joueur = '. (int)$id_joueur);
	}

	public function supprimerJoueur($id_joueur)
	{
		$this->delete('id_joueur =' . (int)$id_joueur);
	}
}