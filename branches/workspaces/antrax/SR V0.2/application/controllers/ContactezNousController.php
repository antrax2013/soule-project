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
            $this->postForm($form);
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

    private function postForm(&$form)
    {
        //Récupération des données du formulaire
        $formData = $this->getRequest()->getPost();

        $message ="";

        //Vérification des validations
        if ($form->isValid($formData))
        {
            //Paramétrage du mail
            $mail = new Zend_Mail();
            $mail->setFrom('soule.royale@free.fr', $form->getValue('nom')." via Soule Royale");
            $mail->addTo('cyrilcophignon@yahoo.fr;philippe.debroas@free.fr');
            $mail->setSubject($form->getValue('sujet'));

            $RC = "<br />";

            //definition du cors du message
            $message= "Bonjour,".$RC."Vous venez de recevoir un mail de:".$RC;
            $message.="Nom: ".$form->getValue('nom').$RC;
            $message.="Equipe: ".$form->getValue('equipe').$RC;
            $message.="Message:".$RC.$form->getValue('message');
            $mail->setBodyHtml($message);

            $mail->send();

            $message = array('sucess' => 'L\'envoi du mail est effectuée.');

            $this->view->messages = $this->getHelper('FlashMessenger')->getMessages();
            $this->_helper->redirector('index');

        }
        else
        {
            $message = array('error' => 'Une erreur est survenue lors de l\'envoi du mail.');

            $form->populate($formData);
        }
        if(!empty($message))
        {
            $this->_helper->FlashMessenger($message);
            $this->view->messages = $this->getHelper('FlashMessenger')->getMessages();
        }
    }

}

