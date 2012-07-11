<?php 
	$rootPath="";
	$currentPath=$rootPath."";
	$structurePath=$rootPath."structure/";
	$informationPath=$rootPath."informations/";
	$page="Le plan du site";
	$title=$page;
	$desc="Plan du site Soule Royale. La carte pour mener votre équipe de soule royale vers les plus hauts sommets.";
	
	include_once $structurePath."header/header.php";
	include_once $structurePath."content/content.php";	
?>
<h1>Soule Royale: Le plan du site</h1>
<ul>
	<li><a href="<?php echo $rootPath?>index.php" title="Soule royale: la page d'accueil du site">Accueil</a></li>
	<li><a href="<?php echo $rootPath?>nouveautes.php" title="Soule royale: l'actualité du site">Nouveautés</a></li>
	<li>Informations
	<ul>
		<li><a href="<?php echo $informationPath?>presentation-generale.php" title="Soule royale: présentation générale">Présentation générale</a>
		<ul>
			<li><a href="<?php echo $informationPath?>presentation-les-formes.php" title="Soule royale: présentation des différentes formes de soule">Les diférentes formes de la soule</a></li>
			<li><a href="<?php echo $informationPath?>presentation-le-jeu.php" title="Soule royale: présentation du jeu">Présentation du jeu</a></li>
		</ul>
		</li>
		<li><a href="<?php echo $informationPath?>histoire.php" title="Soule royale: l'histoire de la soule">Histoire de la soule</a></li>
		<li><a href="<?php echo $informationPath?>regles.php" title="Soule royale: les règles du jeu">Règle du jeu</a></li>
	</ul>
	</li>
	<li><a href="<?php echo $rootPath?>contactez-nous.php" title="Soule royale: contactez les responsables du site">Contactez-nous</a></li>
	<li><a href="<?php echo $rootPath?>mentions-legales.php" title="Soule royale: les mentions légales">Mentions légales</a></li>
	<li><a href="<?php echo $rootPath?>site-map.php" title="Soule royale: le plan du site">Plan du site</a></li>
</ul>
<?php include_once $rootPath."structure/footer/footer.php";?>