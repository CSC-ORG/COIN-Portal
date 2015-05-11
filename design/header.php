<?php require_once 'connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	
	<meta charset="utf-8">
	<title>Admin</title>
	
	
<?php   session_start(); 
	if(!isset($_SESSION['username_admin'])) {
        header('Location: index.php');
    }

	?>
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	
	<link rel="shortcut icon" href="img/favicon.ico">
	
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="navbar-brand" href="index.php"><img src="img/logo.png" height='35px' width='74px' style="margin-top:20px; margin-bottom;-15px;"></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white warning-sign"></i>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title">
 									<span>You have 1 notifications</span>
									<!--<a href="#refresh"><i class="icon-repeat"></i></a>-->
								</li>	
                            	<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">MOU Sent to JIIT</span>
										<!--<span class="time">1 min</span> -->
                                    </a>
                                </li>
								
							</ul>
						</li>
						<!-- start: Notifications Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white tasks"></i>
							</a>
							<ul class="dropdown-menu tasks">
								<li class="dropdown-menu-title">
 									<span>You have 3 Projects in progress</span>
									<!--<a href="#refresh"><i class="icon-repeat"></i></a>-->
								</li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">survey App</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim red">80</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">coin portal</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim green">47</div> 
                                    </a>
                                </li>
                                
								<li>
                            		<a class="dropdown-menu-sub-footer">View all projects</a>
								</li>	
							</ul>
						</li>
						<!-- end: Notifications Dropdown -->
						
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?php 
						$q="SELECT name FROM `admin_details` WHERE email='" . $_SESSION['username_admin'] . "' OR username='" . $_SESSION['username_admin'] . "' ";
						$data=mysql_query($q,$cn);
						$r=mysql_fetch_row($data);
echo $r[0];?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="admin_profile.php"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="logout.php"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="admin_home.php"><i class="icon-home"></i><span class="hidden-tablet"> Home</span></a></li>	
						<li><a href="admin_sel_std.php"><i class="icon-group"></i><span class="hidden-tablet"> Selected Students</span></a></li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-building"></i><span class="hidden-tablet"> College Panel</span><i class="icon-circle-arrow-down"></i></a>
							<ul>
								<li><a class="submenu" href="admin_add_clg.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Add</span></a></li>
								<li><a class="submenu" href="admin_clg_view.php"><i class="icon-file-alt"></i><span class="hidden-tablet">View/Edit</span></a></li>
								
							</ul>	
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">COIN Project</span><i class="icon-circle-arrow-down"></i></a>
							<ul>
								<li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet">New Project</span></a></li>
								<li><a class="submenu" href="admin_project_current.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Current Projects</span></a></li>
								<li><a class="submenu" href="admin_project_completed.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Completed Projects</span></a></li>
								
							</ul>
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Manage Projects</span><i class="icon-circle-arrow-down"></i></a>
							<ul>
								<li><a class="submenu" href="admin_add_prj.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Add</span></a></li>
								<li><a class="submenu" href="admin_assign_project.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Assign Projects</span></a></li>								
							</ul>	
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-wrench"></i><span class="hidden-tablet">Manage Accounts</span><i class="icon-circle-arrow-down"></i></a>
							<ul>
								<li><a class="submenu" href="admin_mng_acc_mentor.php"><i class="icon-user"></i><span class="hidden-tablet">Mentor</span></a></li>
								<li><a class="submenu" href="admin_mng_acc_review.php"><i class="icon-user"></i><span class="hidden-tablet">Reviewer</span></a></li>
								<li><a class="submenu" href="admin_mng_acc_clg.php"><i class="icon-user"></i><span class="hidden-tablet">College Spoc</span></a></li>
								<li><a class="submenu" href="admin_mng_acc_std.php"><i class="icon-user"></i><span class="hidden-tablet">Student</span></a></li>
							</ul>	
						</li>
						
						<li><a href="logout.php"><i class="icon-lock"></i><span class="hidden-tablet"> Logout</span></a></li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			
			
			<div id="content" class="span10">