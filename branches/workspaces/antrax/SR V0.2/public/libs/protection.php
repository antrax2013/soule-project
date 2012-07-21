<?php
 session_start();

 /*print_r(gd_info());*/
 
 // header: image
 header('Content-Type: image/png');

 $name = $_GET['name'];
 // nb de caractères
 $strlen = (int) $_GET['strlen'];

 // taille de l'image ( width )
 $width = $strlen * 23 + 20;
 $height = 60;
 // taille de chaque zone de couleur
 $widthColor = $width / 4;

 // création
 $img = imagecreatetruecolor( $width, $height );
 // antialising, c'est plus bô! :-)
 imageantialias( $img, 1 );

 // chaine
 $string = 'ABCDEGHIJKLMNPRSTUVWXYZ123456789';
 $chaine = '';
 for( $i = 0; $i < $strlen; $i++ )
 $chaine .= $string[ mt_rand( 0, strlen($string) ) ];

 $_SESSION[ $name ] = $chaine;

 // couleur de départ
 $c1 = array( mt_rand( 200, 255), mt_rand( 200, 255), mt_rand( 200, 255) );
 // couleur finale
 $c2 = array( mt_rand( 70, 180), mt_rand( 70, 180), mt_rand( 70, 180) );
 // pas pour chaque composante de couleur
 $diffsColor = array( ( $c1[0] - $c2[0] ) / $widthColor, ( $c1[1] - $c2[1] ) / $widthColor, ( $c1[2] - $c2[2] ) / $widthColor );

 $start = 0;
 $end = $widthColor;

 for( $j = 0; $j < 4; $j++ ) // boucle pour chacune des 4 zones
 {
 $r = $j % 2 == 0 ? $c1[0] : $c2[0]; // composante r de départ
 $v = $j % 2 == 0 ? $c1[1] : $c2[1]; // idem v
 $b = $j % 2 == 0 ? $c1[2] : $c2[2]; // idem b

 // création des lignes
 for( $i = $start; $i < $end; $i++ )
 {
 if( $j % 2 == 0 )
 {
 $r -= $diffsColor[0];
 $v -= $diffsColor[1];
 $b -= $diffsColor[2];
 }
 else
 {
 $r += $diffsColor[0];
 $v += $diffsColor[1];
 $b += $diffsColor[2];
 }

 $color = imagecolorallocate( $img, $r, $v, $b );

 imageline( $img, $i, 0, $i, $height, $color );
 }

 $start += $widthColor;
 $end += $widthColor;
 }

 $colorsChar = array(); // on va mémoriser les couleurs des caractères

 // caractères
 for( $i = 0; $i < $strlen; $i++ )
 {
 $colorsChar[$i] = imagecolorallocate( $img, mt_rand( 0, 120 ), mt_rand( 0, 120 ), mt_rand( 0, 120 ) );
 imagettftext( $img, mt_rand( 20, 25 ), mt_rand( -35, 35 ), 10 + $i * 23, 35, $colorsChar[$i], 'comic.ttf', $chaine[ $i ] );
 }

 // quelques lignes qui embêtent
 for( $i = 0; $i < 10; $i++ )
 {
 imageline( $img, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), $colorsChar[mt_rand( 0, $strlen - 1 )] );
 }

 $noir = imagecolorallocate( $img, 0, 0, 0 );

 // bordure
 imageline( $img, 0, 0, $width, 0, $noir );
 imageline( $img, 0, 0, 0, $height, $noir );
 imageline( $img, $width - 1, 0, $width - 1, $height, $noir );


 if(imagepng( $img )===false) echo "pb";
 imagedestroy( $img );

/*header ("Content-type: image/png");
$chars=$_GET['str'];
$x=10*(strlen($chars))+5;
$y=30;
$im = @imagecreate ($x, $y)
or die ("Impossible d'initialiser la bibliothèque GD");
$background_color = imagecolorallocate ($im, 255, 255, 255);
$text_color = imagecolorallocate ($im, 0, 0, 0);
$blue = imagecolorallocate ($im,64,116,207);

imagerectangle ($im,0,0,$x-1,$y-1,$blue);

$posX=5;
$posY=5;
for($i=0;$i<strlen($chars);$i++)
{
imagechar ($im,10,$posX,$posY+rand(-5,5),substr($chars,$i,1),$blue);
$posX+=10;
}
imagepng ($im);
imagedestroy($im); */
 ?>