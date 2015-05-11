<?php include("header.php");?>

<?php
if(isset($_POST['proceed']))
{
$clgname=$_POST["clgname"];

$sel_prj=implode(', ', $_POST['sel_prj']);

$q="UPDATE `college_list` SET `projects`='".$sel_prj."' where name='".$clgname."'";

mysql_query($q,$cn);

$_SESSION["clgname"]=$clgname;
$n=mysql_affected_rows();
if($n>=1)
{
echo "<script>alert(\"projects inserted into database successfully!!\")</script>";
//header('Location: admin_home.php');  
echo "<script>window.location.assign(\"admin_assign_mentor.php\")</script>";
}
else
{
echo "<script>alert(\"Unsuccessful try again!!\")</script>";
echo "<script>window.location.assign(\"admin_assign_project.php\")</script>";
}
}


?>
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="admin_home.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Assign Project</a></li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Assign Project</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<fieldset>
							   <div class="control-group">
								<label class="control-label" for="college">Select College</label>
								<div class="controls">
								  <select id="college" data-rel="chosen" name="clgname" style="width:40%">
									<?php
															
									$query = "SELECT distinct name FROM `college_list` order by name";
                                            $result = mysql_query($query);
											
                                            while(($output = mysql_fetch_array($result))) {
                                                if(strcmp($output[0],'')==0)
                                                    continue;
												else{	
												$query1 = "SELECT * FROM `all_std` WHERE `level 1` = 'yes' and `level 2` = 'yes' and `college` = '".$output[0]."'";
                                            $result1 = mysql_query($query1);
											$n=mysql_num_rows($result1);
                                                echo '<option value="'.$output[0].'">College:- '.$output[0].' &nbsp;&nbsp;&nbsp;  Number of students:- '.$n.'</option>';
												
												}
                                            }
									?>
								  </select>
								</div>
								
							  </div>
							   <div class="control-group">
								<label class="control-label" for="focusedInput">Enter Number Of Projects To be Assigned</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" name="nop">
								 <button type="submit" name="submit" style="float:right;margin-top:-5px;margin-right:470px" class="btn btn-primary">Submit</button>
								</div>
							  </div>
							 
							  <div class="control-group">
								<label class="control-label" for="focusedInput">College name:</label>
								<div class="controls">
								  <?php
								  if(isset($_POST['submit']))
									{
									$clgname=$_POST["clgname"];
									$nop=$_POST["nop"];
									//$nom=$_POST["nom"];
									$q="SELECT * FROM `all_std` WHERE `level 1` = 'yes' and `level 2` = 'yes' and `college` = '".$clgname."'";
									$data=mysql_query($q,$cn);

									$n=mysql_num_rows($data);
									 echo $clgname;

									
																	  
								  ?>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Number of Students</label>
								<div class="controls">
								  <?php echo $n;
								  
								  ?>
								</div>
							  </div>
							 
							<div class="control-group">
								<label class="control-label" for="focusedInput">Number Of Projects To be Assigned</label>
								<div class="controls">
								  <?php echo $nop;
								  ?>
								</div>
							</div>
							  
							
							</fieldset>
						  </form>
					
					</div>
					
							<script>
							function chkcontrol(j) {
							var total = 0;
							var num = <?php echo $nop?>;
							var chk = document.getElementById("select_prj").querySelectorAll('input[name="sel_prj[]"]');
							for (var i = 0; i < chk.length; i++) {
								var cur = chk[i];
								
								if (cur.checked) {
									total++;
									if (total > num) {
										alert("Select Only the Required Checkboxes");
										alert("Unselect the Checkbox if selected more");
										chk[j-1].checked = false;
										break;
									}
								}
							}
						}
							</script>
					<form id="select_prj" method="POST" >
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
						<?php $i=0;
						
						$q="SELECT * FROM `projects` where `college`!='".$clgname."'";
						
						
							$data=mysql_query($q,$cn);
							$row=mysql_num_rows($data);
							
							?>
							
							  <tr>
								  <th>Name</th>
								  <th>Description</th>
								  <th>Approx Students</th>
								  <th>Tech Used</th>
								  <th>Status</th>
								  <th>Select</th>								  
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							$i=0;
							for($j=0;$j<$row;$j++) {
									   $r=mysql_fetch_row($data);
									   
									echo"<tr>";
									$id=$r[0];
									
									echo "
                                    <td>";
                                    echo    $r[1];												   
									echo"  </td>
                                    <td>";
                                    echo $r[2];
                                    echo " </td>
									<td>";
                                    echo $r[3];												   
									echo "  </td>
									<td>";
									echo $r[4];
									echo "  </td>
									<td>";
									echo $r[8];
									echo "</td>";?>
									
									<input type="hidden" name="id" value="<?php echo $id;?>">
									<input type="hidden" name="name" value="<?php echo $r[1];?>">
									<input type="hidden" name="clgname" value="<?php echo $clgname;?>">
									<input type="hidden" name="nproj" value="<?php echo $nop;?>">
									<?php
									
									echo "<td class=\"center\">
									
									<div class=\"control-group\">
								
								<div class=\"controls\">
								  <label class=\"checkbox inline\">";?>
									<input type="checkbox" id="inlineCheckbox1" name="sel_prj[]" onclick="chkcontrol(<?php echo $i;?>)" value="<?php echo $r[1];?>"> 
								<?php echo" </label>
								 
								</div>
							  </div>
									
									
									
								</td>";
									
									
									echo "</tr>";
									
									$i++;}//for loop
									
									
									
									
									?>
							
							
						  </tbody>
					  </table>            
					</div>
					
					<button type="submit" style="margin-left:10px;" name="proceed" class="btn btn-primary">Proceed</button>
					
					</form>
				</div><!--/span-->
				<?php
					
					}//submit button close
					?>
			
			</div><!--/row-->
			
			<div style="margin-left:-40px;margin-top:150px;margin-right:-40px;margin-bottom:-80px;">
<?php include("footer.php");?>
</div>