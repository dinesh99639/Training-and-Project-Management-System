<?php

session_start();

require("database.php");

if (isset($_POST['register']))
{
	$username = mysqli_escape_string($db,$_POST['username']);
    $name = mysqli_escape_string($db,$_POST['name']);
    $email = mysqli_escape_string($db,$_POST['email']);
    $phone = mysqli_escape_string($db,$_POST['phone']);
    $password = mysqli_escape_string($db,$_POST['password']);
    $confirm_password = mysqli_escape_string($db,$_POST['confirm_password']);

    if ($password==$confirm_password)
    {
    	$query = "SELECT * FROM users WHERE username='$username'";
    	$res = mysqli_query($db, $query);
    	$row = mysqli_fetch_array($res);
    	$sameusers = mysqli_num_rows($res);

    	if ($sameusers==0)
    	{
    		$password = md5(sha1(crypt($password,10)));
    		$query = "INSERT INTO users(username, name, email, phone_no, password, usertype) VALUES('$username', '$name', '$email', '$phone', '$password', 'student')";
    		$res = mysqli_query($db, $query);

    		header ("Location:login.php?register=success");
    	}
    	else header ("Location:register.php?error=userexists");
    }
    else header ("Location:register.php?error=password_mismatch");
}
if (isset($_POST['login']))
{
	$username = mysqli_escape_string($db,$_POST['username']);
    $password = mysqli_escape_string($db,$_POST['password']);
	$password = md5(sha1(crypt($password,10)));

	$query = "SELECT * FROM users where username='$username' and password='$password'";
	$res = mysqli_query($db, $query);
	$row = mysqli_fetch_array($res);
    $sameusers = mysqli_num_rows($res);

    if ($sameusers==1)
    {
    	$login_success = 1;

    	$_SESSION['userid']=$row['userid'];
    	$_SESSION['username']=$row['username'];
    	$_SESSION['name']=$row['name'];
    	$_SESSION['email']=$row['email'];
    	$_SESSION['phone_no']=$row['phone_no'];
    	$_SESSION['usertype']=$row['usertype'];

    	if ($_SESSION['usertype']=="student") header("Location:student.php");
    	if ($_SESSION['usertype']=="manager") header("Location:manager.php");
        if ($_SESSION['usertype']=="admin") header("Location:admin.php");

    }
    else header("Location:login.php?error=invalid_details");
}

?>