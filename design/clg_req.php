<?php
require_once 'connect.php';
if(isset($_POST['approve']))
{

//$role=$_POST["role"];
$email=$_POST["spoc_email"];
$status="aproved";

function generate_password($length = 8, $complex=3) {
$min = "abcdefghijklmnopqrstuvwxyz";
$num = "0123456789";
$maj = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$symb = "!@#$%^&*()_-=+;:,.?";
$chars = $min;
if ($complex >= 2) { $chars .= $num; }
if ($complex >= 3) { $chars .= $maj; }
if ($complex >= 4) { $chars .= $symb; }
$password = substr( str_shuffle( $chars ), 0, $length );
return $password;
}
$query="UPDATE `college_requests` SET `status`='".$status."' where email='".$email."'";
mysql_query($query,$cn);


				
		$n=mysql_affected_rows();
if($n>=1)
{
	
	echo "<script>alert(\"Password send to email!!\")</script>;";
	$url="admin_home.php";
	header('Location: ' . $url);
}

$password_new=generate_password(8);

$to=$email;  
require 'forgot_pass_mail.php';

}
/*elseif(isset($_POST['reject'])){
	


//$role=$_POST["role"];
$email=$_POST["spoc_email"];
$to=$email;  
				require 'college_req_mail_reject.php';
}

*/

?>
