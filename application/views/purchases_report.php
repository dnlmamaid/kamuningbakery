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
				<div class="col-md-6 col-md-offset-3" style="margin-top:15px;">
					<h2 align="center">Purchases Report</h2>
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
					<h4>Total Purchases: ₱ <strong><?php echo number_format((float)$total->total, 2, '.', '');?></strong></h4>
				</div>
			</div>
			
	
			<div class="row">
				<div class="col-md-3">
					<button onclick="print()" class="btn btn-theme  hidden-print"><span class="fa fa-print"></span> Print</button>
				</div>
				
				<div class="col-md-9 btn-group pull-right">
					<form action="<?php echo base_url();?>purchases/by_date" method="post" accept-charset="utf-8" class="form-inline" style="float:right">
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
						<th class="col-md-1"><i class="fa fa-barcode"></i> Reference No.</th>
			            <th class="col-md-1"><i class="fa fa-truck"></i> Supplier</th>
			            <th class="col-md-1"><i class="fa fa-dollar"></i> Total</th>
			            <th class="col-md-1"><i class="fa fa-clock-o"></i> Date</th>
			            
					</tr>
	                              	
	                <?php if(isset($purchases) && is_array($purchases)) : foreach($purchases as $row): ?> 
					<tr class="clickable-row" data-href="<?php echo base_url()?>purchases/view_purchase/<?php echo $row->purchase_id?>">
						<td class="col-md-1"><?php echo $row->purchase_reference ?></td>
		                <td class="col-md-1"><?php echo $row->supplier_name ?></td>
						<td class="col-md-1"><?php echo $row->total_cost?></td>
						<td class="col-md-1"><?php echo date('F d,Y (D) h:i A', strtotime($row->date_received))?></td>
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
              
	
	<!-- page end-->
	            
</div>
<!-- /#page-content-wrapper -->
 
