<?php
date_default_timezone_set("Asia/Kolkata");

require_once 'connect.php';
$name=$_POST["name"];
$username=$_POST["username"];
$email=$_POST["email"];
$password=$_POST["password"];
$rights=$_POST["rights"];
$status=$_POST["status"];
$comment=$_POST["comment"];
$id=$_POST["id"];
echo $rights;
 
$query="UPDATE `login_req` SET `rights`='".$rights."',`status`='".$status."',`comment`='".$comment."' where id='".$id."'";

//echo '<script>alert("'.$query.'");</script>';
mysql_query($query,$cn);
if($status=="Accept")
{
	if($rights=="Admin")
	{
	$q1="INSERT INTO `admin_details`(`name`, `username`, `password`, `email`) VALUES ('".$name."','".$username."','".$password."','".$email."')";
	mysql_query($q1,$cn);
	}
	if($rights=="Mentor")
	{
	$q1="INSERT INTO `mentor_details`(`name`, `username`, `password`, `email`) VALUES('".$name."','".$username."','".$password."','".$email."')";
	mysql_query($q1,$cn);
	}
	if($rights=="Reviewer")
	{
	$q1="INSERT INTO `admin_details`(`name`, `username`, `password`, `email`) VALUES ('".$name."','".$username."','".$password."','".$email."')";
	mysql_query($q1,$cn);
	}
	if($rights=="College")
	{
	$q1="INSERT INTO `spoc_details`(`name`, `username`, `password`, `email`) VALUES ('".$name."','".$username."','".$password."','".$email."')";
	mysql_query($q1,$cn);
	}
	if($rights=="Student")
	{
	$q1="INSERT INTO `std_list`(`name`, `username`, `password`, `email`) VALUES ('".$name."','".$username."','".$password."','".$email."')";
	mysql_query($q1,$cn);
	}

}
$n=mysql_affected_rows();

if ($n<1)
{
	echo"Error : Sending data";
	die();
}
$url="admin_home.php";
header('Location: ' . $url);
