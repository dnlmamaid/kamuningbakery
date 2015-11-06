	<?php foreach($details as $r) ?>
	<div class="container bg-panel">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa flaticon-ingredients1" style=""></i> Processed Product Info</h1>
				<div class="col-lg-6 col-xs-12 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa icon_datareport"></i><a href="<?php echo base_url()?>production"> Production</a></li>
					<li><i class="fa flaticon-bill9"></i><a href="<?php echo base_url()?>production/production_batch/<?php echo $r->batch_reference?>"> Purchase Order</a></li>
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
										<label>Employee</label>
										<input type="text" name="user_id" class="form-control" value="<?php echo $r->lastName ?>, <?php echo $r->firstName ?>" disabled>
									</div>	
								</div>

								<div class="col-lg-3 col-xs-3 pull-right">
									<div class="form-group">
										<label>Date of Production</label>
										<input type="text" name="date_produced" class="form-control" value="<?php echo date('Y-m-d', strtotime($r->date_produced)) ?>" id="edate" disabled>
									</div>	
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-6 col-xs-6">
									<div class="form-group">
										<label>Reference ID</label>
										<input type="text" name="batch_id" class="form-control" value="<?php echo $r->batch_id ?>" style="text-transform: uppercase;" disabled>
									</div>
								</div>
							</div>
							
							
						</div>
					</div>
					
					<!-- details -->
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3 bg-panel2">
						
							<h3 align="center"><?php echo $r->product_Name?></h3>
							<p align="center"><b>Php</b> <?php echo $r->ppu?> per <?php echo $r->um?></p>
							<input type="hidden" name="product_id" class="form-control inline" value="<?php echo $r->product_id?>">
							<input type="hidden" name="batch_reference" class="form-control inline" value="<?php echo $r->batch_reference?>">
							<div class="row">
								<div class="col-lg-10 col-lg-offset-1">
									
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Price per unit </label>
											</div>
										</div>
										<div class="col-lg-4 pull-right">
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
										<div class="col-lg-4 pull-right">
											<div class="form-group">
												<label><?php echo $r->qty_produced?> <?php echo $r->um?></label>
												<input type="hidden" name="qty_produced" class="form-control inline" value="<?php echo $r->qty_produced?>">
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
												<label><?php echo $r->ordering_cost?></label>
												<input type="hidden" name="ordering_cost" class="form-control inline" value="<?php echo $r->ordering_cost?>">
											</div>
										</div>
									</div>
									
								</div>
							</div>
							<br>
							
								
						</div>
					</div>
					<!-- /details -->
					

				</div>
			</div>			
		</div>
		<!-- page end-->
	
	</div>
	
	
</div>
