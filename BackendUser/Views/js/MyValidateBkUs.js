 /*=============================================
	 VALIDAR ComboBox Provincia y Distrito
=============================================*/
    //Provincia
	$(document).ready(function(){
		$("#depId").change(function () {
			
			//$('#cbx_dist').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
			
			$("#depId option:selected").each(function () {
				IdDepa = $(this).val();
				
				$.post("../../Model/crud.php", { IdDepa: IdDepa }, function(data){
					$("#propId").html(data);
				});            
			});
		})
	});
			
	//Distrito
	$(document).ready(function(){
		$("#propId").change(function () {
			$("#propId option:selected").each(function () {
				id_prov = $(this).val();
				$.post("../../Model/crud.php", { id_prov: id_prov }, function(data){
					$("#distId").html(data);
				});            
			});
		})
	});
			

/*================== FINAL  ===========================*/


$("#btnEditUsuario").click(function(){

	//alert("HOLA");
	//$("#editDetUser").removeAttr('disabled');
	document.getElementById('editDetUser').style.display = 'block';
	document.getElementById('MostrarDetUser').style.display = 'none';


});

$("#btnCancel").click(function(){

	//alert("HOLA");
	//$("#editDetUser").removeAttr('disabled');
	document.getElementById('editDetUser').style.display = 'none';
	document.getElementById('MostrarDetUser').style.display = 'block';

});


//Cambiar Texto a Mayusculas para Buscador de empresas
$('#buscaEmpresa').keyup(function(){

	var expression = /^[/a-zA-Z0-9 ñÑ .-/ \s]*$/;

	//var expression = /^[a-zA-Z0-9? /^\S/]*$/;


	obj = $('#buscaEmpresa').val();

	if(!expression.test(obj)) {
		alert("Texto no Admitido");
		$('#buscaEmpresa').val("");
		$('#buscaEmpresa').focus();
	}else{

		obj = obj.toUpperCase();
		$('#buscaEmpresa').val(obj)
	}
});



/*=============================================
	     Valida Parametros del Paso1
============================================= */

function ValidaP1() {
  var chec = $('#chEmpp1').val();
    
    if(chec == false){
	   alert('No hay datos que procesar, intente con la opcion "No se encuentra la empresa" ');
	   
	   return false;
	} 


	
	

}


/*=== Valida Parametros del Paso1 ===*/

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



// INFORMACION TIPOS DE RECLAMO

$('#cmbTipoPA2').change(function(){

 var tipo = $('#cmbTipoPA2').val();

 //alert(tipo);

if(tipo == 1) {

	$('#infoTipoRec').html(
							'<div class="alert alert-info"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
							'<p> <strong> ¿Que es un RECLAMO? </strong> </p> '+  
							'<p>El consumidor presenta un reclamo cuando no está conforme con los bienes adquiridos o servicios prestados, este, está  relacionado directamente con la empresa.</p></div>'
                          );

}else{
	$('#infoTipoRec').html(
							'<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
							'<p> <strong> ¿Que es una QUEJA? </strong> </p> '+  
							'<p>  Es el malestar o descontento por algo que está relacionado directamente al producto o servicio comprado o se refiere a una mala atención al público.  </p></div>'
						  );
}


})


//Cambiar Texto a Mayusculas para TITULO RECLAMO
$('#TituloReclamoPF').keyup(function(){

	var expression = /^[/a-zA-Z0-9 ñÑ . -/ \s]*$/;

	//var expression = /^[a-zA-Z0-9? /^\S/]*$/;


	obj = $('#TituloReclamoPF').val();

	if(!expression.test(obj)) {
		alert("Texto no Admitido");
		$('#TituloReclamoPF').val("");
		$('#TituloReclamoPF').focus();
	}else{

		obj = obj.toUpperCase();
		$('#TituloReclamoPF').val(obj)
	}
});


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

/*======== Inactivar campos iniciales  ==================*/



$("#btnRedirectMisreclamos").click(function(){

	location.href = "index.php?action=index";

})


/*=============================================
	    Abrir PAGINA DE LA SUNAT
============================================= */

$('#redirecSunat').click(function(){


	window.open('https://e-consultaruc.sunat.gob.pe/cl-ti-itmrconsruc/jcrS00Alias', '_blank');


})

/*======== FIN Abrir PAGINA DE LA SUNAT ==================*/




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


$("#openModal").click(function(){


	var id = $("#sidReclamo")[0].textContent;
	var titulo = $("#StrTitulo")[0].textContent;
	var body = $("#diBoby")[0].textContent;

	$("#BodyMsg").html(body);
	$("#tituloMsg").html(titulo);
	$("#sidReclamoUP").html(id);
})