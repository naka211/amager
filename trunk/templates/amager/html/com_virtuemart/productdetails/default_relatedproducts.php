<?php
// Check to ensure this file is included in Joomla!
defined ( '_JEXEC' ) or die ( 'Restricted access' );
?>
	<div class="product m-b-10">
		<div class="title-relation"<h4><?php echo JText::_('COM_VIRTUEMART_RELATED_PRODUCTS'); ?></h4></div>
		<ul style="text-align: center">
<?php
	foreach ($this->product->customfieldsRelatedProducts as $field) {
	?><li>
		<?php echo $field->display ?>
	</li>
	<?php } ?>
		<div class="clear"></div>
		</ul>
	</div>