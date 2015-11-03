	<div class="container bg-panel">
			
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa flaticon-baker7"></i> Produce Goods</h1>
				<div class="col-lg-5 col-xs-12 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa flaticon-stone2"></i><a href="<?php echo base_url()?>production"> Production</a></li>
					<li><i class="fa flaticon-baker7"></i> Produce Goods</li>
				</ol>
				</div>
			</div>
		</div>
	
			
		<!-- page start-->
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
							<h3>Production Details</h3>
							<form action="<?php echo base_url(); ?>products/produce" accept-charset="utf-8" method="post">
								
							<div class="row">
								<div class="col-lg-5">
									<div class="form-group">
										<label class="control-label">Name</label>
										<input type="text" name="product_Name" class="form-control inline" value="" required>
									</div>
								</div>
							</div>	
							
							
							<div class="row" id="materials">							
								<div id="rm" class="col-lg-12">
									<div class="row">
										<div class="col-lg-2 col-xs-4">
											<label class="control-label">Quantity per Unit</label>
										</div>
										<div class="col-lg-5 col-xs-8">
											<label class="control-label">Raw Material</label>
										</div>
									</div>		
									<div class="col-lg-2 col-xs-4">
										<div class="form-group">						
											<input type="number" step="any" name="qpu[]" class="form-control inline" value="" required>
										</div>
									</div>
									
									
									<div class="col-lg-5 col-xs-8 input-group">
										<select name="rm_ID[]" class="form-control" required>
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
							
							<div class="row">
								<div class="col-lg-6">
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
								<div class="col-lg-2 col-xs-4">
									<div class="form-group">
										<label class="control-label">Quantity</label>
										<input type="number" name="quantity" class="form-control inline" value="" required>
									</div>
								</div>
								
								<div class="col-lg-2">
									<div class="form-group">
										<label class="control-label">Unit</label>
										<input type="text" name="um" class="form-control inline" value="" required>
									</div>
								</div>
								
								<div class="col-lg-2 col-xs-4">
									<div class="form-group">
										<label class="control-label">Holding Cost</label>
										<input type="number" name="holding_cost" class="form-control inline" value="0" required>
									</div>
								</div>
							</div>
							
				
					
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="terms">Description</label>
										<textarea name="description" class="form-control inline" required></textarea>
									</div>
								</div>
							</div>
					

							<div class="row">
								<div class="col-lg-3 pull-right">
									<div class="form-group">
										<input type="submit" class="btn btn-theme fa" data-toggle="tooltip" data-placement="top" title="Process" value="&#xF00c;">
									</div>
								</div>
							</div>
							
							
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!-- page end -->
	</div>
	
	
	
	
</div>








