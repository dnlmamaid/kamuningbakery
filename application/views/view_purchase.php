
<div class="container bg-panel">
		<?php foreach ($rec as $r)?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-history"></i> Purchase Information</h1>
				<div class="col-lg-5 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa fa-archive"></i><a href="<?php echo base_url()?>purchases"> Purchases</a></li>
					<li><i class="fa fa-history"></i> Purchase Information</li>
				</ol>
				</div>
			</div>
		</div>

		
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-8 col-lg-offset-2 bg-panel">
					<div class="form-group">
						<div class="col-lg-12">
							<label for="Name">Employee: </label>
							<?php echo $r->firstName?> <?php echo $r->lastName?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-12">
							<label for="contact_Person">Reference No.: </label>
							<?php echo $r->reference?>
						</div>
					</div>
				

					<div class="form-group">
						<div class="col-lg-12">
							<label for="contact_Person">Product: </label>
							<?php echo $r->product_Name?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-12">
							<label for="contact">Supplier: </label>
							<?php echo $r->supplier_name ?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-12">
							<label for="contact">Quantity: </label>
							<?php echo $r->quantity?> <?php echo $r->um?>							
						</div>
					</div>
				
					<div class="form-group">
						<div class="col-lg-12">
							<label for="contact">Total: </label>
							Php <?php echo $r->total?>
						</div>
					</div>
					
				
					<div class="form-group">
						<div class="col-lg-12">
							<a href="<?php echo base_url()?>purchases" class="btn btn-default pull-right">Back</a>
						</div>
					</div>
	</div>
	
</div>


