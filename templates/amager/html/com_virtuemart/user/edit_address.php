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
<div id="checkout-page">
<form method="post" id="checkoutForm" name="userForm" class="form-validate info-per" style="padding:0;border-top:none">
<div class="w-checkout">
	<div class="checkout-content">
		<div class="nav-left">
		<h2><div><img src="<?php echo JURI::base()."templates/".$template?>/img/step1.png" width="24" height="24" alt=""></div>Kundeoplysninger</h2>
		<div class="frm-cus-info">
		<div><label>Vælg kundetype *</label></div>
		<div>
		<?php //$this->userId?>
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
		</div>
		<div>* Skal udfyldes</div>
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
			<input type="text" name="firstname2" id="firstname2" value="Fornavn *">
			</div>
			<div>
			<input type="text" name="lastname2" id="lastname2" value="Efternavn *">
			</div>
			<div>
			<input type="text" name="address2" id="address2" value="Adresse *">
			</div>
			<div>
			<input type="text" name="zipcode2" id="zipcode2" value="Postnr. *">
			</div>
			<div>
			<input type="text" name="city2" id="city2" value="By *">
			</div>
			<div>
			<input type="text" name="phone2" id="phone2" value="Telefon *">
			</div>
		</div>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery.validator.addMethod("requireDefault", function(value, element) 
	{	
		return !(element.value == element.defaultValue);
	});
	
	jQuery("#checkoutForm").validate({
		rules: {
			email: {
				requireDefault: true,
				required: true,
				email: true
			},
			firstname: {
				requireDefault: true,
				required: true,
			
			},
			lastname: {
				requireDefault: true,
				required: true,
			
			},
			password1: {
				required: true,
				minlength: 4
			},
			password2: {
				equalTo: "#password1",
				required: true
			},
			address: {
				requireDefault: true,
				required: true,
			
			},
			zipcode: {
				requireDefault: true,
				required: true,
				number: true,
				minlength: 4
			},
			city: {
				requireDefault: true,
				required: true,
			
			},
			phone: {
				requireDefault: true,
				required: true,
				number: true
			}
		},
		messages: {
			email: "",
			firstname: "",
			lastname: "",
			password1: {
				required: "",
				minlength: ""
			},
			password2: {
				required: "",
				equalTo: ""
			},
			address: "",
			zipcode: "",
			city: "",
			phone: ""
		}
	});
	
	
	var private = '';
	var company = '<div><input type="text" value="Firmanavn" name="company" id="company" /></div><div><input type="text" value="CVR-nr." name="cvr" id="cvr" /></div>';
	var public = '<div><input type="text" value="EAN-nr. *" name="ean" id="ean" maxlength="13" /></div><div><input type="text" value="Myndighed/Institution *" name="authority" id="authority" /></div><div><input type="text" value="Ordre- el. rekvisitionsnr. *" name="order" id="order" /></div><div><input type="text" value="Personreference *" name="person" id="person" />';
	jQuery("#choicemaker").change(function () {
		
		value = jQuery("#choicemaker").val();
		  // You can also use $("#ChoiceMaker").val(); and change the case 0,1,2: to the values of the html select options elements
	
		if(value == 1){
			if(jQuery("#ean").val()){
				jQuery("#ean").rules("remove");
				jQuery("#authority").rules("remove");
				jQuery("#order").rules("remove");
				jQuery("#person").rules("remove");
			}
			jQuery("#companyadd").html('');
			jQuery("#publicadd").html('');
			focusInput();
			
			
		} else if(value == 2){
			if(jQuery("#ean").val()){
				jQuery("#ean").rules("remove");
				jQuery("#authority").rules("remove");
				jQuery("#order").rules("remove");
				jQuery("#person").rules("remove");
			}
			jQuery("#companyadd").html(company);
			jQuery("#publicadd").html('');
			focusInput();
			
			
		} else {
			jQuery("#companyadd").html('');
			jQuery("#publicadd").html(public);
			focusInput();
			
			var newRule = {
				requireDefault: true,
				required: true,
				messages: {
					requireDefault: "",
					required: ""
				}
			};
			jQuery("#ean").rules("add", newRule);
			jQuery("#authority").rules("add", newRule);
			jQuery("#order").rules("add", newRule);
			jQuery("#person").rules("add", newRule);
		}
		
	});
	jQuery("#email").bind("blur",function(){
		jQuery("#username").val(jQuery("#email").val());
	});
	jQuery("#lastname").bind("blur",function(){
		jQuery("#name").val(jQuery("#firstname").val()+' '+jQuery("#lastname").val());
	});
	//isST process
	STo = function(){
		var newRule = {
				requireDefault: true,
				required: true,
				messages: {
					requireDefault: "",
					required: ""
				}
			};
		jQuery("#firstname2").rules("add", newRule);
		jQuery("#lastname2").rules("add", newRule);
		jQuery("#zipcode2").rules("add", newRule);
		jQuery("#address2").rules("add", newRule);
		jQuery("#city2").rules("add", newRule);
		jQuery("#phone2").rules("add", newRule);
		jQuery("#address_val").val("ST");
	}
	STx = function(){
		console.log("x");
		jQuery("#firstname2").rules("remove");
		jQuery("#lastname2").rules("remove");
		jQuery("#zipcode2").rules("remove");
		jQuery("#address2").rules("remove");
		jQuery("#city2").rules("remove");
		jQuery("#phone2").rules("remove");
		jQuery("#address_val").val("BT");
	}

	if(jQuery(".w-another-add").css("display")=="block")
		STo();

	jQuery('.bnt-create-acc').click(function(){
	jQuery(".w-create-acc").slideToggle();
	});

	jQuery('.bnt-another-add').click(function(){
	if(jQuery(".w-another-add").css("display")=="block"){
		STx();
		jQuery(".w-another-add").hide();
	}else{
		jQuery(".w-another-add").show();
		STo();
	}
	});
});
</script>
<?php
/*
if (!class_exists ('VirtueMartCart')) {
			require(JPATH_VM_SITE . DS . 'helpers' . DS . 'cart.php');
		}
		*/
?>
<input type="hidden" id="name" name="name" value=""/>
<input type="hidden" id="username" name="username" value=""/>

<input type="hidden" name="option" value="com_virtuemart"/>
<input type="hidden" name="view" value="user"/>
<input type="hidden" name="controller" value="user"/>
<input type="hidden" name="task" value="<?php echo $this->fTask; // I remember, we removed that, but why?   ?>"/>
<input type="hidden" name="layout" value="<?php echo $this->getLayout (); ?>"/>
<input type="hidden" name="address_type" id="address_val" value="<?php echo $this->address_type; ?>"/>
<?php
echo JHTML::_ ('form.token');
?>

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
		</div>

		<div class="nav-right" name="f2" action="" method="get">
			<div class="w-step2-3">
				<div class="step2">
					<h2><div><img src="<?php echo JURI::base()."templates/".$template?>/img/step2.png" width="24" height="24" alt=""></div>Levering</h2>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. </p>
					<div>
					<input name="choose" type="radio" value="pickup" checked="checked">
					<span>Forsendelse 49,00 DKK</span>
					</div>
					<div>
					<input name="choose" type="radio" value="pickup">
					<span>Afhentning 0,00 DKK</span>
					</div>
					<div>
						<select>
						<option selected="selected">Amager Isenkram</option>
						<option>Gør Tet Selv Shop</option>
						<option>Tåmby Torv Isenkram</option>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
</div>