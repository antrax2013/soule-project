<?php
//phpunit --include-path "C:\Documents and Settings\cyril.cophignon\Mes documents\PersOnnel et confidentiel\perso\package\soule;C:\Documents and Settings\cyril.cophignon\Mes documents\PersOnnel et confidentiel\perso\package\soule\library" --verbose --coverage-html "C:\Documents and Settings\cyril.cophignon\Mes documents\PersOnnel et confidentiel\perso\package\soule\tests\rapport" .
require_once 'Library/Interfaces_Library/Validators/UnsignedInt.php';
//require_once 'test.php';

class UnsingedIntTest extends PHPUnit_Framework_TestCase
{
	public function testInt_IntNegatif()
	{
		$this->assertFalse(Valide_UnsignedInt::isUInt(-12));
	}
	
	public function testInt_Alpha_ValeurNumerique_Negatif()
	{
		$this->assertFalse(Valide_UnsignedInt::isUInt("-1"));
	}
}
?>