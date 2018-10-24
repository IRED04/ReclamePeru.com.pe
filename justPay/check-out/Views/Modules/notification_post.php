<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<form action="<?php print_r($getUrlMerchantNotification[0]); ?> " method="POST" name=envia>
		

		<input id="public_key" name="public_key" type="text" value="<?php print_r($getUrlMerchantNotification[1]); ?>"> <br>
		<input id="date_time" name="date_time" type="text" value="<?php print_r($date); ?>">
		<br>
		<input id="channel" name="channel" type="text" value="<?php print_r($getUrlMerchantNotification['channel']); ?>">
		<br>
		<input id="amount" name="amount" type="text" value="<?php print_r($getUrlMerchantNotification['amount']); ?>">
		<br>
		<input id="curency" name="curency" type="text" value="<?php print_r($getUrlMerchantNotification['curency']); ?>">
		<br>
		<input id="trans_ID" name="trans_ID" type="text" value="<?php print_r($getUrlMerchantNotification['trans_ID']); ?>">
		<br>
		<input id="signature" name="signature" type="text" value="<?php print_r($signature); ?>">

		<br>	
		<input type="submit" value="send">


		<script language="JavaScript">
  			 document.envia.submit()
  		</script>



	</form>
	
	<script src="../js/jQuery.js"></script>
	<script src="../js/my_ajax.js"></script>

</body>
</html>

<!--
cd4b91cea1e4c0bba5f8ca219bcfc887
f8ba68c67044b72ad80879a6c0077d972018-10-05 02:21:00110000CLP1cd4b91cea1e4c0bba5f8ca219bcfc887
--!>

