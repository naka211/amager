<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class BoutiqueViewBoutique extends JView
{
	function display($tpl = null)
	{
		$boutique = $this->get('data');
			
		JToolBarHelper::title('Boutique');

		JToolBarHelper::save();
		JToolBarHelper::cancel( 'cancel', 'close' );

		$this->assignRef('boutique', $boutique);
		parent::display($tpl);
	}
}