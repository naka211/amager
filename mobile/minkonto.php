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
          <div class="content clearfix">
            <a href="#" class="btn_oversigt btn3">Oversigt</a>
            <a href="#" class="btn_minkonto btn3">Min konto</a>
            <div class="clear"></div>
            <hr>
            <div class="content_main">
              <div class="frm_minkonto clearfix">
                <h2>PERSONLIG INFORMATION</h2>
                <p><strong>Kundetype: <span>Privat</span></strong></p>
                <p><strong>E-mail: <span>kim@graphit.dk</span></strong></p>
                <label for="">Fornavn <span class="red">*</span></label>
                <input class="txtInput">
                <label for="">Efternavn <span class="red">*</span></label>
                <input class="txtInput">
                <label for="">Adresse  <span class="red">*</span></label>
                <input class="txtInput">
                <label for="">Postnr. <span class="red">*</span></label>
                <input class="txtInput">
                <label for="">By <span class="red">*</span></label>
                <input class="txtInput">
                <label for="">Telefon <span class="red">*</span></label>
                <input class="txtInput">
                <h2>LOG-IND INFORMATION</h2>
                <label for="">Kodeord</label>
                <input class="txtInput" type="password">
                <label for="">Bekræft kodeord</label>
                <input class="txtInput" type="password">
                <p><span class="red">* </span>Skal udfyldes</p>
                <a class="btnSave btn-green mt20" href="#">GEM</a>
              </div>
              <div class="frm_oversigt">
                <div class="oversigt-gray clearfix">
                  <p class="fl">Ordrenummer: 1200294508</p>
                  <p class="fr">Ordredato: 12-01-2013</p>
                </div>
                <div class="w-oversigt-gray">
                  <p>
                    <span class="fl"><strong>Kundetype:</strong> </span>
                    <span class="fr"><strong>Privat</strong></span>
                  </p>
                  <p>
                    <span class="fl">E-mail: </span>
                    <span class="fr">kim@graphit.dk</span>
                  </p>
                  <div class="oversigt-info clearfix">
                    <div class="oversigt-left">
                      <h4>Kundeoplysninger:</h4>
                      <p>
                        <span>Fornavn:</span>
                        <span>Kim Hau  </span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>Tran</span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>Rosenfeldtvej 30</span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>2665</span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>Rødovre </span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>123456780</span>
                      </p>
                      <h4>Betalingsmetode: </h4>
                      <p>Kortbetaling</p>
                    </div>

                    <div class="oversigt-right">
                      <h4>Leveringsadresse:</h4>
                      <p>
                        <span>Fornavn:</span>
                        <span>Kim Hau  </span>
                      </p>
                      <p>
                        <span>Efternavn:</span>
                        <span>Tran</span>
                      </p>
                      <p>
                        <span>Adresse:</span>
                        <span>Rosenfeldtvej 30</span>
                      </p>
                      <p>
                        <span>Postnr.:</span>
                        <span>2665</span>
                      </p>
                      <p>
                        <span>By:</span>
                        <span>Rødovre </span>
                      </p>
                      <p>
                        <span>Telefon:</span>
                        <span>123456780</span>
                      </p>
                      <h4>Levering: </h4>
                      <p>Forsendelse</p>
                    </div>
                  </div>

                  <div class="wrapTb clearfix mt10">
                    <div class="w-title topbarcart clearfix border0">
                      <div class="fl">Produkt</div>
                      <div class="fr ml60">Pris i alt</div>
                      <div class="fr">Antal</div>
                    </div>

                    <div class="wrapRowPro border0">
                        <div class="eachRowPro">
                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                            <div class="row rowAbove">
                                <div class="proName">
                                  <h2><a href="#">Melitta - Aroma Grande Hvid</a></h2>
                                  <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                </div>
                                <div class="wrapedit"><span>1</span></div> 
                            </div> 
                            <div class="row rowBelow"> 
                                <div class="proPriceTT"><span class="spanvl">479 DKK </span></div> 
                            </div>
                        </div><!--eachRowPro-->
                        <div class="eachRowPro">
                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                            <div class="row rowAbove">
                                <div class="proName">
                                  <h2><a href="#">Melitta - Aroma Grande Hvid</a></h2>
                                  <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                </div>
                                <div class="wrapedit"><span>1</span></div> 
                            </div> 
                            <div class="row rowBelow">  
                                <div class="proPriceTT"><span class="spanvl">479 DKK </span></div> 
                            </div>
                        </div><!--eachRowPro-->
                        <div class="eachRowPro">
                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                            <div class="row rowAbove">
                                <div class="proName">
                                  <h2><a href="#">Melitta - Aroma Grande Hvid</a></h2>
                                  <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                </div>
                                <div class="wrapedit"><span>1</span></div> 
                            </div> 
                            <div class="row rowBelow"> 
                                <div class="proPriceTT"><span class="spanvl">479 DKK </span></div> 
                            </div>  
                        </div><!--eachRowPro-->
                    </div> <!--wrapRowPro-->
                    <div class="wrapTotalPrice clearfix border0">
                      <div class="boxleft1">
                        <p class="red">Afhentning:Tårnby Torv Isenkram</p>
                      </div>
                      <div class="box boxright">
                          <div class="clearfix row-bor">
                              <span class="lbNor">Subtotal inkl. moms:</span> <span class="lbPrice">799,80 DKK</span>
                          </div>
                          <div class="clearfix row-bor">
                              <span class="lbNor">Heraf moms:</span> <span class="lbPrice">199,95 DKK</span>
                          </div>
                          <div class="clearfix row-bor">
                              <span class="lbNor">Subtotal inkl. moms:</span> <span class="lbPrice">199,95 DKK</span>
                          </div>
                          <div class="clearfix row-bor">
                              <span class="lbTotal">TOTAL INKL. MOMS:</span> <span class="totalPrice">799,80 DKK</span>
                          </div>
                      </div>                                
                    </div> <!--wrapTotalPrice-->
                </div><!--  wrapTb-->
              </div>

              <div class="oversigt-gray clearfix">
                  <p class="fl">Ordrenummer: 1200294508</p>
                  <p class="fr">Ordredato: 12-01-2013</p>
                </div>
                <div class="w-oversigt-gray">
                  <p>
                    <span class="fl"><strong>Kundetype:</strong> </span>
                    <span class="fr"><strong>Privat</strong></span>
                  </p>
                  <p>
                    <span class="fl">E-mail: </span>
                    <span class="fr">kim@graphit.dk</span>
                  </p>
                  <div class="oversigt-info clearfix">
                    <div class="oversigt-left">
                      <h4>Kundeoplysninger:</h4>
                      <p>
                        <span>Fornavn:</span>
                        <span>Kim Hau  </span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>Tran</span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>Rosenfeldtvej 30</span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>2665</span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>Rødovre </span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>123456780</span>
                      </p>
                      <h4>Betalingsmetode: </h4>
                      <p>Kortbetaling</p>
                    </div>

                    <div class="oversigt-right">
                      <h4>Leveringsadresse:</h4>
                      <p>
                        <span>Fornavn:</span>
                        <span>Kim Hau  </span>
                      </p>
                      <p>
                        <span>Efternavn:</span>
                        <span>Tran</span>
                      </p>
                      <p>
                        <span>Adresse:</span>
                        <span>Rosenfeldtvej 30</span>
                      </p>
                      <p>
                        <span>Postnr.:</span>
                        <span>2665</span>
                      </p>
                      <p>
                        <span>By:</span>
                        <span>Rødovre </span>
                      </p>
                      <p>
                        <span>Telefon:</span>
                        <span>123456780</span>
                      </p>
                      <h4>Levering: </h4>
                      <p>Forsendelse</p>
                    </div>
                  </div>

                  <div class="wrapTb clearfix mt10">
                    <div class="w-title topbarcart clearfix border0">
                      <div class="fl">Produkt</div>
                      <div class="fr ml60">Pris i alt</div>
                      <div class="fr">Antal</div>
                    </div>

                    <div class="wrapRowPro border0">
                        <div class="eachRowPro">
                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                            <div class="row rowAbove">
                                <div class="proName">
                                  <h2><a href="#">Melitta - Aroma Grande Hvid</a></h2>
                                  <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                </div>
                                <div class="wrapedit"><span>1</span></div> 
                            </div> 
                            <div class="row rowBelow"> 
                                <div class="proPriceTT"><span class="spanvl">479 DKK </span></div> 
                            </div>
                        </div><!--eachRowPro-->
                        <div class="eachRowPro">
                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                            <div class="row rowAbove">
                                <div class="proName">
                                  <h2><a href="#">Melitta - Aroma Grande Hvid</a></h2>
                                  <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                </div>
                                <div class="wrapedit"><span>1</span></div> 
                            </div> 
                            <div class="row rowBelow">  
                                <div class="proPriceTT"><span class="spanvl">479 DKK </span></div> 
                            </div>
                        </div><!--eachRowPro-->
                        <div class="eachRowPro">
                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                            <div class="row rowAbove">
                                <div class="proName">
                                  <h2><a href="#">Melitta - Aroma Grande Hvid</a></h2>
                                  <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                </div>
                                <div class="wrapedit"><span>1</span></div> 
                            </div> 
                            <div class="row rowBelow"> 
                                <div class="proPriceTT"><span class="spanvl">479 DKK </span></div> 
                            </div>  
                        </div><!--eachRowPro-->
                    </div> <!--wrapRowPro-->
                    <div class="wrapTotalPrice clearfix border0">
                      <div class="boxleft1">
                        <p class="red">Afhentning:Tårnby Torv Isenkram</p>
                      </div>
                      <div class="box boxright">
                          <div class="clearfix row-bor">
                              <span class="lbNor">Subtotal inkl. moms:</span> <span class="lbPrice">799,80 DKK</span>
                          </div>
                          <div class="clearfix row-bor">
                              <span class="lbNor">Heraf moms:</span> <span class="lbPrice">199,95 DKK</span>
                          </div>
                          <div class="clearfix row-bor">
                              <span class="lbNor">Subtotal inkl. moms:</span> <span class="lbPrice">199,95 DKK</span>
                          </div>
                          <div class="clearfix row-bor">
                              <span class="lbTotal">TOTAL INKL. MOMS:</span> <span class="totalPrice">799,80 DKK</span>
                          </div>
                      </div>                                
                    </div> <!--wrapTotalPrice-->
                </div><!--  wrapTb-->
              </div>

              <div class="oversigt-gray clearfix">
                  <p class="fl">Ordrenummer: 1200294508</p>
                  <p class="fr">Ordredato: 12-01-2013</p>
                </div>
                <div class="w-oversigt-gray">
                  <p>
                    <span class="fl"><strong>Kundetype:</strong> </span>
                    <span class="fr"><strong>Privat</strong></span>
                  </p>
                  <p>
                    <span class="fl">E-mail: </span>
                    <span class="fr">kim@graphit.dk</span>
                  </p>
                  <div class="oversigt-info clearfix">
                    <div class="oversigt-left">
                      <h4>Kundeoplysninger:</h4>
                      <p>
                        <span>Fornavn:</span>
                        <span>Kim Hau  </span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>Tran</span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>Rosenfeldtvej 30</span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>2665</span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>Rødovre </span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>123456780</span>
                      </p>
                      <h4>Betalingsmetode: </h4>
                      <p>Kortbetaling</p>
                    </div>

                    <div class="oversigt-right">
                      <h4>Leveringsadresse:</h4>
                      <p>
                        <span>Fornavn:</span>
                        <span>Kim Hau  </span>
                      </p>
                      <p>
                        <span>Efternavn:</span>
                        <span>Tran</span>
                      </p>
                      <p>
                        <span>Adresse:</span>
                        <span>Rosenfeldtvej 30</span>
                      </p>
                      <p>
                        <span>Postnr.:</span>
                        <span>2665</span>
                      </p>
                      <p>
                        <span>By:</span>
                        <span>Rødovre </span>
                      </p>
                      <p>
                        <span>Telefon:</span>
                        <span>123456780</span>
                      </p>
                      <h4>Levering: </h4>
                      <p>Forsendelse</p>
                    </div>
                  </div>

                  <div class="wrapTb clearfix mt10">
                    <div class="w-title topbarcart clearfix border0">
                      <div class="fl">Produkt</div>
                      <div class="fr ml60">Pris i alt</div>
                      <div class="fr">Antal</div>
                    </div>

                    <div class="wrapRowPro border0">
                        <div class="eachRowPro">
                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                            <div class="row rowAbove">
                                <div class="proName">
                                  <h2><a href="#">Melitta - Aroma Grande Hvid</a></h2>
                                  <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                </div>
                                <div class="wrapedit"><span>1</span></div> 
                            </div> 
                            <div class="row rowBelow"> 
                                <div class="proPriceTT"><span class="spanvl">479 DKK </span></div> 
                            </div>
                        </div><!--eachRowPro-->
                        <div class="eachRowPro">
                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                            <div class="row rowAbove">
                                <div class="proName">
                                  <h2><a href="#">Melitta - Aroma Grande Hvid</a></h2>
                                  <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                </div>
                                <div class="wrapedit"><span>1</span></div> 
                            </div> 
                            <div class="row rowBelow">  
                                <div class="proPriceTT"><span class="spanvl">479 DKK </span></div> 
                            </div>
                        </div><!--eachRowPro-->
                        <div class="eachRowPro">
                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                            <div class="row rowAbove">
                                <div class="proName">
                                  <h2><a href="#">Melitta - Aroma Grande Hvid</a></h2>
                                  <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                </div>
                                <div class="wrapedit"><span>1</span></div> 
                            </div> 
                            <div class="row rowBelow"> 
                                <div class="proPriceTT"><span class="spanvl">479 DKK </span></div> 
                            </div>  
                        </div><!--eachRowPro-->
                    </div> <!--wrapRowPro-->
                    <div class="wrapTotalPrice clearfix border0">
                      <div class="boxleft1">
                        <p class="red">Afhentning:Tårnby Torv Isenkram</p>
                      </div>
                      <div class="box boxright">
                          <div class="clearfix row-bor">
                              <span class="lbNor">Subtotal inkl. moms:</span> <span class="lbPrice">799,80 DKK</span>
                          </div>
                          <div class="clearfix row-bor">
                              <span class="lbNor">Heraf moms:</span> <span class="lbPrice">199,95 DKK</span>
                          </div>
                          <div class="clearfix row-bor">
                              <span class="lbNor">Subtotal inkl. moms:</span> <span class="lbPrice">199,95 DKK</span>
                          </div>
                          <div class="clearfix row-bor">
                              <span class="lbTotal">TOTAL INKL. MOMS:</span> <span class="totalPrice">799,80 DKK</span>
                          </div>
                      </div>                                
                    </div> <!--wrapTotalPrice-->
                </div><!--  wrapTb-->
              </div>

              <div class="oversigt-gray clearfix">
                  <p class="fl">Ordrenummer: 1200294508</p>
                  <p class="fr">Ordredato: 12-01-2013</p>
                </div>
                <div class="w-oversigt-gray">
                  <p>
                    <span class="fl"><strong>Kundetype:</strong> </span>
                    <span class="fr"><strong>Privat</strong></span>
                  </p>
                  <p>
                    <span class="fl">E-mail: </span>
                    <span class="fr">kim@graphit.dk</span>
                  </p>
                  <div class="oversigt-info clearfix">
                    <div class="oversigt-left">
                      <h4>Kundeoplysninger:</h4>
                      <p>
                        <span>Fornavn:</span>
                        <span>Kim Hau  </span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>Tran</span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>Rosenfeldtvej 30</span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>2665</span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>Rødovre </span>
                      </p>
                      <p>
                        <span>Fornavn:</span>
                        <span>123456780</span>
                      </p>
                      <h4>Betalingsmetode: </h4>
                      <p>Kortbetaling</p>
                    </div>

                    <div class="oversigt-right">
                      <h4>Leveringsadresse:</h4>
                      <p>
                        <span>Fornavn:</span>
                        <span>Kim Hau  </span>
                      </p>
                      <p>
                        <span>Efternavn:</span>
                        <span>Tran</span>
                      </p>
                      <p>
                        <span>Adresse:</span>
                        <span>Rosenfeldtvej 30</span>
                      </p>
                      <p>
                        <span>Postnr.:</span>
                        <span>2665</span>
                      </p>
                      <p>
                        <span>By:</span>
                        <span>Rødovre </span>
                      </p>
                      <p>
                        <span>Telefon:</span>
                        <span>123456780</span>
                      </p>
                      <h4>Levering: </h4>
                      <p>Forsendelse</p>
                    </div>
                  </div>

                  <div class="wrapTb clearfix mt10">
                    <div class="w-title topbarcart clearfix border0">
                      <div class="fl">Produkt</div>
                      <div class="fr ml60">Pris i alt</div>
                      <div class="fr">Antal</div>
                    </div>

                    <div class="wrapRowPro border0">
                        <div class="eachRowPro">
                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                            <div class="row rowAbove">
                                <div class="proName">
                                  <h2><a href="#">Melitta - Aroma Grande Hvid</a></h2>
                                  <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                </div>
                                <div class="wrapedit"><span>1</span></div> 
                            </div> 
                            <div class="row rowBelow"> 
                                <div class="proPriceTT"><span class="spanvl">479 DKK </span></div> 
                            </div>
                        </div><!--eachRowPro-->
                        <div class="eachRowPro">
                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                            <div class="row rowAbove">
                                <div class="proName">
                                  <h2><a href="#">Melitta - Aroma Grande Hvid</a></h2>
                                  <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                </div>
                                <div class="wrapedit"><span>1</span></div> 
                            </div> 
                            <div class="row rowBelow">  
                                <div class="proPriceTT"><span class="spanvl">479 DKK </span></div> 
                            </div>
                        </div><!--eachRowPro-->
                        <div class="eachRowPro">
                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                            <div class="row rowAbove">
                                <div class="proName">
                                  <h2><a href="#">Melitta - Aroma Grande Hvid</a></h2>
                                  <p> <span class="spanlb">Vare-nr </span><span class="spanvl">30283</span></p>
                                </div>
                                <div class="wrapedit"><span>1</span></div> 
                            </div> 
                            <div class="row rowBelow"> 
                                <div class="proPriceTT"><span class="spanvl">479 DKK </span></div> 
                            </div>  
                        </div><!--eachRowPro-->
                    </div> <!--wrapRowPro-->
                    <div class="wrapTotalPrice clearfix border0">
                      <div class="boxleft1">
                        <p class="red">Afhentning:Tårnby Torv Isenkram</p>
                      </div>
                      <div class="box boxright">
                          <div class="clearfix row-bor">
                              <span class="lbNor">Subtotal inkl. moms:</span> <span class="lbPrice">799,80 DKK</span>
                          </div>
                          <div class="clearfix row-bor">
                              <span class="lbNor">Heraf moms:</span> <span class="lbPrice">199,95 DKK</span>
                          </div>
                          <div class="clearfix row-bor">
                              <span class="lbNor">Subtotal inkl. moms:</span> <span class="lbPrice">199,95 DKK</span>
                          </div>
                          <div class="clearfix row-bor">
                              <span class="lbTotal">TOTAL INKL. MOMS:</span> <span class="totalPrice">799,80 DKK</span>
                          </div>
                      </div>                                
                    </div> <!--wrapTotalPrice-->
                </div><!--  wrapTb-->
              </div>

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