<?php
/**
 * @version	     $Id$
 * @copyright			Copyright (C) 2005 - 2009 Joomla! Vargas. All rights reserved.
 * @license	     GNU General Public License version 2 or later; see LICENSE.txt
 * @author	      Guillermo Vargas (guille@vargas.co.cr)
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

// Create shortcut to parameters.
$params = $this->item->params;

if ($this->displayer->canEdit) {
	JHTML::_('behavior.mootools');
	$live_site = JURI::root();
	$ajaxurl = "{$live_site}index.php?option=com_xmap&format=json&task=ajax.editElement&action=toggleElement&".JUtility::getToken().'=1';

	$css = '.xmapexcl img{ border:0px; }'."\n";
	$css .= '.xmapexcloff { text-decoration:line-through; }';
	//$css .= "\n.".$this->item->classname .' li {float:left;}';

	$js = "
		window.addEvent('domready',function (){
			$$('.xmapexcl').each(function(el){
				el.onclick = function(){
					if (this && this.rel) {
						options = JSON.decode(this.rel);
						this.onComplete = checkExcludeResult
						var myAjax = new Request.JSON({
                                                    url:'{$ajaxurl}',
						    onSuccess: checkExcludeResult.bind(this)
						}).get({id:{$this->item->id},uid:options.uid,itemid:options.itemid});
					}
					return false;
				};

			});
		});
		checkExcludeResult = function (response) {
			//this.set('class','xmapexcl xmapexcloff');
			var imgs = this.getElementsByTagName('img');
			if (response.result == 'OK') {
				var state = response.state;
				if (state==0) {
					imgs[0].src='{$live_site}/components/com_xmap/assets/images/unpublished.png';
				} else {
					imgs[0].src='{$live_site}/components/com_xmap/assets/images/tick.png';
				}
			} else {
				alert('The element couldn\\'t be published or upublished!');
			}
		}";

	$doc = JFactory::getDocument();
	$doc->addStyleDeclaration ($css);
	$doc->addScriptDeclaration ($js);
}

$db = JFactory::getDBO();
$query = "SELECT c.virtuemart_category_id, c.category_name FROM #__virtuemart_categories_da_dk AS c INNER JOIN #__virtuemart_category_categories cc ON c.virtuemart_category_id = cc.category_child_id INNER JOIN #__virtuemart_categories ca ON c.virtuemart_category_id = ca.virtuemart_category_id WHERE cc.category_parent_id = 0 AND ca.published = 1 ORDER BY ca.ordering";
$db->setQuery($query);
$cats = $db->loadObjectList();

$query = "SELECT virtuemart_manufacturer_id, mf_name FROM #__virtuemart_manufacturers_da_dk ORDER BY mf_name";
$db->setQuery($query);
$mfs = $db->loadObjectList();
//print_r($cats);exit;
?>
<div id="xmap">
<?php if ($params->get('show_page_heading', 1) && $params->get('page_heading') != '') : ?>
	<h1>
		<?php echo $this->escape($params->get('page_heading')); ?>
	</h1>
<?php endif; ?>

<?php if ($params->get('access-edit') || $params->get('show_title') ||  $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
	<ul>
	<?php if (!$this->print) : ?>
		<?php if ($params->get('show_print_icon')) : ?>
		<li>
			<?php echo JHtml::_('icon.print_popup',  $this->item, $params); ?>
		</li>
		<?php endif; ?>

		<?php if ($params->get('show_email_icon')) : ?>
		<li>
			<?php echo JHtml::_('icon.email',  $this->item, $params); ?>
		</li>
		<?php endif; ?>
	<?php else : ?>
		<li>
			<?php echo JHtml::_('icon.print_screen',  $this->item, $params); ?>
		</li>
	<?php endif; ?>
	</ul>
<?php endif; ?>

<?php if ($params->get('showintro', 1) )  : ?>
<?php echo $this->item->introtext; ?>
<?php endif; ?>
<div class="n-m-l2">
<?php echo $this->loadTemplate('items'); ?>
</div>
<div>
	<h2>Kategorier</h2>
    <ul>
    	<?php foreach($cats as $cat){
			$caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$cat->virtuemart_category_id);
		?>
        <li><a href="<?php echo $caturl;?>"><?php echo $cat->category_name;?></a></li>
        <?php }?>
    </ul>
</div>

<div>
	<h2>mærker vi forhandler</h2>
    <ul>
    	<?php foreach($mfs as $mf){
			$mfurl = JRoute::_('index.php?option=com_virtuemart&view=manufacturer&virtuemart_manufacturer_id='.$mf->virtuemart_manufacturer_id);
		?>
        <li><a href="<?php echo $mfurl;?>"><?php echo $mf->mf_name;?></a></li>
        <?php }?>
    </ul>
</div>

</div>