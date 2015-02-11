<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.controller' );

class BoutiqueControllerBoutiques extends BoutiqueController
{
	
	function __construct( $default = array())
	{
		parent::__construct( $default );
		$this->registerTask( 'add', 'edit' );
	  	
	}
	
	function display() 
	{
	  	parent::display();
	}
	
	/**
	 * display the edit form
	 * @return void
	 */
	 	 
	function edit()
	{
		JRequest::setVar( 'view', 'boutique' );
		JRequest::setVar('hidemainmenu', 1);

		parent::display();
	}

	/**
	 * save a record (and redirect to main page)
	 * @return void
	 */
	function save()
	{
		$model = $this->getModel('boutique');
		if ($model->store()) {
			$msg = JText::_( 'Boutique Saved' );
		} else {
			$msg = JText::_( 'Error Saving Boutique' );
		}

		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_boutique&controller=boutiques';
		$this->setRedirect($link, $msg);
	}

	/**
	 * remove record(s)
	 * @return void
	 */
	function remove()
	{
		$model = $this->getModel('boutique');
		if(!$model->delete()) {
			$msg = JText::_( 'Error, cannot delete' );
		} else {
			$msg = JText::_( 'Deleted!' );
		}
		$this->setRedirect( 'index.php?option=com_boutique&controller=boutiques', $msg );
	}

	/**
	 * cancel editing a record
	 * @return void
	 */
	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_boutique&controller=boutiques', $msg );
	}
	
}
?>
