<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>TEST LIBMAIL</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?PHP
$current_url = "/test/mail.php";
require_once '../inc/db.inc.php';
require_once '../admin/inc/global.inc.php';
//require_once '../inc/global.inc.php';
require_once '../php/libmail.php';
require_once '../php/PHPMailer_v2.0.4/PHPMailer_v2.0.4/class.phpmailer.php';


//$to = "contact@axesys.fr";
//$from = "ett2@espacejob.com";
//$bcc = "cyrilcophignon@yahoo.fr";
//$bcc = "cyrilcophignon@free.fr";
//$to = "cyril.cophignon@ivalis.be";

$to = "ett1@espacejob.com";
$bcc = "ett3@espacejob.com";
//$from = "inventoriste@espacejob.com";
$from = "ett2@espacejob.com";
$from_name="Gestionnaire www.espacejob.com";

$sujet="TEST EMAIL ESPACEJOB ".date("Y-m-d H:i");
$message=" Bonjour, test de mail par le script /test/mail.php";

//$pieces = array("nom" => "../fichiers/BDC_11677_34_1.pdf", "type" => "application/pdf");
$pieces = array("nom" => "../fichiers/BDC_8351_14_1.pdf", "type" => "application/pdf");

echo "PARAMETRES<br>";

echo " FROM:".$from."<br>";
echo " TO:".$to."<br>";
echo " Bcc:".$bcc."<br>";
echo " Sujet:".$sujet."<br>";
echo " Message:".$message."<br><br>";
echo "PIECE JOITE<br>Ficher piece jointe: ".$pieces['nom']."<br> Type fichier:".$pieces['type']."<br> Test d'existence du ficher:";
if(file_exists($pieces['nom'])) echo 
" Fchier present"; 
else echo " Fichier introuvable";

echo "<br><br>";

$header="FROM: ETT2 <".$from.">\n\r";
echo "function mail native: ";
if(!mail($to, $sujet, $message, $header)) echo "<b>Err envoi</b>";
else echo "envoi ok";

echo "<br><br>";

echo "<h1>Test Libmail: </h1>";
$mail = new Mail();
$mail->To($to);
$mail->Bcc($bcc);
$mail->From($from);
$mail->Subject($sujet);
$mail->Body( $message , 'iso-8859-1');

$mail->Attach($pieces["nom"], $pieces["type"], "attachment"); 

if(!$mail->Send()) echo "<b>Err envoi</b>";
else echo "envoi ok";

echo "<br><br>";
echo "<h1>function send_Email: </h1>";
if(!send_Email($to, $sujet, $message, $from, $pieces)) echo "<b>Err envoi</b>";
else echo "envoi ok";

echo "<br><br>";
echo "<h1>Lib phpmailer: </h1>";
$phpmail = new phpmailer();
$phpmail->From = $from;
$phpmail->FromName= $from_name;
$phpmail->AddAddress($to);
$phpmail->Mailer ="sendmail";
$phpmail->Subject=$sujet;
$phpmail->Body = $message;
$phpmail->AddAttachment($pieces["nom"]);
if(!$phpmail->Send()) echo "<b>Err envoi</b>";
else echo "envoi ok";
?>
</body>
</html>
