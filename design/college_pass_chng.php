<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	
	
	<title>College</title>

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
<p class="wel" style="margin-left:1150px"><b>WELCOME</b> &nbsp<span><?php echo "<font face=\"Comic sans MS\" size=\"4\">" . $_SESSION['username_spoc'] . "</font>"?></span></p>			   
	

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="college_home.php">Home</a></li>
			<li class="active">Change Password</li>
		</ol>

			<?php
									
				
					require_once 'connect.php';
				
			
					if(isset($_POST["send_password"]))
				{
				$q2="SELECT password FROM `spoc_details`  WHERE  username='" . $_SESSION['username_spoc'] . "' or email='" . $_SESSION['username_spoc'] . "'";
				$data=mysql_query($q2,$cn);
				$r=mysql_fetch_row($data);
				$password= $r[0];
				$cpassword=$_POST["cpassword"];
					
				$npassword=$_POST["npassword"];
				if($cpassword!=$password)
				{
				echo "<script>alert(\"You Have Entered Wrong Password!\")</script>";
				
				}
				else
				{
				$q3="UPDATE `spoc_details` SET `password`='".$npassword."' WHERE  username='" . $_SESSION['username_spoc'] . "' or email='" . $_SESSION['username_review'] . "'";
				$data=mysql_query($q3,$cn);
				echo "<script>alert(\"Password changed successfully!\")</script>";
				$n=mysql_affected_rows();
				if($n>=1)
				{
					
					
					$url="college_spoc_edit.php";
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