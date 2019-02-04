// JavaScript Document

	jQuery.fn.reset = function () {
  		$(this).each (function() { this.reset(); });
	}
	
	var emailRegex 		= /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var emailRegex1		= /^[A-Za-z0-9._@-\s]+$/;
	var alfanumRegex	= /^[a-zA-Z0-9áéíóúÁÉÍÓÚüÜñÑ]+$/;
	var alfanumRegexS 	= /[a-zA-Z0-9áéíóúÁÉÍÓÚüÜñÑ\s]+$/;
	//var mensajeReg 	= /^[a-zA-Z0-9\s\@._,-]+$/
	var mensajeRegex	= /^[A-Za-z0-9áéíóúÁÉÍÓÚüÜñÑ\.\,\_\@\&\-\s]+$/;
	var alfaRegex 		= /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$/;
	var phoneRegex1		= /^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$/;
	var phoneRegex		= /^[\+?0-9-?(\d{4})(( x| ext| x.| ext.)\d{1,5}){0,1}]+$/;
;	var passRegex 		= /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,12}$/;
	var urlRegex		= /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])?/;
	var cedulaJRegex  	= /^[3]+[\-\d{3}]+[\-\d(6)]$/; //3-###-######, formato de cedula juridica costa rica
	var cedRegex		= /^[0-9\s-]+$/; // formato para cedulas de identidad, fisica o juridica, solo numeros y guion
	var apdoRegex		= /^[0-9\s-]+$/; // formato para apartado, solo numeros y guion
	var domainRegex		= /^([a-z0-9]+\.)?[a-z0-9][a-z0-9-]*\.[a-z]{2,6}$/i;
	var domainRegex1	= /^[a-zA-Z0-9\-\.]+\.(com|org|net|biz|info|cr|co.cr)$/;
	
		
	// Generate a simple captcha
	// *******************************************************************
	function randomNumber(min, max) {
		return Math.floor(Math.random() * (max - min + 1) + min);
	};
		
	function generateCaptcha(str) {
		var randonNumber1 = randomNumber(1, 10);
		var randonNumber2 = randomNumber(1, 20);
		str = "[randonNumber1, '+', randonNumber2, '='].join(' ')";
	};
	
	
	// First upper letter
	// *******************************************************************
	function ful(str) {
		str = str.toLowerCase().replace(/(^|\s)[a-z]/g, function(letter) {
    		return letter.toUpperCase();
		});
		return str;
	};
	
	// Validate regex
	// *******************************************************************
	function ckRegex(val,regex) { 
		if(!regex.test(val)) {
			return false;
		} 
		return;
	};
	
	
	// Validate field
	// *******************************************************************
	function ckField(fieldName,msgEmpty,regex,msgRegex,fulVal,lcVal) {
	
		field 		= $('input[name=' + fieldName + ']');
		fieldVal 	= field.val();
	
		if(msgEmpty) { // valida si campo esta vacio 
			if(fieldVal == "" ) {
				$('.' + fieldName).html(msgEmpty);
				field.removeClass('is-valid').addClass('is-invalid');
				valFlag = false;
				return false;
			}
		}
		if(regex) { // valida formato
			if(ckRegex(fieldVal,regex) == false && fieldVal !== "") {
				$('.' + fieldName).html(msgRegex);
				field.removeClass('is-valid').addClass('is-invalid');
				valFlag = false;
				return false;
			}
		}
		if(fulVal == 1) { // primera letra en mayuscula
			field.val(ful(fieldVal));
		}
		
		if(lcVal == 1) { // texto en minúscula
			field.val(fieldVal.toLowerCase());	
		}
		
		$('.'+fieldName).html('');
				
		if(fieldVal !== "") { 
			field.removeClass('is-invalid').addClass('is-valid');
		}
		return true;
	};
	
	
	// Validate textarea
	// *******************************************************************
	function ckTextarea(fieldName,msgEmpty,msgRegex){
		
		field 		= $('textarea[name=' + fieldName + ']');
		fieldVal 	= field.val();

		var val 	= $.trim(field.val());
				
		if (val == "") {
			$('.' + fieldName).html(msgEmpty);		
			field.removeClass('is-valid').addClass('is-invalid');
			return false;
		} else {
			if(ckRegex(field.val(),mensajeRegex) == false) {
				$('.' + fieldName).html(msgRegex);	
				field.removeClass('is-valid').addClass('is-invalid');
				return false;
			}					
		}

		field.removeClass('is-invalid').addClass('is-valid');
		return true;
	};
	
	// Valida selected
	// *******************************************************************
	function ckSelected(fieldName,msgEmpty){
		field 		= $('select[name=' + fieldName + ']');
		fieldVal 	= field.val();
		if(!field.val()) {
			$('.' + fieldName).html(msgEmpty);	
			field.removeClass('is-valid').addClass('is-invalid');
			return false;
		}
		field.removeClass('is-invalid').addClass('is-valid');
		return true;
	};