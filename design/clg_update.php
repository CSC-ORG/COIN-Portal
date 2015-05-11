<?php


require_once 'connect.php';
session_start();









	$c_id=$_POST["id"];
	$contact=$_POST["contact"];
	$spname=$_POST["spname"];
	$spcontact=$_POST["spcontact"];
	$status=$_POST["status"];
				$q="UPDATE `college_list` SET `contact`='".$contact."',`spoc_name`='".$spname."',`spoc_contact`='".$spcontact."',`status`='".$status."' WHERE c_id='".$c_id."'";
				$data=mysql_query($q,$cn);
				
				$n=mysql_affected_rows();
if($n>=1)
{
	
	
	$url="admin_clg_ch.php";
	header('Location: ' . $url);
}

?>