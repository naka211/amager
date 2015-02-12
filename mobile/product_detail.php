<!DOCTYPE html>
<html>
  <head>
      <?php require_once('head.php'); ?>  
  </head>
  <body>
    <div id="page">   
      <!--Begin #header-->
      <?php require_once('header.php'); ?> 
      <!--#header--> 
      
      <div id="content" class="w-content undepages productdetail_page">            
          <ul class="eachBox breadcrumb">
            <li><a href="index.php">Forside</a></li>
            <li><a href="product.php">1000 krukker</a></li>
            <li><a href="product2.php">Krukker antique</a></li>
            <li><a href="product_detail.php">Lucie Antique Terracotta</a></li>
          </ul>    
          <div class="eachBox">
            <div class="content">
              <div class="title_top clearfix">
                <h2>Indkøbskurven</h2>
                <div class="clear mt10"></div>
                <a class="fancybox" href="#"><img src="img/tipen.jpg" alt=""></a>
                <a href="#"><img src="img/del-facebook.png" alt=""></a>
              </div>
               <div class="product_img">
                <div class="img_larg">
                  <a id="btnLargeImage" class="fancybox" href="img/thumnail/img_larg.jpg"><img src="img/thumnail/img_larg.jpg" alt=""></a>
                </div>
                <a id="btnZoomIcon" class="btnZoom fancybox" href="img/thumnail/img_larg.jpg"><img src="img/icon_zoom.png" alt=""></a>
                <div class="video clearfix"> 
                  <a class="fancybox-media" href="https://www.youtube.com/watch?v=-1gQDlgrAQk"><img class="imgDemoVideo" src="img/thumnail/img_small2.jpg" alt=""></a>
                </div>
              </div>
            </div>

            <div class="content mt10 pad10">
              <div class="product_content">
                <p><strong>Varenr. 2373</strong></p>
                <div class="overview">
                  <p>Aftagelig filterholder filterstørrelse 102, drypstop og autosluk efter 2 timer. . .</p>
                </div>
                <a class="mt10" href="#"><img src="img/pa.png" alt=""></a>
                <div class="bort clearfix">
                  <div class="fl w-price">
                    <p>Tilbud :2.399,95 DKK</p>
                    <p>Vejl. pris : 2899,95 DKK</p>
                    <p>Spar :500,00 DKK</p>
                  </div>
                  <div class="fr w-right">
                    <img class="img-responsive mt10" src="img/see-price.png" alt="">
                  </div>
                </div>

                <div class="rownumber clearfix">
                    <div class="number">
                      <label for="">ANTAL:</label>
                      <input type="text" placeholder="1">                     
                    </div>
                    <h2 class="price">479 DKK</h2>
                </div>
                
                <a class="btnAddcart" href="cart.php"><img src="img/btnCart.png" alt=""></a>                     
              </div><!--product_content-->
            </div>

          </div><!--eachBox wrapProd_detail-->

          <div class="eachBox mt10">
            <ul class="list-bn"> 
              <li><a href="#"><img src="img/image01.jpg"></a></li>
              <li>
                <a href="#"><img src="img/newsletter.png"></a>
                <a class="mt6" href="#"><img src="img/icon_face2.png"></a>
              </li>
            </ul>
          </div>

          <?php require_once('list-services.php'); ?>  

           <?php require_once('footer.php'); ?>
      </div><!--End #content--> 
      <?php require_once('menu-left.php'); ?>  
    </div><!--End #Page--> 
  </body>
</html>