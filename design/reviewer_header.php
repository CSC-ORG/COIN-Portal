
<!DOCTYPE html>
<?php require_once 'connect.php';


?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	
	
	<title>REVIEWER HOME</title>

	<link rel="shortcut icon" href="assets/images/log.png" height="100%" width="100%">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-responsive.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assests/css/sb-admin-2.css" >

	
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	<style>
	@import url(http://fonts.googleapis.com/css?family=Gloria+Hallelujah);
* { box-sizing:border-box; }


textarea  { 
	display: block;
	position: relative;
	padding:25px 25px 40px;
	margin:0 auto 20px auto;
	width:250px;
	height:250px;   
	font:20px 'Gloria Hallelujah', cursive; 
	line-height:1.5;
	border:0;
	border-radius:3px;
	background: -webkit-linear-gradient(#F9EFAF, #F7E98D);
	background: -moz-linear-gradient(#F9EFAF, #F7E98D);
	background: -o-linear-gradient(#F9EFAF, #F7E98D);
	background: -ms-linear-gradient(#F9EFAF, #F7E98D);
	background: linear-gradient(#F9EFAF, #F7E98D);
	box-shadow:0 4px 6px rgba(0,0,0,0.1);
	overflow:hidden;
	transition:box-shadow 0.5s ease;
	font-smoothing:subpixel-antialiased;
	max-width:520px;
	max-height:250px;
}

textarea:hover { box-shadow:0 5px 8px rgba(0,0,0,0.15); }
textarea:focus { box-shadow:0 5px 12px rgba(0,0,0,0.2); outline:none; }
	</style>
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
					<li class="active"><a href="reviewer_home.php">Home</a></li>
					<li><a href="revieweredit.php">Edit Profile</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Select Student<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="admin_np1.php">Level 1</a></li>
							<li><a href="#">Level 2</a></li>
							
							
						</ul>
					</li>
					<li><a href="reviewer_home.php">View Selected Students</a></li>
					<li><a class="btn" href="logout.php">LOGOUT</a></li>
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
			<li><a href="reviewer_home.php">Reviewer</a></li>
			<li class="active">Home</li>
		</ol>

		<div class="container">
			
				
		</div>	
	</div>	<!-- /container -->
	

	




	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/temp.js"></script>
</body>
</html>