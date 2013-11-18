<?php
/**
 *
 * Product controller
 *
 * @package	VirtueMart
 * @subpackage
 * @author RolandD
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: product.php 6521 2012-10-09 14:49:30Z alatak $
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

if(!class_exists('VmController'))require(JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'vmcontroller.php');


/**
 * Product Controller
 *
 * @package    VirtueMart
 * @author
 */
class VirtuemartControllerProduct extends VmController {

	/**
	 * Method to display the view
	 *
	 * @access	public
	 * @author
	 */
	function __construct() {
		parent::__construct('virtuemart_product_id');
		$this->addViewPath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_virtuemart' . DS . 'views');
	}


	/**
	 * Shows the product add/edit screen
	 */
	public function edit($layout='edit') {
		parent::edit('product_edit');
	}

	/**
	 * We want to allow html so we need to overwrite some request data
	 *
	 * @author Max Milbers
	 */
     
     function a(){
        $db = JFactory::getDBO();
        $sql="SELECT cc.category_child_id id, c.category_name name FROM #__virtuemart_category_categories cc INNER JOIN #__virtuemart_categories_da_dk c ON cc.category_child_id = c.virtuemart_category_id WHERE cc.category_parent_id = 0";
        $db->setQuery($sql);
        $pcats = $db->loadObjectList();
        $csv='';
        foreach($pcats as $pcat){
            $csv .= "\n".'"'.$pcat->name.'"';
            $sql="SELECT cc.category_child_id id, c.category_name name FROM #__virtuemart_category_categories cc INNER JOIN #__virtuemart_categories_da_dk c ON cc.category_child_id = c.virtuemart_category_id WHERE cc.category_parent_id = ".$pcat->id;
            $db->setQuery($sql);
            $ccats = $db->loadObjectList();
            foreach($ccats as $ccat){
                $csv .= "\n".'"", '.$ccat->name.'';
            }
        }
        
        header('Content-Encoding: UTF-8');
		//header("Content-Transfer-Encoding: Binary"); 
		header("Content-Type: text/csv");
		header('Content-Disposition: attachment; filename="Categories.csv"' );
		echo "\xEF\xBB\xBF";//with BOM
		echo $csv;exit;
     }
	 
	 
	 function saveExport(){
			$db = JFactory::getDBO();
			/*define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
			include JPATH_SITE.DS.'lib/Classes/PHPExcel/IOFactory.php';
			
			$file_name = 'products.csv';
			$objPHPExcel = new PHPExcel();
			
			$objPHPExcel->getProperties()->setCreator("Amager")
							 ->setLastModifiedBy("MWC")
							 ->setTitle("Products promotion")
							 ->setSubject("Products promotion")
							 ->setDescription("Products promotion Excel 2007 file")
							 ->setKeywords("MWC");*/

			$_cat = JRequest::getVar('categories', NULL);
			if($_cat == NULL){
	
				echo '<script>alert("Please!, Categories can not empty");window.history.go(-1);</script>';
				exit();
			}
			if(count($_cat) !=1){
	
				echo '<script>alert("Please!, only one category");window.history.go(-1);</script>';
				exit();
			}

			$sql="SELECT category_child_id FROM #__virtuemart_category_categories  WHERE category_parent_id=".$_cat;
			
			$db->setQuery($sql);
			$db->Query($sql);
			$child_cat = $db->loadObjectList();
			//print_r($child_cat);exit;
			//$product = array();
			
			for($i=0;$i<count($child_cat);$i++){
			
				$sql="SELECT virtuemart_product_id FROM #__virtuemart_product_categories  WHERE virtuemart_category_id=".$child_cat[$i]->category_child_id;
				$db->setQuery($sql);
				//$db->query($sql);
				$product_id[$i] = $db->loadObjectList();
				
				$sql0_1="SELECT category_name FROM #__virtuemart_categories_da_dk WHERE virtuemart_category_id=".$child_cat[$i]->category_child_id;
				$db->query("SET NAMES utf8");
				$db->setQuery($sql0_1);
				$_catname[$i] = $db->loadObjectList(); 
			}
			//print_r(count($product_id));exit;
			//print_r($product_id[]);die;
			
			for($l=0;$l<count($product_id);$l++){
				for($k=0;$k<count($product_id[$l]);$k++){
                    $sql1="SELECT pro.product_name, proSku.product_sku, proSku.variant_gruppe, proPrice.product_override_price  FROM #__virtuemart_products_da_dk AS pro,
                    #__virtuemart_products AS proSku, #__virtuemart_product_prices AS proPrice  WHERE pro.virtuemart_product_id=proSku.virtuemart_product_id AND proSku.virtuemart_product_id=proPrice.virtuemart_product_id
                    AND proSku.virtuemart_product_id=".$product_id[$l][$k]->virtuemart_product_id." GROUP BY proSku.product_sku";
                    $db->setQuery($sql1);
                    //$db->query("SET NAMES utf8");
                    $_product[$l][$k] = $db->loadObjectList();
				}

			}	  
//print_r($_product);exit;
		$csv='"Vare nr.","Varenavn","Nu-pris","Side i Avis","Variant gruppe"';
		for($j=0;$j<count($product_id);$j++){
			for($m=0;$m<count($_product[$j]);$m++){	
		
					$product_sku[$j]   		= $_product[$j][$m][0]->product_sku ;					
					$product_name[$j]  		= $_product[$j][$m][0]->product_name;			
					$product_price[$j] 		= $_product[$j][$m][0]->product_override_price;	
					$side[$j][1]	   		= explode("-",$_catname[$j][0]->category_name);
					$varriant_grupp[$j] 	= $_product[$j][$m][0]->variant_gruppe;
						//print_r($side);exit;
			$csv .= "\n".'"'.$product_sku[$j].'","'.$product_name[$j].'","'.$product_price[$j].'","'.$side[$j][1][1].'","'.$varriant_grupp[$j].'"';
			}
		}
		//die($csv);
		//die;
		//Output file
        $query = "SELECT category_name FROM #__virtuemart_categories_da_dk WHERE virtuemart_category_id = ".$_cat;
        $db->setQuery($query);
        $head_cat_name = $db->loadResult();
		header('Content-Encoding: UTF-8');
		//header("Content-Transfer-Encoding: Binary"); 
		header("Content-Type: text/csv");
		header('Content-Disposition: attachment; filename="'.$head_cat_name.'.csv"' );
		echo "\xEF\xBB\xBF";//with BOM
		echo $csv;exit;
     }
     
     function createCategory($head_cat, $num){
		 $db = JFactory::getDBO();
         $query = "SELECT category_name FROM #__virtuemart_categories_da_dk WHERE virtuemart_category_id = ".$head_cat;
         $db->setQuery($query);
		 $head_cat_name = $db->loadResult();
		 $query = 'SELECT virtuemart_category_id FROM #__virtuemart_categories_da_dk WHERE category_name = "'.$head_cat_name.'-'.$num.'"';
		 $db->setQuery($query);
		 $id = $db->loadResult();
		 if($id){
			 return $id;
		 } else {
			 $model = VmModel::getModel("category");
			 $data_arr = array(
				"vmlang" => "da-DK",
				"category_name" => "side 1",
				"published" => 1,
				"slug" => "",
				"category_description" => "",
				"ordering" => 0,
				"category_parent_id" => 120,
				//"products_per_row" => 20,
				"limit_list_start" => 0,
				"limit_list_step" => 10,
				"limit_list_max" => 0,
				"limit_list_initial" => 10,
				"category_template" => 0,
				"category_layout" => 0,
				"category_product_layout" => 0,
				"customtitle" => "",
				"metadesc" => "",
				"metakey" => "",
				"metarobot" => "",
				"metaauthor" => "",
				"searchMedia" => "",
				"media_published" => 1,
				"file_title" => "",
				"file_description" => "",
				"file_meta" => "",
				"file_url" => "images/stories/virtuemart/category/",
				"file_url_thumb" => "",
				"media_roles" => "file_is_displayable",
				"media_action" => 0,
				"file_is_category_image" => 1,
				"active_media_id" => 0,
				"option" => "com_virtuemart",
				"virtuemart_category_id" => 0,
				"task" => "apply",
				"boxchecked" => 0,
				"controller" => "category",
				"view" => "category",
				"virtuemart_vendor_id" => 1
			 );
			 $db = JFactory::getDBO();
			 $token=JSession::getFormToken();
			 $rec[$token] = 1;
			 $data_arr['category_name'] = $head_cat_name.'-'.$num;
			 $data_arr['category_parent_id'] = $head_cat;
			 $model->store($data_arr);
			 return $data_arr['virtuemart_category_id'];
		 }
     }
     
	 function saveImport(){
		
         $_data = JRequest::get('post');
         $_cat = JRequest::getVar('categories', NULL);
         $first_num = JRequest::getVar('first_num', NULL);
		 $last_num = JRequest::getVar('last_num', NULL);

        if($_cat == NULL){
        
            echo '<script>alert("Please!, Categories can not empty");window.history.go(-1);</script>';
            exit();
        } else {
	
            if (  $_FILES["file"]["error"] > 0 ){
              
              echo '<script>alert("Error: '.$_FILES["file"]["error"].'");window.history.go(-1);</script>';		  
            } else {
                $prodir = JPATH_SITE.DS."images/uploads/";
                $newfilename = $prodir.rand(99,10000).$_FILES["file"]["name"];
                move_uploaded_file($_FILES["file"]["tmp_name"],$newfilename);
                define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
                include JPATH_SITE.DS.'lib/Classes/PHPExcel/IOFactory.php';
                
                $db = JFactory::getDBO();
                $objPHPExcel = new PHPExcel();
                $inputFileName = $newfilename;
    
                $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
    
                $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                $db->query("SET NAMES utf8");
                
                //$db->query("BEGIN");
                //foreach($sheetData as $key=>$value){
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
                        "override" => array()
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
                    "product_delivery" => 0,
                    "variant_gruppe" => ''
                    
                );
        
                $db->setQuery ('SELECT mf_name name, virtuemart_manufacturer_id id FROM `#__virtuemart_manufacturers_' . VMLANG . '`');
                    $brands = $db->loadObjectList();
        
                $db->setQuery ('SELECT b.category_name pname, a.category_child_id cid, c.category_name cname
                FROM `#__virtuemart_category_categories` as a
                RIGHT JOIN `#__virtuemart_categories_' . VMLANG . '` as b ON a.category_parent_id=b.virtuemart_category_id
                RIGHT JOIN `#__virtuemart_categories_' . VMLANG . '` as c ON a.category_child_id=c.virtuemart_category_id');
                $cats = $db->loadObjectList();
        
                $db->setQuery ('SELECT virtuemart_calc_id id, calc_name num FROM `#__virtuemart_calcs`');
                $rules = $db->loadObjectList();
    
                $token=JSession::getFormToken();
                $_POST[$token]=1;
                $model = VmModel::getModel("product");
                        
                for($i=$first_num; $i<=$last_num; $i++){
                    $catid = $this->createCategory($_cat, $i);
                    for($j=2; $j<=count($sheetData); $j++) {
                        if($sheetData[$j]['R'] == $i){
                            if((!$sheetData[$j]['N']) || (strtoupper($sheetData[$j]['N'])==='FALSE')){
                                $sheetData[$j]['N'] = 0;
                            } else {
                                $sheetData[$j]['N'] = 1;
                            }
                            
                            if((!$sheetData[$j]['T']) || (strtoupper($sheetData[$j]['T'])==='FALSE')){
                                $sheetData[$j]['T'] = 0;
                            } else {
                                $sheetData[$j]['T'] = 1;
                            }

                            $sheetData[$j]['J']	    = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $sheetData[$j]['J'])));
                            $sheetData[$j]['K']		= date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $sheetData[$j]['K'])));
                            
                            $rec = $rec_frame;
                            $rec[$token] = 1;
                
                            $rec["product_name"] = mb_convert_case($sheetData[$j]['D'], MB_CASE_TITLE, "UTF-8").' - '.mb_convert_case($sheetData[$j]['B'], MB_CASE_TITLE, "UTF-8");
                            $rec["product_desc"] = mb_convert_case($sheetData[$j]['C'], MB_CASE_TITLE, "UTF-8");
                
                            foreach($brands as $o){
                                if(strtolower($o->name) == strtolower($sheetData[$j]['D'])){
                                    $sheetData[$j]['D'] = $o->id;
                                    break;
                                }
                            }
                            $rec["virtuemart_manufacturer_id"] = $sheetData[$j]['D'];
                            $rec["mprices"]["product_price"] = array($sheetData[$j]['F']);
                
                            if($sheetData[$j]['G']){
                                $tmp0 = $sheetData[$j]['G'] - $sheetData[$j]['F'];
                                foreach($rules as $o){
                                    if($o->num == $tmp0){
                                        $rec["mprices"]["product_discount_id"] = array($o->id);
                                        break;
                                    }
                                }
                            }
                            $rec["mprices"]["product_override_price"] = array($sheetData[$j]['H']);
                            if($sheetData[$j]['H']){
                                $rec["mprices"]["override"] = array(1);
                            }
                            $rec["mprices"]["product_price_publish_up"] = array($sheetData[$j]['J']);
                            $rec["mprices"]["product_price_publish_down"] = array($sheetData[$j]['K']);
                            
                            $rec["product_in_stock"] = $sheetData[$j]['L'];
                            $rec["product_sku"] = $sheetData[$j]['O'];
                            $rec["product_weight"] = $sheetData[$j]['M'];
                            $rec["published"] = $sheetData[$j]['T'];
                            $rec["product_delivery"] = $sheetData[$j]['N'];
                            $rec["variant_gruppe"] = $sheetData[$j]['S'];
                
                            foreach($cats as $o){
                                $tmp0 = $this->strEncode($o->pname);
                                $tmp1 = $this->strEncode($o->cname);
                
                                if($tmp0==$this->strEncode($sheetData[$j]['P']) AND $tmp1==$this->strEncode($sheetData[$j]['Q'])){
                                    $sheetData[$j]['Q'] = $o->cid;
                                    break;
                                }
                            }
                            $rec["categories"] = array($sheetData[$j]['Q'], $catid);
                                
                                
                            $product_id = $this->check_product($sheetData[$j]['O']);
                            if($product_id){
                                $rec["virtuemart_product_id"] = $product_id;
                            }
                            
                            $model->store($rec);
                        }
                    }
                    
                }
                
                
                if(mysql_error()){
                    echo '<script>alert("Error: '.mysql_error().'");window.history.go(-1);</script>';	
                } else {
                    unlink($newfilename);
                    echo '<script>alert("Import Successfully");window.location = "'.JURI::base().'index.php?option=com_virtuemart&view=product";</script>';	
                }
		    }
        }
    }
    
    protected function strEncode($s){
		return strtolower(mb_convert_encoding( $s, "HTML-ENTITIES", "UTF-8"));
	}
    
    function check_product($sku){
        $db = JFactory::getDBO();
        $query = "SELECT virtuemart_product_id FROM #__virtuemart_products WHERE product_sku = '".$sku."'";
        $db->setQuery($query);
        return $db->loadResult();
        //print_r($sku);exit;
    }

	function save($data = 0){
	//die;

		$data = JRequest::get('post');
		///var_dump($data);die;

		if(!class_exists('Permissions')) require(JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'permissions.php');
		if(Permissions::getInstance()->check('admin')){
			$data['product_desc'] = JRequest::getVar('product_desc','','post','STRING',2);
			$data['product_s_desc'] = JRequest::getVar('product_s_desc','','post','STRING',2);
		} else  {
			$data['product_desc'] = JRequest::getVar('product_desc','','post','STRING',2);
			$data['product_desc'] = JComponentHelper::filterText($data['product_desc']);
			$multix = Vmconfig::get('multix','none');
			if( $multix != 'none' ){
				unset($data['published']);
				unset($data['childs']);
			}

		}
		parent::save($data);
	}

	function saveJS(){
		$data = JRequest::get('get');
		JRequest::setVar($data['token'], '1', 'post');

		JRequest::checkToken() or jexit( 'Invalid Token save' );
		$model = VmModel::getModel($this->_cname);
		$id = $model->store($data);

		$errors = $model->getErrors();
		if(empty($errors)) {
			$msg = JText::sprintf('COM_VIRTUEMART_STRING_SAVED',$this->mainLangKey);
			$type = 'save';
		}
		else $type = 'error';
		foreach($errors as $error){
			$msg = ($error).'<br />';
		}
		$json['msg'] = $msg;
		if ($id) {
			$json['product_id'] = $id;

			$json['ok'] = 1 ;
		} else {
			$json['ok'] = 0 ;

		}
		echo json_encode($json);
		jExit();

	}

	/**
	 * This task creates a child by a given product id
	 *
	 * @author Max Milbers
	 */
	public function createChild(){
		$app = Jfactory::getApplication();

		/* Load the view object */
		$view = $this->getView('product', 'html');

		$model = VmModel::getModel('product');

		//$cids = JRequest::getVar('cid');
		$cids = JRequest::getVar($this->_cidName, JRequest::getVar('virtuemart_product_id',array(),'', 'ARRAY'), '', 'ARRAY');
		//jimport( 'joomla.utilities.arrayhelper' );
		JArrayHelper::toInteger($cids);

		foreach($cids as $cid){
			if ($id=$model->createChild($cid)){
				$msg = JText::_('COM_VIRTUEMART_PRODUCT_CHILD_CREATED_SUCCESSFULLY');
				$redirect = 'index.php?option=com_virtuemart&view=product&task=edit&product_parent_id='.$cids[0].'&virtuemart_product_id='.$id;
			} else {
				$msg = JText::_('COM_VIRTUEMART_PRODUCT_NO_CHILD_CREATED_SUCCESSFULLY');
				$msgtype = 'error';
				$redirect = 'index.php?option=com_virtuemart&view=product';
			}
		}
		$app->redirect($redirect, $msg, $msgtype);

	}

	/**
	* This task creates a child by a given product id
	*
	* @author Max Milbers
	*/
	public function createVariant(){

		$data = JRequest::get('get');
		JRequest::setVar($data['token'], '1', 'post');
		JRequest::checkToken() or jexit('Invalid Token, in ' . JRequest::getWord('task'));

		$app = Jfactory::getApplication();

		/* Load the view object */
		$view = $this->getView('product', 'html');

		$model = VmModel::getModel('product');

		//$cids = JRequest::getVar('cid');
		$cid = JRequest::getInt('virtuemart_product_id',0);

		if(empty($cid)){
			$msg = JText::_('COM_VIRTUEMART_PRODUCT_NO_CHILD_CREATED_SUCCESSFULLY');
// 			$redirect = 'index.php?option=com_virtuemart&view=product&task=edit&virtuemart_product_id='.$cid;
		} else {
			if ($id=$model->createChild($cid)){
				$msg = JText::_('COM_VIRTUEMART_PRODUCT_CHILD_CREATED_SUCCESSFULLY');
				$redirect = 'index.php?option=com_virtuemart&view=product&task=edit&virtuemart_product_id='.$cid;
			} else {
				$msg = JText::_('COM_VIRTUEMART_PRODUCT_NO_CHILD_CREATED_SUCCESSFULLY');
				$msgtype = 'error';
				$redirect = 'index.php?option=com_virtuemart&view=product';
			}
// 			vmdebug('$redirect '.$redirect);
			$app->redirect($redirect, $msg, $msgtype);
		}

	}

	public function massxref_sgrps(){

		$this->massxref('massxref');
	}

	public function massxref_sgrps_exe(){

		$virtuemart_shoppergroup_ids = JRequest::getVar('virtuemart_shoppergroup_id',array(),'', 'ARRAY');
		JArrayHelper::toInteger($virtuemart_shoppergroup_ids);

		$session = JFactory::getSession();
		$cids = unserialize($session->get('vm_product_ids', array(), 'vm'));

		$productModel = VmModel::getModel('product');
		foreach($cids as $cid){
			$data = array('virtuemart_product_id' => $cid, 'virtuemart_shoppergroup_id' => $virtuemart_shoppergroup_ids);
			$data = $productModel->updateXrefAndChildTables ($data, 'product_shoppergroups');
		}

		$this->massxref('massxref_sgrps');
	}

	public function massxref_cats(){
		$this->massxref('massxref');
	}

	public function massxref_cats_exe(){

		$virtuemart_cat_ids = JRequest::getVar('cid',array(),'', 'ARRAY');
		JArrayHelper::toInteger($virtuemart_cat_ids);

		$session = JFactory::getSession();
		$cids = unserialize($session->get('vm_product_ids', array(), 'vm'));

		$productModel = VmModel::getModel('product');
		foreach($cids as $cid){
			$data = array('virtuemart_product_id' => $cid, 'virtuemart_category_id' => $virtuemart_cat_ids);
			$data = $productModel->updateXrefAndChildTables ($data, 'product_categories',TRUE);
		}

		$this->massxref('massxref_cats');
	}

	/**
	 *
	 */
	public function massxref($layoutName){

		JRequest::checkToken() or jexit('Invalid Token, in ' . JRequest::getWord('task'));

		$cids = JRequest::getVar('virtuemart_product_id',array(),'', 'ARRAY');
		JArrayHelper::toInteger($cids);
		if(empty($cids)){
			$session = JFactory::getSession();
			$cids = unserialize($session->get('vm_product_ids', '', 'vm'));
		} else {
			$session = JFactory::getSession();
			$session->set('vm_product_ids', serialize($cids),'vm');
		}

		if(!empty($cids)){
			$q = 'SELECT `product_name` FROM `#__virtuemart_products_' . VMLANG . '` ';
			$q .= ' WHERE `virtuemart_product_id` IN (' . implode(',', $cids) . ')';

			$db = JFactory::getDbo();
			$db->setQuery($q);

			$productNames = $db->loadResultArray();

			vmInfo('COM_VIRTUEMART_PRODUCT_XREF_NAMES',implode(', ',$productNames));
		}

		$this->addViewPath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_virtuemart' . DS . 'views');
		$document = JFactory::getDocument();
		$viewType = $document->getType();
		$view = $this->getView($this->_cname, $viewType);

		$view->setLayout($layoutName);

		$this->display();
	}

	/**
	 * Clone a product
	 *
	 * @author RolandD, Max Milbers
	 */
	public function CloneProduct() {
		$mainframe = Jfactory::getApplication();

		/* Load the view object */
		$view = $this->getView('product', 'html');

		$model = VmModel::getModel('product');
		$msgtype = '';
		//$cids = JRequest::getInt('virtuemart_product_id',0);
		$cids = JRequest::getVar($this->_cidName, JRequest::getVar('virtuemart_product_id',array(),'', 'ARRAY'), '', 'ARRAY');
		//jimport( 'joomla.utilities.arrayhelper' );
		JArrayHelper::toInteger($cids);

		foreach($cids as $cid){
			if ($model->createClone($cid)) {
				$msg = JText::_('COM_VIRTUEMART_PRODUCT_CLONED_SUCCESSFULLY');
			} else {
				$msg = JText::_('COM_VIRTUEMART_PRODUCT_NOT_CLONED_SUCCESSFULLY');
				$msgtype = 'error';
			}
		}

		$mainframe->redirect('index.php?option=com_virtuemart&view=product', $msg, $msgtype);
	}


	/**
	 * Get a list of related products, categories
	 * or customfields
	 * @author RolandD
	 * Kohl Patrick
	 */
	public function getData() {

		/* Create the view object. */
		$view = $this->getView('product', 'json');

		/* Now display the view. */
		$view->display(NULL);
	}

	/**
	 * Add a product rating
	 * @author RolandD
	 */
	public function addRating() {
		$mainframe = Jfactory::getApplication();

		/* Get the product ID */
		// 		$cids = array();
		$cids = JRequest::getVar($this->_cidName, JRequest::getVar('virtuemart_product_id',array(),'', 'ARRAY'), '', 'ARRAY');
		jimport( 'joomla.utilities.arrayhelper' );
		JArrayHelper::toInteger($cids);
		// 		if (!is_array($cids)) $cids = array($cids);

		$mainframe->redirect('index.php?option=com_virtuemart&view=ratings&task=add&virtuemart_product_id='.$cids[0]);
	}


	public function ajax_notifyUsers(){

		//vmdebug('updatestatus');
		
		$virtuemart_product_id = (int)JRequest::getVar('virtuemart_product_id', 0);
		$subject = JRequest::getVar('subject', '');
		$mailbody = JRequest::getVar('mailbody',  '');
		$max_number = (int)JRequest::getVar('max_number', '');
		
		$waitinglist = VmModel::getModel('Waitinglist');
		$waitinglist->notifyList($virtuemart_product_id,$subject,$mailbody,$max_number);
		exit;
	}
	
	public function ajax_waitinglist() {
		
		$virtuemart_product_id = (int)JRequest::getVar('virtuemart_product_id', 0);

		$waitinglistmodel = VmModel::getModel('waitinglist');
		$waitinglist = $waitinglistmodel->getWaitingusers($virtuemart_product_id);

		if(empty($waitinglist)) $waitinglist = array();
		
		echo json_encode($waitinglist);
		exit;

		/*
		$result = array();
		foreach($waitinglist as $wait) array_push($result,array("virtuemart_user_id"=>$wait->virtuemart_user_id,"notify_email"=>$wait->notify_email,'name'=>$wait->name,'username'=>$wait->username));
		
		echo json_encode($result);
		exit;
		*/
	}


}
// pure php no closing tag
