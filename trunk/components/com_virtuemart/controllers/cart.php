<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

// Load the controller framework
jimport('joomla.application.component.controller');

/**
 * Controller for the cart view
 *
 * @package VirtueMart
 * @subpackage Cart
 * @author RolandD
 * @author Max Milbers
 */
class VirtueMartControllerCart extends JController {

	/**
	 * Construct the cart
	 *
	 * @access public
	 * @author Max Milbers
	 */
	public function __construct() {
		parent::__construct();
		if (VmConfig::get('use_as_catalog', 0)) {
			$app = JFactory::getApplication();
			$app->redirect('index.php');
		} else {
			if (!class_exists('VirtueMartCart'))
			require(JPATH_VM_SITE . DS . 'helpers' . DS . 'cart.php');
			if (!class_exists('calculationHelper'))
			require(JPATH_VM_ADMINISTRATOR . DS . 'helpers' . DS . 'calculationh.php');
		}
		$this->useSSL = VmConfig::get('useSSL', 0);
		$this->useXHTML = true;
	}

	/**
	 * Add the product to the cart
	 *
	 * @author RolandD
	 * @author Max Milbers
	 * @access public
	 */
	public function add() {
		$mainframe = JFactory::getApplication();
		if (VmConfig::get('use_as_catalog', 0)) {
			$msg = JText::_('COM_VIRTUEMART_PRODUCT_NOT_ADDED_SUCCESSFULLY');
			$type = 'error';
			$mainframe->redirect('index.php', $msg, $type);
		}
		$cart = VirtueMartCart::getCart();
		if ($cart) {
			$virtuemart_product_ids = JRequest::getVar('virtuemart_product_id', array(), 'default', 'array');
			$success = true;
			if ($cart->add($virtuemart_product_ids,$success)) {
				$msg = JText::_('COM_VIRTUEMART_PRODUCT_ADDED_SUCCESSFULLY');
				$type = '';
			} else {
				$msg = JText::_('COM_VIRTUEMART_PRODUCT_NOT_ADDED_SUCCESSFULLY');
				$type = 'error';
			}

			$mainframe->enqueueMessage($msg, $type);
			$mainframe->redirect(JRoute::_('index.php?option=com_virtuemart&view=cart'));

		} else {
			$mainframe->enqueueMessage('Cart does not exist?', 'error');
		}
	}
    
    function add_ipaper(){
        $db = JFactory::getDBO();
        $xml = simplexml_load_string(preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>', $_POST['basket']),'SimpleXMLElement', LIBXML_NOCDATA);
        $virtuemart_product_ids = array();
        $quantities = array();
        foreach($xml->item as $item){
            $query = "SELECT virtuemart_product_id FROM #__virtuemart_products WHERE product_sku = '".$item->productid."'";
            $db->setQuery($query);
            $product_id = $db->loadResult();
            array_push($virtuemart_product_ids, $product_id);
            array_push($quantities, $item->amount);
        }
        $cart = VirtueMartCart::getCart();
        $success = true;
        $cart->add($virtuemart_product_ids, $success, $quantities);

        $mainframe = JFactory::getApplication();
        $mainframe->redirect('index.php/user/editaddresscheckoutBT.html');
    }
    
    function requestPostdanmark(){
        $post = JRequest::getVar('post');
        echo file_get_contents('http://api.postnord.com/wsp/rest/BusinessLocationLocator/Logistics/ServicePointService_1.0/findNearestByAddress.json?consumerId=454d8060-0a7d-4fdd-b0c9-165d518adc90&countryCode=DK&postalCode='.$post);       
        exit;
    }

	/**
	 * Add the product to the cart using Ajax
	 */
	public function addAJAX() {
		$mainframe = JFactory::getApplication();
		if (VmConfig::get('use_as_catalog', 0)) {
			$msg = JText::_('COM_VIRTUEMART_PRODUCT_NOT_ADDED_SUCCESSFULLY');
			$type = 'error';
			$mainframe->redirect('index.php', $msg, $type);
		}
		$cart = VirtueMartCart::getCart();
		if ($cart) {
			$virtuemart_product_ids = JRequest::getVar('virtuemart_product_id', array(), 'default', 'array');
			$success = true;
			if ($cart->add($virtuemart_product_ids,$success)) {
				$msg = JText::_('COM_VIRTUEMART_PRODUCT_ADDED_SUCCESSFULLY');
				$type = '';
			} else {
				$msg = JText::_('COM_VIRTUEMART_PRODUCT_NOT_ADDED_SUCCESSFULLY');
				$type = 'error';
			}

			$mainframe->enqueueMessage($msg, $type);

		} else {
			$mainframe->enqueueMessage('Cart does not exist?', 'error');
		}
	}

	/**
	 * Add the product to the cart, with JS
	 *
	 * @author Max Milbers
	 * @access public
	 */
	public function addJS() {

		//maybe we should use $mainframe->close(); or jexit();instead of die;
		/* Load the cart helper */
		//require_once(JPATH_VM_SITE.DS.'helpers'.DS.'cart.php');
		$this->json = new stdClass();
		$cart = VirtueMartCart::getCart(false);
		if ($cart) {
			// Get a continue link */
			$virtuemart_category_id = shopFunctionsF::getLastVisitedCategoryId();
			if ($virtuemart_category_id) {
				$categoryLink = '&view=category&virtuemart_category_id=' . $virtuemart_category_id;
			} else
			$categoryLink = '';
			$continue_link = JRoute::_('index.php?option=com_virtuemart' . $categoryLink);
			$virtuemart_product_ids = JRequest::getVar('virtuemart_product_id', array(), 'default', 'array');
			$errorMsg = JText::_('COM_VIRTUEMART_CART_PRODUCT_ADDED');
			if ($cart->add($virtuemart_product_ids, $errorMsg )) {

				$this->json->msg = '<a class="continue" href="' . $continue_link . '" >' . JText::_('COM_VIRTUEMART_CONTINUE_SHOPPING') . '</a>';
				$this->json->msg .= '<a class="showcart floatright" href="' . JRoute::_("index.php?option=com_virtuemart&view=cart") . '">' . JText::_('COM_VIRTUEMART_CART_SHOW_MODAL') . '</a>';
				if ($errorMsg) $this->json->msg .= '<div>'.$errorMsg.'</div>';
				$this->json->stat = '1';
			} else {
				// $this->json->msg = '<p>' . $cart->getError() . '</p>';
				$this->json->msg = '<a class="continue" href="' . $continue_link . '" >' . JText::_('COM_VIRTUEMART_CONTINUE_SHOPPING') . '</a>';
				$this->json->msg .= '<div>'.$errorMsg.'</div>';
				$this->json->stat = '2';
			}
		} else {
			$this->json->msg = '<a href="' . JRoute::_('index.php?option=com_virtuemart') . '" >' . JText::_('COM_VIRTUEMART_CONTINUE_SHOPPING') . '</a>';
			$this->json->msg .= '<p>' . JText::_('COM_VIRTUEMART_MINICART_ERROR') . '</p>';
			$this->json->stat = '0';
		}
		echo json_encode($this->json);
		jExit();
	}

	/**
	 * Add the product to the cart, with JS
	 *
	 * @author Max Milbers
	 * @access public
	 */
	public function viewJS() {

		if (!class_exists('VirtueMartCart'))
		require(JPATH_VM_SITE . DS . 'helpers' . DS . 'cart.php');
		$cart = VirtueMartCart::getCart(false);
		$this->data = $cart->prepareAjaxData();
		$lang = JFactory::getLanguage();
		$extension = 'com_virtuemart';
		$lang->load($extension); //  when AJAX it needs to be loaded manually here >> in case you are outside virtuemart !!!
		if ($this->data->totalProduct > 1)
		$this->data->totalProductTxt = JText::sprintf('COM_VIRTUEMART_CART_X_PRODUCTS', $this->data->totalProduct);
		else if ($this->data->totalProduct == 1)
		$this->data->totalProductTxt = JText::_('COM_VIRTUEMART_CART_ONE_PRODUCT');
		else
		$this->data->totalProductTxt = JText::_('COM_VIRTUEMART_EMPTY_CART');
		if ($this->data->dataValidated == true) {
			$taskRoute = '&task=confirm';
			$linkName = JText::_('COM_VIRTUEMART_CART_CONFIRM');
		} else {
			$taskRoute = '';
			$linkName = JText::_('COM_VIRTUEMART_CART_SHOW');
		}
		$this->data->cart_show = JRoute::_("index.php?option=com_virtuemart&view=cart" . $taskRoute, $this->useXHTML, $this->useSSL);
		if($this->data->totalProduct)
			$this->data->billTotal = " ".str_replace(",00","",$this->data->billTotal);
		else
			$this->data->billTotal = "";
		$prod_buff=$cart->products;
		$c=0;
		while(isset($this->data->products[$c])){
			$prod=current($prod_buff);
			$this->data->products[$c]["product_thumb"]='<img src="'.JURI::base().$prod->image->file_url_thumb.'" width="45" alt="" />';
			$this->data->products[$c]["quantity"]="Antal: ".$this->data->products[$c]["quantity"];
			$this->data->products[$c]["no"]=$prod->virtuemart_product_id;
			$this->data->products[$c]["product_name"]=(mb_strlen($prod->product_name,"UTF-8") < 49) ? $prod->product_name : mb_substr($prod->product_name, 0, 48, "UTF-8")."…";
			next($prod_buff);
			$c++;
		}
		echo json_encode($this->data);
		Jexit();
	}

	/**
	 * For selecting couponcode to use, opens a new layout
	 *
	 * @author Max Milbers
	 */
	public function edit_coupon() {

		$view = $this->getView('cart', 'html');
		$view->setLayout('edit_coupon');

		// Display it all
		$view->display();
	}

	/**
	 * Store the coupon code in the cart
	 * @author Max Milbers
	 */
	public function setcoupon() {

		/* Get the coupon_code of the cart */
		$coupon_code = JRequest::getVar('coupon_code', ''); //TODO VAR OR INT OR WORD?
		if ($coupon_code) {

			$cart = VirtueMartCart::getCart();
			if ($cart) {
				$app = JFactory::getApplication();
				$msg = $cart->setCouponCode($coupon_code);

				//$cart->setDataValidation(); //Not needed already done in the getCart function
				if ($cart->getInCheckOut()) {
					$app = JFactory::getApplication();
					$app->redirect(JRoute::_('index.php?option=com_virtuemart&view=cart&task=checkout'),$msg);
				} else {
					$app->redirect(JRoute::_('index.php?option=com_virtuemart&view=cart'),$msg);
				}
			}
		}
		parent::display();

	}

	/**
	 * For selecting shipment, opens a new layout
	 *
	 * @author Max Milbers
	 */
	public function edit_shipment() {


		$view = $this->getView('cart', 'html');
		$view->setLayout('select_shipment');

		// Display it all
		$view->display();
	}

	/**
	 * Sets a selected shipment to the cart
	 *
	 * @author Max Milbers
	 */
	public function setshipment() {

		/* Get the shipment ID from the cart */
		$virtuemart_shipmentmethod_id = JRequest::getInt('virtuemart_shipmentmethod_id', '0');
		$cart = VirtueMartCart::getCart();
		if ($cart) {
			//Now set the shipment ID into the cart
			if (!class_exists('vmPSPlugin')) require(JPATH_VM_PLUGINS . DS . 'vmpsplugin.php');
			JPluginHelper::importPlugin('vmshipment');
			$cart->setShipment($virtuemart_shipmentmethod_id);
			//Add a hook here for other payment methods, checking the data of the choosed plugin
			$_dispatcher = JDispatcher::getInstance();
			$_retValues = $_dispatcher->trigger('plgVmOnSelectCheckShipment', array(   &$cart));
			$dataValid = true;
			foreach ($_retValues as $_retVal) {
				if ($_retVal === true ) {
					// Plugin completed succesfull; nothing else to do
					$cart->setCartIntoSession();
					break;
				} else if ($_retVal === false ) {
					$mainframe = JFactory::getApplication();
					$mainframe->redirect(JRoute::_('index.php?option=com_virtuemart&view=cart&task=edit_shipment',$this->useXHTML,$this->useSSL), $_retVal);
					break;
				}
			}

			if ($cart->getInCheckOut()) {

				$mainframe = JFactory::getApplication();
				$mainframe->redirect(JRoute::_('index.php?option=com_virtuemart&view=cart&task=checkout') );
			}
		}
		// 	self::Cart();
		parent::display();
	}

	/**
	 * To select a payment method
	 *
	 * @author Max Milbers
	 */
	public function editpayment() {

		$view = $this->getView('cart', 'html');
		$view->setLayout('select_payment');

		// Display it all
		$view->display();
	}

	/**
	 * To set a payment method
	 *
	 * @author Max Milbers
	 * @author Oscar van Eijk
	 * @author Valerie Isaksen
	 */
	function setpayment() {

		/* Get the payment id of the cart */
		//Now set the payment rate into the cart
		$cart = VirtueMartCart::getCart();
		if ($cart) {
			if(!class_exists('vmPSPlugin')) require(JPATH_VM_PLUGINS.DS.'vmpsplugin.php');
			JPluginHelper::importPlugin('vmpayment');
			//Some Paymentmethods needs extra Information like
			$virtuemart_paymentmethod_id = JRequest::getInt('virtuemart_paymentmethod_id', '0');
			$cart->setPaymentMethod($virtuemart_paymentmethod_id);

			//Add a hook here for other payment methods, checking the data of the choosed plugin
			$msg = '';
			$_dispatcher = JDispatcher::getInstance();
			$_retValues = $_dispatcher->trigger('plgVmOnSelectCheckPayment', array( $cart, &$msg));
			$dataValid = true;
			foreach ($_retValues as $_retVal) {
				if ($_retVal === true ) {
					// Plugin completed succesfull; nothing else to do
					$cart->setCartIntoSession();
					break;
				} else if ($_retVal === false ) {
		   		$app = JFactory::getApplication();
		   		$app->redirect(JRoute::_('index.php?option=com_virtuemart&view=cart&task=editpayment',$this->useXHTML,$this->useSSL), $msg);
		   		break;
				}
			}
			//			$cart->setDataValidation();	//Not needed already done in the getCart function
// 			vmdebug('setpayment $cart',$cart);
			if ($cart->getInCheckOut()) {
				$app = JFactory::getApplication();
				$app->redirect(JRoute::_('index.php?option=com_virtuemart&view=cart&task=checkout'), $msg);
			}
		}
		// 	self::Cart();
		parent::display();
	}

	/**
	 * Delete a product from the cart
	 *
	 * @author RolandD
	 * @access public
	 */
	public function delete() {
		$mainframe = JFactory::getApplication();
		/* Load the cart helper */
		$cart = VirtueMartCart::getCart();
		if ($cart->removeProductCart())
		$mainframe->enqueueMessage(JText::_('COM_VIRTUEMART_PRODUCT_REMOVED_SUCCESSFULLY'));
		else
		$mainframe->enqueueMessage(JText::_('COM_VIRTUEMART_PRODUCT_NOT_REMOVED_SUCCESSFULLY'), 'error');

		$mainframe->redirect(JRoute::_('index.php?option=com_virtuemart&view=cart'));
	}

	/**
	 * Delete a product from the cart
	 *
	 * @author RolandD
	 * @access public
	 */
	public function update() {
		$mainframe = JFactory::getApplication();
		/* Load the cart helper */
		$cartModel = VirtueMartCart::getCart();
		if ($cartModel->updateProductCart())
		$mainframe->enqueueMessage(JText::_('COM_VIRTUEMART_PRODUCT_UPDATED_SUCCESSFULLY'));
		else
		$mainframe->enqueueMessage(JText::_('COM_VIRTUEMART_PRODUCT_NOT_UPDATED_SUCCESSFULLY'), 'error');

		$mainframe->redirect(JRoute::_('index.php?option=com_virtuemart&view=cart'));
	}

	/**
	 * Checks for the data that is needed to process the order
	 *
	 * @author Max Milbers
	 *
	 *
	 */
	public function checkout() {
		//Tests step for step for the necessary data, redirects to it, when something is lacking

		$cart = VirtueMartCart::getCart();
		if ($cart && !VmConfig::get('use_as_catalog', 0)) {
			$cart->checkout();
		}
	}

	/**
	 * Executes the confirmDone task,
	 * cart object checks itself, if the data is valid
	 *
	 * @author Max Milbers
	 *
	 *
	 */
	public function confirm() {

		//Use false to prevent valid boolean to get deleted
		//T.Trung
		$cart = VirtueMartCart::getCart();
		if(!JRequest::getVar('password1') && (!JRequest::getVar('userid'))){
			$db = JFactory::getDBO();
			$db->setQuery("SELECT id FROM #__users WHERE username = '".JRequest::getVar('email')."'");
			$id = $db->loadResult();
			if($id){
				echo '<script>alert("E-mail adresse er allerede registeret!");window.history.go(-1);</script>';
				exit;
			} else {
				$cart->BT = array();
				$cart->BT['email'] = JRequest::getVar('email');
				$cart->BT['address_type_name'] = JRequest::getVar('mwctype');
				$cart->BT['ean'] = JRequest::getVar('ean');
				$cart->BT['authority'] = JRequest::getVar('authority');
				$cart->BT['order1'] = JRequest::getVar('order');
				$cart->BT['person'] = JRequest::getVar('person');
				$cart->BT['first_name'] = JRequest::getVar('firstname');
				$cart->BT['last_name'] = JRequest::getVar('lastname');
				$cart->BT['address_1'] = JRequest::getVar('address');
				$cart->BT['address_2'] = JRequest::getVar('location');
				$cart->BT['zip'] = JRequest::getVar('zipcode');
				$cart->BT['city'] = JRequest::getVar('city');
				$cart->BT['phone_1'] = JRequest::getVar('phone');
				
				if(JRequest::getVar('company') == 'Firmanavn'){
					$cart->BT['company'] = '';
				} else {
					$cart->BT['company'] = JRequest::getVar('company');
				}
				if(JRequest::getVar('cvr') == 'CVR-nr.'){
					$cart->BT['cvr'] = '';
				} else {
					$cart->BT['cvr'] = JRequest::getVar('cvr');
				}
			}
		} else {
			if(!JRequest::getVar('userid')){
				$mainframe = JFactory::getApplication();
				$this->addModelPath( JPATH_VM_ADMINISTRATOR.DS.'models' );
				$userModel = VmModel::getModel('user');//print_r($userModel);exit;
	
				$data['mwctype'] = JRequest::getVar('mwctype');
				$data['email'] = JRequest::getVar('email');
				$data['firstname'] = JRequest::getVar('firstname');
				$data['lastname'] = JRequest::getVar('lastname');
				$data['address'] = JRequest::getVar('address');
				$data['zipcode'] = JRequest::getVar('zipcode');
				$data['city'] = JRequest::getVar('city');
				$data['phone'] = JRequest::getVar('phone');
				$data['password'] = JRequest::getVar('password1');
				$data['password2'] = JRequest::getVar('password2');
				
				if(JRequest::getVar('company') == 'Firmanavn'){
					$cart->BT['company'] = '';
				} else {
					$cart->BT['company'] = JRequest::getVar('company');
				}
				if(JRequest::getVar('cvr') == 'CVR-nr.'){
					$cart->BT['cvr'] = '';
				} else {
					$cart->BT['cvr'] = JRequest::getVar('cvr');
				}
				
				$data['ean'] = JRequest::getVar('ean');
				$data['authority'] = JRequest::getVar('authority');
				$data['order'] = JRequest::getVar('order');
				$data['person'] = JRequest::getVar('person');
				
				$data['username'] = JRequest::getVar('username1');
				$data['name'] = JRequest::getVar('name');
				$data['newsletter'] = 1;
				//print_r($data);exit;
				$ret = $userModel->store($data);
				$credentials = array('username' => $ret['user']->username,'password' => $ret['user']->password_clear);
				$mainframe->login($credentials);
			}

			$user = JFactory::getUser();
			$user = JUser::getInstance($user->id);
			//T.Trung end
			
			//T.Trung
			
			$cart->BT = array();
			$cart->BT['email'] = $user->email;
			$cart->BT['address_type_name'] = $user->mwctype;
			$cart->BT['ean'] = $user->ean;
			$cart->BT['authority'] = $user->authority;
			$cart->BT['order1'] = $user->order;
			$cart->BT['person'] = $user->person;
			$cart->BT['first_name'] = $user->firstname;
			$cart->BT['last_name'] = $user->lastname;
			$cart->BT['address_1'] = $user->address;
			$cart->BT['address_2'] = JRequest::getVar('location');
			$cart->BT['zip'] = $user->zipcode;
			$cart->BT['city'] = $user->city;
			$cart->BT['phone_1'] = $user->phone;
			
			$cart->BT['company'] = $user->company;
			$cart->BT['cvr'] = $user->cvr;
		}
		
		$cart->virtuemart_shipmentmethod_id = JRequest::getVar('virtuemart_shipmentmethod_id');
		$cart->STsameAsBT = JRequest::getVar('STsameAsBT');
		$cart->tosAccepted = 1;
		
		if(JRequest::getVar('STsameAsBT')){
			$cart->ST = array();
			$cart->ST['first_name'] = $cart->BT['first_name'];
			$cart->ST['last_name'] = $cart->BT['last_name'];
			$cart->ST['address_1'] = $cart->BT['address_1'];
			$cart->ST['zip'] = $cart->BT['zip'];
			$cart->ST['city'] = $cart->BT['city'];
			$cart->ST['phone_1'] = $cart->BT['phone_1'];
		} else {
			$cart->ST = array();
			$cart->ST['first_name'] = JRequest::getVar('firstname2');
			$cart->ST['last_name'] = JRequest::getVar('lastname2');
			$cart->ST['address_1'] = JRequest::getVar('address2');
			$cart->ST['zip'] = JRequest::getVar('zipcode2');
			$cart->ST['city'] = JRequest::getVar('city2');
			$cart->ST['phone_1'] = JRequest::getVar('phone2');
		}
        
		//print_r($cart);exit;
		//T.Trung end
		//print_r('sai');exit;
		if ($cart) {
			$cart->confirmDone();
			$siteURL = JURI::base();
            if(JRequest::getVar('mwctype') == 3){
                $this->setRedirect( $siteURL . 'index.php?option=com_virtuemart&view=cart&layout=order_done1');
            } else {
                $this->setRedirect('https://relay.ditonlinebetalingssystem.dk/relay/v2/relay.cgi/'. $siteURL . 'index.php?option=com_virtuemart&view=cart&layout=order_done&tmpl=component&forcerelay=1&HTTP_COOKIE='.getenv("HTTP_COOKIE"));
            }
			/*$view = $this->getView('cart', 'html');
			$view->setLayout('order_done');
			// Display it all
			$view->display();*/
		} else {
			$mainframe = JFactory::getApplication();
			$mainframe->redirect(JRoute::_('index.php?option=com_virtuemart&view=cart'), JText::_('COM_VIRTUEMART_CART_DATA_NOT_VALID'));
		}
	}

	function cancel() {

		$cart = VirtueMartCart::getCart();
		if ($cart) {
			$cart->setOutOfCheckout();
		}
		$mainframe = JFactory::getApplication();
		$mainframe->redirect(JRoute::_('index.php?option=com_virtuemart&view=cart'), 'Cancelled');
	}

}

//pure php no Tag
