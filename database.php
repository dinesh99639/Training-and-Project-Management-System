<?php
// localhost
$server=1;

if ($server == 1)
{
	$host = "localhost";
	$uname = "root";
	$password = "";
	$dbname = "tpmsys";
}

// website
if ($server == 2)
{
	$host = "sql204.epizy.com";
	$uname = "epiz_24378167";
	$password = "vQGei9Eb981Qe";
	$dbname = "epiz_24378167_tpmsys";
}

$db = mysqli_connect($host,$uname,$password,$dbname) or die("Database connection error");

?>