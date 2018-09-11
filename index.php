<?php

	require 'vendor/autoload.php';

	//$url = parse_url(getenv('SCALINGO_INFLUX_URL'));
	$urldd = parse_url("https://pubnubinflux_5660:lBLedc8_kDuY7wBfCLc_@a7a24c87-160f-4c88-a38b-620dbad020e7.pubnubinflux-5660.influxdb.dbs.scalingo.com:30290/pubnubinflux_5660");
	echo "<pre>"; print_r($urldd); echo "</pre>"; 
	
	$myhost = $urldd['host'];
	//$client = new \InfluxDB\Client($host, $port);
	$client = new \InfluxDB\Client($myhost, $urldd['port'], $urldd['user'], $urldd['pass']);
	echo "<pre>"; print_r($client); echo "</pre>"; 
	
	//$database = $client->selectDB(substr($url['path'], 1));
	$database = $client->selectDB('pubnubinflux_5660');
	echo "<pre>"; print_r($database); echo "</pre>"; 
	
	/* if ($database->exists()) {
		$database->drop();
	}
	$database->create(new \InfluxDB\Database\RetentionPolicy(substr($url['path'], 1), '12w', 1, true)); */
	
	//$database = $client->selectDB(substr($url['path'], 1));
	
	$result = $client->listDatabases();
	
	echo "<pre>"; print_r($result); echo "</pre>";
	
	//echo "<pre>"; print_r($result); echo "</pre>";

	/* function randFloat($min, $max){
		$range = $max-$min;
		$num = $min + $range * mt_rand(0, 32767)/32767;

		$num = round($num, 4);

		return ((float) $num);
	}

	$client = new \InfluxDB\Client($url['host']);

	$database = $client->selectDB(substr($url['path'], 1));

	$start = microtime(true);

	$countries = ['nl', 'gb', 'us', 'be', 'th', 'jp', 'nl', 'sa'];
	$colors = ['orange', 'black', 'yellow', 'white', 'red', 'purple'];
	$points = [];

	for ($i=0; $i < 1000; $i++) {
		$points[] = new \InfluxDB\Point(
			'flags',
			randFloat(1, 999),
			['country' => $countries[array_rand($countries)]],
			['color' => $colors[array_rand($colors)]],
			(int) shell_exec('date +%s%N')+mt_rand(1,1000)
		);
	}
	
	$database->writePoints($points);

	$end = microtime(true);

	$country = $countries[array_rand($countries)];
	$color = $colors[array_rand($colors)];

	$results = $database->query("SELECT * FROM flags WHERE country = '$country' LIMIT 5")->getPoints();
	$results2 = $database->query("SELECT * FROM flags WHERE color = '$color' LIMIT 5")->getPoints();

	echo "Showing top 5 flags from country $country:" . PHP_EOL;
	print_r($results);
	echo PHP_EOL;

	echo "Showing top 5 flags with color $color:" . PHP_EOL;
	print_r($results2);


	echo PHP_EOL;
	echo sprintf('Executed 1000 inserts in %.2f seconds', $end - $start); */
?>