<!DOCTYPE html>
<?php require_once 'connect.php';?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	
	
	<title>COLLEGE HOME</title>

	<link rel="shortcut icon" href="assets/images/log.png" height="100%" width="100%">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/ionicons.min.css"  type="text/css" />    
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/custom.css">
	
	<link rel="stylesheet" href="assests/css/style.css" >
	
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	<?php   session_start();  
	
	if(!isset($_SESSION['username_spoc'])) {
        header('Location: index.php');
    }
	?>
</head>

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
			</div><!--/.nav-collapse -->
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
			<li><a href="college_home.php">College</a></li>
			<li class="active">MOU manage</li>
		</ol>
		<div class="container" >
		
				<header class="page-header">
					<h1 class="page-title text-center">MOU</h1>
				</header>
		<?php
			require_once 'connect.php';
			$query="select college from spoc_details where username='" . $_SESSION['username_spoc'] . "'";
			$data=mysql_query($query,$cn);
			$r=mysql_fetch_row($data);
			$_SESSION["clg_name"]=$r[0];

		?>
			<form >
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div>
					
						<div class="panel-body">
																	
							<h3 class="thin text-center">Download MOU Template:</h3>

							<table border="0">

							<tbody>

							 <?php
   
    
   
							$uploaddir = './MOU Template/';
							$link=opendir($uploaddir);
							while($file=  readdir($link))
							{
								if($file=="." ||$file=="..")
							{
								continue;
							}
							else
							{
							  $filename=  pathinfo($file,PATHINFO_FILENAME);
							  
							echo "<tr><td><a href='download_mou_temp.php?name=$file'>$filename</a>"."</td></tr><br/>";
							}
							break;
							
							}
							closedir($link);
							
							?>


							</tbody></table>

							</form>

						</div>
					</div>

				</div>
   
	
	
	<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div>
					
						<div class="panel-body">
																	
							<form enctype="multipart/form-data" method="POST" action="upload_mou_clg.php"><h3 class="thin text-center">Select Signed MOU :</h3>

							<table border="0">

							<tbody>

							<tr>

							<td align="left">Select File:</td>

							<td><input accept="doc/docx" name="filename" size="40" type="file" /></td>

							</tr>

							<tr>


							<td><input name="Upload" type="submit" value="Upload" /></td>

							</tr>

							</tbody></table>

							</form>

						</div>
					</div>

				</div>
							<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div>
					
						<div class="panel-body">
																	
							<h3 class="thin text-center">Signed MOU:</h3>

							<table border="0">

							<tbody>

							 <?php
   
    
   
							$uploaddir = './MOU signed/'.$r[0].'/';
							$link=opendir($uploaddir);
							$i=0;
							$j=0;
							while($file=  readdir($link))
							{ 
								if($file=="." ||$file=="..")
							{
								
								//if($j==0)
								//{
								//echo "<p class=\"wel\" style=\"text-align:center;\"><b>No document Uploaded Yet!!!</b></p>	";$j=2;
								//}
								continue;
								
							}
							else
							{
							  
							  $filename=  pathinfo($file,PATHINFO_FILENAME);
							  if($i==0)
							echo "<tr><td><a href='download_mou_signed.php?name=$file'>$filename</a>"."</td></tr><br/>";
							
							
							}
							$i++;
							
							}
							closedir($link);
							
							?>


							</tbody></table>

							</form>

						</div>
					</div>

				</div>
   
   
</form>
</div>
	</div>	<!-- /container -->
<?php include("foot.php");?>