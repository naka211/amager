<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

function pagination_list_render($list)
{
	echo '<pre>',print_r($list),'</pre>';
	$html = '<ul>';
	if($list['pages'][1]["active"]==1){
		$html .= '<li class="pagination-start">' . $list['start']['data'] . '</li>
		<li class="pagination-prev">' . $list['previous']['data'] . '</li>';
	}

	foreach ($list['pages'] as $page)
		$html .= '<li>' . $page['data'] . '</li>';

	if(end($list['pages'])["active"]==1){
		$html .= '<li class="pagination-next">' . $list['next']['data'] . '</li>
		<li class="pagination-end">' . $list['end']['data'] . '</li>';
	}
	$html .= '</ul>';

	return $html;
}
?>