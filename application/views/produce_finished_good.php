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
			<form class="form-group" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>products/produce">
			<h1>Finished Good Information</h1>
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
				<label class="col-lg-2 control-label" for="supplier_name">Name</label>
				<div class="col-lg-10">
					<input type="text" name="product_Name" class="form-control inline" value="" required>
					<input type="hidden" name="category_ID" class="form-control inline" value="1" required>
				</div>
			</div>
				
				
			<div id="materials" class="form-group">
				<div id="rm">
						
					<div class="col-lg-3">						
						<label class="control-label">Quantity</label>
						<input type="number" name="quantity" class="form-control inline" value="" required>
					</div>
					
					<div class="col-lg-6">
						<label class="control-label">Raw Material</label>
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
					</div>
						
					<div class="col-lg-3" style="margin-top:25px;">
						<button id="addButton" class="btn btn-theme" data-toggle="tooltip" data-placement="top" title="Add More" ><i class="fa fa-plus"></i></button>
						<button id="removeButton" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Remove One" ><i class="fa fa-minus"></i></button>
			     	</div>
				</div>	
			</div>
			
			<div class="form-group">
				<label class="control-label">Class</label>
				<div class="col-lg-10 input-group">
					
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
						<button class="btn btn-theme" data-toggle="modal" data-target="#addClass"><i class="fa fa-plus"></i></button>
		      		</span>
				</div>
			</div>
			
				
				
			<div class="form-group">
				<div class="col-lg-3">						
					<label class="control-label">Total Cost</label>
					<input type="number" name="price" class="form-control inline" value="" required>
				</div>
			</div>
				
			<div class="form-group">
				<div class="col-lg-4">
					<label for="terms">Description</label>
					<textarea name="description" class="form-control inline" required></textarea>
				</div>
			</div>
				
			<div class="form-group">
				<div class="col-lg-">
					<label class="control-label">Enabled</label>
					<select name="product_status" class="form-control" required>
						<option value="1" selected>Yes</option>
						<option value="0">No</option>
					</select>
				</div>
			</div>
				
		</div>
				
		<div class="col-lg-12">
				<div class="col-lg-12 form-group">
					<input type="submit" class="btn btn-success pull-right" value="Create" style="margin-left:5px;">
					<a href="<?php echo base_url()?>suppliers" class="btn btn-default pull-right">Back</a>
				</div>
			</div>
			</form>
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

