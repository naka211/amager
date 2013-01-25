<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
if (!empty($this->product->images)) {
	$image = $this->product->images[0];
	?>
<div class="img-main">
	<?php
		echo $image->displayMediaFull('class="imgZoom" id="btnLargeImage"',false);
	?>
</div>
<?php
	$count_images = count ($this->product->images);
	if ($count_images > 1) {
		?>
    <div class="additional-images">
		<?php
		for ($i = 1; $i < $count_images; $i++) {
			$image = $this->product->images[$i];
			?>
            <div class="floatleft">
	            <?php
	                echo $image->displayMediaFull("",true,"rel='vm-additional-images'");
	            ?>
            </div>
			<?php
		}
		?>
        <div class="clear"></div>
    </div>
	<?php
	}
}
  // Showing The Additional Images END ?>