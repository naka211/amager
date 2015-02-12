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
          <div class="eachBox login_page"> 
              <div class="content">
                <div class="title_top clearfix">
                  <h2>Log ind eller opret konto</h2>
                </div>
                <div class="content_main">
                <h4 class="h4">Eksisterende bruger</h4>
                <div class="frm_login">
                  <input class="txtInput" placeholder="Indtast din e-mail" type="text">
                  <input class="txtInput" placeholder="123456" type="password">
                  <p class="fl"><a class="btnLogin btnGreen" href="index2.php">LOGIN</a></p>
                  <p class="fr mr20p"><input style="display: inline-block;" type="checkbox"> Husk mig</p>
                  <div class="clear"></div>
                  <p><a class="cd75600" href="forgotpass.php">Har du glemt dit kodeord, tryk her >></a></p>
                  <div class="line"></div>
                  <h4 class="h4">Ny bruger</h4>
                  <p>Vil du registere dig som bruger ? Tryk venligst tilmeld.</p>
                  <a class="btnSignup btnGreen" href="register.php">Tilmeld</a>
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