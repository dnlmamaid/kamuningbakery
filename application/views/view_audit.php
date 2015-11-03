
<div class="container bg-panel">
		<?php foreach ($rec as $r)?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-history"></i> Audit Information</h1>
				<div class="col-lg-4 col-xs-12 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa fa-archive"></i><a href="<?php echo base_url()?>audit_trail"> Audit Trail</a></li>
					<li><i class="fa fa-history"></i> Audit Information</li>
				</ol>
				</div>
			</div>
		</div>

		
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-6 col-lg-offset-3 col-xs-10 col-xs-offset-1 bg-panel">
					<h1 align="center">Details</h1>
					<div class="form-group">
						<div class="col-lg-12">
							<label for="supplier_name">User Involved: </label>
							<?php echo $r->firstName?> <?php echo $r->lastName?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-12">
							<label for="contact_Person">Module: </label>
							<?php echo $r->module?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-12">
							<label for="contact">Date Modified: </label>
							<?php echo date('F d,Y (D) h:i A', strtotime($r->date_created))?>
						</div>
					</div>
				
					<div class="form-group">
						<div class="col-lg-12">
							<label for="contact">Action: </label>
							<?php echo $r->remarks?>
						</div>
					</div>
					
					
					
					<div class="form-group">
						<div class="col-lg-12">
							<label for="contact">ID : </label>
							<?php echo $r->remark_id?>
						</div>
					</div>
				
				
					<div class="form-group">
						<div class="col-lg-12">
							<a href="<?php echo base_url()?>audit_trail" class="btn btn-default pull-right">Back</a>
						</div>
					</div>
	</div>
	
</div>


