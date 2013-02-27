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
if (!class_exists('VirtueMartCart'))
	require(JPATH_VM_SITE . DS . 'helpers' . DS . 'cart.php');
$cart = VirtueMartCart::getCart();
print_r($cart);exit;
?>
<div id="tak-page">
  	<div id="w-tak-page">
  	<h2>Tak for din ordre</h2>
    <h4>Ordrenummer: 1200294508</h4>
    <p>En ordrebekræftelse vil blive sendt til <a href="mailto:kim@graphit.dk">kim@mywebcreations.dk</a><br>
Har du spørgsmål, kan du kontakte os på +45 99 42 19 60<br>
Mandag - Torsdag kl 09.00 - 17.00, Fredag kl 09.00 - 14.30</p><br>
		<h4>Sporing af ordre online</h4>
        <p>Ønsker du at tjekke din ordrestatus bedes du gå til Amager Isenkram onlineshop og klikke på Hvor er min ordre? øverst på shoppen</p>
        <div class="order-list">
        <h2>ORDREOVERSIGT</h2>
        	<div class="main-info">
                <label>Kundetype:</label><span>Privat</span><br>
                <label>E-mail: </label><span><a href="mailto:kim@graphit.dk">kim@graphit.dk</a></span>
            </div><!--.main-info-->
            <div class="cus-info">
            	<h4>Kundeoplysninger:</h4>
            	<label>Fornavn:</label><span>Kim Hau</span><br>
                <label>Efternavn:</label><span>Tran</span><br>
                <label>Adresse:</label><span>Rosenfeldtvej 30</span><br>
                <label>Postnr.:</label><span>2665</span><br>
                <label>By:</label><span>Rødovre</span><br>
                <label>Telefon:</label><span>123456780</span><br><br>
                <h4>Betaling: </h4>
                <label>Kortbetaling</label>
            </div><!--.cus-info-->
            <div class="delivery-address">
            	<h4>Leveringsadresse:</h4>
            	<label>Fornavn:</label><span>Kim Hau</span><br>
                <label>Efternavn:</label><span>Tran</span><br>
                <label>Adresse:</label><span>Rosenfeldtvej 30</span><br>
                <label>Postnr.:</label><span>2665</span><br>
                <label>By:</label><span>Rødovre</span><br>
                <label>Telefon:</label><span>123456780</span><br><br>
                <h4>Leveringsservice:</h4>
                <span>Afhentning: Tårnby Torv Isenkram</span>
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
                	<p>Pris i alt</p>
                </div><!--.col-4-->
            </div><!--.table-pro-title-->
            <div class="table-pro-content">
            <div class="col-1-content">
            	<p>Conzept Electric varme fleeceplaid 160x120cm, 100W</p>
            </div><!--.col-1-content-->
            <div class="col-2-content">
            	<p> 001538</p>
            </div><!--.col-2-content-->
            <div class="col-3-content">
            	<p>1</p>
            </div><!--.col-3-content-->
            <div class="col-4-content">
            	<p>199,95 DKK</p>
            </div><!--.col-4-content-->
            </div><!--.table-pro-content-->
            <div class="table-pro-content">
            <div class="col-1-content">
            	<p>Conzept Electric varme fleeceplaid 160x120cm, 100W</p>
            </div><!--.col-1-content-->
            <div class="col-2-content">
            	<p> 001538</p>
            </div><!--.col-2-content-->
            <div class="col-3-content">
            	<p>1</p>
            </div><!--.col-3-content-->
            <div class="col-4-content">
            	<p>199,95 DKK</p>
            </div><!--.col-4-content-->
            </div><!--.table-pro-content--> 
            <div class="table-pro-content">
            <div class="col-1-content">
            	<p>Conzept Electric varme fleeceplaid 160x120cm, 100W</p>
            </div><!--.col-1-content-->
            <div class="col-2-content">
            	<p>001538</p>
            </div><!--.col-2-content-->
            <div class="col-3-content">
            	<p>1</p>
            </div><!--.col-3-content-->
            <div class="col-4-content">
            	<p>199,95 DKK</p>
            </div><!--.col-4-content-->
            </div><!--.table-pro-content--> 
            <div class="table-pro-content b-t-2">
            	<div class="pick">
                	<p>Afhentning: Tårnby Torv Isenkram</p>                    
                </div><!--.pick-->
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
            Tåmby Torv Isenkram<br>
            Tåmby Torv 9, 2770 Kastrup<br>
            Tlf: 3250 3611<br>
            Fax: 3252 1536<br>
            info@amagerisenkram.dk</p>
            
        </div><!--.note-shipment-->
      </div><!--#w-tak-page-->
      <div class="bnt-gohome">
      	<a href="index2.php">TIL FORSIDEN</a>
      </div><!--.bnt-gohome-->
      <div class="bnt-print-receipt">
      	<a href="#">PRINT KVITTERING</a>
      </div><!--.bnt-print-receipt-->
  </div>