
function redirecLogin(){
	location.href = "http://dev.reclameperu.com.pe/index.php?action=login";
}


 /*=============================================
     INACTIVAR LAS CAMPOS REGISTRO
=============================================*/
$("#feedback-email").click(function(){

  
  $("#register-form-password").prop('disabled', true);
  $("#register-form-password-confirm").prop('disabled', true);
          
})


/*==fINAL  INACTIVAR LAS CAMPOS REGISTRO=====*/

 /*=============================================
       Validar Campo Registro pwd
=============================================*/
	$("#register-form-password").change(function(){

		var expressionPasword = /^[a-zA-Z0-9 ñÑ]*$/;
		var pwd = $("#register-form-password").val();
		if(!expressionPasword.test(pwd)){
			alert("La contraseña no cumple con el formato, no se aceptan carateres como *!$%...");
			$("#register-form-password").val("");
			$("#register-form-password").focus();

		}

	})


/*==FINAL  Validar Campo Registro pwd=====*/


 /*=============================================
       Validar Campo Registro ConfirmPwd
=============================================*/
 	$("#register-form-password-confirm").change(function(){


		var expressionPasword = /^[a-zA-Z0-9 ñÑ]*$/;
		var pwd = $("#register-form-password").val();
		var conPwd = $("#register-form-password-confirm").val();
		if(!expressionPasword.test(pwd)){
			alert("La contraseña no cumple con el formato, no se aceptan carateres como *!$%...");
			$("#register-form-password").val("");
			$("#register-form-password").focus();

		} else {
			if(pwd!==conPwd){
				alert("Las contraseñas no coinsiden, por favor revise");
				$("#register-form-password-confirm").val("");
				$("#register-form-password-confirm").focus();
			}else{
			
				$("#chTerUso").attr('checked', true);
			}

			
		}

	})


/*==FINAL  Validar Campo Registro pwd=====*/

 /*=============================================
       Validar email Recuperar PWD
=============================================*/
 
$("#email").change(function(){

	var expresionEmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
	var FormatData = $(this).val();

	if(!expresionEmail.test(FormatData)){

		$("#ResponseRecuPwd").html('<div class="alert alert-danger"> ' +
											 '<button type="button" onClick="redirecLogin()" class="close" data-dismiss="alert">&times;</button>'+
											 ' <p> <strong> Email ingresado no cumple con el formato correcto.</strong> </p> ');
		$("#email").val("");
		$("#email").focus();
	}else{
		$("#ResponseRecuPwd").html("");
	}


})

/*==FINAL  Validar email Recuperar PWD ====*/



 
window.onload = function()
  {
     $("#OpenLig").click();
  }
