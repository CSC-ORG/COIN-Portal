<?php include("header.php");?>
			
			
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
					<div class="box-header" data-original-title>
						<h2><i class=" halflings-icon home"></i><span class="break"></span>Colleges</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
						<?php $i=0;
						
						$q="SELECT * FROM `college_list` ";
						
						
							$data=mysql_query($q,$cn);
							$row=mysql_num_rows($data);
							
							?>
							
							  <tr>
								  <th>Name</th>
								  <th>Address</th>
								  <th>City</th>
								  <th>State</th>
								  <th>College Contact</th>
								  <th>Spoc Name</th>
								  <th>Spoc Email</th>
								  <th>Spoc Contact</th>
								  <th>Status</th>
								  <th>Project</th>
								  <th>Actions</th>								  
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
									echo "  </td>
									<td>";
									echo $r[7];
									echo "  </td>
									<td>";
									echo $r[8];
									echo "  </td>
									<td>";
									echo $r[9];
									echo "  </td>
									<td>";
									echo $r[10];
									echo "</td>";
									echo "<td class=\"center\">
									
									
									<button name=\"delete\" class=\"btn btn-danger\">
										<i class=\"halflings-icon white trash\"></i> 
									</button>
								</td>";
									
									
									echo "</tr>";}
							?>
							
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			<div style="margin-left:-40px;margin-top:-10px;margin-right:-50px;margin-bottom:-70px;">
<?php include("footer.php");?>
</div>