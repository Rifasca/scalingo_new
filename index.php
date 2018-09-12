<?php

	require 'vendor/autoload.php';

	$urldd = parse_url(getenv('SCALINGO_INFLUX_URL'));
	
	echo "<pre>"; print_r($result); echo "</pre>";
	
	$myhost = $urldd['host'];
	
	$client = new \InfluxDB\Client($myhost, $urldd['port'], $urldd['user'], $urldd['pass']);
	
	echo "<pre>"; print_r($client); echo "</pre>";
	
	$database = $client->selectDB(substr($urldd['path'], 1));
	
	echo "<pre>"; print_r($database); echo "</pre>";
	
?>