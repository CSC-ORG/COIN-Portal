<?php include 'header.php'
?>
		<!--completed projects-->
		
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="admin_home.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Selected Student</a></li>
			</ul>
			
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class=" halflings-icon home"></i><span class="break"></span>Seleted Students</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead></div>
						<?php $i=0;
						
						$q="SELECT * FROM `all_std` where `level 1` ='yes' and `level 2` ='yes'";
						
						
							$data=mysql_query($q,$cn);
							$row=mysql_num_rows($data);
							
							?>
							
							  <tr>
								  <th>Student Name</th>
								  <th>Branch</th>
								  <th>Email</th>
								  <th>College</th>					  
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
									echo "  </td>";
									
									
									
									
									echo "</tr>";}
							?>
							
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>
		
		<!--/row-->
		<div style="margin-left:-40px;margin-top:110px;margin-right:-50px;margin-bottom:-70px;">
		<?php include("footer.php");?>
		</div>