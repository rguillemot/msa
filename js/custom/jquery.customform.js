/*
 Custom code for form 
*/
	
	// HTML encode the message
	function htmlEncode(value){
		if (value) {
			return encodeURIComponent(value); 
			//jQuery('<div />').text(value).html();
			//return jQuery(value).serialize();
		} else {
			return '';
		}
	};

	// HTML fecode the message
	function htmlDecode(value) {
		if (value) {
			return jQuery('<div />').html(value).text();
		} else {
			return '';
		}
	};
	
	// Reset form
	function resetForm() {
		var validator = jQuery("#contactForm").validate();
		validator.resetForm();
		document.getElementById("contactForm").reset();
		jQuery('#email-status').text('');
	};
	
;(function($) {
	
	// form id
	var fform_id = 'contactForm';
	var fname_id = 'fname';
	var ffrom_id = 'ffrom';
	var fmsg_id = 'fmsg';
	
	var fform = '#contactForm';
	var fname = '#fname';
	var ffrom = '#ffrom';
	var fmsg = '#fmsg';
	var fmsgErr = '#fmsgErr';
	var fnameErr = '#fnameErr';
	var ffromErr = '#ffromErr';
	var fmsgErr = '#fmsgErr';
	
	// A custom jQuery method for placeholder text:
	$.fn.defaultText = function(value){
		var element = this.eq(0);
		element.data('defaultText', value);
		element.focus(function() {
			if(element.val() == value) {
				element.val('');
			}
		}).blur(function(){
			if(element.val() == '' || element.val() == value){
				element.val(value);
			}
		});
		return element.blur();
	}
	
	// get message according response code
	function getResponseMsg(respCode) {
		var mesg = '';
		
		if (respCode == '0') {
			mesg = customFormStrings['sendSuccess'];
		} else {
			mesg = customFormStrings['sendError'];
		}  
		
		return mesg;			
	};
	
	$.validator.setDefaults({
			debug: true,
			success: 'valid'
	});	
		
			
	// add notEqual method
	$.validator.addMethod('notEqualTo', function(value, element, param) {
				  return this.optional(element) || value != param;
				}, customFormStrings['notEqualToError'] ); 

	var isFormValid = false;
		
	//In order to use the default jQuery shortcut of $, you can use the following wrapper around your code:
	// http://codex.wordpress.org/Function_Reference/wp_enqueue_script
	//;(function($) {
	$(document).ready(function($) {
		
		// $() will work as an alias for jQuery() inside of this function
		
		// Defining a placeholder text:
		$("#fname").defaultText(customFormStrings['yourName']);
		$("#ffrom").defaultText(customFormStrings['yourEmail']);
		$("#fmsg").defaultText(customFormStrings['yourMsg']);
		
		
		// on form validation ...
		var isFormValid = $('#contactForm').validate({
				
				// /!\ onfocusout: true ne fonctionne pas avec IE!
				// donc ajouter la fonction suivante
				onfocusout: function(element) { $(element).valid(); },
				focusCleanup: false,
				focusInvalid: false,
				onkeyup: false,
				
				rules: {
					fname: {
						required: true,
						minlength: 3,
						maxlength: 50,
						notEqualTo: customFormStrings['yourName']
					},
					ffrom: {
						required: true,
						maxlength: 255,
						email: true,
						notEqualTo: customFormStrings['yourEmail']
					},
					fmsg: {
						  required: true,
						  minlength: 5,
						  maxlength: 2048,
						  notEqualTo: customFormStrings['yourMsg']
					}
				},
				
				messages: {
					ffrom: {
						required: customFormStrings['emailNeeded'],
						email: customFormStrings['emailNotEqualTo'],
						notEqualTo: customFormStrings['emailNotEqualTo']
					} ,
					fmsg:  customFormStrings['enterMessage'] 
				},
				
				//errorElement: "label",
				//wraper: "div",
				errorClass: 'error',
				errorPlacement: function(error, element) {
					
					// offset = element.offset();
					
					if (element.attr('id') == 'fname') {
						//error.appendTo($('#fnameErr'));
						$('#fnameErr').replaceWith(error);
					}
					if (element.attr('id') == 'ffrom') {
						$('#ffromErr').replaceWith(error);
					}
					if (element.attr('id') == 'fmsg') {
						$('#fmsgErr').replaceWith(error);
					}
					element.addClass('error');
					//error.addClass('message');  // add a class to the wrapper
					error.css('position', 'absolute');
					error.css('visibility', 'visible');
					
					//alert(element.attr('id'));
					//alert(element.id);
				},
				
				invalidHandler: function(form, validator) {
					// TODO
				},
				
				unhighlight: function(element, errorClass) {
					if (this.numberOfInvalids() == 0) {
						//$("#containererreurtotal").hide();
					}
					$(element).removeClass(errorClass);
				}, 
		
				success: 'valid' //function(label){	}
			}
		);
								
		//$('label.error').addClass('error');
		//$('label.error').css('visibility', 'visible');
				
		$('#btnSend').click(function() {
			
			// init 
			$('#email-status').html('&nbsp;');
			//$('#email-status').hide();
			
			// check if form is valid
			var isFormValid = $('#contactForm').validate().checkForm();
						
			if (isFormValid) {
				// send email
				var vname = $('#fname').val();  
				var vfrom = $('#ffrom').val();  
				var vsubject = $('#fsubject').val();  
				var vmsg = $('#fmsg').val();  
								
				if (vname == '' || vfrom == '' || vmsg == '') {  
					return false;  
				}  
									
				//var dataString = ' { name:'+ name + ', from:' + from + ', msg:' + msg + ' }';  // JSON format
				var dataString = 'fname='+ htmlEncode(vname) + '&ffrom=' + vfrom + '&fmsg=' + htmlEncode(vmsg) + '&fsubject=' + htmlEncode(vsubject);  // url format
				//alert('OK3 :' + dataString);
				
				// init
				$('#email-success').fadeOut(); 
				
				//alert (dataString); return false;  
				var request = $.ajax({  
					type: "POST",  
					url: "/ajax/process.mail.php",
					dataType: "text",		
					data: dataString,  
					success: function(response) {
						//alert('OK6: '+ response);	
						var m = getResponseMsg(response);
						
						if (response == 0) {
							$('#email-status').css('color', 'green');
							$('#email-status').html(m);  // display message
							$('#email-status').fadeIn();
							//$('#email-status').show();
							// RAZ des champs
							$('#fname').val('');	
							$('#ffrom').val('');	
							$('#fmsg').val('');	
						} else {
							$('#email-status').css('color', 'red');
							$('#email-status').html(m);  // display message
							$('#email-status').fadeIn();
						}
						
					},
					error: function(xhr, textStatus, errorThrown) {
						var m = getResponseMsg('-1'); // un message d'erreur générique 
						$('#email-status').html(errorThrown);  // display message errorThrown not m
						$('#email-status').css('color', 'red');
						alert('request failed=' + errorThrown + ' textStatus=' + textStatus);
					}
				});  
														
				return false; 
				
			} else {
				// Passe ici avant la validation $("#contactForm").validate(...)
			}
			
		});  
	
		
	});
		
})(jQuery);
//})(jQuery);

