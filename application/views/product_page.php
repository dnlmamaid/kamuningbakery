<?php $body = $this->uri->segment('2');
	  $head = $this->uri->segment('1'); ?>
	<?php foreach ($rec as $r)?>
	<div class="container bg-panel">
			
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header"><i class="fa flaticon-ingredients1"></i> Product Information</h1>
					<div class="col-lg-6 col-xs-12 pull-left">
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url()?>"> Home</a></li>
						<?php if ($r->category_ID == '1') {?>
						<li><i class="fa icon_cart"></i><a href="<?php echo base_url()?>inventory/finished_goods"> Inventory</a></li>
						<?php } else if ($r->category_ID == '2') {?>
						<li><i class="fa icon_cart"></i><a href="<?php echo base_url()?>inventory/raw_materials"> Inventory</a></li>
						<?php }?>
						<li><i class="fa flaticon-ingredients1"></i> Product Information</li>
					</ol>
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
					<h3>Details</h3>
					<div class="col-lg-6">
						<?php if($this->session->userdata('user_type') != ('4' || '3')): ?>
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
					</div>
					
					<div class="col-lg-6">
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
								<input type="number" step="any" name="price" class="form-control inline" value="<?php echo $r->price?>">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-lg-3 col-xs-3">
								<label class="control-label">Holding Cost</label>
								<input type="number" step="any" name="holding_cost" class="form-control inline" value="<?php echo $r->holding_cost?>">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-lg-5 col-xs-3">
								
									  
								<?php if(($r->current_count <= $r->ro_lvl)): ?>
								<label class="control-label" style="color:red;">Re Order Level</label>
								<input type="text" class="form-control inline" value="<?php echo round($r->ro_lvl); ?>" disabled>
								<?php else:?>
								<label class="control\-label">Re-order Level</label>
								<input type="text" class="form-control inline" value="<?php echo round($r->ro_lvl); ?>" disabled>	
								<?php endif; ?>
								<input type="hidden" name="ro_lvl" class="form-control inline" value="<?php echo round($r->ro_lvl); ?>" disabled>	
							</div>
						</div>
						
						<?php $annual_demand = ($ad->total_units/365);
							  $holding_cost = $r->holding_cost; 
							  $ordering_cost = ($ad->total_cost/$ad->count)?>
											
						<div class="form-group">
							<div class="col-lg-5 col-xs-3">
								<label class="control-label">EOQ</label>
								<?php $EOQ = sqrt( ( (2*$annual_demand*$ordering_cost)/($holding_cost) ) ); ?>
								<input type="text" name="eoq" class="form-control inline" value="<?php if($EOQ != '0'){ echo $EOQ; } else{ ?> Needs Further Data<?php }?>" disabled>
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
									<option v alue="1">Yes</option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="col-lg-12 form-group">
							<input type="submit" class="btn btn-success pull-right" value="Update" style="margin-left:5px;">
							</form>
							<a href="javascript:window.history.go(-1);" class="btn btn-default pull-right" style="align">Back</a>
						</div>			
						<?php else: ?>
						<div class="form-group" style="margin-top:10px;">
							<label class="col-lg-3 control-label" for="supplier_name">Product Name</label>
							<div class="col-lg-8">
								<input type="text" name="product_Name" class="form-control inline" value="<?php echo $r->product_Name?>" disabled>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Category</label>
							<div class="col-lg-8">
								<select name="category_ID" class="form-control" disabled>
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
							<div class="col-lg-8">
								<select name="class_ID" class="form-control" disabled>
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
							</div>
						</div>					
					</div>
					
					<div class="col-lg-6">
						<div class="form-group" style="margin-top:10px;">
							<div class="col-lg-3 col-xs-3">						
								<label class="control-label">Quantity</label>
								<input type="number" name="quantity" class="form-control inline" value="<?php echo $r->current_count ?>" disabled>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-lg-3 col-xs-3">
								<label class="control-label">Unit</label>
								<input type="text" name="um" class="form-control inline" value="<?php echo $r->um?>" disabled>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-lg-3 col-xs-3">
								<label class="control-label">Price per unit</label>
								<input type="number" step="any" name="price" class="form-control inline" value="<?php echo $r->price?>" disabled>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-lg-3 col-xs-3">
								<label class="control-label">Holding Cost</label>
								<input type="number" step="any" name="holding_cost" class="form-control inline" value="<?php echo $r->holding_cost?>" disabled>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-lg-5 col-xs-3">								
								<?php if(($r->current_count <= $r->ro_lvl)): ?>
								<label class="control-label" style="color:red;">Re Order Level</label>
								<input type="text" class="form-control inline" value="<?php echo round($r->ro_lvl); ?>" disabled>
								<?php else:?>
								<label class="control\-label">Re-order Level</label>
								<input type="text" class="form-control inline" value="<?php echo round($r->ro_lvl); ?>" disabled>	
								<?php endif; ?>
								<input type="hidden" name="ro_lvl" class="form-control inline" value="<?php echo round($r->ro_lvl); ?>" disabled>	
							</div>
						</div>
						
						<?php $annual_demand = ($ad->total_units/365);
							  $holding_cost = $r->holding_cost; 
							  $ordering_cost = ($ad->total_cost/$ad->count)?>
											
						<div class="form-group">
							<div class="col-lg-5 col-xs-3">
								<label class="control-label">EOQ</label>
								<?php $EOQ = sqrt( ( (2*$annual_demand*$ordering_cost)/($holding_cost) ) ); ?>
								<input type="text" name="eoq" class="form-control inline" value="<?php if($EOQ != '0'){ echo $EOQ; } else{ ?> Needs Further Data<?php }?>" disabled>
							</div>
						</div>
				
						<div class="form-group">
							<div class="col-lg-8">
								<label class="control-label">Description</label>
								<textarea name="description" class="form-control inline" disabled><?php echo $r->description?></textarea>
							</div>
						</div>
					
							
							
						<div class="form-group">
							<div class="col-lg-3">
								<label class="control-label">Enabled</label>
						  		<select name="product_status" class="form-control" disabled>
						  			<?php if($r->product_status){?> 
									<option value="1" selected>Yes</option>
									<option value="0">No</option>
									<?php } else{?>
									<option value="0" selected>No</option>
									<option v alue="1">Yes</option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="col-lg-12 form-group">
							
							<a href="javascript:window.history.go(-1);" class="btn btn-default pull-right" style="align">Back</a>
						</div>	
						<?php endif; ?>
						
						
					</div>
					
					
					<div class="col-lg-6">
						<h3>Purchase History</h3>
						<div class="table-responsive"> 
							<table class="table table-advance table-hover">
								<tbody>
									<tr>
										
										<th class="col-md-1"><i class="fa fa-truck"></i> Supplier</th>
					                    <th class="col-md-1"><i class="fa fa-tags"></i> Inventory</th>
				                        <th class="col-md-1"><i class="fa fa-tag"></i> Quantity</th>
				                        <th class="col-md-1"><i class="fa">&#8369;</i> Cost</th>
				                        <th class="col-md-1"><i class="fa">&#8369;</i> Total</th>
				                        <th class="col-md-2"><i class="fa fa-clock-o"></i> Date</th>
			                       	</tr>
			                              	
			                        <?php if(isset($purchases) && is_array($purchases)) : foreach($purchases as $row): ?> 
									<tr class="clickable-row" data-href="<?php echo base_url()?>purchases/purchase_invoice/<?php echo $row['purchase_id']?>">
										
										<td class="col-md-1"><?php echo $row['supplier_name'] ?></td>
										<td class="col-md-1"><?php echo round($row['qty_before_order']) ?> <?php if($row['um'] == 'pc'){echo $row['um'];?>s<?php } else{ echo $row['um'];}?></td>
		                                <td class="col-md-1"><?php echo $row['order_quantity'] ?> <?php if($row['um'] == 'pc'){echo $row['um'];?>s<?php } else{ echo $row['um'];}?></td>
		                                <td class="col-md-1">&#8369; <?php echo $row['ppu']?></td>
		                                <td class="col-md-1">&#8369; <?php echo $row['ordering_cost']?></td>
		                                <td class="col-md-2"><?php echo date('F d,Y (D) h:i:A', strtotime($row['date_received']))?></td>
									</tr>	
									<?php endforeach;	                               
									else:?>
									<tr>											
										
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
					
					<div class="col-lg-6">
						<h3>Used in</h3>
						<div class="table-responsive"> 
							<table class="table table-advance table-hover">
								<tbody>
									<tr>
										<th class="col-md-1"><i class="fa flaticon-breakfast27"></i> Product Name</th>
					                    <th class="col-md-1"><i class="fa flaticon-ingredients1"></i> Quantity Used</th>
			                            <th class="col-md-1"><i class="fa flaticon-breakfast27"></i> Units it can produce</th>
			                       	</tr>
			                              	
			                        <?php if(isset($products) && is_array($products)) : foreach($products as $row): ?> 
									<tr>
										<td class="col-md-1"><?php echo $row['id_for'] ?></td>
										<td class="col-md-1"><?php echo $row['ingredient_qty'] ?></td>
		                                <td class="col-md-1"><?php echo $row['qty_can_produce'] ?></td>
		                                
									</tr>	
									<?php endforeach;	                               
									else:?>
									<tr>											
										
										<th>No records</th>
										<th>No records</th>
										<th>No records</th>
										
									</tr>
									<?php endif; ?>      
			                        
								</tbody>
							</table>
						</div>
					</div>
					<?php } else if ($r->category_ID == '1' && ($this->session->userdata('user_type') <= '2' || $this->session->userdata('user_type') == '4')) {?>
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
								<input type="number" step="any" name="price" class="form-control inline" value="<?php echo $r->price?>" disabled>
							</div>
						</div>
							
						
						<div class="form-group" style="color:red; font-weight:bold;">
							<div class="col-lg-3 col-xs-3">
								<label class="control-label">Selling Price</label>
								<input type="number" step="any" name="sale_Price" class="form-control inline" value="<?php echo $r->sale_Price?>" required>
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
						
						
							
						<div class="form-group" id="materials">
							<div id="rm">
								<?php foreach($qcp as $val) ?>
								<div class="col-lg-5">
									<input type="number" step="any" name="qty_can_produce" class="form-control inline" value="<?php echo round($val->qty_can_produce); ?>" required> 
								</div>
								<div class="col-lg-3">
									<input type="text" class="form-control" value="units" disabled>
								</div>
								
							<?php foreach($ing as $r2): ?>
								<div class="col-lg-12 col-xs-12">
									<div class="col-lg-4 col-xs-4">						
										<input type="number" step="any" name="qpu[]" class="form-control inline" value="<?php echo $r2->ingredient_qty?>" required>
									</div>
									
									<div class="col-lg-6 col-xs-6">
										<select name="rm_ID[]" class="form-control" required>
										<option value="<?php echo $r2->product_id ?>"><?php echo $r2->product_Name?> (<?php echo $r2->um?>)</option>
										<?php if(!empty($rm)){
											if (is_array($rm)){                      
									        	foreach ($rm as $row) {
									            	if($row['product_id'] != $r2->product_id){?>
														<option value="<?php echo $row['product_id']?>"><?php echo $row['product_Name']; ?> (<?php echo $row['um']?>)</option>
													<?php } 
												}
											}
										} ?>
										</select>
									</div>
								</div>
							<?php endforeach;?>
										
							</div>	
						</div>
						
						<div class="col-lg-12 form-group">
							<input type="submit" class="btn btn-success pull-right" value="Update" style="margin-left:5px;">
							</form>
							<a href="javascript:window.history.go(-1);" class="btn btn-default pull-right" style="align">Back</a>
						</div>
						
					</div>
					
					<!-- Table -->
					<div class="row">
						<section class="col-lg-12 panel">
						<div class="col-lg-6">
						<h3>Production Table</h3>	
							<div class="table-responsive"> 
								<table class="table table-advance table-hover">
									<tbody>
										<tr>
											<th class="col-md-1"><i class="fa fa-calendar"></i> Date</th>
											<th class="col-md-1"><i class="fa flaticon-breakfast27"></i> Inventory</th>
						                    <th class="col-md-1"><i class="fa flaticon-baker7"></i> Units Produced</th>
						                    <th class="col-md-1"><i class="fa fa-dollar"></i> Production Cost</th> 
										</tr>
				                              	
				                        <?php if(isset($production) && is_array($production)): foreach($production as $row):?> 
										<tr class="clickable-row" data-href="<?php echo base_url()?>production/process_info/<?php echo $row['pb_id']?>">
											<td class="col-md-1"><?php echo date('F d,Y (D)', strtotime($row['date_produced']))?></td>
											<td class="col-md-1"><?php echo $row['previous_count'] ?></td>
		                               		<td class="col-md-1"><?php echo $row['units_produced'] ?></td>
		                                	<td class="col-md-1">Php <?php echo $row['total_production_cost'] ?></td>
										</tr>	
										<?php 
										endforeach;
										endif;?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-lg-6">
						<h3>Sales</h3>	
							<div class="table-responsive"> 
								<table class="table table-advance table-hover">
									<tbody>
										<tr>
											<th class="col-md-1"><i class="fa fa-calendar"></i> Date</th>
											<th class="col-md-1"><i class="fa fa-barcode"></i> Invoice</th>
											<th class="col-md-1"><i class="fa flaticon-dollar91"></i> Units Sold</th>	
						                    
						                    
						                     
										</tr>
				                              	
				                        <?php if(isset($sales) && is_array($sales)): foreach($sales as $row):?> 
										<tr class="clickable-row" data-href="<?php echo base_url()?>sales/sales_invoice/<?php echo $row['siv_id']?>">
											<td class="col-md-1"><?php echo date('F d,Y (D)', strtotime($row['sales_date']))?></td>
											<td class="col-md-1"><?php echo $row['invoice_code'] ?></td>
		                               		<td class="col-md-1"><?php echo $row['qty_sold'] ?> <?php if($row['um'] == 'pc'){echo $row['um'];?>s<?php } else{ echo $row['um'];}?></td>
										</tr>	
										<?php 
										endforeach;
										endif;?>
									</tbody>
								</table>
							</div>
						</div>
						</section>
					</div>
					<!-- /Table -->
					
					<?php } else { ?>
					<div class="col-lg-6">
						<h3> Details</h3>	
						<div class="form-group" style="margin-top:10px;">
							<label class="col-lg-3 control-label" for="supplier_name">Product Name</label>
							<label class="col-lg-8">
								<input type="text" name="product_Name" class="form-control inline" value="<?php echo $r->product_Name?>" disabled>
							</label>
						</div>
					
						<div class="form-group">
							<label class="col-lg-3 control-label">Category</label>
							<div class="col-lg-8">
								<select name="category_ID" class="form-control" disabled>
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
							<div class="col-lg-8">
								<select name="class_ID" class="form-control" disabled>
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
								<input type="text" name="um" class="form-control inline" value="<?php echo $r->um?>" disabled>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-lg-3 col-xs-3">
								<label class="control-label">Price per unit</label>
								<input type="number" step="any" name="price" class="form-control inline" value="<?php echo $r->price?>" disabled>
							</div>
						</div>
							
						
						<div class="form-group" style="color:red; font-weight:bold;">
							<div class="col-lg-3 col-xs-3">
								<label class="control-label">Selling Price</label>
								<input type="number" step="any" name="sale_Price" class="form-control inline" value="<?php echo $r->sale_Price?>" disabled>
							</div>
						</div>
						
						
						<div class="form-group">
							<div class="col-lg-8 col-xs-8">
								<label class="control-label">Description</label>
								<textarea name="description" class="form-control inline" disabled><?php echo $r->description?></textarea>
							</div>
						</div>
						
	
						<div class="form-group">
							<div class="col-lg-4 col-xs-4">
								<label class="control-label">Enabled</label>
						  		<select name="product_status" class="form-control" disabled>
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
						
						
							
						<div class="form-group" id="materials">
							<div id="rm">
								<?php foreach($qcp as $val) ?>
								<div class="col-lg-5">
									<input type="number" step="any" name="qty_can_produce" class="form-control inline" value="<?php echo round($val->qty_can_produce); ?>" disabled> 
								</div>
								<div class="col-lg-3">
									<input type="text" class="form-control" value="units" disabled>
								</div>
								
							<?php foreach($ing as $r2): ?>
								<div class="col-lg-12 col-xs-12">
									<div class="col-lg-4 col-xs-4">						
										<input type="number" step="any" name="qpu[]" class="form-control inline" value="<?php echo $r2->ingredient_qty?>" disabled>
									</div>
									
									<div class="col-lg-6 col-xs-6">
										<select name="rm_ID[]" class="form-control" disabled>
										<option value="<?php echo $r2->product_id ?>"><?php echo $r2->product_Name?> (<?php echo $r2->um?>)</option>
										<?php if(!empty($rm)){
											if (is_array($rm)){                      
									        	foreach ($rm as $row) {
									            	if($row['product_id'] != $r2->product_id){?>
														<option value="<?php echo $row['product_id']?>"><?php echo $row['product_Name']; ?> (<?php echo $row['um']?>)</option>
													<?php } 
												}
											}
										} ?>
										</select>
									</div>
								</div>
							<?php endforeach;?>
										
							</div>	
						</div>
						
						<div class="col-lg-12 form-group">							
							<a href="javascript:window.history.go(-1);" class="btn btn-default pull-right" style="align">Back</a>
						</div>
						
					</div>
					
					
						
						
						
					<?php } ?>
				</div>
			</div>
		
		
	</div>
	<!-- /#container bg-panel -->
	
	
	
	
	
</div>	
<!-- /#page-content-wrapper -->

