<?php

if(isset($_POST['send_password']))
{

require_once 'connect.php';


$role=$_POST["role"];
$email=$_POST["email"];

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
$password_new=generate_password(8);

if($role == "admin")
{
$query="UPDATE `admin_details` SET `password`='".$password_new."' WHERE email='" . $email . "'";
	mysql_query($query,$cn);
$n=mysql_affected_rows();
if($n>=1)
{
	
	echo "<script>alert(\"Password send to email!!\")</script>;";
	$url="index.php";
	header('Location: ' . $url);
}
else
{
echo "<script>alert(\"Error!!\")</script>;";
	$url="index.php";
	header('Location: ' . $url);
}

	
}
 else if($role == "mentor")
 {
$query="UPDATE `mentors_details` SET `password`='".$password_new."' WHERE email='" . $email . "'";
mysql_query($query,$cn);
$n=mysql_affected_rows();
if($n>=1)
{
	
	echo "<script>alert(\"Password send to email!!\")</script>;";
	$url="index.php";
	header('Location: ' . $url);
}
else
{
echo "<script>alert(\"Error!!\")</script>;";
	$url="index.php";
	header('Location: ' . $url);
}


}
 else if($role == "reviewer")
 {
$query="UPDATE `reviewer_details` SET `password`='".$password_new."' WHERE email='" . $email . "'";
mysql_query($query,$cn);
$n=mysql_affected_rows();
if($n>=1)
{
	
	echo "<script>alert(\"Password send to email!!\")</script>;";
	$url="index.php";
	header('Location: ' . $url);
}
else
{
echo "<script>alert(\"Error!!\")</script>;";
	$url="index.php";
	header('Location: ' . $url);
}


}
 else if($role == "college")
 {
$query="UPDATE `spoc_details` SET `password`='".$password_new."' WHERE email='" . $email . "'";
mysql_query($query,$cn);
$n=mysql_affected_rows();
if($n>=1)
{
	
	echo "<script>alert(\"Password send to email!!\")</script>;";
	$url="index.php";
	header('Location: ' . $url);
}
else
{
echo "<script>alert(\"Error!!\")</script>;";
	$url="index.php";
	header('Location: ' . $url);
}


}
 else if($role == "student")
 {
$query="select * from std_list where username='" . $username . "' && password='" . $password_new . "'";
mysql_query($query,$cn);
$n=mysql_affected_rows();
if($n>=1)
{
	
	echo "<script>alert(\"Password send to email!!\")</script>;";
	$url="index.php";
	header('Location: ' . $url);
}
else
{
echo "<script>alert(\"Error!!\")</script>;";
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



$to=$email;  //to send mail on registering
				require 'forgot_pass_mail.php';
				
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Form send password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style type="text/css">
    	.logo {
    width:200px;
    height:150px;
}
.img-thumbnail{
    border:0px;    
}
.btn, .input-lg, .alert {border-radius:2px !important;}

    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="text-center">
                   <a href="index.php"> <img src="assets/images/logo.png" style="margin-top:100px"height='30%' width='50%'></a>
                    <div>
                        <h3 class="text-center">Forgot password?</h3>
                    </div>
                    <div class="panel-body">
                         
                        <fieldset>
						<form method="POST">
						<select class="form-control input-lg" name="role">
						 <option value="member type">Member Type</option>
						  <option value="admin">Admin</option>
						  <option value="mentor">Mentor</option>
						  <option value="reviewer">Reviewer</option>
						   <option value="college">College</option>
						  <option value="student">Student</option>
						 
						</select></br>
                            <div class="form-group">
                            <input class="form-control input-lg" placeholder="E-mail Address" name="email" type="text">
                            </div>
                            <input class="btn btn-lg btn-danger btn-block" value="SEND ME PASSWORD" onclick="display()" name="send_password" type="submit">
						</form>	
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	<script>
function display() {
    alert("Auto genreated password have been sent to your mail id!!");
}

</script>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>