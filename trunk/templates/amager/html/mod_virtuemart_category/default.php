<?php // no direct access
defined('_JEXEC') or die('Restricted access');
?>
<span id="add_menu" style="display:none;">
<ul class="main-sub">
	<?php foreach($categories as $category){?>
    <ul class="sub-menu">
      <h3><?php echo $category->category_name;?></h3>
      <?php foreach($category->childs as $child){
		  $caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$child->virtuemart_category_id);
		?>
      <li><a href="<?php echo $caturl;?>"><?php echo $child->category_name;?></a></li>
      <?php }?>
    </ul>
    <?php }?>
</ul>
</span>