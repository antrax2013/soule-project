<?php
//phpunit --include-path "C:\Documents and Settings\cyril.cophignon\Mes documents\PersOnnel et confidentiel\perso\package\soule;C:\Documents and Settings\cyril.cophignon\Mes documents\PersOnnel et confidentiel\perso\package\soule\library" --verbose --coverage-html "C:\Documents and Settings\cyril.cophignon\Mes documents\PersOnnel et confidentiel\perso\package\soule\tests\rapport" .
require_once 'Library/Interfaces_Library/Validators/Int.php';
//require_once 'test.php';

class objet { }

class IntTest extends PHPUnit_Framework_TestCase
{
	public function testInt_Int()
	{
		$this->assertTrue(Valide_Int::isInt(11));
	}
	
	public function testInt_Zero()
	{
		$this->assertTrue(Valide_Int::isInt(0));
	}
	
	public function testInt_Null()
	{
		$this->assertFalse(Valide_Int::isInt(null));
	}
	
	public function testInt_True()
	{
		$this->assertFalse(Valide_Int::isInt(true));
	}
	
	public function testInt_False()
	{
		$this->assertFalse(Valide_Int::isInt(false));
	}
	
	public function testInt_IntNegatif()
	{
		$this->assertTrue(Valide_Int::isInt(-12));
	}
	
	public function testInt_Alpha_ValeurNumerique()
	{
		$this->assertTrue(Valide_Int::isInt("1"));
	}
	
	public function testInt_Alpha_Void()
	{
		$this->assertFalse(Valide_Int::isInt(""));
	}
	
	public function testInt_Alpha_ValeurNumerique_Negatif()
	{
		$this->assertTrue(Valide_Int::isInt("-1"));
	}
	
	public function testInt_Alpha()
	{
		$this->assertFalse(Valide_Int::isInt("A"));
	}
	
	public function testInt_Float()
	{
		$this->assertFalse(Valide_Int::isInt(3.3));
	}
	
	public function testInt_Float2()
	{
		$this->assertFalse(Valide_Int::isInt(3,3)); //transform�e en 2 param�tres
	}
	
	public function testInt_Float3()
	{
		$this->assertFalse(Valide_Int::isInt("3,3"));
	}
	
	public function testInt_Float4()
	{
		$this->assertFalse(Valide_Int::isInt("3.3"));
	}
	
	public function testInt_Void()
	{
		try { $this->assertFalse(Valide_Int::isInt()); }
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}
	
	public function testInt_Objet()
	{
		$obj = new objet();
		try { $this->assertFalse(Valide_Int::isInt($obj));}
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}
	
	public function testInt_ArrayInt()
	{
		try {$this->assertFalse(Valide_Int::isInt(array(3.3)));}
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}
}
?>