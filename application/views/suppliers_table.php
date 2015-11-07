<?php $body = $this->uri->segment('2'); ?>

            
	<div class="container bg-panel">
			
		<div class="row">
			<div class="col-lg-12">
				
				<h1 class="page-header"><i class="fa fa-briefcase"></i> Suppliers</h1>
				<div class="col-lg-3 col-xs-12 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa fa-briefcase"></i><a href="<?php echo base_url()?>suppliers"> Suppliers</a></li>
				</ol>
				</div>
					
					
				<div class="col-lg-6 col-xs-12" style="margin-bottom:15px;">
	    			<?php echo form_open('suppliers/search')?>
					<div class="input-group">
		      			<input type="text" class="form-control" placeholder="Looking for Something?" name="search" required>
		      			<span class="input-group-btn"><button type="button" data-toggle="tooltip" data-placement="top" title="Search Suppliers Module"  class="btn btn-theme" type="submit"><i class="glyphicon glyphicon-search"></i></button></span>
		      		<?php echo form_close()?>
		    		</div>
	    		</div>
	    		
	    		<div class="col-lg-3 col-xs-1 pull-right"style="margin-bottom:15px;">
	    			<span data-target="#addSupplier" data-toggle="modal">
	    				<a href="#" class="btn btn-theme pull-right" data-toggle="tooltip" data-placement="top" title="Create New Supplier"><i class="fa fa-user-plus"></i></a>
	    			</span>
				</div>
	    				
			</div>
		</div>
		
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
			<section class="col-lg-12 panel">
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
					<table class="table table-advance table-hover">
						<tbody>
							<tr>
								<th class="col-md-1"><i class="fa fa-briefcase"></i> Name</th>
								<th class="col-md-1"><i class="fa icon_profile"></i> Contact Person</th>
		                        <th class="col-md-2"><i class="fa fa-home"></i> Address</th>
		                        <th class="col-md-1"><i class="fa fa-phone"></i> Contact</th>
		                        
		                        <th class="col-md-1"><i class="fa icon_cogs"></i> Action</th>
	                        </tr>
	                        <?php if(isset($suppliers) && is_array($suppliers)): foreach($suppliers as $row): if($row->is_active):?> 
							<tr class="clickable-row" data-href="<?php echo base_url()?>suppliers/profile/<?php echo $row->supplier_id?>">
								<td class="col-md-1"><?php echo $row->supplier_name ?></td>
								<td class="col-md-1"><?php echo $row->contact_Person ?></td>
								<td class="col-md-2"><?php echo $row->st_Address; ?> <?php echo $row->city ?></td>
			                    <td class="col-md-1"><?php echo $row->contact; ?></td>
			                    <td class="col-md-1">
			                	<div class="">
			                		<?php if($row->is_active == '1'){?>
			                		<a class="btn btn-caution" href="<?php echo base_url()?>suppliers/disable/<?php echo $row->supplier_id?>" data-toggle="tooltip" data-placement="left" title="disable supplier"><i class="icon_close_alt2"></i></a>
			                		<?php } else if ($row->is_active != '1'){?>
			                			<a class="btn btn-success" href="<?php echo base_url()?>suppliers/enable/<?php echo $row->supplier_id?>" data-toggle="tooltip" data-placement="left" title="enable supplier"><i class="icon_check_alt2"></i></a>
			                		<?php } ?>
									
			                        <!--<a class="btn btn-danger"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>suppliers/remove/<?php echo $row->supplier_id?>" data-toggle="tooltip" data-placement="right" title="delete supplier"><i class="icon_close_alt2"></i></a>-->
			                    </div>
	                           	</td>
							<?php else:?>
							<tr class="conf clickable-row" data-href="<?php echo base_url()?>suppliers/profile/<?php echo $row->supplier_id?>">
								<td class="col-md-1 b"><?php echo $row->supplier_name ?></td>
								<td class="col-md-1 b"><?php echo $row->contact_Person ?></td>
								<td class="col-md-2 b"><?php echo $row->st_Address; ?> <?php echo $row->city ?></td>
			                    <td class="col-md-1 b"><?php echo $row->contact; ?></td>
			                     
			                    <td class="col-md-1">
			                	<div class="">
			                		<?php if($row->is_active == '1'){?>
			                		<a class="btn btn-caution" href="<?php echo base_url()?>suppliers/disable/<?php echo $row->supplier_id?>" data-toggle="tooltip" data-placement="left" title="disable supplier"><i class="icon_close_alt2"></i></a>
			                		<?php } else if ($row->is_active != '1'){?>
			                			<a class="btn btn-success" href="<?php echo base_url()?>suppliers/enable/<?php echo $row->supplier_id?>" data-toggle="tooltip" data-placement="left" title="enable supplier"><i class="icon_check_alt2"></i></a>
			                		<?php } ?>
									
			                        <a class="btn btn-danger"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>suppliers/remove/<?php echo $row->supplier_id?>" data-toggle="tooltip" data-placement="right" title="delete supplier"><i class="icon_close_alt2"></i></a>
			                    </div>
	                           	</td>
							<?php endif;endforeach; ?>
							</tr>
							<?php elseif(isset($search) && is_array($search)): foreach($search as $row): if($row->is_active):?> 
							<tr class="clickable-row" data-href="<?php echo base_url()?>suppliers/profile/<?php echo $row->supplier_id?>">
								<td class="col-md-1"><?php echo $row->supplier_name ?></td>
								<td class="col-md-1"><?php echo $row->contact_Person ?></td>
								<td class="col-md-2"><?php echo $row->st_Address; ?> <?php echo $row->city ?></td>
			                    <td class="col-md-1"><?php echo $row->contact; ?></td>
			                    
			                    <td class="col-md-1">
			                	<div class="">
			                		<?php if($row->is_active == '1'){?>
			                		<a class="btn btn-caution" href="<?php echo base_url()?>suppliers/disable/<?php echo $row->supplier_id?>" data-toggle="tooltip" data-placement="left" title="disable supplier"><i class="icon_close_alt2"></i></a>
			                		<?php } else if ($row->is_active != '1'){?>
			                			<a class="btn btn-success" href="<?php echo base_url()?>suppliers/enable/<?php echo $row->supplier_id?>" data-toggle="tooltip" data-placement="left" title="enable supplier"><i class="icon_check_alt2"></i></a>
			                		<?php } ?>
			                        <a class="btn btn-danger"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>suppliers/remove/<?php echo $row->supplier_id?>" data-toggle="tooltip" data-placement="right" title="delete supplier"><i class="icon_close_alt2"></i></a>
			                    </div>
	                           	</td>
							<?php else:?>
							<tr class="conf clickable-row" data-href="<?php echo base_url()?>suppliers/profile/<?php echo $row->supplier_id?>">
								<td class="col-md-1 b"><?php echo $row->supplier_name ?></td>
								<td class="col-md-1 b"><?php echo $row->contact_Person ?></td>
								<td class="col-md-2 b"><?php echo $row->st_Address; ?> <?php echo $row->city ?></td>
			                    <td class="col-md-1 b"><?php echo $row->contact; ?></td>
			                    <td class="col-md-1">
			                	<div class="">
			                		<?php if($row->is_active == '1'){?>
			                		<a class="btn btn-caution" href="<?php echo base_url()?>suppliers/disable/<?php echo $row->supplier_id?>" data-toggle="tooltip" data-placement="left" title="disable supplier"><i class="icon_close_alt2"></i></a>
			                		<?php } else if ($row->is_active != '1'){?>
			                			<a class="btn btn-success" href="<?php echo base_url()?>suppliers/enable/<?php echo $row->supplier_id?>" data-toggle="tooltip" data-placement="left" title="enable supplier"><i class="icon_check_alt2"></i></a>
			                		<?php } ?>
									
			                        <a class="btn btn-danger"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>suppliers/remove/<?php echo $row->supplier_id?>" data-toggle="tooltip" data-placement="right" title="delete supplier"><i class="icon_close_alt2"></i></a>
			                    </div>
	                           	</td>
							<?php endif;endforeach; ?>
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
			<div class="col-lg-8 col-lg-offset-4 col-xs-10 col-xs-offset-1">
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
 
