<?php 
include_once "main-parametres.php"; //inclusion des paramétres principaux

//Définition des repertoires clés
$rootPath=$this->baseUrl();
$image=$this->baseUrl()."/images/"; //repertoire images
$css=$this->baseUrl()."/css/";		//repertoire css
$js=$this->baseUrl()."/js/";		//repertoire javascript

//Balise head
/*$this->headTitle()->setSeparator(' - ')
				->appendTitle($this->siteName())
				->appendTitle($this->base_title);*/

$this->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8')
				->appendHttpEquiv('Content-Language', 'fr-FR')
				->appendHttpEquiv('expires', 'Wed, 26 Feb 1997 08:21:57 GMT')
                ->appendHttpEquiv('pragma', 'no-cache')
                ->appendHttpEquiv('Cache-Control', 'no-cache')
				->appendName('keywords', $meta)
				
				->appendName('google-site-verification', '56cytVXDw0y8KZGKOfFXMyzLYGp6Y7Ooz-ffGeHENjQ');

//Integration des CSS
$this->headLink()->appendStylesheet($css.'custom-theme/jquery-ui-1.8.18.custom.css')
				->appendStylesheet($css.'Main.css')			
				->appendStylesheet($css.'Menu-Horizontal.css')
				->appendStylesheet($css.'li-scroll.1.0.css');

//Intergration des JavaScripts
$this->headScript()->appendFile($js.'libs.js');

//Paramètrages JQuery
$this->jQuery()	->setVersion('1.7.1')
				->setUiVersion('1.8.18')->uiEnable()
				//->addJavascriptFile($this->baseUrl().$js.'query-1.7.1.min.js')
				->addJavascriptFile($js.'jquery.li-scroll.1.0.js')
				->addJavascriptFile($js.'menu.js');
				//->addJavascriptFile($this->baseUrl().$js.'jquery-ui-1.8.18.custom.min.js');
				//->setLocalPath($this->baseUrl().$js.'query-1.7.1.min.js')
?>