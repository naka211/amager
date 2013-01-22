<?php // no direct access
defined('_JEXEC') or die('Restricted access');
//JHTML::stylesheet ( 'menucss.css', 'modules/mod_virtuemart_category/css/', false );

/* ID for jQuery dropdown */
$ID = str_replace('.', '_', substr(microtime(true), -8, 8));
$js="
//<![CDATA[
jQuery(document).ready(function() {
		jQuery('#VMmenu".$ID." li.VmClose ul').hide();
		jQuery('#VMmenu".$ID." li .VmArrowdown').click(
		function() {

			if (jQuery(this).parent().next('ul').is(':hidden')) {
				jQuery('#VMmenu".$ID." ul:visible').delay(500).slideUp(500,'linear').parents('li').addClass('VmClose').removeClass('VmOpen');
				jQuery(this).parent().next('ul').slideDown(500,'linear');
				jQuery(this).parents('li').addClass('VmOpen').removeClass('VmClose');
			}
		});
	});
//]]>
" ;

		$document = JFactory::getDocument();
		$document->addScriptDeclaration($js);
		$document->addScriptDeclaration($js);
		$categories = $categoryModel->getCategoryTree();
	function mapTree($dataset, $parent=0) {
		$tree = array();
		foreach ($dataset as $node){
			if ($node->category_parent_id != $parent) continue;
			$node->category_child_id = mapTree($dataset, $node->virtuemart_category_id);
			$tree[] = $node;
		}

		return $tree;
	}
	function treeRender($tree, $padding=0, $menuname=''){
		global $Itemid;
		if(!$padding)
			echo '<ul '.$menuname.'>';
		else
			echo '<ul class="cate-sub'.$padding.'">';

		foreach($tree as $leaf){
			$leaf->link=JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$leaf->virtuemart_category_id);
			if($leaf->virtuemart_category_id == $Itemid)
				$curpage='class="current-page"';
			else
				$curpage='';
			if(empty($leaf->category_child_id))
				echo '<li>';
			else
				echo '<li>';
			echo '<a '.$curpage.' href="'.$leaf->link."&Itemid=".$leaf->virtuemart_category_id.'">'.$leaf->category_name.'</a>';
			if(!empty($leaf->virtuemart_category_id))
				treeRender($leaf->category_child_id,$padding+1);
			echo '</li>';
		}
		echo "</ul>";
	}?>
<div class="cate">
<?php
	treeRender(mapTree($categories),0);
?>
</div>