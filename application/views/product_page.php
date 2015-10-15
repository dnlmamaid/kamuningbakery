
<div class="container bg-panel">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-cart-plus"></i> Create New Product</h1>
				<div class="col-lg-4 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa icon_cart"></i><a href="<?php echo base_url()?>inventory"> Inventory</a></li>
					<li><i class="fa fa-cart-plus"></i> Create New Product</li>
				</ol>
				</div>
			</div>
		</div>

		
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<form class="form-group" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>products/create">
				<h1>Product Information</h1>
				<?php if($this->session->flashdata('success')){?>
				<div class="form-group">
					<div class="alert alert-success" role="alert">
						<?php echo $this -> session -> flashdata('success'); ?>
					</div>
				</div>
				<?php } ?>
				<div class="col-lg-6">
					<div class="form-group">
						<label class="col-lg-2 control-label">Supplier</label>
						<div class="col-lg-6 input-group">
							<select name="class_ID" class="form-control" required>
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
								<button class="btn btn-theme" data-toggle="modal" data-target="#addClass"><i class="fa fa-plus"></i></button>
	      					</span>
						</div>
					</div>
				
					<div class="form-group">
						<label class="col-lg-2 control-label" for="supplier_name">Name</label>
						<div class="col-lg-10">
							<input type="text" name="product_Name" class="form-control inline" value="" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-2 control-label">Category</label>
						<div class="col-lg-6">
							<select name="category_ID" class="form-control" required>
							<option value=""></option>
							<?php if(!empty($cat)){
								if (is_array($cat)){                      
					            	foreach ($cat as $row) {?>
										<option value="<?php echo $row['category_id']?>"><?php echo $row['category_name']; ?></option>
									<?php }
								}
							}
													
							else{	?>
							<option value=""></option>
							<?php }?>
							</select>
							
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-2 control-label">Class</label>
						<div class="col-lg-6 input-group">
							<select name="class_ID" class="form-control" required>
							<option value=""></option>
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
								<button class="btn btn-theme" data-toggle="modal" data-target="#addClass"><i class="fa fa-plus"></i></button>
	      					</span>
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
							<label for="terms">Unit of Measurement</label>
							<input type="text" name="um" class="form-control inline" value="" required>
						</div>
					</div>
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

<!-- Modal -->
		<div class="modal fade" id="addClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Add New Product Classification</h4>
		      </div>
		      <div class="modal-body">
		        <form class="form-group" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>products/add_class">
		        	<div class="form-group">
							<label for="class_Name">Classification Name</label>
							<input type="text" name="class_Name" class="form-control">
					</div>
					
					<div class="form-group">
						<label for="is_active">Enabled</label>
				  		<select name="is_active" class="form-control">
							<option value="1">Yes</option>
							<option value="0">No</option>
						</select>
		      		</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <input type="submit" class="btn btn-success" value="ADD">
		       </form>
		      </div>
		    </div>
		  </div>
		</div>

