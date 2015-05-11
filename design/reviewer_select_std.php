<!DOCTYPE html>
<?php
 require_once 'connect.php';

?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	
	
	<title>college list</title>

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
	<!-- container -->
	<div class="container">

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title text-center">Select College</h1>
				</header>
				
				
				<div class="container">
				
				
                    <form method="POST">
                    <table class="table table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width: 100%; text-align: center; vertical-align: middle">
                                    <label class="text-info" style="font-size: 18px">Filter Options</label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 100%; vertical-align: middle">
                                    <select style="width:100%" class="input-sm" name="city">
                                        <option value="select">-- Select College --</option>
                                        <?php
                                            $locationquery = "Select distinct college from `all_std` order by college;";
                                            $locationresult = mysql_query($locationquery);
                                            while(($locationoutput = mysql_fetch_array($locationresult))) {
                                                if(strcmp($locationoutput[0],'')==0)
                                                    continue;
                                                echo '<option value="'.$locationoutput[0].'">'.$locationoutput[0].'</option>';
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                           
                            <tr>
                                
                                <td style="width: 30%; vertical-align: middle">
                                    <button type="submit" name="apply" class="btn btn-info btn-lg" style="float:right">Apply</button>
									 <button type="submit" name="clear" class="btn btn-info btn-lg" style="float:left">Clear Filter</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </form>
                </div>
				
				
				
				<?php
						$i=0;
						$college2;
						if((isset($_POST["apply"])) && (isset($_POST["clear"])))
						{
						$college2=$_POST["college"];
						$q1="SELECT * FROM `all_std` where college='".$college2."'";
						}
						elseif((isset($_POST["clear"])) && !(isset($_POST["apply"])))
						{
						$q1="SELECT * FROM `all_std` ";
						}
							$data=mysql_query($q1,$cn);
							$row=mysql_num_rows($data);
							?>
							
							
				<div class="container" >
					  
			

					  <table class="table table-hover">
						<thead>
						  <tr>
							
							<th>Student Name</th>
							<th>Branch</th>
							<th>Email</th>
							<th>College</th>
							<th>level 1</th>
							<th>level 2</th>
							<th>Status</th>
							<th>Comment</th>
							
							
						  </tr>
						</thead>
						<tbody>
						<?php
						
						
						//$start=1;
						//$end=$start+1;
						
					/*	if((isset($_POST["prev"])) && !(isset($_POST["next"])))
						{
							if($start<=1)
							{
								$start=1;
								$end=2;
							}
							else
							{
							
							$end=$start-1;
							$start=$end-2;
							}
						}
						if((isset($_POST["next"])) && !(isset($_POST["prev"])))
						{
							if($end>$row)
							{
								$end=$row;
								$start=$end-2;
							}
							else
							{
							
							$start=$end+1;
							$end=$start+2;
							}
						}
					
							*/
							
							$start=1;
							$end=$row;
							for($j=$start;$j<=$end;$j++) {$i++;
									   $r=mysql_fetch_row($data);
									
									echo "
                                    <td>";
									 echo    $r[1];	
									echo "
                                    <td>";
									
                                    echo    $r[2];												   
									echo"  </td>
                                    <td>";
                                    echo $r[3];
                                    echo " </td>
									<td>";
                                    echo $r[5];												   
									echo "  </td>
									<td>";
									echo $r[5];
									echo "</td>";
									echo "	 </td>
														<td style='width=10%'>
														<form id=\"select\" action=\"admin_clg_ch.php\" method=\"POST\">
														
														<input type=\"hidden\" name=\"id\" value=\"'".$r[0]."'\">";
													
														
														echo	"<button type=\"submit\" name=\"Edit\" class=\"btn btn-info\">
																 Select
															</button>
														</td>
														</form>
                                                       </tr>";
									
						 
						 }
						 
						 ?>
						</tbody>
					  </table>
					
					
					<p>Showing Results from <?php echo $start;?> to <?php echo $end; ?></p>
					<form method="POST">
				<button type="submit" name="prev" style="float:left" class="btn btn-info">Previous</button>
				<button type="submit" name="next" style="float:right" class="btn btn-info">Next</button>
				</form>
				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->


<footer id="footer" class="top-space">

		

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					

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
		


	 <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  <script>
  $(function(){
    $("#example").dataTable();
  })
  </script>

	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>