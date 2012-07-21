<div id="Navigation-Menu" class="ui-accordion ui-widget">
	<h3 class="ui-accordion-header ui-helper-reset" id="Current-Navigation" >
		<a href="<?php echo $rootPath?>index.php" title="soule.royale.free.fr" style="padding-left:2em"><span class="ui-icon ui-icon-triangle-1-e">&nbsp;</span>
		<?php 
			$txt=$_SERVER["PHP_SELF"] ;
			$txt=split("[/.]",$txt);
			echo ucfirst(str_replace("-", " ",$txt[count($txt)-2]));
		?>
		</a>
	</h3>					
</div>