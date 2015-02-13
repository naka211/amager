<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_banners
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

//Detect mobile
session_start();
$config =& JFactory::getConfig();
$showPhone = $config->getValue( 'config.show_phone' );
$enablePhone = $config->getValue( 'config.enable_phone' );
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
if(!isset($_SESSION['mobile'])){
	if($detect->isMobile()){
		$_SESSION['mobile'] = true;
	}
}
if($showPhone){
	$_SESSION['mobile'] = $showPhone;
}
if ( ($showPhone || $detect->isMobile()) && ($enablePhone) && ($_SESSION['mobile'])) {
    include('default_mobile.php');
    return;
}
//Detect mobile end

//require_once JPATH_ROOT . '/components/com_banners/helpers/banner.php';
$baseurl = JURI::base();
?>


<div class="banner">
  <div class="html_carousel">
    <div id="foo3">
    	<?php foreach($list as $item):
		$imageurl = $item->params->get('imageurl');
		?>
      <div class="slide"> <img src="<?php echo $baseurl . $imageurl;?>" />
        <div>
          <h4><?php echo $item->name;?></h4>
          <p><?php echo $item->description;?></p>
        </div>
      </div>
      <!--.slide-->
      	<?php endforeach; ?>
    </div>
    <!--#foo3-->
    <div class="clear"></div>
  </div>
  <!--.html_carousel--> 
</div>