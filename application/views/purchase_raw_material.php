<?php 
	$pg = $this->uri->segment('3');
	$body = $this->uri->segment('2');
	$head = $this->uri->segment('1');
?>
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
		
	
		
		<?php foreach($po as $r) ?>
		<!-- page start-->
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
			<form action="<?php echo base_url(); ?>purchases/add_order/<?php echo $purchase_reference?>?>"  role="form" accept-charset="utf-8" method="post">			
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
						<select name="supplier_id" class="form-control" required>
							<option value="<?php echo $r->supplier_id?>"><?php echo $r->supplier_name?></option>
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
		
	
	</div>
	
	
	
	

	
</div>
<!-- /#page-content-wrapper -->

