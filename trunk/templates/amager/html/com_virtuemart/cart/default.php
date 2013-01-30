<?php
// Check to ensure this file is included in Joomla!
defined ('_JEXEC') or die('Restricted access');
//vmJsApi::js ('facebox');
//vmJsApi::css ('facebox');
JHtml::_ ('behavior.formvalidation');
//$document = JFactory::getDocument ();
/*$document->addScriptDeclaration ("

//<![CDATA[
	jQuery(document).ready(function($) {
		$('div#full-tos').hide();
		$('a#terms-of-service').click(function(event) {
			event.preventDefault();
			$.facebox( { div: '#full-tos' }, 'my-groovy-style');
		});
	});

//]]>
");*/
/*$document->addScriptDeclaration ("

//<![CDATA[
	jQuery(document).ready(function($) {
	if ( $('#STsameAsBTjs').is(':checked') ) {
				$('#output-shipto-display').hide();
			} else {
				$('#output-shipto-display').show();
			}
		$('#STsameAsBTjs').click(function(event) {
			if($(this).is(':checked')){
				$('#STsameAsBT').val('1') ;
				$('#output-shipto-display').hide();
			} else {
				$('#STsameAsBT').val('0') ;
				$('#output-shipto-display').show();
			}
		});
	});

//]]>

");*/
//$document->addStyleDeclaration ('#facebox .content {display: block !important; height: 480px !important; overflow: auto; width: 560px !important; }');

//vmdebug('car7t pricesUnformatted',$this->cart->pricesUnformatted);
//vmdebug('cart cart',$this->cart->pricesUnformatted );
?>
<div id="cart-page">
<div class="w-cart-page">
	<div class="title-cart">
		<h1><?php echo JText::_ ('COM_VIRTUEMART_CART_TITLE'); ?></h1>
		<div class="bnt-secure-payment m-t">
			<a href="#CHECKOUT">Gå til sikker betaling</a>
		</div>
	</div>
	<?php // Continue Shopping Button
	/*if ($this->continue_link_html != '') {
		echo $this->continue_link_html;
	}*/

	//echo shopFunctionsF::getLoginForm ($this->cart, FALSE);

	// This displays the pricelist MUST be done with tables, because it is also used for the emails
	echo $this->loadTemplate ('pricelist');
	if ($this->checkout_task) {
		$taskRoute = '&task=' . $this->checkout_task;
	}
	else {
		$taskRoute = '';
	}


	// added in 2.0.8
	?>
	<div id="checkout-advertise-box">
		<?php
		if (!empty($this->checkoutAdvertise)) {
			foreach ($this->checkoutAdvertise as $checkoutAdvertise) {
				?>
				<div class="checkout-advertise">
					<?php echo $checkoutAdvertise; ?>
				</div>
				<?php
			}
		}
		?>
	</div>

	<form method="post" id="checkoutForm" name="checkoutForm" action="<?php echo JRoute::_ ('index.php?option=com_virtuemart&view=cart' . $taskRoute, $this->useXHTML, $this->useSSL); ?>">

		<?php // Leave A Comment Field ?>
		<div class="customer-comment marginbottom15">
			<span class="comment"><?php echo JText::_ ('COM_VIRTUEMART_COMMENT_CART'); ?></span><br/>
			<textarea class="customer-comment" name="customer_comment" cols="60" rows="1"><?php echo $this->cart->customer_comment; ?></textarea>
		</div>
		<?php // Leave A Comment Field END ?>



		<?php // Continue and Checkout Button ?>
		<div class="checkout-button-top">

			<?php // Terms Of Service Checkbox
			if (!class_exists ('VirtueMartModelUserfields')) {
				require(JPATH_VM_ADMINISTRATOR . DS . 'models' . DS . 'userfields.php');
			}
			$userFieldsModel = VmModel::getModel ('userfields');
			if ($userFieldsModel->getIfRequired ('agreed')) {
				?>
				<label for="tosAccepted">
					<?php
					if (!class_exists ('VmHtml')) {
						require(JPATH_VM_ADMINISTRATOR . DS . 'helpers' . DS . 'html.php');
					}
					echo VmHtml::checkbox ('tosAccepted', $this->cart->tosAccepted, 1, 0, 'class="terms-of-service"');

					if (VmConfig::get ('oncheckout_show_legal_info', 1)) {
						?>
						<div class="terms-of-service">

							<a href="<?php JRoute::_ ('index.php?option=com_virtuemart&view=vendor&layout=tos&virtuemart_vendor_id=1') ?>" class="terms-of-service" id="terms-of-service" rel="facebox"
							   target="_blank">
								<span class="vmicon vm2-termsofservice-icon"></span>
								<?php echo JText::_ ('COM_VIRTUEMART_CART_TOS_READ_AND_ACCEPTED'); ?>
							</a>

							<div id="full-tos">
								<h2><?php echo JText::_ ('COM_VIRTUEMART_CART_TOS'); ?></h2>
								<?php echo $this->cart->vendor->vendor_terms_of_service; ?>
							</div>

						</div>
						<?php
					} // VmConfig::get('oncheckout_show_legal_info',1)
					//echo '<span class="tos">'. JText::_('COM_VIRTUEMART_CART_TOS_READ_AND_ACCEPTED').'</span>';
					?>
				</label>
				<?php
			}
			echo $this->checkout_link_html;
			?>
		</div>
		<?php // Continue and Checkout Button END ?>
		<input type='hidden' id='STsameAsBT' name='STsameAsBT' value='<?php echo $this->cart->STsameAsBT; ?>'/>
		<input type='hidden' name='task' value='<?php echo $this->checkout_task; ?>'/>
		<input type='hidden' name='option' value='com_virtuemart'/>
		<input type='hidden' name='view' value='cart'/>
	</form>
</div>
</div>