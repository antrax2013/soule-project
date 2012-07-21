<?php
class Zend_View_Helper_HttpName
{
    function httpName($a_httpAll=true)
    {
		$chaine = "soule.royale.free.fr";
        		
		return ($a_httpAll===true)?  "http://".$chaine :$chaine;
    }	
}
