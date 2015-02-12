<!DOCTYPE html>
<html>
  <head>
      <?php require_once('head.php'); ?>  
  </head>
  <body>
    <div id="page">   
      <!--Begin #header-->
      <?php  require_once('header.php'); ?> 
      <!--#header--> 
      <div id="content" class="w-content undepages checkout">  
            <div class="eachBox boxCheckout">
                <div class="clearfix"> 
                   <?php require_once('col-left-checkout.php'); ?>
                   <div class="colCK col-right-checkout clearfix"> 
                        <div class="step step2 clearfix">  
                          <h2><span>2</span>Levering</h2>   
                          <div class="eachRow"><label><input class="lbradio lb1" name="dkk-radio" checked="checked" type="radio">Post Danmark - Med omdeling 49,00 DKK</label></div> 
                          <div class="eachRow"> <label><input class="lbradio lb3" name="dkk-radio" type="radio">Post Danmark - Uden omdeling/Døgnpost 39,00 DKK</label></div>
                          <div class="eachRow"> <label><input class="lbradio lb3" name="dkk-radio" type="radio">Afhentning 0,00 DKK</label></div>
                          </div><!--step2--> 
                          <div class="step step3 clearfix">   
                            <h2><span>3</span>Betalingsmetode</h2> 
                            <p>Du kan betale med følgende betalingskort:</p> 
                            <label><img class="cart-icon" src="img/cart.png"></label>
                          </div><!--step3--> 
                          <div class="step  step4 clearfix">   
                               <h2><span>4</span>Ordreoversigt</h2>
                               <div class="wrapTb clearfix">  
                                    <div class="w-title topbarcart clearfix">
                                      <div class="fl">Produkt</div>
                                      <div class="fr ml60">Pris i alt</div>
                                      <div class="fr">Antal</div>
                                    </div>

                                    <div class="wrapRowPro">
                                        <div class="eachRowPro">
                                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                                            <div class="row rowAbove">
                                                <div class="proName">
                                                  <h2><a href="#">LUCIE ANTIQUE TERRACOTTA </a></h2>
                                                  <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                                </div>
                                                <div class="wrapedit"><span>1</span> </div> 
                                            </div> 
                                            <div class="row rowBelow">  
                                                <div class="proPriceTT"><span class="spanvl">479 DKK </span></div> 
                                            </div>  
                                            <a class="proDel"> <img src="img/btnDel.jpg" alt="Delete"> </a>
                                        </div><!--eachRowPro-->
                                         <div class="eachRowPro">
                                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                                            <div class="row rowAbove">
                                                <div class="proName">
                                                  <h2><a href="#">LUCIE ANTIQUE TERRACOTTA </a></h2>
                                                  <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                                </div>
                                                <div class="wrapedit"><span>1</span> </div> 
                                            </div> 
                                            <div class="row rowBelow">  
                                                <div class="proPriceTT"><span class="spanvl">479 DKK </span></div> 
                                            </div>  
                                            <a class="proDel"> <img src="img/btnDel.jpg" alt="Delete"> </a>
                                        </div><!--eachRowPro-->
                                        <div class="eachRowPro">
                                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                                            <div class="row rowAbove">
                                                <div class="proName">
                                                  <h2><a href="#">LUCIE ANTIQUE TERRACOTTA </a></h2>
                                                  <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                                </div>
                                                <div class="wrapedit"><span>1</span> </div> 
                                            </div> 
                                            <div class="row rowBelow">  
                                                <div class="proPriceTT"><span class="spanvl">479 DKK </span></div> 
                                            </div>  
                                            <a class="proDel"> <img src="img/btnDel.jpg" alt="Delete"> </a>
                                        </div><!--eachRowPro-->
                                    </div> <!--wrapRowPro-->
                                    <div class="wrapTotalPrice clearfix">
                                        <div class="box fl">
                                          <p class="red">Afhentning:<br>Tårnby Torv Isenkram</p>
                                        </div> 
                                          <div class="box boxright">
                                              <div class="eachRow r-nor clearfix">
                                                  <span class="lbNor">Subtotal inkl. moms:</span> <span class="lbPrice">1.916 DKK</span>
                                              </div>
                                              <div class="eachRow r-nor clearfix">
                                                  <span class="lbNor">Heraf moms:</span> <span class="lbPrice">383,20 DKK</span>
                                              </div>
                                              <div class="eachRow r-nor clearfix">
                                                  <span class="lbNor">Subtotal inkl. moms:</span> <span class="lbPrice">150 DKK</span>
                                              </div>
                                               
                                              <div class="eachRow r-total clearfix">
                                                  <span class="lbTotal">TOTAL INKL. MOMS:</span> <span class="totalPrice">1.955 DKK</span>
                                              </div>
                                          </div>                                
                                      </div> <!--wrapTotalPrice-->

                                      <div class="about_cart" style="border-left: 1px solid #cacaca; border-right: 1px solid #cacaca;">
                                        <img class="img-responsive" src="img/img_cart.png" alt="">
                                      </div>

                                      <div class="graris clearfix">
                                        <p class="fl">Har du en værdikode?</p>
                                        <div class="frm_coupon clearfix">
                                            <input name="coupon" placeholder="Angiv din rabatkode">
                                            <a href="#" class="btn2">Aktiver</a>
                                            <input type="submit" value="Send" id="Send" name="Send" style="display:none">
                                        </div>
                                      </div>

                                </div><!-- wrapTb --> 
       
                                <div class="read-terms clearfix">
                                  <label><input type="checkbox">Jeg accepterer <a target="_blank" href="terms.php">handelsbetingelser</a></label> 
                                </div>

                          </div><!--step4--> 
                         </div><!--col-right -->  
                    </div> <!-- clearfix --> 

                    <div class="wrap-button">
                         <a class="btn2 btnGray btnBackShop" href="cart.php"><span class="back"><<</span> Rediger din ordre</a>
                         <a class="btn2 btntoPayment" href="thanks.php">til Betaling <span class="next">>></span></a>  
                    </div><!--wrap-button -->   
                      
             </div> <!--eachBox boxCheckout--> 

            <?php require_once('list-services.php'); ?>    

           <?php require_once('footer.php'); ?>

            <div id="ppCartcredit" style="display: none;">
                <div class="wrap-pp wrap-cartcredit">
                    <h4>ViaBill betingelser</h4>
                    <p>I samarbejde med ViaBill kan vi tilbyde faktura eller delbetaling. Det betyder at du kan købe dine varer nu, og vente med at betale.</p> 
                    <p>Når du gennemfører din bestilling, skal du vælge blot vælge ” ViaBill" som betalingsmetode. Klik på ” Gå til betaling ”og du bliver ført til en sikker side som kun ViaBill har adgang til at se, her gennemføres et kredittjek. Du får svar med det samme, og derefter er bestillingen gennemført.</p> 
                    <p>Vi sender dig dine varer og en faktura som dokumentation på din ordre, sideløbende vil du modtage en opkrævning fra ViaBill, det er denne du skal indbetale efter. </p> 
                    <p>Har du spørgsmål, er du meget velkommen til at kontakte vores kundeservice på tlf. 4930 1699. </p> 
                    <p>Alle spørgsmål vedrørende betaling af en faktura, skal rettes til ViaBill på telefon 88 826 826, da det er dem der yder kreditten. </p>  
                </div><!--wrap-cartcredit-->  
            </div><!--ppCartcredit-->

      </div><!--End #content-->  
      <?php require_once('menu-left.php'); ?>  
    </div><!--End #Page--> 
  </body>
</html>