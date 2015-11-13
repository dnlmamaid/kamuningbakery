<?php 
		$pg = $this->uri->segment('3');
		$body = $this->uri->segment('2');
	  	$head = $this->uri->segment('1');
?>
	<div class="container bg-panel">
			
		  <div class="row">
				<div class="col-lg-12">
					<h1 class="page-header"><i class="fa fa-comments-o"></i> Requests</h1>
					
					<div class="col-lg-3 col-xs-12 pull-left">
					<ol class="breadcrumb">
						<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
						<li><i class="fa fa-comments-o"></i> Requests</li>
					</ol>
					</div>
					
					
					<div class="col-lg-6 col-xs-12" style="margin-bottom:15px;">
	    				<?php echo form_open('requests/search')?>
						<div class="input-group">
		      				<input type="text" class="form-control pull-right" placeholder="Looking for Something?" name="search" required>
		      				<span class="input-group-btn"><button class="btn btn-theme" type="submit" data-toggle="tooltip" data-placement="top" title="Search Requests"><i class="glyphicon glyphicon-search"></i></button></span>
		      			<?php echo form_close()?>
		    			</div>
	    			</div>
	    			
	    			<div class="col-lg-1 col-xs-2 pull-right" style="margin-bottom:15px;">
		    			<a href="<?php echo base_url()?>requests/create_request_order" alt="Request" data-toggle="tooltip" data-placement="top" title="Request Raw Materials" class="btn btn-theme"><i class="fa fa-comment"></i></a>		    			
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
						<?php if($this->session->flashdata('search')){?>
							<div class="alert alert-info" role="alert">
						<?php echo $this -> session -> flashdata('search'); ?>
							</div>
						<?php } ?> 
						<div class="table-responsive"> 
							<table class="table table-advance table-hover">
								<tbody>
									<tr>
										<th class="col-md-1"><i class="fa fa-calendar"></i> Date Requested</th>
										<th class="col-md-1"><i class="fa flaticon-barcode12"></i> Request ID</th>
										<th class="col-md-1"><i class="fa fa-user"></i> User</th>
	                              	</tr>
	                              	
	                              	<?php if(isset($requests) && is_array($requests)) : foreach($requests as $row): if($row->request_status != '0'):?> 
								  	<tr class="clickable-row" data-href="<?php echo base_url()?>requests/request_order/<?php echo $row->ro_reference?>">
								  		<td class="col-md-1"><?php echo date('F d,Y (D)', strtotime($row->request_date))?></td>
								  		<td class="col-md-1"><?php echo $row->ro_reference ?></td>
		                                <td class="col-md-1"><?php echo $row->type_name ?> <?php echo $row->firstName ?></td>
		                                
	                                </tr>
	                                
									<?php else: ?>
									<tr class="conf clickable-row" data-href="<?php echo base_url()?>requests/request_order/<?php echo $row->ro_reference?>">
								  		<td class="col-md-1"><?php echo date('F d,Y (D)', strtotime($row->request_date))?></td>
								  		<td class="col-md-1"><?php echo $row->ro_reference ?></td>
		                                <td class="col-md-1"><?php echo $row->type_name ?> <?php echo $row->firstName ?></td>
		                                
	                                </tr>
									<?php endif;
									endforeach;	                               
						   			elseif(isset($search) && is_array($search)): foreach($search as $row): if($row->request_status != '0'):?>
									<tr class="clickable-row" data-href="<?php echo base_url()?>requests/request_order/<?php echo $row->ro_reference?>">
								  		<td class="col-md-1"><?php echo date('F d,Y (D)', strtotime($row->request_date))?></td>
								  		<td class="col-md-1"><?php echo $row->ro_reference ?></td>
		                                <td class="col-md-1"><?php echo $row->type_name ?> <?php echo $row->firstName ?></td>
		                                
	                                </tr>
									<?php else: ?>
									<tr class="conf clickable-row" data-href="<?php echo base_url()?>requests/request_order/<?php echo $row->ro_reference?>">
								  		<td class="col-md-1"><?php echo date('F d,Y (D)', strtotime($row->request_date))?></td>
								  		<td class="col-md-1"><?php echo $row->ro_reference ?></td>
		                                <td class="col-md-1"><?php echo $row->type_name ?> <?php echo $row->firstName ?></td>
		                                
	                                </tr>
									<?php endif;
									endforeach;		                               
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
                      </section>
                  </div>
              </div>
              
           <?php if($body != 'search_result'){ ?>
				<div class="row">
					<div class="col-lg-8 col-lg-offset-4">
						<div id="pagination">
							<ul class="tsc_pagination">
							<?php if(is_array($requests) && sizeof($requests)>0){?> 
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
 
