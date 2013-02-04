<?php
/**
*    Images Saler - Component
*    Author : hm_advert@ymail.com
*    
**/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.client.helper');
jimport('joomla.application.component.model');

class BoutiqueModelBoutique extends JModel
{
	
	var $_id = null;
	var $_table = '#__boutique';
	var $_lists = '';
	var $_data = null;
		
	function __construct()
	{
		parent::__construct();

		$array = JRequest::getVar('cid',  0, '', 'array');
		$this->setId((int)$array[0]);
		
	}

	function setId($id)
	{
		$this->_id		= $id;
	}
	
	
	function &getData()
	{
		$query = ' SELECT * FROM #__boutique '.
					'  WHERE id = '.$this->_id;
					
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();	
			
		
		return $this->_data;
	}
	
	

	function store()	{
		global $mainframe;
		$row =& $this->getTable();
		if(!$row->bind(JRequest::get('post'))){
			echo '<script>alert("'.$row->getError().'");window.history.go(-1);</script>\n';
			exit();
		}
		
		//all these lines are used to avoid lost data form post
		$row->name = JRequest::getVar('name');
		$row->lat = JRequest::getVar('lat');
		$row->lng = JRequest::getVar('lng');
		$row->information  = JRequest::getVar('information','','post','string',JREQUEST_ALLOWRAW);
		$row->description  = JRequest::getVar('description','','post','string',JREQUEST_ALLOWRAW);
		$row->opening  = JRequest::getVar('opening','','post','string',JREQUEST_ALLOWRAW);
		

		if($_FILES['txtimage']['name']){
			$rand_image = mt_rand();
			$row->image = $rand_image.$_FILES['txtimage']['name'];
		} else {
			$row->image = JRequest::getVar('image');
		}
		
		//print_r($row);exit();	
		if(!$row->store()){
			echo '<script>alert("'.$row->getError().'");window.history.go(-1);</script>';
			exit();
		}
		else
		{
			/*$row->checkin();
			$row->reorder();*/
			$prodir = "../components/com_boutique/img/";
				
			$image = JRequest::getVar('image','','post','string');
			if($image!="" && $_FILES['txtimage']['name'])
			{
				unlink($prodir.$image);
			} 
			$desphoto = $prodir.$rand_image.$_FILES['txtimage']['name'];
			move_uploaded_file($_FILES['txtimage']['tmp_name'], $desphoto);
			
			return true;
		}
	}

	function delete()
	{
		global $mainframe;
		$cid = JRequest::getVar('cid',array(),'','array');
		$db = JFactory::getDBO();
		if(count($cid)> 0 )
		{
			$cids = implode(',',$cid);

			$query = "select * from #__boutique where id in ($cids)";
			$db->setQuery($query);
			$row = $db->loadObjectList();
						
			foreach ($row as $_file)
			{
				$prodir = "../components/com_boutique/img/";
				if(file_exists($prodir . $_file->image))
				{
					unlink($prodir . $_file->image);
				}
				if(file_exists($prodir . $_file->logo))
				{
					unlink($prodir . $_file->logo);
				}
			}
			$query = "DELETE FROM #__boutique WHERE id in ($cids)";
			$db->setQuery($query);
			if(!$db->query())
			{
				echo "<script> alert('".$db->getErrorMsg()."');window.history.go(-1); </script>\n";
			}
			$row =& $this->getTable();
			$row->checkin();
			$row->reorder();
		}

		return true;
	}
}

?>