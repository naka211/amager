<?php

function ecommerceBuildRoute(&$query)
{	//$query['Itemid']=20;
	$segments = array();
	unset($query['component']);
	unset($query['view']);
	if(isset($query['type']))
	{
		$segments[] = $query['type'];
		unset($query['type']);
		
	}
	if(isset($query['id']))
	{
		$segments[] = $query['id'];
		unset($query['id']);
	}
	
	return $segments;
}

function ecommerceParseRoute($segments)
{
	$vars = array();
	
	if($segments[1]){
		$vars['view'] = "detail";
		$vars['type'] = intval($segments[0]);
		$vars['id'] = intval($segments[1]);
	} else {
		$vars['view'] = "cars";
		$vars['type'] = intval($segments[0]);
	}
	
	return $vars;
}
?>