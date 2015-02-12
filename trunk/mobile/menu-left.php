<nav id="menu-left">
	<div class="divWrapAll">
		<a href="index.php" class="divlogomn"><img src="img/logo_.png"></a>
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
	$(document).ready(function(){	
		$('.btnMenu').addClass("btnActive");	
		$('.ulCate').hide();
		$('.ulMenu').show();
		
		$('.btnMenu').click(function(){
			$(this).addClass("btnActive");
			$('.btnCate').removeClass("btnActive");	    	
			$('.ulCate').hide();
			$('.ulMenu').show();
		});
		
	    $('.btnCate').click(function(){
	    	$(this).addClass("btnActive");
	    	$('.btnMenu').removeClass("btnActive");    	
			$('.ulCate').show();
			$('.ulMenu').hide();
		});
	});
</script>