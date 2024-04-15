<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "SSTK";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

if (!$conn) {
	die("Connection Failed. " . mysqli_connect_error());
	echo "can't connect to database";
}

function executeQuery($sql)
{
	$conn = $GLOBALS['conn'];
	return mysqli_query($conn, $sql);
}
?>