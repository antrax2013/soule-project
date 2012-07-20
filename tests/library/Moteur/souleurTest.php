<?PHP
require_once 'Library/Moteur/Element.php';
require_once 'Library/Moteur/Souleur.php';

class SouleurTest extends PHPUnit_Framework_TestCase
{
	private $_s1;
	private $_s2;

	protected function setUp()
	{
		$this->_s1 = new Souleur();
		$this->_s2 = new Souleur(0, 4);
	}

	public function testSouleur__Construct()
	{
		$this->_s1 = new Souleur(5, 2);
		$this->assertEquals(5, $this->_s1->position);
		$this->assertEquals(2, $this->_s1->ptVie);
	}

	public function testSouleur__GetSet()
	{
		$this->setUp();
		$this->_s1->position = 5;
		$this->_s1->ptVie = 2;
		$this->assertEquals(5, $this->_s1->position);
		$this->assertEquals(2, $this->_s1->ptVie);
	}

	public function testSouleurFrappe()
	{
		$this->setUp();
		$this->_s1->position=1;
		$this->_s1->ptVie=2;
		$val = $this->_s2->Frappe($this->_s1);
		$this->assertFalse($val);
		
		$this->_s1->recule();
		$val = $this->_s2->Frappe($this->_s1);
		$this->assertTrue($val);
		
		$this->assertEquals(1, $this->_s1->ptVie);
		$this->_s2->Frappe($this->_s1);
		$this->assertTrue($this->_s1->Ko());
	}

/** TEST DES EXCEPTIONS */
	public function testElementExceptionConstructeur()
	{
		try {
			$this->_s1 = new Souleur(3.2,'A');
		}
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}

	public function testElementExceptionConstructeur2()
	{
		try {
			$this->_s2 = new Souleur('A',3.5);
		}
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}

	public function testSouleurException__Get()
	{
		try {
			$this->setUp(); 
			//Acces à un champ qui n'existe pas
			$this->assertNull($this->_s1->test);
		}
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}

		public function testSouleurException__Set()
	{
		try {
			$this->setUp();
			$this->_s1->ptVie = "A";
		}
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}

	public function testSouleurException__Set2()
	{
		try {
			$this->setUp();
			$this->_s1->ptVie = -1;
		}
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}

	public function testSouleurException__Set3()
	{
		try {
			$this->setUp();
			$this->_s1->ptVie = 3.2;
		}
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}

	public function testSouleur__Call()
	{
		try {
			$this->setUp(); 
			$val = $this->_s2->test();
		}
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}
}
?>