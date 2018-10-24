/*=============================================
         VALIDAR CAMPOS LOGIN
=============================================*/
 	$("#login-form-login").change(function(){
 		var expresionEmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
 		var email = $(this).val();
 		var datos = new FormData();
 		if (!expresionEmail.test(email)){
 			$("#respValEmailLogin").html('<div class="alert alert-danger"> ' +
											 '<button type="button"  class="close" data-dismiss="alert"> &times </button>'+
											 ' <p> <strong> El email no cumple con le formato </strong> </p> ');
 			$(this).val("");
 			$(this).focus();
 		}else{
 		datos.append("validarUsuario", email);
		$.ajax({
			url: "Views/Modules/Secondary/ValUser.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success:function(respuesta){
				if(respuesta==1){
					$("#respValEmailLogin").html('');
					$("#login-form-password").focus();

				}else{
					//&times;
					$("#respValEmailLogin").html('<div class="alert alert-danger"> ' +
											 '<button type="button"  class="close" data-dismiss="alert"> &times </button>'+
											 ' <p> <strong> Su email aun no esta registrado </strong> </p> ');

					$("#login-form-login").focus();
				}
			}
		})
 		}
 	})
/*==FINAL  VALIDAR CAMPOS LOGIN =====*/

/*=============================================
	         LOGIN AJAX
=============================================*/
 $("#send_login").click(function(){
	var user = $("#login-form-login").val();
	var pwd = $("#login-form-password").val();
	var datos = new FormData();
	datos.append("userLogin", user);
	datos.append("pwdLogin",pwd);
	$.ajax({
		url: "Views/Modules/Secondary/loginAjax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			
			if(respuesta == 1) {
				location.href = "../../BackendUser/index.php";	
			}else if(respuesta == 2 ){
				
				location.href = "../../BackendUser/index.php?action=updateUser";
			} else if (respuesta == 3) {
				location.href = "../../BackendAdmin/index.php";
			}

			else {

				$("#respValEmailLogin").html('<div class="alert alert-danger"> ' +
											 '<button type="button"  class="close" data-dismiss="alert"> &times </button>'+
											 ' <p> <strong> Ocurrio un error, por favor verifique sus datos e intente nuevamente </strong> </p> ');
				 $("#login-form-login").focus();
				 $("#login-form-password").val("");
			}
		}
	})
})
 /*================== FIN  LOGIN AXAX ===========================*/



 /*=============================================
	 VALIDAR USUARIO-REGISTRO URUARIO - CLICK
=============================================*/
$("#feedback-email").change(function(){
	var expresionEmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
	var email = $("#feedback-email").val();
	var datos = new  FormData();
	if (!expresionEmail.test(email)) {
		alert("el email no cumple con el formato");
		$("#feedback-email").val("");
		$("#feedback-email").focus();

	}else{
	datos.append("validarUsuario", email);
		$.ajax({
			url: "Views/Modules/Secondary/ValUser.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success:function(respuesta){
				if(respuesta==1){
					
					$("#respValEmail").html('<div class="alert alert-danger"> ' +
											 '<button type="button" onClick="redirecLogin()" class="close" data-dismiss="alert">&times;</button>'+
											 ' <p> <strong> Usted ya esta registrado</strong> </p> ');
				
				}else{
					$("#respValEmail").html('');

					$("#register-form-password").removeAttr('disabled');
					$("#register-form-password-confirm").removeAttr('disabled');
					$("#register-form-password").focus();
				}
			}
		});
		}
	});
/*================== FINAL  ===========================*/



 /*=============================================
	 		Registro Usuario
=============================================*/
$("#btnRegistroUser").click(function(){
	var expresionEmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
	var expressionPasword = /^[a-zA-Z0-9 ñÑ]*$/;

	var email = $("#feedback-email").val();
	var pwd = $("#register-form-password").val();
	var conPwd = $("#register-form-password-confirm").val();
	if (!expresionEmail.test(email)) {
		alert("El email no cumple con el formato");
		$("#feedback-email").val("");
		$("#feedback-email").focus();
	}else if(!expressionPasword.test(pwd) || !expressionPasword.test(conPwd) ){
		alert("Error en la su contraseña");
		$("#register-form-password").val("");
		$("#register-form-password-confirm").val("");
		$("#register-form-password").focus();
	}else if(!$("#chTerUso").is(':checked')){
		alert("Tiene que leer y aceptar los terminos de uso");
		$("#chTerUso").attr('checked', false);
	}else{
		var datos = new  FormData();
		datos.append("user", email);
		datos.append("pwdUser", pwd);
	
		$.ajax({
			url: "Views/Modules/Secondary/registerUser.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success:function(respuesta){


			if(respuesta=="Success"){
					alert(pwd);
					location.href = "../../BackendUser/index.php?action=updateUser";	
				}else{
					console.log("la respuesta no es success");

					$("#register-form-password").removeAttr('disabled');
					$("#register-form-password-confirm").removeAttr('disabled');
					$("#register-form-password").focus();   
				}
			}
	
		}); 

	 }

	});

/*================== FINAL  ===========================*/


/*=============================================
	  VALIDAR USUARIO - (RECUPERAR PASSWORD) 
=============================================*/
$("#email").change(function(){

	var email = $(this).val();
    var datos = new FormData();
    datos.append("validarUsuario", email);
	$.ajax({

		url: "Views/Modules/Secondary/ValUser.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			if(respuesta==0){
				$("#ResponseRecuPwd").html('<div class="alert alert-danger"> ' +
											 '<button type="button" onClick="redirecLogin()" class="close" data-dismiss="alert">&times;</button>'+
											 ' <p> <strong> Esta cuenta no esta registrada </strong> </p> ');
				$('#SendEmailUserRecu').focus();
			}else{
				$("#ResponseRecuPwd").html('');
				$('#uemail').val("");
				$('#email').focus();

				//$("label[for='emailRegistro'] span").html('<p>Por favor rellene el formulario para registrarse. </p>');
			}
		}

	});


});
/*================== FINAL  ===========================*/



/*=============================================
	   SEND EMAIL TO USER - (RECU PASWORD)
=============================================*/
$("#SendEmailUserRecu").click(function(){

	var email = $("#email").val();
    var datos = new FormData();
	datos.append("validarUsuario", email);
	$.ajax({

		url: "Views/Modules/Secondary/recuPwdUser.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			console.log(respuesta);

			if(respuesta==0){
				//$("label[for='user'] span").html('<p> Email enviado </p>');
				
				$("#ResponseRecuPwd").html('<div class="alert alert-success"> ' +
											 '<button type="button" onClick="redirecLogin()" class="close" data-dismiss="alert">&times;</button>'+
											 ' <p> <strong>Se ha enviado un email a tu cuenta, de no recibir el email revisar en su cuenta de no deseados o span </strong> </p> ');

				$("#email").val("");
				$("#email").focus();

			}else{

				$("#ResponseRecuPwd").html('<div class="alert alert-danger"> ' +
											 '<button type="button" onClick="redirecLogin()" class="close" data-dismiss="alert">&times;</button>'+
											 ' <p> <strong> Esta cuenta no esta registrada </strong> </p> ');

				$('#email').val("");
				$('#email').focus();

				//$("label[for='emailRegistro'] span").html('<p>Por favor rellene el formulario para registrarse. </p>');
			}
		}

	});


});
/*================== FINAL  ===========================*/