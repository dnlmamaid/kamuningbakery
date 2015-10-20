	<div class="container bg-panel">
			
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-cart-plus"></i> Create Finished Goods</h1>
				<div class="col-lg-5 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa icon_cart"></i><a href="<?php echo base_url()?>inventory"> Inventory</a></li>
					<li><i class="fa fa-cart-plus"></i> Create Finished Goods</li>
				</ol>
				</div>
			</div>
		</div>
	
			
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<form action="<?php echo base_url(); ?>products/produce" accept-charset="utf-8" method="post">
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
					<h1 align="center">Product Information</h1>
					<div class="form-group">
						<label class="col-lg-2 control-label">Name</label>
						<div class="col-lg-10">
							<input type="hidden" name="supplier_ID" class="form-control inline" value="1" required>
							<input type="text" name="product_Name" class="form-control inline" value="" required>
							<input type="hidden" name="category_ID" class="form-control inline" value="1" required>
						</div>
					</div>
						
						
					<div id="materials" class="form-group">
						<div id="rm">
							
							<div class="col-lg-4 col-xs-3">						
								<label class="control-label">Quantity per Unit</label>
								<input type="number" name="quantity" class="form-control inline" value="" required>
							</div>
							
							
							<label class="control-label">Raw Material</label>
							<div class="col-lg-8 col-xs-9 input-group">
								<select name="rm_ID1" class="form-control" required>
									<option value="">Select Raw Material/s</option>
									<?php if(!empty($rm)){
										if (is_array($rm)){                      
							            	foreach ($rm as $row) {?>
							            		
											<option value="<?php echo $row['product_id']?>"><?php echo $row['product_Name']; ?></option>
											<?php }
										}
									}
																
									else{	?>
									<option value=""></option>
									<?php }?>
								</select>
								<span class="input-group-btn" style="margin-top:25px;">
									<button type="button" id="addButton" class="btn btn-theme" data-toggle="tooltip" data-placement="top" title="Add More" ><i class="fa fa-plus"></i></button>
									<button type="button"  id="removeButton" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Remove One" ><i class="fa fa-minus"></i></button>
						     	</span>
							</div>
							
						</div>	
					</div>
					
					
					
					<div class="form-group">
						<div class="col-lg-12">
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
							<label class="control-label">Total Cost</label>
							<input type="number" name="price" class="form-control inline" value="" disabled>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-4">						
							<label class="control-label">Quantity</label>
							<input type="number" name="price" class="form-control inline" value="" required>
						</div>
					</div>	
						
					
						
					<div class="form-group">
						<div class="col-lg-6">
							<label for="terms">Description</label>
							<textarea name="description" class="form-control inline" required></textarea>
						</div>
					</div>
						
					<div class="form-group">
						<div class="col-lg-2">
							<label class="control-label">Enabled</label>
							<select name="product_status" class="form-control" required>
								<option value="1" selected>Yes</option>
								<option value="0">No</option>
							</select>
						</div>
					</div>
					
					<div class="col-lg-12 pull-right">
						<input type="submit" class="btn btn-success pull-right" value="Produce" style="margin-left:5px;">
						</form>
						<a href="javascript:window.history.go(-1);" class="btn btn-default pull-right" style="align">Back</a>
					</div>
					
				</div>
					
			
			
			</div>
		</div>
		
	</div>


</div>
<!-- /#page-content-wrapper -->







