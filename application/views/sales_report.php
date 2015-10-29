<?php 
		$pg = $this->uri->segment('3');
		$body = $this->uri->segment('2');
	  	$head = $this->uri->segment('1');
?>
<div class="container bg-panel">
			
	<div class="row">
		<div class="col-lg-12">

			<center><img src="<?php echo base_url()?>assets/images/kb_logo(edited).png" class="img-responsive" align="center"></center>
			<b><p class="page-header" align="center">43 Judge Jimenez St. Corner K-1st, Kamuning Quezon City</p></b>
					
					
		
			
			<div class="row">
				<div class="col-md-6 col-md-offset-3" style="margin-top:10px;">
					<h2 align="center">Sales Report</h2>
					<?php if($body == 'report'){?>
						<p align="center">As of <strong><?php echo date('F d, Y'); ?></strong></p>
					<?php }
					else{ ?> 
					<p align="center">From <strong><?php echo date('F d, Y', strtotime($sdate)); ?></strong> to <strong><?php echo date('F d,Y', strtotime($edate)); ?></strong></p>
					<?php }?>
					<p align="center">Prepared By: <?php echo $this->session->userdata('username')?></p>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-3">
					<h4>Total Sales: ₱ <strong><?php echo number_format((float)$total->total, 2, '.', '');?></strong></h4>
				</div>
			</div>
					
			<div class="row">
				<div class="col-md-3">
					<button onclick="print()" class="btn btn-theme  hidden-print"><span class="fa fa-print"></span> Print</button>
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
						<tr class="clickable-row" data-href="<?php echo base_url()?>sales/sales_invoice/<?php echo $row->sales_id?>">
						<td class="col-md-1"><?php echo $row->invoice_code ?></td>
						<td class="col-md-1"><?php echo $row->product_Name ?></td>
		                <td class="col-md-1"><?php echo $row->lastName ?>, <?php echo $row->firstName ?></td>
		                <td class="col-md-1"><?php echo $row->total_quantity?> <?php if($row->um == 'pc'){echo $row->um;?>s<?php } else{ echo $row->um;}?></td>
		                <td class="col-md-1"><?php echo $row->total_sales?></td>
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
              
	<?php if($body != 'search_result'){ ?>
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
 
