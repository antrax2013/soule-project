<?php
/** 
* @fn BoolToString($a_bool)
* @brief function transformat un bool en string
* @param [bool] $a_bool, le booleen à transofmer
* @return [string] renvoie "true" ou "false"
*/	
function BoolToString($a_bool)
{
	if($a_bool) return "true";
	if($a_bool==null) return "null";
	return "false";
}
?>