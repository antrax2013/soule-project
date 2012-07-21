<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tests Classe Souleur</title>
</head>

<body>
<h1>Tests Classe Souleur</h1>
<?PHP
require_once 'test.php';
require_once '../../library/Moteur/element.php';
require_once '../../library/Moteur/souleur.php';

$s1 = new Souleur();
$s2 = new Souleur(5);
echo "Mais où est S2? S2 est en position ->".$s2->position."<br /><br />";

$s1->avance();
$s1->avance();
echo "S1:a avancé 2 fois ->".$s1->position."<br />";
$s1->recule();
echo "S1:a reculé 1 fois ->".$s1->position."<br />";
$s1->position = 5;
echo "S1:déplace directement en 5 par autre méthode ->".$s1->position."<br />";
$s2->Frappe($s1);
echo "S1 prend un coup de poing de la part de S2, est-il ko ? ->".BoolToString($s1->Ko())."<br />";
echo "Il lui reste ".$s1->ptVie." ptVie(s) <br />";


/*echo "<br /><br /><br />";
$s3 = new Souleur();
$s3->cas=12;*/


echo "<br /><br /><br />";
$s2 = new Souleur();
echo BoolToString($s2->ptVie = "A");


?>

</body>
</html>
