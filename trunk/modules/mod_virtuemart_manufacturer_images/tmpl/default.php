<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$col= 1 ;
?>
<div class="main-brand">
    <div class="image_carousel">
    <div id="foo1">
    <?php
	foreach ($manufacturers as $manufacturer) {?>
        <img src="<?php echo $manufacturer->images[0]->file_url;?>" />
	<?php }
	?>
    </div>
    <!--foo1-->
    <div class="clear"></div>
    <a class="prev" id="foo1_prev" href="#"><span>prev</span></a> <a class="next" id="foo1_next" href="#"><span>next</span></a> </div>
    <!--.image_carousel-->
</div>
<div class="clear"></div>
<div class="main-brand-shadow"> </div>