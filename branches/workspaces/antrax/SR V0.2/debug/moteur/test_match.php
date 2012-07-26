<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tests Classe Match Std</title>
</head>

<body>
<h1>Tests Classe Match</h1>
<?PHP
$path_library = 'Moteur/';
$path_match = $path_library.'Match/';
$path_equipe = $path_library.'Equipe/';

require_once 'test.php';
require_once $path_library.'Element.php';
require_once $path_library.'Souleur.php';
require_once $path_library.'AbstractEquipe.php';
require_once $path_library.'AbstractMatch.php';

require_once $path_equipe.'EquipeStd.php';
require_once $path_match.'MatchStd.php';

$ma = new Match();

//$Equipe1= array("1;1;1;1;1;1;1;1;1;1;1", "+;0;-;+;0;+;-;0;+;0;+", "+;+;+;-;+;+;0;+;+;0;+","+;+;+;+;+;+;+;+;+;+;+");
//$Equipe2= array("1;3;2;2;2;1;2;2;3;2;1", "+;+;+;0;+;+;+;+;+;+;-", "1;-;-;+;1;6;1;1;0;4;0","2;+;0;6;6;5;6;6;+;9;-");

$Equipe1= array("1;1;1;1;1;1;2;2;2;1;1", "0;0;0;0;+;+;0;0;+;+;+", "+;+;+;+;+;+;+;+;+;+;+","8;8;8;8;0;+;+;+;0;+;+");
$Equipe2= array("1;2;1;1;1;1;1;1;1;2;1", "+;+;+;+;+;+;+;+;+;+;+", "5;-;5;5;6;A;A;A;A;5;B","1;-;9;9;9;9;1;1;1;6;8");


//echo "CheckInit:".BoolToString($ma->CheckInit($Equipe1[1])); 
//echo "<br>CheckAction:".BoolToString($ma->CheckAction($Equipe2[0]))."<br>"; 

$i=0;
while(!$ma->MatchTermine())	
{
	$ma->JoueTour($Equipe1[$i], $Equipe2[$i++]);
	echo $ma;
}

?>

</body>
</html>
