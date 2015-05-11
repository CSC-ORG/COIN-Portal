<?php include("header.php");?>
<?php 
if(isset($_POST['submit']))
{

$name=$_POST["prjname"];
$desc=$_POST["desc"];
$std=$_POST["std"];
$tech=$_POST["tech"];
/*
$name=test_input($_POST["prjname"]);
$desc=test_input($_POST["desc"]);
$std=test_input($_POST["std"]);
$tech=test_input($_POST["tech"]);
*/
$status="not started";
/*
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
*/


$query="INSERT INTO `projects`(`name`, `description`, `count_students`, `tech_used`, `status`) VALUES('".$name."','".$desc."','".$std."','".$tech."','".$status."')";
//echo '<script>alert("'.$test.'");</script>';
mysql_query($query,$cn);

$n=mysql_affected_rows();
if($n>=1)
echo '<script>alert("Added Successfully done!!!!");</script>';
else
echo '<script>alert("Try again");</script>';
}

?>

			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="admin_home.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="admin_add_prj.php">Add Project</a></li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Project</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Project Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="prjname" type="text" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Description</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="desc" type="text" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Approx Students</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="std" type="text" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Technology Used</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="tech" type="text" required>
								</div>
							  </div>
							  
							  <div class="form-actions">
								<button type="submit" name="save" class="btn btn-primary">Add Project</button>
								
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			<div style="margin-left:-40px;margin-top:200px;margin-right:-50px;margin-bottom:-70px;">
<?php include("footer.php");?>
</div>