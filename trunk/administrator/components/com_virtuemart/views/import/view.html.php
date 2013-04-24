<?php
if( !defined( '_JEXEC' ) ) die('Restricted access');

if(!class_exists('VmView'))require(JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'vmview.php');

class VirtuemartViewImport extends VmView {

	protected $form;

	function display($tpl = null){
		parent::display($tpl);
	}
}
