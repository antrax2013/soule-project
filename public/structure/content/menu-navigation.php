<div id="Navigation-Menu" class="ui-accordion ui-widget">
	<h3 class="ui-accordion-header ui-helper-reset" id="Current-Navigation" >
		<a href="<?php echo $this->url(array('controller'=>$this->controller, 'action'=>$this->action));?>" title="<?php echo $this->siteName()?>" style="padding-left:2em"><span class="ui-icon ui-icon-triangle-1-e">&nbsp;</span>
		<?php 
			$action = Zend_Controller_Front::getInstance()->getRequest()->getActionName();
			$controller = Zend_Controller_Front::getInstance()->getRequest()->getControllerName();
			$txt=$controller.($action != "index"? "/".$action:"");			
			$txt=preg_split("/[\/\.]+/",$txt);
			echo ucfirst(str_replace("-", " ",implode ($txt , " | " )));
		?>
		</a>
	</h3>					
</div>