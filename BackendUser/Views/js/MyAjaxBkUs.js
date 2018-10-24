/*=============================================
	         Update Pasword
=============================================*/

$("#btnUpPwd").click(function(){

	var  pwd = $("#NewPassword").val();
	var comfPwd = $("#ConfirmPassword").val();
	
	if(pwd != comfPwd) {
	$("#ResponseUpdatePswd").html(
			'<div class="alert alert-danger"> ' +
			' <button type="button"  class="close" data-dismiss="alert">&times;</button> <p> '+ 
			'<strong> Las contraseñas no coinsiden!!!</strong> </p> </div>');


	}else{

	var datos = new FormData();
	datos.append("pwdUpdate",pwd);

	$.ajax({

		url: "Views/Modules/Secondary/updatePwdUser.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			 

			if (respuesta == "Success" ) {

				$("#ResponseUpdatePswd").html('<div class="alert alert-success"> ' +
											 ' <button type="button"  class="close" data-dismiss="alert">&times;</button> <p> '+ 
											 '<strong> Proceso Finalizado!!!</strong> </p> <p>  La contraseña fue actualizada  </p></div>');

			} else{
				$("#ResponseUpdatePswd").html("Error, intente nuevamente");

			}

		}

	  })
  	}

})


 /*==== FIN  Update Pasword =============*/



/*=============================================
	         Update Datos USER
=============================================*/

$("#btnGrabarUsuario").click(function(){

 var idUser = $("#IdUserUp").val();
 var nombre = $("#NombreReg").val();
 var apellido = $("#ApellidoReg").val();
 var cel = $("#celReg").val();
 var tipDpc = $("#tipDocReg").val();
 var numDoc = $("#numDocReg").val();
 var genero = $("#genReg").val();
 var fecNaci = $("#fecNaciReg").val();
 var dep = $("#depId").val();
 var prov = $("#propId").val();
 var dis = $("#distId").val();

if (nombre == "") {

$("#ResponseUdateUserDate").html(
	'<div class="alert alert-danger"> ' +
	' <button type="button"  class="close" data-dismiss="alert">&times;</button>  '+ 
	'<strong> Error en el nombre!</strong> </div>');

$("#NombreReg").focus();


}
else if(apellido == ""){
	$("#ResponseUdateUserDate").html(
	'<div class="alert alert-danger"> ' +
	' <button type="button"  class="close" data-dismiss="alert">&times;</button>  '+ 
	'<strong> Error en el Apellido!</strong> </div>');

	$("#ApellidoReg").focus();
} else if (celReg == ""){

	$("#ResponseUdateUserDate").html(
	'<div class="alert alert-danger"> ' +
	' <button type="button"  class="close" data-dismiss="alert">&times;</button>  '+ 
	'<strong> Error en el numero de Celular!</strong> </div>');

	$("#celReg").focus();
}

else{



 var datos = new FormData();
 datos.append('idUser' , idUser);
 datos.append('nomUser' , nombre);
 datos.append('apeUser' , apellido);
 datos.append('celUser' , cel);
 datos.append('tipDoc' , tipDpc);
 datos.append('numDoc' , numDoc);
 datos.append('genUser' , genero);
 datos.append('fecNaci' , fecNaci);
 datos.append('dep' , dep);
 datos.append('prov' , prov);
 datos.append('dist' , dis);

	
	$.ajax({

		url: "Views/Modules/Secondary/updateDetUser.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			 
			console.log(respuesta);

			location.href ="index.php?action=salir";
			

/*			if (respuesta == "Success" ) {

				$("#ResponseUpdatePswd").html('<div class="alert alert-success"> ' +
											 ' <button type="button"  class="close" data-dismiss="alert">&times;</button> <p> '+ 
											 '<strong> Proceso Finalizado!!!</strong> </p> <p>  La contraseña fue actualizada  </p></div>');

			} else{
				$("#ResponseUpdatePswd").html("Error, intente nuevamente");

			}*/

	}

	})

}

});
/*==== FIN  Update Datos USER =============*/



/*=============================================
	         BUSCA EMPRESAS PASO1 AJAX
============================================= */

$('#btnBuscarEmrpesa').click(function() {
	
	$("#tEmpBody tr").remove();
	var nameEmp = $('#buscaEmpresa').val();
	var numCaracteres = nameEmp.length;
	if(nameEmp == "" ) {

		alert("Este campo no puede estar Vacio");
		$('#buscaEmpresa').focus();

	}else {

	 if(numCaracteres <= 3) {
	 	alert("Minimo 3 caracteres");
	 	$('#buscaEmpresa').val("");
	 	$('#buscaEmpresa').focus();
	 }	
	 else{ 	

		var datos = new FormData();
		datos.append('nameEmpresa',nameEmp);
	
		$.ajax({
		
				//url: "Views/Modules/Secondary/buscaEmpresas.php",
				url: "../Controller/controller.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success:function(respuesta){
					 
					console.log(respuesta);
					document.getElementById('empEncontradas').style.display='block';
	
					$("#tEmpBody").append('<tr>'+respuesta+'<\/tr>');
					$('#buscaEmpresa').val("");
	
				}
		
			}) 

		}
	}
 
});



/*======== FIN BUSCA EMPRESAS PASO1 AJAX ==================*/


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

   			//alert(resp);
   			//location.href = "index.php?action=index";
   			
   			document.getElementById('btnRedirectMisreclamos').style.display = 'block';
			document.getElementById('btnFinalizarReclamo').style.display = 'none';

   			$("#msg_saveReclamo").html('<span style = "color: green" >  Tu reclamo se registró con éxito <i class="fa fa-check"> </i> </span>  ');
   			//console.log(resp);

   	}
   })

  




});

/*===  Valida lOGIN ANTES DE REALIZAR RECLAMOS ===*/



/*=============================================
	         ACTUALIAR ESTADO DE MENSAGE
=============================================*/

$("#btnSalirMsg").click(function(){
  var id = $("#sidReclamoUP")[0].textContent;
  var datos = new FormData();

  datos.append("id",id);

  $.ajax({

   	url:"Views/Modules/Secondary/updateStatusMessage.php",
   	method: "POST",
   	data: datos,
   	cache: false,
   	contentType: false,
   	processData: false,
   	success:function(resp){

   		console.log(resp);
   		location.href ="index.php";

   	}
   })




  

})

	




/*================== FINAL   ACTUALIAR ESTADO DE MENSAGE==================*/



