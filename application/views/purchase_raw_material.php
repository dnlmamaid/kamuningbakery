
	<div class="container bg-panel">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa flaticon-ingredients1" style=""></i> Purchase Order</h1>
				<div class="col-lg-5 col-xs-12 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa icon_datareport"></i><a href="<?php echo base_url()?>purchases"> Purchases</a></li>
					<li><i class="fa flaticon-ingredients1"></i> Purchase Order</li>
				</ol>
				</div>
			</div>
		</div>
		
		
		<?php if(isset($po) && is_array($po)): foreach($po as $r)?>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-10 col-lg-offset-1">
					<?php if($this->session->flashdata('success')){?>
					<div class="form-group">
						<div class="alert alert-success" role="	alert">
							<?php echo $this -> session -> flashdata('success'); ?>
						</div>
					</div>
					<?php } ?>
							
					<?php if($this->session->flashdata('error')){?>
					<div class="form-group">
						<div class="alert alert-danger" role="alert">
							<?php echo $this -> session -> flashdata('error'); ?>
						</div>
					</div>
					<?php } ?>
					
					<div class="row">
						<div class="col-lg-12">
							
							<h3>Details</h3>
							<div class="row">
								<div class="col-lg-5 col-xs-7">
									<div class="form-group">
										<label>Supplier</label>
										<div class="input-group">
										<select name="supplier_ID" class="form-control" required>
											<option value="<?php echo $r->supplier_ID?>"><?php echo $r->supplier_name?></option>
											<?php if(!empty($supplier)){
												if (is_array($supplier)){                      
											    	foreach ($supplier as $row) {
											    		if($row['supplier_id'] != $r->supplier_ID){ ?>
														<option value="<?php echo $row['supplier_id']?>"><?php echo $row['supplier_name']; ?></option>
													<?php } }
												}
											}
																				
											else{	?>
											<option value=""></option>
											<?php }?>
										</select>
										<span class="input-group-btn">
											<button type="button" class="btn btn-theme" data-toggle="modal" data-target="#addSupplier"><i class="fa fa-plus"></i></a>
									    </span>
										</div>
									</div>
								</div>
								
								<div class="col-lg-3 col-xs-5 pull-right">
									<div class="form-group">
										<label>Date Ordered</label>
										<input type="text" name="date_ordered" class="form-control" value="<?php echo date('F d, Y', strtotime($r->date_ordered)) ?>" disabled>
									</div>	
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-6 col-xs-6">
									<div class="form-group">
										<label>Reference ID</label>
										<input type="text" name="order_reference" class="form-control" value="<?php echo $r->order_reference ?>" style="text-transform: uppercase;" disabled>
									</div>
								</div>
								
								<div class="col-lg-3 col-xs-3 pull-right">
									<div class="form-group">
										<label>Status</label>
										<select name="purchase_status" class="form-control" disabled>
											<option value="0" selected>On Delivery</option>
											<option value="1">Delivered</option>
										</select>
									</div>
								</div>
							</div>
						
						</div>
					</div>
								
					
					<!-- Page Form -->
					<div class="row">
						
						<section class="col-lg-12 panel">
						<h3>Products Ordered</h3>	
							<div class="table-responsive"> 
								<table class="table table-advance">
									<tbody>
										<tr>
											<th class="col-md-1"><i class="fa fa-barcode"></i> Reference ID</th>
											<th class="col-md-1"><i class="fa flaticon-ingredients1"></i> Product</th>
						                    <th class="col-md-1"><i class="fa fa-truck"></i> Quantity</th>
						                    <th class="col-md-1"><i class="fa fa-dollar"></i> Total</th> 
										</tr>
				                              	
				                        <?php if(isset($po)): foreach($po as $row): ?> 
										<tr class="conf clickable-row" data-href="<?php echo base_url()?>purchases/product_ordered/<?php echo $row->order_id?>">
											<td class="col-md-1"><?php echo $row->order_reference ?></td>
											<td class="col-md-1"><?php echo $row->product_Name ?></td>
					                        <td class="col-md-1"><?php echo $row->order_quantity ?> <?php if($row->um == 'pc'){echo $row->um;?>s<?php } else{ echo $row->um;}?></td>
					                        <td class="col-md-1"><b>Php <?php echo $row->ordering_cost?></b></td>
										</tr>	
										<?php endforeach;	                               
										endif; ?>
										<tr>
											<td class="col-md-1"><b>Total Amount</b></td>
										   	<td class="col-md-1"></td>
										   	<td class="col-md-1"></td>
										   	<td class="col-md-1"><b>Php <?php echo $to->total?></b></td>	
										</tr>  
									</tbody>
								</table>
							</div>
						</section>
							
						<div class="row">
							<div class="col-lg-12">
							<?php echo form_open('purchases/place_order/'.$this->uri->segment(3))?>
								
								<div class="row">
									<div class="col-lg-4 col-xs-4">
										<div class="form-group">
											<label>Date of Delivery</label>
											<input type="text" class="form-control" id="datep" name="date_received" value="<?php echo date('Y-m-d', strtotime($r->date_received))?>" placeholder="<?php echo date('Y-m-d', strtotime($r->date_received))?>">
										</div>
									</div>
								
									<div class="col-lg-2 col-xs-2">
										<input name="supplier_id" value="<?php echo $r->supplier_ID?>" hidden>
										<div class="form-group">
											<label>(-) % Discount:</label>
											<input type="text" class="form-control" name="discount" value="<?php echo $r->discount?>">
										</div>
									</div>
									
									<div class="col-lg-3 col-xs-3">		
										<div class="form-group">
											<label>Grand Total:</label>
											<input type="text" class="form-control" name="total_cost" value="<?php echo $to->total?>">
										</div>
									</div>
									
									<div class="col-lg-3 pull-right" style="margin-top:25px;">
										<div class="form-group">
											<input type="submit" class="btn btn-theme" value="Place Order" data-toggle="tooltip" data-placement="top" title="Place Order">
											<span data-toggle="modal" data-target="#addOrder">
												<a type="button" class="btn btn-caution" data-toggle="tooltip" data-placement="top" title="Add a Product"><i class="fa fa-plus"></i><a>
											</span>
										</div>
									</div>
									
									
								</div>
							</form>
							</div>
						</div>
							
						
					</div>
				
				</div>
			</div>
		</div>
		
	
		<?php else: ?>	
		<!-- page start-->
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
			<form action="<?php echo base_url(); ?>purchases/add_order/<?php echo $this->uri->segment(3)?>"  role="form" accept-charset="utf-8" method="post">			
			<?php if($this->session->flashdata('success')){?>
			<div class="form-group">
				<div class="alert alert-success" role="	alert">
					<?php echo $this -> session -> flashdata('success'); ?>
				</div>
			</div>
			<?php } ?>
					
			<?php if($this->session->flashdata('error')){?>
			<div class="form-group">
				<div class="alert alert-danger" role="alert">
					<?php echo $this -> session -> flashdata('error'); ?>
				</div>
			</div>
			<?php } ?>
			<div class="col-lg-7">
				<h3>Purchase Details</h3>
				
				<div class="col-lg-8 col-xs-8">
					<div class="form-group">
					
						<label>Supplier</label>
						<div class="input-group">
						<select name="supplier_ID" class="form-control" required>
							<option value="">Choose a Supplier</option>
							<?php if(!empty($supplier)){
								if (is_array($supplier)){                      
							    	foreach ($supplier as $row) {?>
										<option value="<?php echo $row['supplier_id']?>"><?php echo $row['supplier_name']; ?></option>
									<?php }
								}
							}
																
							else{	?>
							<option value=""></option>
							<?php }?>
						</select>
						<span class="input-group-btn">
							<button type="button" class="btn btn-theme" data-toggle="modal" data-target="#addSupplier"><i class="fa fa-plus"></i></a>
					    </span>
						</div>
					</div>
				</div>
				
				<div class="col-lg-8">
					<div class="form-group">
						<label>Reference ID</label>
						<input type="text" name="reference" class="form-control" value="<?php echo $this->uri->segment(3)?>" style="text-transform: uppercase;" disabled>
					</div>
				</div>
				
				<div class="col-lg-4">
					<div class="form-group">
						<label>Status</label>
						<select name="purchase_status" class="form-control" disabled>
							<option value="0" selected>On Delivery</option>
							<option value="1">Delivered</option>
						</select>
					</div>
				</div>
			</div>
			
			
			
			
			
				
				
			</div>
		</div>
		<!-- page end-->
		<?php endif;?>
	
	</div>
	
	
	
	<!-- ADD ORDER MODAL -->
	<div class="modal fade" id="addOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="vertical-alignment-helper">
			<div class="modal-dialog vertical-align-center">
							
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title"><i class="fa flaticon-ingredients1"></i> Product Order Form</h4>
					</div>
							
					<div class="modal-body">
					<form action="<?php echo base_url(); ?>purchases/add_order/<?php echo $this->uri->segment(3)?>"  role="form" accept-charset="utf-8" method="post">
					
						<div class="col-lg-10">
							<div class="form-group">
							<label class="control-label">Class</label>
								<div class="input-group">
									<select name="class_ID" class="form-control" required>
										<option value="">Select Class</option>
										<?php if(!empty($cls)){
											if (is_array($cls)){                      
										 		foreach ($cls as $row) {?>
													<option value="<?php echo $row['class_id']?>"><?php echo $row['class_Name']; ?></option>
												<?php }
											}							
										}
																	
										else{	?>
										<option value=""></option>
										<?php }?>
									</select>
									<span class="input-group-btn">
										<button type="button" class="btn btn-theme" data-toggle="modal" data-target="#addClass"><i class="fa fa-plus"></i></button>
							    	</span>
								</div>
							</div>
						</div>
						
						<div class="col-lg-10">
							<div class="form-group">
								<label class="control-label">Name</label>
								<input type="text" name="product_Name" class="form-control inline" value="" required>
								<input type="hidden" name="category_ID" class="form-control inline" value="2" required>
							</div>
						</div>
					
			
					
						
						<div class="form-group">
							<div class="col-lg-3">
								<label class="control-label">Quantity</label>
								<input id="quantity" type="number" name="quantity" class="form-control inline" required>
							</div>
							
							<div class="col-lg-3">
								<label class="control-label">Unit</label>
								<input type="text" name="um" class="form-control inline" required>
							</div>
		  
							<div class="col-lg-3">
								<label class="control-label">Price per unit</label>
								<input id="price" type="number" step="0.001" name="price" class="form-control inline" required>
							</div>
							
							<div class="col-lg-3">
								<label class="control-label">Total Amount</label>
								<input id="ordering_cost" type="number" name="ordering_cost" class="form-control inline" disabled>
								<input id="holding_cost" type="hidden" name="holding_cost" class="form-control inline">
							</div>
							
							
						</div>
						
	
						<div class="col-lg-8">
							<div class="form-group">
								<label class="control-label">Product Description</label>
								<textarea name="description" class="form-control inline" value="" required></textarea>
							</div>
						</div>
						
				
						<div class="col-lg-3">
							<div class="form-group" hidden>
								<label for="is_active">Enabled</label>
								<select name="product_status" class="form-control">
									<option value="1">Yes</option>
									<option value="0" selected>No</option>
								</select>
							</div>
						</div>
						
									
					</div>
								
								
					<div class="modal-footer">
						<div class="form-group">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<input type="submit" class="btn btn-success" value="Add">
						</div>
					</div>
								
				</form>
				</div>
							
			</div>
		</div>
	</div>

	
</div>
<!-- /#page-content-wrapper -->

