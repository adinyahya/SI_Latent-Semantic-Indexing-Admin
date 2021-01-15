<?php

require_once('functions.php');
require_once('lib/nusoap.php');
$server = new soap_server;
$server->configureWSDL("Demo Web Service", "urn:server");
$server->xml_encoding = "utf-8";
$server->soap_defencoding = "utf-8";
$server->register("SendToken", 
							array("name"=>'xsd:string'),
							array("return"=>"xsd:integer")
				 );

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA :'';

$server->service($HTTP_RAW_POST_DATA);


?>