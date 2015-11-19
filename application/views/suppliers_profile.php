
<div class="container bg-panel">
		<?php foreach ($rec as $r)?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-truck"></i> <?php echo $r->supplier_name?></h1>
				<div class="col-lg-4 col-xs-12 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa fariefcase"></i><a href="<?php echo base_url()?>suppliers"> Suppliers</a></li>
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
				<div class="col-lg-6 col-xs-12">
					<div class="form-group">
						<div class="col-lg-12">
							<label>Supplier</label>
							<input type="text" name="supplier_name" class="form-control inline" value="<?php echo $r->supplier_name?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-6 col-xs-6">
							<label>Contact Person</label>
							<input type="text" name="contact_Person" class="form-control inline" value="<?php echo $r->contact_Person?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-6 col-xs-6">
							<label>Contact</label>
							<input type="text" name="contact" class="form-control inline" value="<?php echo $r->contact?>" required>
						</div>
					</div>
					
				
					<div class="form-group">
						<div class="col-lg-8 col-xs-12">
							<label>Address</label>
							<input type="text" name="st_Address" class="form-control inline" value="<?php echo $r->st_Address?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-4 col-xs-5">
							<label>City</label>
							<input type="text" name="city" class="form-control inline" value="<?php echo $r->city?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-6 col-xs-9">
							<label>Terms</label>
							<textarea name="terms" class="form-control inline" required><?php echo $r->terms?></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-3 col-xs-5">
							<label>Lead Time (Days)</label>
							<input type="text" name="lead_time" class="form-control inline" value="<?php echo $r->lead_time?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-3 col-xs-5">
							<label class="control-label">Enabled</label>
					  		<select name="is_active" class="form-control" required>
					  			<?php if($r->is_active){?>
					  			<option value="1" selected>Yes</option> 
								<option value="0">No</option>
								<?php } else { ?>
								<option value="1">Yes</option> 
								<option value="0" selected>No</option>	
								<?php } ?>
								
							</select>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6 col-xs-12">
					<h3>Supplied Products</h3>
					<div class="table-responsive"> 
						<table class="table table-advance table-hover">
							<tbody>
								<tr>
									<th class="col-md-1"><i class="fa fa-barcode"></i> Reference ID</th>
									<th class="col-md-1"><i class="fa flaticon-ingredients1"></i> Product</th>
						            <th class="col-md-1"><i class="fa fa-truck"></i> Quantity</th>
						            <th class="col-md-1"><i class="fa">&#8369;</i> Total</th> 
				                    <!--<th class="col-md-1"><i class="icon_cogs"></i> Action</th>-->
		                       	</tr>
		                              	
		                        <?php if(isset($products) && is_array($products)) : foreach($products as $row): ?> 
								<tr class="clickable-row" data-href="<?php echo base_url()?>products/view_product/<?php echo $row['product_id']?>">
									<td class="col-md-1"><?php echo $row['order_reference'] ?></td>
									<td class="col-md-1"><?php echo $row['product_Name'] ?></td>
			                       	<td class="col-md-1"><?php echo $row['order_quantity'] ?></td>
			                        <td class="col-md-1">&#8369; <?php echo $row['ordering_cost'] ?></td>
			                        
			                        <!--<td class="col-md-1">
				                        	<div class="btn-group">
				                                  <a class="btn btn-success" href="<?php echo base_url()?>products/view_product/<?php echo $row['product_id']?>"><i class="icon_check_alt2"></i></a>
				                                  <a class="btn btn-danger"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>Products/remove/<?php echo $row['product_id']?>" data-toggle="tooltip" data-placement="right" title="delete product"><i class="icon_close_alt2"></i></a>
				                                </div>
		                                </td>-->
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
				
				
				<div class="form-group">
					<div class="col-lg-12">
						<input type="submit" class="btn btn-success pull-right" value="Update" style="margin-left:5px;">
						<a href="<?php echo base_url()?>suppliers" class="btn btn-default pull-right">Back</a>
					</form>
				</div>
		</div>
	</div>
	
</div>


