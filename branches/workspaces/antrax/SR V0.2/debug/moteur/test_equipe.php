<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tests Classe Equipe Std</title>
</head>

<body>
<h1>Tests Classe Equipe</h1>
<?PHP
require_once 'test.php';
require_once 'Moteur/Element.php';
require_once 'Moteur/Souleur.php';
require_once 'Moteur/AbstractEquipe.php';

require_once 'Moteur/Equipe/EquipeStd.php';


$eq = new Equipe();

$eq->offsetGet(11)->position = 2;
echo "Position joueur 11:".$eq->offsetGet(11)->position; 
$eq[7]->position = 3;
echo  "<br>Position joueur 7:".$eq->offsetGet(7)->position." PtVie:".$eq->offsetGet(7)->ptVie; 
echo  "<br>Position joueur 8:".$eq->offsetGet(8)->position; 

echo "<br><br>*** Test toString Equipe ***<br>";
echo $eq;
?>

</body>
</html>
