<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '13Tekvity';
	$dbname = 'Tekhub';
	//$dbname = 'shoppercrux';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if(! $conn )
	{
	die('Could not connect: hello ' . mysqli_error());
	}
?>
