	<?php foreach($po as $r) ?>
	<div class="container bg-panel">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa flaticon-ingredients1" style=""></i> Request Info</h1>
				<div class="col-lg-6 col-xs-12 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa fa-comments-o"></i><a href="<?php echo base_url()?>requests"> Requests</a></li>
					<li><i class="fa fa-comment-o"></i><a href="<?php echo base_url()?>requests/request_order/<?php echo $r->request_reference?>"> Request Order</a></li>
					<li><i class="fa flaticon-ingredients1"></i> Request Info</li>
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
										<input type="text" name="request_reference" class="form-control" value="<?php echo $r->request_reference ?>" style="text-transform: uppercase;" disabled>
									</div>
								</div>
								
								<div class="col-lg-3 col-xs-4 pull-right">
									<div class="form-group">
										<label>Status</label>
										<select name="purchase_status" class="form-control" disabled>
											<?php if($r->ro_status == '1'):?>
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
						<form action="<?php echo base_url()?>requests/receive/<?php echo $r->ro_id?>" role="form" accept-charset="utf-8" method="post">
							<h3 align="center"><?php echo $r->product_Name?></h3>
							<p align="center"><b>Php</b> <?php echo $r->price?> per <?php echo $r->um?></p>
							<input type="hidden" name="product_id" class="form-control inline" value="<?php echo $r->product_id?>">
							<input type="hidden" name="request_reference" class="form-control inline" value="<?php echo $r->request_reference?>">
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
												<label><?php echo $r->price?></label>
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
												<label><?php echo $r->request_qty?> <?php echo $r->um?></label>
												<input type="hidden" name="request_qty" class="form-control inline" value="<?php echo $r->request_qty?>">
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Total Amount </label>
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
											<?php if($r->ro_status != '1'){?>
											<a class="btn btn-danger fa" href="<?php echo base_url()?>requests/cancel_order/<?php echo $r->ro_id?>" onclick="return confirm('Action can not be undone, proceed?');"   data-toggle="tooltip" data-placement="left" title="Cancel Order"><i class="fa fa-close"></i></a>
											<input type="submit" class="btn btn-success fa" data-toggle="tooltip" data-placement="right" title="Receive Order" value="&#xF00c;">
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
