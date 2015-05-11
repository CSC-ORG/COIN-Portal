<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	
	
	<title>MENTOR HOME</title>

	<link rel="shortcut icon" href="assets/images/log.png" height="100%" width="100%">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
	
    <style type="text/css">
    	.logo {
    width:200px;
    height:150px;
}
.img-thumbnail{
    border:0px;    
}
.btn, .input-lg, .alert {border-radius:2px !important;}

    </style>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	<?php   session_start();  
	if(!isset($_SESSION['username_mentor'])) {
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
					<li><a href="mentorlogin.php">HOME</a></li>
					
					<li><a href="mentoredit.php">PROFILE</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">PROJECTS<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="current_prj.php">CURRENT PROJECTS</a></li>
							<li><a href="new_prj.php">NEW PROJECTS</a></li>
	
						</ul>
					</li>
					<li><a href="mentorstd.php">STUDENT'S LIST</a></li>
					<li><a href="mentor_prj.php">PROJECT INFO</a></li>
					<li class="active"><a class="btn" href="index.php">LOGOUT</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->
<header id="head" class="secondary"></header>
<p class="wel" style="margin-left:1150px"><b>WELCOME</b> &nbsp<span><?php echo "<font face=\"Comic sans MS\" size=\"4\">" . $_SESSION['username_mentor'] . "</font>"?></span></p>			   
	

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="mentor_home.php">Home</a></li>
			<li class="active">Change Password</li>
		</ol>

			<?php
									
				
					require_once 'connect.php';
				//$q1="SELECT name FROM `std_list` where username='" . $_SESSION['username'] . "'";
				//$data1=mysql_query($q1,$cn);
				//$r1=mysql_fetch_row($data1);	
				//$q="SELECT * FROM `mentor_to_std` where student_name='".$r1[0]."' and status=\"\"";
				//$data=mysql_query($q,$cn);
				//$row=mysql_num_rows($data);		
				//$q="SELECT * FROM `std_list` where status=\"\"";
				//$data=mysql_query($q,$cn)or die(mysql_error());
				//$row=mysql_num_rows($data);
			
					if(isset($_POST["send_password"]))
				{
				$q2="SELECT password FROM `mentor_details`  WHERE  username='" . $_SESSION['username_mentor'] . "'";
				$data=mysql_query($q2,$cn);
				$r=mysql_fetch_row($data);
				$password= $r[0];
				$cpassword=$_POST["cpassword"];
					
				$npassword=$_POST["npassword"];
				if($cpassword!=$password)
				{
				echo "<script>alert(\"You Have Entered Wrong Password!\")</script>";
				//die();
					//$url="mentoredit.php";
					//header('Location: ' . $url);
				}
				else
				{
				$q3="UPDATE `mentor_details` SET `password`='".$npassword."' WHERE  username='" . $_SESSION['username_mentor'] . "'";
				$data=mysql_query($q3,$cn);
				
				$n=mysql_affected_rows();
				if($n>=1)
				{
					
					
					$url="mentoredit.php";
					header('Location: ' . $url);
				}
				}
				}
			?>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                
                        <h3 class="text-center" style="margin-left:-20px"><b>Change password</b></h3>
                    </div>
                    <div class="panel-body" style="margin-top: 100px; width:40%;margin-left:350px">
                         
                        <fieldset>
						<form method="POST">
						
                            <div class="form-group">
                            <input class="form-control input-lg" placeholder="Current Password" name="cpassword" type="password">
                            </div>
							<div class="form-group">
                            <input class="form-control input-lg" placeholder="New Password" name="npassword" type="password">
                            </div>
                            <input class="btn btn-lg btn-danger btn-block" value="CHANGE PASSWORD" name="send_password" type="submit">
						</form>	
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    
	</div>	<!-- /container -->
	

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/temp.js"></script>
	</body>
</html>