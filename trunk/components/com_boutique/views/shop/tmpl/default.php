<?php
defined('_JEXEC') or die('Restricted access');
?>
<style>
  #map_canvas1, #map_canvas2, #map_canvas3 {
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
	initialize1();
	initialize2();
	initialize3();

	jQuery('#clickme1').click(function() 
	 {
          jQuery('#me1').animate(
		  {
               height: 'toggle'
               }, 2000
          );
		  jQuery(this).hide(600);
     });
	 
     jQuery('#clickme2').click(function() 
	 {
          jQuery('#me2').animate(
		  {
               height: 'toggle'
               }, 2000
          );
		  jQuery(this).hide(600);
     });
	 
	  jQuery('#clickme3').click(function() 
	 {
          jQuery('#me3').animate(
		  {
               height: 'toggle'
               }, 2000
          );
		  jQuery(this).hide(600);
     });
	 
	 jQuery('#clickme4').click(function() 
	 {
          jQuery('#me1').animate(
		  {
               height: 'toggle'
               }, 2000
          );
		  jQuery('#clickme1').hide(600);
		  
     });
	 
     jQuery('#clickme5').click(function() 
	 {
          jQuery('#me2').animate(
		  {
               height: 'toggle'
               }, 2000
          );
		  jQuery('#clickme2').hide(600);
     });
	 
	  jQuery('#clickme6').click(function() 
	 {
          jQuery('#me3').animate(
		  {
               height: 'toggle'
               }, 2000
          );
		  jQuery('#clickme3').hide(600);
     });
	 
	 jQuery("#luk1").click(function () 
	{
		jQuery("#me1").hide(600)
		jQuery("#clickme1").show(600);
	});
	jQuery("#luk2").click(function () 
	{		
		jQuery("#me2").hide(600)
		jQuery("#clickme2").show(600);
	});
	jQuery("#luk3").click(function () 
	{
		jQuery("#me3").hide(600)
		jQuery("#clickme3").show(600);
	});
});
</script>
<div id="butikker-page">
  <div class="store">
  	<?php $i = 1;
	foreach($this->shops as $shop){		
	?>
    <div class="store-main">
      <div class="store-img"> <img src="<?php echo JURI::base();?>components/com_boutique/img/<?php echo $shop->image;?>" alt="" /> </div>
      <!--.store-img-->
      <div class="store-content">
        <h2><img src="images/<?php echo $shop->name;?>.png" width="160" height="13" alt="" /></h2>
        <div class="store-info">
         	<?php echo $shop->information;?>
            <p>
            <a href="javascript:void(0);" id="clickme<?php echo $i+3;?>">Søndagsåben Tryk her >></a>
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