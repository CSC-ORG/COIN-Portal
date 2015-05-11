<?php require_once 'connect.php';?>
<?php  
  
						$q1= "UPDATE `all_std` SET `flag`='0'  ";
					$data=mysql_query($q1,$cn);
						
						if(isset($_POST["button1_accept"]))
						{   
							$id = $_POST["id"];
							$q2= "UPDATE `all_std` SET `level 1`= 'yes', `flag`='1' WHERE `id`= '".$id."'  ";
					$data=mysql_query($q2,$cn);
						}
						if(isset($_POST["button2_accept"]))
						{
							$id = $_POST["id"];
							$q3= "UPDATE `all_std` SET `level 2`= 'yes' WHERE `id`= '".$id."' ";
					$data=mysql_query($q3,$cn);
						}
						if(isset($_POST["button1_reject"]))
						{
							$id = $_POST["id"];
							$q4= "UPDATE `all_std` SET `level 1`= 'no' WHERE `id`= '".$id."' ";
					$data=mysql_query($q4,$cn);
						}
						if(isset($_POST["button2_reject"]))
						{
							$id = $_POST["id"];
							$q5= "UPDATE `all_std` SET `level 2`= 'no' WHERE `id`= '".$id."' ";
					$data=mysql_query($q5,$cn);
						}
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	
	
	<title>Reviewer Select</title>

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
		<!-- start: Header -->
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
			
			
				
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="admin_home.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Reviewer</a></li>
			</ul>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class=" halflings-icon home"></i><span class="break"></span>Selections</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
						
							
							  <tr>
								  <th>Name</th>
								  <th>Branch</th>
								  <th>Email</th>
								  <th>Contact</th>
								  <th>College</th>
								  
								  
								 
								  <th>Status</th>
								  <th>Comments</th>
								  <th>Level 1</th>
								  <th>Level 2</th>							  
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							$q="SELECT * FROM `all_std` where `level 1`='0' && `level 2`='0' && `flag`='0'";
							$data=mysql_query($q,$cn);
							//$rows= mysql_fetch_row($data);
							
							
								$row= mysql_num_rows($data);
							while($row--){
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
									echo "  </td>
									
									<td>";
									echo $r[8];
									echo "  </td>
									<td>";
									echo $r[9];
									echo"<td>";
									?>
									<form method="POST">
									<input type="hidden" name="id" value="<?php echo $r[0];?>">
									<button class="btn btn-info"  name="button1_accept">
										<i class="halflings-icon white ok"></i>  
									</button>
									<button class="btn btn-danger"  name="button1_reject">
										<i class="halflings-icon white remove"></i>  
									</button>
									<?php
									echo "  </td>
									<td>";
									?>
									_____
									<?php
									echo "  </td>";
									
							echo "</tr>";}
							
							
							
							?>
							<?php
							$q="SELECT * FROM `all_std` where `level 1`='yes' && `level 2`='0' && `flag`='0'";
							$data=mysql_query($q,$cn);
							//$rows= mysql_fetch_row($data);
							
							
								$row= mysql_num_rows($data);
							while($row--){
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
									echo "  </td>
									
									<td>";
									echo $r[8];
									echo "  </td>
									<td>";
									echo $r[9];
								     echo "<td>";
									?>
									<form method="POST">
									<input type="hidden" name="id" value="<?php echo $r[0];?>">
									yes
									<?php
									echo "  </td>
									<td>";
									?>
									<form method="POST">
									<input type="hidden" name="id" value="<?php echo $r[0];?>">
									<button class="btn btn-info"  name="button2_accept">
										<i class="halflings-icon white ok"></i>  
									</button>
									<button class="btn btn-danger"  name="button2_reject">
										<i class="halflings-icon white remove"></i>  
									</button>
									</form>
									<?php
									echo "  </td>";
									
									
							echo "</tr>";}
							
							
							
							?>
							
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			
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