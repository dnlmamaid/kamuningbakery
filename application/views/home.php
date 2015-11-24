<!-- Page Content -->

	<div class="container bg-panel">
            	
		<div class="row" style="margin-top:15px;">
			                 
			<div class="col-lg-12">
				
				
				<?php if($this->session->userdata('user_type') <= '2'): ?>
				<div class="col-lg-12" align="center" style="margin-bottom:15px;">
					<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/kb_logo.jpg">
				</div>  
				
				<div class="col-lg-2 col-xs-4">
					<a href="<?php echo base_url()?>users" data-toggle="tooltip" data-placement="top" title="Users">
					<div class="info-box green-bg">
						<i class="fa fa-users"></i>
						<div class="count">
							
						</div>
						<div class="title">
							
						</div>
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->

				<div class="col-lg-2 col-xs-4">
					<a href="<?php echo base_url()?>production" data-toggle="tooltip" data-placement="top" title="Production">
					<div class="info-box red-bg">
						<i class="fa flaticon-stone2"></i>
						<div class="count">
							
						</div>
						<div class="title">
							
						</div>
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
						
				<div class="col-lg-2 col-xs-4">
					<a href="<?php echo base_url()?>sales/report" data-toggle="tooltip" data-placement="top" title="Sales">
					<div class="info-box greenLight-bg">
						<i class="fa fa">&#8369;</i>
						<div class="count">
							
						</div>
						<div class="title">
						</div>
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
				
				<div class="col-lg-2 col-xs-4">
					<a href="<?php echo base_url()?>purchases" data-toggle="tooltip" data-placement="top" title="Purchases">
					<div class="info-box yellow-bg">
						<i class="fa icon_datareport"></i>
						<div class="count">
							
						</div>
						<div class="title">
							
						</div>
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
				
				<div class="col-lg-2 col-xs-4">
					<a href="<?php echo base_url()?>audit_trail" data-toggle="tooltip" data-placement="top" title="Audit Trail">
					<div class="info-box blue-bg">
						<i class="fa fa-archive"></i>
						<div class="count">
							
						</div>
						<div class="title">
							
						</div>
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
				
				<div class="col-lg-2 col-xs-4">
					<a href="<?php echo base_url()?>requests" data-toggle="tooltip" data-placement="top" title="Requests">
					<div class="info-box magenta-bg">
						<i class="fa fa-comments-o"></i>
						<div class="count">
							
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
			<?php if($this->session->flashdata('message')){ ?>
			<div class="col-lg-10">
				<div class="alert alert-info" role="alert" style="margin-top:5px"><?php echo $this -> session -> flashdata('message'); ?></div>
			</div>
			<?php } ?>
			
			<div class="col-lg-6 col-xs-6">
				<h3>Highest Selling Product</h3>
				
				<div id="hsp"></div>
                
			</div>
			
			<div class="col-lg-6">
				<div id="activity" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			</div>	
			
		</div>
		
		<div class="col-lg-6 col-xs-6">
				<h3><i class="fa fa-comments-o"></i> Active Requests</h3>
				<div class="table-responsive"> 
					<table class="table table-advance table-hover">
					<tbody>
						<tr>
							<th class="col-md-2"><i class="fa fa-calendar"></i> Date</th>
							<th class="col-md-1"><i class="fa fa-user"></i> User</th>
                            <th class="col-md-1"><i class="fa fa-comment"></i> Request ID</th>
						</tr>
                        <?php if(isset($requests) && is_array($requests)) : foreach($requests as $row): ?>
                        <tr class="conf clickable-row" data-href="<?php echo base_url()?>requests/request_order/<?php echo $row->ro_reference ?>">
                        	<td class="col-md-2 b"><?php echo date('F d,Y (D) h:i A', strtotime($row->request_date))?></td>
							<td class="col-md-1 b"><?php echo $row->lastName ?>, <?php echo $row->firstName ?></a></td>
                            <td class="col-md-1 b"><?php echo $row->ro_reference ?></a></td>
                                                                                       
                        </tr>
                        <?php endforeach;	                               
						else:?>
						<tr>											
							<th>No records</th>
							<th>No records</th>
							<th>No records</th>
						</tr>
						<?php endif; ?> 
					</tbody>
                    </table>
                </div>
                
			</div>
			
			
			<div class="col-lg-6 col-xs-6">
			<h3><i class="fa fa-exclamation-triangle" style="color:yellow;"></i> Low Inventory Products</h3>
				<div class="table-responsive"> 
					<table class="table table-advance table-hover">
					<tbody>
						<tr>
							<th class="col-md-2"><i class="fa icon_cart"></i> Product Name</th>
                            <th class="col-md-2"><i class="fa">&#8369;</i> Cost per unit</th>
							<th class="col-md-2"><i class="fa fa-exclamation-triangle"></i> Quantity</th>
						</tr>
                        
                        <?php if(isset($products) && is_array($products)) : foreach($products as $row):?> 
								  	<tr class="conf clickable-row" data-href="<?php echo base_url()?>products/view_product/<?php echo $row->product_id?>">
							<td class="col-md-2-b"><i class="fa fa-exclamation-triangle"></i> <?php echo $row->product_Name?></a></td>
                            <td class="col-md-2-b">&#8369; <?php echo $row->price ?></a></td>
                            <td class="col-md-2-b"> <?php echo round($row->current_count) ?></a></td>                                                           
                        <?php endforeach;	                               
						else:?>
						<tr>											
							<th>No records</th>
							<th>No records</th>
							<th>No records</th>
						</tr>
						<?php endif; ?>
                              	
					</tbody>
                    </table>
                </div>
                
			</div>
			
		<?php elseif($this->session->userdata('user_type') == '3'): ?>
    	
    	<!--------------- Accountant --------------------->
    	<!--------------- Accountant --------------------->
    	<!--------------- Accountant --------------------->
    	<!--------------- Accountant --------------------->
    		
    	
    	<div class="row">
    		<div class="col-lg-12" align="center" style="margin-bottom:15px;">
				<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/kb_logo.jpg">
			</div>
    		<div class="col-lg-2">
		    	
				<div class="col-lg-12 col-xs-6">
					<a href="<?php echo base_url()?>sales/report" data-toggle="tooltip" data-placement="top" title="Sales">
					<div class="info-box greenLight-bg">
						<i class="fa fa">&#8369;</i>
						
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
				
				<div class="col-lg-12 col-xs-6">
					<a href="<?php echo base_url()?>purchases" data-toggle="tooltip" data-placement="top" title="Purchases">
					<div class="info-box yellow-bg">
						<i class="fa icon_datareport"></i>
						
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
				
			</div>
			<div class="col-lg-10">
				
				<?php if($this->session->flashdata('message')){ ?>
				<div class="col-lg-12">
					<div class="alert alert-info" role="alert" style="margin-top:5px"><?php echo $this -> session -> flashdata('message'); ?></div>
				</div>
				<?php } ?>
				
				<div class="col-lg-12">
					<div id="activity" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				</div>	
			</div>
			
			
		</div>
    	<?php elseif($this->session->userdata('user_type') == '4'): ?>
    	
    	<!--------------- BAKER --------------------->
    	<!--------------- BAKER --------------------->
    	<!--------------- BAKER --------------------->
    	<!--------------- BAKER --------------------->
    	
    	<div class="row">
    		<div class="col-lg-12" align="center" style="margin-bottom:15px;">
				<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/kb_logo.jpg">
			</div>
    		<div class="col-lg-2">
		    	
				<div class="col-lg-12 col-xs-6">
					<a href="<?php echo base_url()?>production" data-toggle="tooltip" data-placement="top" title="Production">
					<div class="info-box red-bg">
						<i class="fa flaticon-stone2"></i>
						
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
							
				<div class="col-lg-12 col-xs-6">
					<a href="<?php echo base_url()?>requests" data-toggle="tooltip" data-placement="top" title="Requests">
					<div class="info-box magenta-bg">
						<i class="fa fa-comments-o"></i>

					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
				
			</div>
			<div class="col-lg-10">
				
				<?php if($this->session->flashdata('message')){ ?>
				<div class="col-lg-12">
					<div class="alert alert-info" role="alert" style="margin-top:5px"><?php echo $this -> session -> flashdata('message'); ?></div>
				</div>
				<?php } ?>
				<h2><i class="fa fa-comments-o"></i> Active Requests</h2>
				<div class="table-responsive"> 
					<table class="table table-advance table-hover">
					<tbody>
						<tr>
							<th class="col-md-2"><i class="fa fa-calendar"></i> Date</th>
							<th class="col-md-1"><i class="fa fa-user"></i> User</th>
                            <th class="col-md-1"><i class="fa fa-comment"></i> Request ID</th>
						</tr>
                        <?php if(isset($requests) && is_array($requests)) : foreach($requests as $row): ?>
                        <tr class="conf clickable-row" data-href="<?php echo base_url()?>requests/request_order/<?php echo $row->ro_reference ?>">
                        	<td class="col-md-2 b"><?php echo date('F d,Y (D) h:i A', strtotime($row->request_date))?></td>
							<td class="col-md-1 b"><?php echo $row->lastName ?>, <?php echo $row->firstName ?></a></td>
                            <td class="col-md-1 b"><?php echo $row->ro_reference ?></a></td>
                                                                                       
                        </tr>
                        <?php endforeach;	                               
						else:?>
						<tr>											
							<th>No records</th>
							<th>No records</th>
							<th>No records</th>
						</tr>
						<?php endif; ?> 
					</tbody>
                    </table>
                </div>
			</div>
			
			<div class="col-lg-10">
				<h2><i class="fa flaticon-stone2"></i> Produced Goods</h2>
				<div class="table-responsive"> 
					<table class="table table-advance table-hover">
					<tbody>
						<tr>
							<th class="col-md-1"><i class="fa fa-calendar"></i> Date Produced</th>
							<th class="col-md-1"><i class="fa flaticon-breakfast27"></i> Product Name</th>
			                <th class="col-md-1"><i class="fa fa-tags"></i> Number of Goods Produced</th>
							<th class="col-md-1"><i class="fa">&#8369;</i> Net Cost</th>
						</tr>
                        <?php if(isset($production) && is_array($production)) : foreach($production as $row): ?>
                        <tr class="clickable-row" data-href="<?php echo base_url()?>production/production_batch/<?php echo $row->batch_id ?>">
							<td class="col-md-1"><?php echo date('F d,Y (D)', strtotime($row->date_produced))?></td>
							<td class="col-md-1"><?php echo $row->batch_id ?></td>
		                   	<td class="col-md-1"><?php echo $row->net_produced_qty ?> units</td>
		                	<td class="col-md-1">Php <?php echo $row->net_production_cost ?></td>
	                    </tr>
                        <?php endforeach;	                               
						else:?>
						<tr>											
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
		<?php elseif($this->session->userdata('user_type') == '5'): ?>
    	
    	<!--------------- PURCHASER --------------------->
    	<!--------------- PURCHASER --------------------->
    	<!--------------- PURCHASER --------------------->
    	
    	<div class="row">
    		<div class="col-lg-12" align="center" style="margin-bottom:15px;">
				<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/kb_logo.jpg">
			</div>
    		<div class="col-lg-2">
    			
    			<div class="col-lg-12 col-xs-4">
					<a href="<?php echo base_url()?>requests" data-toggle="tooltip" data-placement="top" title="Requests">
					<div class="info-box magenta-bg">
						<i class="fa fa-comments-o"></i>
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
		    	
				<div class="col-lg-12 col-xs-6">
					<a href="<?php echo base_url()?>purchases" data-toggle="tooltip" data-placement="top" title="Purchases">
					<div class="info-box yellow-bg">
						<i class="fa icon_datareport"></i>
						
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
							
				<div class="col-lg-12 col-xs-6">
					<a href="<?php echo base_url()?>suppliers" data-toggle="tooltip" data-placement="top" title="Suppliers">
					<div class="info-box red-bg">
						<i class="fa fa-truck"></i>
						
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
				
				
				
			</div>
			<?php if($this->session->flashdata('message')){ ?>
			<div class="col-lg-10">
				<div class="alert alert-info" role="alert" style="margin-top:5px"><?php echo $this -> session -> flashdata('message'); ?></div>
			</div>
			<?php } ?>
			<div class="col-lg-10">				
				<div id="purchaser-purchases"></div>	
			</div>			
				
		</div>
		
		<?php elseif($this->session->userdata('user_type') == '6'): ?>
    	
    	<!--------------- STOCK KEEPER --------------------->
    	<!--------------- STOCK KEEPER --------------------->
    	<!--------------- STOCK KEEPER --------------------->
    	
    	<div class="row">
    		<div class="col-lg-12" align="center" style="margin-bottom:15px;">
				<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/kb_logo.jpg">
			</div>
    		<div class="col-lg-2">
		    	
				<div class="col-lg-12 col-xs-6">
					<a href="<?php echo base_url()?>purchases" data-toggle="tooltip" data-placement="top" title="Purchases">
					<div class="info-box yellow-bg">
						<i class="fa icon_datareport"></i>
						
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
							
				<div class="col-lg-12 col-xs-6">
					<a href="<?php echo base_url()?>suppliers" data-toggle="tooltip" data-placement="top" title="Suppliers">
					<div class="info-box red-bg">
						<i class="fa fa-truck"></i>
						
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
				
			</div>
			<?php if($this->session->flashdata('message')){ ?>
			<div class="col-lg-10">
				<div class="alert alert-info" role="alert" style="margin-top:5px"><?php echo $this -> session -> flashdata('message'); ?></div>
			</div>
			<?php } ?>
			<div class="col-lg-10">				
				<div id="purchaser-purchases"></div>	
			</div>			
				
		</div>
		<?php endif; ?>
		
		
		
             
	</div>
	<!-- container bg -->


</div>
<!-- /#page-content-wrapper -->