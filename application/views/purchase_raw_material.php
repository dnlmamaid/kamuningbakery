
	<div class="container bg-panel">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-lemon-o"></i> Purchase Raw Material</h1>
				<div class="col-lg-5 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa icon_cart"></i><a href="<?php echo base_url()?>inventory"> Inventory</a></li>
					<li><i class="fa fa-lemon-o"></i> Purchase Raw Material</li>
				</ol>
				</div>
			</div>
		</div>
	
	
		
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
		
			<form action="<?php echo base_url(); ?>products/purchase"  role="form" accept-charset="utf-8" method="post">			
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
			
			<div class="col-lg-6 col-lg-offset-3 bg-panel2">
				<h1 align="center">Raw Material Information</h1>
				<div class="form-group">
					<div class="col-lg-12">
						<label>Supplier</label>
						<div class="input-group">
						<select name="supplier_ID" class="form-control" required>
							<option value=""></option>
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
			
			
				<div class="form-group">
					<div class="col-lg-12">
					<label class="control-label">Name</label>
					<input type="text" name="product_Name" class="form-control inline" value="" required>
					<input type="hidden" name="category_ID" class="form-control inline" value="2" required>
					</div>
				</div>
	
				<div class="form-group">
					<div class="col-lg-10">
					<label class="control-label">Class</label>
						<div class="input-group">
							<select name="class_ID" class="form-control" required>
								<option value="">Select Class</option>
								<?php if(!empty($cls)){
									if (is_array($cls)){                      
								 		foreach ($cls as $row) {?>
											<option value="<?php echo $row['class_id']?>"><?php echo $row['class_Name']; ?></option>
										<?php }
									}							
								}
															
								else{	?>
								<option value=""></option>
								<?php }?>
							</select>
							<span class="input-group-btn">
								<button type="button" class="btn btn-theme" data-toggle="modal" data-target="#addClass"><i class="fa fa-plus"></i></button>
					    	</span>
						</div>
					</div>
				</div>
			
		
			
				<div class="form-group">
					<div class="col-lg-4">
						<label class="control-label">Quantity</label>
						<input type="number" name="quantity" class="form-control inline" value="" required>
					</div>
					
					<div class="col-lg-4">
						<label class="control-label">Unit</label>
						<input type="text" name="um" class="form-control inline" value="" required>
					</div>
					
					<div class="col-lg-4">
					<label class="control-label">Price per unit</label>
					<input type="number" step="0.001" name="price" class="form-control inline" value="" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-9">
					<label class="control-label">Description</label>
					<textarea name="description" class="form-control inline" value="" required></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-3">
						<label for="is_active">Enabled</label>
						<select name="product_status" class="form-control">
							<option value="1">Yes</option>
							<option value="0">No</option>
						</select>
					</div>
				</div>
								
			
				<!-- Page Form -->
				<div class="form-group">	
					<div class="col-lg-12 pull-right">
						
						<input type="submit" class="btn btn-success pull-right" value="Order" style="margin-left:5px;">
						<a href="javascript:window.history.go(-1);" class="btn btn-default pull-right">Back</a>
					</form>	
						
					</div>
				</div>
			</div>
					
			
			
				
				
			</div>
		</div>
		<!-- page end-->
	
	</div>
	
</div>
<!-- /#page-content-wrapper -->

