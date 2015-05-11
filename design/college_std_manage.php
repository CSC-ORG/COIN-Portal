<?php require_once 'connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	
	
	<title>MANAGE STUDENT</title>

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
<?php   session_start();  
	
	if(!isset($_SESSION['username_spoc'])) {
        header('Location: index.php');
    }
	?>
<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="college_home.php"><img src="assets/images/logo.png" height='10%' width='10%' ></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="college_home.php">HOME</a></li>
					<li><a href="college_spoc_edit.php">PROFILE</a></li>
					<!--<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">MANAGE STUDENTS<b class="caret"></b></a>
						<ul class="dropdown-menu">-->
							<li><a href="college_std_manage.php">ENTER STUDENT DATA</a></li>
							<!--<li><a href="#">SELECTED STUDENT</a></li>-->
	
						<!--</ul>
					</li>-->
					<li class="active"><a class="btn" href="logout.php">LOGOUT</a></li>
					
				</ul>
			</div><!--nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>
<p class="wel" style="margin-left:1150px"><b>WELCOME</b> &nbsp<span><?php 
						$q="SELECT name FROM `spoc_details` WHERE email='" . $_SESSION['username_spoc'] . "' OR username='" . $_SESSION['username_spoc'] . "' ";
						$data=mysql_query($q,$cn);
						$r=mysql_fetch_row($data);
echo "<font face=\"Comic sans MS\" size=\"4\">" . $r[0] . "</font>"?></span></p>			   
	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="college_home.php">Home</a></li>
			<li class="active">Manage student</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Manage student</h1>
				</header>
				<?php
			require_once 'connect.php';
			$query="select college from spoc_details where username='" . $_SESSION['username_spoc'] . "'";
			$data=mysql_query($query,$cn);
			$r=mysql_fetch_row($data);
			$_SESSION["clg_name"]=$r[0];

		?>
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Add Student Details</h3>
							
							<hr>

							<form enctype="multipart/form-data" method="POST" action="upload_clg_data.php">
								<div class="top-margin">
									<label>Name<span class="text-danger">*</span></label>
									<input type="text" name="name" class="form-control" required>
								</div>
								<div class="top-margin">
									<label>Email Address <span class="text-danger">*</span></label>
									<input type="email" name="email" class="form-control" required>
								</div>
								<div class="top-margin">
									<label>branch<span class="text-danger">*</span></label>
									<input type="text" name="branch" class="form-control" required>
								</div>
								<div class="row top-margin">
									<div class="col-sm-6">
										<label>contact<span class="text-danger">*</span></label>
										<input type="text" name="contact" class="form-control" required>
									</div>
									<div class="col-sm-6">
										<label>college<span class="text-danger">*</span></label>
										<input type="text" name="college" value="<?php echo $r[0];?>" class="form-control" required>
									</div>
								</div>
								<div class="top-margin">
									<label>Select CV to upload<span class="text-danger">*</span></label>
									<input accept="doc/docx" name="filename" size="40" type="file" />		
									

								</div>

								<hr>

								
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" name="save" value="save" type="submit">Save</button>
										
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		
	</div>	<!-- /container -->
<?php include("foot.php")?>