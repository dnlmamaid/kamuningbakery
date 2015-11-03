	<div class="container bg-panel">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-comment-o" style=""></i> Request Order</h1>
				<div class="col-lg-5 col-xs-12 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa fa-comments-o"></i><a href="<?php echo base_url()?>requests"> Requests</a></li>
					<li><i class="fa fa-comment-o"></i> Request Order</li>
				</ol>
				</div>
			</div>
		</div>
		
		<?php foreach($ro as $r) ?>
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
							<?php if(!$r->ro_status) { ?>
							
							<h3>Details</h3>
							<div class="row">
								<div class="col-lg-5 col-xs-7">
									<div class="form-group">
										<label>Requested By</label>
										<input type="text" name="user_id" class="form-control" value="<?php echo $r->lastName?>, <?php echo $r->firstName?>" disabled>
									</div>
									
									
								</div>

								<div class="col-lg-3 col-xs-5 pull-right">
									<div class="form-group">
										<label>Date Requested</label>
										<input type="text" name="request_date" class="form-control" value="<?php echo date('Y-m-d', strtotime($r->request_date)) ?>" disabled>
									</div>	
								</div>
								
							</div>
							
							<div class="row">
								<div class="col-lg-6 col-xs-6">
									<div class="form-group">
										<label>Reference ID</label>
										<input type="text" name="ro_id" class="form-control" value="<?php echo $r->ro_id ?>" style="text-transform: uppercase;" disabled>
									</div>
								</div>
								
								<div class="col-lg-3 col-xs-3 pull-right">
									<div class="form-group">
										<label>Status</label>
										<select name="request_status" class="form-control">
											<option value="0" selected>For Review</option>
											<option value="1">Approved</option>
										</select>
									</div>
								</div>
								
								
							</div>
							<div class="row">
								<div class="col-lg-2 pull-right">
									<div class="form-group">
										<span data-toggle="modal" data-target="#addOrder">
											<a type="button" class="btn btn-caution" data-toggle="tooltip" data-placement="top" title="Add a Product"><i class="fa fa-plus"></i><a>
										</span>
										<a href="#" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancel Request"><i class="fa fa-close"></i><a>
									</div>
								</div>
							</div>
							<?php } else if($r->ro_status){?>
							<form action="<?php echo base_url(); ?>requests/accept/<?php echo $r->request_id?>"  role="form" accept-charset="utf-8" method="post">
							<h3>Details</h3>
							
							<div class="row">

								<div class="col-lg-3 col-xs-5 pull-right">
									<div class="form-group">
										<label>Date of Delivery</label>
										<input type="text" name="request_date" class="form-control" value="<?php echo date('Y-m-d', strtotime($r->request_date)) ?>" id="datep" disabled>
									</div>	
								</div>
								
							</div>
							
							<div class="row">
								<div class="col-lg-6 col-xs-6">
									<div class="form-group">
										<label>Reference ID</label>
										<input type="text" name="ro_id" class="form-control" value="<?php echo $r->ro_id ?>" style="text-transform: uppercase;" disabled>
										
									</div>
								</div>
								
								<div class="col-lg-3 col-xs-3 pull-right">
									<div class="form-group">
										<label>Status</label>
										<select name="request_status" class="form-control" disabled>
											<?php if($r->ro_status == '0'):?>
											<option value="0" selected>On Process</option>
											<?php else: ?>
											<option value="1">Delivered</option>
											<?php endif;?>
										</select>
									</div>
								</div>
								
							</div>
							
							<?php if($r->ro_status == '0'):?>
							<div class="row">
								<div class="col-lg-1 pull-right">
									<div class="form-group">
									<input type="submit" class="btn btn-success fa" data-toggle="tooltip" data-placement="top" title="Clear Order" value="&#xF00c;">									
									</div>
								</div>
							</div>
							</form>
							<?php endif; ?>
							<?php } ?>
							
						</div>
					</div>
								
					
					<!-- Table -->
					<div class="row">
						
						<section class="col-lg-12 panel">
						<h3>Requested Products</h3>	
							<div class="table-responsive"> 
								<table class="table table-advance table-hover">
									<tbody>
										<tr>
											<th class="col-md-1"><i class="fa fa-barcode"></i> Request ID</th>
											<th class="col-md-1"><i class="fa flaticon-ingredients1"></i> Product</th>
						                    <th class="col-md-1"><i class="fa fa-truck"></i> Quantity</th>
										</tr>
				                              	
				                        <?php if(isset($orders) && is_array($orders)): foreach($orders as $row): if($row->ro_status != '0'):?> 
										<tr class="clickable-row" data-href="<?php echo base_url()?>requests/product_request/<?php echo $row->order_id?>">
											<td class="col-md-1"><?php echo $row->ro_id ?></td>
											<td class="col-md-1"><?php echo $row->product_Name ?></td>
					                        <td class="col-md-1"><?php echo $row->request_qty ?> <?php if($row->um == 'pc'){echo $row->um;?>s<?php } else{ echo $row->um;}?></td>
					                        
										</tr>	
										<?php 
										else:?>
										<tr class="conf clickable-row" data-href="<?php echo base_url()?>requests/product_request/<?php echo $row->order_id?>">
											<td class="col-md-1 b"><?php echo $row->ro_id ?></td>
											<td class="col-md-1 b"><?php echo $row->product_Name ?></td>
					                        <td class="col-md-1 b"><?php echo $row->request_qty ?> <?php if($row->um == 'pc'){echo $row->um;?>s<?php } else{ echo $row->um;}?></td>
					                        
										</tr>	
										<?php
										endif;
										endforeach;	                               
										endif;?> 
										
										<tr>
											<td class="col-md-1"><b>Total Amount</b></td>
										   	<td class="col-md-1"></td>
										   	<td class="col-md-1"><b><?php echo $to->total?></b></td>	
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
	
	
	<!-- ADD REQUEST MODAL -->
	<div class="modal fade" id="addOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="vertical-alignment-helper">
			<div class="modal-dialog vertical-align-center">
							
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title"><i class="fa flaticon-ingredients1"></i> Add Product Request Form</h4>
					</div>
							
					<div class="modal-body">
					<form action="<?php echo base_url(); ?>requests/add_order/<?php echo $r->ro_id?>"  role="form" accept-charset="utf-8" method="post">
					
					
						<div class="form-group">
							<div class="col-lg-10 col-xs-7">
								<label> Product</label>
								<select name="product_id" class="form-control">
								<?php if(!empty($prod)){
									if (is_array($prod)){                      
										foreach ($prod as $row) {?>
											<option value="<?php echo $row['product_id']?>"><?php echo $row['product_Name']; ?></option>
										<?php }
									}
								}?>											
							</div>
						</div>
					
						
						
						<div class="form-group">
							<div class="col-lg-3">
								<label>Quantity</label>
								<input type="number" step="any" name="request_qty" class="form-control inline" required>
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