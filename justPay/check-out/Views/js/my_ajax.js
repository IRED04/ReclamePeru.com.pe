$("#sendPost").click(function(){

	var public_key = $("#public_key").val();
	var date_time = $("#date_time").val();
	var channel = $("#channel").val();
	var amount = $("#amount").val();
	var curency = $("#curency").val();
	var trans_ID = $("#trans_ID").val();
	var signature = $("#signature").val();

	var datos = new FormData();

	datos.append("public_key",public_key);
	datos.append("date_time",date_time);
	datos.append("channel",channel);
	datos.append("amount",amount);
	datos.append("curency",curency);
	datos.append("trans_ID",curency);
	datos.append("signature",signature);

	$.ajax({

		url: "https://www.fashionspacific.com/carro-safetypay-proceso",
		headers: {
        "accept":"application/csv",
        "content-typ":"application/csv"
        },
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			
			console.log(respuesta);

		}
	})


})







