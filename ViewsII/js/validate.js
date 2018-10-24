/*=============================================
	 VALIDAR USUARIO-REGISTRO URUARIO - CLICK
=============================================*/
$("#btnValidaUserReg").click(function(){

	var validaEstructura = validarEmailRegistro();

	if(validaEstructura == true) {

		var email = $("#userReg").val();
    	var datos = new FormData();
		datos.append("validarUsuario", email);
		
		$.ajax({
			url: "Views/Modules/Secondary/ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success:function(respuesta){
				if(respuesta==0){
	
					$("label[for='emailRegistro'] span").html(' <div class="alert alert-success"> <button type="button" onclick = "RegistriUsuarioCancel()" class="close" data-dismiss="alert">&times;</button> <p> <strong> Felidicadess!!!</strong> </p> <p>  Ya tienes una cuenta registrada  </p></div>');
					
					document.getElementById('regUser').style.display='none';
					$('#btnCancelRegistro').focus();
				
				}else{
					$("label[for='emailRegistro'] span").html(' <div class="alert alert-info">  <p> <strong>Ups!!! </strong> Aun no tienes cuenta, por favor llena el formulario para registrarte.</p> </div>');
					document.getElementById('regUser').style.display='block';
					$('#nombreUserReg').focus();
					document.getElementById('btnvalidacion').style.display = 'none';

				}
			}
	
		});

	} 

});
/*================== FINAL  ===========================*/


/*=============================================
	 VALIDAR USUARIO-REGISTRO URUARIO - CHANGE
=============================================*/
$("#userReg").change(function(){

	var validaEstructura = validarEmailRegistro();

	if(validaEstructura == true) {

		var email = $("#userReg").val();
    	var datos = new FormData();
		datos.append("validarUsuario", email);
		
		$.ajax({
			url: "Views/Modules/Secondary/ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success:function(respuesta){
				if(respuesta==0){
	
					$("label[for='emailRegistro'] span").html(' <div class="alert alert-success"> <button type="button" onclick = "RegistriUsuarioCancel()" class="close" data-dismiss="alert">&times;</button> <p> <strong> Felidicadess!!!</strong> </p> <p>  Ya tienes una cuenta registrada  </p></div>');
					document.getElementById('regUser').style.display='none';
					$('#btnCancelRegistro').focus();
				
				}else{
					$("label[for='emailRegistro'] span").html(' <div class="alert alert-info">  <p> <strong>Ups!!! </strong> Aun no tienes cuenta, por favor llena el formulario para registrarte.</p> </div>');
					document.getElementById('regUser').style.display='block';
					$('#nombreUserReg').focus();
					document.getElementById('btnvalidacion').style.display = 'none';

				}
			}
	
		});

	} 

});
/*================== FINAL  ===========================*/




/*=============================================
	  VALIDAR USUARIO - (RECUPERAR PASSWORD) 
=============================================*/
$("#user_recu").change(function(){

	var email = $("#user_recu").val();
    var datos = new FormData();
	datos.append("validarUsuario", email);
	$.ajax({

		url: "Views/Modules/Secondary/ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			if(respuesta==0){
				$("label[for='user'] span").html('<p>Usuario Existente</p>');
				$('#SendEmailUserRecu').removeAttr('disabled');
				$('#SendEmailUserRecu').focus();
			}else{

				alert("Su email no esta registrado, por favor ingrese una cuenta existente");
				$('#user_recu').val("");
				$('#user_recu').focus();

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

	var email = $("#user_recu").val();
    var datos = new FormData();
	datos.append("validarUsuario", email);
	$.ajax({

		url: "Views/Modules/Secondary/recu_pwd.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			if(respuesta==0){
				//$("label[for='user'] span").html('<p> Email enviado </p>');
				alert("Se ha enviado un email a tu cuenta");
				location.href = "../../../index.php?action=index";

			}else{

				alert("Su email no esta registrado, por favor ingrese una cuenta existente");
				$('#user_recu').val("");
				$('#user_recu').focus();

				//$("label[for='emailRegistro'] span").html('<p>Por favor rellene el formulario para registrarse. </p>');
			}
		}

	});


});
/*================== FINAL  ===========================*/



/*=============================================
	         VALIDAR RUC EN SUNAT
=============================================*/

$("#btnRegistraEmpresa").click(function(){

	var ruc = $("#valRucEmp").val();
	if(ruc == "") {
		alert("Este campo no puede estar vacio");
		$("#valRucEmp").focus();
  	} else{

  	var datos = new FormData();
	datos.append("ruc", ruc);
	
	$.ajax({

		url: "Views/Modules/Secondary/ConsultasRuc.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		
		success:function(respuesta){

			

			if(respuesta == 1){
				//alert("El numero de ruc ingresado no existe en SUNAT");
				$('#SpanRespValidaEmp').html(
							'<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
							'<p> <strong> <h6>PARECE QUE HAY UN ERROR</h6></strong> </p>'+
							'<p>El numero de ruc ingresado no existe en SUNAT.</p></div>'
                         );


			} else if (respuesta == 2){
				//alert("Error al registrar la empresa, intente nuevamente");
				$('#SpanRespValidaEmp').html(
							'<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
							'<p> <strong> <h6>Oh, valla tubimos un problema </h6></strong> </p>'+
							'<p>No pudimos registar a la empresa, intente nuevamente por favor.</p></div>'
                         );

			}else{

				//alert("La empresa ya esta registrada buscar con el nombre de: " + respuesta);
				$('#SpanRespValidaEmp').html(
							'<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
							'<p> <strong> <h6>LA EMPRESA YA ESTA REGISTRADA</h6></strong> </p>'+
							'<p> Por favor buscar con el nombre de: ' + respuesta + ' </p></div>'
                         );

			}


			$("#valRucEmp").val("");
			$("#valRucEmp").focus();

		}

	});

  	}

});


/*================== FINAL VALIDAR RUC EN SUNAT==================*/

/*=============================================
	 LIMPIA DATOS VALIDA/REGISTRA EMPRESAS
=============================================*/

$('#btnSalirRegEmp').click(function(){

	$('#SpanRespValidaEmp').html('');
	$("#valRucEmp").val("");
})


$('#btnCabRegistraEmpresa').click(function(){

	$('#SpanRespValidaEmp').html('');
	$("#valRucEmp").val("");
})




/*==LIMPIA DATOS VALIDA/REGISTRA EMPRESAS==*/

function act_menu(){
    
	document.getElementById('men_Other').style.display = 'none';
	document.getElementById('men_Princ').style.display = 'Block';

}

function des_menu(){

	document.getElementById('men_Princ').style.display = 'none';
	document.getElementById('men_Other').style.display = 'Block';

}

function id_Departament(){
	var id;
	id = document.getElementById('sel1').value ;

	console.log(id);
}



/*=============================================
	 VALIDAR ComboBox Provincia y Distrito
=============================================*/
    //Provincia
	$(document).ready(function(){
		$("#depUserReg").change(function () {
			
			//$('#cbx_dist').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
			
			$("#depUserReg option:selected").each(function () {
				IdDepa = $(this).val();
				$.post("../../Model/crud.php", { IdDepa: IdDepa }, function(data){
					$("#provUserReg").html(data);
				});            
			});
		})
	});
			
	//Distrito
	$(document).ready(function(){
		$("#provUserReg").change(function () {
			$("#provUserReg option:selected").each(function () {
				id_prov = $(this).val();
				$.post("../../Model/crud.php", { id_prov: id_prov }, function(data){
					$("#distritosUserReg").html(data);
				});            
			});
		})
	});
			

/*================== FINAL  ===========================*/


/*=============================================
	    RESTRU USUARIO POR AJAX
=============================================*/

$("#sendNewUser").click(function(){
	var create = validarRegistro();
	if (create == true) {
	
		var user = $("#userReg").val();
		var name = $("#nombreUserReg").val();
		var ape = $("#apeUserReg").val();
		var tipDoc = $("#tipDocIdenReg").val();
		var NumDoc = $("#numDocIdenReg").val();
		var fecNaci = $("#fecNaciReg").val();
		var genero = $("#genUserReg").val();
		var celular = $("#celUserReg").val();
		var departamento = $("#depUserReg").val();
		var distrito = $("#provUserReg").val();
		var provincia = $("#distritosUserReg").val();
		var pwd = $("#pwdReg").val();
		
		var datos = new FormData();
	
		//console.log(user);
		//console.log(pwd);
	
		datos.append("userReg", user);
		datos.append("userName" , name );
		datos.append("userApe" , ape);
		datos.append("tipDoc" , tipDoc);
		datos.append("numDoc" , NumDoc);
		datos.append("fec_naci" , fecNaci);
		datos.append("userGenero" , genero);
		datos.append("userCelular" , celular);
		datos.append("userDepartamento" , departamento);
		datos.append("userDistrito" , distrito);
		datos.append("userProvincia" , provincia);
		datos.append("pwdReg", pwd);
	
		
		$.ajax({
	
			url: "Views/Modules/Secondary/userReg.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success:function(respuesta){
	
				if(respuesta = 'Success'){
				    console.log(respuesta);
					alert("MUCHAS GRACIAS POR REGISTRARTE \ Ahora puedes publicar tus reclamos");
					RegistriUsuarioCancel();
				}else{
					
					console.log('Fallo Registro');
					alert("Oh, no tenemos un problema");
				}
				
			}
	
		});

	 }
	
	
	
	});



/*================== FIN GRABAR USUARIO POR AJAX ===========================*/




/*=============================================
	         LOGIN AXAX
=============================================*/

 $("#send_login").click(function(){

	var user = $("#user_access").val();
	var pwd = $("#user_pwd_access").val();
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
			 
			
			 if(respuesta == 0){
			 	var msg1 = "Usuario o contraseña incorrectos intente nuevamente";
				alert(msg1);
				$('#user_pwd_access').val("");
				$('#user_pwd_access').focus();
			}else if(respuesta == 1){
				alert("La contraseña es errada");
				$('#user_pwd_access').val("");
				$('#user_pwd_access').focus();
            }else{
            	var Saludo = "Bienbenido(a): ";
				var Usuario = respuesta;
				$("#user_access").val("");
				$("#user_pwd_access").val("");
            	$('#login').modal('toggle');
            	location.href = "../../../index.php?action=index";
            }
		}

	})


})
 
 /*================== FIN  LOGIN AXAX ===========================*/





/*=============================================
	     Inactivar campos iniciales 
============================================= */
 //DATOS PASO 2
 $('#nameEmprPa2').prop('disabled', true); 
 $('#reclamo').focus();
 //DATOS PASO 3
 $('#nomEmpPF').prop('disabled', true);
 $('#telefUserPF').prop('disabled', true);
 $('#emailUserPF').prop('disabled', true);   
 $('#TituloReclamoPF').focus();

 $("#chTermCond").attr('checked', true);

/*======== FIN BUSCA EMPRESAS PASO1 AJAX ==================*/



/*=============================================
	     Valida Parametros del Paso2
============================================= */
function validarPaso2(){

  var tipo = $('#cmbTipoPA2').val();
  var reclamo = $('#reclamoPa2').val();

  if(tipo == 0){
  	alert("Este campo no puede estar vacio");
  	$('#cmbTipoPA2').focus();
  	return false;

  }

  if(reclamo==""){
  	alert("Este campo no puede estar vacio");
  	$('#reclamoPa2').focus();
  	return false;

  }


  var terminiCondicione = $("#chTermCond").prop('checked');
  
  if (terminiCondicione == false){
  	alert("Tiene que revisar y aceptar los terminos y condiciones");
  	$("#chTermCond").focus();
  	return false;
  }
  	
 $('#nameEmprPa2').prop('disabled', false); 
 $('#drucPa2').prop('style', false);
return true;

 
}

/*=== Valida Parametros del Paso2 ===*/



/*=============================================
	 VALIDAR lOGIN ANTES DE REALIZAR RECLAMOS
============================================= */
 $('#btnSendReclamar').click(function(){

 	var useLogin = $('#secUserIndex').val();
 	console.log(useLogin);

     if (useLogin == '0' ) {
    	alert("Para poder generar un reclamos, primero tiene que registarse o ingresar a su cuenta"); 	
    	$('#secUserIndex').focus();
     }else {
     	location.href = "../../../index.php?action=ReclamarPaso1";	
     }
 	

});


/*===  Valida lOGIN ANTES DE REALIZAR RECLAMOS ===*/


/*=============================================
	 VALIDAR ENVIO DATOS PASO3
============================================= */

//$('#btnEnviarP3').click(function(){

  //$('#nameEmprPa2').prop('disabled', false); 
  //$('#drucPa2').prop('style', false);


//});

/*===  Valida lOGIN ANTES DE REALIZAR RECLAMOS ===*/


/*=============================================
	      SALVAR RECLAMO AJAX
============================================= */

$('#btnFinalizarReclamo').click(function(){
   
   var titulo = $('#TituloReclamoPF').val();
   var rucEmpr = $('#rucPF').val();
   var reclamo = $('#tReclamoPF').val();
   var tipo = $('#tipoPF').val();

   datos = new FormData();
   
   datos.append('titulo',titulo);
   datos.append('rucEmp',rucEmpr);
   datos.append('reclamo',reclamo);
   datos.append('tipo',tipo);

   $.ajax({

   	url:"Views/Modules/Secondary/saveReclamo.php",
   	method: "POST",
   	data: datos,
   	cache: false,
   	contentType: false,
   	processData: false,
   	success:function(resp){

   			alert(resp);
   			location.href = "../../../index.php?action=index";
   			//console.log(resp);

   	}
   })

  




});

/*===  Valida lOGIN ANTES DE REALIZAR RECLAMOS ===*/


/*=============================================
	      VALIDAR PASO1
============================================= */

function ValidaP1() {
  var chec = $('#chEmpp1').val();
    
    if(chec == false){
	   alert('No hay datos que procesar, intente con la opcion "No se encuentra la empresa" ');
	   
	   return false;
	} 


	
	

}