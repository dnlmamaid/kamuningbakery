<?php 
		$pg = $this->uri->segment('3');
		$body = $this->uri->segment('2');
	  	$head = $this->uri->segment('1');
		if($this->session->userdata('user_type') <= ('3' || '5')):
?>
<div class="container bg-panel">
			
	<div class="row">
		<div class="col-lg-12">

			<center><img src="<?php echo base_url()?>assets/images/kb_logo(edited).png" class="img-responsive" align="center"></center>
			<b><p class="page-header" align="center">43 Judge Jimenez St. Corner K-1st, Kamuning Quezon City</p></b>
								
			<div class="row">
				<div class="col-md-6 col-md-offset-3" style="margin-top:10px;">
					<h2 align="center">Product Sales Report</h2>
					<?php foreach($sales as $row)?>
					<h3 align="center"><strong><?php echo $row->product_Name?></strong></h3>
					<p align="center">As of <strong><?php echo date('F d, Y'); ?></strong></p>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
				
					<h4>Total Sales of <?php echo $row->product_Name?>: ₱ <strong><?php echo number_format((float)$total->total, 2, '.', '');?></strong></h4>
				</div>
				
				<div class="col-lg-4 pull-right">
					<div class="form-group">
						<select name="product_id" class="form-control" onChange="window.document.location.href=this.options[this.selectedIndex].value;" value="GO">
							<option value="">Select Product</option>
							<?php if(!empty($products)){
								if (is_array($products)){                      
									foreach ($products as $row) {?>
										<option value="<?php echo base_url()?>sales/report_by_product/<?php echo $row['product_id']?>"><?php echo $row['product_Name']; ?></option>
									<?php }
								}							
							}
																	
							else{	?>
								<option value=""></option>
							<?php }?>
						</select>			
					</div>
				</div>
			</div>
			
			
					
			<div class="row">
				<div class="col-md-3">
					<button onclick="print()" class="btn btn-theme  hidden-print"><span class="fa fa-print"></span> Print</button>
					<a href="<?php echo base_url()?>sales" type="button" data-toggle="tooltip" data-placement="top" title="back to sales" class="btn btn-caution hidden-print"><i class="fa fa-dollar"></i></button></a>				
				</div>
				
				<div class="col-md-9 btn-group pull-right">
					<form action="<?php echo base_url();?>sales/by_date" method="post" accept-charset="utf-8" class="form-inline" style="float:right">
			              <input name="sdate" id="sdate"  class="form-control  hidden-print" placeholder="Start Date">
			              <input name="edate" id="edate"  class="form-control  hidden-print"  placeholder="End Date">
			              <button type="submit" class="btn btn-theme  hidden-print pull-right" name="search" value="Search" style="margin-bottom:12px;"><i class="fa fa-search"></i> Search</button>
			         </form>
				</div>
			</div>  
		
			    
					
			
		</div>
	</div>
	<!-- page start
	<div class="row">
		<div class="col-lg-12">
			<div id="donut-example"></div>
			
		</div>
	</div>
	-->
    
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
				<table class="table table-advance">
					<tbody>
					<tr>
						<th class="col-md-1"><i class="fa fa-barcode"></i> Invoice ID</th>
			            <th class="col-md-1"><i class="fa icon_cart_alt"></i> Product</th>
			            <th class="col-md-1"><i class="fa fa-user"></i> Employee</th>
			            <th class="col-md-1"><i class="fa fa-tag"></i> Quantity</th>
			            <th class="col-md-1"><i class="fa fa-dollar"></i> Total</th>
			            <th class="col-md-2"><i class="fa fa-clock-o"></i> Date</th>
					</tr>
	                              	
	                <?php if(isset($sales) && is_array($sales)) : foreach($sales as $row): ?> 
						<tr class="clickable-row" data-href="<?php echo base_url()?>sales/sales_invoice/<?php echo $row->siv_id?>">
						<td class="col-md-1"><?php echo $row->invoice_code ?></td>
						<td class="col-md-1"><?php echo $row->product_Name ?></td>
		                <td class="col-md-1"><?php echo $row->lastName ?>, <?php echo $row->firstName ?></td>
		                <td class="col-md-1"><?php echo $row->qty_sold?> <?php if($row->um == 'pc'){echo $row->um;?>s<?php } else{ echo $row->um;}?></td>
		                <td class="col-md-1"><?php echo $row->total_sale?></td>
						<td class="col-md-2"><?php echo date('F d,Y (D) h:i A', strtotime($row->sales_date))?></td>
					</tr>	
					<?php endforeach;	                               
					else:?>
					<tr>											
						<th>No records</th>
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
              
	<?php if($body != ('search_result' || 'by_date')){ ?>
	<div class="row">
		<div class="col-lg-8 col-lg-offset-4">
			<div id="pagination">
				<ul class="tsc_pagination">
				<?php if(is_array($sales) && sizeof($sales)>0){?> 
					<div class="pagination pull-left" style="margin:10px 0px 5px 0px;"><?php echo (!empty($pagermessage) ? $pagermessage : ''); ?></div>
						<?php echo $paginglinks; }?>
				</ul>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- page end-->
	            
</div>
<!-- /#page-content-wrapper -->
 <?php endif;?>
