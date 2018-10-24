<?php
require_once("../../../controller/controller.php");
require_once("../../../model/crud.php");

class getOperation{
 public $data = [];

 public function consulOperation(){
 	$datos = $this->data;

 	$response = MVCControllerMerchantJP::consulOperationC($datos);

 	

 	if($response == "vacio") {
 		echo "vacio";

 	} else{
 		foreach ($response as $key ) {

 		if($key[4] == 1){
 			 $status = "Pending";
 			 $color = "info";
 		}else if ($key[4] == 2){
 			$status = "Complited";
 			$color = "success";
 		}else if ($key[4] == 0){
 			$status = "Expirado";
 			$color = "danger";
 		}



 		echo(' 
			 <tr>
				<td>'.  $key[0]  .'</td>
				<td><a href="#">  '.  $key[1]  .' </a></td>
				<td> '.  $key[2]  .' </td>
				<td>'.  $key[3]  .'</td>
				<td><span class="badge badge-'. $color . '"> '.  $status . '</span></td>

				<td class="text-center">
					<div class="list-icons">
				</div>
				</td>
			</tr>



 			');
 	}
 	}

} 


}

$login = new getOperation();
$login->data = ["TypePayment" => $_POST["TypePayment"],
			    "status" => $_POST["status"],
			    "periodo" => $_POST["periodo"],
			    "Operation" => $_POST["Operation"],
			    "reference" => $_POST["reference"],
			   ];

$login->consulOperation();
