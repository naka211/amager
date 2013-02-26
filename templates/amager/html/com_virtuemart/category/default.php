<?php
//vmdebug('$this->category',$this->category);
vmdebug ('$this->category ' . $this->category->category_name);
// Check to ensure this file is included in Joomla!
defined ('_JEXEC') or die('Restricted access');
JHTML::_ ('behavior.modal');
/* javascript for list Slide
  Only here for the order list
  can be changed by the template maker
*/
$js = "
jQuery(document).ready(function () {
	jQuery('.orderlistcontainer').hover(
		function() { jQuery(this).find('.orderlist').stop().show()},
		function() { jQuery(this).find('.orderlist').stop().hide()}
	)
});
";

$document = JFactory::getDocument ();
$document->addScriptDeclaration ($js);

/*$edit_link = '';
if(!class_exists('Permissions')) require(JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'permissions.php');
if (Permissions::getInstance()->check("admin,storeadmin")) {
	$edit_link = '<a href="'.JURI::root().'index.php?option=com_virtuemart&tmpl=component&view=category&task=edit&virtuemart_category_id='.$this->category->virtuemart_category_id.'">
		'.JHTML::_('image', 'images/M_images/edit.png', JText::_('COM_VIRTUEMART_PRODUCT_FORM_EDIT_PRODUCT'), array('width' => 16, 'height' => 16, 'border' => 0)).'</a>';
}

echo $edit_link; */
if (empty($this->keyword)) {
	?>
<div id="callout" class="banner-item">
	<div class="banner-item-img">
	<?php echo $this->category->images[0]->displayMediaFull ('width="336" height="212"', FALSE);?>
	</div><!--.banner-item-img-->
	<div class="banner-item-content">
		<h2><?php echo $this->category->category_name?></h2>
		<?php echo $this->category->category_description; ?>
	</div><!--.banner-item-content-->
	<a href="#"><span class="close"></span></a>
</div>
<?php
}

/* Show child categories */

if (VmConfig::get ('showCategory', 1) and empty($this->keyword)) {
	if ($this->category->haschildren) {

		// Category and Columns Counter
		$iCol = 1;

		// Calculating Categories Per Row
		$categories_per_row = VmConfig::get ('categories_per_row', 3);
		?>

		<div id="category"><ul>

		<?php // Start the Output
		if (!empty($this->category->children)) {
			foreach ($this->category->children as $category) {

				// Category Link
				$caturl = JRoute::_ ('index.php?option=com_virtuemart&view=category&virtuemart_category_id=' . $category->virtuemart_category_id);

				// Show Category

				// Show the horizontal seperator
				if ($iCol == $categories_per_row)
					$row_class=' class="n-m-r"';
				else
					$row_class="";
				?>
				<li<?php echo $row_class?>>
					<div class="cate-img">
					<a href="<?php echo $caturl ?>" title="<?php echo $category->category_name ?>">
					<?php echo $category->images[0]->displayMediaThumb ('width="115" height="104"', FALSE);?>
						</a>
					</div>
					<p class="cate-title">
					<?php echo $category->category_name ?>
					</p>
				</li>
				<?php
				// Do we need to close the current row now?
				if ($iCol == $categories_per_row) {
					$iCol = 1;
				} else {
					$iCol++;
				}
			}
		}
		// Do we need a final closing row tag?
		if ($iCol != 1) {
			?>
			<div class="clear"></div>
		</ul></div>
	<?php } ?>
	</div>

	<?php
	}
}
?>