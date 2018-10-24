$("#update_reclamo").click(function(){

	var status =  $("#selector1").val();
	var id = $("#disabledinput").val();
	var id_user = $("#user_idRR").val();
	var titulo = "Cambio de status";
	var message;

	if(status == 0){
		message = $("#txtarea2")[0].value;
	} else if(status == 2){
		message = "Su reclamo fue Aprobado";
	} else if(status == 3){
		message = "Su reclamo fue Aprobado, per tuvimos que editarlo para que cumpla con las politicas del servicio";
	}
	
	var datos = new FormData();
	datos.append('status',status);
	datos.append('id_reclamo',id);
	datos.append('mensaje',message);
	datos.append('id_user',id_user);
	datos.append('titulo',titulo);

 	 $.ajax({
 	 	
 	 	    url: "Views/Modules/Secondary/update_reclamo.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success:function(respuesta){
				 
				if (respuesta == "Success" ) {
	
					alert("Actualizado");

				} else{
					alert("No hay datos");
	
				}

				location.href = "http://dev.reclameperu.com.pe/BackendAdmin/index.php?action=check_reclamos"

	
			}
	
 	 })
})