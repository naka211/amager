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
          <div class="eachBox register_page"> 
              <div class="content">
                <div class="title_top clearfix">
                  <h2>Opret konto</h2>
                  <a class="btnBack" href="#">Tilbage</a>
                </div>
                <div class="content_main">
                  <p>Felter markeret med * skal udfyldes (kodeord skal være minimum 4 tegn)</p>
                  <div class="frm_persional_info">
                    <h2>PERSONLIG INFORMATION</h2>
                    <p>Vælg kundetype *</p>
                    <input class="txtInput" placeholder="Indtast din e-mail">
                    <input class="txtInput" placeholder="E-mail *">
                    <input class="txtInput" placeholder="Fornavn *">
                    <input class="txtInput" placeholder="Efternavn *">
                    <input class="txtInput" placeholder="Adresse *">
                    <input class="txtInput" placeholder="Postnr. *">
                    <input class="txtInput" placeholder="By *">
                    <input class="txtInput" placeholder="Telefon *">
                    <h2>LOG-IND INFORMATION</h2>
                    <p>Kodeord (skal være min 4 tegn) *</p>
                    <input class="txtInput" placeholder="" type="password">
                    <p>Bekræft kodeord *</p>
                    <input class="txtInput" placeholder="" type="password">
                    <p>Bemærk! E-mail bruges til login</p>
                    <p><input type="checkbox"> Ved registering husk tilmelding nyhedsbrev samtidig</p>
                    <div class="line"></div>
                    <a class="btnSubscribenow" href="index.php"><img src="img/btnSubscribenow.jpg" alt=""></a>
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