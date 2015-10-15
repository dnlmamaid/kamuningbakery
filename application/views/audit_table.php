<?php $body = $this->uri->segment('2'); ?>

	<div class="container bg-panel">
			
		  <div class="row">
				<div class="col-lg-12">
					<h1 class="page-header"><i class="fa fa-archive"></i> Audit Trail</h1>
					
					<div class="col-lg-3 pull-left">
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url()?>"> Home</a></li>
						<li><i class="fa fa-archive"></i><a href="<?php echo base_url()?>audit_trail"> Audit Trail</a></li>
					</ol>
					</div>
					
					
					<div class="col-lg-6 form-inline align-center">
	    				<?php echo form_open('audit_trail/search')?>
						<div class="input-group">
		      				<input type="text" class="form-control pull-right" placeholder="Looking for Something?" name="search">
		      				<span class="input-group-btn"><button class="btn btn-theme" type="submit"><i class="glyphicon glyphicon-search"></i></button></span>
		      				<?php echo form_close()?>
		    			</div>
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
						<?php if($this->session->flashdata('search')){?>
							<div class="alert alert-info" role="alert">
						<?php echo $this -> session -> flashdata('search'); ?>
							</div>
						<?php } ?> 
						<div class="table-responsive"> 
							<table class="table table-advance">
								<tbody>
									<tr>
										<th class="col-md-1"><i class="fa fa-barcode"></i> Module</th>
										<th class="col-md-2"><i class="fa fa-cog"></i> Action</th>
										<th class="col-md-1"><i class="fa fa-user"></i> Modified By</th>
			                            <th class="col-md-1"><i class="fa fa-clock-o"></i> Date</th>
			                            <!--<th class="col-md-1"><i class="icon_cogs"></i> Action</th>-->
	                              	</tr>
	                              	
	                              	<?php if(isset($audit) && is_array($audit)) : foreach($audit as $row): ?> 
								  	<tr class="conf clickable-row" data-href="<?php echo base_url()?>audit_trail/view_action/<?php echo $row->audit_id?>">
								  		<td class="col-md-1"><?php echo $row->module ?></td>
								  		<td class="col-md-2"><?php echo $row->remarks ?></td>
										<td class="col-md-1"><?php echo $row->firstName ?> <?php echo $row->lastName ?></td>
		                                <td class="col-md-1"><?php echo $row->date_created ?></td>
		                                <!--<td class="col-md-1">
			                                <div class="btn-group">
			                                  <a class="btn btn-danger"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>audit_trail/remove/<?php echo $row->audit_id?>" data-toggle="tooltip" data-placement="right" title="delete user"><i class="icon_close_alt2"></i></a>
			                                </div>
	                                	</td>-->
	                                </tr>	
									<?php endforeach;	                               
						   			elseif(isset($search) && is_array($search)): foreach($search as $row):?>
									<tr class="conf clickable-row" data-href="<?php echo base_url()?>audit_trail/view_action/<?php echo $row->audit_id?>">
								  		<td class="col-md-1"><?php echo $row->module ?></td>
								  		<td class="col-md-2"><?php echo $row->remarks ?></td>
										<td class="col-md-1"><?php echo $row->firstName ?> <?php echo $row->lastName ?></td>
		                                <td class="col-md-1"><?php echo $row->date_created ?></td>
		                                <!--<td class="col-md-1">
			                                <div class="btn-group">
			                                  <a class="btn btn-danger"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>audit_trail/remove/<?php echo $row->audit_id?>" data-toggle="tooltip" data-placement="right" title="delete user"><i class="icon_close_alt2"></i></a>
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
                      </section>
                  </div>
              </div>
              
           <?php if($body != 'search_result'){ ?>
				<div class="row">
					<div class="col-lg-8 col-lg-offset-4">
						<div id="pagination">
							<ul class="tsc_pagination">
							<?php if(is_array($audit) && sizeof($audit)>0){?> 
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
 
