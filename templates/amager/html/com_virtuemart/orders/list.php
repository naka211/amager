<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

$user = JFactory::getUser();

if (count($this->orderlist) == 0) {
	//echo JText::_('COM_VIRTUEMART_ACC_NO_ORDER');
	 echo shopFunctionsF::getLoginForm(false,true);
} else {
	$orderModel = VmModel::getModel('orders');
 ?>
<div id="overview-page">
	<div class="overview-left">
		<div class="bnt-overview"><a href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id='.$user->id); ?>"></a></div><!--.bnt-overview-->
		<div class="bnt-my-profile active3"><a href="#"></a></div><!--.bnt-my-profile-->
	</div>
	<div class="overview-right">
<?php
		$k = 0;
		foreach ($this->orderlist as $row) {
			//$editlink = JRoute::_('index.php?option=com_virtuemart&view=orders&layout=details&order_number=' . $row->order_number);
			$orderDetails = $orderModel->getOrder($row->virtuemart_order_id);
?>
		<div class="over-title-gray">
		<label>Ordrenummer: <?php echo $row->order_number?></label><span>Ordredato: <?php echo vmJsApi::date($row->created_on,'LC4',true);?></span>
		</div>
		<div class="w-over-title-gray">
			<div class="over-info">
				<label>Kundetype:</label>
				<span><?php
				$userHtml="";
				switch($orderDetails["details"]["BT"]->address_type_name){
					case 1: echo "Privat";break;
					case 2: $userHtml="<label>Firmanavn:</label><span>".$orderDetails["details"]["BT"]->company."</span><br>
					<label>CVR-nr.:</label><span>".$orderDetails["details"]["BT"]->cvr."</span><br>";
					echo "Erhverv";break;
					case 3: $userHtml="<label>EAN-nr.:</label><span>".$orderDetails["details"]["BT"]->ean."</span><br>
					<label>Myndighed/Institution:</label><span>".$orderDetails["details"]["BT"]->authority."</span><br>
					<label>Rekvisitionsnr.:</label><span>".$orderDetails["details"]["BT"]->order1."</span><br>
					<label>Personreference:</label><span>".$orderDetails["details"]["BT"]->person."</span><br>";
					echo "Offentlig instans";break;
				}
				?></span>
<br>			<label>E-mail: </label>
				<span><a href="mailto:<?php echo $orderDetails["details"]["BT"]->email?>"><?php echo $orderDetails["details"]["BT"]->email?></a></span>
			</div>
			<div class="w-over-top">
				<div class="over-cus-info">
					<h4>Kundeoplysninger:</h4>
					<?php echo $userHtml?>
					<label>Fornavn:</label><span><?php echo $orderDetails["details"]["BT"]->first_name?></span><br>
					<label>Efternavn:</label><span><?php echo $orderDetails["details"]["BT"]->last_name?></span><br>
					<label>Adresse:</label><span><?php echo $orderDetails["details"]["BT"]->address_1?></span><br>
					<label>Postnr.:</label><span><?php echo $orderDetails["details"]["BT"]->zip?></span><br>
					<label>By:</label><span><?php echo $orderDetails["details"]["BT"]->city?></span><br>
					<label>Telefon:</label><span><?php echo $orderDetails["details"]["BT"]->phone_1?></span><br><br>
					<h4>Betalingsmetode: </h4>
					<label>Kortbetaling</label>
				</div>
				<div class="over-delivery-address">
					<h4>Leveringsadresse:</h4>
					<label>Fornavn:</label><span><?php echo $orderDetails["details"]["ST"]->first_name?></span><br>
					<label>Efternavn:</label><span><?php echo $orderDetails["details"]["ST"]->last_name?></span><br>
					<label>Adresse:</label><span><?php echo $orderDetails["details"]["ST"]->address_1?></span><br>
					<label>Postnr.:</label><span><?php echo $orderDetails["details"]["ST"]->zip?></span><br>
					<label>By:</label><span><?php echo $orderDetails["details"]["ST"]->city?></span><br>
					<label>Telefon:</label><span><?php echo $orderDetails["details"]["ST"]->phone_1?></span><br><br>
					<h4>Levering: </h4>
					<span><?php
					$tmp=$orderDetails["details"]["BT"]->address_2;
					echo ($tmp) ? "Afhentning: ".$tmp : "Forsendelse"?></span>
				</div>
			</div>
			<div class="table-pro">
				<div class="table-pro-title">
				<div class="col-1-">
				<p>Produkt</p>
				</div><!--.col-1-->
				<div class="col-2-">
				<p>Vare-nr</p>
				</div><!--.col-2-->
				<div class="col-3-">
				<p>Antal</p>
				</div><!--.col-3-->
				<div class="col-4-">
				<p>Pris i alt</p>
				</div><!--.col-4-->
				</div><!--.table-pro-title-->
<?php
// Display orders
			foreach($orderDetails['items'] as $item) {
		$qtt = $item->product_quantity ;
		$_link = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_category_id=' . $item->virtuemart_category_id . '&virtuemart_product_id=' . $item->virtuemart_product_id);
?>
	
				<div class="table-pro-content">
					<div class="list-pro-item-img2">
					<img src="img/img-pro-item2.jpg" width="89" height="72" alt="">
					</div><!--.list-pro-item-img-->
					<div class="col-1-content-">
					<p><?php echo $item->order_item_name?></p>
					</div><!--.col-1-content-->
					<div class="col-2-content-">
					<p><?php echo $item->order_item_sku?></p>
					</div><!--.col-2-content-->
					<div class="col-3-content-">
					<p><?php echo $item->product_quantity?></p>
					</div><!--.col-3-content-->
					<div class="col-4-content-">
					<p><?php echo $this->currency->priceDisplay($item->product_item_price,$this->currency)?></p>
					</div><!--.col-4-content-->
				</div><!--.table-pro-content-->
			<div class="table-pro-content b-t-2">
				<div class="sum-total">
					<div>
					<label>Forsendelse:</label><span>49,00 DKK</span>
					</div>
					<div>
					<label>Subtotal inkl. moms:</label><span>799,80 DKK</span>
					</div>
					<div>
					<label>Heraf moms:</label><span>199,95 DKK</span>
					</div>
					<div class="black">
					<label>TOTAL INKL. MOMS:</label><span>848,80 DKK</span>
					</div>
				</div><!--.sum-total-->
			</div><!--.table-pro-content-->
<?php
/// Display orders
	}
?>
			</div>
		</div>
<?php
			$k = 1 - $k;
		}
?>
	</div>
</div>
<?php } ?>