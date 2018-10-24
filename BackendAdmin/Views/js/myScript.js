$("#selector1").change(function(){

	value = $(this).val();

 	if (value == 0) {

 		$("#Comentario").html('<div class="form-group">' +
                   			    ' <label for="txtarea2" class="col-sm-2 control-label">Comentario</label>' +
                                '<div class="col-sm-8"><textarea name="txtarea2" id="txtarea2" maxlength="200" cols="85" class="form-control2"></textarea>'+
                                '</div> ' +
                  			  '</div>');

 		$('#txtarea1').prop('disabled', true);
 	}else if(value == 3){
 		$('#txtarea1').prop('disabled', false);
 		$("#Comentario").html('');

 	}else{

 		$("#Comentario").html('');
 		$('#txtarea1').prop('disabled', true);
 	}

})


