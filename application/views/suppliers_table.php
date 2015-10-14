<?php $body = $this->uri->segment('2'); ?>

            
	<div class="container bg-panel">
			
		<div class="row">
			<div class="col-lg-12">
				
				<h1 class="page-header"><i class="fa fa-briefcase"></i> Suppliers</h1>
				<div class="col-lg-3 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa fa-briefcase"></i><a href="<?php echo base_url()?>suppliers"> Suppliers</a></li>
				</ol>
				</div>
					
					
				<div class="col-lg-6 form-inline align-center">
	    			<?php echo form_open('suppliers/search')?>
					<div class="input-group">
		      			<input type="text" class="form-control" placeholder="Looking for Something?" name="search" required>
		      			<span class="input-group-btn"><button class="btn btn-theme" type="submit"><i class="glyphicon glyphicon-search"></i></button></span>
		      		<?php echo form_close()?>
		    		</div>
	    		</div>
	    		
	    		<div class="col-lg-3 pull-right">
	    			<a href="#" data-target="#addSupplier" class="btn btn-theme pull-right" data-toggle="modal" data-placement="top" title="Create New Supplier"><i class="fa fa-user-plus"></i></a>
				</div>
	    				
			</div>
		</div>
		
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
			<section class="panel">
			<?php if($this->session->flashdata('success')){ ?>
				<div class="alert alert-success" role="alert"><?php echo $this -> session -> flashdata('success'); ?></div>
			<?php } ?>
			<?php if($this->session->flashdata('error')){?>	
				<div class="alert alert-danger" role="alert"><?php echo $this -> session -> flashdata('error'); ?></div>
			<?php } ?>
			<?php if($this->session->flashdata('name_error')){?>	
				<div class="alert alert-danger" role="alert"><?php echo $this -> session -> flashdata('name_error'); ?></div>
			<?php } ?>
			<?php if($this->session->flashdata('search')){?>
				<div class="alert alert-info" role="alert"><?php echo $this -> session -> flashdata('search'); ?></div>
			<?php } ?> 
				<div class="table-responsive"> 
					<table class="table table-advance">
						<tbody>
							<tr>
								<th class="col-md-1"><i class="fa fa-briefcase"></i> Name</th>
								<th class="col-md-1"><i class="fa icon_profile"></i> Contact Person</th>
		                        <th class="col-md-2"><i class="fa fa-home"></i> Address</th>
		                        <th class="col-md-1"><i class="fa fa-phone"></i> Contact</th>
		                        
		                        <th class="col-md-1"><i class="fa icon_cogs"></i> Action</th>
	                        </tr>
	                        <?php if(isset($suppliers) && is_array($suppliers)): foreach($suppliers as $row): ?> 
							<tr class="conf clickable-row" data-href="<?php echo base_url()?>suppliers/profile/<?php echo $row->supplier_id?>">
								<td class="col-md-1-b"><?php echo $row->supplier_name ?></td>
								<td class="col-md-1-b"><?php echo $row->contact_Person ?></td>
								<td class="col-md-2-b"><?php echo $row->st_Address; ?> <?php echo $row->city ?></td>
			                    <td class="col-md-1-b"><?php echo $row->contact; ?></td>
			                    
			                    <td class="col-md-1">
			                	<div class="">
									<a class="btn btn-caution" href="<?php echo base_url()?>suppliers/deactivate/<?php echo $row->supplier_id?>" data-toggle="tooltip" data-placement="left" title="disable supplier"><i class="icon_close"></i></a>
			                        <a class="btn btn-danger"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>suppliers/remove/<?php echo $row->supplier_id?>" data-toggle="tooltip" data-placement="right" title="delete supplier"><i class="icon_close_alt2"></i></a>
			                    </div>
	                           	</td>
							<?php endforeach; ?>
							</tr>
							
							<?php else:?>
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
			</section>
            </div>
		</div>
         
		<?php if($body != 'search_result'){ ?>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-4">
				<div id="pagination">
				<ul class="tsc_pagination">
				<?php if(is_array($suppliers) && sizeof($suppliers)>0){?> 
					<div class="pagination pull-left" style="margin:10px 0px 5px 0px;"><?php echo (!empty($pagermessage) ? $pagermessage : ''); ?></div>
					<?php echo $paginglinks;
				}?>
				</ul>
				</div>
			</div>
		</div>
		<?php } ?>
        <!-- page end-->
        
        
        
	</div>            
</div>
<!-- /#page-content-wrapper -->
 
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