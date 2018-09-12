<?php

	require 'vendor/autoload.php';
	
	$urldd = parse_url(getenv('SCALINGO_INFLUX_URL'));
	
	echo "<pre>"; print_r($urldd); echo "</pre>";
	
	$myhost = $urldd['host'];
	
	$client = new \InfluxDB\Client($myhost, $urldd['port'], $urldd['user'], $urldd['pass']);
	
	echo "<pre>"; print_r($client); echo "</pre>";
	
	$database = $client->selectDB(substr($urldd['path'], 1));
	
	echo "<pre>"; print_r($database); echo "</pre>";
	
	
	$points = array(
		new \InfluxDB\Point(
			'test_metric', // name of the measurement
			0.64, // the measurement value
			['host' => 'server01', 'region' => 'us-west'], // optional tags
			['cpucount' => 10], // optional additional fields
			1435255849 // Time precision has to be set to seconds!
		),
		new \InfluxDB\Point(
			'test_metric', // name of the measurement
			0.84, // the measurement value
			['host' => 'server01', 'region' => 'us-west'], // optional tags
			['cpucount' => 10], // optional additional fields
			1435255849 // Time precision has to be set to seconds!
		)
	);

	// we are writing unix timestamps, which have a second precision
	$result = $database->writePoints($points, Database::PRECISION_SECONDS);
	
	echo "<pre>"; print_r($result); echo "</pre>";
	
?>