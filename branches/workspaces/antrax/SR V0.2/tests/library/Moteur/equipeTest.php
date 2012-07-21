<?PHP
require_once 'Library/Moteur/Equipe/EquipeStd.php';

class EquipeStdTest extends PHPUnit_Framework_TestCase
{
	private $_equipe;
	
	protected function setUp()
	{
		$this->_equipe = new Equipe();
	}

	public function testEquipeStdTest_offsetSet_offsetExists()
	{
		$this->setUp();
		$this->_equipe->offsetSet(null, new Souleur()); 
		$this->assertTrue($this->_equipe->offsetExists(12));
		$this->assertFalse($this->_equipe->offsetExists(24));
	}

	public function testEquipeStdTest_offsetGet_Avance()
	{
		$this->setUp();
		$this->_equipe->offsetGet(11)->position = 2; //test du set 
		$this->_equipe->offsetGet(11)->avance();
		$this->assertEquals(3, $this->_equipe->offsetGet(11)->position);
		$this->assertNull($this->_equipe->offsetGet(24));
	}
	
	public function testEquipeStdTest_CrochetGet()
	{
		$this->setUp();
		$this->_equipe[7]->ptVie = 2; //test du set via l'operateur []
		$this->assertEquals(2, $this->_equipe[7]->ptVie);
		$this->assertNull($this->_equipe[24]);
	}
	
	public function testEquipeStdTest_CrochetGet_Unset()
	{
		$this->setUp();
		$this->_equipe[24] = new Souleur();
		$this->assertTrue($this->_equipe->offsetUnset(24));
	}
	
	public function testEquipeStdTest_Echo()
	{
		$this->setUp();
		echo $this->_equipe;
	}
}
?>
