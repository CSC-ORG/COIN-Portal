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
		   
	

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="college_home.php">College</a></li>
			<li class="active">Home</li>
		</ol>
		<div class="container">
		
		<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome <?php $q="SELECT name FROM `spoc_details` WHERE email='" . $_SESSION['username_spoc'] . "' OR username='" . $_SESSION['username_spoc'] . "' ";
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
									$q1="SELECT college FROM `spoc_details` where username='".$_SESSION['username_spoc']."' or email='".$_SESSION['username_spoc']."'";
									$data1=mysql_query($q1,$cn);
									$r1=mysql_fetch_row($data1);
									$q="SELECT * FROM `all_std` where college='".$r1[0]."'";
									$data=mysql_query($q,$cn);
									$row=mysql_num_rows($data);
									if($row<1)
									echo "0";
									else
									echo $row;
									?></div>
                                    <div>Total Student</div>
                                </div>
                            </div>
                        </div>
                        <a href="college_all_std.php">
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
									$q1="SELECT college FROM `spoc_details` where username='".$_SESSION['username_spoc']."' or email='".$_SESSION['username_spoc']."'";
									$data1=mysql_query($q1,$cn);
									$r1=mysql_fetch_row($data1);
									$q="SELECT * FROM `projects` where college='".$r1[0]."' and status='current'";
									$data=mysql_query($q,$cn);
									$row=mysql_num_rows($data);
									if($row<1)
									echo "0";
									else
									echo $row;
									?></div>
                                    <div>Current Projects</div>
                                </div>
                            </div>
                        </div>
                        <a href="college_projects.php">
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
                                <a href="college_mou.php" class="list-group-item list-group-item-danger panel-red">
									
                                    <i class="fa fa-file-text fa-fw"></i> MOU sent/received
                                    
                                    
                                </a>
								
								<a href="college_nda_pdd.php" class="list-group-item list-group-item-warning panel-yellow">
									<span class="pull-left"><strong>4</strong></span>
                                    <i class="fa fa-copy fa-fw"></i> NDA/PDD sent/received 
                                   
                                   
                                </a>
                                
                                <a href="college_sel_std.php" class="list-group-item list-group-item-success panel-green">
									<span class="pull-left"><strong><?php
									$q1="SELECT college FROM `spoc_details` where username='".$_SESSION['username_spoc']."' or email='".$_SESSION['username_spoc']."'";
									$data1=mysql_query($q1,$cn);
									$r1=mysql_fetch_row($data1);
									$q="SELECT * FROM `all_std` where college='".$r1[0]."' and `level`='yes' and `level 2`='yes'";
									$data=mysql_query($q,$cn);
									//$row=mysql_num_rows($data);
									if($row<1)
									echo "0";
									else
									echo $row;
									?></strong></span>
                                    <i class="fa fa-group fa-fw"></i> Students Selected
                                    
                                    
                                </a>
							
                            </div>
                            <!-- /.list-group -->
                            <!--<a href="#" class="btn btn-default btn-block">View All Alerts</a>-->
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
									$q1="SELECT college FROM `spoc_details` where username='".$_SESSION['username_spoc']."' or email='".$_SESSION['username_spoc']."'";
									$data1=mysql_query($q1,$cn);
									$r1=mysql_fetch_row($data1);
									$q="SELECT * FROM `all_std` where college='".$r1[0]."' and `level`='yes' and `level 2`='yes'";
									$data=mysql_query($q,$cn);
									//$row=mysql_num_rows($data);
									if($row<1)
									echo "0";
									else
									echo $row;
									
									?></div>
                                    <div>Selected Students</div>
                                </div>
                            </div>
                        </div>
                        <a href="college_select_std.php">
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
									$q1="SELECT college FROM `spoc_details` where username='".$_SESSION['username_spoc']."' or email='".$_SESSION['username_spoc']."'";
									$data1=mysql_query($q1,$cn);
									$r1=mysql_fetch_row($data1);
									$q="SELECT * FROM `projects` where college='".$r1[0]."' and status='completed'";
									$data=mysql_query($q,$cn);
									$row=mysql_num_rows($data);
									if($row<1)
									echo "0";
									else
									echo $row;
									?></div>
                                    <div>Completed Projects</div>
                                </div>
                            </div>
                        </div>
                        <a href="college_projects.php">
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