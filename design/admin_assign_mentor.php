<?php include("header.php");?>
<?php 
$clgname=$_SESSION["clgname"];

if(isset($_POST['proceed']))
{

$name=trim($_POST["name"]);
$sel_prj=implode(', ', $_POST['sel_prj']);

$q="UPDATE `projects` SET `college`='".$clgname.",', `mentor`='".$sel_prj."' where name='".$name."'";
echo $q;

mysql_query($q,$cn);

$n=mysql_affected_rows();
/*if($n>=1)
{
echo "<script>alert(\"projects inserted into database successfully!!\")</script>";
//header('Location: admin_home.php');  
echo "<script>window.location.assign(\"admin_assign_mentor.php\")</script>";
}
else
{
echo "<script>alert(\"Unsuccessful try again!!\")</script>";
echo "<script>window.location.assign(\"admin_assign_project.php\")</script>";
}*/
}



?>

			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="admin_home.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Assign Mentor</a></li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Assign Mentor</h2>
						
					</div>
					<div class="box-content">
					<button type="submit" style="float:right" name="finish" onclick="gotopage()" class="btn btn-primary">Done Assigning</button>
					<script>
					function gotopage(){
					window.location.assign("admin_home.php");
					}
					</script>
						<form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<fieldset>
								<div class="control-group">
								<label class="control-label" for="focusedInput">College Name:</label>
								<div class="controls">
								  <?php echo $clgname;
								  ?>
								</div>
							</div>
							   <div class="control-group">
								<label class="control-label" for="college">Select Projects</label>
								<div class="controls">
								  <select id="college" name="projname" style="width:40%">
									<?php
															
									$query = "SELECT projects FROM `college_list` where name='".$clgname."'";
                                            $data = mysql_query($query);
											$r=mysql_fetch_row($data);
											$proj = explode(',',$r[0]);
                                            $len = sizeof($proj);
											for($i=0;$i<$len;$i++)
                                                echo '<option value="'.$proj[$i].'">'.$proj[$i].'</option>';
												
												
                                            
									?>
								  </select>
								</div>
								
							  </div>
							   <div class="control-group">
								<label class="control-label" for="focusedInput">Enter Number Of Mentors To be Assigned</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" name="nom">
								 <button type="submit" name="submit" style="float:right;margin-top:-5px;margin-right:400px" class="btn btn-primary">Submit</button>
								</div>
							  </div>
							 
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Number Of Mentors To be Assigned:</label>
								<div class="controls">
								  <?php
								  if(isset($_POST['submit']))
									{
									$nom=$_POST["nom"];
									$projname=$_POST["projname"];
									echo $nom;
									
																	  
								  ?>
								</div>
							  </div>
							 
							
							</fieldset>
						  </form>
					
					</div>
					
							<script>
							function chkcontrol(j) {
    var total = 0;
	var num = <?php echo $nom?>;
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
						
						$q="SELECT * FROM `mentor_details`";
						
						
							$data=mysql_query($q,$cn);
							$row=mysql_num_rows($data);
							
							?>
							
							  <tr>
								  <th>Name</th>
								  <th>Email</th>
								  <th>Projects Assigned</th>
								  <th>Contact</th>
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
                                    echo $r[4];
                                    echo " </td>
									<td>";
                                    echo $r[6];												   
									echo "  </td>
									<td>";
									echo $r[7];
									echo "</td>";?>
									<input type="hidden" name="id" value="<?php echo $id;?>">
									<input type="hidden" name="name" value="<?php echo $projname;?>">
									
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
					
					<?php
					
					}//submit button close
					?>
					</form>
				</div><!--/span-->
				
			
			</div><!--/row-->
			
			<div style="margin-left:-40px;margin-right:-40px;margin-bottom:-80px;">
<?php include("footer.php");?>
</div>