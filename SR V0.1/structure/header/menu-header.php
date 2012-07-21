<?php $informationsPath = $rootPath."informations/"; ?>
<div id="Menu-Horizontal" class="ui-widget ui-widget-header">
		<ul id="Nav" class="ui-widget">
			<li class="ui-widget">
				<a href="<?php echo $rootPath?>index.php" title="Bienvenue sur Soule Royale">Accueil</a>
			</li>
			<li class="ui-widget">
				<a href="<?php echo $rootPath?>nouveautes.php" title="Consultez les dernières évolutions de Soule Royale">Nouveautés</a>
			</li>
			<li class="ui-widget">
				<a href="<?php echo $informationsPath?>regles.php" title="Découvrez la Soule Royale">Informations</a>
				<ul class="Menu">
					<li id="sousMenu-3" class="ui-widget ui-widget-header" style="border-top:none;">
						<a href="<?php echo $informationsPath?>presentation-generale.php" title="Présentation de la Soule Royale">Présentation</a>
					</li>
					<li id="sousMenu-2" class="ui-widget ui-widget-header" style="border-top:none;">
						<a href="<?php echo $informationsPath?>histoire.php" title="Découvrez l'histoire de la Soule Royale">L'histoire</a>
					</li>
					<li id="sousMenu-1" class="ui-widget ui-widget-header" style="border-top:none;">
						<a href="<?php echo $informationsPath?>regles.php" title="Etudiez les règles de la Soule Royale">Les règles</a>
					</li>					
				</ul>
			</li>
			<li class="ui-widget ui-menu ui-menu ui-menu-item"><a href="<?php echo $rootPath?>contactez-nous.php" title="Contactez les responsables de Soule Royale">Contactez-nous</a></li>
		</ul>
	</div>	