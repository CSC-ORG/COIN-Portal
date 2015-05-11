<?php include 'header.php'
?>
		<!--completed projects-->
		
		
			
			
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="admin_home.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="admin_project_completed.php">Completed Projects</a></li>
			</ul>
			
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class=" halflings-icon home"></i><span class="break"></span>Completed Projects</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead></div>
						<?php $i=0;
						
						$q="SELECT * FROM `projects` where status ='completed'";
						
						
							$data=mysql_query($q,$cn);
							$row=mysql_num_rows($data);
							
							?>
							
							  <tr>
								  <th>Project Name</th>
								  <th>Description</th>
								  <th>No. of Students</th>
								  <th>Technology used</th>
								  <th>College</th>
								  <th>Mentor Name</th>
								  <th>Student Name</th>							  
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							for($j=0;$j<$row;$j++) {$i++;
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
									echo $r[5];
									echo "  </td>
									<td>";
									echo $r[6];
									echo "</td>";
									echo "<td>";
									echo $r[7];
									echo "</td>";
									
									
									
									echo "</tr>";}
							?>
							
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>
		
		<!--/row-->
		<div style="margin-left:-40px;margin-top:170px;margin-right:-50px;margin-bottom:-70px;">
		<?php include("footer.php");?>
		</div>