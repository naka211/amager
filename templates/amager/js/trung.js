jQuery(document).ready(function()
{
	jQuery.validator.addMethod("requireDefault", function(value, element) 
	{	
		return !(element.value == element.defaultValue);
	});
	
	jQuery("#registrationForm").validate({
		errorElement: "em",
		rules: {
			email: {
				requireDefault: true,
				required: true,
				email: true
			},
			firstname: {
				requireDefault: true,
				required: true,
			
			},
			lastname: {
				requireDefault: true,
				required: true,
			
			},
			password: {
				required: true,
				minlength: 4
			},
			confirmpassword: {
				equalTo: "#password",
				required: true
			},
			address: {
				requireDefault: true,
				required: true,
			
			},
			zipcode: {
				requireDefault: true,
				required: true,
				number: true,
				minlength: 4
			},
			city: {
				requireDefault: true,
				required: true,
			
			},
			phone: {
				requireDefault: true,
				required: true,
				number: true
			}
		},
		messages: {
			email: "",
			firstname: "",
			lastname: "",
			password: {
				required: "",
				minlength: ""
			},
			confirmpassword: {
				required: "",
				equalTo: ""
			},
			address: "",
			zipcode: "",
			city: "",
			phone: ""
		}
	});
	
	
	var private = '';
	var company = '<div><input type="text" value="Firmanavn" name="company" /></div><div><input type="text" value="CVR-nr." name="cvr" /></div>';
	var public = '<div><input type="text" value="EAN-nr. *" name="ean" id="ean" /></div><div><input type="text" value="Myndighed/Institution *" name="authority" id="authority" /></div><div><input type="text" value="Ordre- el. rekvisitionsnr. *" name="order" id="order" /></div><div><input type="text" value="Personreference *" name="person" id="person" />';
	jQuery("#choicemaker").change(function () {
    value = jQuery("#choicemaker").val();
      // You can also use $("#ChoiceMaker").val(); and change the case 0,1,2: to the values of the html select options elements

	if(value == 1){
		jQuery("#companyadd").html('');
		jQuery("#publicadd").html('');
		
		jQuery("#ean").rules("remove");
		jQuery("#authority").rules("remove");
		jQuery("#order").rules("remove");
		jQuery("#person").rules("remove");
	} else if(value == 2){
		jQuery("#companyadd").html(company);
		jQuery("#publicadd").html('');
		
		jQuery("#ean").rules("remove");
		jQuery("#authority").rules("remove");
		jQuery("#order").rules("remove");
		jQuery("#person").rules("remove");
	} else {
		jQuery("#companyadd").html('');
		jQuery("#publicadd").html(public);
		
		var newRule = {
			requireDefault: true,
		 	required: true,
			messages: {
				requireDefault: "",
				required: ""
			}
		};
		jQuery("#ean").rules("add", newRule);
		jQuery("#authority").rules("add", newRule);
		jQuery("#order").rules("add", newRule);
		jQuery("#person").rules("add", newRule);
	}
    });
	jQuery("#email").bind("blur",function(){
		jQuery("#username").val(jQuery("#email").val());
	});
	jQuery("#lastname").bind("blur",function(){
		jQuery("#name").val(jQuery("#firstname").val()+' '+jQuery("#lastname").val());
	});
});// JavaScript Document