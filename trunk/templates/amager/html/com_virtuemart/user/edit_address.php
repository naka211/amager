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
$user = JFactory::getUser();
$user = JUser::getInstance($user->id);
//print_r($user);exit;
?>
<script language="javascript" src="templates/amager/js/jquery.validate.js"></script>
<div id="checkout-page">
<form method="post" id="checkoutForm" name="userForm" class="form-validate" style="padding:0;border-top:none">
<div class="w-checkout">
	<div class="checkout-content">
		<div class="nav-left">
		<h2><div><img src="<?php echo JURI::base()."templates/".$template?>/img/step1.png" width="24" height="24" alt=""></div>Kundeoplysninger</h2>
		<div class="frm-cus-info">
        <?php if($user->guest == 1){?>
        <div><label style="font-size:12px;">Allerede kunde? <a href="#" data-reveal-id="myModal">Tryk her >></a></label></div>
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
        <?php } else {?>
			<div><label class="lb">Kundetype:</label><span><?php if($user->mwctype == 1) echo "Privat"; else if($user->mwctype == 2) echo "Erhverv"; else echo "Offentlig instans";?></span></div>
            <div><label class="lb">E-mail:</label><span><?php echo $user->email;?></span></div>
            <?php if($user->mwctype == 3){?>
            	<div><input type="text" value="<?php echo $user->ean;?>" name="ean" id="ean" maxlength="13" disabled="disabled" /></div>
                <div><input type="text" value="<?php echo $user->authority;?>" name="authority" id="authority" disabled="disabled" /></div>
                <div><input type="text" value="<?php echo $user->order;?>" name="order" id="order" disabled="disabled" /></div>
                <div><input type="text" value="<?php echo $user->person;?>" name="person" id="person" disabled="disabled" /></div>
            <?php } else if($user->mwctype == 2){?>
            	<div><input type="text" value="<?php echo $user->company;?>" name="company" id="company" /></div>
                <div><input type="text" value="<?php echo $user->cvr;?>" name="cvr" id="cvr" /></div>
            <?php }?>
            <div>
            <input type="text" value="<?php echo $user->firstname;?>" name="firstname" id="firstname" disabled="disabled" />
            </div>
            <div>
            <input type="text" value="<?php echo $user->lastname;?>" name="lastname" id="lastname" disabled="disabled" />
            </div>
            <div>
            <input type="text" value="<?php echo $user->address;?>" name="address" id="address" disabled="disabled" />
            </div>
            <div>
            <input type="text" value="<?php echo $user->zipcode;?>" name="zipcode" id="zipcode" maxlength="4" disabled="disabled" />
            </div>
            <div>
            <input type="text" value="<?php echo $user->city;?>" name="city" id="city" disabled="disabled" />
            </div>
            <div>
            <input type="text" value="<?php echo $user->phone;?>" name="phone" id="phone" disabled="disabled" />
            </div>
            
		<?php }?>
        <?php if($user->guest == 1){?>
		<div class="bnt-create-acc" style=""></div>
		<div class="w-create-acc">
			
				<label>Kodeord (skal være min 4 tegn) *</label>
			
			<div>
				<input type="password" minlength="4" name="password1" id="password1">
			</div>
			
				<label>Bekræft kodeord *</label>
			
			<div>
				<input type="password" name="password2" id="password2">
			</div>
            
                <label>Bemærk! E-mail bruges til login</label>
            
		</div>
		<?php }?>
		<div class="bnt-another-add" style=""></div>
		<div class="w-another-add" style="display: none;">
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
			<input type="text" name="zipcode2" id="zipcode2" value="Postnr. *" maxlength="4">
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
				maxlength: 4
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
		jQuery("#username1").val(jQuery("#email").val());
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
		jQuery("#zipcode2").rules("add", {
				requireDefault: true,
				required: true,
				number: true,
				maxlength: 4,
				messages: {
					requireDefault: "",
					required: "",
					number: "",
					maxlength: ""
				}
			});
		jQuery("#address2").rules("add", newRule);
		jQuery("#city2").rules("add", newRule);
		jQuery("#phone2").rules("add", newRule);
	}
	STx = function(){
		jQuery("#firstname2").rules("remove");
		jQuery("#lastname2").rules("remove");
		jQuery("#zipcode2").rules("remove");
		jQuery("#address2").rules("remove");
		jQuery("#city2").rules("remove");
		jQuery("#phone2").rules("remove");
	}

	if(jQuery(".w-another-add").css("display")!="none")
		STo();

	jQuery('.bnt-create-acc').click(function(){
		jQuery(".w-create-acc").slideToggle();
	});

	jQuery('.bnt-another-add').click(function(){
		if(jQuery(".w-another-add").css("display")=="block"){
			STx();
			jQuery(".w-another-add").slideToggle();
			jQuery("#STsameAsBT").val("1");
			
			
			jQuery("#ship1").removeAttr("disabled");
		}else{
			jQuery(".w-another-add").slideToggle();
			STo();
			jQuery("#STsameAsBT").val("0");
			
			jQuery("#ship2").attr("checked", "checked");
			jQuery("#ship1").attr("disabled", "disabled");
		}
	});
	
	formatMoney = function(num){
		var p = num.toFixed(2).split(".");
		return p[0].split("").reverse().reduce(function(acc, num, i, orig) {
			return  num + (i && !(i % 3) ? "." : "") + acc;
		}, "") + "," + p[1];
	}
	
	changeDelivery = function(val){
		if(val == 1){
			jQuery("#shipPrice").html("0,00 DKK");
			var total = formatMoney(parseFloat(jQuery("#subtotal").val()));
			jQuery("#payTotal").html(total+" DKK");
			jQuery("#shippingfee").val(0);
			jQuery("#location").removeAttr("disabled", "disabled");
		} else {
			jQuery("#shipPrice").html("49,00 DKK");
			var total = formatMoney(parseFloat(Number(jQuery("#subtotal").val()) + Number("49")));
			jQuery("#payTotal").html(total+" DKK");
			jQuery("#shippingfee").val(49);
			jQuery("#location").attr( "disabled", "disabled" );
		}
	}
	
	jQuery("#checkoutBtn").bind("click",function(){
		if(jQuery("#tosAccepted").is(':checked')){
			jQuery("#checkoutForm").submit();
		} else {
			alert('Bedes acceptere vilkår og betingelser');
			jQuery("#term").focus();
			return false;
		}
	});
});
</script>
<input type="hidden" id="name" name="name" value=""/>
<input type="hidden" id="username1" name="username1" value=""/>
<input type="hidden" id="userid" name="userid" value="<?php echo $user->id;?>"/>

<input type="hidden" name="option" value="com_virtuemart"/>
<input type="hidden" name="view" value="cart"/>
<input type="hidden" name="task" value="confirm"/>
<input type='hidden' id='STsameAsBT' name='STsameAsBT' value='1'/>
<?php
echo JHTML::_ ('form.token');
?>

<!--temp html-->
	
<!--//temp html-->

		</div>
		</div>

		<div class="nav-right" name="f2" action="" method="get">
			<div class="w-step2-3">
				<div class="step2">
					<h2><div><img src="<?php echo JURI::base()."templates/".$template?>/img/step2.png" width="24" height="24" alt=""></div>Levering</h2>
                    <?php 
					require(JPATH_VM_ADMINISTRATOR . DS . 'helpers' . DS . 'currencydisplay.php');
					$cart = VirtueMartCart::getCart();
					$cart->prepareCartViewData();
					if($cart->pricesUnformatted['salesPrice'] <= 500) $fee = 49; else $fee = 0;
					
					$model		= VmModel::getModel("shipmentmethod");
					$shipment	= $model->getShipments();
					?>
					<?php echo $shipment[1]->shipment_desc;?>
					<div>
					<input name="virtuemart_shipmentmethod_id" type="radio" value="2" checked="checked" onchange="changeDelivery(this.value)" id="ship2" />
					<span>Forsendelse <?php echo number_format($fee,2,',','.').' DKK'; ?></span>
					</div>
					<div>
					<input name="virtuemart_shipmentmethod_id" type="radio" value="1" onchange="changeDelivery(this.value)" id="ship1" />
					<span>Afhentning 0,00 DKK</span>
					</div>
					<div>
						<select name="location" id="location" disabled="disabled">
						<option selected="selected" value="Amager Isenkram">Amager Isenkram</option>
						<option value="Gør Det Selv Shop">Gør Det Selv Shop</option>
						<option value="Tåmby Torv Isenkram">Tåmby Torv Isenkram</option>
						</select>
					</div>
				</div>
      			<script language="javascript">
				jQuery(document).ready(function(){
					changeDelivery = function(val){
						if(val == 1){
							jQuery("#shipPrice").html("0,00 DKK");
							var total = formatMoney(parseFloat(jQuery("#subtotal").val()));
							jQuery("#payTotal").html(total+" DKK");
							jQuery("#shippingfee").val(0);
							jQuery("#location").removeAttr("disabled", "disabled");
						} else {
							jQuery("#shipPrice").html("<?php echo $fee;?>,00 DKK");
							var total = formatMoney(parseFloat(Number(jQuery("#subtotal").val()) + Number("<?php echo $fee;?>")));
							jQuery("#payTotal").html(total+" DKK");
							jQuery("#shippingfee").val(<?php echo $fee;?>);
							jQuery("#location").attr( "disabled", "disabled" );
						}
					}
				});
				</script>          
                <div class="step3">
                  <h2><div><img width="24" height="24" alt="" src="templates/amager/img/step3.png"></div>Betalingsmetode</h2>
                  <p>Du kan betale med følgende betalingskort: </p>
                  <ul>
                    <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/icon-dk.png"></a></li>
                    <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/icon-mastercard.png"></a></li>
                    <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/icon-card2.png"></a></li>
                    <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/icon-visa.png"></a></li>
                    <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/visa2.png"></a></li>
                    <li><a href="#"><img width="95" height="19" alt="" src="templates/amager/img/icon-ean.png"></a></li>
                  </ul>
                </div>
                
			</div>
            <?php 
			
			$currencyDisplay = CurrencyDisplay::getInstance($cart->pricesCurrency);
			?>
            <input type="hidden" id="subtotal" value="<?php echo $cart->pricesUnformatted['salesPrice']?>" />
            <div class="step4">
                <h2><div><img width="24" height="24" alt="" src="templates/amager/img/step4.png"></div>Ordreoversigt</h2>
                <div class="w-list-pro">
                  <div class="w-list-pro-title">
                    <div class="name-pro">
                      <p>Produkt</p>
                    </div>
                    <!--.name-pro-->
                    <div class="no-pro">
                      <p>Vare-nr</p>
                    </div>
                    <!--.no-pro-->
                    <div class="num-pro">
                      <p>Antal</p>
                    </div>
                    <!--.num-pro-->
                    <div style=" width: 100px; float: left; text-align:center;">
                      <p>Pris pr. enhed</p>
                    </div>
                    <div class="total-prices">
                      <p>Pris i alt</p>
                    </div>
                    <!--.total-prices--> 
                  </div>
                  <!--.w-list-pro-title-->
                  
                  <?php foreach($cart->products as $pkey => $item){?>
                  <div class="list-pro-item">
                    <div class="col1-">
                      <div class="list-pro-item-img"><img width="89" height="72" alt="" src="<?php echo $item->image->file_url_thumb;?>"></div>
                      <!--.list-pro-item-img-->
                      <div class="list-pro-item-content">
                        <p><?php echo $item->product_name;?><br>
                          <?php echo $item->customfields;?></p>
                      </div>
                      <!--.list-pro-item-content--> 
                    </div>
                    <!--.col1- -->
                    <div class="col2-">
                      <p><?php echo $item->product_sku;?></p>
                    </div>
                    <!--.col2- -->
                    <div class="col3-">
                      <p><?php echo $item->quantity;?></p>
                    </div>
                    <!--.col3- -->
                    <div class="col4-2">
                      <p><?php echo $currencyDisplay->priceDisplay($cart->pricesUnformatted[$pkey]['salesPrice'],0,1,false,-1);?></p>
                    </div>
                    <div class="col4-">
                      <p>
                      <?php echo $currencyDisplay->priceDisplay($cart->pricesUnformatted[$pkey]['salesPrice'],0,$item->quantity,false,-1);?>
                      </p>
                    </div>
                    <!--.col4- --> 
                  </div>
                  <!--.list-pro-item-->
                  <?php }?>
                 
                  
                </div>
                <!--.w-list-pro--> 
                
                <div class="checkout-payment">
                	<div class="checkout-payment-left">
                    	<div class="func">
                          <div class="w-135"> <img width="17" height="16" alt="" src="templates/amager/img/phone.png"> <span>3250 3611</span> </div>
                          <!--.w-135-->
                          <div class="w-135"> <img width="14" height="17" alt="" src="templates/amager/img/times.png"> <span>Hurtig levering</span> </div>
                          <!--.w-135-->
                          <div class="w-135"> <img width="17" height="14" alt="" src="templates/amager/img/truck.png"> <span>Gratis fragt ved køb over 500 DKK</span> </div>
                          <!--.w-135-->
                          <div class="clear"></div>
                          <div class="w-135"> <img width="15" height="16" alt="" src="templates/amager/img/sticker.png"> <span>Sikker betaling</span> </div>
                          <!--.w-135-->
                          <div class="w-135"> <img width="13" height="16" alt="" src="templates/amager/img/star.png"> <span>14 dages returret</span> </div>
                          <!--.w-135-->
                          <div class="w-135"> <img width="17" height="16" alt="" src="templates/amager/img/sitting.png"> <span>2 års reklamationsret</span> </div>
                          <!--.w-135--> 
                        </div>
                      <!--.func-->
                      
                          <div class="checkout-payment-bot">
                            <h3>Du kan betale med følgende betalingskort: </h3>
                            <ul>
                                <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/icon-dk.png"></a></li>
                                <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/icon-mastercard.png"></a></li>
                                <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/icon-card2.png"></a></li>
                                <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/icon-visa.png"></a></li>
                                <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/visa2.png"></a></li>
                                 <li><a href="#"><img width="95" height="19" alt="" src="templates/amager/img/icon-ean.png"></a></li>
                            </ul>
        				</div><!--.checkout-payment-bot-->
                        
                    </div><!--.checkout-payment-left-->
                    
                    <div class="checkout-payment-right">
                    	<div class="gray">
                        	<label>Forsendelse:</label><span id="shipPrice"><?php echo number_format($fee,2,',','.').' DKK'; ?></span>
                        </div>
                        <div class="m-20">
                        	<label>Subtotal inkl. moms:</label><span><?php echo number_format($cart->pricesUnformatted['salesPrice'],2,',','.').' DKK'; ?></span>
                        </div>
                        <div class="m-20">
                        	<label>Heraf moms:</label><span><?php echo number_format($cart->pricesUnformatted['salesPrice']*0.25,2,',','.');?> DKK</span>
                        </div>
                        <div class="n-b-b3 m-20 black">
                        	<label>TOTAL INKL. MOMS:</label><span id="payTotal"><?php echo number_format($cart->pricesUnformatted['salesPrice']+$fee,2,',','.').' DKK'; ?></span>
                        </div>
                    </div><!--.checkout-payment-right-->
                </div><!--.checkout-payment-->
                
              </div>
		</div>
	</div>
    <div class="w-payment">
		<div><input name="tosAccepted" id="tosAccepted" type="checkbox" value="1"></div><p>Jeg accepterer <a href="index.php?option=com_content&view=article&id=1&Itemid=119" target="_blank">handelsbetingelser</a></p>
		<div class="bnt-payment">
			<a href="javascript:void(0)" id="checkoutBtn">betaling</a>
		</div>
	</div>

	<div class="bnt-edit-order">
		<a href="index.php?option=com_virtuemart&view=cart">Rediger din ordre</a>
	</div>
</div>
</form>
</div>