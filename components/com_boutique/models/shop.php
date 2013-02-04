<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ecommerce'.DS.'tables');	

class BoutiqueModelShop extends JModel
{

	function __construct()
	{
		global $mainframe;
		parent::__construct();
	}
	function getList()
	{
		if(!$this->_product)
		{		
			global $mainframe;
			
			$query = "SELECT * FROM #__boutique" ;
			//print_r($query);exit();
			$this->_db->setQuery($query);	
			$this->_product = $this->_db->loadObjectList();//print_r($this->_product); exit();
			
			return $this->_product;
		}
	}
}
?>