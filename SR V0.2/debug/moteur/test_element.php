<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tests Classe Element</title>
</head>

<body>
<h1>Tests Classe Element</h1>
<?PHP
require_once 'test.php';
require_once '../../library/Moteur/element.php';

$e1 = new Element();
echo "E1: position départ->".$e1->position."<br />";
$e1->avance();
$e1->avance();
echo "E1:a avancé 2 fois ->".$e1->position."<br />";
$e1->recule();
/*echo "E1:a reculé 1 fois  ->".$e1->position."<br />";
$e1->position(4);
echo "E1:déplace directement en 4 ->".$e1->position."<br />";*/
$e1->position=5;
echo "E1:déplace directement en 5 par autre méthode ->".$e1->position."<br />";
$e1->cas=12;


echo "<br/><br/><br/>";
$e2 = new Element('a');
?>

</body>
</html>
