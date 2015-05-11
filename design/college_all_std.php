<!DOCTYPE html>
<?php require_once 'connect.php';?>
<?php
if(isset($_POST[""]))



?>
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
	
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assests/css/style.css" >
	
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	<?php   session_start();  
	
	//if(!isset($_SESSION['username_spoc'])) {
    //    header('Location: index.php');
    //}
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
	<!--<p class="wel" style="margin-left:1150px"><b>WELCOME</b> &nbsp<span><?php 
						$q="SELECT name FROM `spoc_details` WHERE email='" . $_SESSION['username_spoc'] . "' OR username='" . $_SESSION['username_spoc'] . "' ";
						$data=mysql_query($q,$cn);
						$r=mysql_fetch_row($data);
echo "<font face=\"Comic sans MS\" size=\"4\">" . $r[0] . "</font>"?></span></p>	-->	   
	

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="college_home.php">College</a></li>
			<li class="active">Student List</li>
		</ol>
		<div class="row-fluid sortable">		
				<div class="box span12">
					<form method="POST">
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
						<?php $i=0;
						$q="SELECT college FROM `spoc_details` WHERE email='" . $_SESSION['username_spoc'] . "' OR username='" . $_SESSION['username_spoc'] . "' ";
						$data=mysql_query($q,$cn);
						$r=mysql_fetch_row($data);
						
						$clg=$r[0];
						$_SESSION["clg_name"]=$clg;
						$q="SELECT * FROM `all_std` where college='".$clg."'";
						
						
							$data=mysql_query($q,$cn);
							$row=mysql_num_rows($data);
							
							?>
							
							  <tr>
								  <th>Name</th>
								  <th>Branch</th>
								  <th>City</th>
								  <th>Email</th>
								  <th>Contact</th>
								  <th>Resume</th>
								  							  
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							for($j=0;$j<$row;$j++) {$i++;
									   $r=mysql_fetch_row($data);
									   
									echo"<tr>";
									$id=$r[0];
									echo "
                                    <td>";
                                    echo    $r[1];
									
									echo"  </td>
                                    <td>";
                                    echo $r[2];
                                    echo " </td>
									<td>";
                                    echo $r[3];												   
									echo "  </td>
									<td>";
									echo $r[4];
									echo "  </td>
									<td>";
									echo $r[5];
									echo "  </td>";
									
									echo "<td class=\"center\">"
									
																		
									
									?>
									<input type="hidden" name="name" value="<?php echo $r[1];?>">
									<button name="resume" class="btn btn-success" >
										Download Resume
									</button>
								<?php
									/*$uploaddir = './RESUME/'.$clg.'/'.$r[1].'/';
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
							  
							echo "<tr><td><a href='download_resume.php?name=$file'>$filename</a>"."</td></tr><br/>";
							}
							break;
							
							}
							closedir($link);*/
								echo "</td>";
									
									
									echo "</tr>";}
							?>
							
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</form>
			</div><!--/row-->
	</div>	<!-- /container -->
	
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
<footer id="footer" class="top-space">

		

		<div class="footer2">
			<div class="container" height="17px">
				
					
					

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2015, CSC,India.
							</p>
						</div>
					</div>

				
			</div>
		</div>
	</footer>	
		




<style type="text/css">
	.bs-example{
		margin: 20px;
	}
</style>
	<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/temp.js"></script>
</body>
</html>