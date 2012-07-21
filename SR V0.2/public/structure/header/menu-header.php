<div id="Menu-Horizontal" class="ui-widget ui-widget-header" style="text-align:center;">
		<ul id="Nav" class="ui-widget">
			<li class="ui-widget">
				<a href="<?php echo $this->url(array('controller'=>'index', 'action'=>'index'));?>" title="Bienvenue sur Soule Royale">Accueil</a>
			</li>
			<li class="ui-widget">
				<a href="<?php echo $this->url(array('controller'=>'jeux', 'action'=>'index'));?>" title="Jouer à la Soule Royale">Jeux</a>
				<ul class="Menu" style="text-align:center;">
					<li id="sousMenu-1" class="ui-widget ui-widget-header">
						<a href="<?php echo $this->url(array('controller'=>'jeux', 'action'=>'index'));?>" title="Venez parfaire vos tactiques de Soule Royale">Mode Entrainement</a>
					</li>					
				</ul>
			</li>
			<li class="ui-widget">
				<a href="<?php echo $this->url(array('controller'=>'nouveautes', 'action'=>'index'));?>" title="Consultez les dernières évolutions de Soule Royale">Nouveautés</a>
			</li>
			<li class="ui-widget">
				<a href="<?php echo $this->url(array('controller'=>'informations', 'action'=>'regles'));?>" title="Découvrez la Soule Royale">Informations</a>
				<ul class="Menu" style="text-align:center;">
					<li id="sousMenu-3" class="ui-widget ui-widget-header first headlink">
						<a href="<?php echo $this->url(array('controller'=>'informations', 'action'=>'presentation-generale'));?>" title="Présentation de la Soule Royale">Présentation</a>
					</li>
					<li id="sousMenu-2" class="ui-widget ui-widget-header">
						<a href="<?php echo $this->url(array('controller'=>'informations', 'action'=>'histoire'));?>" title="Découvrez l'histoire de la Soule Royale">L'histoire</a>
					</li>
					<li id="sousMenu-1" class="ui-widget ui-widget-header">
						<a href="<?php echo $this->url(array('controller'=>'informations', 'action'=>'regles'));?>" title="Etudiez les règles de la Soule Royale">Les règles</a>
					</li>					
				</ul>
			</li>
			<li class="ui-widget ui-menu ui-menu ui-menu-item"><a href="<?php echo $this->url(array('controller'=>'contactez-nous', 'action'=>'index'));?>" title="Contactez les responsables de Soule Royale">Contactez-nous</a></li>
		</ul>
</div>
