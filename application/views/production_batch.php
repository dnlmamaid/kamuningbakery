	<div class="container bg-panel">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa flaticon-baker7" style=""></i> Production Batch</h1>
				<div class="col-lg-5 col-xs-12 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa flaticon-stone2"></i><a href="<?php echo base_url()?>production"> Production</a></li>
					<li><i class="fa flaticon-baker7"></i> Production Batch</li>
				</ol>
				</div>
			</div>
		</div>
		
		<?php foreach($batch as $r) ?>
		<div class="row">
			<div class="col-lg-12">
				
				<div class="col-lg-10 col-lg-offset-1">
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
					
					<div class="row">
						<div class="col-lg-12">
							
							
							<h3>Details</h3>
							<div class="row">
								<div class="col-lg-5 col-xs-7">
									<div class="form-group">
										<label>Employee</label>
										<input type="text" name="user_id" class="form-control" value="<?php echo $r->lastName ?>, <?php echo $r->firstName ?>" disabled>
									</div>	
								</div>

								<div class="col-lg-3 col-xs-3 pull-right">
									<div class="form-group">
										<label>Date of Production</label>
										<input type="text" name="date_produced" class="form-control" value="<?php echo date('Y-m-d', strtotime($r->date_produced)) ?>" id="edate" disabled>
									</div>	
								</div>
							</div>
							<?php if(date('Ymd') <= date('Ymd', strtotime($r->date_produced))):?>
							<div class="row">
								<div class="col-lg-6 col-xs-6">
									<div class="form-group">
										<label>Reference ID</label>
										<input type="text" name="batch_id" class="form-control" value="<?php echo $r->batch_id ?>" style="text-transform: uppercase;">
									</div>
								</div>
								
								
							</div>
													
							<div class="row">
								<div class="col-lg-6">
									<h3>New Product Details</h3>
									<form action="<?php echo base_url(); ?>production/add_to_batch/<?php echo $r->batch_id ?>" accept-charset="utf-8" method="post">
										
									<div class="row">
										<div class="col-lg-10">
											<div class="form-group">
												<label class="control-label">Name</label>
												<input type="text" name="product_Name" class="form-control inline" value="" required>
											</div>
										</div>
									</div>	
									
									
									<div class="row" id="materials">							
										<div id="rm" class="col-lg-12">
											<div class="row">
												<div class="col-lg-2 col-xs-4" style="margin-left:20px;">
													<label class="control-label">Quantity</label>
												</div>
												<div class="col-lg-8 col-xs-8" style="margin-left:20px;">
													<label class="control-label">Raw Material</label>
												</div>
											</div>		
											<div class="col-lg-3 col-xs-4">
												<div class="form-group">						
													<input type="number" step="any" name="qpu[]" class="form-control inline" value="" required>
												</div>
											</div>
											
											
											<div class="col-lg-9 col-xs-8 input-group">
												<select name="rm_ID[]" class="form-control" required>
													<option value="">Select Raw Material/s</option>
													<?php if(!empty($rm)){
														if (is_array($rm)){                      
											            	foreach ($rm as $row) {?>
															<option value="<?php echo $row['product_id']?>"><?php echo $row['product_Name']; ?> (<?php echo $row['um'] ?>)</option>
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
									
									<div class="row">
										<div class="col-lg-11">
											<div class="form-group">
												<label class="control-label">Class</label>
												<div class="input-group form-group">
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
									</div>
								
									<div class="row" style="margin-top:15px;">
										<div class="col-lg-4 col-xs-4">
											<div class="form-group">
												<label class="control-label">Quantity</label>
												<input type="number" name="quantity" class="form-control inline" value="" required>
											</div>
										</div>
										
									
									</div>
									
						
							
									<div class="row">
										<div class="col-lg-8">
											<div class="form-group">
												<label for="terms">Description</label>
												<textarea name="description" class="form-control inline" required></textarea>
											</div>
										</div>
									</div>
							
		
									<div class="row">
										<div class="col-lg-3 pull-right">
											<div class="form-group">
												<input type="submit" class="btn btn-theme" value="Add" data-toggle="tooltip" data-placement="top" title="Add to batch">
											</div>
										</div>
									</div>
									
									
									</form>
								</div>
								
								<div class="col-lg-6">
									<h3>Old Product Details</h3>
									<form action="<?php echo base_url(); ?>production/add_to_batch/<?php echo $r->batch_id ?>" accept-charset="utf-8" method="post">
										
									<div class="row">
										<div class="col-lg-11">
											<div class="form-group">
												<label class="control-label">Name</label>
												<select name="product_Name" class="form-control" id="p" required>
													<option value="">Select Product</option>
													<?php if(!empty($fg)){
														if (is_array($fg)){                      
													 		foreach ($fg as $row) {?>
																<option value="<?php echo $row['product_Name']?>"><?php echo $row['product_Name']; ?></option>
															<?php }
														}							
													}
																				
													else{	?>
													<option value=""></option>
													<?php }?>
												</select>
											</div>
										</div>

										
										<div class="col-lg-3 col-xs-4">
											<div class="form-group">
												<label class="control-label">Times to be Produced</label>
												<input type="number" name="quantity" class="form-control inline" value="" required>
											</div>
										</div>
										
										
									</div>	
						
									<div class="row">
										<div class="col-lg-3 pull-right">
											<div class="form-group">
												<input type="submit" class="btn btn-theme" value="Add" data-toggle="tooltip" data-placement="top" title="Add to batch">
											</div>
										</div>
									</div>
									
									
									</form>
								</div>
							</div>
							<?php endif;?>
							
							
						</div>
					</div>
								
					
					<!-- Table -->
					<div class="row">
						
						<section class="col-lg-12 panel">
						<h3>Products Produced</h3>	
							<div class="table-responsive"> 
								<table class="table table-advance table-hover">
									<tbody>
										<tr>
											<th class="col-md-1"><i class="fa fa-barcode"></i> Reference ID</th>
											<th class="col-md-1"><i class="fa flaticon-baked1"></i> Product</th>
						                    <th class="col-md-1"><i class="fa"></i> Units Produced</th>
						                    <th class="col-md-1"><i class="fa">&#8369;</i> Total Cost</th> 
										</tr>
				                              	
				                        <?php if(isset($processed) && is_array($processed)): foreach($processed as $row):?> 
										<tr class="clickable-row" data-href="<?php echo base_url()?>production/process_info/<?php echo $row->pb_id?>">
											<td class="col-md-1"><?php echo $row->batch_reference ?></td>
											<td class="col-md-1"><?php echo $row->product_Name ?></td>
					                        <td class="col-md-1"><?php echo $row->units_produced ?> <?php if($row->um == 'pc'){echo $row->um;?>s<?php } else{ echo $row->um;}?></td>
					                        <td class="col-md-1 b"><b>&#8369; <?php echo $row->total_production_cost?></b></td>
										</tr>	
										<?php 
										endforeach;	                               
										endif;?> 
										
										<tr>
											<td class="col-md-1"><b>Total Amount</b></td>
										   	<td class="col-md-1"></td>
										   	<td class="col-md-1"></td>
										   	<td class="col-md-1"><b>&#8369; <?php echo $to->total?></b></td>	
										</tr> 
										 
									</tbody>
								</table>
							</div>
						</section>
					</div>
					<!-- /Table -->
				
				</div>
			</div>
		</div>
		
	</div>
	
	
	
	
</div>