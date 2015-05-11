<?php
require_once 'connect.php';
 
if(isset($_POST['proceed']))
{
$proj=$_SESSION["count_project"];
$clgname=$_POST["clgname"];
$nproj=$_POST["nproj"];

$proj=implode(', ', $_POST['sel_prj']);

$q="INSERT INTO `college_list`(`projects`) VALUES ('".$proj."') where name='".$clgname."'";

mysql_query($q,$cn);

$n=mysql_affected_rows();
if($n>=1)
{
	
	
	$url="admin_home.php";
	header('Location: ' . $url);
}
else
{
	
	
	$url="admin_assign_project.php";
	header('Location: ' . $url);
}

}


?>