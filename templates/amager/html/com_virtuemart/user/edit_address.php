<?php //	THIS LAYOUT INCLUDE 4 PARTS, BECOME ONE PAGE CHECKOUT
// Check to ensure this file is included in Joomla!
defined ('_JEXEC') or die('Restricted access');
// vmdebug('user edit address',$this->userFields['fields']);
// Implement Joomla's form validation
//JHTML::_ ('behavior.formvalidation');

if ($this->fTask === 'savecartuser') {
	$rtask = 'registercartuser';
	$url = 0;
}
else {
	$rtask = 'registercheckoutuser';
	$url = JRoute::_ ('index.php?option=com_virtuemart&view=cart&task=checkout', $this->useXHTML, $this->useSSL);
}
?>
<script language="javascript" src="templates/amager/js/jquery.validate.js"></script>
<script language="javascript" src="templates/amager/js/trung.js"></script>
<div id="checkout-page">
<form method="post" id="registrationForm" name="userForm" class="form-validate info-per">
<div class="w-checkout">
	<div class="checkout-content">
		<div class="nav-left">
		<h2><div><img src="<?php echo JURI::base()."templates/".$template?>/img/step1.png" width="24" height="24" alt=""></div>Kundeoplysninger</h2>
		<div class="frm-cus-info">
		<div><label>Vælg kundetype *</label></div>
		<div>
		<select name="mwctype" id="choicemaker">
			<option value="1">Privat</option>
			<option value="2">Erhverv</option>
			<option value="3">Offentlig instans</option>
		</select>
		</div>
		<div id="w-privat">
				<div id="companyadd"></div>
				<div>
				<input value="E-mail *" name="email" type="text" id="email" />
				</div>
				<div id="publicadd"></div>
				<div>
				<input type="text" value="Fornavn *" name="firstname" id="firstname"  />
				</div>
				<div>
				<input type="text" value="Efternavn *" name="lastname" id="lastname" />
				</div>
				<div>
				<input type="text" value="Adresse *" name="address" id="address" />
				</div>
				<div>
				<input type="text" value="Postnr. *" name="zipcode" id="zipcode" maxlength="4" />
				</div>
				<div>
				<input type="text" value="By *" name="city" id="city" />
				</div>
				<div>
				<input type="text" value="Telefon *" name="phone" id="phone" />
				</div>
				<button type="submit">xxx</button>
		</div>
		<div>* Skal udfyldes</div>
<script type="text/javascript">
jQuery(document).ready(function(){
	
	jQuery(".w-create-acc").hide();
	jQuery(".bnt-create-acc").show();
	
	jQuery('.bnt-create-acc').click(function(){
	jQuery(".w-create-acc").slideToggle();
	});
	
	jQuery(".w-another-add").hide();
	jQuery(".bnt-another-add").show();
	
	jQuery('.bnt-another-add').click(function(){
	jQuery(".w-another-add").slideToggle();
	});
});
</script>
		<div class="bnt-create-acc" style=""></div>
		<div class="w-create-acc">
			<div>
				<label>Kodeord (skal være min 4 tegn) *</label>
			</div>
			<div>
				<input type="password" minlength="4" name="password1" id="password1">
			</div>
			<div>
				<label>Bekræft kodeord *</label>
			</div>
			<div>
				<input type="password" name="password2" id="password2">
			</div>
		</div>

		<div class="bnt-another-add" style=""></div>
		<div class="w-another-add" style="display: none; ">
			<div>
			<input type="text" value="Fornavn *">
			</div>
			<div>
			<input type="text" value="Efternavn *">
			</div>
			<div>
			<input type="text" value="Adresse *">
			</div>
			<div>
			<input type="text" value="Postnr. *">
			</div>
			<div>
			<input type="text" value="By *">
			</div>
			<div>
			<input type="text" value="Telefon *">
			</div>
		</div>

<fieldset>
	<h2><?php
		if ($this->address_type == 'BT') {
			echo JText::_ ('COM_VIRTUEMART_USER_FORM_EDIT_BILLTO_LBL');
		}
		else {
			echo JText::_ ('COM_VIRTUEMART_USER_FORM_ADD_SHIPTO_LBL');
		}
		?>
	</h2>


		<!--<form method="post" id="userForm" name="userForm" action="<?php echo JRoute::_ ('index.php'); ?>" class="form-validate">-->
		<div class="control-buttons">
			<?php
			if (strpos ($this->fTask, 'cart') || strpos ($this->fTask, 'checkout')) {
				$rview = 'cart';
			}
			else {
				$rview = 'user';
			}
// echo 'rview = '.$rview;

			if (strpos ($this->fTask, 'checkout') || $this->address_type == 'ST') {
				$buttonclass = 'default';
			}
			else {
				$buttonclass = 'button vm-button-correct';
			}


			if (VmConfig::get ('oncheckout_show_register', 1) && $this->userId == 0 && !VmConfig::get ('oncheckout_only_registered', 0) && $this->address_type == 'BT' and $rview == 'cart') {
				echo JText::sprintf ('COM_VIRTUEMART_ONCHECKOUT_DEFAULT_TEXT_REGISTER', JText::_ ('COM_VIRTUEMART_REGISTER_AND_CHECKOUT'), JText::_ ('COM_VIRTUEMART_CHECKOUT_AS_GUEST'));
			}
			else {
				//echo JText::_('COM_VIRTUEMART_REGISTER_ACCOUNT');
			}
			if (VmConfig::get ('oncheckout_show_register', 1) && $this->userId == 0 && $this->address_type == 'BT' and $rview == 'cart') {
				?>

				<button class="<?php echo $buttonclass ?>" type="submit" onclick="javascript:return callValidatorForRegister(userForm);"
						title="<?php echo JText::_ ('COM_VIRTUEMART_REGISTER_AND_CHECKOUT'); ?>"><?php echo JText::_ ('COM_VIRTUEMART_REGISTER_AND_CHECKOUT'); ?></button>
				<?php if (!VmConfig::get ('oncheckout_only_registered', 0)) { ?>
					<button class="<?php echo $buttonclass ?>" title="<?php echo JText::_ ('COM_VIRTUEMART_CHECKOUT_AS_GUEST'); ?>" type="submit"
							onclick="javascript:return myValidator(userForm, '<?php echo $this->fTask; ?>');"><?php echo JText::_ ('COM_VIRTUEMART_CHECKOUT_AS_GUEST'); ?></button>
					<?php } ?>
				<button class="default" type="reset"
						onclick="window.location.href='<?php echo JRoute::_ ('index.php?option=com_virtuemart&view=' . $rview); ?>'"><?php echo JText::_ ('COM_VIRTUEMART_CANCEL'); ?></button>


				<?php
			}
			else {
				?>

				<button class="<?php echo $buttonclass ?>" type="submit"
						onclick="javascript:return myValidator(userForm, '<?php echo $this->fTask; ?>');"><?php echo JText::_ ('COM_VIRTUEMART_SAVE'); ?></button>
				<button class="default" type="reset"
						onclick="window.location.href='<?php echo JRoute::_ ('index.php?option=com_virtuemart&view=' . $rview); ?>'"><?php echo JText::_ ('COM_VIRTUEMART_CANCEL'); ?></button>

				<?php } ?>
		</div>


		<?php
		if (!class_exists ('VirtueMartCart')) {
			require(JPATH_VM_SITE . DS . 'helpers' . DS . 'cart.php');
		}

		if (count ($this->userFields['functions']) > 0) {
			echo '<script language="javascript">' . "\n";
			echo join ("\n", $this->userFields['functions']);
			echo '</script>' . "\n";
		}
		echo $this->loadTemplate ('userfields');

		?>
</fieldset>
<?php // }
if ($this->userDetails->JUser->get ('id')) {
	echo $this->loadTemplate ('addshipto');
} ?>
<input type="hidden" name="option" value="com_virtuemart"/>
<input type="hidden" name="view" value="user"/>
<input type="hidden" name="controller" value="user"/>
<input type="hidden" name="task" value="<?php echo $this->fTask; // I remember, we removed that, but why?   ?>"/>
<input type="hidden" name="layout" value="<?php echo $this->getLayout (); ?>"/>
<input type="hidden" name="address_type" value="<?php echo $this->address_type; ?>"/>
<?php if (!empty($this->virtuemart_userinfo_id)) {
	echo '<input type="hidden" name="shipto_virtuemart_userinfo_id" value="' . (int)$this->virtuemart_userinfo_id . '" />';
}
echo JHTML::_ ('form.token');
?>
		</div><!--frm-cus-info-->
	</div>
</div>

<!--temp html-->
	<div class="w-payment">
		<div><input name="" type="checkbox" value=""></div><p>Jeg accepterer <a href="handelsbetingelser.php">handelsbetingelser</a></p>
		<div class="bnt-payment">
			<a href="relay-payment.php">betaling</a>
		</div>
	</div>

	<div class="bnt-edit-order">
		<a href="cart.php">Rediger din ordre</a>
	</div>
<!--//temp html-->

</div>
</form>
</div>