<?php $body = $this->uri->segment('2'); ?>

            
	<div class="container bg-panel">
			
		<div class="row">
			<div class="col-lg-12">
				
				<h1 class="page-header"><i class="fa fa-users"></i> Users</h1>
				<div class="col-lg-3 col-xs-12 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa fa-users"></i><a href="<?php echo base_url()?>users"> Users</a></li>
				</ol>
				</div>
					
					
				<div class="col-lg-6 col-xs-12" style="margin-bottom:15px;">
	    			<?php echo form_open('users/search')?>
					<div class="input-group">
		      			<input type="text" class="form-control" placeholder="Looking for Something?" name="search">
		      			<span class="input-group-btn"><button type="button" data-toggle="tooltip" data-placement="top" title="Search Users Module" class="btn btn-theme" type="submit"><i class="glyphicon glyphicon-search"></i></button></span>
		      		<?php echo form_close()?>
		    		</div>
	    		</div>
	    		
	    		<div class="col-lg-1 col-xs-2 pull-right" style="margin-bottom:15px;">
	    			<span data-target="#addUser" data-toggle="modal" >
	    				<a href="#" class="btn btn-theme" data-toggle="tooltip" data-placement="top" title="Create New User"><i class="fa fa-user-plus"></i></a>
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
								<th class="col-md-1"><i class="fa fa-codepen"></i> Username</th>
								<th class="col-md-1"><i class="fa icon_profile"></i> Full Name</th>
		                        <th class="col-md-1"><i class="fa fa-certificate"></i> User Type</th>
		                        <th class="col-md-1"><i class="fa fa-clock-o"></i> Date Created</th>
		                        <th class="col-md-1"><i class="fa icon_cogs"></i> Action</th>
	                        </tr>
	                        <?php if(isset($users) && is_array($users)): foreach($users as $row): if($row->is_active):?> 
							<tr class="clickable-row" data-href="<?php echo base_url()?>users/profile/<?php echo $row->id?>">
								<td class="col-md-1 b"><?php echo $row->username ?></td>
								<td class="col-md-1 b"><?php echo $row->firstName ?> <?php echo $row->lastName ?></td>
								<td class="col-md-1 b"><?php echo $row->type_name; ?></td>
			                    <td class="col-md-1 b"><?php echo date('F d,Y (D)', strtotime($row->created_at))?></td>
			                    <td class="col-md-1">
			                	<div class="">
			                		<?php if($row->is_active == '1'){?>
			                		<a class="btn btn-caution" href="<?php echo base_url()?>users/disable/<?php echo $row->id?>" data-toggle="tooltip" data-placement="left" title="disable user"><i class="icon_close_alt2"></i></a>
			                		<?php } else if ($row->is_active != '1'){?>
			                			<a class="btn btn-success" href="<?php echo base_url()?>users/enable/<?php echo $row->id?>" data-toggle="tooltip" data-placement="left" title="enable user"><i class="icon_check_alt2"></i></a>
			                		<?php } ?>
			                        <a class="btn btn-danger"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>users/remove/<?php echo $row->id?>" data-toggle="tooltip" data-placement="right" title="delete user"><i class="icon_close_alt2"></i></a>
			                    </div>
	                           	</td>
							<?php 
							else: ?> 							
							<tr class="conf clickable-row" data-href="<?php echo base_url()?>users/profile/<?php echo $row->id?>">
								<td class="col-md-1 b"><?php echo $row->username ?></td>
								<td class="col-md-1 b"><?php echo $row->firstName ?> <?php echo $row->lastName ?></td>
								<td class="col-md-1 b"><?php echo $row->type_name; ?></td>
			                    <td class="col-md-1 b"><?php echo date('F d,Y (D)', strtotime($row->created_at))?></td>
			                    <td class="col-md-1">
			                	<div class="">
			                		<?php if($row->is_active == '1'){?>
			                		<a class="btn btn-caution" href="<?php echo base_url()?>users/disable/<?php echo $row->id?>" data-toggle="tooltip" data-placement="left" title="disable user"><i class="icon_close_alt2"></i></a>
			                		<?php } else if ($row->is_active != '1'){?>
			                			<a class="btn btn-success" href="<?php echo base_url()?>users/enable/<?php echo $row->id?>" data-toggle="tooltip" data-placement="left" title="enable user"><i class="icon_check_alt2"></i></a>
			                		<?php } ?>
			                        <a class="btn btn-danger"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>users/remove/<?php echo $row->id?>" data-toggle="tooltip" data-placement="right" title="delete user"><i class="icon_close_alt2"></i></a>
			                    </div>
	                           	</td>
							<?php endif;
							endforeach; ?>
							</tr>
							<?php elseif(isset($search) && is_array($search)): foreach($search as $row): if($row->is_active):?> 
							<tr class="clickable-row" data-href="<?php echo base_url()?>users/profile/<?php echo $row->id?>">
								<td class="col-md-1"><?php echo $row->username ?></td>
								<td class="col-md-1"><?php echo $row->firstName ?> <?php echo $row->lastName ?></td>
								<td class="col-md-1"><?php echo $row->type_name; ?></td>
			                    <td class="col-md-1"><?php echo date('F d,Y (D)', strtotime($row->created_at))?></td>
			                    <td class="col-md-1">
			                	<div class="">
			                		<?php if($row->is_active == '1'){?>
			                		<a class="btn btn-caution" href="<?php echo base_url()?>users/disable/<?php echo $row->id?>" data-toggle="tooltip" data-placement="left" title="disable user"><i class="icon_close"></i></a>
			                		<?php } else if ($row->is_active != '1'){?>
			                			<a class="btn btn-success" href="<?php echo base_url()?>users/enable/<?php echo $row->id?>" data-toggle="tooltip" data-placement="left" title="enable user"><i class="icon_check_alt2"></i></a>
			                		<?php } ?>
			                        <a class="btn btn-danger"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>users/remove/<?php echo $row->id?>" data-toggle="tooltip" data-placement="right" title="delete user"><i class="icon_close_alt2"></i></a>
			                    </div>
	                           	</td>
							<?php 
							else: ?> 							
							<tr class="conf clickable-row" data-href="<?php echo base_url()?>users/profile/<?php echo $row->id?>">
								<td class="col-md-1 b"><?php echo $row->username ?></td>
								<td class="col-md-1 b"><?php echo $row->firstName ?> <?php echo $row->lastName ?></td>
								<td class="col-md-1 b"><?php echo $row->type_name; ?></td>
			                    <td class="col-md-1 b"><?php echo date('F d,Y (D)', strtotime($row->created_at))?></td>
			                    <td class="col-md-1">
			                	<div class="">
			                		<?php if($row->is_active == '1'){?>
			                		<a class="btn btn-caution" href="<?php echo base_url()?>users/disable/<?php echo $row->id?>" data-toggle="tooltip" data-placement="left" title="disable user"><i class="icon_close_alt2"></i></a>
			                		<?php } else if ($row->is_active != '1'){?>
			                			<a class="btn btn-success" href="<?php echo base_url()?>users/enable/<?php echo $row->id?>" data-toggle="tooltip" data-placement="left" title="enable user"><i class="icon_check_alt2"></i></a>
			                		<?php } ?>
			                        <a class="btn btn-danger"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>users/remove/<?php echo $row->id?>" data-toggle="tooltip" data-placement="right" title="delete user"><i class="icon_close_alt2"></i></a>
			                    </div>
	                           	</td>
							<?php endif;
							endforeach; ?>
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
				<?php if(is_array($users) && sizeof($users)>0){?> 
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
 
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="vertical-alignment-helper">
	<div class="modal-dialog vertical-align-center">
		
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-user-plus"></i> Create New User Form</h4>
			</div>
		
			<div class="modal-body">
			<form class="form-group" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>users/add">
				
				<div class="form-group">
					<label for="firstName">First Name</label>
					<input type="text" name="firstName" class="form-control inline" required>
				</div>
				
				<div class="form-group">
					<label for="lastName">Last Name</label>
					<input type="text" name="lastName" class="form-control inline" required>
				</div>
				
				<div class="form-group">
					<label for="User Type">User Type</label>
					<select name="user_type" class="form-control inline" required>
					<option>Select an Option</option>
					<?php if(!empty($utype)){
						if (is_array($utype)){                      
							foreach ($utype as $row) {?>
								<option value="<?php echo $row['type_id']?>"><?php echo $row['type_name']; ?></option>
							<?php }
						}
					}
					else{	?>
						<option value=""></option>
					<?php }?>
					</select>
				</div>

				
			</div>
		
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<input type="submit" class="btn btn-success" value="Add">
			</div>
		</form>
		</div>
		
	</div>
	</div>
</div>