<script language="javascript" type="text/javascript">
var MenuOuvert=false;

function ouvreMenu()
{
	MenuOuvert=true;
	document.getElementById("bouton_menu").style.top='0px';
	
	element=document.getElementById('menu_deroulant');
	element.src= 'images/fermemenu.png';
	element.setAttribute('onMouseover',"this.src='images/fermemenu_over.png'");
	element.onmouseover= function(){element.src='images/fermemenu_over.png';}
	element.setAttribute('onMouseout',"this.src='images/fermemenu.png'");
	element.onmouseout= function(){element.src='images/fermemenu.png';}

	element.title=element.alt='Fermer le Menu';
}

function fermeMenu()
{
	MenuOuvert=false;
	document.getElementById("bouton_menu").style.top='-42px';	

	element.src='images/ouvremenu.png';
	element.setAttribute('onMouseover',"this.src='images/ouvremenu_over.png'");
	element.onmouseover= function(){element.src='images/ouvremenu_over.png'};

	element.setAttribute('onMouseout',"this.src='images/ouvremenu.png'");
	element.onmouseout= function(){element.src='images/ouvremenu.png';}

	element.title=element.alt='Ouvrir le Menu';
}

function gestionMenu()
{
	if(MenuOuvert) fermeMenu();
	else ouvreMenu();
}
</script>

<div id="div_menu" style="text-align: center; width:120px;position:absolute; z-index:1; top:10px; overflow:hidden; overflow-x:hidden; overflow-y:hidden;">
<table style='width:100%;text-align:center' cellspacing='1' border='0'>
       <tr>
           <td width='100%' align='center'>
           		<div id="bouton_menu" style="position:relative; top:-42px; vertical-align:middle;">
                	<a href="index.html"><img src="images/home.png"  id="home" border="0" width="32" height="32" alt="Retour à la page d'acceuil" title="Retour à la page d'acceuil"></a>&nbsp;&nbsp;<a href="videos.php"><img src="images/video.png"  id="video" border="0" width="32" height="32" alt="Accéder à la vidéothéque" title="Accéder à la vidéothéque"></a>&nbsp;&nbsp;<a href="accueil.php"><img src="images/photo.png" id="photo" border="0" width="32" height="32" alt="Accéder à la galerie photo" title="Accéder à la galerie photo" /></a>
                    <br />
                	<img src="images/ouvremenu.png" id="menu_deroulant" border="0" width="16" height="16"
                    	onclick="gestionMenu();"
						onmouseover="document.getElementById('menu_deroulant').src='images/ouvremenu_over.png';"
		 				onmouseout="document.getElementById('menu_deroulant').src='images/ouvremenu.png';">
                </div>
                <script language="javascript" type="text/javascript">
					var l_left = Number(window.innerWidth/2)-60;
					document.getElementById('div_menu').style.left=l_left+'px';
				</script>                
           </td>
       </tr>
</table>
</div>

