<!DOCTYPE html>
<?php require_once 'connect.php';?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	
	
	<title>REVIEWER HOME</title>

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
	
	if(!isset($_SESSION['username_review'])) {
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
		   
	

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="reviewer_home.php">REVIEWER</a></li>
			<li class="active">Home</li>
		</ol>
		<div class="container">
		
		<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome <?php 
						$q="SELECT name FROM `reviewer_details` WHERE email='" . $_SESSION['username_review'] . "' OR username='" . $_SESSION['username_review'] . "' ";
						$data=mysql_query($q,$cn);
						$r=mysql_fetch_row($data);
echo $r[0];?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <table>
			<tr>
			
			<td class="col-md-3">
			<div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-group fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php 
									$q="SELECT * FROM `all_std`";
									$data=mysql_query($q,$cn);
									$row=mysql_num_rows($data);
									echo $row;
									?></div>
                                    <div>Total Student</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
					</div>
                </td>
				
               <td class="col-md-3">
			    <div>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php 
									$q="SELECT distinct college FROM `all_std`";
									$data=mysql_query($q,$cn);
									$row=mysql_num_rows($data);
									echo $row;
									?></div>
                                    <div>Total Collegs</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
					</div>
                </td>
				<td rowspan="2"  class="col-md-3">
				
				<div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="clg_mou.php" class="list-group-item list-group-item-danger panel-red">
									
                                    <i class="fa fa-file-text fa-fw"></i> MOU sent/received
                                    
                                    
                                </a>
								
								<a href="#" class="list-group-item list-group-item-warning panel-yellow">
									<span class="pull-left"><strong>4</strong></span>
                                    <i class="fa fa-copy fa-fw"></i> NDA/PDD sent/received 
                                   
                                   
                                </a>
                                
                                <a href="#clg_req" class="list-group-item list-group-item-success panel-green">
									<span class="pull-left"><strong>9</strong></span>
                                    <i class="fa fa-group fa-fw"></i> Students Selected
                                    
                                    
                                </a>
								
							
								
                                <a href="#" class="list-group-item panel-yellow">
									<span class="pull-left"><strong>1</strong></span>
                                    <i class="fa fa-comment fa-fw"></i>  Messages
                                   
                                    
                                </a>
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                        <!-- /.panel-body -->
                   
				</div>
				</td>
				</tr>
				
				<tr>
                <td class="col-md-3">
				<div>
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-group fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php 
									$q="SELECT * FROM `all_std` where `level 1`='yes' and `level 2`='yes' ";
									$data=mysql_query($q,$cn);
									$row=mysql_num_rows($data);
									echo $row;
									?></div>
                                    <div>Selected Students</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
					</div>
                </td>
               <td class="col-md-3">
			   <div>
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-folder fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php 
									$q="SELECT * FROM `projects`";
									$data=mysql_query($q,$cn);
									$row=mysql_num_rows($data);
									echo $row;
									?></div>
                                    <div>Messages</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
					</div>
                </td>
				</tr>
				</table>
			
			
			</div><!--tiles-->
			
		
		
		
		
		
		
		
		
		
		
		
		
	</div>	<!-- /container -->
<?php include("foot.php");?>