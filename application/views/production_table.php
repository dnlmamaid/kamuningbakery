<?php 
		$pg = $this->uri->segment('3');
		$body = $this->uri->segment('2');
	  	$head = $this->uri->segment('1');
?>
	<div class="container bg-panel">
			
		  <div class="row">
				<div class="col-lg-12">
					<h1 class="page-header"><i class="fa flaticon-stone2"></i> Production</h1>
					
					<div class="col-lg-3 col-xs-12 pull-left">
					<ol class="breadcrumb">
						<li><i class="fa flaticon-baker8"></i><a href="<?php echo base_url()?>"> Home</a></li>
						<li><i class="fa flaticon-stone2"></i> Production</li>
					</ol>
					</div>
					
					
					<div class="col-lg-6 col-xs-12" style="margin-bottom:15px;">
	    				<?php echo form_open('production/search')?>
						<div class="input-group">
		      				<input type="text" class="form-control pull-right" placeholder="Looking for Something?" name="search">
		      				<span class="input-group-btn"><button class="btn btn-theme" type="submit" data-toggle="tooltip" data-placement="top" title="Search Productions"><i class="glyphicon glyphicon-search"></i></button></span>
		      				<?php echo form_close()?>
		    			</div>
	    			</div>
	    			
	    			<div class="col-lg-2 col-xs-4 pull-right" style="margin-bottom:15px;">
	    				<a href="<?php echo base_url()?>production/report" type="button" data-toggle="tooltip" data-placement="top" title="Production Report" class="btn btn-caution"><i class="fa fa-line-chart"></i></button></a>
	    				<a type="button" alt="Finished Goods" data-toggle="tooltip" data-placement="top" title="Finished Goods" href="<?php echo base_url()?>inventory/finished_goods" class="btn btn-success"><i class="fa flaticon-breakfast27"></i></a>
	    				<?php if($this->session->userdata('user_type') == '4'):?>
		    			<a href="<?php echo base_url()?>production/create_production_batch" type="button" alt="Produce" data-toggle="tooltip" data-placement="top" title="Produce Goods" class="btn btn-theme"><i class="fa flaticon-baker7"></i></a>
		    			<?php endif;?>
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
							<div class="alert alert-production_batch" role="alert">
						<?php echo $this -> session -> flashdata('search'); ?>
							</div>
						<?php } ?> 
						
						<p style="color:red;">**ALL COSTS ARE PER UNIT</p>
						<div class="table-responsive"> 
							<table class="table table-advance table-hover">
								<tbody>
									<tr>
										<th class="col-md-1"><i class="fa fa-calendar"></i> Date Produced</th>
										<th class="col-md-1"><i class="fa flaticon-breakfast27"></i> Product Name</th>
			                            <th class="col-md-1"><i class="fa fa-tags"></i> Number of Goods Produced</th>
			                            <th class="col-md-1"><i class="fa">&#8369;</i> Net Cost</th>
			                            
	                              	</tr>
	                              	
	                              	<?php if(isset($production) && is_array($production)) : foreach($production as $row): ?> 
								  	<tr class="clickable-row" data-href="<?php echo base_url()?>production/production_batch/<?php echo $row->batch_id ?>">
								  		<td class="col-md-1"><?php echo date('F d,Y (D)', strtotime($row->date_produced))?></td>
										<td class="col-md-1"><?php echo $row->batch_id ?></td>
		                                <td class="col-md-1"><?php echo $row->net_produced_qty ?> units</td>
		                                <td class="col-md-1">&#8369; <?php echo $row->net_production_cost ?></td>
		                                <!--<td class="col-md-1">Php <?php echo $row->sale_Price?></td>-->
	                                </tr>	
									<?php endforeach;	                               
						   			elseif(isset($search) && is_array($search)): foreach($search as $row):?>
									<tr class="clickable-row" data-href="<?php echo base_url()?>production/production_batch/<?php echo $row->batch_id ?>">
										<td class="col-md-1"><?php echo date('F d,Y (D)', strtotime($row->date_produced))?></td>
										<td class="col-md-1"><?php echo $row->batch_id ?></td>
		                                <td class="col-md-1"><?php echo $row->net_produced_qty ?> units</td>
		                                <td class="col-md-1">Php <?php echo $row->net_production_cost ?></td>
	                               </tr>
	                                <?php endforeach;		                               
									else:?>
									<tr>											
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
 
