
function validarLogin(){

 var expresionEmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
 var expressionPasword = /^[a-zA-Z0-9 ñÑ]*$/;
 	
 var user = $("#user_access").val();
 var pwd = $("#user_pwd_access").val();


 	if(!expresionEmail.test(user)){
    	alert("Error en el usuario: ejemplo@micuenta.com");
		$('#user_access').val("");
		$('#user_access').focus();
		return false;
	}

	if(!expressionPasword.test(pwd)){
     	alert("No se admite carateres especiales ni espcios");
		$('#user_pwd_access').val("");
		$('#user_pwd_access').focus();
		return false;
	}

    //Validar Campos Vacios
	if(user == ""){
		alert("El campo usuario no puede estar vacio");
		$('#user_access').focus();
		return false;
	}
	if(pwd == ""){
		alert("Este campo es requerido");f
		$('#user_pwd_access').focus();
		return false;
	}
  return true;
}


function validarRegistro(){
 	var expresionEmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
 	var expressionNumText = /^[a-zA-Z0-9 ñÑ]*$/;
 	var expressionText = /^[/a-zA-Z0-9 ñÑ/ \s]*$/;
 	var expressionCelular = /[0-9]/;
 	
 	var userReg = $("#userReg").val();
 	var nombre = $("#nombreUserReg").val();
 	var ape = $("#apeUserReg").val();;
 	var Celular = $("#celUserReg").val();;
 	var pwdReg = $("#pwdReg").val();
 	var genero = $("#genUserReg").val();
 	var departamento = $("#depUserReg").val();
 	var provincia = $("#provUserReg").val();
 	var distrito =  $("#distritosUserReg").val();
 	var tipDoc =  $("#tipDocIdenReg").val();
 	var numDoc =  $("#numDocIdenReg").val();
	var fecNaci =  new Date($("#fecNaciReg").val());
	
    var año_naci = fecNaci.getFullYear();
    var fec_act = new Date();
    var año_act = fec_act.getFullYear();

    var edad_user = año_act - año_naci;

    	//Validar Año de nacimiento
   		if(edad_user < 18) {
   			alert('Revise su año de nacimiento, Si usted es menor de edad no puede crear una cuenta con nosotros');
   			$("#fecNaciReg").focus();
   			return false;
   		}



 		//Validar valores en los campos
 		if(!expresionEmail.test(userReg)){
			alert("Error en el usuario: ejemplo@micuenta.com");
			$('#userReg').focus();
			return false;
		}
	
		if(!expressionNumText.test(pwdReg)){
			alert("Solo se Admite [A-Z y 0-9]");
			$('#pwdReg').focus();
			$('#pwdReg').val("");
			return false;
		}

		
		if(!expressionText.test(nombre)){
			alert("Solo se Admite [A-Z]");
			return false
		}
		if(!expressionText.test(ape)){
			alert("Solo se Admite [A-Z]");
			return false
		}
		if(!expressionCelular.test(Celular)){
			alert("Solo se Admite [0-9]");
			return false
		}

		if(!expressionCelular.test(numDoc)){
			alert("Solo se Admite [0-9]");
			$('#numDocIdenReg').val("");
			$('#numDocIdenReg').focus();
			return false
		}

		

		// Validar Campos Vacios
		if(userReg == ""){
		alert("El campo usuario no puede estar vacio");
		$('#userReg').focus();
		return false;
		}

		if(fecNaci == 'Invalid Date'){
	 	alert("El campo usuario no puede estar vacio");
		$('#fecNaciReg').focus();
		return false;

		}
		
		if(nombre == ""){
		alert("El campo nombre no puede estar vacio");
		$('#nombreUserReg').focus();
		return false;
		}
		if(ape == ""){
		alert("El campo apellidos no puede estar vacio");
		$('#apeUserReg').focus();
		return false;
		}
		if(Celular == ""){
		alert("El campo celular no puede estar vacio");
		$('#celUserReg').focus();
		return false;
		}
		if(numDoc == ""){
		alert("El campo celular no puede estar vacio");
		$('#numDocIdenReg').focus();
		return false;
		}

	
		if(pwdReg == ""){
			alert("Este campo es requerido");
			$('#pwdReg').val("");
			$('#pwdReg').focus();
			return false;
		}

		//Validando condicionales
		if(departamento==0){
			alert("Por favor seleccione un Departamento");
			$('#depUserReg').focus();
			return false;
		}

		if(genero==0){
			alert("Tiene que seleccionar un genero");
			$('#genUserReg').focus();
			return false;
		}

		if(provincia==0){
			alert("Tiene que seleccionar una provincia");
			$('#provUserReg').focus();
			return false;
		}
	

		if(distrito==0){
			alert("Tiene que seleccionar un distrito");
			$('#distritosUserReg').focus();
			return false;
		}

		if(tipDoc == 0){
			alert("Tiene que seleccionar un tipo de documento");
			$('#tipDocIdenReg').focus();
			return false;
		}
	
	
	
		
		return true;


}

function validarEmailRegistro(){

	var expresionEmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
	var userReg = $("#userReg").val();
	if(!expresionEmail.test(userReg)){
			alert("Tu email no comple con la estructura correcta: ejemplo@micuenta.com");
			$('#userReg').val("");
			$('#userReg').focus();
			return false;
		}
	
	if(userReg == "" ||userReg == null ){
		alert("El campo usuario no puede estar vacio");
		$('#userReg').focus();
		return false;
		}

	return true;
}



