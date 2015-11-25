	<div class="container bg-panel">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa flaticon-bill9" style=""></i> Purchase Order</h1>
				<div class="col-lg-5 col-xs-12 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa icon_datareport"></i><a href="<?php echo base_url()?>purchases"> Purchases</a></li>
					<li><i class="fa flaticon-bill9"></i> Purchase Order</li>
				</ol>
				</div>
			</div>
		</div>
		
		<?php foreach($po as $r) ?>
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
							<?php if(!$r->order_status) { ?>
							<form action="<?php echo base_url(); ?>purchases/update_order/<?php echo $r->purchase_reference?>"  role="form" accept-charset="utf-8" method="post">
							<h3>Details</h3>
							
							<div class="row">
								<div class="col-lg-5 col-xs-7">
									<div class="form-group">
										<label>Supplier</label>
										<div class="input-group">
										<select name="supplier_id" class="form-control" required>
											<option value="<?php echo $r->supplier_id?>"><?php echo $r->supplier_name?></option>
											<?php if(!empty($supplier)){
												if (is_array($supplier)){                      
											    	foreach ($supplier as $row) {
											    		if($row['supplier_id'] != $r->supplier_id){ ?>
														<option value="<?php echo $row['supplier_id']?>"><?php echo $row['supplier_name']; ?></option>
													<?php } }
												}
											}
																				
											else{	?>
											<option value=""></option>
											<?php }?>
										</select>
										<?php if($this->session->userdata('user_type') <= '2' || $this->session->userdata('user_type') == '5'):?>
										<span class="input-group-btn">
											<button type="button" class="btn btn-theme" data-toggle="modal" data-target="#addSupplier"><i class="fa fa-plus"></i></a>
									    </span>
									    <?php endif; ?>
										</div>
									</div>
									
									
								</div>

								<div class="col-lg-3 col-xs-5 pull-right">
									<div class="form-group">
										<label>Date of Delivery</label>
										<input type="text" name="date_received" class="form-control" value="<?php echo date('Y-m-d', strtotime($r->date_received)) ?>" id="datep">
									</div>	
								</div>
								
								<div class="col-lg-3 col-xs-3 pull-right">
									<div class="form-group">
										<label>Date Ordered</label>
										<input type="text" name="date_ordered" class="form-control" value="<?php echo date('Y-m-d', strtotime($r->date_ordered)) ?>" id="edate" disabled>
										<input type="hidden" name="date_ordered" value="<?php echo date('Y-m-d', strtotime($r->date_ordered)) ?>">
									</div>	
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-6 col-xs-6">
									<div class="form-group">
										<label>Reference ID</label>
										<input type="text" name="order_reference" class="form-control" value="<?php echo $r->purchase_reference ?>" style="text-transform: uppercase;">
									</div>
								</div>
								
								<div class="col-lg-3 col-xs-3 pull-right">
									<div class="form-group">
										<label>Status</label>
										<select name="purchase_status" class="form-control" disabled>
											<option value="0" selected>On Process</option>
											<option value="1">Delivered</option>
										</select>
									</div>
								</div>
								
								
							</div>
							<div class="row">
								<?php if($this->session->userdata('user_type') == '5'):?>
								<div class="col-lg-3 pull-left">
									<div class="form-group">
										<span data-toggle="modal" data-target="#addNew">
											<a type="button" class="btn btn-caution" data-toggle="tooltip" data-placement="top" title="Add New Product"><i class="fa fa-plus"></i></a>
										</span>
										
										<span data-toggle="modal" data-target="#addOld">
											<a type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add Old Product"><i class="fa fa-plus"></i></a>
										</span>
										
										<span>
											<a onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>purchases/cancel_purchase/<?php echo $r->purchase_id?>" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancel Order"><i class="fa fa-close"></i></a>
										</span>
									</div>
								</div>
								<?php endif; ?>
								<div class="col-lg-2 pull-right">
									<div class="form-group">
										<input type="submit" class="btn btn-theme" value="Update Info" data-toggle="tooltip" data-placement="top" title="Update Order Information">
									</div>
								</div>
								
							</div>
							<?php } else if($r->order_status){?>
							<form action="<?php echo base_url(); ?>purchases/accept_purchase/<?php echo $r->purchase_id?>"  role="form" accept-charset="utf-8" method="post">
							<h3>Details</h3>
							
							<div class="row">
								<div class="col-lg-5 col-xs-7">
									<div class="form-group">
										<label>Supplier</label>
										<div class="input-group">
										<select name="supplier_id" class="form-control" disabled>
											<option value="<?php echo $r->supplier_id?>"><?php echo $r->supplier_name?></option>
											<?php if(!empty($supplier)){
												if (is_array($supplier)){                      
											    	foreach ($supplier as $row) {
											    		if($row['supplier_id'] != $r->supplier_id){ ?>
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
										<label>Date of Delivery</label>
										<input type="text" name="date_received" class="form-control" value="<?php echo date('Y-m-d', strtotime($r->date_received)) ?>" id="datep" disabled>
									</div>	
								</div>
								
								<div class="col-lg-3 col-xs-12 pull-right">
									<div class="form-group">
										<label>Date Ordered</label>
										<input type="text" name="date_ordered" class="form-control" value="<?php echo date('Y-m-d', strtotime($r->date_ordered)) ?>" id="edate" disabled>
									</div>	
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-6 col-xs-6">
									<div class="form-group">
										<label>Reference ID</label>
										<input type="text" name="order_reference" class="form-control" value="<?php echo $r->purchase_reference ?>" style="text-transform: uppercase;" disabled>
										<input type="hidden" name="total_cost" value="<?php echo $to->total?>">
									</div>
								</div>
								
								<div class="col-lg-3 col-xs-3 pull-right">
									<div class="form-group">
										<label>Status</label>
										<select name="purchase_status" class="form-control" disabled>
											<?php if($r->po_status == '0'):?>
											<option value="0" selected>On Process</option>
											<?php else: ?>
											<option value="1">Delivered</option>
											<?php endif;?>
										</select>
									</div>
								</div>
								
							</div>
							
							<?php if($r->po_status == '0'):?>
							<div class="row">
								<div class="col-lg-1 pull-right">
									<div class="form-group">
									<input type="submit" class="btn btn-success fa" data-toggle="tooltip" data-placement="top" title="Clear Order" value="&#xF00c;">									
									</div>
								</div>
							</div>
							<?php endif; ?>
							<?php } ?>
							</form>
						</div>
					</div>
								
					
					<!-- Table -->
					<div class="row">
						
						<section class="col-lg-12 panel">
						<h3>Products Ordered</h3>	
							<div class="table-responsive"> 
								<table class="table table-advance table-hover">
									<tbody>
										<tr>
											<th class="col-md-1"><i class="fa fa-barcode"></i> Reference ID</th>
											<th class="col-md-1"><i class="fa flaticon-ingredients1"></i> Product</th>
						                    <th class="col-md-1"><i class="fa fa-truck"></i> Quantity Ordered</th>
						                    <th class="col-md-1"><i class="fa fa-truck"></i> Quantity Received</th>
						                    <th class="col-md-1"><i class="fa">&#8369;</i> Total</th> 
										</tr>
				                              	
				                        <?php if(isset($orders) && is_array($orders)): foreach($orders as $row): if($row->order_status != '0'):?> 
										<tr class="clickable-row" data-href="<?php echo base_url()?>purchases/ordered_product/<?php echo $row->order_id?>">
											<td class="col-md-1"><?php echo $row->order_reference ?></td>
											<td class="col-md-1"><?php echo $row->product_Name ?></td>
					                        <td class="col-md-1"><?php echo $row->order_quantity ?> <?php if($row->um == 'pc'){echo $row->um;?>s<?php } else{ echo $row->um;}?></td>
					                        <td class="col-md-1"><?php echo $row->qty_received ?> <?php if($row->um == 'pc'){echo $row->um;?>s<?php } else{ echo $row->um;}?></td>
					                        <td class="col-md-1">&#8369; <?php echo $row->ordering_cost?></b></td>
										</tr>	
										<?php 
										else:?>
										<tr class="conf clickable-row" data-href="<?php echo base_url()?>purchases/ordered_product/<?php echo $row->order_id?>">
											<td class="col-md-1 b"><?php echo $row->order_reference ?></td>
											<td class="col-md-1 b"><?php echo $row->product_Name ?></td>
					                        <td class="col-md-1 b"><?php echo $row->order_quantity ?> <?php if($row->um == 'pc'){echo $row->um;?>s<?php } else{ echo $row->um;}?></td>
					                        <td class="col-md-1"><?php echo $row->qty_received ?> <?php if($row->um == 'pc'){echo $row->um;?>s<?php } else{ echo $row->um;}?></td>
					                        <td class="col-md-1 b">&#8369; <?php echo $row->ordering_cost?></b></td>
										</tr>	
										<?php
										endif;
										endforeach;	                               
										endif;?> 
										
										<tr>
											<td class="col-md-1"><b>Total Amount</b></td>
										   	<td class="col-md-1"></td>
										   	<td class="col-md-1"></td>
										   	<td class="col-md-1"></td>
										   	<td class="col-md-1"><b>&#8369; <?php echo $to->total?></b></td>	
										</tr> 
										 
									</tbody>
								</table>
							</div>
						</section>
					</div>
					<!-- /Table -->
				
				</div>
			</div>
		</div>
		
	</div>
	
	
	<!-- ADD OLD PRODUCT ORDER MODAL -->
	<div class="modal fade" id="addOld" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="vertical-alignment-helper">
			<div class="modal-dialog vertical-align-center">
							
				<div class="modal-content">
				<form action="<?php echo base_url(); ?>purchases/add_order_o/<?php echo $r->purchase_reference?>"  role="form" accept-charset="utf-8" method="post" novalidate>	
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title"><i class="fa flaticon-ingredients1"></i> Old Product Order Form</h4>
					</div>
							
					<div class="modal-body">

						<div class="col-lg-10">
							<div class="form-group">
								<label class="control-label">Product</label>
								<select name="product_id" class="form-control" required>
									<option value="">Select Product</option>
									<?php if(!empty($prod)){
										if (is_array($prod)){                      
											foreach ($prod as $row) {?>
												<option value="<?php echo $row['product_id']?>"><?php echo $row['product_Name']; ?></option>
											<?php }
										}							
									}
																			
									else{	?>
										<option value=""></option>
									<?php }?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-3">
								<label class="control-label">Quantity</label>
								<input type="number" min="1" name="quantity" class="form-control inline" required>
							</div>

							<div class="col-lg-3">
								<label class="control-label">Price per unit</label>
								<input type="number" step="any" name="price" class="form-control inline" required>
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
	
	
	<!-- ADD NEW PRODUCT ORDER MODAL -->
	<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="vertical-alignment-helper">
			<div class="modal-dialog vertical-align-center">
							
				<div class="modal-content">
				<form action="<?php echo base_url(); ?>purchases/add_order/<?php echo $r->purchase_reference?>"  role="form" accept-charset="utf-8" method="post" novalidate>	
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title"><i class="fa flaticon-ingredients1"></i> New Product Order Form</h4>
					</div>
							
					<div class="modal-body">
						
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
								<input type="text" name="product_Name" class="form-control inline" required>
							</div>
						</div>
	
						<div class="form-group">
							<div class="col-lg-3">
								<label class="control-label">Quantity</label>
								<input type="number" min="1" name="quantity" class="form-control inline" required>
							</div>
							
							
							<div class="col-lg-3">
								<label class="control-label">Unit</label>
								<select name="purchase_status" class="form-control">
									<option value="g">Grams</option>
									<option value="ml">Millilitres</option>
									<option value="pc">Piece</option>
								</select>
							</div>

							<div class="col-lg-3">
								<label class="control-label">Price per unit</label>
								<input type="number" step="any" name="price" class="form-control inline" required>
							</div>
							
							
						</div>
						
						<div class="form-group">
							<div class="col-lg-8">
								<label class="control-label">Description</label>
								<textarea name="description" class="form-control inline" required></textarea>
							</div>
							
							<div class="col-lg-3">
								<label class="control-label">Holding Cost</label>
								<input type="number" step="any" name="holding_cost" class="form-control inline" required>
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