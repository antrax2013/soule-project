<?php 
	$rootPath="../";
	$imagePath = $rootPath."Images/";
	$imageReglePath=$imagePath."regles/";
	$currentPath=$rootPath."informations/";
	$structurePath=$rootPath."structure/";
	$page="Les règles de la Soule Royale";
	$desc="Règle du jeu en ligne gratuit multijoueur Soule Royale, Jouable entièrement dans un navigateur web, sans téléchargement. Soyez fin stratége pour mener votre équipe hauts sommets.";
	$title=$page;
	include_once $structurePath."header/header.php";
	include_once $structurePath."content/content.php";	
?>
<h1>Les règles de la Soule Royale</h1>
<h2><span style="color:red">Page en constrcution</span></h2>
<h2>But du jeu :</h2>
<p>Amener la <strong>soule</strong> dans la zone d'embute adverse.</p>
<h2>Légende :</h2>
<ul>
<li>Un chiffre prés d'un joueur, signifie qu'il fait l'action de frapper un adversaire</li>
<li>Chaque point noir, représente une blessure, à 4 c'est le KO</li>
<li>Un X, signifie que le joueur est KO et ne peut donc faire aucune action</li>
<li>Un zéro, il ne fait aucune action</li>
</ul>
<h2>Précision :</h2>
<p>
Un joueur pousse la Soule que s'il avance et qu'il précède d'une ligne la Soule<br />
<img src="<?php echo $imageReglePath?>Pousse_soule.gif" alt="joueur poussant la soule" title="joueur poussant la soule" /><br /> 
Un joueur qui frappe, doit se trouver au moment de l'action sur la même ligne que le joueur visé, sinon le coup ne porte pas.
</p>
<h2>Le déroulement du Match :</h2>
<p>Les deux équipes ont fournies en même temps les positions initiales de leurs joueurs, puis à chaque tour le mouvement de chaqu'un de tous leurs joueur.</p>
<h3>Par exemple :</h3>
<p>
	<span class="Equipe1">Equipe 1 : 2 1 1 1 1 2 1 1 1 1 2</span><br /> <!-- Rouge -->
    <span class="Equipe2">Equipe 2 : 1 1 1 1 2 1 1 2 2 2 1</span> <!-- Bleu -->
</p>
 <p>
	Puis, lors de la phase suivante, les mouvements de leurs 11 joueurs :<br />
    <span class="Equipe1">Equipe 1 : 0 - 0 0 0 + + + + + -</span><br />
    <span class="Equipe2">Equipe 2 : + + + + 0 + + 0 + + +</span><br />
</p>
<p>
  Le site traduit les mouvements ainsi :<br />
    <img src="<?php echo $imageReglePath?>Phase1.gif" title="soule royale: exemple de tour 1"  alt="soule royale: exemple de tour 1" /><br />
  Le premier tour est terminé
</p>
<p>
	Lors de la phase suivante, les mouvements de leurs 11 joueurs :<br />
    <span class="Equipe1">Equipe 1 : 0 + 1 + 1 + + 11 11 + +</span><br />
	<span class="Equipe2">Equipe 2 : + 7 7 + + 7 7 + + + 8</span>
</p>
<p>
	Le site a traduit les mouvements ainsi :<br />
    <img src="<?php echo $imageReglePath?>Phase2.gif" title="soule royale: exemple de tour 2"  alt="soule royale: exemple de tour 2"  /><br />
	Le second tour est terminé
</p>
<p>
	Lors de la phase suivante, les mouvements de leurs 11 joueurs :<br />
    <span class="Equipe1">Equipe 1 : + + 1 + 1 11 X 11 11 + 0</span><br />
	<span class="Equipe2">Equipe 2 : - 9 9 - - 9 9 8 8 8 8</span>
</p>
<p>
	Le site traduit les mouvements ainsi :<br />
    <img src="<?php echo $imageReglePath?>Phase3.gif" title="soule royale: exemple de tour 3"  alt="soule royale: exemple de tour 3" /><br />
 </p>
 <h4>La victoire revient à l'équipe 1 au troisième tour.</h4>
 <?php include_once $structurePath."footer/footer.php";?>