<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
if (!empty($this->product->images)) {
	$image = $this->product->images[0];
	?>
<div class="img-main">
	<a class="imgZoom" id="btnLargeImage" href="<?php echo $image->file_url?>">
	<?php
		echo $image->displayMediaFull('width="329"',false,'');
	?>
	</a>
</div>
<div class="enlarge">
	<a class="imgZoom" id="btnZoomIcon" href="<?php echo $image->file_url?>">Forstør</a>
</div>
<?php
	// Showing The Additional Images
	$count_images = count ($this->product->images);
		?>
    <div class="list-item">
	<ul id="thumblist" class="gallery">
		<?php
		for ($i = 0; $i < $count_images; $i++) {
			$image = $this->product->images[$i];
			if($i==$count_images-1):
			?>
            <li class="n-m-r">
			<?php else:?>
			<li>
            <?php endif;?>
			<a>
			<?php
                echo $image->displayMediaFull('width="102"',false,'');
            ?>
			</a></li>
			<?php
		}
		?>
        <div class="clear"></div>
	</ul>
    </div>
<?php
}
?>