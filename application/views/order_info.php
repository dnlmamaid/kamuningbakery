	<?php foreach($po as $r) ?>
	<div class="container bg-panel">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa flaticon-ingredients1" style=""></i> Order Info</h1>
				<div class="col-lg-6 col-xs-12 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa icon_datareport"></i><a href="<?php echo base_url()?>purchases"> Purchases</a></li>
					<li><i class="fa flaticon-bill9"></i><a href="<?php echo base_url()?>purchases/purchase_order/<?php echo $r->order_reference?>"> Purchase Order</a></li>
					<li><i class="fa flaticon-ingredients1"></i> Order Info</li>
				</ol>
				</div>
			</div>
		</div>
		
		<!-- page start-->
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
										
											<select name="supplier_ID" class="form-control" disabled>
												<option value="<?php echo $r->supplier_id?>"><?php echo $r->supplier_name?></option>
												<?php if(!empty($supplier)){
													if (is_array($supplier)){                      
														foreach ($supplier as $row) {
													    	if($row['supplier_id'] != $r->supplier_ID){ ?>
																<option value="<?php echo $row['supplier_id']?>"><?php echo $row['supplier_name']; ?></option>
															<?php } 
														}
													}
												}
																						
												else{	?>
												<option value=""></option>
												<?php }?>
											</select>
											
										
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
								
								<div class="col-lg-3 col-xs-4 pull-right">
									<div class="form-group">
										<label>Status</label>
										<select name="purchase_status" class="form-control" disabled>
											<?php if($r->po_status == '1'):?>
											<option value="1"selected>Delivered</option>
											<?php else:?>
											<option value="0" selected>On Process</option>
											<?php endif;?>
											
										</select>
									</div>
								</div>
							</div>
					
						</div>
					</div>
					
					<!-- details -->
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3 bg-panel2">
						<form action="<?php echo base_url()?>purchases/update_order_info/<?php echo $r->order_id?>" role="form" accept-charset="utf-8" method="post">
							<h3 align="center"><?php echo $r->product_Name?></h3>
							<p align="center"><b>&#8369;</b> <?php echo round($r->ppu, 2)?> per <?php echo $r->um?></p>
							
							<div class="row">
								<div class="col-lg-10 col-lg-offset-1">
									<?php if($r->order_status != '1'): ?>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Price per unit </label>
											</div>
										</div>
										<div class="col-lg-4 pull-right">
											<div class="form-group">
												<input type="number" step="any" name="price" class="form-control inline" value="<?php echo $r->ppu?>" required>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Quantity </label>
											</div>
										</div>
										<div class="col-lg-4 pull-right">
											<div class="form-group">
												<input type="number" name="order_quantity" class="form-control inline" value="<?php echo $r->order_quantity?>" required>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Total Amount </label>
											</div>
										</div>
										<div class="col-lg-4 pull-right">
											<div class="form-group">
												<label>&#8369; <?php echo $r->ordering_cost?></label>
											</div>
										</div>
									</div>
									<?php else: ?>
									
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Price per unit </label>
											</div>
										</div>
										<div class="col-lg-4 pull-right">
											<div class="form-group">
												<label>&#8369; <?php echo $r->ppu?></label>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Quantity </label>
											</div>
										</div>
										<div class="col-lg-4 pull-right">
											<div class="form-group">
												<label><?php echo $r->order_quantity?> <?php if($r->um == 'pc'){echo $r->um;?>s<?php } else{ echo $r->um;}?></label>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Total Amount </label>
											</div>
										</div>
										<div class="col-lg-4 pull-right">
											<div class="form-group">
												<label>&#8369; <?php echo $r->ordering_cost?></label>
											</div>
										</div>
									</div>
									<?php endif; ?>
									<div class="row" style="margin-top:50px;">
										
										<div class="col-lg-4 pull-left">
											<div class="form-group">
												<?php if($r->order_status != '1'): ?>
												<input type="submit" class="btn btn-caution" value="Update Info" data-toggle="tooltip" data-placement="top" title="Update Order Information">
												<?php endif; ?>
											</div>
										</div>
										</form>
										
										<div class="col-lg-4 align-center">
											<div class="form-group">
												<?php if($r->order_status != '1'){?>
												<form action="<?php echo base_url()?>purchases/receive/<?php echo $r->order_id?>" role="form" accept-charset="utf-8" method="post">
													<input type="hidden" name="product_id" value="<?php echo $r->product_id?>">
													<input type="hidden" name="order_reference" value="<?php echo $r->order_reference?>">
													<input type="hidden" name="ppu" value="<?php echo $r->ppu?>">
													<input type="hidden" name="order_quantity" value="<?php echo $r->order_quantity?>">
													<input type="hidden" name="ordering_cost" value="<?php echo $r->ordering_cost?>">
												
													<a class="btn btn-danger fa" href="<?php echo base_url()?>purchases/cancel_order/<?php echo $r->order_id?>" onclick="return confirm('Action can not be undone, proceed?');"   data-toggle="tooltip" data-placement="top" title="Cancel Order"><i class="fa fa-close"></i></a>
													<input type="submit" class="btn btn-success fa" data-toggle="tooltip" data-placement="top" title="Receive Order" value="&#xf00c;"><!--,  [&#xf058;], [&#xf05d;] -->
													
												</form>
												<?php } ?>
												
											</div>
											
											
										</div>
										
										
										<div class="col-lg-4 pull-right">
											<div class="form-group">
												<a href="javascript:window.history.go(-1);" data-toggle="tooltip" data-placement="top" title="Back to Purchase Order" class="btn btn-default" style="align">Back</a>
											</div>
										</div>
								
									</div>
									
									
									
								</div>
							</div>
						
								
						</div>
					</div>
					<!-- /details -->
					

				</div>
			</div>			
		</div>
		<!-- page end-->
	
	</div>
	
	
</div>
