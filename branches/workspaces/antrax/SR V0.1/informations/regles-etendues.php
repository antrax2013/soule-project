<?php 
	$rootPath="../";
	$imagePath = $rootPath."images/";
	$imageReglePath=$imagePath."regles/";
	$currentPath=$rootPath."informations/";
	$structurePath=$rootPath."structure/";
	$page="Les régles de la Soule Royale";
	$title=$page;
	include_once $structurePath."header/header.php";
	include_once $structurePath."content/content.php";	
?>
<h1>Les régles de la Soule Royale</h1>
<h2>But du jeu :</h2>
<p>Amener la <strong>soule</strong> dans la zone d'embute adverse.</p>

<h2>Lexique</h2>
<li>Souleur: un souleur est un joueur membre de l'équipe.</li>  

<h2>Les actions</h2>
<h3>L’ordre des actions<h3>
<ul>Chaque joueur fait mouvement alternativement :
<li>Joueur n°1 de l’équipe, joueur n°1 de l’équipe adverse</li>
<li>Joueur n°2 de l’équipe, joueur n°2 de l’équipe adverse</li>
<li>Etc …</li>
</ul>
<p>Les deux capitaines envoient leur 11 mouvements en même temps et l’arbitre les exécutent les un après les autres en alternant avec les deux équipes:
Mouvement du n°1 de l’équipe qui commence, mouvement du n°1 de l’équipe adverse ;
Mouvement du n°2 de l’équipe, mouvement du n°2 de l’équipe adverse ;
Etc…
</p>

Pour le début de tactique suivant, ça donnera :
Rouge : + 0 + 
Bleu : - + 0


Le poussé de Soule
La Soule est poussée si le joueur avance et qu’il se trouve dans la zone précédent la soule.

En aucun cas la soule avance si elle se trouve dans la même zone que le joueur qui avance :


les combinaisons du poussé de Soule
Nous rentrons ici dans la partie tactique qui prend en compte l’ordre des actions et le poussé de Soule :

- La simple parade

Le n°1 rouge avance en 0, il pousse la Soule en 1D
le n° 1 bleu devra être trois zones plus loin en 2D, pour la repousser en avançant en 1D, la Soule finira en 0.

- La ligne d’attaque
C’est le seul moyen de remonter rapidement la Soule, il consiste en suivant l’ordre des mouvements, à remonter la Soule de manière « rapide » :


Le point important à prendre en compte pour construire une la ligne d’attaque, c’est la possibilité de parade de l’adversaire.

La frappe
Du point de vu tactique, cette technique brutale n'en demeure pas moins importante, voir primordiale, pour faire basculer un match.

Règle importante: un joueur ne peut frapper un autre joueur que si au moment de la frappe, l’adversaire se trouve dans la même colonne que lui. 
Rouges : 0 - +
Bleus : 2 2 3


Dans cet exemple, le numéro 2 bleu tente de frapper le numéro 2 rouge, mais celui-ci ayant reculé, le coup ne porte pas.

Autre règle importante: 4 coups et le joueur est KO, il ne participe plus au jeu.
Rouges : 3 3 3 4
Bleus : - - - -


Dans cet exemple, le numéro 3 bleu est KO est ne peut donc reculer, il est hors jeu dorénavant.





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
 <h4>La victoire revient à l'équipe 2 au troisième tour.</h4>
 <?php include_once $structurePath."footer/footer.php";?>