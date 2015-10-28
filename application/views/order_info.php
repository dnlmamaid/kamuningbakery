	<?php foreach($po as $r) ?>
	<div class="container bg-panel">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-info" style=""></i> Order Info</h1>
				<div class="col-lg-6 col-xs-12 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa icon_datareport"></i><a href="<?php echo base_url()?>purchases"> Purchases</a></li>
					<li><i class="fa flaticon-ingredients1"></i><a href="<?php echo base_url()?>purchases/purchase_order/<?php echo $r->order_reference?>"> Purchase Order</a></li>
					<li><i class="fa fa-info"></i> Order Info</li>
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
												<option value="<?php echo $r->supplier_ID?>"><?php echo $r->supplier_name?></option>
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
					
						</div>
					</div>
					
					<!-- details -->
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3 bg-panel2">
						<form action="<?php echo base_url()?>purchases/receive/<?php echo $r->order_id?>" role="form" accept-charset="utf-8" method="post">
							<h3 align="center"><?php echo $r->product_Name?></h3>
							<p align="center"><b>Php</b> <?php echo $r->ppu?> per <?php echo $r->um?></p>
							<input type="hidden" name="product_id" class="form-control inline" value="<?php echo $r->product_id?>">
							<input type="hidden" name="order_reference" class="form-control inline" value="<?php echo $r->order_reference?>">
							<div class="row">
								<div class="col-lg-10 col-lg-offset-1">
									
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Price per unit </label>
											</div>
										</div>
										<div class="col-lg-3 pull-right">
											<div class="form-group">
												<label><?php echo $r->ppu?></label>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Quantity </label>
											</div>
										</div>
										<div class="col-lg-3 pull-right">
											<div class="form-group">
												<label><?php echo $r->order_quantity?></label>
												<input type="hidden" name="order_quantity" class="form-control inline" value="<?php echo $r->order_quantity?>">
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Total Amount </label>
											</div>
										</div>
										<div class="col-lg-3 pull-right">
											<div class="form-group">
												<label><?php echo $r->ordering_cost?></label>
											</div>
										</div>
									</div>
									
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-12">
									<div class="col-lg-4 pull-right">
										<div class="form-group">
											<?php if($r->order_status != '1'){?>
											<a class="btn btn-danger" href="<?php echo base_url()?>purchases/cancel_order/<?php echo $r->order_id?>" onclick="return confirm('Action can not be undone, proceed?');"   data-toggle="tooltip" data-placement="left" title="Cancel Order"><i class="icon_close_alt2"></i></a>
											<input type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Receive Order">
											<?php }?>
										</div>
									</div>
								</div>
							</div>	
						</form>		
						</div>
					</div>
					<!-- /details -->
					

				</div>
			</div>			
		</div>
		<!-- page end-->
	
	</div>
	
	
</div>
