<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">

	
	<title>Coin-CSC</title>

	<link rel="shortcut icon" href="assets/images/log.png" height="100%" width="100%">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link href="slider/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="slider/js-image-slider.js" type="text/javascript"></script>
	
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
	

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home">
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
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
					
				</ul>
			</div><!--nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head">
		<div class="container">
			<div class="row top-buffer">
			
				<h3><class="lead" style="margin-left:-330px;"><font size='6'>COIN - The Collaborative Open Innovation Network</font></h3>
				
				
				<article class="col-md-8 maincontent">
				
				<div id="sliderFrame">
					<div id="slider">
					   
							<img src="slider/image1.jpg"/>
					   
						<img src="slider/image2.jpg"/>
						<img src="slider/image3.jpg"/>
						<img src="slider/image4.jpg"/>
						
					</div>  
				</div>
				<div class="row">&nbsp;</div>
				<div class="row">&nbsp;</div>
				<div class="row">&nbsp;</div>
				<div class="row">&nbsp;</div>

			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			

				<div class="row widget">
					<div class="col-xs-12">
						<div class="container">
  
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4" style="margin-left:800px;margin-top:-350px;">
      <section class="login-form"> 
        <form method="post" action="signin.php" id="signin">
        
		<select class="form-control input-lg" name="role">
 <option value="member_type">Member Type</option>
  <option value="admin">Admin</option>
  <option value="mentor">Mentor</option>
  <option value="reviewer">Reviewer</option>
   <option value="college">College</option>
  <option value="student">Student</option>
 
</select><br>
          <input type="username" name="username" placeholder="User Name" required class="form-control input-lg"  /><br>
          
          <input type="password" name="password" class="form-control input-lg" id="password" placeholder="Password" required/><br>
          
          
         
          
          
          <button type="submit" name="signin" class="btn btn-lg btn-danger btn-block">Sign in</button>
          <div>
            <a href="signup.php">Create account</a> or <a href="form_send_password.php">forgot password</a>
          </div>
          
        </form>
        
       
      </section>  
      </div>
      
      <div class="col-md-4"></div>
      

  </div>
  
 
  
</div>
					</div>
				</div>
				
				

			</aside>
			<!-- /Sidebar -->

			</div>
			
		</div>
	</header>
	<!-- /Header -->
	

	
	
	

<footer id="footer">

		

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="index.php">Home</a> | 
								<a href="about.php">About</a> |
								<a href="contact.php">Contact</a> |
								<b><a href="signup.php">Sign up</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2015, CSC,India.
							</p>
						</div>
					</div>

				</div> 
			</div>
		</div>
	</footer>	
		




	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/temp.js"></script>
</body>
</html>