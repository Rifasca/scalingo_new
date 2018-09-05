<?php

require __DIR__ . "/vendor/autoload.php";

$url = parse_url(getenv('SCALINGO_INFLUX_URL'));

$client = new \crodas\InfluxPHP\Client($url['host'], $url['port'], $url['user'], $url['pass']);
echo "<pre>"; print_r($client); echo "</pre><br>";
$db = $client->substr($url['path'], 1);
$db->insert("foo", ['foobar' => 'bar']);



$result = $client->substr($url['path'], 1);
echo "<pre>"; print_r($result); echo "</pre><br>";

foreach ($result->query("SELECT * FROM foo;") as $row) {
    var_dump($row, $row->time);
	echo "<pre>"; print_r($row); echo "</pre><br>";
}
?>