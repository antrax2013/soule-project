var obj = null;

function checkHover() {
	if (obj) {
		obj.find('ul').fadeOut('fast');	
	} //if
} //checkHover

function loadMenu() {
	$('#Nav > li').hover(function() {
		if (obj) {
			obj.find('ul').fadeOut('fast');
			obj = null;
		} //if
		
		$(this).find('ul').fadeIn('fast');
	}, function() {
		obj = $(this);
		setTimeout(
			"checkHover()",
			0); // si vous souhaitez retarder la disparition, c'est ici
	});
	if(jQuery.browser.msie) $('#Nav').find('ul.Menu').css('left', '-0.1em');
}

window.onload = function()
	{
		var lis = document.getElementsByTagName('li');
		for(i = 0; i < lis.length; i++)
		{
			var li = lis[i];
			if (li.className == 'headlink')
			{
				li.onmouseover = function() { this.getElementsByTagName('ul').item(0).style.display = 'block'; }
				li.onmouseout = function() { this.getElementsByTagName('ul').item(0).style.display = 'none'; }
			}
		}
	}

$(document).ready(function(){
		$('li.headlink').hover(
			function() { $('ul', this).css('display', 'block'); },
			function() { $('ul', this).css('display', 'none'); });
	});