<!DOCTYPE html>
<html>
  <head>
      <?php require_once('head.php'); ?>  
  </head>
  <body>
    <div id="page">   
      <!--Begin #header-->
      <?php  $t = 1; require_once('header.php'); ?> 
      <!--#header--> 
      
      <div id="content" class="w-content undepages">
          <div class="eachBox info_page"> 
              <div class="content">
                <div class="title_top clearfix">
                  <h2>Glemt din adgangskode?</h2>
                  <a class="btnBack" href="#">Tilbage</a>
                </div>
                <div class="content_main">
                  <p>Angiv venligst emailadressen til din konto. En verificeringskode vli blive sendt til dig. Når du har modtaget verificeringskoden vil du kunne vælge en ny adgangskode til din konto.</p>
                  <p>Emailadresse: *</p>
                  <div class="frmForgetpass">
                    <input type="text">
                    <a class="btnSend" href="#">Send</a>
                  </div>
                </div>
              </div>
          </div><!--eachBox-->
          <?php require_once('list-services.php'); ?>
           <?php require_once('footer.php'); ?>
      </div><!--End #content--> 
      <?php require_once('menu-left.php'); ?>  
    </div><!--End #Page--> 
  </body>
</html>