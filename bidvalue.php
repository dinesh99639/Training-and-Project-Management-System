<?php
session_start();
include ("database.php");

if ($_SESSION['usertype']=='manager') 
{
	$pid = $_GET['pid'];

	$qry = "SELECT * FROM projectbid WHERE pid='$pid'";
	$res = mysqli_query ($db, $qry);
	$row = $res->fetch_assoc();
	echo $row['bid']."/-";
} 
else header("Location:login.php?error=autherror");
?>
