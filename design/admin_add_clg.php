<?php include("header.php");?>
<?php 
if(isset($_POST['save']))
{
/*
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$name=test_input($_POST["clgname"]);

$city=test_input($_POST["city"]);
$state=test_input($_POST["state"]);
$sname=test_input($_POST["spname"]);

$addrs=test_input($_POST["address"]);

$clgcont=test_input($_POST["contact"]);

$semail=test_input($_POST["spemail"]);
$scont=test_input($_POST["spcontact"]);
*/
$name=$_POST["clgname"];

$city=$_POST["city"];
$state=$_POST["state"];
$sname=$_POST["spname"];

$addrs=$_POST["address"];

$clgcont=$_POST["contact"];

$semail=$_POST["spemail"];
$scont=$_POST["spcontact"];
$status="";

/*
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $state = $sname = $city = $state = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
     $name=test_input($_POST["clgname"]);

$city=test_input($_POST["city"]);
$state=test_input($_POST["state"]);
$sname=test_input($_POST["spname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
	  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }
     
   if (empty($_POST["website"])) {
     $website = "";
   } else {
     $website = test_input($_POST["website"]);
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
       $websiteErr = "Invalid URL"; 
     }
   }

   if (empty($_POST["comment"])) {
     $comment = "";
   } else {
     $comment = test_input($_POST["comment"]);
   }

   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }
}

*/

$query="INSERT INTO `college_list`(`name`, `addresss`, `city`, `state`, `contact`, `spoc_name`, `spoc_email`, `spoc_contact`, `status`) VALUES ('".$name."','".$addrs."','".$city."','".$state."','".$clgcont."','".$sname."','".$semail."','".$scont."','".$status."')";
//echo '<script>alert("'.$test.'");</script>';
mysql_query($query,$cn);

$n=mysql_affected_rows();

}

?>

			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="admin_home.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="admin_add_clg.php">Add College</a></li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add College</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">College Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="clgname" type="text" required>
								  <!--<span class="error">* <?php echo $nameErr;?></span>-->
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Address</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="address" type="text" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">City</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="city" type="text" required>
								  <!--<span class="error">* <?php echo $nameErr;?></span>-->
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">State</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="state" type="text" required>
								  <!--<span class="error">* <?php echo $nameErr;?></span>-->
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">College Contact</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="contact" type="text" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Spoc Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="spname" type="text" required>
								  <!--<span class="error">* <?php echo $nameErr;?></span>-->
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Spoc Email</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="spemail" type="text" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Spoc Contact</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="spcontact" type="text" required>
								</div>
							  </div>
							
							  
							  <div class="form-actions">
								<button type="submit" name="save" onclick="request()" class="btn btn-primary">Add College</button>
								
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			<script>
function request() {
    
	alert("Email has been send to the specified college wait for the reply!!");
}

</script>
			<div style="margin-left:-40px;margin-right:-50px;margin-bottom:-70px;">
<?php include("footer.php");?>
</div>