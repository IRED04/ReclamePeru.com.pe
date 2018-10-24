
function RegistriUsuario(){
	document.getElementById('userReg').value=null;
	document.getElementById('validateUser').style.display='block';
	document.getElementById('userLogin').style.display='none';
}



function RegistriUsuarioCancel(){
	document.getElementById('validateUser').style.display='none';
	document.getElementById('regUser').style.display='none';
	document.getElementById('userLogin').style.display='block';
	//Limpiar los campos
	document.getElementById('emailOK').value= "";
	document.getElementById('user_pwd_access').value= "";
	document.getElementById('apeUserReg').value= "";
	document.getElementById('nombreUserReg').value= "";
	document.getElementById('genUserReg').value= "";
    document.getElementById('celUserReg').value= "";
    document.getElementById('depUserReg').value= "";
    document.getElementById('provUserReg').value= "";
    document.getElementById('distritosUserReg').value= "";
    document.getElementById('pwdReg').value= "";

	document.getElementById("user_access").focus();
	$("label[for='emailRegistro'] span").html('');
	

}

function RegistroEmpresa(){
	document.getElementById('validateEmp').style.display='block';
	document.getElementById('loginEmp').style.display='none';
}


function RegistroEmpresaCancel(){
	
	document.getElementById('validateEmp').style.display='none';
	document.getElementById('loginEmp').style.display='block';

}

function RedirecIndex(){
 location.href ="../../../index.php?action=index";

}



//Validar CheckRUC
$("#ch_sin_ruc").click(function(){
 
  if ($(this).is(':checked')) {

  	//Desbloquar Datos requeridos empresa:
  	document.getElementById('DatosEmpresas').style.display='block';
  	$('#ruc').attr('disabled','true');
  	$('#razSoc').removeAttr('disabled');
  	$('#dire').removeAttr('disabled');
  	$('#status').removeAttr('disabled');
  	$('#razSoc').focus();


  }else {

  	document.getElementById('DatosEmpresas').style.display='none';
  	$('#ruc').removeAttr('disabled');
  	$('#ruc').focus();
  	$('#razSoc').rattr('disabled','true');
  	$('#dire').attr('disabled','true');
  	$('#status').rattr('disabled','true');


  }
	 

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

//Cambiar Texto a Mayusculas para TITULO RECLAMO
$('#TituloReclamoPF').keyup(function(){

	var expression = /^[/a-zA-Z0-9 ñÑ/ \s]*$/;

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


// Abrir PAGINA DE LA SUNAT

$('#redirecSunat').click(function(){


	window.open('https://e-consultaruc.sunat.gob.pe/cl-ti-itmrconsruc/jcrS00Alias', '_blank');


})
