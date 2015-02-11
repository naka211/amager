<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');

class BoutiqueViewShop extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;
		$model = &$this->getModel();
		
		$shops = $model->getList();	
					
		$this->assignRef('shops', $shops);		
		
		parent::display($tpl);	
	}
}
?>