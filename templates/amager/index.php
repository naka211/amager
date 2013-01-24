<?php
// No direct access.
defined('_JEXEC') or die;

//jimport('joomla.filesystem.file');

// check modules
//$showRightColumn	= ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));

//JHtml::_('behavior.framework', true);

// get params
$doc				= JFactory::getDocument();
//$app				= JFactory::getApplication();
//$color				= $this->params->get('templatecolor');
//$logo				= $this->params->get('logo');
//$navposition		= $this->params->get('navposition');
//$templateparams		= $app->getTemplate(true)->params;
$tmplURL=$this->baseurl.'/templates/'.$this->template."/";

//$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/layout.css', $type = 'text/css', $media = 'screen,projection');
//$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/print.css', $type = 'text/css', $media = 'print');

//$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/hide.js', 'text/javascript');
unset($doc->_scripts[$this->baseurl . '/media/system/js/mootools-core.js']);
unset($doc->_scripts[$this->baseurl . '/media/system/js/modal.js']);
unset($doc->_scripts[$this->baseurl . '/media/system/js/core.js']);
unset($doc->_scripts[$this->baseurl . '/media/system/js/caption.js']);
$doc->_script=array();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<!--Style-->
<link rel="stylesheet" type="text/css" href="<?php echo $tmplURL?>css/reset.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $tmplURL?>css/styles.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $tmplURL?>css/reveal.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $tmplURL?>css/scrollbar.css"/>
<style type="text/css">
@font-face {
	font-family: 'Fjalla One';
	font-style: normal;
	font-weight: 400;
	src: local('Fjalla One'), local('FjallaOne-Regular'), url(<?php echo $tmplURL?>font/FjallaOne-Regular.ttf) format('truetype');
}
</style>
<jdoc:include type="head" />

<!--Script-->
<script type="text/javascript" src="<?php echo $tmplURL?>js/webfont.js"></script>
<script type="text/javascript" src="<?php echo $tmplURL?>js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">$.noConflict()</script>
<script type="text/javascript" src="<?php echo $tmplURL?>js/jquery.carouFredSel-6.0.1-packed.js"></script>
<script type="text/javascript" src="<?php echo $tmplURL?>js/jquery.easing.min.1.3.js"></script>
<script type="text/javascript" src="<?php echo $tmplURL?>js/jquery.reveal.js"></script>
<script type="text/javascript" src="<?php echo $tmplURL?>js/jquery.prettyPhoto.js"></script>
<script type='text/javascript' src="<?php echo $tmplURL?>js/jquery.tinyscrollbar.min.js"></script>
<script type='text/javascript' src="<?php echo $tmplURL?>js/duc.js"></script>

<script type="text/javascript">
jQuery(function(){
	/* Hide form input values on focus*/
	jQuery('input:text').each(function(){
		var txtval = jQuery(this).val();
		jQuery(this).focus(function(){
			if(jQuery(this).val() == txtval){
				jQuery(this).val('')
			}
		});
		jQuery(this).blur(function(){
			if(jQuery(this).val() == ""){
				jQuery(this).val(txtval);
			}
		});
	});
});

jQuery(document).ready( function(){
	jQuery('#foo1').carouFredSel({
		circular		:true,
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

	jQuery("#foo3").carouFredSel
	({
		responsive	: true,
		scroll		:
		{
			duration	:1200,
			fx			: "crossfade"
		},
		items		:
		{
			visible		: 1,
			width		: 754,
			height		: "240"
		}
	});

	jQuery(function () {
		jQuery('.reveal').click(function() {
			jQuery(this).children('.cate-sub1').slideToggle();
		});

		jQuery('.reveal li').click(function(event) {
			event.stopPropagation();
		});
	});
});

jQuery(function() {
	jQuery('#callout').find('a').click(function(e){
		e.preventDefault();
		if ( e.target.nodeName == 'SPAN')
		{jQuery(this).parent().animate({'height':0},400, 'easeOutQuint',
		function(){
			jQuery(this).remove();});
		}
		else
		{
			window.location = "http://www.milla-petit.dk";
		}
	});
});

	jQuery('.cart').hover(
	function(){
			jQuery('.list-cart').stop(true, false).animate({color: '#D55E8E'}, 300);
	}
);
</script>
</head>

<body>

<div id="header">
	<div id="w-header">
	<div class="logo"> <a href="./">Logo</a> </div>
	<!--.logo-->
	<div class="nav-top">
		<jdoc:include type="modules" name="menu" />
		<ul class="login">
		<li><a href="#" data-reveal-id="myModal">Login</a></li>
		<li class="no-li"><a href="index.php?option=com_users&view=registration&Itemid=121">Registrer</a></li>
		</ul>
	</div>
	<!--.nav-top-->
	<div class="w-frm-login reveal-modal" id="myModal">    
    <a href="#" class="close-reveal-modal"></a>
    	<?php 
		$username = JRequest::getString('username','','cookie');
		$password = JRequest::getString('password','','cookie');
		?>
    	<form class="frm-login" method="post" action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>">
        	<fieldset>
            	<div class="logo2">
                	<a href="index.php"><img src="<?php echo $tmplURL?>img/logo2.png" width="196" height="97" alt="" /></a>
                </div><!--.logo2-->
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
                    	<input type="checkbox" name="remember" value="yes" /><span>Husk mig</span>
                    </div>
                    <div class="forgot-pass"><a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">Har du glemt dit kodeord, tryk her</a></div>
                </div><!--.info-user-->
                
                <div class="new-user">
                	<h3>Ny bruger</h3>
                    <p>Vil du registere dig som bruger ? Tryk venligst tilmeld.</p>
                    <div class="bnt-sub">
                    	<a href="index.php?option=com_users&view=registration&Itemid=121">Tilmeld</a>
                    </div><!--.bnt-sub-->
                </div><!--.new-user-->
                
            </fieldset>
        </form>
    </div><!--#w-frm-login-->
    
	{module functions}

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

		<div class="sitemap"> <a href="site-map.php">Sitemap</a> </div>

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
			<jdoc:include type="modules" name="above" />
			<jdoc:include type="message" />
			<jdoc:include type="component" />
		<div class="clear"></div>
		<div class="main-brand">
			<div class="image_carousel">
			<div id="foo1">
			<jdoc:include type="modules" name="below" />
			</div>
			<!--foo1-->
			<div class="clear"></div>
			<a class="prev" id="foo1_prev" href="#"><span>prev</span></a> <a class="next" id="foo1_next" href="#"><span>next</span></a> </div>
			<!--.image_carousel-->
		</div>
		<!--.main-brand-->
		<div class="clear"></div>
		<div class="main-brand-shadow"> </div>
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
	<jdoc:include type="modules" name="user1" />
	<jdoc:include type="modules" name="user2" />
	<jdoc:include type="modules" name="user3" />
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

<jdoc:include type="modules" name="debug" />
</body>
</html>
