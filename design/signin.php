<?php
	require_once 'connect.php';

$username=$_POST["username"];
$password=$_POST["password"];
$role=$_POST["role"];



if($role == "member_type")
{
$query="select * from admin where username='" . $username . "' OR email='" . $username . "' && password='" . $password . "'";
	mysql_query($query,$cn);
$n=mysql_affected_rows();
if($n>=1)
{
	session_start();
    $_SESSION['admin'] = $username;
	echo "<script>alert(\"Login successfully!!\")</script>;";
	$url="admin_home_main.php";
	header('Location: ' . $url);
}
else
{
echo "<script>alert(\"Login unsuccessfully!!\")</script>;";
	$url="index.php";
	header('Location: ' . $url);
}

	
}

if($role == "admin")
{
$query="select * from admin_details where username='" . $username . "' OR email='" . $username . "' && password='" . $password . "'";
	mysql_query($query,$cn);
$n=mysql_affected_rows();
if($n>=1)
{
	session_start();
    $_SESSION['username_admin'] = $username;
	echo "<script>alert(\"Login successfully!!\")</script>;";
	$url="admin_home.php";
	header('Location: ' . $url);
}
else
{
echo "<script>alert(\"Login unsuccessfully!!\")</script>;";
	$url="index.php";
	header('Location: ' . $url);
}

	
}
 else if($role == "mentor")
 {
$query="select * from mentor_details where username='" . $username . "' OR email='" . $username . "' && password='" . $password . "'";
mysql_query($query,$cn);
$n=mysql_affected_rows();
if($n>=1)
{
	session_start();
    $_SESSION['username_mentor'] = $username;
	echo "<script>alert(\"Login successfully!!\")</script>;";
	$url="mentor_home.php";
	header('Location: ' . $url);
}
else
{
echo "<script>alert(\"Login unsuccessfully!!\")</script>;";
	$url="index.php";
	header('Location: ' . $url);
}

}
 else if($role == "reviewer")
 {
$query="select * from reviewer_details where username='" . $username . "' OR email='" . $username . "' && password='" . $password . "'";
mysql_query($query,$cn);
$n=mysql_affected_rows();
if($n>=1)
{
	session_start();
    $_SESSION['username_review'] = $username;
	echo "<script>alert(\"Login successfully!!\")</script>;";
	$url="reviewer_home.php";
	header('Location: ' . $url);
}
else
{
echo "<script>alert(\"Login unsuccessfully!!\")</script>;";
	$url="index.php";
	header('Location: ' . $url);
}

}
 else if($role == "college")
 {
$query="select * from spoc_details where username='" . $username . "' OR email='" . $username . "' && password='" . $password . "'";
mysql_query($query,$cn);
$n=mysql_affected_rows();
if($n>=1)
{
	session_start();
    $_SESSION['username_spoc'] = $username;
	echo "<script>alert(\"Login successfully!!\")</script>;";
	$url="college_home.php";
	header('Location: ' . $url);
}
else
{
echo "<script>alert(\"Login unsuccessfully!!\")</script>;";
	$url="index.php";
	header('Location: ' . $url);
}

}
 else if($role == "student")
 {
$query="select * from std_list where username='" . $username . "' OR email='" . $username . "' && password='" . $password . "'";
mysql_query($query,$cn);
$n=mysql_affected_rows();
if($n>=1)
{
	session_start();
    $_SESSION['username_std'] = $username;
	echo "<script>alert(\"Login successfully!!\")</script>;";
	$url="student_home.php";
	header('Location: ' . $url);
}
else
{
echo "<script>alert(\"Login unsuccessfully!!\")</script>;";
	$url="index.php";
	header('Location: ' . $url);
}

}
else
{
echo "<script>alert(\"Login unsuccessfully!!\")</script>;";
	$url="index.php";
	header('Location: ' . $url);
}


?>