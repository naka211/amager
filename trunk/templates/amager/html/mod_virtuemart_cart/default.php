<?php // no direct access
defined('_JEXEC') or die('Restricted access');

$data->billTotal = str_replace(",00","",preg_replace("/.*?<strong>([^<]*?)<\/strong>/","$1",$data->billTotal));
//echo '<pre>',print_r($cart),'</pre>';
// Ajax is displayed in vm_cart_products
// ALL THE DISPLAY IS Done by Ajax using "hiddencontainer" ?>
<!-- Virtuemart 2 Ajax Card -->
<div class="vmCartModule" id="vmCartModule">
<div id="bg-cart" style="width: 1905px; height: 601px; display: none; "></div>
<ul class="cart">
	<li>
		<div class="img-cart"><a href="#"><img src="templates/<?php echo $document->template?>/img/img-cart.png" width="38" height="37" alt=""></a></div>
		<div class="info-cart">
			<p><a href="#">Din indkøbskurven</a></p>
			<span class="s_billtotal"><?php echo $data->totalProductTxt ?> <?php if ($data->totalProduct and $show_price) echo $data->billTotal; ?></span>
		</div>
		<div class="bnt-see-cart">
			<a href="#"><img src="templates/<?php echo $document->template?>/img/bnt-sekurv.png" width="56" height="23" alt=""></a>
		</div>

		<div class="list-cart" style="display:none">
		<a href="#" id="btnClose-cart" class="bnt-close"></a>
		<h3>Dine seneste tilføjede produkter:</h3>
		<div id="scrollbar1">
			<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>

			<div id="hiddencontainer" style=" display: none; ">
				<ul>
				<li class="container">
					<div class="list-cart-img vproduct_thumb"></div>
					<div class="list-cart-content">
						<p class="title-pro vproduct_name" style="height:38px"></p>
						<p class="vquantity"></p>
					</div>
					<div class="price-cart vprices"></div>
					<div class="list-cart-close">
						<a href="#">close</a>
					</div>
				</li>
				</ul>
			</div>

			<div class="viewport">
			<div class="overview">
				<div class="vm_cart_products">
					<ul id="list-item">
					<?php
					$prod_buff=$cart->products;
					foreach ($data->products as $product){
						$price=str_replace(",00","",$product["prices"]);
						$prod=current($prod_buff);
						?>
						<li>
							<div class="list-cart-img"><img src="<?php echo $prod->image->file_url_thumb?>" width="45" alt="" /></div>
							<div class="list-cart-content">
								<p class="title-pro" style="height:38px"><?php echo $product["product_name"]?></p>
								<p>x <?php echo $product["quantity"]?></p>
							</div>
							<div class="price-cart"><?php echo $price?></div>
							<div class="list-cart-close">
								<a href="#">close</a>
							</div>
						</li>
					<?php
					next($prod_buff);
					}
					unset($prod);unset($price);unset($prod_buff);?>
					</ul>
				</div>
			</div>
			</div>
		</div>

		<div class="total2">
			<div class="title-total"><p>TOTAL INKL. MOMS</p></div>
			<div class="price2 s_billtotal"><p><?php echo $data->billTotal?></p></div>
		</div>
		<div class="bnt-view-basket"> <a href="<?php echo JRoute::_("index.php?option=com_virtuemart&view=cart".$taskRoute,$useXHTML,$useSSL)?>">SE VAREKURV</a> </div>
		<div class="bnt-checkout"> <a href="">GÅ TIL KASSEN</a> </div>
		</div>
	<div class="clear"></div>
	</li>
</ul>

<noscript><?php echo JText::_('MOD_VIRTUEMART_CART_AJAX_CART_PLZ_JAVASCRIPT') ?></noscript>
</div>

