<?php



if(isset($_POST['approve']))
{

require_once 'connect.php';

$email=$_POST["email"];
$id=$_POST["id"];
$comment=$_POST["comment"];
$name=$_POST["name"];

$uploaddir = './MOU signed/'.$name.'/';
 if (!is_dir($uploaddir)) mkdir($uploaddir, 0777);


function generate_password($length = 8, $complex=3) {
$min = "abcdefghijklmnopqrstuvwxyz";
$num = "0123456789";
$maj = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$symb = "!@#$%^&*()_-=+;:,.?";
$chars = $min;
if ($complex >= 2) { $chars .= $num; }
if ($complex >= 3) { $chars .= $maj; }
if ($complex >= 4) { $chars .= $symb; }
$password = substr( str_shuffle( $chars ), 0, $length );
return $password;
}
$password_new=generate_password(8);


$query="UPDATE `college_requests` SET `status`='approve',`comment`='".$comment."',`mou_sent`='yes' WHERE id='".$id."'";
	mysql_query($query,$cn);
$n=mysql_affected_rows();
if($n>=1)
{
	
	
	$url="admin_home.php";
	header('Location: ' . $url);
}


$to=$email; 
				require 'clg_req_mail_app.php';
				
}
if(isset($_POST['reject']))
{
require_once 'connect.php';
$email=$_POST["email"];
$id=$_POST["id"];
$comment=$_POST["comment"];

$query="UPDATE `college_requests` SET `status`='reject',`comment`='".$comment."' WHERE id='".$id."'";
	mysql_query($query,$cn);
$n=mysql_affected_rows();
if($n>=1)
{
	
	
	$url="admin_home.php";
	header('Location: ' . $url);
}

$to=$email; 
				require 'clg_req_mail_rej.php';
}
?>

<?php require_once 'connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	
	<meta charset="utf-8">
	<title>Admin</title>
	
	
<?php   session_start(); 
	if(!isset($_SESSION['admin'])) {
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
						<!-- start: Message Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white envelope"></i>
							</a>
							<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>You have 3 messages</span>
									<!--<a href="#refresh"><i class="icon-repeat"></i></a>-->
								</li>	
                            	<!--<li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	6 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	56 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                -->
								<li>
                            		<a class="dropdown-menu-sub-footer">View all messages</a>
								</li>	
							</ul>
						</li>
						<!-- end: Message Dropdown -->
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?php 
						$q="SELECT name FROM `admin` WHERE email='" . $_SESSION['admin'] . "' OR username='" . $_SESSION['admin'] . "' ";
						$data=mysql_query($q,$cn);
						$r=mysql_fetch_row($data);
echo $r[0];?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
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
						<li><a href="messages.html"><i class="icon-envelope"></i><span class="hidden-tablet"> Messages</span></a></li>
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
								<li><a class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span class="hidden-tablet">Current Projects</span></a></li>
								<li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet">Completed Projects</span></a></li>
								
							</ul>
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Manage Projects</span><i class="icon-circle-arrow-down"></i></a>
							<ul>
								<li><a class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span class="hidden-tablet">Add</span></a></li>
								<li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet">View/Edit</span></a></li>
								<li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet">Assign Projects</span></a></li>								
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
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="admin_home_main.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
			</ul>

			<div class="row-fluid">
			
			<a href="admin_clg_view.php" class="quick-button metro yellow span2">
					<i class="icon-group"></i>
					<p>Total Colleges</p>
					<span class="badge">5</span>
				</a>
				<a class="quick-button metro green span2">
					<i class="icon-tasks"></i>
					<p>Current Projects</p>
					<span class="badge">4</span>
				</a>
				<a class="quick-button metro blue span2">
					<i class="icon-file"></i>
					<p>Completed Projects</p>
					<span class="badge">3</span>
				</a>
				<a class="quick-button metro red span2">
					<i class="icon-folder-open"></i>
					<p>Total Projects</p>
					<span class="badge">5</span>
				</a>
				<a class="quick-button metro pink span2">
					<i class="icon-envelope"></i>
					<p>Messages</p>
					<span class="badge">5</span>
				</a>
				
				
			</div>		

			<div class="row-fluid" style="margin-top:15px;">
			
			
			
			<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon th"></i><span class="break"></span>Login Requests</h2>
					</div>
					<div class="box-content">
						<ul class="nav tab-menu nav-tabs" id="myTab">
							<li class="active"><a href="#pendingReq">Pending Requests</a></li>
							<li><a href="#allReq">All Requests</a></li>
							
						</ul>
						 
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane active" id="pendingReq">
							<table class="table table-hover">        
                                <thead>
							<?php
								$q="SELECT * FROM `login_req` WHERE rights=\"\" ";
							$data=mysql_query($q,$cn);
							$row=mysql_num_rows($data);
							
							if($row>=1){
							
                                    echo " <tr>
                                       <th style=\"width:100%; font-size:16px; color:#474747\" colspan=\"5\">
                                          Login requests for your approval!
                                       </th>
                                   </tr>
                               </thead>
								 
                               <tbody>
								   
                                  <tr>						
                                       <th style=\"width:5%\">
                                           #
                                       </th>
                                      <th style=\"width:15%\">
                                            Name 
                                      </th>
                                      <th style=\"width:15%\">
                                           Email
                                       </th>
										<th style=\"width:10%\">
                                         Date
                                       </th>
                                       <th style=\"width:10%\">
                                           Rights
                                        </th>
										<th style=\"width:15%\">
                                       Accept/Reject/Hold
                                    </th>
										<th style=\"width:20%\">
                                          Comment
                                        </th>
										<th style=\"width:10%\">
                                            Submit
                                        </th>
                                    </tr>";
                                
								$i=0;
                                       while($row--) {$i++;
									   $r=mysql_fetch_row($data);
                                             echo "<tr>";
                                                      echo " <td style='width:5%'>";
                                                         echo   $i;
														 $id=$r[0];
                                                     echo"  </td>
                                                        <td style='width:15%'>";
                                                        echo    $r[1];												   
														   
                                                      echo"  </td>
                                                        <td style='width:15%'>";
                                                       echo  $r[3];
                                                       echo "</td>
														<td style='width:10%'>";
                                                         echo $r[5];
														 echo "</br>";
														echo $r[6]	;												   
														   echo"
														   
                                                         </td>";?>
														<form id="update" action="send.php" method="POST">
														
														<input type="hidden" name="id" value="<?php echo $r[0];?>">
														<input type="hidden" name="name" value="<?php echo $r[1];?>">
														<input type="hidden" name="username" value="<?php echo $r[2];?>">
														<input type="hidden" name="email" value="<?php echo $r[3];?>">
														<input type="hidden" name="password" value="<?php echo $r[4];?>">
                                                     <?php  echo" <td style='width:10%'>
                                                          
														<select class=\"form-control\" name=\"rights\">
															<option value=\"Null\">Null</option>
															<option value=\"Admin\">Admin</option>
															<option value=\"Mentor\">Mentor</option>
															<option value=\"Reviewer\">Reviewer</option>
															<option value=\"College\">College</option>
															<option value=\"Student\">Student</option>
															
														</select>
                                                        </td>
														<td style='width:15%'>
                                                           
														<select class=\"form-control\" name=\"status\">
															<option value=\"On Hold\">On Hold</option>
															<option value=\"Accept\">Accept</option>
															<option value=\"Reject\">Reject</option>
															
														</select>  
                                                      </td>
														<td style='width=20%'>
															<div class=\"form-group\">
																<input type=\"text\" class=\"form-control\" name=\"comment\" id=\"exampleInputEmail3\" placeholder=\"Comment\">
															</div>
														 </td>
														<td style='width=10%'>";
														?>	<button type="submit" name="submit" class="btn btn-info">
																 Submit
															</button>
														<?php echo"</td>
														</form>
                                                       </tr>";
														
														
                                        }
									}
								else
									{
								
									echo "<tr>
									
									<h3>No Login Requests!</h3>
									
									</tr>
									
									
                                    
                                </tbody>";
							}
							
							?>
							</table>
							</div>
							<div class="tab-pane" id="allReq">
							<table class="table table-hover">        
                                <thead>
								<?php
								
								$q="SELECT * FROM `login_req`";
							$data=mysql_query($q,$cn);
							$row=mysql_num_rows($data);
							
							if($row>=1){
							
                                   echo " <tr>
                                       <th style=\"width:100%; font-size:16px; color:#474747\" colspan=\"5\">
                                          Login requests for your approval!
                                       </th>
                                   </tr>
                               </thead>
								 
                               <tbody>
								   
                                  <tr>						
                                       <th style=\"width:5%\">
                                           #
                                       </th>
                                      <th style=\"width:15%\">
                                            Name 
                                      </th>
                                      <th style=\"width:15%\">
                                           Email
                                       </th>
										<th style=\"width:10%\">
                                         Date
                                       </th>
                                       <th style=\"width:10%\">
                                           Rights
                                        </th>
										<th style=\"width:15%\">
                                       Accept/Reject/Hold
                                    </th>
										<th style=\"width:20%\">
                                          Comment
                                        </th>
										<th style=\"width:10%\">
                                            Submit
                                        </th>
                                    </tr>";
                                
								$i=0;
                                       while($row--) {$i++;
									   $r=mysql_fetch_row($data);
                                             echo "<tr>";
                                                      echo " <td style='width:5%'>";
                                                         echo   $i;
														 $id=$r[0];
														
                                                     echo"  </td>
                                                        <td style='width:15%'>";
                                                        echo    $r[1];												   
														   
                                                      echo"  </td>
                                                        <td style='width:15%'>";
                                                         echo $r[3];
                                                    echo"    </td>
														<td style='width:10%'>";
                                                         echo $r[5];
														 echo "</br>";
														echo $r[6]	;												   
														   
														   
                                                       echo"  </td>
														
														
														
                                                        <td style='width:10%'>";
                                                          echo $r[7];
														
                                                        echo "</td>
														<td style='width:15%'>";
                                                           
														echo $r[8];
                                                  echo "    </td>
														<td style='width=20%'>";
															echo $r[9];
													echo "	 </td>
														<td style='width=10%'>
														<form id=\"change\" action=\"change.php\" method=\"POST\">
														
														<input type=\"hidden\" name=\"id\" value=\"'".$r[0]."'\">
															<button type=\"submit\" name=\"Edit\" class=\"btn btn-info\">
																 Edit
															</button>
														</td>
														</form>
                                                       </tr>";
														
														
                                        }
									}
								else
									{
								
									echo "<tr>
									
									<h3>No Login Requests!</h3>
									
									</tr>
									
									
									
                                    
                                </tbody>";
							}?>
							</table>
							</div>
							
						</div>
					</div>
				</div><!--/span-->
			
			</div><!-- /row-->
			
				
			<div class="row-fluid">	
				<header class="page-header">
					<h1 class="page-title">College Requests:</h1>
				</header>
				
				
				<div class="col-md-12 col-lg-12 col-sm-12 panel panel-primary">
                            <table class="table table-hover">        
                                <thead>
								<?php
									
							
							
							
							
							$q="SELECT * FROM `college_requests` WHERE status=\"\" ";
							$data=mysql_query($q,$cn);
							$row=mysql_num_rows($data);
							
							if($row>=1){
							
                                    echo " <tr>
                                       <th style=\"width:100%; font-size:16px; color:#474747\" colspan=\"5\">
                                          College requests for your approval!
                                       </th>
                                   </tr>
                               </thead>
								 
                               <tbody>
								   
                                  <tr>						
                                       <th style=\"width:5%\">
                                           #
                                       </th>
                                      <th style=\"width:15%\">
                                            Name 
                                      </th>
                                      <th style=\"width:15%\">
                                           Spoc name
                                       </th>
										
                                       <th style=\"width:10%\">
                                           Email
                                        </th>
										<th style=\"width:10%\">
                                       Contact
                                    </th>
										<th style=\"width:20%\">
                                          Message
                                        </th>
										<th style=\"width:15%\">
                                          Comment
                                        </th>
										<th style=\"width:10%\">
                                            Submit
                                        </th>
                                    </tr>";
                                
								$i=0;
                                       while($row--) {$i++;
									   $r=mysql_fetch_row($data);
                                             echo "<tr>";
                                                      echo " <td style='width:5%'>";
                                                         echo   $i;
														 $id=$r[0];
                                                     echo"  </td>
                                                        <td style='width:15%'>";
                                                        echo    $r[1];												   
														   
                                                      echo"  </td>
                                                        <td style='width:15%'>";
                                                        echo $r[2];
														 echo " ";
														echo $r[3];
                                                       echo "</td>
														<td style='width:10%'>";
                                                         echo $r[4];
														 											   
														   echo"
														   
                                                         </td>";?>
														<form id="update" method="POST">
														
														<input type="hidden" name="id" value="<?php echo $r[0];?>">
														<input type="hidden" name="name" value="<?php echo $r[1];?>">
														<input type="hidden" name="email" value="<?php echo $r[4];?>">
														
														
                                                     <?php  echo" <td style='width:10%'>";
                                                          echo $r[5];
														
                                                       echo" </td>
														<td style='width:20%'>";
														echo $r[6];
                                                           
														
                                                   echo"   </td>
														<td style='width=15%'>
															<div class=\"form-group\">
																<input type=\"text\" class=\"form-control\" name=\"comment\" id=\"exampleInputEmail3\" placeholder=\"Comment\">
															</div>
														 </td>
														<td style='width=10%'>";
														?>	<button type="submit" name="approve" onclick="accept()" class="btn btn-info">
																 Approve
															</button></br></br>
															<button type="submit" name="reject" class="btn btn-info">
																 Reject
															</button>
														<?php echo"</td>
														</form>
                                                       </tr>";
														
														
                                        }
									}
								else
									{
								
									echo "<tr>
									
									<h3>No Login Requests!</h3>
									
									</tr>
									
									
                                    
                                </tbody>";
							}
						
							
							?>
                            </table>
                        </div>
						<script>
function accept() {
    
	alert("MOU sent wait for college to upload signed MOU!!");
}

</script>
			</div><!--/row-->
			
       

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	
	
	<?php include("footer.php");?>