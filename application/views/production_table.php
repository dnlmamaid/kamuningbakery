<?php 
		$pg = $this->uri->segment('3');
		$body = $this->uri->segment('2');
	  	$head = $this->uri->segment('1');
?>
	<div class="container bg-panel">
			
		  <div class="row">
				<div class="col-lg-12">
					<h1 class="page-header"><i class="fa flaticon-breakfast27"></i> Production</h1>
					
					<div class="col-lg-3 col-xs-12 pull-left">
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url()?>"> Home</a></li>
						<li><i class="fa flaticon-breakfast27"></i> Production</li>
					</ol>
					</div>
					
					
					<div class="col-lg-6 col-xs-12">
	    				<?php echo form_open('production/search')?>
						<div class="input-group">
		      				<input type="text" class="form-control pull-right" placeholder="Looking for Something?" name="search">
		      				<span class="input-group-btn"><button class="btn btn-theme" type="submit" data-toggle="tooltip" data-placement="top" title="Search Productions"><i class="glyphicon glyphicon-search"></i></button></span>
		      				<?php echo form_close()?>
		    			</div>
	    			</div>
	    			
	    			<div class="col-lg-1 col-xs-2 pull-right">
		    			<a alt="Produce" data-toggle="tooltip" data-placement="top" title="Produce" href="<?php echo base_url()?>production/produce_goods" class="btn btn-theme pull-right"><i class="fa fa-plus"></i></a>
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
						
						<p style="color:red;">**ALL COSTS ARE PER UNIT</p>
						<div class="table-responsive"> 
							<table class="table table-advance table-hover">
								<tbody>
									<tr>
										<th class="col-md-1"><i class="fa icon_cart"></i> Date</th>
			                            <th class="col-md-1"><i class="fa fa-tags"></i> Number of Goods Produced</th>
			                            
			                            <th class="col-md-1"><i class="fa fa-dollar"></i> Total Cost</th>
			                            <th class="col-md-1"><i class="fa fa-cogs"></i> Action</th>
	                              	</tr>
	                              	
	                              	<?php if(isset($production) && is_array($production)) : foreach($production as $row): ?> 
								  	<tr class="clickable-row" data-href="<?php echo base_url()?>products/view_product/<?php echo $row->product_id?>">
										<td class="col-md-1"><?php echo $row->product_Name ?></td>
		                                <td class="col-md-1"><?php echo $row->total_produced ?> <?php if($row->um == 'pc'){echo $row->um;?>s<?php } else{ echo $row->um;}?></td>
		                                <td class="col-md-1">Php <?php echo $row->total_production_cost ?></td>
		                                <!--<td class="col-md-1">Php <?php echo $row->sale_Price?></td>-->
	                                </tr>	
									<?php endforeach;	                               
						   			elseif(isset($search) && is_array($search)): foreach($search as $row):?>
									<tr class="clickable-row" data-href="<?php echo base_url()?>products/view_product/<?php echo $row->product_id?>">
										<td class="col-md-1"><?php echo $row->product_Name ?></td>
		                                <td class="col-md-1"><?php echo $row->total_produced ?> <?php if($row->um == 'pc'){echo $row->um;?>s<?php } else{ echo $row->um;}?></td>
		                                <td class="col-md-1">Php <?php echo $row->total_production_cost ?></td>
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
							<?php if(is_array($production) && sizeof($production)>0){?> 
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
 
