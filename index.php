<?php
	require 'vendor/autoload.php';
	$url = parse_url(getenv('SCALINGO_INFLUX_URL'));
	
	//echo "<pre>"; print_r($url); echo "</pre><br>";
	//echo "<pre>"; print_r($url['host']); echo "</pre><br>";
	
	$client = new InfluxDB\Client($url['host'], $url['port']);
	echo "<pre>"; print_r($client); echo "</pre><br>";
	
	// list databases
	// show a list of all users
	$results = $client->admin->showUsers();

	// show users returns a ResultSet object
	$users = $results->getPoints();
	echo "<pre>"; print_r($users); echo "</pre><br>";
	// select the database
	//$database = $client->selectDB('influx_test_db');

	// create the database with a retention policy
	//$result = $database->create(new RetentionPolicy('test', '5d', 1, true));
	//echo "database created 1";
	
	// check if a database exists then create it if it doesn't
	//$database = $client->selectDB('test_db');
	//echo "database seleted";
	
	//if (!$database->exists()) {
		//$database->create(new RetentionPolicy('test', '1d', 2, true));
		
		//echo "database created 2";
	//}
?>