<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<script language="javascript">
	jQuery(document).ready(function() {	
		//jQuery.updnWatermark.attachAll();
		jQuery("#epay").validate({
			errorPlacement: function(error, element) {			
			},
			invalidHandler: function(form, validator) {
			  var errors = validator.numberOfInvalids();
			  if (errors) {
				jQuery('#alert').html(validator['errorList'][0]['message']);
				jQuery('#backoverlay').show();
				jQuery('#show_popup').show();
				jQuery('#f_focus').html(validator['errorList'][0]['element'].name);
				validator['errorList'][0]['element'].focus();
			  } else {
			  }
			},
			rules: {
				checkok : "required"
				
			},
			messages: {
				checkok: "<?php echo JText::_( 'Udfyld venligst ja, jeg accepterer salgsbetingelserne' ); ?>"
			}
		});
		close_popup=function(){		
			var fel=jQuery('#f_focus').html();
			jQuery('#backoverlay').hide();
			jQuery('#show_popup').hide();
			jQuery('#' + fel ).focus();
		}
	});
	
	function send_register(){
		 document.getElementById('bt-send').click();
	}
</script>
<script>
	<?php $siteURL = JURI::base();?>
	function validateCard(cardnoObj) {
	   
		if (document.forms['epay'].cardno.value.replace(" ", "").length > 0) {
			if (luhn_check(document.forms['epay'].cardno.value.replace(" ", "")) || validTestCardNumber(document.forms['epay'].cardno.value.replace(" ", ""))) {
				// credit card is valid
				document.getElementById("cardnoValidation").innerHTML = "<img src='<?php echo $siteURL?>templates/skoledu/src/images/accept.png' border='0' alt='Korrekt kortnummer indtastet!'>";
			} else{
				document.getElementById("cardnoValidation").innerHTML = "<img src='<?php echo $siteURL?>templates/skoledu/src/images/exclamation.png' border='0' alt='Forkert kortnummer indtastet!'>";
			}
			//getFee();
		}
	}
	function luhn_check(number) {
	  // Strip any non-digits (useful for credit card numbers with spaces and hyphens)
	  var number=number.replace(/\D/g, '');
	 
	  // Set the string length and parity
	  var number_length=number.length;
	  var parity=number_length % 2;
	 
	  // Loop through each digit and do the maths
	  var total=0;
	  for (i=0; i < number_length; i++) {
		var digit=number.charAt(i);
		// Multiply alternate digits by two
		if (i % 2 == parity) {
		  digit=digit * 2;
		  // If the sum is two digits, add them together (in effect)
		  if (digit > 9) {
			digit=digit - 9;
		  }
		}
		// Total up the digits
		total = total + parseInt(digit);
	  }
	 
	  // If the total mod 10 equals 0, the number is valid
	  if (total % 10 == 0) {
		return true;
	  } else {
		return false;
	  }
	}
	function validTestCardNumber(cardno) {
		return (cardno == "3333333333333000" || cardno == "4444444444444000" || cardno == "5555555555555000");
	}
	function onchangeExpmonth() {
			var expmonth = document.forms["epay"].expmonth;
		if (expmonth.value.length != 2) {
			insertImageInLabelHtml("expmonthValidation", "<?php echo $siteURL?>templates/skoledu/src/images/exclamation.png", "Udløbsmåned skal indtastes!");
		} else {
			insertImageInLabelHtml("expmonthValidation", "<?php echo $siteURL?>templates/skoledu/src/images/accept.png", "");
		}
	}
	
	function onchangeExpyear() {
			var expmonth = document.forms["epay"].expyear;
		if (expmonth.value.length != 2) {
			insertImageInLabelHtml("expmonthValidation", "<?php echo $siteURL?>templates/skoledu/src/images/exclamation.png", "Udløbsår skal indtastes!");
		} else {
			insertImageInLabelHtml("expmonthValidation", "<?php echo $siteURL?>templates/skoledu/src/images/accept.png", "");
		}
	}
	
	function onchangeCVC() {
			var expmonth = document.forms["epay"].cvc;
		if (expmonth.value.length != 3) {
			insertImageInLabelHtml("cvcValidation", "<?php echo $siteURL?>templates/skoledu/src/images/exclamation.png", "Kontrolciffer skal indtastes!");
		} else {
			insertImageInLabelHtml("cvcValidation", "<?php echo $siteURL?>templates/skoledu/src/images/accept.png", "");
		}
	}
	function insertImageInLabelHtml(labelID, imageSrc, altTxt)
	{
		document.getElementById(labelID).innerHTML = "<img src='" + imageSrc + "' border='0' alt='" + altTxt + "'>";
	}

</script>
<form action="https://ssl.ditonlinebetalingssystem.dk/auth/default.aspx" method="post" autocomplete="off" name="epay" id="epay">
			
<div class="template clear-fix">
	<div id="forgot-wrapper" class="clear-fix">
		<div class="heading clear-fix">
			<div id="forgot-wrapper" class="clear-fix">
				<!--div class="heading clear-fix">
					<h2>Aliquam tincidunt mauris eu risus.</h2>
					<h3>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</h3>
				</div>
				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
				</p-->
				
				<div class="clear-fix" style="margin-bottom:10px; padding-bottom: 10px; font-size:14px;color: #787878;font-weight: bold;line-height: 20px;">
					<p>Du benytter nu sikker forbindelse, der gør brug af Secure Sockets Layer-teknologien (SSL) til at kryptere transaktionen. Udfyld dine kortinformationer - vores system finder selv ud af, hvilket kort du har.</p>
				</div>
				
				<div class="form-wrapper clear-fix">
					
						<div id="relay-wrapper">
							<div class="each-input-block">
								<div class="each-input clear-fix">
									<label class="input-label">Vare :</label>
									<p class="text-label">Privat abonnement - 1 år</p>
								</div>
								<div class="each-input clear-fix">
									<label class="input-label">Ordrenummer :</label>
									<p class="text-label"><?php echo $this->orderid; ?></p>
								</div>
								<div class="each-input clear-fix">
									<label class="input-label">Beløb :</label>
									<p class="text-label c-blue">DKK <?php echo $this->price; ?></p>
								</div>
								<div class="each-input clear-fix">
									<label class="input-label">Kortnummer :</label>
									<input id="cardno" name="cardno" onchange="validateCard()" type="text" value="" maxlength="16" class="input-input input-card-number"/>
								
									<div id="cardnoValidation" class="input-question-wrapper">
										<!--span class="img-right">Right</span-->
									</div>
								</div>
								<div class="each-input clear-fix">
									<label class="input-label">Udløbsdato (mm/åå) :</label>
									<input id="expmonth" name="expmonth" onchange="onchangeExpmonth();" type="text" value="" maxlength="2" class="input-input input-month"/>
									<span class="t-connect">/</span>
									<input id="expyear" name="expyear" onchange="onchangeExpyear();" type="text" value="" maxlength="2" class="input-input input-year"/>
									<div id="expmonthValidation" class="input-question-wrapper">
										<!--span class="img-right">Right</span-->
									</div>
								</div>
								<div class="each-input clear-fix">
									<label class="input-label">Kontrolcifre :</label>
									<input id="cvc" name="cvc" onchange="onchangeCVC();" type="text" value="" maxlength="3" class="input-input input-digit"/>
									<div id="cvcValidation" class="input-question-wrapper">
										<!--span class="img-wrong">Wrong</span-->
									</div>
								</div>
								
								<p id="t-cc">Sikker betaling:</p>
								<img id="img-cc" src="templates/skoledu/images/cc.png" alt=""/>
								<div class="form-submit form-relay clear-fix">
									<a href="javascript:history.go(-1)" class="link-back mt10">Tilbage</a>
									<div class="form-register-submit clear-fix">
										<div class="eachGrade relayGrade">
											<input name="checkok" id="checkok" type="checkbox" class="input-checkbox"/>
											<span id="link-2-temp">Ja, jeg accepterer <a target="_blank" data-reveal-id="term-popup" href="javascript:void(0);">salgsbetingelserne</a></span>
										</div>
										
										<a href="javascript:void(0);" onclick="send_register();" id="accept-buy">Accepter købet</a>
									</div>
								</div>
							</div>
						</div>
						<div class="pay-temp clear-fix">
							<p>Hvad er kontrolcifre?</p>
							<img src="templates/skoledu/images/cvc_dk.gif.jpg" alt="CKC"/>
							<img src="templates/skoledu/images/cvc_master.gif" alt="CKC"/>
							<br />
							<span id="span-cc-1">Kontrolcifre på Dankort</span>
							<span id="span-cc-2">Kontrolcifre på MasterCard</span>
						</div>
					
				</div>
			</div>

			<input type="hidden" name="merchantnumber" value="<?php echo $this->merchantnumber; ?>"/>
			<input type="hidden" name="accepturl" value="<?php echo $this->accepturl; ?>"/>
			<input type="hidden" name="declineurl" value="<?php echo $this->declineurl; ?>"/>
			<input type="hidden" name="callbackurl" value="<?php echo $this->callbackurl; ?>"/>
			<input type="hidden" name="orderid" value="<?php echo $this->orderid; ?>"/>
			<input type="hidden" name="authemail" value="<?php echo $this->authemail; ?>"/>
			<input type="hidden" name="authsms" value=""/>
			<input type="hidden" name="instantcapture" value="0"/>
			<input type="hidden" name="group" value=""/>
			<input type="hidden" name="amount" value="<?php echo $this->amount; ?>"/>
			<input type="hidden" name="MD5Key" value=""/>
			<input type="hidden" name="currency" value="<?php echo $this->currency; ?>"/>
			<input type="hidden" name="subscription" value="<?php echo $this->subscription; ?>"/>
			<input type="hidden" name="splitpayment" value="0"/>
			<input type="hidden" name="transfee" value="0"/>
			<input type="hidden" name="language" value="1"/>
			<input type="hidden" name="HTTP_COOKIE" value="<?php echo $this->HTTP_COOKIE; ?>"/>
			<input type="hidden" name="instantcallback" value="1"/>
			<input type="hidden" name="httpaccepturl" value="0"/>
			<input type="hidden" name="redirectmethod" value="POST"/>
			<input type="hidden" name="cms" value="<?php echo $this->cms; ?>"/>
			
		</div>
	</div>
</div>
<script type="text/javascript" src="https://relay.ditonlinebetalingssystem.dk/relay/v2/replace_relay_urls.js"></script>

	<input type="hidden" name="types" value="<?php echo $this->types;?>" />

	<button style="display: none;" class="button validate" id="bt-send" type="submit"><?php echo JText::_('Payment'); ?></button>
	<input type="hidden" name="task" value="accept" />
	<input type="hidden" name="id" value="0" />
	<input type="hidden" name="gid" value="0" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>