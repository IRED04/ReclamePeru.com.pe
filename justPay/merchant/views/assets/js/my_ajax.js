$("#login_merchant").click(function(){
	var user = $("#user ").val();
	var pwd = $("#pwd ").val();

	var datos = new FormData();
	datos.append("user", user);
	datos.append("pwd",pwd);
	$.ajax({
		url: "views/modules/secondary/login.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			
			/*
		
			else {

				$("#respValEmailLogin").html('<div class="alert alert-danger"> ' +
											 '<button type="button"  class="close" data-dismiss="alert"> &times </button>'+
											 ' <p> <strong> Ocurrio un error, por favor verifique sus datos e intente nuevamente </strong> </p> ');
				 $("#login-form-login").focus();
				 $("#login-form-password").val("");
			}

			*/

			if(respuesta == "error") {
			  alert("error en credenciales");
			  
			  
			}else {
			  location.href = "http://dev.reclameperu.com.pe/justPay/merchant";	
			}
			
		}
	})


})

$("#serchOperation").click(function(){

	var TypePayment = $("#TypePayment ").val();
	var status = $("#SelStatus ").val();
	var periodo = $("#periodo").val();
	var Operation = $("#operation ").val();
	var reference = $("#reference ").val();

	
	var datos = new FormData();
	datos.append("TypePayment", TypePayment);
	datos.append("status", status);
	datos.append("periodo",periodo);
	datos.append("Operation",Operation);
	datos.append("reference",reference);



	
	$.ajax({
		url: "views/modules/secondary/consulOperation.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			
			console.log(respuesta);

			if (respuesta == "vacio") {

				alert("Debe seleccionar por lo menos un filtro");

			} else {

			$("#tableOperatopn").html(
				'<div class="card"> ' +
					'<div class="card-header header-elements-inline">'+
						'<h5 class="card-title">Operations</h5>'+
						'<div class="header-elements">'+
							'<div class="list-icons">'+
		                		'<a class="list-icons-item" data-action="reload">  </a>'+
		                		'<a class="list-icons-item" data-action="collapse"></a>'+
		                		'<a class="list-icons-item" data-action="remove"></a>'+
		                	'</div>'+

	                	'</div>'+

	               
					'</div>'+

					'<div class="card-body">'+
					
					'</div>'+

					'<table class="table datatable-basic">'+
						'<thead>'+
							'<tr>'+
								'<th>OperationID</th>'+
								'<th>References</th>'+
								'<th>Currency</th>'+
								'<th>Ammount</th>'+
								'<th>Status</th>'+
								
							'</tr>'+
						'</thead>'+
						'<tbody id="MyOperation"> ' + 

								respuesta+
				' 	</tbody> '+
					'</table> '+ 
				'</div>');
			

			DatatableBasic.init();

			}

			//$('#buscaEmpresa').val("");



			
		}
	}) 


})





