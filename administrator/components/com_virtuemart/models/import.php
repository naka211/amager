<?php
if (!defined ('_JEXEC')) {
	die('Direct Access to ' . basename (__FILE__) . ' is not allowed.');
}

if (!class_exists ('VmModel')) {
	require(JPATH_VM_ADMINISTRATOR . DS . 'helpers' . DS . 'vmmodel.php');
}

class VirtuemartModelImport extends VmModel {

	public function getForm($data = array(), $loadData = true){
		return $this->loadForm('com_virtuemart.import', 'import', array('control' => 'jform', 'load_data' => $loadData));
		echo "fuck";
	}

	protected function loadFormData(){

		$data = JFactory::getApplication()->getUserState('com_virtuemart.edit.import.data', array());

		if (empty($data)){
			echo "getItem<br>";
			$data = $this->getItem();
		}

		return $data;
	}

	function renderXlsxSelectList(){
		$files = JFolder::files( JPATH_ROOT.'/images/inf', '.xlsx', false, true);
		foreach ($files as $name => $value) {
			$options[] = JHTML::_ ('select.option', $name, JText::_ ($value['name']), 'text', 'value');
		}
	}

	public function renderDateSelectList () {

		// simpledate select
		$select = '';
		$options = array(JHTML::_ ('select.option', 'none', '- ' . JText::_ ('COM_VIRTUEMART_REPORT_SET_PERIOD') . ' -', 'text', 'value'));

		$app = JFactory::getApplication ();
		$select = $app->getUserStateFromRequest ('com_virtuemart.revenue.period', 'period', 'last30', 'string');

		foreach ($this->date_presets as $name => $value) {
			$options[] = JHTML::_ ('select.option', $name, JText::_ ($value['name']), 'text', 'value');
		}
		$listHTML = JHTML::_ ('select.genericlist', $options, 'period', 'size="7" class="inputbox" onchange="this.form.submit();" ', 'text', 'value', $select);
		//$listHTML = JHTML::_ ('select.genericlist', $options, 'period', 'size="7" class="inputbox" ', 'text', 'value', $select);

		return $listHTML;
	}

	public function renderOrderstatesList () {

		$orderstates = JRequest::getVar ('order_status_code', 'C');
		//print_r($orderstates);
		$query = 'SELECT `order_status_code` as value, `order_status_name` as text
			FROM `#__virtuemart_orderstates`
			WHERE published=1 ';
		$this->_db->setQuery ($query);
		$list = $this->_db->loadObjectList ();
		//$html = VmHTML::select ('order_status_code[]', $list, $orderstates, 'size="7" class="inputbox" onchange="this.form.submit();" multiple="multiple"');
		$html = VmHTML::select ('order_status_code[]', $list, $orderstates, 'size="7" class="inputbox"  multiple="multiple"');
		return $html;
	}

	public function renderIntervalsList () {

		$intervals = JRequest::getWord ('intervals', 'day');

		$options = array();
		$options[] = JHTML::_ ('select.option', JText::_ ('COM_VIRTUEMART_PRODUCT_S'), 'product_s');
		$options[] = JHTML::_ ('select.option', JText::_ ('COM_VIRTUEMART_ORDERS'), 'orders');
		$options[] = JHTML::_ ('select.option', JText::_ ('COM_VIRTUEMART_REPORT_INTERVAL_GROUP_DAILY'), 'day');
		$options[] = JHTML::_ ('select.option', JText::_ ('COM_VIRTUEMART_REPORT_INTERVAL_GROUP_WEEKLY'), 'week');
		$options[] = JHTML::_ ('select.option', JText::_ ('COM_VIRTUEMART_REPORT_INTERVAL_GROUP_MONTHLY'), 'month');
		$options[] = JHTML::_ ('select.option', JText::_ ('COM_VIRTUEMART_REPORT_INTERVAL_GROUP_YEARLY'), 'year');
		//$listHTML = JHTML::_ ('select.genericlist', $options, 'intervals', 'class="inputbox" onchange="this.form.submit();" size="5"', 'text', 'value', $intervals);
		$listHTML = JHTML::_ ('select.genericlist', $options, 'intervals', 'class="inputbox" size="6"', 'text', 'value', $intervals);
		return $listHTML;
	}
}
