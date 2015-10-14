<?php $body = $this->uri->segment('2'); ?>
<div class="container bg-panel">
	<div class="row">
		<div class="col-lg-12">
		<h1 class="page-header"><i class="fa fa-tags"></i> Product Classification</h1>
			<div class="col-lg-6 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa fa-laptop"></i><a href="<?php echo base_url()?>dashboard">Dashboard</a></li>
					<li><i class="icon icon_cart"></i><a href="<?php echo base_url()?>products">Products</a></li>
					<li><i class="fa fa-tags"></i>Product Classification</li>
				</ol>
			</div>
				
	    	<div class="col-lg-3 pull-right">
	    		<a alt="Add New Class" data-toggle="modal" data-target="#addCat" data-placement="top" title="Add New class" class="btn btn-theme pull-right"><i class="fa fa-tags"></i></a>
			</div>
				
		</div>
	</div>
		
	
	<div class="row">
		<div class="col-lg-12">
				<section class="panel">
                <?php if($this->session->flashdata('search')){?>	
				<div class="alert alert-info" role="alert">
					<?php echo $this -> session -> flashdata('search'); ?>
				</div>
				<?php } ?>
				<?php if($this->session->flashdata('success')){?>	
				<div class="alert alert-success" role="alert">
					<?php echo $this -> session -> flashdata('success'); ?>
				</div>
				<?php } ?>
				<?php if($this->session->flashdata('error')){?>	
				<div class="alert alert-danger" role="alert">
					<?php echo $this -> session -> flashdata('error'); ?>
				</div>
				<?php } ?> 
				<div class="table-responsive"> 
					<table class="table table-advance">
						<tbody>
							<tr>
								<th class="col-md-2"><i class="fa fa-tags"></i> class Name</th>
								<th class="col-md-6"><i class="fa fa-list-alt"></i> Description</th>
	                            <th class="col-md-1"><i class="icon_cogs"></i> Action</th>
	                        </tr>
	                        <?php if(isset($cls) && is_array($cls)): foreach($cls as $row): if($row['class_Status'] =='0'){?>
						    <tr class="conf clickable-row" data-href="<?php echo base_url()?>products/edit_class/<?php echo $row['class_ID'] ?>">
								<td class="col-md-2-b"><i class="fa fa-exclamation" style="color:red;"></i> <?php echo $row['class_Name'] ?></td>
								<td class="col-md-6-b"><?php echo $row['class_Definition'] ?></td>
		                        <td class="col-md-1">
				                    <div class="btn-group">
				                    	<a class="btn btn-success" href="<?php echo base_url()?>products/edit_class/<?php echo $row['class_ID'] ?>" data-toggle="tooltip" data-placement="left" title="edit class"><i class="icon icon_pencil-edit"></i></a>
				                        <a class="btn btn-danger"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>products/deleteClass/<?php echo $row['class_ID'] ?>" data-toggle="tooltip" data-placement="right" title="delete product"><i class="icon_close_alt2"></i></a>
				                    </div>
	                            </td>
							<?php } 							
	                        else{ ?>	
	                        <tr class="clickable-row" data-href="<?php echo base_url()?>products/edit_class/<?php echo $row['class_ID'] ?>">
		                        <td class="col-md-2"><?php echo $row['class_Name'] ?></td>
								<td class="col-md-6"><?php echo $row['class_Definition'] ?></td>
		                        <td class="col-md-1">
				                    <div class="btn-group">
				                    	<a class="btn btn-success" href="<?php echo base_url()?>products/edit_class/<?php echo $row['class_ID'] ?>" data-toggle="tooltip" data-placement="left" title="edit class"><i class="icon icon_pencil-edit"></i></a>
				                        <a class="btn btn-danger"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>products/deleteClass/<?php echo $row['class_ID'] ?>" data-toggle="tooltip" data-placement="right" title="delete class"><i class="icon_close_alt2"></i></a>
				                    </div>
	                            </td>
	                       <?php } ?>
						   </tr>
						   <?php endforeach;	                               
							else:?>
								<th><div>No records</div></th>
							<?php endif; ?>                              
	                       	</tbody>
	                        </table>
	                     </div>
                      </section>
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
						<label for="status">Enabled</label>
				  		<select name="status" class="form-control">
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
              
		</div>
</div>

