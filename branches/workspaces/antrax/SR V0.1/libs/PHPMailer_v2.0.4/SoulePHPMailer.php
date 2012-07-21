<?php
require_once 'class.phpmailer.php';

if ( !defined ("SouleRoyalePHPMailer")) define("SouleRoyalePHPMailer",true);

//Classe surchargeant la classe PHPMail pour gérer la temporisation des mails lorsqu'il y a trop de destinataires
class SoulePHPMailer extends PHPMailer
{
	protected $seuil = 50;
	protected $lien =true;
	
	public function __construct($a_seuil=50, $a_lien=true) 
	{
		$this->seuil = $a_seuil; 
		$this->lien = $a_lien;
		//$this->CharSet = "utf-8"; 
		parent::__construct(true); //Creation de mail au format html
	}
	
	//Fonction temporisant l'envoi de mail. Si seuil vaut 0 temporisation automatique
	/**
	* @fn Send()
	* @brief methode permettant la temporisation de l'envoi de mail
	* @param $pause [bool], si vrai temporisation. Si faux temporisation en fonction du seuil. Si le seuil est = 0 => temporisation auto
	* @return [int] 0 non envoyé, 1 envoyé, 2 mis en attente
	*/
	function Send($pause = false)
	{
		/* DESACTIVE CAR INUTILE POUR L'INSTANT */
		/*if(count($this->to)> $this->seuil || count($this->cc)> $this->seuil || count($this->bcc)> $this->seuil || $pause)
		{
			try
			{
				$bool=false;
				$l_piece =""; 
				$l_dest="";
				$type=-1;
				
				//Recuperation de la liste des destinataires par ordre de priorité
				if(!empty($this->bcc))		{foreach($this->bcc as $adrs) 	$l_dest .=$adrs[0].";"; $type = 0;}
				else if(!empty($this->cc)) 	{foreach($this->cc as $adrs) 	$l_dest .=$adrs[0].";"; $type = 2;}				
				else if(!empty($this->to)) 	{foreach($this->to as $adrs) 	$l_dest .=$adrs[0].";"; $type = 1;}
				
				//Recuperation des pieces jointes			
				if(!empty($this->attachment)) {foreach($this->attachment as $piece) $l_piece .=realpath($piece[0]).";"; }
				
				//Mise en attente
				if($type!=-1)
				{
					$l_con = dbConnect('EJ');
					$bool = dbQuery("INSERT INTO inv_mail_attente (adresse_expediteur, liste_adresse_destinataire, message, sujet, type, pieces_jointes)
									VALUES ('".$this->From."','".$l_dest."','".addslashes(htmlentities($this->Body))."', '".addslashes($this->Subject)."', ".$type." , '".$l_piece."')"
									,$l_con);
					dbDisconnect($l_con);
					
					if($bool==false) throw new Exception();
				}
				if ($bool===true) return 2; //en attente
				else
				return intval($bool);				
			}
			catch (Exception $e) 
			{
				$this->AddLien();
				return intval(parent::Send());				
			}
		}
		else 
		{*/
			$this->Body = stripslashes(utf8_decode($this->Body));
			$this->Subject = stripslashes(utf8_decode($this->Subject));
			
			if($this->lien) $this->AddLien();			
			return intval(parent::Send());
		//}
	}
	
	/**
	* @fn AddLien()
	* @brief methode transformant une url en lien cliquable
	*/
	private function AddLien()
	{
		//Verfication de la présence de liens à encapsuler dans un href
		$expression_reg='#http(s)?://[a-zA-Z0-9\._\-\/\?\&\=@]+#';
		
		$this->Body = html_entity_decode($this->Body);
		
		if(preg_match_all($expression_reg, $this->Body, $recherche))
		{
			$position=0;
				
			foreach($recherche[0] as $lien) 
			{
				//$this->Body=str_replace($lien," <a href='".$lien."'>".$lien."</a> ", $this->Body);
				$position = strpos($this->Body, $lien, $position);
				$this->Body=substr_replace($this->Body," <a href='".$lien."'>".$lien."</a> ",  $position, strlen( $lien));
				$position+=strlen($lien)*2;
			}
		}	
	}
	
	/**
	* @fn AddBr()
	* @brief methode transformant un retour charriot en balise <br>
	*/
	public function AddBr(&$chaine)
	{
		//Verfication de la présence de liens à encapsuler dans un href
		$expression_reg="#\\r\\n#";
		$chaineRemplacement="<br />";
		
		//$this->Body = html_entity_decode(chaine);
		
		if(preg_match_all($expression_reg, $chaine, $recherche))
		{
			$position=0;
				
			foreach($recherche[0] as $retourC) 
			{
				$position = strpos($chaine, $retourC, $position);
				$chaine=substr_replace($chaine, $chaineRemplacement, $position, strlen($retourC));
				$position+=strlen($chaineRemplacement);
			}
		}	
	}
}

?>