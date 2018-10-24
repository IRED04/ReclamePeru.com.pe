function on() {
    document.getElementById("overlay").style.display = "block";
}

function off() {
    document.getElementById("overlay").style.display = "none";
					
}


var getBrowserInfo = function() {
    var ua= navigator.userAgent, tem, 
    
    M= ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];

    if(/trident/i.test(M[1])){
        tem=  /\brv[ :]+(\d+)/g.exec(ua) || [];
        return 'IE '+(tem[1] || '');
    }
    
    if(M[1]=== 'Chrome'){
        tem= ua.match(/\b(OPR|Edge)\/(\d+)/);
        if(tem!= null) return tem.slice(1).join(' ').replace('OPR', 'Opera');
    }

    M= M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
	if((tem= ua.match(/version\/(\d+)/i))!= null) M.splice(1, 1, tem[1]);
    
    return M[0];

};



$("#btnPagarCH").click(function(){

	var select = $('input:radio[name=optionsRadios]:checked').val();
	
	var public_key = "KJSAKKKASD812312lKKAS" ;
	var time  = "2018-01-25T19:49:57";
	var chanel;
	var amount = "200" ;
	var curency = "CLP";
	var trans_ID ;
	var time_expired ;
	var url_ok = "http://pincelando.pe.hu/justPay/Views/Merchant2/index.html";
	var url_erro = "http://pincelando.pe.hu/justPay/Views/Merchant2/index.html";
	var siganture;


	if (select == "tDeb"){

		chanel = "3";
	    trans_ID = "M_1-0005";
		time_expired = "0";
		siganture = "dcf17752d651b8d7a376b3b6f5cae2c0433448769c58ae971d6b254c3db535b2";
		
        
	}else if(select == "TrasBank"){
		
		chanel = "1";
		trans_ID = "TEST101";
		time_expired = "120";
		siganture = "1456d4a4c8b3e884487c2d44d1c918a81d56b50d992924ddff01751dd93d09b6"; 

		//var cadena = "KJSAKKKASD812312lKKAS2018-01-25T19:49:57200CLPTEST101120http://pincelando.pe.hu/justPay/Views/Merchant2/index.htmlhttp://pincelando.pe.hu/justPay/Views/Merchant2/index.html1UYSDJH56122131ADSD11"
	
	
	} else if(select == "Efec"){
		chanel = "2";
		trans_ID = "M_1-EFE";
		time_expired = "60";
		siganture = "5749740309aefd10aab27d87e5d3b7c8f4eec79b4e86eed1dd48c0788b2a1d11";

		//var cadena = "KJSAKKKASD812312lKKAS2018-01-25T19:49:57200CLPM_1-EFE60http://pincelando.pe.hu/justPay/Views/Merchant2/index.htmlhttp://pincelando.pe.hu/justPay/Views/Merchant2/index.html2UYSDJH56122131ADSD11"

	
	}else if(select == "UniPay"){
		chanel = "4";
		trans_ID = "M_1-UniPay";
		time_expired = "60";
		siganture = "5459cb971fd9f78870497f6aaa29217554525f533540c000347b51c0b093d570";

		//var cadena = "KJSAKKKASD812312lKKAS2018-01-25T19:49:57200CLPM_1-EFE60http://pincelando.pe.hu/justPay/Views/Merchant2/index.htmlhttp://pincelando.pe.hu/justPay/Views/Merchant2/index.html2UYSDJH56122131ADSD11"

	
	
	
	}

	else {
		chanel = "3";
		trans_ID = "M_1-0005";
		time_expired = "0";
		siganture = "dcf17752d651b8d7a376b3b6f5cae2c0433448769c58ae971d6b254c3db535b2";

		//var cadena = "KJSAKKKASD812312lKKAS2018-01-25T19:49:57200CLPM_1-00050http://pincelando.pe.hu/justPay/Views/Merchant2/index.htmlhttp://pincelando.pe.hu/justPay/Views/Merchant2/index.html3UYSDJH56122131ADSD11"
	}


	var datos  = new FormData();
	datos.append("public_key", public_key);
	datos.append("time", time);
	datos.append("channel", chanel);
	datos.append("amount", amount);
	datos.append("curency",curency);
	datos.append("trans_ID",trans_ID);
	datos.append("time_expired",time_expired);
	datos.append("url_ok", url_ok);
	datos.append("url_erro", url_erro);
	datos.append("siganture", siganture);

	$.ajax({

		url:"http://dev.reclameperu.com.pe/justPay/check-out/SecurePayment",
		//url: "http://justpay.apps-lapaymentgroup.com/justpay/check-out/SecurePayment",
		//url: "http://justpay.apps-lapaymentgroup.com/justpay_dev/check-out/SecurePayment",

		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			console.log(respuesta);
			//console.log(nav);
			var nav = getBrowserInfo();
 			
 			if (nav == "Safari") {
 			    location.href = (respuesta);
 			} else{
 				var a = document.createElement("a");
				a.target = "_blank";
				a.href = respuesta;
				a.click(); 
 			}
		
		}
 })




})