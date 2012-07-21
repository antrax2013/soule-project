<?php

class ContactezNousController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Application_Form_ContactezNous();		
		
		//$form->addPrefixPath('SRCustom_Form_Decorator', 'SRCustom/Form/Decorator', 'decorator');
		//$form->addElementPrefixPath('SRCustom_Form_Decorator', 'SRCustom/Form/Decorator', 'decorator');
		
		// on réinisialise les décorateurs
        //$form->clearDecorators();
		
		//$form->setDecorators(array('SRDecorator'));		
		//$form->envoyer->setLabel('Envoyer');
		$this->view->form = $form;
		
		//Si une requete http de type post est envoyée
		if ($this->getRequest()->isPost()) 
		{
			//Récupération des données du formulaire
			$formData = $this->getRequest()->getPost();
			
			//Vérification des validations
			if ($form->isValid($formData)) 
			{
				$mail = new Zend_Mail();
				
				$mail->setFrom('soule.royale@free.fr', $form->getValue('nom')." via Soule Royale");
				$mail->addTo('cyrilcophignon@yahoo.fr;philippe.debroas@free.fr');
				$mail->setSubject($form->getValue('sujet'));
				
				$RC = "<br />";
				
				$message= "Bonjour,".$RC."Vous venez de recevoir un mail de:".$RC;
				$message.="Nom: ".$a_valeur["nom"].$RC;
				$message.="Equipe: ".$a_valeur["equipe"].$RC;
				$message.="Message:".$RC.$form->getValue('message');
				
				
				$mail->setBodyHtml($message);
				$mail->send();
				
				$this->_helper->redirector('index');

			} 
			else 
			{
				$form->populate($formData);
			}
		}
    }

	public function validateformAction()
    {
		$this->_helper->viewRenderer->setNoRender();
        $this->_helper->getHelper('layout')->disableLayout();

        $f = new Application_Form_ContactezNous();
        $f->isValid($this->_getAllParams());
        $json = $f->getMessages();
        header('Content-type: application/json');
        echo Zend_Json::encode($json);
    }

}

