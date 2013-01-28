jQuery(document).ready(function(){
	var $scrollbar	= jQuery("#scrollbar1"),
		$shopcart	= jQuery(".list-cart"),
		$btnAdd		= jQuery("#btnAddItem"),
		$bgCart		= jQuery('#bg-cart'),
		$closeAll	= jQuery('#btnClose-cart'),
		active		= "active",
		wWidth		= jQuery(window).width(),
		wHeight		= jQuery(window).height();
		window.timer= "";

	// Set background width and height
	$bgCart.css({
		width   : wWidth,
		height  : wHeight
	});
	
	// Show shopcart when mouse over the shopcart menu
	// active  autoHide after mouse leaving
	jQuery(".img-cart, .info-cart, .bnt-see-cart").on("click", function(){
		$bgCart.fadeIn('fast');
		$shopcart.stop(true,true).fadeIn('fast').addClass(active);
		$scrollbar.tinyscrollbar();

	});

	jQuery(".cart").hover(
		function(){
			//clear timeout
			clearTimeout(window.timer);
		},
		function(e){
			autoHide( e );
		}
	);

	// Close shopcart and hide background clicking on background
	$bgCart.on("click", function(e){
		$shopcart.slideUp('fast').removeClass( active );
		jQuery(this).fadeOut('fast');
		clearTimeout(window.timer);
	});

	// Close shopcart and hide background clicking on close All
	$closeAll.on("click", function(e){
		$shopcart.slideUp('fast').removeClass( active );
		$bgCart.fadeOut('fast');
		clearTimeout(window.timer);
	});

	// Show shopcart and background
	$btnAdd.on("click", function( e ){
		$bgCart.show('fast');
		$shopcart.stop(true,true).fadeIn('fast').addClass(active);
		$scrollbar.tinyscrollbar();
		autoHide( e );
	});

	//Product detail zoom
	jQuery('.imgZoom').prettyPhoto({
		social_tools:'',
		show_title: false
	});

	//Product change thumnail
	changeThumnail();
});

function autoHide(e){

	var $this			= jQuery('.list-cart'),
		$bgCart			= jQuery('#bg-cart'),
		$thisCor		= $this.offset(),
		XX				= $thisCor.left + $this.width(),
		YY				= $thisCor.top + $this.height(),
		active			= "active";
		window.mouseX	= e.pageX;
		window.mouseY	= e.pageY;


	if( !((window.mouseX > $thisCor.left && window.mouseX < XX) &&
		(window.mouseY > $thisCor.top && window.mouseY < YY) ) ){
		if($this.hasClass( active )){
			//console.log('start time out');
			window.timer = setTimeout(function(){
				$this.slideUp('fast',function(){
					$this.removeClass( active );
					$bgCart.fadeOut('fast');
				});
			},2500);
		}
	}

}

function changeThumnail(){
	var $imgLarge = jQuery('#btnLargeImage');
		$imgLarge_icon = jQuery('#btnZoomIcon');
	jQuery('#thumblist img').each( function(){
		var $this = jQuery(this),
			imgLink = $this.attr('src');
		$this.click(function(e){
			e.preventDefault();
			$imgLarge.attr('href',imgLink);
			$imgLarge.find('img').attr('src',imgLink);
			$imgLarge_icon.attr('href',imgLink);
		});
	});
}