<?php $body = $this->uri->segment('2'); ?>

	<div class="container bg-panel">
			
		  <div class="row">
				<div class="col-lg-12">
					<h1 class="page-header"><i class="fa icon_cart"></i> Products</h1>
					
					<div class="col-lg-3 pull-left">
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url()?>dashboard"> Home</a></li>
						<li><i class="fa icon_cart"></i><a href="<?php echo base_url()?>Products"> Products</a></li>
					</ol>
					</div>
					
					
					<div class="col-lg-6 form-inline align-center">
	    				<?php echo form_open('products/search')?>
						<div class="input-group">
		      				<input type="text" class="form-control pull-right" placeholder="Looking for Something?" name="search">
		      				<span class="input-group-btn"><button class="btn btn-theme" type="submit"><i class="glyphicon glyphicon-search"></i></button></span>
		      				<?php echo form_close()?>
		    			</div>
	    			</div>
	    			
	    			<div class="col-lg-3 pull-right">
		    			<a alt="Classifications" data-toggle="tooltip" data-placement="top" title="Classifications" href="<?php echo base_url()?>products/classes" class="btn btn-caution pull-right" style="margin-right:5px;"><i class="fa fa-tags"></i></a>
		    			
		    			<a alt="Add New Product" data-toggle="tooltip" data-placement="top" title="Add New Product" href="<?php echo base_url()?>products/create_new_product" class="btn btn-theme pull-right" style="margin-right:5px;"><i class="fa fa-cart-plus"></i></a>
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
										<th class="col-md-1"><i class="fa icon_cart"></i> Product Name</th>
			                            <th class="col-md-1"><i class="fa fa-barcode"></i> Code</th>
			                            <th class="col-md-1"><i class="fa fa-tags"></i> Class</th>
			                            <th class="col-md-1"><i class="fa fa-tag"></i> Category</th>
			                            <th class="col-md-1"><i class="icon_cogs"></i> Action</th>
	                              	</tr>
	                              	
	                              	<?php if(isset($products) && is_array($products)) : foreach($products as $row): ?> 
								  	<tr class="conf clickable-row" data-href="<?php echo base_url()?>Products/profile/<?php echo $row->id?>">
										<td class="col-md-1-b"><?php echo $row->firstName ?> <?php echo $row->lastName ?></td>
		                                <td class="col-md-1-b"><?php echo $row->email ?></td>
		                                <td class="col-md-1-b"><?php echo $row->company ?></td>
		                                <td class="col-md-1-b"><?php echo $row->contact ?></td>
		                                <td class="col-md-1">
			                                <div class="btn-group">
			                                  <a class="btn btn-success" href="<?php echo base_url()?>Products/profile/<?php echo $row->id?>"><i class="icon_check_alt2"></i></a>
			                                  <a class="btn btn-danger"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>Products/remove/<?php echo $row->id?>" data-toggle="tooltip" data-placement="right" title="delete user"><i class="icon_close_alt2"></i></a>
			                                </div>
	                                	</td>
	                                </tr>	
									<?php endforeach;	                               
						   			elseif(isset($search) && is_array($search)): foreach($search as $row):?>
									<tr class="conf clickable-row" data-href="<?php echo base_url()?>Products/profile/<?php echo $row->id?>">
										<td class="col-md-1-b"><?php echo $row->firstName ?> <?php echo $row->lastName ?></td>
		                                <td class="col-md-1-b"><?php echo $row->email ?></td>
		                                <td class="col-md-1-b"><?php echo $row->company ?></td>
		                                <td class="col-md-1-b"><?php echo $row->contact ?></td>
		                                <td class="col-md-1">
			                                <div class="btn-group">
			                                  <a class="btn btn-success" href="<?php echo base_url()?>Products/profile/<?php echo $row->id?>"><i class="icon_check_alt2"></i></a>
			                                  <a class="btn btn-danger"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>Products/remove/<?php echo $row->id?>" data-toggle="tooltip" data-placement="right" title="delete user"><i class="icon_close_alt2"></i></a>
			                                </div>
	                                	</td>
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
							<?php if(is_array($products) && sizeof($products)>0){?> 
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
 
