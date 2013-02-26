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
//print_r($amount);exit;
$siteURL = JURI::base();

//LDC EPAY for form submit data
$accepturl = $siteURL . 'index.php?option=com_virtuemart&view=pluginresponse&task=pluginresponsereceived&pm=1';
$callbackurl = $siteURL . 'index.php?callback=1&option=com_virtuemart&view=pluginresponse&task=pluginresponsereceived&pm=1';
$declineurl = $siteURL . 'index.php?option=com_virtuemart&view=pluginresponse&task=pluginUserPaymentCancel&on='.$cart->order_number . '&pm=1&HTTP_COOKIE='.getenv("HTTP_COOKIE");

$orderid = $cart->order_number;
$merchantid = '8010648';
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
$amount = $cart->pricesUnformatted['billTotal']*100;
?>
<link rel="stylesheet" type="text/css" href="<?php echo $siteURL?>templates/amager/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $siteURL?>templates/amager/css/styles.css"/>
<style>
#page{
	margin-top:120px;
}
</style>
<script>
	<?php $siteURL = JURI::base();?>
	function validateCard(cardnoObj) {
	   
		if (document.forms['epay'].cardno.value.replace(" ", "").length > 0) {
			if (luhn_check(document.forms['epay'].cardno.value.replace(" ", "")) || validTestCardNumber(document.forms['epay'].cardno.value.replace(" ", ""))) {
				// credit card is valid
				document.getElementById("cardnoValidation").innerHTML = "<img src='<?php echo $siteURL?>templates/amager/img/icon-validate-failed.png' border='0' alt='Korrekt kortnummer indtastet!'>";
			} else{
				document.getElementById("cardnoValidation").innerHTML = "<img src='<?php echo $siteURL?>templates/amager/img/icon-validate-pass.png' border='0' alt='Forkert kortnummer indtastet!'>";
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
			insertImageInLabelHtml("expmonthValidation", "<?php echo $siteURL?>templates/amager/img/icon-validate-failed.png", "Udløbsmåned skal indtastes!");
		} else {
			insertImageInLabelHtml("expmonthValidation", "<?php echo $siteURL?>templates/amager/img/icon-validate-pass.png", "");
		}
	}
	
	function onchangeExpyear() {
			var expyear = document.forms["epay"].expyear;
		if (expyear.value.length != 2) {
			insertImageInLabelHtml("expyearValidation", "<?php echo $siteURL?>templates/amager/img/icon-validate-failed.png", "Udløbsår skal indtastes!");
		} else {
			insertImageInLabelHtml("expyearValidation", "<?php echo $siteURL?>templates/amager/img/icon-validate-pass.png", "");
		}
	}
	
	function onchangeCVC() {
			var expmonth = document.forms["epay"].cvc;
		if (expmonth.value.length != 3) {
			insertImageInLabelHtml("cvcValidation", "<?php echo $siteURL?>templates/amager/img/icon-validate-failed.png", "Kontrolciffer skal indtastes!");
		} else {
			insertImageInLabelHtml("cvcValidation", "<?php echo $siteURL?>templates/amager/img/icon-validate-pass.png", "");
		}
	}
	function insertImageInLabelHtml(labelID, imageSrc, altTxt)
	{
		document.getElementById(labelID).innerHTML = "<img src='" + imageSrc + "' border='0' alt='" + altTxt + "'>";
	}

</script>

			
<div id="header">
  <div id="w-header">
    <div class="logo3"> <a href="">Logo</a> </div>
    <!--.logo-->   
       
    <div class="clear"></div>
  </div>
  <!--#w-header--> 
  
</div>
<!--#header-->
<div id="page">
<div id="nav-search">
  <div id="w-nav-search">
  	<div class="secure-payment">
    	<div class="sp-icon">
        	<img src="<?php echo $siteURL?>templates/amager/img/icon-lock.png" width="25" height="34" alt="" />
        </div>
        <p>Sikker betaling</p>
    </div><!--.secure-payment-->
    <div class="func-img3"> <img src="<?php echo $siteURL?>templates/amager/img/img-3.png" width="220" height="34" alt="" /> </div>
    <!--.func-img-->    
  </div>
  <!--#w-nav-search--> 
</div>
<!--#header-->
<div class="clear"></div>
<div id="main">
<div id="w-main">
  <div class="relay-payment-page">
  	<div class="relay-payment-left">
  		<div class="top-info">
  			<ul>
            	<li>
                	<div><img src="<?php echo $siteURL?>templates/amager/img/phone.png" width="17" height="16" alt="" /></div>
                    <p>3250 3611</p>
                </li>
                <li>
                	<div><img src="<?php echo $siteURL?>templates/amager/img/sticker.png" width="17" height="16" alt="" /></div>
                    <p>Sikker betaling</p>
                </li>
                <li>
                	<div><img src="<?php echo $siteURL?>templates/amager/img/times.png" width="14" height="17" alt="" /></div>
                    <p>Hurtig levering </p>
                </li>
                <li>
                	<div><img src="<?php echo $siteURL?>templates/amager/img/star.png" width="13" height="16" alt="" /></div>
                    <p>Kun ægte varer</p>
                </li>
                <li>
                	<div><img src="<?php echo $siteURL?>templates/amager/img/truck.png" width="17" height="14" alt="" /></div>
                    <p>Fri fragt i DK</p>
                </li>
                <li>
                	<div><img src="<?php echo $siteURL?>templates/amager/img/sitting.png" width="17" height="16" alt="" /></div>
                    <p>2 års garanti</p>
                </li>
            </ul>
  		</div><!--.top-info-->
        
        <div class="brand">
          <h1>Butiksinfo</h1>
          <p>Tåmby Torv Isenkram<br />
            Tåmby Torv 9<br />
            2770 Kastrup<br/>
            <br/>
            Tlf: 3250 3611<br />
            Fax: 3252 1536<br />
            <a href="mailto:info@amagerisenkram.dk">info@amagerisenkram.dk</a> </p>
        </div>
        <!--.brand-->
        
  	</div><!--.relay-payment-left-->
  	<div id="main-content">
    		<form action="https://ssl.ditonlinebetalingssystem.dk/auth/default.aspx" method="post" autocomplete="off" name="epay" id="epay" class="relay-payment-content">
        	<fieldset>
            	<div class="left-content">
                <h2>Indtast dine kortoplysninger</h2>
                <p class="fon17">AT BETALE:  <?php echo number_format($cart->pricesUnformatted['billTotal'],2,',','.').' DKK'; ?></p>
                <div>
                	<p><img src="<?php echo $siteURL?>templates/amager/img/icon-1.png" width="24" height="24" alt="" /></p>
                    <label>Kortnummer <span>*</span></label><br />
                    <input class="w200" type="text" id="cardno" name="cardno" onblur="validateCard()" value="" maxlength="16" />
                    <span id="cardnoValidation" class="icon">
                        <!--span class="img-right">Right</span-->
                    </span>
                </div>
                <div>
                	<p><img src="<?php echo $siteURL?>templates/amager/img/icon-2.png" width="24" height="24" alt="" /></p>
                    <label>Udløbsmåned <span>*</span></label><br />
                    <input type="text" id="expmonth" name="expmonth" onchange="onchangeExpmonth();" value="" maxlength="2" />
                    <span id="expmonthValidation" class="icon">
                        <!--span class="img-right">Right</span-->
                    </span>
                </div>
                <div>
                	<p><img src="<?php echo $siteURL?>templates/amager/img/icon-3.png" width="24" height="24" alt="" /></p>
                    <label>Udløbsår <span>*</span></label><br />
                    <input id="expyear" name="expyear" onchange="onchangeExpyear();" type="text" value="" maxlength="2" />
                    <span id="expyearValidation" class="icon">
                        <!--span class="img-right">Right</span-->
                    </span>
                    
                </div>
                <div>
                	<p><img src="<?php echo $siteURL?>templates/amager/img/icon-4.png" width="24" height="24" alt="" /></p>
                    <label>Kontrolcifre <span>*</span></label><br />
                    <input id="cvc" name="cvc" onchange="onchangeCVC();" type="text" value="" maxlength="3" />
                    <span id="cvcValidation" class="icon">
                        <!--span class="img-wrong">Wrong</span-->
                    </span>
                </div>
                <div>
                	<div>Du kan betale med følgende betalingskort:</div>
                    <ul>
                        <li><img src="<?php echo $siteURL?>templates/amager/img/icon-dk.png" width="36" height="20" alt="" /></li>
                        <li><img src="<?php echo $siteURL?>templates/amager/img/icon-mastercard.png" width="36" height="20" alt="" /></li>
                        <li><img src="<?php echo $siteURL?>templates/amager/img/icon-card2.png" width="36" height="20" alt="" /></li>
                        <li><img src="<?php echo $siteURL?>templates/amager/img/icon-visa.png" width="36" height="20" alt="" /></li>
                        <li><img src="<?php echo $siteURL?>templates/amager/img/visa2.png" width="34" height="19" alt="" /></li>
                        <li class="n-m-r"><img src="img/icon-ean.png" width="95" height="19" alt="" /></li>
                      </ul>
                </div>
                <div>
                	<input class="bnt-com-payment" type="submit" value=" " />
                </div>
                </div><!--.left-content-->
                <div class="right-content">
                	<img src="<?php echo $siteURL?>templates/amager/img/img-creditcard1.png" width="324" height="204" alt="" />
                    <img style="margin-left: 40px; " src="<?php echo $siteURL?>templates/amager/img/img-creditcard2.png" width="277" height="157" alt="" />
                </div><!--.right-content-->
            </fieldset>
    
            <input type="hidden" name="merchantnumber" value="<?php echo $merchantnumber; ?>"/>
            <input type="hidden" name="accepturl" value="<?php echo $accepturl; ?>"/>
            <input type="hidden" name="declineurl" value="<?php echo $declineurl; ?>"/>
            <input type="hidden" name="callbackurl" value="<?php echo $callbackurl; ?>"/>
            <input type="hidden" name="orderid" value="<?php echo $orderid; ?>"/>
            <input type="hidden" name="authemail" value="<?php echo $authemail; ?>"/>
            <input type="hidden" name="authsms" value=""/>
            <input type="hidden" name="instantcapture" value="0"/>
            <input type="hidden" name="group" value=""/>
            <input type="hidden" name="amount" value="<?php echo $amount; ?>"/>
            <input type="hidden" name="MD5Key" value=""/>
            <input type="hidden" name="currency" value="<?php echo $currency; ?>"/>
            <input type="hidden" name="subscription" value="<?php echo $subscription; ?>"/>
            <input type="hidden" name="splitpayment" value="0"/>
            <input type="hidden" name="transfee" value="0"/>
            <input type="hidden" name="language" value="1"/>
            <input type="hidden" name="HTTP_COOKIE" value="<?php echo $HTTP_COOKIE; ?>"/>
            <input type="hidden" name="instantcallback" value="1"/>
            <input type="hidden" name="httpaccepturl" value="0"/>
            <input type="hidden" name="redirectmethod" value="POST"/>
            <input type="hidden" name="cms" value="<?php echo $cms; ?>"/>
                    
            
        </form>
    </div><!--#main-content-->
  		
    
  </div><!--.relay-payment-page-->
  </div><!--#w-main-->
</div>
<!--#main-->

</div><!--#page-->
<div class="clear"></div>

<div id="footer-bottom">
  <div id="w-footer-bottom">
    <div class="copyright">
      <p>Copyright © 2013 - Amager Din Isenkræmmer</p>
    </div>
    <!--.copyright-->
    <div class="payment">
      <ul>
        <li><a href="#"><img src="<?php echo $siteURL?>templates/amager/img/icon-dk.gif" width="36" height="20" alt="" /></a></li>
        <li><a href="#"><img src="<?php echo $siteURL?>templates/amager/img/icon-mastercard.gif" width="36" height="20" alt="" /></a></li>
        <li><a href="#"><img src="<?php echo $siteURL?>templates/amager/img/icon-card2.gif" width="36" height="20" alt="" /></a></li>
        <li><a href="#"><img src="<?php echo $siteURL?>templates/amager/img/icon-visa.gif" width="36" height="20" alt="" /></a></li>
        <li><a href="#"><img src="<?php echo $siteURL?>templates/amager/img/visa2.png" width="34" height="19" alt="" /></a></li>
      </ul>
      <div class="ean"><a href="#"><img src="<?php echo $siteURL?>templates/amager/img/img-ean-faktura.png" width="115" height="19" alt="" /></a></div><!--.ean-->
    </div>
    <!--.payment-->
    <div class="design-by">
    	<p><a target="_blank" href="http://www.mywebcreations.dk/">Design af My Web Creations</a></p>
    </div><!--design-by-->
    <div class="clear"></div>
  </div>
  <!--#w-footer-bottom--> 
</div>
<script type="text/javascript" src="https://relay.ditonlinebetalingssystem.dk/relay/v2/replace_relay_urls.js"></script>	