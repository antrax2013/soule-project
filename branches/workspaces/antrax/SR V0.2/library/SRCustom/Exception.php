<?php
/**
* Fichier regroupant les surcharges des exceptions Zend pour conserver le déouplage des classes avec le zend framework
* @author Cyril Cophignon
*/

/**
 * @see Zend_Exception
 */
require_once "Zend/Exception.php";

class Std_Unknown_Exception extends Zend_Exception { }
class Std_Format_Exception extends Zend_Exception { }

class Soule_Exception extends Zend_Exception { } 

class Soule_Format_Exception extends Soule_Exception { }
class Soule_Indefine_Methode_Exception extends Soule_Exception { }
class Soule_Indefine_Field_Exception extends Soule_Exception { }

class Soule_Moteur_Exception extends Soule_Exception { }
class Soule_Moteur_Iternal_Exception extends Soule_Moteur_Exception { }

class Souleur_Internal_Exception extends Soule_Moteur_Iternal_Exception { }
?>