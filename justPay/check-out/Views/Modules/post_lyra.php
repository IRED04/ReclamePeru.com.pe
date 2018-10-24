<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  
<form name = "envia" action="https://secure.payzen.lat/vads-payment/" method="POST">
  <div style="display: none">
    <input type="text" id="vads_action_mode" name="vads_action_mode" value="<?php echo $vads_action_mode; ?>">
    <input type="text" id="vads_amount" name="vads_amount" value="<?php echo $vads_amount; ?>">
    <input type="text" id="vads_ctx_mode" name="vads_ctx_mode" value="<?php echo $vads_ctx_mode; ?>">
    <input type="text" id="vads_currency" name="vads_currency" value="<?php echo $vads_currency; ?>">
    <input type="text" id="vads_page_action" name="vads_page_action" value="<?php echo $vads_page_action; ?>">
    <input type="text" id="vads_payment_config" name="vads_payment_config" value="<?php echo $vads_payment_config; ?>">
    <input type="text" id="vads_site_id" name="vads_site_id" value="<?php echo $vads_site_id; ?>">
    <input type="text" id="vads_trans_date" name="vads_trans_date" value="<?php echo $vads_trans_date; ?>">
    <input type="text" id="vads_trans_id" name="vads_trans_id" value="<?php echo $vads_trans_id; ?>">
    <input type="text" id="vads_version" name="vads_version" value="<?php echo $vads_version; ?>">
    <input type="text" id="signature" name="signature" value="<?php echo $siganture; ?>" >
  </div>
 </form>
  <!-- Ejecuta SUBMIT to fontEnviar POST PayZen-->
  <script language="JavaScript">
   document.envia.submit()
  </script>"


</body>
</html>
