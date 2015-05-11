<?php
date_default_timezone_set("Asia/Kolkata");

require_once 'connect.php';
$rights="";
$status="";
$comment="";
$id=$_POST["id"];

 //echo $id;
$query="UPDATE `login_req` SET `rights`='".$rights."',`status`='".$status."',`comment`='".$comment."' where `id`=".$id;
echo '<script>alert("'.$query.'");</script>';
mysql_query($query,$cn);

$n=mysql_affected_rows();

if ($n<1)
{
	echo"Error : Sending data";
	die();
}
$url="admin_home.php";
header('Location: ' . $url);
?>