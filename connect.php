<?php
$username="[...]";
	$password="[...]";
	try {
	$conn = new PDO("mysql:host=[...];dbname=DB2873502", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
catch(PDOException $e)
	{
	echo "Connection failed: " . $e->getMessage();
	}