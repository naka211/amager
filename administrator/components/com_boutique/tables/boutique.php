<?php
defined('_JEXEC') or die('Restricted access');
class TableBoutique extends JTable{
	var $id = null;
	var $name = null;
	var $information = null;
	var $description = null;
	var $opening = null;
	var $image = null;
	var $lat = null;
	var $lng = null;
		
 	function __construct(&$db){
		parent::__construct('#__boutique', 'id', $db);
	}
}
?>
