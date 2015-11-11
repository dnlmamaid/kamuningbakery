
<div class="container bg-panel">
		<?php foreach ($rec as $r)?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-history"></i> Purchase Information</h1>
				<div class="col-lg-5 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa fa-archive"></i><a href="<?php echo base_url()?>purchases"> Purchases</a></li>
					<li><i class="fa fa-history"></i> Purchase Information</li>
				</ol>
				</div>
			</div>
		</div>

		
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-6 col-lg-offset-3 bg-panel2">
					<h1 align="center">Purchase Invoice</h1>
					<p align="center"><?php echo date('F d,Y (D) h:i A', strtotime($r->purchase_date))?></p>
					
					<div class="form-group">
						<div class="col-lg-12">
							<label>Reference ID: </label>
							<?php echo $r->reference?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-12">
							<label>Employee: </label>
							<?php echo $r->firstName?> <?php echo $r->lastName?>
						</div>
					</div>
					
					
				

					<div class="form-group">
						<div class="col-lg-12">
							<label>Product: </label>
							<?php echo $r->product_Name?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-12">
							<label>Supplier: </label>
							<?php echo $r->supplier_name ?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-12">
							<label>Quantity: </label>
							<?php echo $r->purchase_quantity?> <?php if($r->um == 'pc'){echo $r->um;?>s<?php } else{ echo $r->um;}?> 							
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-12">
							<label>Price per unit: </label>
							Php <?php echo $r->ppu?> per <?php echo $r->um; ?>
						</div>
					</div>
					
					<div class="form-group">
						<b><div class="col-lg-12">
							<label>Total: </label>
							Php <?php echo $r->ordering_cost?>
						</div></b>
					</div>
					
				
					<div class="form-group">
						<div class="col-lg-12">
							<a href="javascript:window.history.go(-1);" class="btn btn-default" style="align">Back</a>
						</div>
					</div>
	</div>
	
</div>


