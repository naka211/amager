<?php
/**
 *
 * Layout for the shopper mail, when he confirmed an ordner
 *
 * The addresses are reachable with $this->BTaddress, take a look for an exampel at shopper_adresses.php
 *
 * With $this->orderDetails['shipmentName'] or paymentName, you get the name of the used paymentmethod/shippmentmethod
 *
 * In the array order you have details and items ($this->orderDetails['details']), the items gather the products, but that is done directly from the cart data
 *
 * $this->orderDetails['details'] contains the raw address data (use the formatted ones, like BTaddress). Interesting informatin here is,
 * order_number ($this->orderDetails['details']['BT']->order_number), order_pass, coupon_code, order_status, order_status_name,
 * user_currency_rate, created_on, customer_note, ip_address
 *
 * @package	VirtueMart
 * @subpackage Cart
 * @author Max Milbers, Valerie Isaksen
 *
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 *
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
print_r($_GET);exit;
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<body style="padding: 0; margin: 0px; background: #cacaca; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size: 13px;">
	<table width="940" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto; padding: 15px; background: #fff; border: 1px solid #646464;">
    <tr style="background: #2E3033;">
    	<td style="text-align: center; border-bottom: 1px dotted #CACACA; padding: 10px 0;" colspan="4"><img src="<?php echo JURI::base();?>templates/amager/img/logo.png" width="196" height="97" /></td>
    </tr>
  <tr>
    <td colspan="4" width="375"><h2 style="color: #00b2ea; font-size: 20px; border-bottom: 1px dotted #CACACA; padding: 10px 0; margin: 0;">ORDREOVERSIGT</h2></td>
  </tr>
  <tr height="30">
  	<td><strong>Kundetype:</strong></td>
    <td width="285"><strong>Privat</strong></td>
  </tr>
  <tr height="30">
  	<td><strong>E-mail:</strong></td>
    <td width="285"><strong>kim@graphit.dk</strong></td>
  </tr>
  <tr height="30">
  	<td colspan="2"><strong>Kundeoplysninger:</strong></td>
    <td colspan="2" width="285"><strong>Leveringsadresse:</strong></td>
  </tr>
  <tr height="30" style="color: #3A3A3A;">
  	<td>Fornavn:</td>
    <td>Kim Hau</td>
    <td width="175">Fornavn:</td>
    <td width="375">Kim Hau</td>
  </tr>
  <tr height="30" style="color: #3A3A3A;">
  	<td>Efternavn:</td>
    <td>Tran</td>
    <td width="175">Efternavn:</td>
    <td width="375">Tran</td>
  </tr>
  <tr height="30" style="color: #3A3A3A;">
  	<td>Adresse:</td>
    <td>Rosenfeldtvej 30</td>
    <td width="175">Adresse:</td>
    <td width="375">Rosenfeldtvej 30</td>
  </tr>
  <tr height="30" style="color: #3A3A3A;">
  	<td>Postnr.:</td>
    <td>2665</td>
    <td width="175">Postnr.:</td>
    <td width="375">2665</td>
  </tr>
  <tr height="30" style="color: #3A3A3A;">
  	<td>By:</td>
    <td>Rødovre</td>
    <td width="175">By:</td>
    <td width="375">Rødovre</td>
  </tr>
  <tr valign="top" height="30" style="color: #3A3A3A;">
  	<td height="50">Telefon:</td>
    <td>123456780</td>
    <td width="175">Telefon:</td>
    <td width="375">123456780</td>
  </tr>
  <tr>
  	<td colspan="2">
   	<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td height="30"> <strong>Betaling: </strong></td>
  </tr>
  <tr>
    <td valign="top" height="50">Kortbetaling</td>
  </tr>
</table>

    </td>
    <td height="30" colspan="2">
    	<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td height="30"><strong>Leveringsservice:</strong></td>
  </tr>
  <tr>
    <td valign="top" height="50">Afhentning: Tårnby Torv Isenkram</td>
  </tr>
</table>

    </td>
  </tr>
  <tr height="30">
  	<td colspan="4">
   	  <table width="970" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #CACACA;">
  <tr align="right" style="background: #EFEFEF; padding: 0 10px; text-align: center;">
    <td height="50" width="481" style="padding: 0 10px; text-align: left;">Produkt</td>
    <td width="155">Vare-nr</td>
    <td width="40">Antal</td>
    <td width="110">Pris i alt</td>
    <td align="right" width="182" style="padding: 0 10px;">Pris i alt</td>
  </tr>
  <tr height="30" style="padding: 0 10px; text-align: center;">
    <td style="padding: 0 10px; border-bottom: 1px solid #CACACA; color: #3A3A3A; text-align: left; ">Conzept Electric varme fleeceplaid 160x120cm, 100W</td>
    <td style="border-bottom: 1px solid #CACACA; color: #3A3A3A; text-align: center;">001538</td>
    <td style="border-bottom: 1px solid #CACACA; color: #3A3A3A;">1</td>
    <td style="border-bottom: 1px solid #CACACA; color: #3A3A3A;">199,95 DKK</td>
    <td style="border-bottom: 1px solid #CACACA; text-align: right; padding: 0 10px; color: #3A3A3A;">199,95 DKK</td>
  </tr>
  <tr height="30" style="padding: 0 10px; text-align: center;">
    <td style="padding: 0 10px; border-bottom: 1px solid #CACACA; color: #3A3A3A; text-align: left;">Conzept Electric varme fleeceplaid 160x120cm, 100W</td>
    <td style="border-bottom: 1px solid #CACACA; color: #3A3A3A;">001538</td>
    <td style="border-bottom: 1px solid #CACACA; color: #3A3A3A;">1</td>
    <td style="border-bottom: 1px solid #CACACA; color: #3A3A3A;">199,95 DKK</td>
    <td style="border-bottom: 1px solid #CACACA; text-align: right; padding: 0 10px; color: #3A3A3A;">199,95 DKK</td>
  </tr>
  <tr height="30" style="padding: 0 10px; text-align: center;">
    <td style="padding: 0 10px; border-bottom: 1px solid #CACACA; color: #3A3A3A; text-align: left;">Conzept Electric varme fleeceplaid 160x120cm, 100W</td>
    <td style="border-bottom: 1px solid #CACACA; color: #3A3A3A;">001538</td>
    <td style="border-bottom: 1px solid #CACACA; color: #3A3A3A;">1</td>
    <td style="border-bottom: 1px solid #CACACA; color: #3A3A3A;">199,95 DKK</td>
    <td style="border-bottom: 1px solid #CACACA; text-align: right; padding: 0 10px; color: #3A3A3A;">199,95 DKK</td>
  </tr>
  <tr height="30" style="padding: 0 10px;">
    <td style="text-transform: uppercase; color: red; padding: 0 10px; font-size: 20px;"><strong>Afhentning: Tårnby Torv Isenkram</strong></td>
    <td colspan="2"><table width="260" border="0" cellpadding="0" cellspacing="0" align="right">
      <tr height="30" style="padding: 0 10px;">
        <td width="260" style="color: #3A3A3A;">Forsendelse:</td>
      </tr>
      <tr height="30" style="padding: 0 10px;">
        <td style="color: #3A3A3A;">Subtotal inkl. moms:</td>
      </tr>
      <tr height="30" style="padding: 0 10px;">
        <td style="color: #3A3A3A;">Heraf moms:</td>
      </tr>
      <tr height="30" style="padding: 0 10px;">
        <td><strong>TOTAL INKL. MOMS:</strong></td>
      </tr>
    </table></td>
    <td colspan="2"><table width="136" border="0" cellpadding="0" cellspacing="0" align="right" style="text-align: right;" >
      <tr height="30" style="padding: 0 10px;">
        <td width="146" style="padding: 0 10px; color: #3A3A3A;">49,00 DKK</td>
      </tr>
      <tr height="30" style="padding: 0 10px;">
        <td style="padding: 0 10px; color: #3A3A3A;" >799,80 DKK</td>
      </tr>
      <tr height="30" style="padding: 0 10px;">
        <td style="padding: 0 10px; color: #3A3A3A;">199,95 DKK</td>
      </tr>
      <tr height="30" style="padding: 0 10px;">
        <td style="padding: 0 10px;"><strong>848,80 DKK</strong></td>
      </tr>
    </table></td>
    </tr>
</table>

    </td>
  </tr>
  <tr><td height="30"></td></tr>
  <tr style="background: #2E3033;margin-top: 20px; color: #fff;">
  	<td colspan="4" style="padding: 30px 10px; line-height: 1.8em;">
        Tåmby Torv Isenkram
        Tåmby Torv 9 2770 Kastrup<br />   
        Tlf: 3250 3611 - Fax: 3252 1536<br />
        <a style="color: #fff; text-decoration: none;" href="mailto:info@amagerisenkram.dk">info@amagerisenkram.dk</a>
    </td>
  </tr>
</table>

</body>
</html>