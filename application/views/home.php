<!-- Page Content -->
<div id="page-content-wrapper">
	<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
		<span class="hamb-top"></span>
		<span class="hamb-middle"></span>
		<span class="hamb-bottom"></span>
	</button>
            
	<div class="container">
            	
		<div class="row">                   
			<div class="col-lg-12">
				
				<div class="col-lg-4">
					<a href="<?php echo base_url()?>users" data-toggle="tooltip" data-placement="top" title="Total Number of Users">
					<div class="info-box green-bg">
						<i class="icon_group"></i>
						<div class="count">
							8
						</div>
						<div class="title">
							Users
						</div>
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->

				<div class="col-lg-4">
					<a href="<?php echo base_url()?>products" data-toggle="tooltip" data-placement="top" title="Total Number of Products">
					<div class="info-box blue-bg">
						<i class="fa fa-shopping-cart"></i>
						<div class="count">
							51
						</div>
						<div class="title">
							Products
						</div>
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
						
				<div class="col-lg-4">
					<a href="<?php echo base_url()?>products" data-toggle="tooltip" data-placement="top" title="Total Number of Products">
					<div class="info-box greenLight-bg">
						<i class="fa fa-dollar"></i>
						<div class="count">
							Sales
						</div>
						<div class="title">
						</div>
					</div><!--/.info-box-->
					</a>
				</div><!--/.col-->
			
			</div>
		</div>
                
		<!-- tables-->
		<div class="row">
			<h3><i class="fa fa-dollar"></i> Highest Selling Products</h3>
			<div class="col-lg-6 col-xs-6">
				<section class="panel">
					
				<?php if($this->session->flashdata('message')){ ?>
					<div class="alert alert-success" role="alert"><?php echo $this -> session -> flashdata('message'); ?></div>
				<?php } ?>
				<?php if($this->session->flashdata('search')){?>	
					<div class="alert alert-info" role="alert"><?php echo $this -> session -> flashdata('search'); ?></div>
				<?php } ?>
				<?php if($this->session->flashdata('message_sent')){?>
					<div class="alert alert-success" role="alert">
				<?php echo $this -> session -> flashdata('message_sent'); ?>
					</div>
				<?php } ?>

				<div class="table-responsive"> 
					<table class="table table-advance">
					<tbody>
						<tr>
							<th class="col-md-2"><i class="fa icon_cart"></i> Product Name</th>
                            <th class="col-md-2"><i class="fa fa-dollar"></i> Price</th>
							<th class="col-md-2"><i class="fa fa-dollar"></i> Total Sold</th>
						</tr>
                        
                        <tr class="conf clickable-row" data-href="#">
							<td class="col-md-2-b"> Malungay pandesal</a></td>
                            <td class="col-md-2-b">Php 1</a></td>
                            <td class="col-md-2-b">3250 pcs</a></td>                                                           
                        </tr>
                              	
                           </tbody>
                        </table>
                        </div>
                      </section>
                  </div>
              </div>
              
             
            </div>
            
        </div>
        <!-- /#page-content-wrapper -->