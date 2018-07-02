<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
//$dbpass = '13Tekvity';
$dbpass = '';
	$dbname = 'tekhub';
	//$dbname = 'shoppercrux';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if(! $conn )
	{
	die('Could not connect: hello ' . mysqli_error());
	}
?>
