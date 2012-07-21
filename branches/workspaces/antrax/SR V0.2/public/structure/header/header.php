<?php 
include_once $rootPath."structure/parametres.php";

	echo $this->doctype();
	echo "<head>";	
	echo $this->headTitle();
	echo $this->headMeta();
	echo $this->headLink(); //Ajout CSS
	echo $this->headScript(); //Ajout Javascript
	echo $this->jQuery();
?>
	<script type="text/javascript">
		//<![CDATA[
		$(document).ready(function(){
			loadMenu();
			$("ul#News-Scroll").liScroll();
			$("button,input:submit,input:button,.button").button();
			/*if (navigator.appName!="Microsoft Internet Explorer"){
				$("[id*=Suppbtn_],[id*=Modifbtn_]").button({
					text: false
				});	
			}*/
		});
		//GOOGLE ANALYTICS
		var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-30969691-1']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		//GOOGLE +1
		window.___gcfg = {lang: 'fr'};
		  (function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		  })();
		//]]>
	</script>
</head>
<body>	
	<div id="Wrapper" class="ui-corner-all">
		<?php include_once "content-header.php"?>