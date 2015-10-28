<?php $body = $this->uri->segment('2');
	  $head = $this->uri->segment('1'); ?>
	<?php foreach ($rec as $r)?>
	<div class="container bg-panel">
			
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header"><i class="fa fa-lemon-o"></i> Product Information</h1>
					<div class="col-lg-6 col-xs-12 pull-left">
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url()?>"> Home</a></li>
						<?php if ($r->category_ID == '1') {?>
						<li><i class="fa icon_cart"></i><a href="<?php echo base_url()?>inventory/finished_goods"> Inventory</a></li>
						<?php } else if ($r->category_ID == '2') {?>
						<li><i class="fa icon_cart"></i><a href="<?php echo base_url()?>inventory/raw_materials"> Inventory</a></li>
						<?php }?>
						<li><i class="fa fa-lemon-o"></i> Product Information</li>
					</ol>
					</div>
					
						<?php if ($r->category_ID == '1') {?>
					<div class="col-lg-2 pull-right">
						<span data-toggle="modal" href="#salesOrder" ><a alt="Sell" data-toggle="tooltip" data-placement="top" title="Sell" class="btn btn-theme"><i class="fa fa-dollar"></i></a></span>
						<span data-toggle="modal" href="#produce" ><a alt="Produce" data-toggle="tooltip" data-placement="top" title="Produce" class="btn btn-caution"><i class="fa fa-plus"></i></a></span>
						<?php } else if ($r->category_ID == '2') {?>
					<div class="col-lg-1 pull-right">
							<span data-toggle="modal" href="#purchaseOrder" ><a alt="Produce" data-toggle="tooltip" data-placement="top" title="Produce" class="btn btn-caution"><i class="fa fa-plus"></i></a></span>
						<?php }?>
					</div>
				</div>
			</div>
	
			
			<!-- page start-->
			<div class="row">
				<div class="col-lg-12">
					<form class="form-group" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>products/update/<?php echo $r->product_id?>">
					<!-- PRODUCT INFO -->
					<h1><?php echo $r->product_Name?></h1>
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
<?php if ($r->category_ID == '2') {?>
					<div class="col-lg-6 bg-panel2">
						<h3>Details</h3>
						<div class="form-group">
							<label class="col-lg-3 control-label">Supplier</label>
							<div class="col-lg-8 input-group">
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
									<button type="button" class="btn btn-theme" data-toggle="modal" data-target="#addSupplier"><i class="fa fa-plus"></i></button>
				     			</span>
							</div>
						</div>
						
						<div class="form-group" style="margin-top:10px;">
							<label class="col-lg-3 control-label" for="supplier_name">Product Name</label>
							<div class="col-lg-8">
								<input type="text" name="product_Name" class="form-control inline" value="<?php echo $r->product_Name?>" required>
							</div>
						</div>
						<div class="form-group">
							<p class="col-lg-12" style="color:red; font-weight:bold;">WARNING : THIS WILL CONVERT EVERY QUANTITY</p>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Category</label>
							<div class="col-lg-8">
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
							<label class="col-lg-3 control-label">Class</label>
							<div class="col-lg-8 input-group">
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
									<button type="button" class="btn btn-theme" data-toggle="modal" data-target="#addClass"><i class="fa fa-plus"></i></button>
				      			</span>
							</div>
						</div>
						
						<div class="form-group" style="margin-top:10px;">
							<div class="col-lg-3 col-xs-3">						
								<label class="control-label">Quantity</label>
								<input type="number" name="quantity" class="form-control inline" value="<?php echo $r->current_count ?>" disabled>
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
								<input type="number" step="0.01" name="price" class="form-control inline" value="<?php echo $r->price?>">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-lg-3 col-xs-3">
								<label class="control-label">Holding Cost Per Unit</label>
								<input type="number" step="0.01" name="holding_cost" class="form-control inline" value="<?php echo $r->holding_cost?>">
							</div>
						</div>
				
						<div class="form-group">
							<div class="col-lg-8">
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
						
						<div class="col-lg-12 form-group">
							<input type="submit" class="btn btn-success pull-right" value="Update" style="margin-left:5px;">
							</form>
							<a href="javascript:window.history.go(-1);" class="btn btn-default pull-right" style="align">Back</a>
						</div>		
						
					</div>
					
					<div class="col-lg-6">
						<h3>Purchases</h3>
						<div class="table-responsive"> 
							<table class="table table-advance">
								<tbody>
									<tr>
										<th class="col-md-1"><i class="fa fa-barcode"></i> Reference No.</th>
					                    <th class="col-md-1"><i class="fa fa-truck"></i> Supplier</th>
				                        <th class="col-md-1"><i class="fa fa-tag"></i> Quantity</th>
				                        <th class="col-md-1"><i class="fa fa-dollar"></i> Total</th>
				                        <th class="col-md-2"><i class="fa fa-clock-o"></i> Date</th>
			                       	</tr>
			                              	
			                        <?php if(isset($purchases) && is_array($purchases)) : foreach($purchases as $row): ?> 
									<tr class="conf clickable-row" data-href="<?php echo base_url()?>purchases/purchase_invoice/<?php echo $row['purchase_id']?>">
										<td class="col-md-1"><?php echo $row['reference'] ?></td>
										<td class="col-md-1"><?php echo $row['supplier_name'] ?></td>
		                                <td class="col-md-1"><?php echo $row['purchase_quantity'] ?> <?php if($row['um'] == 'pc'){echo $row['um'];?>s<?php } else{ echo $row['um'];}?></td>
		                                <td class="col-md-1"><?php echo $row['ordering_cost']?></td>
		                                <td class="col-md-2"><?php echo date('F d,Y (D) h:i A', strtotime($row['purchase_date']))?></td>
									</tr>	
									<?php endforeach;	                               
									else:?>
									<tr>											
										<th>No records</th>
										<th>No records</th>
										<th>No records</th>
										<th>No records</th>
										<th>No records</th>
									</tr>
									<?php endif; ?>      
			                        
								</tbody>
							</table>
						</div>
					</div>
<?php } else if ($r->category_ID == '1') {?>
					<div class="col-lg-6">
						<h3> Details</h3>	
						<div class="form-group" style="margin-top:10px;">
							<label class="col-lg-3 control-label" for="supplier_name">Product Name</label>
							<div class="col-lg-8">
								<input type="text" name="product_Name" class="form-control inline" value="<?php echo $r->product_Name?>" required>
							</div>
						</div>
						<div class="form-group">
							<p class="col-lg-12" style="color:red; font-weight:bold;">WARNING : THIS WILL CONVERT EVERY QUANTITY</p>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Category</label>
							<div class="col-lg-8">
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
							<label class="col-lg-3 control-label">Class</label>
							<div class="col-lg-8 input-group">
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
									<button type="button" class="btn btn-theme" data-toggle="modal" data-target="#addClass"><i class="fa fa-plus"></i></button>
				      			</span>
							</div>
						</div>
						
						<div class="form-group" style="margin-top:10px;">
							<div class="col-lg-3 col-xs-3">						
								<label class="control-label">Quantity</label>
								<input type="number" name="quantity" class="form-control inline" value="<?php echo $r->current_count ?>" disabled>
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
								<input type="number" step="0.01" name="price" class="form-control inline" value="<?php echo $r->price?>" disabled>
							</div>
						</div>
							
						
						<div class="form-group" style="color:red; font-weight:bold;">
							<div class="col-lg-3 col-xs-3">
								<label class="control-label">Selling Price</label>
								<input type="number" name="price" class="form-control inline" value="<?php echo $r->price?>" required>
							</div>
						</div>
						
						
						<div class="form-group">
							<div class="col-lg-8 col-xs-8">
								<label class="control-label">Description</label>
								<textarea name="description" class="form-control inline" required><?php echo $r->description?></textarea>
							</div>
						</div>
						
	
						<div class="form-group">
							<div class="col-lg-4 col-xs-4">
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
					<div class="col-lg-6">
						<div class="col-lg-12">
						<h3>Ingredients: </h3>
						</div>
						<div class="col-lg-12" style="margin-bottom:15px;">
							<button type="button" id="addButton" class="btn btn-theme" data-toggle="tooltip" data-placement="top" title="Add More" ><i class="fa fa-plus"></i></button>
							<button type="button"  id="removeButton" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Remove One" ><i class="fa fa-minus"></i></button>
						</div>
							
						<div class="form-group" id="materials">
							<div id="rm">
							<?php $rawm = explode(" ",$r->rm_ID);
								$qpu = explode(" ",$r->qty);
							foreach($rawm as $val => $raw){ ?>
								<div class="col-lg-12 col-xs-12">
									<div class="col-lg-4 col-xs-4">						
										<input type="number" step="0.001" name="qpu[]" class="form-control inline" value="<?php echo $qpu[$val]?>" required>
									</div>
									
									<div class="col-lg-8 col-xs-8">
										<select name="rm_ID[]" class="form-control" required>
										<option value="<?php echo $raw?>"><?php echo $raw?></option>
										<?php if(!empty($rm)){
											if (is_array($rm)){                      
									        	foreach ($rm as $row) {
									            	if($row['product_id'] != $raw){?>
														<option value="<?php echo $row['product_id']?>"><?php echo $row['product_Name']; ?></option>
													<?php } 
												}
											}
										} ?>
										</select>
									</div>
								</div>
								<?php } ?>
										
							</div>	
						</div>
						
						<div class="col-lg-12 form-group">
							<input type="submit" class="btn btn-success pull-right" value="Update" style="margin-left:5px;">
							</form>
							<a href="javascript:window.history.go(-1);" class="btn btn-default pull-right" style="align">Back</a>
						</div>
						
					</div>
					<?php } ?>
				</div>
			</div>
		
		
	</div>
	<!-- /#container bg-panel -->
	
	<!--Purchase Order Modal-->			
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
					<form class="form-group" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>products/replenish/<?php echo $r->product_id?>">
						
						<div class="form-group">
							<div class="col-lg-6 col-xs-6">
								<label> Quantity</label>
								<input type="text" name="quantity" class="form-control inline" required>
								<input type="hidden" name="supplier_id" class="form-control" value="<?php echo $r->supplier_ID ?>">
							</div>
						</div>
									
						<div class="form-group">
							<div class="col-lg-8 col-xs-8">
								<label> Price Per unit</label>
								<input type="number" step="0.001" name="price" class="form-control inline" required>
							</div>
						</div>
									
					</div>
								
								
					<div class="modal-footer">
						<div class="form-group">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<input type="submit" class="btn btn-success" value="Add">
							</form>
						</div>
					</div>
								
					
				</div>
							
			</div>
		</div>
	</div>
	
	<!-- Sales Order Modal-->			
	<div class="modal fade" id="salesOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="vertical-alignment-helper">
			<div class="modal-dialog vertical-align-center">
							
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title"><i class="fa fa-briefcase"></i> Sales Order Form</h4>
					</div>
							
					<div class="modal-body">
					<form class="form-group" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>products/sold/<?php echo $r->product_id?>">
						
						<div class="form-group">
							<div class="col-lg-6 col-xs-6">
								<label> Quantity</label>
								<input type="text" name="quantity" class="form-control inline" required>
							</div>
						</div>
							
					</div>
								
								
					<div class="modal-footer">
						<div class="form-group">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<input type="submit" class="btn btn-success" value="Submit">
							</form>
						</div>
					</div>
								
					
				</div>
							
			</div>
		</div>
	</div>
	
	<!-- Sales Order Modal-->			
	<div class="modal fade" id="produce" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="vertical-alignment-helper">
			<div class="modal-dialog vertical-align-center">
							
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title"><i class="fa fa-briefcase"></i> Goods Production Form</h4>
					</div>
							
					<div class="modal-body">
					<form class="form-group" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>products/reproduce/<?php echo $r->product_id?>">
						
						<div class="form-group">
							<div class="col-lg-6 col-xs-6">
								<label> Quantity</label>
								<input type="text" name="quantity" class="form-control inline" required>
							</div>
						</div>
							
					</div>
								
								
					<div class="modal-footer">
						<div class="form-group">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<input type="submit" class="btn btn-success" value="Submit">
							</form>
						</div>
					</div>
								
					
				</div>
							
			</div>
		</div>
	</div>
	
	
</div>	
<!-- /#page-content-wrapper -->

