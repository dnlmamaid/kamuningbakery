<?php 
		$pg = $this->uri->segment('3');
		$body = $this->uri->segment('2');
	  	$head = $this->uri->segment('1');
?>
	<div class="container bg-panel">
			
		  <div class="row">
				<div class="col-lg-12">
					<h1 class="page-header"><i class="fa">&#8369;</i> Sales</h1>
					
					<div class="col-lg-3 col-xs-12 pull-left">
					<ol class="breadcrumb">
						<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
						<li><i class="fa">&#8369;</i> Sales</li>
					</ol>
					</div>
					
					
					<div class="col-lg-6 col-xs-12" style="margin-bottom:15px;">
	    				<?php echo form_open('sales/search')?>
						<div class="input-group">
							
		      				<input type="text" class="form-control pull-right" placeholder="Looking for Something?" name="search">
		      				<span class="input-group-btn"><button class="btn btn-theme" type="submit"><i class="glyphicon glyphicon-search"></i></button></span>
		      			<?php echo form_close()?>
		    			</div>
	    			</div>
	    			
	    			<div class="col-lg-2 col-xs-3 pull-right" style="margin-bottom:15px;">
		    			<a href="<?php echo base_url()?>sales/report" alt="Sales Report" data-toggle="tooltip" data-placement="top" title="Sales Report" class="btn btn-caution"><i class="fa fa-line-chart"></i></a>
		    			<a href="<?php echo base_url() ?>sales/create_sales_tab" alt="Sales Invoice" data-toggle="tooltip" data-placement="top" title="Create Sales Invoice" class="btn btn-theme"><i class="fa flaticon-dollar91"></i></a>
					</div>
	    				
				</div>
			</div>
            <!-- page start-->
              	<div class="row">
					<div class="col-lg-12">
						
                      <section class="col-lg-12 panel">
                        <?php if($this->session->flashdata('success')){ ?>
							<div class="alert alert-success" role="alert"><?php echo $this -> session -> flashdata('success'); ?></div>
						<?php } ?>
						<?php if($this->session->flashdata('error')){?>	
							<div class="alert alert-danger" role="alert"><?php echo $this -> session -> flashdata('error'); ?></div>
						<?php } ?>
						<?php if($this->session->flashdata('search')){?>
							<div class="alert alert-info" role="alert">
						<?php echo $this -> session -> flashdata('search'); ?>
							</div>
						<?php } ?> 
						<div class="table-responsive"> 
							<table class="table table-advance table-hover">
								<tbody>
									<tr>
										<th class="col-md-2"><i class="fa fa-calendar"></i> Date</th>
										<th class="col-md-1"><i class="fa fa-barcode"></i> Invoice ID</th>
			                            <th class="col-md-1"><i class="fa fa-user"></i> Employee</th>
			                            <th class="col-md-1"><i class="fa fa-tag"></i> Quantity Sold</th>
			                            <th class="col-md-1"><i class="fa">&#8369;</i> Total Sales</th>
			                            
			                            
	                              	</tr>
	                              	
	                              	<?php if(isset($sales) && is_array($sales)) : foreach($sales as $row): ?> 
								  	<tr class="clickable-row" data-href="<?php echo base_url()?>sales/daily_sales/<?php echo $row->invoice_code?>">
								  		<td class="col-md-2"><?php echo date('F d,Y (D) h:i A', strtotime($row->sales_date))?></td>
								  		<td class="col-md-1"><?php echo $row->invoice_code ?></td>
										
		                                <td class="col-md-1"><?php echo $row->lastName ?>, <?php echo $row->firstName ?></td>
		                                <td class="col-md-1"><?php echo $row->total_qty_sold?></td>
		                				<td class="col-md-1">&#8369; <?php echo $row->total_sales?></td>
		                                
	                                </tr>	
									<?php endforeach;	                               
						   			elseif(isset($search) && is_array($search)): foreach($search as $row):?>
									<tr class="clickable-row" data-href="<?php echo base_url()?>sales/daily_sales/<?php echo $row->invoice_code?>">
										<td class="col-md-2"><?php echo date('F d,Y (D) h:i A', strtotime($row->sales_date))?></td>
								  		<td class="col-md-1"><?php echo $row->invoice_code ?></td>
										<td class="col-md-1"><?php echo $row->lastName ?>, <?php echo $row->firstName ?></td>
		                                <td class="col-md-1"><?php echo $row->total_qty_sold?></td>
		                				<td class="col-md-1">&#8369; <?php echo $row->total_sales?></td>
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
                      </section>
                  </div>
              </div>
              
           <?php if($body != 'search_result'){ ?>
				<div class="row">
					<div class="col-lg-8 col-lg-offset-4 col-xs-10 col-xs-offset-1">
						<div id="pagination">
							<ul class="tsc_pagination">
							<?php if(is_array($sales) && sizeof($sales)>0){?> 
								<div class="pagination pull-left" style="margin:10px 0px 5px 0px;"><?php echo (!empty($pagermessage) ? $pagermessage : ''); ?></div>
							<?php echo $paginglinks;
							}?>
							</ul>
						</div>
					</div>
				</div>
			<?php } ?>
              <!-- page end-->
	</div>
	
	            
</div>
<!-- /#page-content-wrapper -->
 
