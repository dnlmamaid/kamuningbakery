<?php 
		$pg = $this->uri->segment('3');
		$body = $this->uri->segment('2');
	  	$head = $this->uri->segment('1');
?>
	<div class="container bg-panel">
			
		  <div class="row">
				<div class="col-lg-12">
					<h1 class="page-header"><i class="fa fa-lemon"></i> Purchases</h1>
					
					<div class="col-lg-3 col-xs-12 pull-left">
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url()?>"> Home</a></li>
						<li><i class="fa fa-lemon-o"></i> Purchases</li>
					</ol>
					</div>
					
					
					<div class="col-lg-6 col-xs-12" style="margin-bottom:15px;">
	    				<?php echo form_open('purchases/search')?>
						<div class="input-group">
							
		      				<input type="text" class="form-control pull-right" placeholder="Looking for Something?" name="search">
		      				<span class="input-group-btn"><button class="btn btn-theme" type="submit"><i class="glyphicon glyphicon-search"></i></button></span>
		      			<?php echo form_close()?>
		    			</div>
	    			</div>
	    			
	    			<div class="col-lg-1 col-xs-2 pull-right" style="margin-bottom:15px;">
		    			<a alt="Add New Product" data-toggle="tooltip" data-placement="top" title="Purchase Raw Material" href="<?php echo base_url()?>purchases/purchase_order" class="btn btn-theme"><i class="fa fa-plus"></i></a>
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
							<table class="table table-advance">
								<tbody>
									<tr>
										<th class="col-md-1"><i class="fa fa-barcode"></i> Reference ID</th>
			                            <th class="col-md-1"><i class="fa icon_cart_alt"></i> Product</th>
			                            <th class="col-md-1"><i class="fa fa-truck"></i> Supplier</th>
			                            <th class="col-md-1"><i class="fa fa-tag"></i> Quantity</th>
			                            <th class="col-md-1"><i class="fa fa-dollar"></i> Total</th>
			                            <th class="col-md-2"><i class="fa fa-clock-o"></i> Date</th>
			                            
	                              	</tr>
	                              	
	                              	<?php if(isset($purchases) && is_array($purchases)) : foreach($purchases as $row): ?> 
								  	<tr class="conf clickable-row" data-href="<?php echo base_url()?>purchases/purchase_invoice/<?php echo $row->purchase_id?>">
								  		<td class="col-md-1"><?php echo $row->reference ?></td>
										<td class="col-md-1"><?php echo $row->product_Name ?></td>
		                                <td class="col-md-1"><?php echo $row->supplier_name ?></td>
		                                <td class="col-md-1"><?php echo $row->purchase_quantity?> <?php if($row->um == 'pc'){echo $row->um;?>s<?php } else{ echo $row->um;}?></td>
		                                <td class="col-md-1"><?php echo $row->ordering_cost?></td>
		                                <td class="col-md-2"><?php echo date('F d,Y (D) h:i A', strtotime($row->purchase_date))?></td>
	                                </tr>	
									<?php endforeach;	                               
						   			elseif(isset($search) && is_array($search)): foreach($search as $row):?>
									<tr class="conf clickable-row" data-href="<?php echo base_url()?>purchases/purchase_invoice/<?php echo $row->purchase_id?>">
								  		<td class="col-md-1"><?php echo $row->reference ?></td>
										<td class="col-md-1"><?php echo $row->product_Name ?></td>
		                                <td class="col-md-1"><?php echo $row->supplier_name ?></td>
		                                <td class="col-md-1"><?php echo $row->purchase_quantity?> <?php if($row->um == 'pc'){echo $row->um;?>s<?php } else{ echo $row->um;}?></td>
		                                <td class="col-md-1"><?php echo $row->ordering_cost?></td>
		                                <td class="col-md-2"><?php echo date('F d,Y (D) h:i A', strtotime($row->purchase_date))?></td>
		                                
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
					<div class="col-lg-8 col-lg-offset-4">
						<div id="pagination">
							<ul class="tsc_pagination">
							<?php if(is_array($purchases) && sizeof($purchases)>0){?> 
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
 
