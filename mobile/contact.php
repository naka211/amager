<!DOCTYPE html>
<html>
  <head>
      <?php require_once('head.php'); ?>  
  </head>
  <body>
    <div id="page">   
      <!--Begin #header-->
      <?php  $t = 4; require_once('header.php'); ?> 
      <!--#header--> 
      
      <div id="content" class="w-content undepages contact">
          <div class="eachBox boxContact"> 
            <div class="content">
              <div class="title_top clearfix">
                <h2>Kontakt</h2>
              </div>
              <div class="content_main clearfix">
                <p>For henvendelser til Amager isenkram beder vi dig udfylde vores kontaktformular på højre side.<br>
                For bedre at kunne servicere dig, beder vi dig være så præcis i dine oplysninger som muligt<br>
                Vi svarer derefter så hurtigt som muligt - og inden for 1-3 hverdage.</p>
                <article class="add_block clearfix">
                  <h3>Amager Isenkram</h3>
                  <div class="fl">
                    <p>Amager Centret butik 139<br>
                    Reberbanegade 3<br>
                    2300 København S</p>
                  </div>
                  <div class="fr">
                    <p>Tlf: 32 95 08 20<br>
                    Fax: 32 95 08 40<br>
                    <a href="mailto:ac@amagerisenkram.dk">ac@amagerisenkram.dk</a></p>
                  </div>
                </article>
                <article class="add_block clearfix">
                  <h3>GØR DET SELV SHOP</h3>
                  <div class="fl">
                    <p>Amager Centret butik 132<br>
                    Reberbanegade 3<br>
                    2300 København S</p>
                  </div>
                  <div class="fr">
                    <p>Tlf: 32 54 35 11<br>
                    Fax: 32 54 05 66<br>
                    <a href="mailto:gds@amagerisenkram.dk">gds@amagerisenkram.dk</a></p>
                  </div>
                </article>
                <article class="add_block clearfix">
                  <h3>TÅRNBY TORV ISENKRAM</h3>
                  <div class="fl">
                    <p>Tårnby torv 9<br>
                    2770 Kastrup</p>
                  </div>
                  <div class="fr">
                    <p>Tlf: 32 50 36 11<br>
                    Fax: 32 52 15 36<br>
                    <a href="mailto:info@amagerisenkram.dk">info@amagerisenkram.dk</a></p>
                  </div>
                </article>
                <article class="add_block clearfix">
                  <h3>SPINDERIET ISENKRAM</h3>
                  <div class="fl">
                    <p>Valby Torvegade 18<br>
                    2500 Valby</p>
                  </div>
                  <div class="fr">
                    <p>Tlf: 36 16 00 51<br>
                    <a href="mailto:spinderiet@amagerisenkram.dk">spinderiet@amagerisenkram.dk</a></p>
                  </div>
                </article>
                <article class="add_block clearfix">
                  <h3>CITY 2 ISENKRAM</h3>
                  <div class="fl">
                    <p>Plan 2, City 2<br>
                    2630 Taastrup</p>
                  </div>
                  <div class="fr">
                    <p>Tlf: 43 52 30 10<br>
                    <a href="mailto:city2@amagerisenkram.dk">city2@amagerisenkram.dk</a></p>
                  </div>
                </article>

                <h4 class="h4">Kontakt formular</h4>
                <div class="wrap-form-contact">
                  <input class="txtInput" placeholder="Navn*">
                  <input class="txtInput" placeholder="Telefon*">
                  <input class="txtInput" placeholder="E-mail*">
                  <textarea class="txtArea" placeholder="Besked"></textarea>
                  <p>* Skal udfyldes</p>
                  <a class="btn2 btnSend" href="#">Send</a>
                  <a class="btn2 btnNustil" href="#">Nustil</a>
                </div>
              </div>
            </div>
          </div>

          <?php require_once('list-services.php'); ?>
           <?php require_once('footer.php'); ?>
      </div><!--End #content--> 
      <?php require_once('menu-left.php'); ?>  
    </div><!--End #Page--> 
  </body>
</html>