<?php

class SiteMapController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->controller = $this->getRequest()->getControllerName();
        $this->view->action = $this->getRequest()->getActionName();
    }

    public function indexAction()
    {
        // action body
    }


}

