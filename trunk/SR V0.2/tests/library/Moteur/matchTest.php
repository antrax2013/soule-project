<?PHP
require_once 'Library/Moteur/Match/MatchStd.php';

class MatchStdTest extends PHPUnit_Framework_TestCase
{
	private $_ma;

	/**
	* Test constructeur
	*/
	protected function setUp()
	{
		$this->_ma = new Match();
	}

	/**
	* Test initiales correctes
	* Incr�ment nombre de tour
	* Get numeroTourEnCours
	* MatchTermine a faux
	*/
	public function test_MatchStdTest_initiale()
	{
		$this->setUp();
		
		$Equipe1= array("1;1;1;1;1;1;1;1;1;1;1");
		$Equipe2= array("1;3;2;2;2;1;2;2;3;2;1");

		$this->assertEquals(0, $this->_ma->numeroTourEnCours);
		$this->_ma->JoueTour($Equipe1[0], $Equipe2[0]);
		$this->assertFalse($this->_ma->MatchTermine());
		$this->assertEquals(1, $this->_ma->numeroTourEnCours);
	}
	
	/**
	* Test initiales incorrectes
	*/
	public function test_MatchStdTest_initiale_Exception()
	{
		$this->setUp();
		
		$Equipe1= array("1;A;1;1;1;1;1;1;1;1;1");
		$Equipe2= array("1;3;2;2;2;1;2;2;3;2;1");

		try { $this->_ma->JoueTour($Equipe1[0], $Equipe2[0]);}
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}
	
	public function test_MatchStdTest_FrappeA()
	{
		$this->setUp();
		
		$Equipe1= array("1;1;1;1;1;1;2;1;1;2;1", "0;0;0;+;-;-;+;+;+;+;+", "0;+;-;-;+;-;-;-;6;5;-","+;+;+;0;0;+;0;-;9;9;-","-;-;+;0;0;+;+;+;-;+;+","+;A;A;+;+;+;+;0;+;+;-","1;1;+;1;1;+;+;+;+;+;+");
		$Equipe2= array("1;1;1;1;1;1;1;1;2;2;1", "-;-;0;0;+;+;+;+;+;-;-", "-;0;-;0;-;-;8;9;+;+;0","+;-;-;-;-;-;-;-;1;+;+","+;+;+;+;-;+;-;-;-;+;-","0;-;-;-;+;-;0;0;-;-;+","A;+;+;+;+;+;+;+;+;+;+");
		
		$i=0;
		while(!$this->_ma->MatchTermine()) {
			try{ $this->_ma->JoueTour($Equipe1[$i], $Equipe2[$i++]);}
			catch (Exception $expected) 
			{
				$i--;  
				$this->fail('An expected exception has been raised.\n'.$Equipe1[$i]."\n".$Equipe2[$i]); 
			}
		}
		$this->assertTrue($this->_ma->MatchTermine());
	}
	
	public function test_MatchStdTest_FrappeB()
	{
		$this->setUp();
		
		$Equipe1= array("1;1;1;1;1;1;2;2;2;1;1", "0;0;0;0;+;+;0;0;+;+;+", "+;+;+;+;+;+;+;+;+;+;+","8;8;8;8;0;+;+;+;0;+;+");
		$Equipe2= array("1;2;1;1;1;1;1;1;1;2;1", "+;+;+;+;+;+;+;+;+;+;+", "5;-;5;5;6;A;A;A;A;5;B","1;-;9;9;9;9;1;1;1;6;8");
		
		$i=0;
		while(!$this->_ma->MatchTermine()){
			try{ $this->_ma->JoueTour($Equipe1[$i], $Equipe2[$i++]);}
			catch (Exception $expected) 
			{
				$i--;  
				$this->fail('An expected exception has been raised.\n'.$Equipe1[$i]."\n".$Equipe2[$i]); 
			}
		}
		$this->assertTrue($this->_ma->MatchTermine());
	}
	
	public function test_MatchStdTest_Joueur_Ko()
	{
		$this->setUp();
		
		$Equipe1= array("1;1;1;1;1;1;1;2;2;2;1", "0;+;+;+;+;+;+;-;0;+;-", "+;-;+;-;-;B;B;+;+;+;0", "0;0;-;-;-;7;7;-;-;2;+", "0;2;7;-;+;7;6;0;8;6;2", "0;-;2;+;B;2;2;+;+;2;+", "0;B;3;+;+;6;6;0;0;0;0");
		$Equipe2= array("1;1;1;2;1;1;1;1;2;1;1", "0;+;-;+;+;+;+;+;+;+;+", "-;1;-;-;1;1;1;4;7;4;4", "-;2;+;+;-;-;2;+;+;2;+", "+;B;+;+;+;+;B;B;+;A;B", "+;A;3;A;6;-;X;B;B;7;+", "+;0;+;+;6;3;X;+;9;+;+");
		
		$i=0;
		while(!$this->_ma->MatchTermine()) {
			try{ $this->_ma->JoueTour($Equipe1[$i], $Equipe2[$i++]);}
			catch (Exception $expected) 
			{
				$i--;  
				$this->fail('An expected exception has been raised.\n'.$Equipe1[$i]."\n".$Equipe2[$i]); 
			}
		}
		$this->assertTrue($this->_ma->MatchTermine());
	}
	
	public function test_MatchStdTest_MatchNull()
	{
		$this->setUp();
		
		$Equipe1= array("2;2;2;2;2;2;2;2;1;1;2", "+;+;+;+;+;+;+;+;+;+;+", "-;-;0;+;+;+;+;+;3;3;+","0;0;-;-;8;+;8;3;0;8;+","-;0;-;-;-;B;8;8;0;0;0","+;+;+;+;+;B;+;A;0;0;0","+;4;+;4;5;0;+;0;0;0;0","4;4;2;3;0;0;0;0;0;X;X");
		$Equipe2= array("1;1;1;1;1;2;1;1;1;1;2", "+;+;+;+;+;0;+;+;-;-;0", "9;9;9;9;A;0;A;A;+;+;+","-;A;-;B;B;+;B;B;-;+;0","6;+;+;+;8;6;8;8;6;8;6","6;5;8;5;7;0;7;0;0;-;7;","7;-;5;0;5;5;5;0;-;-;5","0;0;+;+;+;+;+;X;+;+;+");
		
		$i=0;
		while(!$this->_ma->MatchTermine()) 
		{
			try{ $this->_ma->JoueTour($Equipe1[$i], $Equipe2[$i++]);}
			catch (Exception $expected) 
			{
				$i--;  
				$this->fail('An expected exception has been raised.\n'.$Equipe1[$i]."\n".$Equipe2[$i]); 
			}
		}
		$this->assertTrue($this->_ma->MatchTermine());
	}
	
	public function test_MatchStdTest_test_6()
	{
		$this->setUp();
		
		$Equipe1= array("1;1;1;1;1;1;2;1;2;1;2", "0;+;+;+;+;+;0;0;+;+;+", "0;-;-;4;5;6;-;4;5;9;4","4;5;5;3;3;+;+;+;+;+;+");
		$Equipe2= array("1;1;1;1;1;1;2;1;1;1;1", "-;-;0;+;+;+;+;0;+;+;-", "+;+;+;+;+;+;2;+;+;+;+","0;0;0;+;+;+;0;0;0;0;0");
		
		$i=0;
		while(!$this->_ma->MatchTermine())
		{
			$this->_ma->JoueTour($Equipe1[$i], $Equipe2[$i++]);
		}
		$this->assertTrue($this->_ma->MatchTermine());
	}
	
	public function test_MatchStdTest_initiale_impossible()
	{
		$this->setUp();
		
		$Equipe1= array("0;4;1;1;1;1;1;1;1;1;1");
		$Equipe2= array("1;3;2;2;2;1;2;2;3;2;1");

		try{ $this->_ma->JoueTour($Equipe1[0], $Equipe2[0]); }
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}
	
	/**
	* test sortie par sa ligne d'embut �quipe 1
	*/
	public function test_MatchStdTest_mouvement_impossible()
	{
		$this->setUp();
		
		$Equipe1= array("3;1;1;1;1;1;1;1;1;1;1", "-;-;0;+;+;+;+;+;3;3;+");
		$Equipe2= array("1;3;2;2;2;1;2;2;3;2;1","6;+;+;+;8;6;8;8;6;8;6");
		
		$i=0;
		while(!$this->_ma->MatchTermine()) 
		{
			try{ $this->_ma->JoueTour($Equipe1[$i], $Equipe2[$i++]);}
			catch (Exception $expected) { return; }
		}
		$this->fail('An expected exception has not been raised.');
	}
	
	/**
	* test sortie par sa ligne d'embut �quipe 2
	*/
	public function test_MatchStdTest_mouvement_impossible2()
	{
		$this->setUp();
		
		$Equipe1= array("2;1;1;1;1;1;1;1;1;1;1", "-;-;0;+;+;+;+;+;3;3;+");
		$Equipe2= array("3;3;2;2;2;1;2;2;3;2;1","-;+;+;+;8;6;8;8;6;8;6");
		
		$i=0;
		while(!$this->_ma->MatchTermine()) 
		{
			try{ $this->_ma->JoueTour($Equipe1[$i], $Equipe2[$i++]);}
			catch (Exception $expected) { return; }
		}
		$this->fail('An expected exception has not been raised.');
	}
	
	public function test_MatchStdTest_action_impossible_equipe1()
	{
		$this->setUp();
		
		$Equipe1= array("2;1;1;1;1;1;1;1;1;1;1", "-;-;C;+;+;+;+;+;3;3;+");
		$Equipe2= array("3;3;2;2;2;1;2;2;3;2;1","-;+;+;+;8;6;8;8;6;8;6");
		
		$i=0;
		while(!$this->_ma->MatchTermine()) 
		{
			try{ $this->_ma->JoueTour($Equipe1[$i], $Equipe2[$i++]);}
			catch (Exception $expected) { return; }
		}
		$this->fail('An expected exception has not been raised.');
	}
	
	/**
	* test sortie par ligne d'embut adverse �quipe 1
	*/
	public function test_MatchStdTest_mouvement_impossible3()
	{
		$this->setUp();
		
		$Equipe1= array("1;1;1;1;1;1;1;1;1;1;1", "+;-;0;0;0;0;0;0;3;3;0", "+;-;0;+;+;+;+;+;3;3;+", "+;-;0;+;+;+;+;+;3;3;+", "+;-;3;3;6;3;6;6;-;-;3", "+;+;+;+;+;B;+;A;0;0;0");
		$Equipe2= array("1;3;2;2;2;1;2;2;3;2;1","+;+;+;+;8;6;8;8;6;8;6", "+;0;0;+;+;+;+;+;3;3;+", "+;+;0;+;+;+;+;+;3;3;+","7;+;5;0;5;5;5;0;-;-;5", "8;-;5;0;5;5;5;0;-;-;5");
		
		$i=0;
		while(!$this->_ma->MatchTermine()) 
		{
			try{ $this->_ma->JoueTour($Equipe1[$i], $Equipe2[$i++]);}
			catch (Exception $expected) { return; }
		}
		$this->fail('An expected exception has not been raised.\n'.$Equipe1[$i]."\n".$Equipe2[$i]); 
	}
	
	/**
	* test sortie par ligne d'embut adverse �quipe 2
	*/
	public function test_MatchStdTest_mouvement_impossible4()
	{
		$this->setUp();
		
		$Equipe1= array("2;2;2;2;2;1;2;2;3;2;1","0;+;+;+;8;6;8;8;6;8;6", "+;0;0;+;+;+;+;+;3;3;+", "+;+;0;+;+;+;+;+;3;3;+","7;0;5;0;5;5;5;0;-;-;5", "8;-;5;0;5;5;5;0;-;-;5");
		$Equipe2= array("1;1;1;1;1;1;1;1;1;1;1", "+;-;0;0;0;0;0;0;3;3;0", "+;-;0;+;+;+;+;+;3;3;+", "+;-;0;+;+;+;+;+;3;3;+", "+;-;3;3;6;3;6;6;-;-;3", "+;+;+;+;+;B;+;A;0;0;0");
		
		$i=0;
		while(!$this->_ma->MatchTermine()) 
		{
			try{ $this->_ma->JoueTour($Equipe1[$i], $Equipe2[$i++]);}
			catch (Exception $expected) { return; }
		}
		$this->fail('An expected exception has not been raised.\n'.$Equipe1[$i]."\n".$Equipe2[$i]); 
	}
	
	public function test_MatchStdTest_exceptionGet()
	{
		$this->setUp();
		try{ $this->_ma->JoueTour; }
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.'); 
	}
	
	public function test_MatchStdTest_exceptionSet()
	{
		$this->setUp();
		try{ $this->_ma->toto = 0;}
		catch (Exception $expected) { return; }
		$this->fail('An expected exception has not been raised.');
	}
}
?>