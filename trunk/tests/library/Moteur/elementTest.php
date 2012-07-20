<?php
//phpunit --include-path "C:\Documents and Settings\cyril.cophignon\Mes documents\PersOnnel et confidentiel\perso\package\soule;C:\Documents and Settings\cyril.cophignon\Mes documents\PersOnnel et confidentiel\perso\package\soule\library" --verbose --coverage-html "C:\Documents and Settings\cyril.cophignon\Mes documents\PersOnnel et confidentiel\perso\package\soule\tests\rapport" .
//phpunit --include-path "C:\EclipseWorkspace\soule;C:\EclipseWorkspace\soule\library" --verbose --coverage-html "C:\EclipseWorkspace\soule\tests\rapport" "C:\EclipseWorkspace\soule\tests\"

require_once 'Library/Moteur/Element.php';

class ElementTest extends PHPUnit_Framework_TestCase
{
	private $_element;
	
	protected function setUp($a_position = 0)
	{
		$this->_element = new Element($a_position);
	}
	
	public function testElementAvance()
	{
		$this->setUp();
		$this->_element->position = 2; //test du get
		$this->_element->avance();
		$this->assertEquals(3, $this->_element->position);
	}
	
	public function testElement__Set()
	{
		$this->setUp();
		$this->_element->position = 3;
		$this->assertEquals(3, $this->_element->position);
	}

	public function testElementRecule()
	{
		$this->setUp(3);
		$this->_element->recule();
		$this->_element->recule();
		$this->assertEquals(1, $this->_element->position);
	}

	public function testElementExceptionConstructeur()
	{
		try { $this->setUp('A'); }
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}

	public function testElementException__Get()
	{
		try { 
			$this->setUp(); 
			$this->assertNull($this->_element->test); //Acces à un champ qui n'existe pas
		}
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}

	public function testElementException__Set()
	{
		try {
			$this->setUp();
			$this->_element->test = 0; //Ecriture d'un champ qui n'existe pas
		}
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}
	
	public function testElementException__Set2()
	{
		try {
			$this->setUp();
			$this->_element->position = 3.3; //Ecriture d'un champ qui n'existe pas
		}
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}

	public function testElement__Call()
	{
		try {
			$this->setUp(); 
			$val = $this->_element->test();
		}
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}
}
?>