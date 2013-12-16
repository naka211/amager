<?php

/**
 *
 * Show Confirmation message from Offlien Payment
 *
 * @package	VirtueMart
 * @subpackage
 * @author Valerie Isaksen
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default.php 3217 2011-05-12 15:51:19Z alatak $
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
/*JHTML::_('behavior.modal');


echo "<h3>" . $this->paymentResponse . "</h3>";
if ($this->paymentResponseHtml) {
    echo "<fieldset>";
    echo $this->paymentResponseHtml;
    echo "</fieldset>";
}*/

// add something???
$admin = JFactory::getUser('939');
$cart = $this->cart;
if(!class_exists('shopFunctionsF')) require(JPATH_VM_SITE.DS.'helpers'.DS.'shopfunctionsf.php');
$config =& JFactory::getConfig();
$fromName = $config->getValue( 'config.sitename' );
$fromMail = $config->getValue( 'config.mailfrom' );
$vars['user'] = array('name' => $fromName, 'email' => $fromMail);
$vars['vendor'] = array('vendor_store_name' => $fromName );

$db = JFactory::getDBO();
$orderid = $this->cart->order_number;

$query = "SELECT virtuemart_order_id, order_shipment, order_total, order_salesPrice, order_number FROM #__virtuemart_orders WHERE order_number = '".$orderid."'";
$db->setQuery($query);
$order_info = $db->loadObject();

if(!class_exists('VmModel'))require(JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'vmmodel.php');
$orderModel=VmModel::getModel('orders');
$order = $orderModel->getOrder($order_info->virtuemart_order_id);

$vars['orderDetails']=$order;
shopFunctionsF::renderMail('invoice', $admin->email, $vars);
shopFunctionsF::renderMail('invoice', $cart->BT['email'], $vars);

$query = "SELECT * FROM #__virtuemart_order_userinfos WHERE address_type = 'BT' AND virtuemart_order_id = ".$order_info->virtuemart_order_id;
$db->setQuery($query);
$BT_info = $db->loadObject();

$query = "SELECT * FROM #__virtuemart_order_userinfos WHERE address_type = 'ST' AND virtuemart_order_id = ".$order_info->virtuemart_order_id;
$db->setQuery($query);
$ST_info = $db->loadObject();

$query = "SELECT * FROM #__virtuemart_order_items WHERE virtuemart_order_id = ".$order_info->virtuemart_order_id;
$db->setQuery($query);
$items = $db->loadObjectList();

if($BT_info->address_type_name == 1 ){
	$type = "Privat";
} else if($BT_info->address_type_name == 2 ){
	$type = "Erhverv";
} else {
	$type = "Offentlig instans";
}
?>

<div id="tak-page">
  	<div id="w-tak-page">
  	<h2>Tak for din ordre</h2>
    <h4>Ordrenummer: <?php echo $orderid;?></h4>
    <p>En ordrebekræftelse vil blive sendt til <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a><br>
Har du spørgsmål, kan du kontakte os på +45 99 42 19 60<br>
Mandag - Torsdag kl 09.00 - 17.00, Fredag kl 09.00 - 14.30</p><br>
		<h4>Sporing af ordre online</h4>
        <p>Ønsker du at tjekke din ordrestatus bedes du gå til Amager Isenkram onlineshop og klikke på Hvor er min ordre? øverst på shoppen</p>
        <div class="order-list">
        <h2>ORDREOVERSIGT</h2>
        	<div class="main-info">
                <label>Kundetype:</label><span><?php echo $type;?></span><br>
                <label>E-mail: </label><span><a href="mailto:<?php echo $BT_info->email;?>"><?php echo $BT_info->email;?></a></span>
            </div><!--.main-info-->
            <div class="cus-info">
            	<h4>Kundeoplysninger:</h4>
                <?php if($BT_info->address_type_name == 2){?>
                <label>Firmanavn:</label><span><?php echo $BT_info->company;?></span><br>
                <label>CVR-nr.:</label><span><?php echo $BT_info->cvr;?></span><br>
                <?php } else if($BT_info->address_type_name == 3){?>
                <label>EAN-nr.:</label><span><?php echo $BT_info->ean;?></span><br>
                <label>Myndighed/Institution:</label><span><?php echo $BT_info->authority;?></span><br>
                <label>Ordre- el. rekvisitionsnr.:</label><span><?php echo $BT_info->order1;?></span><br>
                <label>Personreference:</label><span><?php echo $BT_info->person;?></span><br>
                <?php }?>
            	<label>Fornavn:</label><span><?php echo $BT_info->first_name;?></span><br>
                <label>Efternavn:</label><span><?php echo $BT_info->last_name;?></span><br>
                <label>Adresse:</label><span><?php echo $BT_info->address_1;?></span><br>
                <label>Postnr.:</label><span><?php echo $BT_info->zip;?></span><br>
                <label>By:</label><span><?php echo $BT_info->city;?></span><br>
                <label>Telefon:</label><span><?php echo $BT_info->phone_1;?></span><br><br>
                <h4>Betaling: </h4>
                <label>Kortbetaling</label>
            </div><!--.cus-info-->
            <div class="delivery-address">
            	<h4>Leveringsadresse:</h4>
            	<label>Fornavn:</label><span><?php echo $ST_info->first_name;?></span><br>
                <label>Efternavn:</label><span><?php echo $ST_info->last_name;?></span><br>
                <label>Adresse:</label><span><?php echo $ST_info->address_1;?></span><br>
                <label>Postnr.:</label><span><?php echo $ST_info->zip;?></span><br>
                <label>By:</label><span><?php echo $ST_info->city;?></span><br>
                <label>Telefon:</label><span><?php echo $ST_info->phone_1;?></span><br><br>
                <h4>Leveringsservice:</h4>
                <?php if($BT_info->address_2){?>
                <span>Afhentning: <?php echo $BT_info->address_2;?></span>
                <?php } else {?>
                <span>Forsendelse</span>
                <?php }?>
            </div><!--.delivery-address-->
        </div><!--.order-list-->
        <div class="table-pro">
        	<div class="table-pro-title">
            	<div class="col-1">
                	<p>Produkt</p>
                </div><!--.col-1-->
                <div class="col-2">
                	<p>Vare-nr</p>
                </div><!--.col-2-->
                <div class="col-3">
                	<p>Antal</p>
                </div><!--.col-3-->
                <div class="col-4">
                	<p>Pris pr. enhed</p>
                </div>
                <div class="col-4">
                	<p>Pris i alt</p>
                </div><!--.col-4-->
            </div><!--.table-pro-title-->
           <?php foreach($items as $item){?>
            <div class="table-pro-content">
            <div class="col-1-content">
            	<p><?php echo $item->order_item_name;?></p>
            </div><!--.col-1-content-->
            <div class="col-2-content">
            	<p><?php echo $item->order_item_sku;?></p>
            </div><!--.col-2-content-->
            <div class="col-3-content">
            	<p><?php echo $item->product_quantity;?></p>
            </div><!--.col-3-content-->
            <div class="col-4-content">
            	<p><?php echo number_format($item->product_final_price,2,',','.');?> DKK</p>
            </div><!--.col-4-content-->
            <div class="col-4-content">
            	<p><?php echo number_format($item->product_subtotal_with_tax,2,',','.');?> DKK</p>
            </div><!--.col-4-content-->
            </div><!--.table-pro-content--> 
            <?php }?>
            <div class="table-pro-content b-t-2">
            	<div class="pick">
                	<?php if($BT_info->address_2){?>
                	<p>Afhentning: <?php echo $BT_info->address_2;?></p>  
                    <?php } else {?>
                         <?php if($BT_info->address_type_name == 3) echo 'E-faktura/Nem-handel fakturablanket'; else echo 'Forsendelse';?>
                    <?php }?>                  
                </div><!--.pick-->
                <div class="sum-total">
                	<div>
                		<label>Forsendelse:</label><span><?php echo number_format($order_info->order_shipment,2,',','.');?> DKK</span>
                    </div>
                    <div>
                    	<label>Subtotal inkl. moms:</label><span><?php echo number_format($order_info->order_salesPrice,2,',','.');?> DKK</span>
                    </div>
                    <div>
                    <label>Heraf moms:</label><span><?php echo number_format($order_info->order_salesPrice*0.2,2,',','.');?> DKK</span>
                    </div>
                    <div class="black">
                    <label>TOTAL INKL. MOMS:</label><span><?php echo number_format($order_info->order_total,2,',','.');?> DKK</span>
                    </div>
                </div><!--.sum-total-->
            </div><!--.table-pro-content-->
        </div><!--.table-pro-->
        
        <div class="note-shipment">
        	<p>Beløbet vil først blive trukket, når vi har afsendt din ordre. Venligst bemærk at denne e-mail 
            kun er en bekræftelse på modtagelsen af din bestilling. Købet er først accepteret af os, når du 
            modtager en bekræftelse på forsendelsen per e-mail.</p>
        </div><!--.note-shipment-->
        
        <div class="help-shipment">
        	<h4>Sådan tjekker du din ordrestatus</h4>
            <p>Besøg  vores onlineshop og klik på Min Side øverst på shoppen for at se din ordrestatus.   
            Når din bestilling er accepteret af os, vil du modtage en forsendelsesbekræftelse per e-mail. 
            I denne finder du også dit forsendelsesnummer, så du kan spore din pakke online. </p>
            <h4>Sådan returnerer du en vare</h4>
            <p>Vi ønsker at du er tilfreds hver gang du handler hos os, derfor er vi også opmærksomme 
            på at du lejlighedsvis ønsker at returnere en vare. Klik her for at læse mere om vores returpolitik.</p>
            <h4>Har du brug for hjælp?</h4>
            <p>Se vores Almindelige Spørgsmål. Her finder du svar på spørgsmål om vores onlineshop.<br class="m-b-10">
            Tak for din bestilling.<br class="m-b-10">
            Tårnby Torv Isenkram<br>
            Tårnby Torv 9, 2770 Kastrup<br>
            Tlf: 3250 3611<br>
            Fax: 3252 1536<br>
            info@amagerisenkram.dk</p>
            
        </div><!--.note-shipment-->
      </div><!--#w-tak-page-->
      <div class="bnt-gohome">
      	<a href="index.php">TIL FORSIDEN</a>
      </div><!--.bnt-gohome-->
      <div class="bnt-print-receipt">
      	<a href="index.php?option=com_virtuemart&view=pluginresponse&layout=printOrder&orderid=<?php echo $orderid;?>&tmpl=component">PRINT KVITTERING</a>
      </div><!--.bnt-print-receipt-->
  </div>