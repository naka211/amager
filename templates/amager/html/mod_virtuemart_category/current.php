<?php // no direct access
defined('_JEXEC') or die('Restricted access');
//JHTML::stylesheet ( 'menucss.css', 'modules/mod_virtuemart_category/css/', false );
$ID = str_replace('.', '_', substr(microtime(true), -8, 8));
//echo '<pre>',print_r($categories),'</pre>';die;
function subrender($categories, $level=1, $chaindata=array()){
	?>
	<ul class="<?php echo $chaindata[0].$level; ?>">
	<?php
		foreach ($categories as $category){
			$caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$category->virtuemart_category_id);
			$cattext = $category->category_name;

			if($chaindata[3]==$category->virtuemart_category_id):?>
				<li class="active-sub">
				<?php
			else:
				echo '<li>';
			endif;

			echo JHTML::link($caturl, $cattext);
			$category->childs = $chaindata[1]->call( array( 'VirtueMartModelCategory', 'getChildCategoryList' ),$chaindata[2], $category->virtuemart_category_id );
			if(!empty($category->childs)){
				subrender($category->childs, $level+1, $chaindata);
			}
				?>
			</li>
			<?php
		}
		?>
	</ul>
<?php
}
?>
<div class="cate">
<ul class="VMmenu<?php echo $class_sfx ?>" id="<?php echo "VMmenu".$ID ?>" >
<?php foreach ($categories as $category) {
		 $active_menu = 'class="VmClose"';
		$caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$category->virtuemart_category_id);
		$cattext = $category->category_name;
		//if ($active_category_id == $category->virtuemart_category_id) $active_menu = 'class="active"';
		if (in_array( $category->virtuemart_category_id, $parentCategories)) $active_menu = 'class="VmOpen"';

		?>

<li <?php echo $active_menu ?>>
		<?php echo JHTML::link($caturl, $cattext);
		if ($category->childs) {

		}
		?>
<?php if ($active_menu=='class="VmOpen"') {
	subrender($category->childs,1,array($class_sfx, $cache, $vendorId, $categoryModel->_id));
}
?>
</li>
<?php
	} ?>
</ul>
</div>