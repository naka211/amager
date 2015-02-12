<?php
// No direct access.
defined('_JEXEC') or die;

session_start();
//jimport('joomla.filesystem.file');

// check modules
//$showRightColumn	= ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));

//JHtml::_('behavior.framework', true);

// get params
$doc				= JFactory::getDocument();
//$app				= JFactory::getApplication();
//$color				= $this->params->get('templatecolor');
//$logo				= $this->params->get('logo');
//$templateparams		= $app->getTemplate(true)->params;
$tmplURL=JURI::base().'templates/'.$this->template."/mobile/";
$user = JFactory::getUser();
$user = JUser::getInstance($user->id);
//$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/layout.css', $type = 'text/css', $media = 'screen,projection');
//$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/print.css', $type = 'text/css', $media = 'print');

//$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/hide.js', 'text/javascript');
$opt=JRequest::getVar('option');
$view=JRequest::getVar('view');

if($opt.$view==in_array($opt.$view,array('com_usersprofile','com_virtuemartuser',"com_virtuemartcart","com_virtuemartpluginresponse","com_virtuemartorders"))){
	require_once('index2.php');
} else {
	if($opt != "com_users") $return = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; else $return = 'http://'.$_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
  <head>
  <meta charset="utf-8">
  <script type='text/javascript' src="<?php echo $tmplURL;?>js/jquery-1.8.3.min.js"></script>
  <jdoc:include type="head" />

  <!-- CSS -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?php echo $tmplURL?>css/reset.css">
  <link rel="stylesheet" href="<?php echo $tmplURL?>fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
  <link rel='stylesheet' id='camera-css' href='<?php echo $tmplURL?>css/camera.css' type='text/css' media='all'>
  <link type="text/css" rel="stylesheet" href="<?php echo $tmplURL?>css/jquery.mmenu.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo $tmplURL?>css/styles-moblie.css" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.5; user-scalable=1;" />
  
  <!-- Add fancyBox -->
  <script type="text/javascript" src="<?php echo $tmplURL;?>fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
  <script type="text/javascript" src="<?php echo $tmplURL;?>fancybox/source/helpers/jquery.fancybox-media.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function(){
      jQuery(".fancybox").fancybox();
      
      jQuery('.fancybox-media')
        .attr('rel', 'media-gallery')
        .fancybox({
          openEffect : 'none',
          closeEffect : 'none',
          prevEffect : 'none',
          nextEffect : 'none',

          arrows : false,
          helpers : {
            media : {},
            buttons : {}
          }
        });

      jQuery(".fancybox-big")
      .attr('rel-big', 'gallery')
      .fancybox({
          padding    : 0,
          margin     : 5,
          nextEffect : 'fade',
          prevEffect : 'none',
          autoCenter : false,
          afterLoad  : function () {
              $.extend(this, {
                  aspectRatio : false,
                  type    : 'html',
                  width   : '100%',
                  height  : '100%',
                  content : '<div class="fancybox-image" style="background-image:url(' + this.href + '); background-size: cover; background-position:50% 50%;background-repeat:no-repeat;height:100%;width:100%;" /></div>'
              });
          }
      });
    }); 

  </script>

  <!-- JS  MENU Top-Left jquery.mmenu.oncanvas.js-->
  <script type="text/javascript" src="<?php echo $tmplURL?>js/jquery.mmenu.min.all.js"></script>
  <script type="text/javascript">
     jQuery(document).ready(function() {
        jQuery("#menu-left").mmenu({ 
           offCanvas: {
              position  : "right" 
           }
        });

        jQuery('.news').click(function() {
          jQuery(this).toggle('slide');
        })
     });
  </script>
  ;.
  <!-- JS  banner camera-->
  <script type='text/javascript' src='<?php echo $tmplURL?>js/jquery.min.js'></script>
  <script type='text/javascript' src='<?php echo $tmplURL?>js/jquery.mobile.customized.min.js'></script>
  <script type='text/javascript' src='<?php echo $tmplURL?>js/jquery.easing.1.3.js'></script>
  <script type='text/javascript' src='<?php echo $tmplURL?>js/camera.js'></script>
  <script>
        jQuery(function(){            
            jQuery('#camera_wrap_1').camera({  
                thumbnails: false
            }); 
        });
    </script>
  <script type="text/javascript" src="<?php echo $tmplURL?>js/jquery.carouFredSel-6.0.1-packed.js"></script>
  <script type='text/javascript' src='<?php echo $tmplURL?>js/tho.js'> </script>
  </head>
  <body>
	<div id="page"> 
	<!--Begin #header-->
	<div id="header" class="mm-fixed-top"> <a href="index.php" class="logo"><img src="<?php echo $tmplURL?>img/logo.png"></a>
			<div class="headright">
			<div class="wrapSearch">
					<input class="txtip" placeholder="Hvad søger du efter ...">
					<a href="#"><img src="<?php echo $tmplURL?>img/iconSearch.png"></a></div>
			<a class="btnShopbag" href="cart.php"> <img src="<?php echo $tmplURL?>img/btnShopbag.png"> <span class="nummber">3</span></a> <a href="#menu-left" class="bntMenuleft"><img src="<?php echo $tmplURL?>img/bntMenuleft.png"></a> </div>
			<!--headright--> 
		</div>
	<div id="ppMap" style="display: none;">
			<div class="wrap-pp wrapMap"> <img class="imgMap_demo" src="<?php echo $tmplURL?>img/map-mobile.jpg"> </div>
			<!--wrap-cartcredit--> 
		</div>
	<!--ppCartcredit--> 
	<!--#header-->
	
	<div id="content" class="w-content">
			<div class="eachBox banner-box clearfix">
			<div id="banner" class="clearfix">
					<div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
					<div data-src="<?php echo $tmplURL?>img/slider01.jpg">
							<div class="camera_caption">KØKKENGREJ, EL-UDSTYR, EL-ARTIKLER M.M</div>
						</div>
					<div data-src="<?php echo $tmplURL?>img/slider02.jpg">
							<div class="camera_caption">KØKKENGREJ, EL-UDSTYR, EL-ARTIKLER M.M</div>
						</div>
					<div data-src="<?php echo $tmplURL?>img/slider03.jpg">
							<div class="camera_caption">KØKKENGREJ, EL-UDSTYR, EL-ARTIKLER M.M</div>
						</div>
				</div>
					<!-- #camera_wrap_1 --> 
				</div>
			<!--#banner--> 
		</div>
			<!--.banner-box-->
			
			<div class="eachBox news">
			<p>Den første søndag i hver måned holder vi søndagsåben i alle vores 5 fysiske butikker. </p>
			<p><a href="#">SE MERE</a></p>
			<p><a href="#">Vare der er bestilt inden kl. 14.00 og som er på lager sendes samme dag!</a></p>
			<a class="btnClose" href="#"><img src="<?php echo $tmplURL?>img/btnClose.png" alt=""></a> </div>
			<!--discount-stt-->
			
			<div class="eachBox wrap-list-prod clearfix">
			<ul class="listProd clearfix">
					<li>
					<div class="img_main"> <a href="product_detail.php"><img src="<?php echo $tmplURL?>img/img01.jpg" alt=""></a> </div>
					<div class="top_info">
							<p>Tefal - Jamie Oliver Pande 24 Cm Cast Alu</p>
							<p class="num">Varenr. E2060444</p>
						</div>
					<div class="wrap_price">
							<p class="price_before">629,95 DKK</p>
							<p class="price_sale">(Spar :230 DKK)</p>
						</div>
					<!--wrap_price-->
					<h4>399,95 DKK</h4>
					<p><a href="#">Vis detaljer</a></p>
					<a class="btnMore btn2" href="product_detail.php">Læg i Kurv</a> </li>
					<li>
					<div class="img_main"> <a href="product_detail.php"><img src="<?php echo $tmplURL?>img/img01.jpg" alt=""></a> </div>
					<div class="top_info">
							<p>Tefal - Jamie Oliver Pande 24 Cm Cast Alu</p>
							<p class="num">Varenr. E2060444</p>
						</div>
					<div class="wrap_price">
							<p class="price_before">629,95 DKK</p>
							<p class="price_sale">(Spar :230 DKK)</p>
						</div>
					<!--wrap_price-->
					<h4>399,95 DKK</h4>
					<p><a href="#">Vis detaljer</a></p>
					<a class="btnMore btn2" href="product_detail.php">Læg i Kurv</a> </li>
					<li>
					<div class="img_main"> <a href="product_detail.php"><img src="<?php echo $tmplURL?>img/img01.jpg" alt=""></a> </div>
					<div class="top_info">
							<p>Tefal - Jamie Oliver Pande 24 Cm Cast Alu</p>
							<p class="num">Varenr. E2060444</p>
						</div>
					<div class="wrap_price">
							<p class="price_before">629,95 DKK</p>
							<p class="price_sale">(Spar :230 DKK)</p>
						</div>
					<!--wrap_price-->
					<h4>399,95 DKK</h4>
					<p><a href="#">Vis detaljer</a></p>
					<a class="btnMore btn2" href="product_detail.php">Læg i Kurv</a> </li>
					<li>
					<div class="img_main"> <a href="product_detail.php"><img src="<?php echo $tmplURL?>img/img01.jpg" alt=""></a> </div>
					<div class="top_info">
							<p>Tefal - Jamie Oliver Pande 24 Cm Cast Alu</p>
							<p class="num">Varenr. E2060444</p>
						</div>
					<div class="wrap_price">
							<p class="price_before">629,95 DKK</p>
							<p class="price_sale">(Spar :230 DKK)</p>
						</div>
					<!--wrap_price-->
					<h4>399,95 DKK</h4>
					<p><a href="#">Vis detaljer</a></p>
					<a class="btnMore btn2" href="product_detail.php">Læg i Kurv</a> </li>
					<li>
					<div class="img_main"> <a href="product_detail.php"><img src="<?php echo $tmplURL?>img/img01.jpg" alt=""></a> </div>
					<div class="top_info">
							<p>Tefal - Jamie Oliver Pande 24 Cm Cast Alu</p>
							<p class="num">Varenr. E2060444</p>
						</div>
					<div class="wrap_price">
							<p class="price_before">629,95 DKK</p>
							<p class="price_sale">(Spar :230 DKK)</p>
						</div>
					<!--wrap_price-->
					<h4>399,95 DKK</h4>
					<p><a href="#">Vis detaljer</a></p>
					<a class="btnMore btn2" href="product_detail.php">Læg i Kurv</a> </li>
					<li>
					<div class="img_main"> <a href="product_detail.php"><img src="<?php echo $tmplURL?>img/img01.jpg" alt=""></a> </div>
					<div class="top_info">
							<p>Tefal - Jamie Oliver Pande 24 Cm Cast Alu</p>
							<p class="num">Varenr. E2060444</p>
						</div>
					<div class="wrap_price">
							<p class="price_before">629,95 DKK</p>
							<p class="price_sale">(Spar :230 DKK)</p>
						</div>
					<!--wrap_price-->
					<h4>399,95 DKK</h4>
					<p><a href="#">Vis detaljer</a></p>
					<a class="btnMore btn2" href="product_detail.php">Læg i Kurv</a> </li>
				</ul>
		</div>
			<!--eachBox wrap-list-prod-->
			
			<div class="eachBox box_gavekort">
			<div class="image_carousel">
					<ul id="foo1" class="clearfix">
					<li><a href="#"><img src="<?php echo $tmplURL?>img/imglogo5.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?php echo $tmplURL?>img/imglogo1.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?php echo $tmplURL?>img/imglogo2.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?php echo $tmplURL?>img/imglogo3.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?php echo $tmplURL?>img/imglogo4.jpg" alt=""></a></li>
				</ul>
				</div>
		</div>
			<div class="eachBox">
			<ul class="list-bn">
					<li><a href="#"><img src="<?php echo $tmplURL?>img/image01.jpg"></a></li>
					<li> <a href="#"><img src="<?php echo $tmplURL?>img/newsletter.png"></a> <a class="mt6" href="#"><img src="<?php echo $tmplURL?>img/icon_face2.png"></a> </li>
				</ul>
		</div>
			<div class="wrap-list-serviecs clearfix">
			<h4>MÆRKER VI FORHANDLER</h4>
			<ul class="list-serviecs clearfix">
					<li><a href="#">Aida</a></li>
					<li><a href="#">Fiskars</a></li>
					<li><a href="#">Light Shine</a></li>
					<li><a href="#">Remington</a></li>
					<li><a href="#">Albaline </a></li>
					<li><a href="#">Funktion </a></li>
					<li><a href="#">Melissa</a></li>
					<li><a href="#">Rikki Tikki Jul </a></li>
					<li><a href="#">Amager </a></li>
					<li><a href="#">Galzone </a></li>
					<li><a href="#">Melitta </a></li>
					<li><a href="#">Rosenborg</a></li>
					<li><a href="#">Isenkram </a></li>
					<li><a href="#">Georg Jensen </a></li>
					<li><a href="#">Mette Blomsterberg </a></li>
					<li><a href="#">Rosendahl </a></li>
					<li><a href="#">Andersen </a></li>
					<li><a href="#">Grundig </a></li>
					<li><a href="#">Microplane </a></li>
					<li><a href="#">Rosti </a></li>
					<li><a href="#">Babyliss </a></li>
					<li><a href="#">Hammarplast </a></li>
					<li><a href="#">Min Søsters Kage </a></li>
					<li><a href="#">Rømertopf </a></li>
					<li><a href="#">Bodum </a></li>
					<li><a href="#">Herstal </a></li>
					<li><a href="#">Moulinex </a></li>
					<li><a href="#">Scanpan </a></li>
					<li><a href="#">Bosch </a></li>
					<li><a href="#">Hilfling </a></li>
					<li><a href="#">Nielsen </a></li>
					<li><a href="#">Severin </a></li>
					<li><a href="#">Brabantia </a></li>
					<li><a href="#">Design </a></li>
					<li><a href="#">Light Nilfisk </a></li>
					<li><a href="#">Sirius </a></li>
					<li><a href="#">Braun </a></li>
					<li><a href="#">Hoffmann </a></li>
					<li><a href="#">Nuance </a></li>
					<li><a href="#">Södahl </a></li>
					<li><a href="#">Conzept </a></li>
					<li><a href="#">Holmegaard </a></li>
					<li><a href="#">OBH </a></li>
					<li><a href="#">Sodastream </a></li>
					<li><a href="#">Denver </a></li>
					<li><a href="#">Hoptimist</a></li>
					<li><a href="#">Oral-B </a></li>
					<li><a href="#">Soehnle </a></li>
					<li><a href="#">Duracell </a></li>
					<li><a href="#">Jacob Jensen </a></li>
					<li><a href="#">Oxo Parkone </a></li>
					<li><a href="#">Tefal </a></li>
					<li><a href="#">Elworks </a></li>
					<li><a href="#">Kähler </a></li>
					<li><a href="#">Peugeot </a></li>
					<li><a href="#">Thermos </a></li>
					<li><a href="#">Emsa </a></li>
					<li><a href="#">Kenwood </a></li>
					<li><a href="#">Philips Plast </a></li>
					<li><a href="#">Tiger </a></li>
					<li><a href="#">Eva </a></li>
					<li><a href="#">Krups </a></li>
					<li><a href="#">Team Plast1 </a></li>
					<li><a href="#">Westmark</a></li>
					<li><a href="#">Eva Solo </a></li>
					<li><a href="#">Le Creuset </a></li>
					<li><a href="#">Pyrex </a></li>
					<li><a href="#">Zone</a></li>
					<li><a href="#">Eva Trio </a></li>
					<li><a href="#">Leifheit </a></li>
					<li><a href="#">Raadvad </a></li>
				</ul>
			<h4>BETINGELSER & VILKÅR</h4>
			<ul class="list-serviecs1 clearfix">
					<li><a href="#">Sådan handler du</a></li>
					<li><a href="#">Fragtfri forsendelse</a></li>
					<li><a href="#">Bytteservice</a></li>
					<li><a href="#">Sikker betaling</a></li>
					<li><a href="#">Handelsbetingelser</a></li>
				</ul>
		</div>
			<!--eachBox wrap-list-serviecs-->
			
			<div id="footer" class="clearfix">
				<p class="fl">Copyright © 2014 - Amager Din Isenkræmmer</p>
				<img class="fr" src="<?php echo $tmplURL?>img/cart.png" alt="">
				<div class="clear"></div>
				<a class="btnGotosite" href="<?php echo JURI::base();?>index.php?option=com_virtuemart&controller=virtuemart&task=set_mobile_session&value=0&url=<?php echo base64_encode(JURI::current());?>">TIL WEBSIDEN</a>
			</div>
		</div>
	<!--End #content-->
	<nav id="menu-left">
			<div class="divWrapAll"> <a href="index.php" class="divlogomn"><img src="<?php echo $tmplURL?>img/logo_.png"></a>
			<div class="btnmn clearfix"><a href="#" class="btnMenu">MENU</a> <a href="#" class="btnCate">PRODUKTER</a></div>
			<ul class="ulMenu">
					<li class="<?php if(isset($t) && $t == 1) echo 'menu_active'; ?>"><a href="index.php">FORSIDE</a> </li>
					<li class="<?php if(isset($t) && $t == 2) echo 'menu_active'; ?>"><a href="profil.php">PROFIL</a></li>
					<li class="<?php if(isset($t) && $t == 3) echo 'menu_active'; ?>"><a href="shop.php">BUTIKKER</a></li>
					<li class="<?php if(isset($t) && $t == 4) echo 'menu_active'; ?>"><a href="terms.php">HANDELSBETINGELSER</a></li>
					<li class="<?php if(isset($t) && $t == 5) echo 'menu_active'; ?>"><a href="contact.php">KONTAKT OS</a></li>
				</ul>
			<ul class="ulMenu">
					<li class="<?php if(isset($t) && $t == 6) echo 'menu_active'; ?>"><a href="login.php">LOGIN/REGISTRER</a></li>
				</ul>
			<ul class="ulCate">
					<li><a href="product.php">GLAS OG PORCELÆN</a> </li>
					<li><a href="product.php">FRITID</a> </li>
					<li><a href="product.php">HAVEN</a> </li>
					<li><a href="product.php">EL ARTIKLER</a> </li>
					<li><a href="product.php">GRYDER OG PANDER</a></li>
					<li><a href="product.php">JUL</a> </li>
					<li><a href="product.php">KØKKEN EL</a></li>
					<li><a href="product.php">KØKKENUDSTYR</a></li>
					<li><a href="product.php">LAMPER</a></li>
					<li><a href="product.php">INDKØBSVOGNE</a></li>
					<li><a href="product.php">LYSKÆDER</a></li>
					<li><a href="product.php">PERSONLIG PLEJE</a></li>
					<li><a href="product.php">GAVEARTIKLER</a></li>
				</ul>
		</div>
		</nav>
	<script type="text/javascript">
	jQuery(document).ready(function(){	
		jQuery('.btnMenu').addClass("btnActive");	
		jQuery('.ulCate').hide();
		jQuery('.ulMenu').show();
		
		jQuery('.btnMenu').click(function(){
			jQuery(this).addClass("btnActive");
			jQuery('.btnCate').removeClass("btnActive");	    	
			jQuery('.ulCate').hide();
			jQuery('.ulMenu').show();
		});
		
	    jQuery('.btnCate').click(function(){
	    	jQuery(this).addClass("btnActive");
	    	jQuery('.btnMenu').removeClass("btnActive");    	
			jQuery('.ulCate').show();
			jQuery('.ulMenu').hide();
		});
	});
</script> 
</div>
	<!--End #Page-->
</body>
</html>
<?php }?>