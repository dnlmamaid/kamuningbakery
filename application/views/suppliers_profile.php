
<div class="container bg-panel">
		<?php foreach ($rec as $r)?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-truck"></i> <?php echo $r->supplier_name?></h1>
				<div class="col-lg-4 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa fa-briefcase"></i><a href="<?php echo base_url()?>suppliers"> Suppliers</a></li>
					<li><i class="fa fa-truck"></i> <?php echo $r->supplier_name?></li>
				</ol>
				</div>
			</div>
		</div>

		
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<form class="form-group" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>suppliers/update/<?php echo $r->supplier_id?>">
				<h1>Supplier Information</h1>
				<?php if($this->session->flashdata('success')){?>
				<div class="form-group">
					<div class="alert alert-success" role="alert">
						<?php echo $this -> session -> flashdata('success'); ?>
					</div>
				</div>
				<?php } ?>
				<div class="col-lg-6">
				<div class="form-group">
					<div class="col-lg-12">
						<label for="supplier_name">Supplier</label>
						<input type="text" name="supplier_name" class="form-control inline" value="<?php echo $r->supplier_name?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-6 col-xs-6">
						<label for="contact_Person">Contact Person</label>
						<input type="text" name="contact_Person" class="form-control inline" value="<?php echo $r->contact_Person?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-6 col-xs-6">
						<label for="contact">Contact</label>
						<input type="text" name="contact" class="form-control inline" value="<?php echo $r->contact?>" required>
					</div>
				</div>
				
				
				<div class="form-group">
					<div class="col-lg-8 col-xs-8">
						<label for="st_Address">Address</label>
						<input type="text" name="st_Address" class="form-control inline" value="<?php echo $r->st_Address?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-4 col-xs-4">
						<label for="city">City</label>
						<input type="text" name="city" class="form-control inline" value="<?php echo $r->city?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-6">
						<label for="terms">Terms</label>
						<textarea name="terms" class="form-control inline" required><?php echo $r->terms?></textarea>
					</div>
				</div>
				</div>
				<div class="col-lg-6">
				<h3>Supplied Products</h3>
				</div>
				
				
				<div class="form-group">
					<div class="col-lg-12">
						<input type="submit" class="btn btn-success pull-right" value="Update" style="margin-left:5px;">
						<a href="<?php echo base_url()?>suppliers" class="btn btn-default pull-right">Back</a>
					</form>
				</div>
		</div>
	</div>
	
</div>


