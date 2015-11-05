	<div class="container bg-panel">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa flaticon-dollar91" style=""></i> Daily Sales Tab</h1>
				<div class="col-lg-5 col-xs-12 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa fa-dollar"></i><a href="<?php echo base_url()?>sales"> Sales</a></li>
					<li><i class="fa flaticon-dollar91"></i> Daily Sales Tab</li>
				</ol>
				</div>
			</div>
		</div>
		
		<?php foreach($si as $r) ?>
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
										<label>Employee</label>
										<input type="text" name="user_id" class="form-control" value="<?php echo $r->lastName ?>, <?php echo $r->firstName ?>" disabled>
									</div>	
								</div>

								<div class="col-lg-3 col-xs-3 pull-right">
									<div class="form-group">
										<label>Date Ordered</label>
										<input type="text" name="sales_date" class="form-control" value="<?php echo date('Y-m-d', strtotime($r->sales_date)) ?>" id="edate" disabled>
									</div>	
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-6 col-xs-6">
									<div class="form-group">
										<label>Reference ID</label>
										<input type="text" name="invoice_id" class="form-control" value="<?php echo $r->invoice_code ?>" style="text-transform: uppercase;" disabled>
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
								<div class="col-lg-1 pull-right">
									<div class="form-group">
										<span data-toggle="modal" data-target="#addSalesInvoice">
											<a type="button" class="btn btn-caution" data-toggle="tooltip" data-placement="top" title="Add a Product"><i class="fa fa-plus"></i><a>
										</span>
										
										<!--<a onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>sales/cancel_purchase/<?php echo $r->sales_id?>" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancel Order"><i class="fa fa-close"></i><a>--></a>
									</div>
								</div>
							</div>
							
						
							
						</div>
					</div>
								
					
					<!-- Table -->
					<div class="row">
						
						<section class="col-lg-12 panel">
						<h3>Products Sold</h3>	
							<div class="table-responsive"> 
								<table class="table table-advance table-hover">
									<tbody>
										<tr>
											<th class="col-md-1"><i class="fa fa-barcode"></i> Reference ID</th>
											<th class="col-md-1"><i class="fa flaticon-baked1"></i> Product</th>
						                    <th class="col-md-1"><i class="fa"></i> Quantity</th>
						                    <th class="col-md-1"><i class="fa fa-dollar"></i> Total</th> 
										</tr>
				                              	
				                        <?php if(isset($invoices) && is_array($invoices)): foreach($invoices as $row): if($row->sales_status != '0'):?> 
										<tr class="clickable-row" data-href="<?php echo base_url()?>sales/ordered_product/<?php echo $row->order_id?>">
											<td class="col-md-1"><?php echo $row->invoice_id ?></td>
											<td class="col-md-1"><?php echo $row->product_Name ?></td>
					                        <td class="col-md-1"><?php echo $row->qty_sold ?> <?php if($row->um == 'pc'){echo $row->um;?>s<?php } else{ echo $row->um;}?></td>
					                        <td class="col-md-1">Php <?php echo $row->total_sale?></b></td>
										</tr>	
										<?php 
										else:?>
										<tr class="conf clickable-row" data-href="<?php echo base_url()?>sales/ordered_product/<?php echo $row->order_id?>">
											<td class="col-md-1 b"><?php echo $row->invoice_id ?></td>
											<td class="col-md-1 b"><?php echo $row->product_Name ?></td>
					                        <td class="col-md-1 b"><?php echo $row->qty_sold ?> <?php if($row->um == 'pc'){echo $row->um;?>s<?php } else{ echo $row->um;}?></td>
					                        <td class="col-md-1 b">Php <?php echo $row->total_sale?></b></td>
										</tr>	
										<?php
										endif;
										endforeach;	                               
										endif;?> 
										
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
					</div>
					<!-- /Table -->
				
				</div>
			</div>
		</div>
		
	</div>
	
	
	<!-- ADD ORDER MODAL -->
	<div class="modal fade" id="addSalesInvoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="vertical-alignment-helper">
			<div class="modal-dialog vertical-align-center">
							
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title"><i class="fa flaticon"></i> Add Sales Invoice</h4>
					</div>
							
					<div class="modal-body">
					<form action="<?php echo base_url(); ?>sales/add_sales/<?php echo $r->invoice_code?>"  role="form" accept-charset="utf-8" method="post">
					
						<div class="col-lg-10">
							<div class="form-group">
							<label class="control-label">Product</label>
								
									<select name="class_ID" class="form-control" required>
										<option value="">Select Product</option>
										<?php if(!empty($products)){
											if (is_array($products)){                      
										 		foreach ($products as $row) {?>
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
								<input id="quantity" type="number" name="quantity" class="form-control inline" required>
							</div>
							
							<div class="col-lg-3">
								<label class="control-label">Total Amount</label>
								<input id="total_sale" type="number" name="total_sale" class="form-control inline" disabled>
								<input id="holding_cost" type="hidden" name="holding_cost" class="form-control inline">
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