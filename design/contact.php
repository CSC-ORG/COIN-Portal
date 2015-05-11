<?php

date_default_timezone_set("Asia/Kolkata");
 if(isset($_POST['submit']))
{
require_once 'connect.php';

$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$message=$_POST["message"];


$query="INSERT INTO `contact`(`name`, `email`, `phone`, `message`) VALUES ('".$name."','".$email."','".$phone."','".$message."')";

mysql_query($query,$cn);

$n=mysql_affected_rows();
if($n>=1)
echo '<script>alert("Message Ssccessful!!!!");</script>';
else
echo '<script>alert("try again");</script>';
}
if(isset($_POST['submit2']))
{
require_once 'connect.php';

$college_name=$_POST["College-Name"];
$spoc_fname=$_POST["Spoc-FirstName"];
$spoc_lname=$_POST["Spoc-LastName"];
$spoc_email=$_POST["Spoc-Email"];
$phone_no=$_POST["PhoneNo"];
$message=$_POST["message"];

$query2="INSERT INTO `college_requests`(`college_name`, `spoc_fname`, `spec_lname`, `spoc_email`, `phone_no`, `message`) VALUES ('".$college_name."','".$spoc_fname."','".$spoc_lname."','".$spoc_email."','".$phone_no."','".$message."')";
mysql_query($query2,$cn);

$n=mysql_affected_rows();
if($n>=1)
echo '<script>alert("Message Ssccessful!!!!");</script>';
else
echo '<script>alert("try again");</script>';

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	
	
	<title>Contact us</title>

	<link rel="shortcut icon" href="assets/images/log.png" height="100%" width="100%">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
	
			<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" height='10%' width='10%' ></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li class="active"><a href="contact.php">Contact</a></li>
					<!--<li><a class="btn" href="signin.php">SIGN IN / SIGN UP</a></li>-->
				</ul>
			</div><!--nav-collapse -->
		</div>
	</div> 
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Contact</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#sectionA">Contact Us</a></li>
        <li ><a data-toggle="tab" href="#sectionB">College Request</a></li>
        
    </ul>
    <div class="tab-content">
        <div id="sectionA" class="tab-pane fade in active">
            <table><tr><td><h3>Contact Us</h3>
            <!-- Article main content -->
			<article class="col-sm-9 maincontent">
				<header class="page-header">
					
				</header>
				
				<p>
					We’d love to hear from you.  Fill out the form below with some info about you and We will get back to you as soon as possible. Please allow a couple days for me to respond.
				</p>
				<br>
					<form method="POST">
						<div class="row">
							<div class="col-sm-4">
								<input class="form-control" name="name" type="text" placeholder="Name">
							</div>
							<div class="col-sm-4">
								<input class="form-control" name="email" type="text" placeholder="Email">
							</div>
							<div class="col-sm-4">
								<input class="form-control" name="phone" type="text" placeholder="Phone">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<textarea placeholder="Type your message here..." name="message" class="form-control" rows="9"></textarea>
							</div>
						</div>
						<br>
						<div class="row">
							
							<div class="col-sm-6 text-right">
								<input class="btn btn-action" type="submit" name="submit" value="Send message">
							</div>
						</div>
					</form>
					</td><td>
					<h2>Locations in India </h2>
				<div class="widget">
					<h4>Noida</h4>
					<address>
					Computer Sciences Corporation India Pvt. Ltd.  
    <br/>DLF IT Park, Noida Towers <br/> A-44/45, Secto 62<br/>Noida-201301 (U.P)
					</address>
					<h4>Phone:</h4>
					<address>
						Ph: +91-120-6-700002/04
					</address>
				</div>
				<div class="widget">
					<h4>Mumbai</h4>
					<address>
					Computer Sciences Corporation India Pvt. Ltd.



<br/>1101 & 1104, 11th Floor, G Corp Tech Park,<br/>Kasarwadavali, Ghodbunder Road,<br/>Thane (West),
Mumbai – 400615
					</address>
					<h4>Phone:</h4>
					<address>
						Ph: +91-22 -66045000
					</address>
				</div></td></tr></table>

			</article>
			<!-- /Article --></div>
        <div id="sectionB" class="tab-pane fade" style="margin-right:300px">
            <table><tr><td><h3>COLLEGE REQUESTS</h3>
			<p>
					If you want to connect with us and start with us our COIN initiative please fill out the form and you will hear from us as soon as possible!
				</p>
            <form method="POST">
						<div class="row">
							<div class="col-sm-4">
								<input class="form-control" name="College-Name" type="text" placeholder="College-Name">
							</div>
							<div class="col-sm-4">
								<input class="form-control" name="Spoc-FirstName" type="text" placeholder="Spoc-FirstName">
							</div><div class="col-sm-4">
								<input class="form-control" name="Spoc-LastName" type="text" placeholder="Spoc-LastName">
							</div>
							<div class="col-sm-4">
								<input class="form-control" name="Spoc-Email" type="text" placeholder="Spoc-Email">
							</div>
							<div class="col-sm-4">
								<input class="form-control" name="PhoneNo" type="text" placeholder="PhoneNo">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<textarea placeholder="Type your message here..." name="message" class="form-control" rows="9"></textarea>
							</div>
						</div>
						<br>
						<div class="row">
							
							<div class="col-sm-6 text-right">
								<input class="btn btn-action" type="submit" name="submit2" value="Send message">
							</div>
						</div>
					</form></div>
					
					</td><td><div style="margin-right:-300px;margin-left:200px">
					<h2>Locations in India</h2>
				<div class="widget">
					<h4>Noida</h4>
					<address>
					Computer Sciences Corporation India Pvt. Ltd.  
    <br/>DLF IT Park, Noida Towers <br/> A-44/45, Secto 62<br/>Noida-201301 (U.P)
					</address>
					<h4>Phone:</h4>
					<address>
						Ph: +91-120-6-700002/04
					</address>
				</div>
				<div class="widget">
					<h4>Mumbai</h4>
					<address>
					Computer Sciences Corporation India Pvt. Ltd.



<br/>1101 & 1104, 11th Floor, G Corp Tech Park,<br/>Kasarwadavali, Ghodbunder Road,<br/>Thane (West),
Mumbai – 400615
					</address>
					<h4>Phone:</h4>
					<address>
						Ph: +91-22 -66045000
					</address>
				</div></div></td></tr></table>
			
			<!-- Sidebar -->
			

		</div>
	</div>	<!-- /container -->
		<footer id="footer" class="top-space">

		

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="index.php">Home</a> | 
								<a href="about.php">About</a> |
								<a href="contact.php">Contact</a> |
								<b><a href="signup.php">Sign up</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2015, CSC,India.
							</p>
						</div>
					</div>

				</div> 
			</div>
		</div>
	</footer>




	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>