<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include_once $rootPath."structure/parametres.php";?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title><?php echo $title?></title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
		<meta content="<?php echo $desc;?>" name="description" />
		<meta content="<?php echo $meta;?>" name="keywords" />
		<meta name="google-site-verification" content="56cytVXDw0y8KZGKOfFXMyzLYGp6Y7Ooz-ffGeHENjQ" />

		<link rel="stylesheet" type="text/css" href="<?php echo $css;?>custom-theme/jquery-ui-1.8.18.custom.css"  />
		<link rel="stylesheet" type="text/css" href="<?php echo $css;?>Main.css"  />
		<link rel="stylesheet" type="text/css" href="<?php echo $css;?>Menu-Horizontal.css"  />
		<link rel="stylesheet" type="text/css" href="<?php echo $css;?>li-scroll.1.0.css"  />
	
		<script type="text/javascript" src="<?php echo $js;?>jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="<?php echo $js;?>jquery-ui-1.8.18.custom.min.js"></script>
		<script type="text/javascript" src="<?php echo $js;?>menu.js"></script>
		<script type="text/javascript" src="<?php echo $js;?>jquery.li-scroll.1.0.js"></script>
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