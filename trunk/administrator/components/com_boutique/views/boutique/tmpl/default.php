<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
//print_r($this->product);exit();
$editor = &JFactory::getEditor();
?>
<style>
  #map_canvas {
    height: 300px;
  }
}
</style>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script language="javascript">
function initialize() {
	var myLatlng = new google.maps.LatLng(<?php if($this->boutique->lat) echo $this->boutique->lat.','.$this->boutique->lng; else echo '55.677746,12.565784';?>);
	var mapOptions = {
	  zoom: 14,
	  center: myLatlng,
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
	
	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map
	});
	
	google.maps.event.addListener(map, "click", function(event) {
		var lat = event.latLng.lat();
		var lng = event.latLng.lng();
		// populate yor box/field with lat, lng
		document.getElementById('lat').value = lat;
		document.getElementById('lng').value = lng;
		
		marker.setMap(null);
		
		marker = new google.maps.Marker({
		  position: event.latLng,
		  map: map
		});
		
	});
}
window.addEvent('domready', function() {
	initialize();
});
</script>
<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
  <div class="col100">
  <fieldset class="adminform">
  <legend><?php echo JText::_( 'Manage restaurent' ); ?></legend>
  <table class="admintable" style="float:left; width:50%">
    <tr>
      <td align="right" class="key"><label for="title_on_link"><?php echo JText::_( 'Name' ); ?>: </label>
      </td>
      <td><input class="text_area" type="text" name="name" id="name" size="50" maxlength="250" value="<?php echo $this->boutique->name;?>" />
      </td>
    </tr>
    <tr>
      <td align="right" class="key"><label for="title_on_link"><?php echo JText::_( 'Information' ); ?>: </label>
      </td>
      <td><?php echo $editor->display( 'information', $this->boutique->information , '100%', '150', '75', '20' ) ; ?>
      </td>
    </tr>
    <tr>
      <td align="right" class="key"><label for="title_on_link"><?php echo JText::_( 'Description' ); ?>: </label>
      </td>
      <td><?php echo $editor->display( 'description', $this->boutique->description , '100%', '150', '75', '20' ) ; ?>
      </td>
    </tr>
    <tr>
      <td align="right" class="key"><label for="title_on_link"><?php echo JText::_( 'Opening hour' ); ?>: </label>
      </td>
      <td><?php echo $editor->display( 'opening', $this->boutique->opening , '100%', '150', '75', '20' ) ; ?>
      </td>
    </tr>
     <tr>
      <td align="right" class="key">Image:</td>
      <td><?php  
	  	if(trim($this->boutique->image)):
	  ?>
      	<?php echo "<img src='".JURI::root(false)."thumbnail/timthumb.php?src=".JURI::root(false)."components/com_boutique/img/".$this->boutique->image."&w=300&zc=1' title='".$this->boutique->name."' alt='".$this->boutique->name."' align='middle' />";?>
		<?php endif;?>
		<input type="hidden" name="image" value="<?php echo $this->boutique->image; ?>" /></td>
    </tr>
    <tr>
      <td align="right" class="key"><label for="imagefile"> <?php echo JText::_( 'Upload image ' ); ?>: </label>
      </td>
      <td><input type="file" name="txtimage" id="txtimage" size="32"  value="" />
      </td>
    </tr>
     <tr>
      <td align="right" class="key"><label for="title_on_link"><?php echo JText::_( 'Select your location' ); ?>: </label>
      </td>
      <td><div id="map_canvas"></div>
      </td>
    </tr>
  </table>
  </fieldset>
  </div>
  <div class="clr"></div>
  <input type="hidden" name="lat" id="lat" value="<?php echo $this->boutique->lat;?>" />
  <input type="hidden" name="lng" id="lng" value="<?php echo $this->boutique->lng;?>" />
  <input type="hidden" name="option" value="com_boutique" />
  <input type="hidden" name="id" value="<?php echo $this->boutique->id; ?>" />
  <input type="hidden" name="task" id="task" value="" />
  <input type="hidden" name="controller" value="boutiques" />
</form>
