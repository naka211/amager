<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
//JHtml::_('behavior.tooltip');
//JHtml::_('behavior.formvalidation');
JHtml::_('behavior.noframes');
?>
<script language="javascript">
jQuery(document).ready(function()
{
	var private = '';
	var company = '<div><input type="text" value="Firmanavn" name="company" class="required" /></div><div><input type="text" value="CVR-nr." name="cvr" class="required" /></div>';
	var public = '<div><input type="text" value="EAN-nr. *" name="ean" class="required" /></div><div><input type="text" value="Myndighed/Institution *" name="authority" class="required" /></div><div><input type="text" value="Ordre- el. rekvisitionsnr. *" name="order" class="required" /></div><div><input type="text" value="Personreference *" name="person" class="required" />';
	jQuery("#choicemaker").change(function () {
    value = jQuery("#choicemaker").val();
      // You can also use $("#ChoiceMaker").val(); and change the case 0,1,2: to the values of the html select options elements

	if(value == 1){
		jQuery("#companyadd").html('');
		jQuery("#publicadd").html('');
	} else if(value == 2){
		jQuery("#companyadd").html(company);
		jQuery("#publicadd").html('');
	} else {
		jQuery("#companyadd").html('');
		jQuery("#publicadd").html(public);
	}
    });
});
</script>
<div id="signup-page">
    <div id="w-signup-page">
    <div class="signup-title">
        <h2>Opret konto</h2>
        <div class="come-back"><a href="#">Tilbage</a></div><!--.come-back-->
    </div><!--.signup-title-->
    <form method="post" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" name="member-registration" class="info-per" id="member-registration">
        <fieldset>
            <p>Felter markeret med * skal udfyldes (kodeord skal være minimum 4 tegn)</p>
            <h3>Personlig information</h3>
            <div>
                <label>Vælg kundetype *</label>
            </div>
            <div>
                <select name="type" id="choicemaker">
                    <option value="1">Privat</option>
                    <option value="2">Erhverv</option>
                    <option value="3">Offentlig instans</option>
                </select>
            </div>
            
            <div id="w-privat">
            	<div id="companyadd"></div>
                <div>
                  <input type="text" value="E-mail *" name="email" class="required" />
                </div>
                <div id="publicadd"></div>
                <div>
                  <input type="text" value="Fornavn *" name="firstname" class="required" />
                </div>
                <div>
                  <input type="text" value="Efternavn *" name="lastname" class="required" />
                </div>
                <div>
                  <input type="text" value="Adresse *" name="address" class="required" />
                </div>
                <div>
                  <input type="text" value="Postnr. *" name="zipcode" class="required" />
                </div>
                <div>
                  <input type="text" value="By *" name="city" class="required" />
                </div>
                <div>
                  <input type="text" value="Telefon *" name="phone" class="required" />
                </div>
            </div><!--.w-privat-->
            
            <h3>LOG-IND INFORMATION</h3>
            <div>
                <input type="text" value="Kodeord (skal være min 4 tegn) *">
            </div>
            <div>
                <input type="text" value="Bekræft kodeord *">
            </div>
             <div>
                    <label>Bemærk! E-mail bruges til login</label>
                </div>
            <div class="chk2">
                <input type="checkbox">
                <p>Ved registering husk tilmelding nyhedsbrev samtidig </p>
            </div>
            <!--<div class="bnt-subs-now n-m-b">-->
                <!--<a href="index2.php">Tilmeld nu</a>-->
                <button type="submit" class="validate bnt-subs-now n-m-b" style="border:none; cursor:pointer;"> </button>
                <input type="hidden" name="option" value="com_users" />
                <input type="hidden" name="task" value="registration.register" />
                <?php echo JHtml::_('form.token');?>
            <!--</div>--><!--.bnt-subs-now-->
        </fieldset>
    </form>
    </div><!--#w-signup-page-->
</div>
