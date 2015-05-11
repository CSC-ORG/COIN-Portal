
<?php include("header.php");?>
			<?php require_once 'connect.php';?>
			
			<?php  
			
			 
			 if(isset($_POST['submit']))
			        {  $count= $_POST["count"];
				  for($i=0;$i<$count;$i++)
						{  
						
						  $name= "name".$i ;
					$name=	  $_POST[$name];
					$username= "username".$i ;
					$username=	  $_POST[$username];
					$password= "password".$i ;
					$password=	  $_POST[$password];
					$email= "email".$i ;
					$email=	  $_POST[$email];
					$students= "students".$i ;
					$students=	  $_POST[$students];
					$projects= "projects".$i ;
					$projects=	  $_POST[$projects];
					$id="id".$i;
					$id= $_POST[$id];
					
					$q3= "UPDATE mentor_details SET `name`='".$name."', `username`='".$username."',`password`='".$password."',`email`='".$email."',`students_under_him`='".$students."',`projects_under_him`='".$projects."'
					    WHERE `id`= ".$id."";
						
						$data=mysql_query($q3,$cn);
					
						}
			 }
			?>
		
			
			
<?php  
                               
							   
						
						
						if(isset($_POST["delete"]))
						{
							$mid = $_POST["id"];
							$q2= "DELETE FROM `mentor_details`  WHERE `id`= '".$mid."' ";
					$data=mysql_query($q2,$cn);
					}
					
					?>
			<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link href="css/bootstrap-editable.css" rel="stylesheet">
<script src="js/bootstrap-editable.js"></script>

    <!-- x-editable (bootstrap version) -->
    
    <!-- main.js -->
   <!-- <script src="main.js"></script>-->
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="admin_home.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">View College</a></li>
			</ul>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<!--<div class="box-header" data-original-title>
						<h2><i class=" halflings-icon home"></i><span class="break"></span>Colleges</h2>
						
					</div>-->
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
						<?php $i=0;
						
						$q="SELECT * FROM `mentor_details` ORDER BY id ASC " ;
						
						
							$data=mysql_query($q,$cn);
							$row=mysql_num_rows($data);
							
							?>
							
							  <tr>
								  <th>Name</th>
								  <th>Username</th>
								  <th>Password</th>
								  <th>Email</th>
								  <th>Students</th>
								  <th>Projects</th>
								  <th>Actions</th>								  
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							if(!isset ($_POST["edit"]))
						{	
							echo " <form method=\"POST\">";
						for($j=0;$j<$row;$j++) {$i++;
									   $r=mysql_fetch_row($data);
									echo " <input type=\"hidden\" name=\"id".$j."\"  value=\"".$r[0]."\" >";
									echo"<tr>";
									$id=$r[0];
									echo "
                                    <td>"; 
                              
        
         echo    $r[1];
      											   
									echo"  </td>
                                    <td>";
                                 
        
         echo    $r[2];
      						
                                    echo " </td>
									<td>";
                                 
        
        echo    $r[3];
      										   
									echo "  </td>
									<td>";
									
        
         echo    $r[4]; 
     
									echo "  </td>
									<td>";
									
        
         echo    $r[5]; 
      
									echo "  </td>
									<td>";
									
        
        echo    $r[6]; 
   	
									echo "  </td>";
									
									
									echo "<td class=\"center\">
									
									
									
									<input type=\"hidden\" name=\"id\" value=\"".$r[0]."\">
								
									
									
									<button name=\"delete\" class=\"btn btn-danger\">
										<i class=\"halflings-icon white trash\"></i> 
									</button>
								</td>";
									
									
									echo "</tr>";}
							
							}
							else if(isset ($_POST["edit"]))
						{	
						echo " <form method=\"POST\">";
						for($j=0;$j<$row;$j++) {$i++;
									   $r=mysql_fetch_row($data);
									  $id= 'id'.$j;
									  echo " <input type=\"hidden\" name=\"id".$j."\"  value=\"".$_POST[$id]."\" >";
									
									echo"<tr>";
									$id=$r[0];
									echo "
                                    <td> 
                              
        <input name=\"name".$j."\" \" style=\" width:100px ; \" type=\"text\"  value=\"".$r[1]."\" >
        
      											   
									  </td>
                                    <td>
                                 
        <input name=\"username".$j."\"\"style=\" width:100px ;\" type=\"text\"  value=\"".$r[2]."\" >
                						
                                   </td>
									<td>
                                 
        <input name=\"password".$j."\"\" style=\" width:100px ;\"type=\"text\"  value=\"".$r[3]."\" >
         
 
      										   
								 </td>
									<td>
									
        
        <input name=\"email".$j."\"\" style=\" width:100px ;\"type=\"text\"  value=\"".$r[4]."\" >
        
     
									</td>
									<td>
									
        
        <input name=\"students".$j."\"\" style=\" width:100px ;\"type=\"text\"  value=\"".$r[5]."\" >
        
      
									</td>
									<td>
									
        
        <input name=\"projects".$j."\"\" style=\" width:100px ;\" type=\"text\"  value=\"".$r[6]."\" >
      
   	
									  </td>
									
									
								<td class=\"center\">
									
									
								</td>";
									
									
									echo "</tr>";}
								echo "<input name=\"count\" type=\"hidden\" value=\" ".$j." \">    ";
							
							
							}
						
							?>
							
					  </tbody>
					
					</table> 
          <?php        if(!isset ($_POST["edit"]))
				  {   echo "  <button name=\"edit\" class=\"btn btn-primary\">
										<i class=\"halflings-icon white edit\"></i> 
									</button> ";}
									else if (isset ( $_POST["edit"]))
                             {                  				     
                       echo "  <button name=\"submit\" class=\"btn btn-primary\">
										<i class=\"halflings-icon white ok\"></i> 
									</button> ";}
									?>
					  
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
		
			
			

    

	
	
