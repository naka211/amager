<?php
defined('_JEXEC') or die('');

/**
*
* Template for the shopping cart
*
* @package	VirtueMart
* @subpackage Cart
* @author Max Milbers
*
* @link http://www.virtuemart.net
* @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/



//echo "<h3>".JText::_('COM_VIRTUEMART_CART_ORDERDONE_THANK_YOU')."</h3>";

//echo $this->html;
?>
<?php // no direct access
$cart = $this->cart;
$amount = $cart->pricesUnformatted['billTotal']*100;
//print_r($cart);
$siteURL = JURI::base();

//LDC EPAY for form submit data
$accepturl = $siteURL . 'index.php?option=com_virtuemart&view=pluginresponse&task=pluginresponsereceived&pm=1';
$callbackurl = $siteURL . 'index.php?callback=1&option=com_virtuemart&view=pluginresponse&task=pluginresponsereceived&pm=1';
$declineurl = $siteURL . 'index.php?option=com_virtuemart&view=pluginresponse&task=pluginUserPaymentCancel&on='.$cart->order_number . '&pm=1';

$orderid = $cart->order_number;
$merchantid = '5746353';
//$merchantid = '8016239';
$customerfee = intval('');
$authsms = $cms = 'Joomla';
$instantcapture = 0;
$group = "";
$splitpayment = 0;
$transfee = 0;
$language = 1;
$HTTP_COOKIE = getenv("HTTP_COOKIE");
$instantcallback = 1;
$httpaccepturl = 0;
$redirectmethod = "POST";
$subscription=1;
$currency = 208;


$authemail = $cart->BT['email'];
?>
<link rel="stylesheet" type="text/css" href="<?php echo $siteURL?>templates/amager/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $siteURL?>templates/amager/css/styles.css"/>
<style>
#page{
	margin-top:120px;
}
</style>
<script type="text/javascript" src="https://ssl.ditonlinebetalingssystem.dk/integration/ewindow/paymentwindow.js"></script>
<script type="text/javascript">
	function startPayment() {
		paymentwindow = new PaymentWindow({
			'encoding': "UTF-8",
			'cms': "<?php echo $cms;?>",
			'windowstate': 3,
			'paymentcollection': 1,
			'language': <?php echo $language;?>,
			'merchantnumber': <?php echo $merchantid;?>,
			'amount': <?php echo $amount;?>,
			'orderid': '<?php echo $orderid;?>',
			'currency': <?php echo $currency;?>,
			'accepturl': '<?php echo $accepturl;?>',
			'callbackurl': '<?php echo $callbackurl;?>',
			'cancelurl': '<?php echo $declineurl;?>',
			'smsreceipt': "<?php echo $authsms; ?>",
			'mailreceipt': "<?php echo $authemail; ?>",
			'instantcapture': "<?php echo $instantcapture; ?>",
			'group': "<?php echo $group; ?>"
		});
		paymentwindow.open();
	}
	startPayment();
</script>
<div style="margin-bottom:100px;">
	<!--#header-->
	<div class="clear"></div>
	<div id="main">
		<div id="w-main">
			<div class="relay-payment-page">
				Din ordre overfører til Epay.....
		
			</div><!--.relay-payment-page-->
		</div><!--#w-main-->
	</div>
	<!--#main-->

</div><!--#page-->
<div class="clear"></div>