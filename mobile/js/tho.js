// JavaScript Document
$(document).ready(function(){ 
		
	//JS Menu LEft (show/hide categories/menu when click)
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

	//JS for checkout page (col-right-checkout)...
 		$(".inner-lb").hide();  
        $('.lb1,.lb3').click(function(){
          $(".inner-lb").hide();
        });   
        $('.lbUden').click(function(){
          $(".inner-lb").show();
        });

	// JS for Checkout page (col-left-checkout)  ...
		//check out
        $(".w_Address").hide();
        $(".btnLevering").show();
        
        $('.btnLevering').click(function(event){
           event.preventDefault();
          $(".w_Address").slideToggle();
        });

        $("#w_privat").show;
        $("#w_erhverv").hide();
        $("#w_offentlig").hide();

        // How it all works
        $("#choicemaker").change(function () {
          $value = $("#choicemaker")[0].selectedIndex;
          // You can also use $("#ChoiceMaker").val(); and change the case 0,1,2: to the values of the html select options elements
          switch ($value)
          {
            case 0:
                $("#w_privat").show();
                $("#w_erhverv").hide();
                $("#w_offentlig").hide();
            break;
            case 1:
                $("#w_erhverv").show();
                $("#w_privat").hide();
                $("#w_offentlig").hide();
            break;
            case 2:
                $("#w_offentlig").show();
                $("#w_privat").hide();
                $("#w_erhverv").hide();
            break;
          }
        });

        
 		  $(".w-another-add").hide();
      $('.bnt-another-add').click(function(){
        $(".w-another-add").slideToggle(); 
      });

      $('.bnt-create-acc').click(function(){
        $('.w-create-acc').slideToggle(); 
      });

      $('.btnDel').click(function(){
        $('.box_info').slideToggle();
      });

    
    $('.frm_oversigt').hide();

    $('.btn_oversigt').click(function(){
      $('.frm_oversigt').show();
      $('.frm_minkonto').hide();
      $(this).addClass('active2');
      $('.btn_minkonto').removeClass('active2');
    });

    $('.btn_minkonto').click(function(){
      $('.frm_minkonto').show();
      $(this).addClass('active2');
      $('.btn_oversigt').removeClass('active2');
    });


 });

$(document).ready(function() {
      $('.w-oversigt-gray:not(:first)').hide();
      $('.oversigt-gray:first').addClass('active');
      $('.oversigt-gray').click(function() {
          $('.active').removeClass('active');
          $('.w-oversigt-gray').slideUp('normal');
          if($(this).next('.w-oversigt-gray').is(':hidden') == true) {
          $(this).addClass('active');
          $(this).next('.w-oversigt-gray').slideDown('normal');
          }
      });

      $('.oversigt-gray').hover(function(){//over
          $(this).addClass('on');
      },function() {//out
          $(this).removeClass('on');
      });

      jQuery('#foo1').carouFredSel({
      circular    :true,
      infinite    :true,
      prev      :'#foo1_prev',
      next      :'#foo1_next',
      items:{
        visible   :5,
        minimum     :5
        
        },
      scroll:{
        duration  :600,
        items   :1,
        pauseOnHover:true
        },
      auto      :true
    }); 



  });