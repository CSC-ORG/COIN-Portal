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
$uploaddir1 = './RESUME/'.$name.'/';
 if (!is_dir($uploaddir1)) mkdir($uploaddir1, 0777);
 $uploaddir2 = './NDA/'.$name.'/';
 if (!is_dir($uploaddir2)) mkdir($uploaddir2, 0777);
 $uploaddir3 = './PDD/'.$name.'/';
 if (!is_dir($uploaddir3)) mkdir($uploaddir3, 0777);

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

<?php include("header.php");?>

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="admin_home.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
			</ul>

			<div class="row-fluid">
			
			<a href="admin_clg_view.php" class="quick-button metro yellow span2">
					<i class="icon-group"></i>
					<p>Total Colleges</p>
					<span class="badge"><?php 
									$q="SELECT * FROM `college_list`";
									$data=mysql_query($q,$cn);
									$row=mysql_num_rows($data);
									echo $row;
									?></span>
				</a>
				<a href="admin_project_current.php" class="quick-button metro green span2">
					<i class="icon-tasks"></i>
					<p>Current Projects</p>
					<span class="badge"><?php 
									$q="SELECT * FROM `projects` where status=\"current\"";
									$data=mysql_query($q,$cn);
									$row=mysql_num_rows($data);
									echo $row;
									?></span>
				</a>
				<a href="admin_project_current.php" class="quick-button metro blue span2">
					<i class="icon-file"></i>
					<p>Completed Projects</p>
					<span class="badge"><?php 
									$q="SELECT * FROM `projects` where status=\"completed\"";
									$data=mysql_query($q,$cn);
									$row=mysql_num_rows($data);
									echo $row;
									?></span>
				</a>
				<a class="quick-button metro red span2">
					<i class="icon-folder-open"></i>
					<p>Total Projects</p>
					<span class="badge"><?php 
									$q="SELECT * FROM `projects`";
									$data=mysql_query($q,$cn);
									$row=mysql_num_rows($data);
									echo $row;
									?></span>
				</a>
				<a href="admin_sel_std.php" class="quick-button metro pink span2">
					<i class="icon-user"></i>
					<p>Total Students</p>
					<span class="badge">
					<?php 
									$q="SELECT * FROM `all_std` where `level 1` ='yes' and `level 2` ='yes'";
									$data=mysql_query($q,$cn);
									$row=mysql_num_rows($data);
									echo $row;
								?>				
					</span>
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
                                            College Name 
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
									
									<h3>No College Requests!</h3>
									
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