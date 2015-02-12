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
      <div id="content" class="w-content undepages cart">  
            <div class="eachBox boxCart">
              <div class="content">
                <div class="title_top clearfix">
                  <h2>Indkøbskurven</h2>
                </div>
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
                                    <h2><a href="#">Melitta - Aroma Grande Hvid</a></h2>
                                    <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                  </div>
                                  <div class="wrapedit"><input class="inputNumber" value="1"> <input class="update" value="Opdatere"> </div> 
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
                                    <h2><a href="#">Melitta - Aroma Grande Hvid</a></h2>
                                    <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                  </div>
                                  <div class="wrapedit"><input class="inputNumber" value="1"> <a class="update" href="#">Opdatere</a> </div> 
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
                                    <h2><a href="#">Melitta - Aroma Grande Hvid</a></h2>
                                    <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                  </div>
                                  <div class="wrapedit"><input class="inputNumber" value="1"> <a class="update" href="#">Opdatere</a> </div> 
                              </div> 
                              <div class="row rowBelow"> 
                                  <div class="proPriceTT"><span class="spanvl">479 DKK </span></div> 
                              </div>  
                              <a class="proDel"> <img src="img/btnDel.jpg" alt="Delete"> </a>
                          </div><!--eachRowPro-->
                      </div> <!--wrapRowPro-->
                      <div class="wrapTotalPrice clearfix"> 
                        <div class="box boxright">
                            <div class="eachRow r-nor clearfix">
                                <span class="lbNor">Subtotal inkl. moms:</span> <span class="lbPrice">799,80 DKK</span>
                            </div>
                            <div class="eachRow r-nor clearfix">
                                <span class="lbNor">Heraf moms:</span> <span class="lbPrice">199,95 DKK</span>
                            </div>
                             
                            <div class="eachRow r-total clearfix">
                                <span class="lbTotal">TOTAL INKL. MOMS:</span> <span class="totalPrice">799,80 DKK</span>
                            </div>
                        </div>                                
                      </div> <!--wrapTotalPrice-->

                      <div class="about_cart">
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

                      <div class="wrap-button">
                        <a class="btn2 btntoPayment" href="checkout.php">Gå til kassen <span class="next">>></span></a>  
                      </div><!--wrap-button -->
                  </div><!--  wrapTb--> 
              </div>
                 
             </div> <!--eachBox boxCart--> 

            <?php require_once('list-services.php'); ?>    

           <?php require_once('footer.php'); ?>
      </div><!--End #content-->  
      <?php require_once('menu-left.php'); ?>  
    </div><!--End #Page--> 
  </body>
</html>