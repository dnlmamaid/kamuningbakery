<?php $body = $this->uri->segment('2');
	  $head = $this->uri->segment('1'); ?>

<div class="container bg-panel">
		<?php foreach ($rec as $r)?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-lemon-o"></i> <?php echo $r->product_Name?></h1>
				<div class="col-lg-4 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa icon_cart"></i><a href="<?php echo base_url()?>inventory"> Inventory</a></li>
					<li><i class="fa fa-lemon-o"></i> <?php echo $r->product_Name?></li>
				</ol>
				</div>
			</div>
		</div>

		
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<form class="form-group" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>products/update/<?php echo $r->product_id?>">
					
				<h1>Product Information</h1>
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
				
				<div class="col-lg-6">
					
					<div class="form-group">
						<label class="col-lg-2 control-label">Supplier</label>
						<div class="col-lg-10 input-group">
							<select name="supplier_ID" class="form-control" required>
							<option value="<?php echo $r->supplier_id?>"><?php echo $r->supplier_name?></option>
							<?php if(!empty($supplier)){
								if (is_array($supplier)){                      
					            	foreach ($supplier as $row) {
					            		if($row['supplier_id'] != $r->supplier_ID){?>
											<option value="<?php echo $row['supplier_id']?>"><?php echo $row['supplier_name']; ?></option>
									<?php } }
								}
							}
														
							else{	?>
							<option value=""></option>
							<?php }?>
							</select>
							<span class="input-group-btn">
								<button class="btn btn-theme" data-toggle="modal" data-target="#addSupplier"><i class="fa fa-plus"></i></button>
			     			</span>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="supplier_name">Product Name</label>
						<div class="col-lg-9">
							<input type="text" name="product_Name" class="form-control inline" value="<?php echo $r->product_Name?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-2 control-label">Category</label>
						<div class="col-lg-10">
							<select name="category_ID" class="form-control" required>
							<option value="<?php echo $r->category_id?>"><?php echo $r->category_name?></option>
							<?php if(!empty($cat)){
								if (is_array($cat)){                      
						            foreach ($cat as $row) {
						            	if($row['category_id'] != $r->category_ID){?>
										<option value="<?php echo $row['category_id']?>"><?php echo $row['category_name']; ?></option>
									<?php } }
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
						<div class="col-lg-10 input-group">
							<select name="class_ID" class="form-control" required>
							<option value="<?php echo $r->class_ID?>"><?php echo $r->class_Name?></option>
							<?php if(!empty($cls)){
								if (is_array($cls)){                      
						 	      	foreach ($cls as $row) {
						 	      		if($row['class_id'] != $r->class_ID){?>
										<option value="<?php echo $row['class_id']?>"><?php echo $row['class_Name']; ?></option>
									<?php } }
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
					
					
				</div>
									
				<div class="col-lg-6">
					
					<div class="form-group">
						<div class="col-lg-3 col-xs-3">						
							<label class="control-label">Quantity</label>
							<input type="number" name="quantity" class="form-control inline" value="<?php echo $r->quantity?>" disabled>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-3 col-xs-3">
							<label class="control-label">Unit</label>
							<input type="text" name="um" class="form-control inline" value="<?php echo $r->um?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-3 col-xs-3">
							<label class="control-label">Price per unit</label>
							<input type="number" name="price" class="form-control inline" value="<?php echo $r->price?>" required>
						</div>
					</div>
						
					<?php if($r->category_id == '1'){?>
					<div class="form-group">
						<div class="col-lg-3 col-xs-3">
							<label class="control-label">Selling Price</label>
							<input type="number" name="price" class="form-control inline" value="<?php echo $r->price?>" required>
						</div>
					</div>
					<?php } ?>
					
					<div class="form-group">
						<div class="col-lg-12 col-lg-12">
							<label class="control-label">Description</label>
							<textarea name="description" class="form-control inline" required><?php echo $r->description?></textarea>
						</div>
					</div>
				
								
						
					<div class="form-group">
						<div class="col-lg-3">
							<label class="control-label">Enabled</label>
					  		<select name="product_status" class="form-control" required>
					  			<?php if($r->product_status){?> 
								<option value="1" selected>Yes</option>
								<option value="0">No</option>
								<?php } else{?>
								<option value="0" selected>No</option>
								<option value="1">Yes</option>
								<?php }?>
							</select>
						</div>
					</div>										
					
				</div>		
				
				<div class="col-lg-12">
					<div class="col-lg-12 form-group">
						<button class="btn btn-caution pull-right" data-toggle="modal" data-target="#purchaseOrder" style="margin-left:5px;"><i class="fa fa-plus"></i> Order</button>
						<input type="submit" class="btn btn-success pull-right" value="Update" style="margin-left:5px;">
						<a href="<?php echo base_url()?>products" class="btn btn-default pull-right">Back</a>
					</div>
				</div>
				
				</form>
			</div>
		</div>
	
	
</div>

<div class="modal fade" id="addSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="vertical-alignment-helper">
	<div class="modal-dialog vertical-align-center">
		
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-briefcase"></i> Create New Supplier Form</h4>
			</div>
		
			<div class="modal-body">
			<form class="form-group" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>suppliers/add">
				
				<div class="form-group">
					<div class="col-lg-6 col-xs-6">
						<label for="firstName">Supplier</label>
						<input type="text" name="supplier_name" class="form-control inline" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-6 col-xs-6">
						<label for="lastName">Contact Person</label>
						<input type="text" name="contact_Person" class="form-control inline" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-8 col-xs-8">
						<label for="lastName">Address</label>
						<input type="text" name="st_Address" class="form-control inline" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-4 col-xs-4">
						<label for="lastName">City</label>
						<input type="text" name="city" class="form-control inline" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-8 col-xs-8">
						<label for="lastName">Contact</label>
						<input type="text" name="contact" class="form-control inline" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-8 col-xs-8">
						<label for="lastName">Terms</label>
						<textarea name="terms" class="form-control inline" required></textarea>
					</div>
				</div>
				
			</div>
			
			
			<div class="modal-footer">
				<div class="form-group">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</div>
			
		</form>
		</div>
		
	</div>
	</div>
</div>

<div class="modal fade" id="purchaseOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="vertical-alignment-helper">
	<div class="modal-dialog vertical-align-center">
		
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-briefcase"></i> Purchase Order Form</h4>
			</div>
		
			<div class="modal-body">
			<form class="form-group" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>suppliers/add">
				
				<div class="form-group">
					<div class="col-lg-6 col-xs-6">
						<label for="firstName"> Quantity</label>
						<input type="text" name="supplier_name" class="form-control inline" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-8 col-xs-8">
						<label for="lastName"> Price Per unit</label>
						<input type="text" name="contact" class="form-control inline" required>
					</div>
				</div>
				
			</div>
			
			
			<div class="modal-footer">
				<div class="form-group">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</div>
			
		</form>
		</div>
		
	</div>
	</div>
</div>
