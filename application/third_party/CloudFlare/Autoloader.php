<?php

$dir = dirname(__FILE__) .'/';
$files = [
	'Api.php',
	'Zone.php',
	'Zone/Dns.php',
	 
];

$files[] = 'Api.php';
$files[] = 'Zone.php';

foreach($files as $file){
	require_once $dir .$file;
}

unset($dir);
unset($files);

?>
