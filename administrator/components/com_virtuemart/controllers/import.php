<?php
if( !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );
// Load the controller framework
jimport('joomla.application.component.controller');

if(!class_exists('VmController'))require(JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'vmcontroller.php');

class VirtuemartControllerImport extends VmController {

	function __constuct(){
		parent::__construct();
	}

	protected function strEncode($s){
		return strtolower(mb_convert_encoding( $s, "HTML-ENTITIES", "UTF-8"));
	}

	protected function getItems(){
		$f=JPATH_ROOT.'/images/inf/index.xlsx';
		if(file_exists($f)){
			include(JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'simplexlsx.class.php');
			$data = new SimpleXLSX($f);
			$data=$data->rows();
			array_shift($data);

			return $data;
		}
	}

	function chkImport(){

		$rec_frame=array(
			"vmlang" => "da-DK",
			"published" => 1,
			"product_special" => 0,
			"product_sku" => '',//X
			"product_name" => '',//X
			"slug" => '',
			"product_url" => '',
			"virtuemart_manufacturer_id" => '',//X
			"categories" => array(),//X
			"ordering" => 0,
			"layout" => 0,
			"mprices" => array(
				"product_price" => array(),//X
				"virtuemart_product_price_id" => array(),
				"product_currency" => array(40),
				"virtuemart_shoppergroup_id" => array(),
				"basePrice" => array(),
				"product_tax_id" => array(),
				"salesPrice" => array(),//X
				"product_discount_id" => array(-1),
				"product_price_publish_up" => array(),
				"product_price_publish_down" => array(),
				"product_override_price" => array(),
				"price_quantity_start" => array(),
				"price_quantity_end" => array(),
			),
			"intnotes" => '',//X
			"product_s_desc" => '',
			"product_desc" => '',//X
			"customtitle" => '',
			"metadesc" => '',
			"metakey" => '',
			"metarobot" => '',
			"metaauthor" => '',
			"product_in_stock" => '',//X
			"product_ordered" => '',//unsure
			"low_stock_notification" => 0,
			"min_order_level" => '',
			"max_order_level" => '',
			"product_available_date" => date("Y-m-d"),
			"product_availability" => '',
			"image" => '',
			"customer_email_type" => "customer",
			"notification_template" => 1,
			"notify_number" => '',
			"product_length" => 0,
			"product_lwh_uom" => "M",
			"product_width" => 0,
			"product_height" => 0,
			"product_weight" => '',//X
			"product_weight_uom" => "KG",
			"product_packaging" => '',
			"product_unit" => "KG",
			"product_box" => '',
			"searchMedia" => '',
			"media_published" => 1,
			"file_title" => '',
			"file_description" => '',
			"file_meta" => '',
			"file_url" => "images/stories/virtuemart/product/",
			"file_url_thumb" => '',
			"media_roles" => "file_is_displayable",
			"media_action" => 0,
			"file_is_product_image" => 1,
			"active_media_id" => 0,
			"option" => "com_virtuemart",
			"save_customfields" => 1,
			"search" => '',
			"task" => "save",
			"boxchecked" => 0,
			"controller" => "product",
			"view" => "product",
			"virtuemart_product_id" => 0,
			"product_parent_id" => 0,
		);

		$db = & JFactory::getDBO();

		$db->setQuery ('SELECT mf_name name, virtuemart_manufacturer_id id FROM `#__virtuemart_manufacturers_' . VMLANG . '`');
			$brands = $db->loadRowList();

		$db->setQuery ('SELECT b.category_name pname, a.category_child_id cid, c.category_name cname
		FROM `#__virtuemart_category_categories` as a
		RIGHT JOIN `#__virtuemart_categories_' . VMLANG . '` as b ON a.category_parent_id=b.virtuemart_category_id
		RIGHT JOIN `#__virtuemart_categories_' . VMLANG . '` as c ON a.category_child_id=c.virtuemart_category_id');
			$cats = $db->loadRowList();

		$db->setQuery ('SELECT virtuemart_calc_id id, calc_name num FROM `#__virtuemart_calcs`');
			$rules = $db->loadRowList();

			$token=JSession::getFormToken();
			$_POST[$token]=1;
			$model = VmModel::getModel("product");
			$dat = $this->getItems();
			if(!$dat)
				return;

		foreach($dat as $r){
			$rec= $rec_frame;
			$rec[$token]=1;

			$rec["product_name"] = $r[0];
			$rec["product_desc"] = $r[1];

			foreach($brands as $o)
				if($o[0]==$r[2]){
					$r[2]=$o[1];
					break;
				}
			$rec["virtuemart_manufacturer_id"] = $r[2];
			$rec["mprices"]["product_price"] = array($r[3]);

			if($r[4]){
				$tmp0=$r[4]-$r[3];
				foreach($rules as $o){
					if($o[1]==$tmp0){
						$rec["mprices"]["product_discount_id"] = array($o[0]);
						break;
					}
				}
			}
			$rec["product_in_stock"] = $r[7];
			$rec["intnotes"] = $r[8];
			$rec["product_sku"] = $r[9];
			$rec["product_weight"] = $r[10];

			foreach($cats as $o){
				$tmp0=$this->strEncode($o[0]);
				$tmp1=$this->strEncode($o[2]);

				if($tmp0==$this->strEncode($r[12]) AND $tmp1==$this->strEncode($r[13])){
					$r[13]=$o[1];
					break;
				}
			}
			$rec["categories"] = array($r[13]);

			$model->store($rec);
		}
		$this->setRedirect(JRoute::_('index.php?option=com_virtuemart&view=product', false));
	}
}