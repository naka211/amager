<?php
defined('_JEXEC') or die('Restricted access');
?>
<style>
<?php 
for($i = 1; $i < count($this->shops); $i++){
?>
#map_canvas<?php echo $i;?>, 
<?php }
echo '#map_canvas'.count($this->shops);
?>
{
    height: 328px;
	width: 712px;
  }
}
</style>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script language="javascript">
<?php 
$i = 1;
foreach($this->shops as $shop){
?>
function initialize<?php echo $i;?>() {
	var myLatlng<?php echo $i;?> = new google.maps.LatLng(<?php if($shop->lat) echo $shop->lat.','.$shop->lng; else echo '55.677746,12.565784';?>);
	var mapOptions<?php echo $i;?> = {
	  zoom: 14,
	  center: myLatlng<?php echo $i;?>,
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map<?php echo $i;?> = new google.maps.Map(document.getElementById('map_canvas<?php echo $i;?>'), mapOptions<?php echo $i;?>);
	
	var marker<?php echo $i;?> = new google.maps.Marker({
		position: myLatlng<?php echo $i;?>,
		map: map<?php echo $i;?>
	});
	
	google.maps.event.addListenerOnce(map<?php echo $i;?>, 'idle', function(){
		jQuery("#me<?php echo $i;?>").css("display","none");
	});
}
<?php $i++;}?>
jQuery(document).ready(function() {
    <?php $i = 1;
	foreach($this->shops as $shop){		
	?>
    initialize<?php echo $i;?>();
    jQuery('#clickme<?php echo $i;?>').click(function() 
    {
      jQuery('#me<?php echo $i;?>').animate(
      {
           height: 'toggle'
           }, 2000
      );
      jQuery(this).hide(600);
    });
    jQuery("#luk<?php echo $i;?>").click(function () 
    {
        jQuery("#me<?php echo $i;?>").hide(600)
        jQuery("#clickme<?php echo $i;?>").show(600);
    });
    <?php $i++;}?>
});
</script>
<?php 
$db = JFactory::getDBO();
$db->setQuery('SELECT introtext FROM #__content WHERE id = 17');
$text = $db->loadResult();
?>
<div class="w-frm-login reveal-modal" id="boutiqueArticle">	
	<a href="javascript:void(0);" class="close-reveal-modal"></a>
    <div class="frm-login" style="padding:15px;">
		<?php echo $text;?>
    </div>
</div>
<div id="butikker-page">
  <div class="store">
  	<?php $i = 1;
	foreach($this->shops as $shop){		
	?>
    <div class="store-main">
      <div class="store-img"> <img src="<?php echo JURI::base();?>components/com_boutique/img/<?php echo $shop->image;?>" alt="" height="204" width="333" /> </div>
      <!--.store-img-->
      <div class="store-content">
        <h2><?php echo $shop->name;?></h2>
        <div class="store-info">
         	<?php echo $shop->information;?>
            <p>
            <a href="javascript:void(0);" data-reveal-id="boutiqueArticle">Søndagsåben Tryk her >></a>
            </p>
        </div>
        <!--.store-info-->
        <div class="store-open">
          	<?php echo $shop->opening;?>
        </div>
        <!--.store-open--> 
      </div>
      <!--.store-content-->
      <div class="clear"></div>
      <div class="bnt-seemore btn" id="clickme<?php echo $i;?>"><img src="templates/amager/img/bnt-seemore.jpg" width="722" height="34" alt="" /></div>
      <!--.bnt-seemore--> 
      
      <div class="store-map" id="me<?php echo $i;?>">
        	<?php echo $shop->description;?>
        <!--<div class="bnt-fa-facebook btn">
            <a href="#"><img src="templates/amager/img/bnt-del-face.png" width="158" height="28" alt="" /></a>
        </div>--><!--.bnt-fa-facebook-->
        <div class="store-map-detail">
            <div id="map_canvas<?php echo $i;?>"></div>
        </div><!--.store-map-detail-->
        <div class="bnt-luk" id="luk<?php echo $i;?>">
            <img src="templates/amager/img/bnt-luk.jpg" width="722" height="34" alt="" />
        </div><!--.bnt-luk-->
      </div><!--store-map-->
      
    </div>
    <!--.store-main-->
    <?php $i++;}?>
  </div>
  <!--.store--> 
</div>
<!--#butikker-page--> 