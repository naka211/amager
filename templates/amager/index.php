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
$tmplURL=JURI::base().'templates/'.$this->template."/";
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
<meta http-equiv="x-ua-compatible" content="IE=edge">
<!--Style-->
<link rel="stylesheet" type="text/css" href="<?php echo $tmplURL?>css/reset.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $tmplURL?>css/styles.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $tmplURL?>css/reveal.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $tmplURL?>css/prettyPhoto.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $tmplURL?>css/scrollbar.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $tmplURL?>css/cookieinfo.css"/>
<style type="text/css">
@font-face {
    font-family: 'Fjalla One';
    font-style: normal;
    font-weight: 400;
 src: local('Fjalla One'), local('FjallaOne-Regular'), url(<?php echo $tmplURL?>font/FjallaOne-Regular.ttf) format('truetype');
}
::-ms-clear {
 display: none;
}
</style>
<jdoc:include type="head" />
<?php if($opt.$view==in_array($opt.$view,array("com_virtuemartproductdetails"))){
	$db = JFactory::getDBO();
	$query = 'SELECT product_desc, product_name FROM #__virtuemart_products_da_dk WHERE virtuemart_product_id = '.JRequest::getVar('virtuemart_product_id');	
	$db->setQuery($query);
	$pro = $db->loadObject();
	
	$query = 'SELECT file_url FROM #__virtuemart_medias WHERE virtuemart_media_id = (SELECT virtuemart_media_id FROM #__virtuemart_product_medias WHERE virtuemart_product_id = '.JRequest::getVar('virtuemart_product_id').' AND ordering = 1)';	
	$db->setQuery($query);
	$img = $db->loadResult();
	?>
<meta name="productTitle" property="og:title" content="<?php echo $pro->product_name;?>">
<meta name="productImage" property="og:image" content="<?php echo JURI::base().$img;?>">
<meta property="og:url" content="<?php echo JRoute::_('http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);?>" />
<meta property="og:description" content="<?php echo $pro->product_desc;?>" />
<script>
			jQuery(document).ready(function(){
				jQuery(".share-pro-onface a").click(function(){
					//alert("Oh my loev");
					postFacebookWallDetail("<?php echo urlencode(JURI::root()."index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=".JRequest::getVar('virtuemart_product_id')."&virtuemart_category_id=".JRequest::getVar('virtuemart_category_id')); ?>");
				});
				function postFacebookWallDetail(urlencode){
					t=document.title; 
					window.open('http://www.facebook.com/sharer.php?u='+urlencode+'&v=<?php echo time();?>','sharer','toolbar=0,status=0,width=626,height=436'); 
					return false; 
				}
				
			});
			
			</script>
<?php }?>

<!--Script-->
<script type="text/javascript" src="<?php echo $tmplURL?>js/webfont.js" async></script>
<script type="text/javascript" src="<?php echo $tmplURL?>js/jquery.easing.min.1.3.js"></script>
<script type="text/javascript" src="<?php echo $tmplURL?>js/jquery.reveal.js"></script>
<script type="text/javascript" src="<?php echo $tmplURL?>js/jquery.prettyPhoto.js"></script>
<script type='text/javascript' src="<?php echo $tmplURL?>js/jquery.tinyscrollbar.min.js"></script>
<script type='text/javascript' src="<?php echo $tmplURL?>js/duc.js" async></script>
<?php
$menu = &JSite::getMenu();
if(($menu->getActive()->id == $menu->getDefault()->id) || ($menu->getActive()->id == 115)){
?>
<script type="text/javascript" src="<?php echo $tmplURL?>js/jquery.carouFredSel-6.0.1-packed.js"></script>
<script type="text/javascript">
<?php if($opt.$view==in_array($opt.$view,array('com_virtuemartvirtuemart'))){?>
jQuery(document).ready( function(){
	jQuery('#foo1').carouFredSel({
		circular		:true,
		height			:42,
		infinite		:true,
		prev			:'#foo1_prev',
		next			:'#foo1_next',
		items:{
			visible		:5,
			minimum		:5
	
			},
		scroll:{
			duration	:600,
			items		:1,
			pauseOnHover:true
			},
		auto			:true
	});

	jQuery("#foo3").carouFredSel({
		responsive	: true,
		height		: 245,
		scroll		:
		{
			duration:1200,
			fx		: "crossfade"
		},
		items		:
		{
			visible		: 1,
			width		: 754,
		}
	});
    
    jQuery('#hLibCookieInfo').mouseover(function(){
        jQuery(this).addClass('hLibCookieExpanded');
    }).mouseout(function(){
        jQuery(this).removeClass('hLibCookieExpanded');
    });
    
    <?php if(!isset($_SESSION['cookieinfo'])){
        $_SESSION['cookieinfo'] = 1;
    ?>
       jQuery('#hLibCookieInfo').addClass('hLibCookieExpanded');
    <?php }?>
    
    jQuery('.bt-close-cookie').click(function(){
        jQuery.post("<?php echo JURI::base().'index.php?option=com_virtuemart&controller=virtuemart&task=set_session'?>");
        jQuery('.CookieInfo').addClass('moveCookie');
    });
    <?php if(isset($_SESSION['cookieinfo1'])){?>
       jQuery('.CookieInfo').addClass('moveCookie');
    <?php }?>
});
<?php }?>
jQuery(function() {
	jQuery('#callout').find('a').click(function(e){
		e.preventDefault();
		if ( e.target.nodeName == 'SPAN'){
			jQuery(this).parent().animate({'height':0},400, 'easeOutQuint',
		function(){
			jQuery(this).remove();});
		}
		else
			window.location = "http://www.milla-petit.dk";
	});
});
</script>
<?php
}
?>
<script type="text/javascript">
jQuery(document).ready( function(){
	jQuery(function () {
		jQuery('.reveal').click(function() {
			jQuery(this).children('.cate-sub1').slideToggle();
		});

		jQuery('.reveal li').click(function(event) {
			event.stopPropagation();
		});
	});
	focusInput();
	jQuery('.item-115').append(jQuery('#add_menu').html());
	jQuery('.search2').css('margin-left','218px');
});

focusInput = function(){
	/* Hide form input values on focus*/
	jQuery('input:text').each(function(){
		var txtval = jQuery(this).val();
		jQuery(this).focus(function(){
			if(jQuery(this).val() == txtval){
				jQuery(this).val("")
			}
		});
		jQuery(this).blur(function(){
			if(jQuery(this).val() == ""){
				jQuery(this).val(txtval);
			}
		});
	});
}

	jQuery('.cart').hover(
	function(){
			jQuery('.list-cart').stop(true, false).animate({color: '#D55E8E'}, 300);
	}
);
</script>
</head>

<body>
<?php if($opt.$view==in_array($opt.$view,array('com_virtuemartvirtuemart'))){
    $db = JFactory::getDBO();
    $query = 'SELECT * FROM #__content WHERE id IN (18,19)';	
	$db->setQuery($query);
	$articles = $db->loadObjectList();
    $tmp = json_decode($articles[0]->urls);
    $tmp1 = explode("//",$tmp->urla);
    $link = JURI::base()."images/".$tmp1[1];
?>
<?php if($articles[0]->state){?>
<div id="hLibCookieInfo" class="hLibCookieInfo hLibCookiePreShow hLibCookieFirstDisplay hLibCookieMini" style="top: 40%;">
    <div class="hLibCookieInfoHeader">
        <div class="hLibCookieInfoIcon"></div>
        <div class="hLibCookieInfoHeadline">
            <div class="content"><b><?php echo $articles[0]->title;?></b></div>
        </div>
    </div>
    <div class="hLibCookieInfoBody">
        <div class="content">
            <?php echo $articles[0]->introtext;?>
            <p class="aaa"><a class="bt-download-tilbu" href="<?php echo $link;?>">Downloade tilbudavis</a></p>
        </div>
    </div>
    <!--hLibCookieInfo--> 
</div>
<?php }?>
<div id="CookieInfo" class="CookieInfo">
    <div class="cookie-content">
        <p><?php echo $articles[1]->introtext;?></p>
    </div>
    <!--Cookie-content--> 
    <a class="bt-close-cookie" href="#">Luk</a> </div>
<!--END hLibCookieInfo-->
<?php }?>
<div id="header">
    <div id="w-header">
        <div class="logo"> <a href="./">Logo</a> </div>
        <!--.logo-->
        <div class="nav-top">
            <jdoc:include type="modules" name="menu" />
            <ul class="login">
                <?php if($user->guest){?>
                <li><a href="#" data-reveal-id="myModal">Login</a></li>
                <li class="no-li"><a href="index.php?option=com_users&view=registration&Itemid=121">Registrer</a></li>
                <?php } else {?>
                <li><a href="index.php?option=com_users&task=profile.edit&user_id=<?php echo $user->id;?>">Min konto</a></li>
                <li class="no-li"><a href="index.php?option=com_users&task=user.logout&return=<?php echo base64_encode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>">Log ud</a></li>
                <?php }?>
            </ul>
        </div>
        <!--.nav-top-->
        <div class="w-frm-login reveal-modal" id="myModal"> <a href="javascript:void(0);" class="close-reveal-modal"></a>
            <?php 
		$username = JRequest::getString('username','','cookie');
		$password = JRequest::getString('password','','cookie');
		?>
            <form class="frm-login" method="post" action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>">
                <fieldset>
                    <div class="logo2"> <a href="index.php"><img src="<?php echo $tmplURL?>img/logo2.png" width="196" height="97" alt="" /></a> </div>
                    <!--.logo2-->
                    <h1>Log ind eller opret konto</h1>
                    <div class="info-user">
                        <h3>Eksisterende bruger</h3>
                        <div>
                            <input type="text" class="input" name="username" id="modlgn-username" value="<?php echo $username?$username:'Indtast din email';?>" />
                        </div>
                        <div>
                            <input type="password" class="input" name="password" id="modlgn-passwd" value="<?php echo $password;?>" />
                        </div>
                        <!--<div class="btn-login">--> 
                        <!--<a href="index2.php">Login</a>-->
                        <input type="submit" name="Submit" value=" " class="btn-login" />
                        <!--</div>--><!--.bnt-login-->
                        <div class="chk">
                            <input type="checkbox" name="remember" value="1" <?php echo $username?'checked':'';?>/>
                            <span>Husk mig</span> </div>
                        <div class="forgot-pass"><a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">Har du glemt dit kodeord, tryk her</a></div>
                    </div>
                    <!--.info-user-->
                    
                    <div class="new-user">
                        <h3>Ny bruger</h3>
                        <p>Vil du registere dig som bruger ? Tryk venligst tilmeld.</p>
                        <div class="bnt-sub"> <a href="index.php?option=com_users&view=registration&Itemid=121">Tilmeld</a> </div>
                        <!--.bnt-sub--> 
                    </div>
                    <!--.new-user-->
                    <input type="hidden" name="return" value="<?php echo base64_encode($return); ?>" />
                    <?php echo JHtml::_('form.token'); ?>
                </fieldset>
            </form>
        </div>
        <!--#w-frm-login--> 
        
        {module functions}
        {module Category menu}
        <?php if(!$user->guest){?>
        <div class="welcome">
            <ul>
                <li style="background:none;">Velkommen, <span><?php echo $user->name?></span></li>
            </ul>
        </div>
        <!--.welcome-->
        <?php } else {?>
        <div class="welcome">
            <ul>
                <li style="background:none;">&nbsp;</li>
            </ul>
        </div>
        <?php }?>
        <jdoc:include type="modules" name="cart" />
        <div class="clear"></div>
    </div>
    <!--#w-header--> 
    
</div>
<!--#header-->

<div id="page">
    <div id="nav-search">
        <div id="w-nav-search">
            <div class="top-cate"></div>
            <jdoc:include type="modules" name="search" />
            <div class="func-img"> <img src="<?php echo $tmplURL?>img/img-3.png" width="220" height="34" alt="" /> </div>
            <div class="sitemap"> <a href="index.php?option=com_xmap&view=html&id=1&Itemid=135">Sitemap</a> </div>
        </div>
        <!--#w-nav-search--> 
    </div>
    <!--#header-->
    <div class="clear"></div>
    <div id="main">
        <div id="w-main">
            <div id="nav-left">
                <jdoc:include type="modules" name="left" />
            </div>
            <!--#nav-left-->
            
            <div id="main-content">
                <?php if($opt.$view==in_array($opt.$view,array('com_virtuemartvirtuemart'))){?>
                <jdoc:include type="modules" name="above" />
                <?php }?>
                <jdoc:include type="component" />
                <div class="clear"></div>
                <?php if($opt.$view==in_array($opt.$view,array('com_virtuemartvirtuemart'))){?>
                <jdoc:include type="modules" name="below" />
                <?php }?>
                <!--.main-brand--> 
                
                <!--.main-brand-shadow--> 
            </div>
            <!--#main-content--> 
        </div>
        <!--#w-main--> 
    </div>
    <!--#main--> 
    
</div>
<!--#page-->
<div class="clear"></div>
<div id="footer">
    <div id="w-footer">
        <jdoc:include type="modules" name="user1" style="amageruser1" />
        <jdoc:include type="modules" name="user2" style="amageruser2"  />
        <jdoc:include type="modules" name="user3" style="amageruser3" />
    </div>
    <!--#w-footer--> 
</div>
<!--#footer-->

<div id="footer-bottom">
    <div id="w-footer-bottom">
        <jdoc:include type="modules" name="footer" />
        <div class="clear"></div>
    </div>
    <!--#w-footer-bottom--> 
</div>
<!--#footer-bottom--> 

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-42732693-1', 'amagerisenkram.dk');
  ga('send', 'pageview');
 
</script>
</body>
</html>
<?php }?>