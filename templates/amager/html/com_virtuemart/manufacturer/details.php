<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
$productModel = VmModel::getModel('product');
$ids = $productModel->sortSearchListQuery();
$products = $productModel->getProducts ($ids);
$productModel->addImages($products,1);
$pagination = $productModel->getPagination(4);
$currency = CurrencyDisplay::getInstance( );
//echo '<pre>',print_r($products),'</pre>';
?>
<div id="callout" class="banner-item">
	<div class="banner-item-img" style="text-align: center;line-height: 212px">
	<?php echo $this->manufacturerImage;?>
	</div><!--.banner-item-img-->
	<div class="banner-item-content">
		<h2><?php echo $this->manufacturer->mf_name?></h2>
		<?php echo $this->manufacturer->mf_desc; ?>
	</div><!--.banner-item-content-->
</div>

	<?php // Manufacturer Email
	if(!empty($this->manufacturer->mf_email)) { ?>
		<div class="manufacturer-email">
		<?php // TO DO Make The Email Visible Within The Lightbox
		echo JHtml::_('email.cloak', $this->manufacturer->mf_email,true,JText::_('COM_VIRTUEMART_EMAIL'),false) ?>
		</div>
	<?php } ?>

	<?php // Manufacturer URL
	if(!empty($this->manufacturer->mf_url)) { ?>
		<div class="manufacturer-url">
			<a target="_blank" href="<?php echo $this->manufacturer->mf_url ?>"><?php echo JText::_('COM_VIRTUEMART_MANUFACTURER_PAGE') ?></a>
		</div>
	<?php }

/* Show products */

		if (!empty($products)){
?>

<div class="product"><ul>
<?php
	// Category and Columns Counter
	$iBrowseCol = 1;

	// Calculating Products Per Row
	$BrowseProducts_per_row =4;

	// Start the Output
	foreach($products as $product){
		$link=JRoute::_ ( 'index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id );
		// Show the horizontal seperator
		if ($iBrowseCol == $BrowseProducts_per_row)
			$row_class=' class="no-mar"';
		else
				$row_class="";

		// Show Products
		?>
		<li<?php echo $row_class?>>
			<div class="img-pro" style="text-align:center">
			<?php // Product Image
			if ($product->images) {
				echo $product->images[0]->displayMediaThumb( '', false );
			}
			?>
			</div>
			<p class="title">
				<a href="<?php echo $product->link?>"><?php echo $product->product_name?></a>
			</p>

				<div class="price">
					<p class="new-price">
<?php
				if (VmConfig::get ( 'show_prices' ) == '1') {
					echo $currency->priceDisplay($product->prices['salesPrice'],0,1.0,false,$currency->_priceConfig['salesPrice'][1] );
				}?>
					</p>
				</div>
<?php if(!empty($product->prices['discountAmount'])){?>
					<div class="sale-off"><img src="templates/<?php echo $template?>/img/tilbud.png" width="67" height="67" alt=""></div>
<?php }?>
<div class="pro-larg fadeIn">
						<div class="img-pro-larg"><a href="<?php echo $link?>"><?php echo $product->images[0]->displayMediaThumb( 'border="0"', false, '' )?></a></div>
						
						<p class="title"><a href="<?php echo $link?>"><?php echo $product->product_name?></a></p>
						<p class="num"><a href="<?php echo $link?>">Varenr. <?php echo $product->product_sku?></a></p>
						<div class="price">
					<?php if(!empty($product->prices['discountAmount'])){?>
						<p class="old-price-larg"><?php echo $currency->priceDisplay($product->prices['basePrice'],0,1.0,false,$currency->_priceConfig['basePrice'][1] );?></p>

						<span class="sale">(SPAR <?php echo $currency->priceDisplay($product->prices['discountAmount'],0,1.0,false,$currency->_priceConfig['discountAmount'][1] );?>)</span>
					<?php }?>

						<p class="price-red"><?php echo $currency->priceDisplay($product->prices['salesPrice'],0,1.0,false,$currency->_priceConfig['salesPrice'][1] );?></p>

						<p class="v-detail"><a href="<?php echo $link?>">Vis detaljer</a></p>
						</div>
						<div class="add-cart"> <a href="#ADDCART">Læg i Kurv</a> </div>
					<?php if(!empty($product->prices['discountAmount'])){?>
						<div class="sale-off"><img src="templates/<?php echo $template?>/img/tilbud.png" width="67" height="67" alt=""></div>
					<?php }?>
					</div>
		</li> <!-- end of product -->
		<?php

		// Do we need to close the current row now?
		if ($iBrowseCol == $BrowseProducts_per_row){
			$iBrowseCol = 1;
		} else {
			$iBrowseCol++;
		}

	} // end of foreach ( $products as $product )
	// Do we need a final closing row tag?
	if ($iBrowseCol != 1) {
?>
	<div class="clear"></div>
<?php
	}
?>
</ul></div>

<div class="pagination"><?php echo $pagination->getPagesLinks (); ?></div>

<?php
		}
?>