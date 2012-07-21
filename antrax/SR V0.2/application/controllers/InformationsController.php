<?php

class InformationsController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->controller = $this->getRequest()->getControllerName();
        $this->view->action = $this->getRequest()->getActionName();
    }

    public function indexAction()
    {
        reglesAction();
    }

    public function histoireAction()
    {
        // action body
    }

    public function presentationGeneraleAction()
    {
        // action body
    }

    public function reglesAction()
    {
        // action body
    }

    public function presentationLesFormesAction()
    {
        // action body
    }

    public function presentationLeJeuAction()
    {
        // action body
    }


}











