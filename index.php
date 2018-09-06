<?php
	require 'vendor/autoload.php';
	$url = parse_url(getenv('SCALINGO_INFLUX_URL'));
	
	echo "<pre>"; print_r($url); echo "</pre><br>";
	echo "<pre>"; print_r($url['host']); echo "</pre><br>";
	
	$client = new InfluxDB\Client($url['host'], $url['port']);
	echo "<pre>"; print_r($client); echo "</pre><br>";
?>