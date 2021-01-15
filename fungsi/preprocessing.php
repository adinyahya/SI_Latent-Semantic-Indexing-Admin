
 <?php

require_once('lib/nusoap.php');

$client = new nusoap_client('http://localhost/latent_roar/roar/adminlsi/fungsi/serverE.php?wsdl');	

$service = "xyz";
$response = $client->call('SendToken', array($service));
$xml = $client->call('demo');

if(empty($response))
	echo "Not available";
	else
	echo $response;
	
?>