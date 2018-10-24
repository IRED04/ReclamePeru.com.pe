<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

require_once 'defines.php';
require_once 'zh-api.php';

//http://localhost/Zuly/api-kashio/send_order.php

date_default_timezone_set('America/Lima');

$parameter=array(
    "request_datetime"      => strval(date('Y-m-d\TH-i-s')),
    "expiration_datetime"   =>strval(date('Y-m-d')),
    "invoice_id"            => "001-0000003",
    "currency"              => "PEN",
    "amount"                => 10.00,
    'livemode'              =>false,
    "customer"              => array(
                                "phone"=> "965114971",
                                "name"=> "Eddy Yalico",
                                "email"=> "eyalico@lapaymentgroup.com",
                                "document_type"=> "DNI",
                                "document_id"=> "47053118"
                            ),
    "metadata"             => array(
                                "order_id"=> "001-000003",
                                "order_description"=> "Pago Oct2018"
                            )
);

$url=URL.'/'.OPTION_1.'/'.OPTION_2;
$parameter=zh_api::convert_array_json($parameter);
$rs=zh_api::POST($url,API_KEY,'',$parameter);

echo "<pre>";
print_r(zh_api::convert_json_array($rs));
?>
