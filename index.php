<?php
	$url = parse_url(getenv('SCALINGO_INFLUX_URL'));
	
	echo "<pre>"; print_r($url); echo "</pre>";
?>