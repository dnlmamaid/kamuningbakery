	<div class="container bg-panel">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-comment-o" style=""></i> Request Order</h1>
				<div class="col-lg-5 col-xs-12 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa fa-comments-o"></i><a href="<?php echo base_url()?>requests"> Requests</a></li>
					<li><i class="fa fa-comment-o"></i> Request Order</li>
				</ol>
				</div>
			</div>
		</div>
		
		<?php foreach($ro as $r) ?>
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
							<?php if(!$r->ro_status && $r->is_reviewed != '1'): ?>
							<form action="<?php echo base_url(); ?>requests/update/<?php echo $r->ro_reference?>"  role="form" accept-charset="utf-8" method="post">
							<h3>Details</h3>
							<div class="row">
								<div class="col-lg-5 col-xs-7">
									<div class="form-group">
										<label>Requested By</label>
										<input type="text" name="user_id" class="form-control" value="<?php echo $r->lastName?>, <?php echo $r->firstName?>" disabled>
									</div>
									
									
								</div>

								<div class="col-lg-3 col-xs-5 pull-right">
									<div class="form-group">
										<label>Date Requested</label>
										<input type="text" name="request_date" class="form-control" value="<?php echo date('Y-m-d', strtotime($r->request_date)) ?>" disabled>
									</div>	
								</div>
								
							</div>
							
							<div class="row">
								<div class="col-lg-6 col-xs-6">
									<div class="form-group">
										<label>Reference ID</label>
										<input type="text" name="ro_reference" class="form-control" value="<?php echo $r->ro_reference ?>" style="text-transform: uppercase;">
									</div>
								</div>
								
								<div class="col-lg-3 col-xs-3 pull-right">
									<div class="form-group">
										<label>Status</label>
										<select name="request_status" class="form-control">
											<?php if($r->request_status == '1'){ ?>
												<option value="1" selected>Ok</option>	
												<option value="0">For Review</option>	
											<?php } else { ?>
												<option value="0" selected>For Review</option>
												<option value="1">Ok</option>	
											<?php }?>
											
											
										</select>
									</div>
								</div>
								
								
							</div>
							<div class="row">
								<div class="col-lg-3 pull-right">
									<div class="form-group">
										<input type="submit" onclick="return confirm('If you update the status you will not be able to change it again, proceed?');" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Clear Request" value="Update">
										<span data-toggle="modal" data-target="#addOrder">
											<a type="button" class="btn btn-caution" data-toggle="tooltip" data-placement="top" title="Add a Request"><i class="fa fa-plus"></i><a>
										</span>
										<a href="<?php echo base_url()?>requests/cancel/<?php echo $r->ro_reference?>" onclick="return confirm('Action can not be undone, proceed?');" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancel Request"><i class="fa fa-close"></i><a>
									</div>
								</div>
							</div>
							</form>
							<?php else: ?>
							<form action="<?php echo base_url(); ?>requests/update/<?php echo $r->ro_reference?>"  role="form" accept-charset="utf-8" method="post">
							<h3>Details</h3>
							<div class="row">
								<div class="col-lg-5 col-xs-7">
									<div class="form-group">
										<label>Requested By</label>
										<input type="text" name="user_id" class="form-control" value="<?php echo $r->lastName?>, <?php echo $r->firstName?>" disabled>
									</div>
									
									
								</div>

								<div class="col-lg-3 col-xs-5 pull-right">
									<div class="form-group">
										<label>Date Requested</label>
										<input type="text" name="request_date" class="form-control" value="<?php echo date('Y-m-d', strtotime($r->request_date)) ?>" disabled>
									</div>	
								</div>
								
							</div>
							
							<div class="row">
								<div class="col-lg-6 col-xs-6">
									<div class="form-group">
										<label>Reference ID</label>
										<input type="text" name="ro_reference" class="form-control" value="<?php echo $r->ro_reference ?>" style="text-transform: uppercase;" disabled>
										<input type="hidden" name="ro_reference" class="form-control" value="<?php echo $r->ro_reference ?>" style="text-transform: uppercase;">
										
									</div>
								</div>
								
								<div class="col-lg-3 col-xs-3 pull-right">
									<div class="form-group">
										<label>Status</label>
										<select name="request_status" class="form-control" disabled>
											<option value="0">For Review</option>
											<option value="1" selected>Ok</option>
											<input type="hidden" name="request_status" class="form-control" value="1">
										</select>
									</div>
								</div>
								
								
							</div>
							<div class="row">
								<div class="col-lg-1 pull-right">
									<div class="form-group">
										<?php if($r->request_status != '1'): ?>
										<input type="submit" class="btn btn-success fa" data-toggle="tooltip" data-placement="top" title="Clear Request" value="&#xf00c;">
										<?php endif; ?>
										
									</div>
								</div>
							</div>
							
							</form>
							<?php endif; ?>
							
						</div>
					</div>
								
					
					<!-- Table -->
					<div class="row">
						
						<section class="col-lg-12 panel">
						<h3>Requested Products</h3>	
							<div class="table-responsive"> 
								<table class="table table-advance table-hover">
									<tbody>
										<tr>
											<th class="col-md-1"><i class="fa fa-barcode"></i> Request ID</th>
											<th class="col-md-1"><i class="fa flaticon-ingredients1"></i> Product</th>
						                    <th class="col-md-1"><i class="fa fa-comment"></i> Request</th>
						                    <th class="col-md-1"><i class="fa fa-cogs"></i> Status</th>
										</tr>
				                              	
				                        <?php if(isset($requests) && is_array($requests)): foreach($requests as $row): if($row->is_reviewed == '1'):?> 
										<tr>
											<td class="col-md-1"><?php echo $row->ro_reference ?></td>
											<td class="col-md-1"><?php echo $row->product_Name ?></td>
					                        <td class="col-md-1"><?php echo $row->request_qty ?></td>
					                         
					                        <td>
					                        	<?php if($row->ro_status): ?>
						                			Accepted
						                		<?php elseif(!$row->ro_status): ?>
						                			Rejected
						                		<?php endif; ?>
					                        </td>
					                        
										</tr>	
										<?php 
										else:?>
										<tr class="conf">
											<td class="col-md-1 b"><?php echo $row->ro_reference ?></td>
											<td class="col-md-1 b"><?php echo $row->product_Name ?></td>
					                        <td class="col-md-1 b"><?php echo $row->request_qty ?></td>
					                        <td>
					                        	<?php if($row->ro_status == '0'):?>
					                        	<a class="btn btn-caution" href="<?php echo base_url()?>requests/disapprove/<?php echo $row->ro_id?>" data-toggle="tooltip" data-placement="left" title="Disapprove"><i class="icon_close_alt2"></i></a>
						                		<a class="btn btn-success" href="<?php echo base_url()?>requests/approve/<?php echo $row->ro_id?>" data-toggle="tooltip" data-placement="left" title="Approve"><i class="icon_check_alt2"></i></a>
						                		<?php endif; ?>
					                        </td>
										</tr>	
										<?php
										endif;
										endforeach;	                               
										endif;?> 
										
										 
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
	
	
	<!-- ADD REQUEST MODAL -->
	<div class="modal fade" id="addOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="vertical-alignment-helper">
			<div class="modal-dialog vertical-align-center">
							
				<div class="modal-content">
				<form action="<?php echo base_url(); ?>requests/add_order/<?php echo $r->ro_reference?>"  role="form" accept-charset="utf-8" method="post">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title"><i class="fa flaticon-ingredients1"></i> Add Product Request Form</h4>
					</div>
							
					<div class="modal-body">
						
						
							<div class="col-lg-7 col-xs-7">
								<label> Product</label>
								<select name="product_id" class="form-control">
								<?php if(!empty($prod)){
									if (is_array($prod)){                      
										foreach ($prod as $row) {?>
											<option value="<?php echo $row['product_id']?>"><?php echo $row['product_Name']; ?></option>
										<?php }
									}
								}?>
								</select>											
							</div>
						
					
							<div class="col-lg-7">
								<label>Request</label>
								<textarea name="request_qty" class="form-control inline" required></textarea>
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
	
</div>