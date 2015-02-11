<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class BoutiqueViewBoutiques extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title('Boutiques');
		JToolBarHelper::deleteList();
		JToolBarHelper::addNew('add');
		// Get data from the model
		$boutiques	= & $this->get( 'List');

		$page = &$this->get('Pagination');

		$limitstart = JRequest::getVar('limitstart', '0', '', 'int');
	
		$this->assignRef('page', $page);
		$this->assignRef('boutiques', $boutiques);

		parent::display($tpl);
	}
}