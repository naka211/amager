<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
JHTML::_( 'behavior.modal' );
?>

<?php # Vendor Store Description
if (!empty($this->vendor->vendor_store_desc) and VmConfig::get('show_store_desc', 1)){?>
	<?php echo $this->vendor->vendor_store_desc; ?>
<?php }

# load categories from front_categories if exist
if ($this->categories and VmConfig::get('show_categories', 1)) echo $this->loadTemplate('categories');

# Show template for : topten,Featured, Latest Products if selected in config BE
if (!empty($this->products) ) echo $this->loadTemplate('products');
?>