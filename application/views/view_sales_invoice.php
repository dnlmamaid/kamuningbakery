
<div class="container bg-panel">
		<?php foreach ($rec as $r)?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa flaticon-dollar91"></i> Sales Invoice</h1>
				<div class="col-lg-5 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa fa-dollar"></i><a href="<?php echo base_url()?>sales"> Sales</a></li>
					<li><i class="fa flaticon-dollar91"></i> Sales Invoice</li>
				</ol>
				</div>
			</div>
		</div>

		
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-6 col-lg-offset-3 bg-panel2">
					<h1 align="center">Sales Invoice</h1>
					<p align="center"><?php echo date('F d,Y (D) h:i A', strtotime($r->sales_date))?></p>
					
					<div class="form-group">
						<div class="col-lg-12">
							<label>Invoice Code: </label>
							<?php echo $r->invoice_code?>
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
							<label>Quantity: </label>
							<?php echo $r->total_quantity?> <?php if($r->um == 'pc'){echo $r->um;?>s<?php } else{ echo $r->um;}?> 							
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-12">
							<label>Price per unit: </label>
							Php <?php echo $r->sale_Price?> per <?php echo $r->um; ?>
						</div>
					</div>
					
					<div class="form-group">
						<b><div class="col-lg-12">
							<label>Total: </label>
							Php <?php echo $r->total_sales?>
						</div></b>
					</div>
					
				
					<div class="form-group">
						<div class="col-lg-12">
							<a href="<?php echo base_url()?>Sales" class="btn btn-default pull-right">Back</a>
						</div>
					</div>
	</div>
	
</div>


