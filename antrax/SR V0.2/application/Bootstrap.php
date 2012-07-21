<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	protected function _initPlaceholders()
    {
        $this->bootstrap('View');
        $view = $this->getResource('View');

        // Pr�cise le titre initial et le s�parateur:
        $view->headTitle("Soule Royale")->setSeparator(' - ');
    }
	
	protected function _initView()
	{
		// Cr�ation et param�trage de la vue
		$view = new Zend_View();
		$view->setEncoding('utf-8');
		$view->headMeta()->setHttpEquiv('Content-type', 'text/html; charset=utf-8');
		
		// Activation de jQuery
		$view->addHelperPath('ZendX/JQuery/View/Helper/', 'ZendX_JQuery_View_Helper');
		$jquery = $view->jQuery();
		$jquery->enable();

		// Si vous ne souhaitez pas utiliser google
		// on peut demander r ZendX _ JQuery de travailler
		// avec une bibliothcque locale
		//$rmode = ZendX _ JQuery::RENDER _ JQUERY _ ON _ LOAD
		// | ZendX _ JQuery::RENDER _ SOURCES;
		//$jquery->setRenderMode($rmode);
		//$jquery->addJavascriptFile('../scripts/jquery-1.3.2.min.js');
		
		// Enregistrement de l�objet $view comme vue principale
		$viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
		$viewRenderer->setView($view);
		Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
		return $view;
	}


}

