<!DOCTYPE html>
<?php
require_once 'connect.php';

   session_start();  
	if(!isset($_SESSION['username_review'])) {
        header('Location: index.php');
    }
	
if(isset($_POST["save"]))
{

	$email=$_POST["email"];
						$contact=$_POST["contact"];
				$q="UPDATE `reviewer_details` SET `email`='".$email."',`contact`='".$contact."' WHERE  username='" . $_SESSION['username_review'] . "'";
				$data=mysql_query($q,$cn);
				
				$n=mysql_affected_rows();
if($n>=1)
{
	
	
	$url="revieweredit.php";
	header('Location: ' . $url);
}
}



?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	
	
	<title>EDIT REVIEWER INFORMATION</title>

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
					<li><a href="reviewer_home.php">HOME</a></li>
					<li><a href="revieweredit.php">PROFILE</a></li>
					<!--<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">MANAGE STUDENTS<b class="caret"></b></a>
						<ul class="dropdown-menu">-->
							<li><a href="all_std.php">ALL STUDENTS </a></li>
							<li><a href="reviewer_new_select_students.php">SELECT STUDENT</a></li>
	
						<!--</ul>
					</li>-->
					
					<li class="active"><a class="btn" href="logout.php">LOGOUT</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>
<p class="wel" style="margin-left:1150px"><b>WELCOME</b> &nbsp<span><?php echo "<font face=\"Comic sans MS\" size=\"4\">" . $_SESSION['username_review'] . "</font>"?></span></p>			   

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="reviewer_home.php">College</a></li>
			<li class="active">Edit Reviewer Details</li>
		</ol>

			<?php
									
				
							
				$q="SELECT * FROM `reviewer_details` where username='" . $_SESSION['username_review'] . "'";
				$data=mysql_query($q,$cn);
				$row=mysql_num_rows($data);
			?>
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title text-center">EDIT REVIEWER DETAILS</h1>
				</header>
				<h4 align=center>CHANGE REVIEWER INFORMATION</h4>
				<form method="POST">
				<?php
				if($data<1)
				{
					echo"query is wrong";
				}
				$r=mysql_fetch_row($data);

				?>
				<table class="table table-bordered">
					<tr class="row">
						<td class="col-xs-2">
							NAME
						</td>
						<td class='col-xs-4'>
							<?php echo $r[1];?>
						</td>
						<td class="col-xs-2">
							USERNAME
						</td>
						<td class='col-xs-4'>
							<?php echo $r[2];?>
						</td>
						</tr>
					
					
					<tr class="row">
						<td class="col-xs-2">
							E-MAIL
						</td>
						<td class='col-xs-4'>
							<?php echo $r[4];?>
						</td>
						<td class='col-xs-2'>
							E-Mail
						</td>
						<td class='col-xs-4'>
							<input type="text" value="<?php echo $r[4];?>" name="email" class="form-control">
						</td>
						
					</tr>
					
					
					
					
					<tr class="row">
						<td class="col-xs-2">
							CONTACT NO
						</td>
						<td class='col-xs-4'>
							<?php echo $r[5];?>
						</td>
						<td class='col-xs-2'>
							CONTACT NO
						</td>
						<td class='col-xs-4'>
							<input type="text" name="contact" value="<?php echo $r[5];?>" class="form-control">
						</td>
					</tr>
					
					
						
										
									
					
				</table>	
				</form>
				<button class="btn btn-action" name="save" style="float:right" type="submit">SAVE</button>
				<button class="btn btn-action" name="pass" type="submit"><a href ="reviewer_pass_chng.php">CHANGE PASSWORD</a></button>
			</a>
				
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	<div style="margin-top:90px;">
<?php include("foot.php")?>
</div>