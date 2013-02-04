<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );
class BoutiqueModelBoutiques extends JModel
{
	var $_data = null;
	var $_table = '#__boutique';
	var $_list = null; 
	var $_page = null;
	var $_search = null;

	function &getTable()
	{
		if ($this->_table == null) {
			$this->_table = JTable::getInstance('boutique', $this->getDBO() );
		}
		return $this->_table;
	}

	function getList()
	{
		if (!empty($this->_list)) {
			return $this->_list;
		}

		// Initialize variables
		$db		=& $this->getDBO();
		
		// Get the total number of records
		$query = 'SELECT COUNT(*) FROM #__boutique '; //print $query ;
		$db->setQuery($query);
		$total = $db->loadResult();
		
		// Create the pagination object
		jimport('joomla.html.pagination');
		$this->_page = new JPagination($total, $limitstart, $limit);

		// Get the articles
		$query = 'SELECT * ' .
				' FROM #__boutique';
		//print_r ($query);
		$db->setQuery($query, $this->_page->limitstart, $this->_page->limit);
		$this->_list = $db->loadObjectList();

		//If there is a db query error, throw a HTTP 500 and exit
		if ($db->getErrorNum()) {
			JError::raiseError( 500, $db->stderr() );
			return false;
		}

		return $this->_list;
	}
	
	function getPagination()
	{
		if (is_null($this->_list) || is_null($this->_page)) {
			$this->getList();
		}
		return $this->_page;
	}
}

?>
