$(function()
{
    $("input").blur(function()
    {
        var formElementId = $(this).parent().prev().find('label').attr('for');
		
		doValidation(formElementId);
    });
});
function doValidation(id)
{
    var url = '/contactez-nous/validateform';
    var data = {};
    
	$("input").each(function()
    {
        data[$(this).attr('name')] = $(this).val();
    });
	
	//console.log(data);
	$.post(url,data,function(resp)
    {
        
		$("#"+id).parent().next().find('.errors').remove();        
		$("#"+id).parent().next('td').append(getErrorHtml(resp[id], id));
    },'json');
}
function getErrorHtml(formErrors , id)
{
    var o = '<span id="errors-'+id+'" class="errors">';
    for(errorKey in formErrors)
    {
        o += formErrors[errorKey];
    }
    o += '</span>';
    return o;
}