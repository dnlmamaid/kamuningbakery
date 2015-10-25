<!-- Page Content -->

<div class="container bg-panel">
            	
		<div class="row" style="margin-top:15px;">                   
			<div class="col-lg-12">
				
				<div class="col-lg-4 col-xs-4">
					<a href="<?php echo base_url()?>users" data-toggle="tooltip" data-placement="top" title="Users">
					<div class="info-box green-bg">
						<i class="fa fa-users"></i>
						<div class="count">
							Users
						</div>
						<div class="title">
							
						</div>
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->

				<div class="col-lg-4 col-xs-4">
					<a href="<?php echo base_url()?>products" data-toggle="tooltip" data-placement="top" title="Products">
					<div class="info-box blue-bg">
						<i class="fa fa-shopping-cart"></i>
						<div class="count">
							Products
						</div>
						<div class="title">
							
						</div>
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
						
				<div class="col-lg-4 col-xs-4">
					<a href="<?php echo base_url()?>sales/report" data-toggle="tooltip" data-placement="top" title="Sales">
					<div class="info-box greenLight-bg">
						<i class="fa fa-dollar"></i>
						<div class="count">
							Sales
						</div>
						<div class="title">
						</div>
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
			
			</div>
		</div>
                
		<!-- tables-->
		<div class="row">
			
			<div class="col-lg-6 col-xs-6">
				<h3><i class="fa fa-dollar"></i> Highest Selling Products</h3>
				<div class="table-responsive"> 
					<table class="table table-advance">
					<tbody>
						<tr>
							<th class="col-md-2"><i class="fa icon_cart"></i> Product Name</th>
                            <th class="col-md-2"><i class="fa fa-dollar"></i> Price</th>
							<th class="col-md-2"><i class="fa fa-dollar"></i> Total Sold</th>
						</tr>
                        
                        <tr class="conf clickable-row" data-href="#">
							<td class="col-md-2-b"> Malungay pandesal</a></td>
                            <td class="col-md-2-b">Php 1</a></td>
                            <td class="col-md-2-b">3250 pcs</a></td>                                                           
                        </tr>
                              	
					</tbody>
                    </table>
                </div>
                
			</div>
			
			
			<div class="col-lg-6 col-xs-6">
			<h3><i class="fa fa-exclamation-triangle" style="color:red;"></i> Low Inventory Products</h3>
				<div class="table-responsive"> 
					<table class="table table-advance">
					<tbody>
						<tr>
							<th class="col-md-2"><i class="fa icon_cart"></i> Product Name</th>
                            <th class="col-md-2"><i class="fa fa-dollar"></i> Price</th>
							<th class="col-md-2"><i class="fa fa-exclamation-triangle"></i> Quantity</th>
						</tr>
                        
                        <tr class="conf clickable-row" data-href="#">
							<td class="col-md-2-b"> Malungay pandesal</a></td>
                            <td class="col-md-2-b">Php 1</a></td>
                            <td class="col-md-2-b">3250 pcs</a></td>                                                           
                        </tr>
                              	
					</tbody>
                    </table>
                </div>
                
			</div>
			
			<div class="col-lg-6">
				<h3><i class="fa fa-history"></i> Recent Activities</h3>
				<div class="table-responsive"> 
					<table class="table table-advance">
						<tbody>
							<tr>
								<th class="col-md-1"><i class="fa fa-barcode"></i> Module</th>
								<th class="col-md-2"><i class="fa fa-cog"></i> Action</th>
								<th class="col-md-1"><i class="fa fa-user"></i> Modified By</th>
			                    <th class="col-md-2"><i class="fa fa-clock-o"></i> Date</th>
	                        </tr>
	                              	
	                        <?php if(isset($audit) && is_array($audit)) : foreach($audit as $row): ?> 
							<tr class="conf clickable-row" data-href="<?php echo base_url()?>audit_trail/view_action/<?php echo $row->audit_id?>">
								<td class="col-md-1"><?php echo $row->module ?></td>
								<td class="col-md-2"><?php echo $row->remarks ?></td>
								<td class="col-md-1"><?php echo $row->firstName ?> <?php echo $row->lastName ?></td>
		                        <td class="col-md-2"><?php echo date('F d,Y (D) h:i A', strtotime($row->date_created))?></td>
	                       	</tr>	
							<?php endforeach;	                               
						   			                               
							else:?>
							<tr>											
								<th>No records</th>
								<th>No records</th>
								<th>No records</th>
								<th>No records</th>
								<th>No records</th>
							</tr>
							<?php endif; ?>      
	                               	
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
              
             
</div>
<!-- /#page-content-wrapper -->