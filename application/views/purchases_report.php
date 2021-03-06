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
			
			<?php if($body == 'report'){?>					
			<div class="row">
				<div class="col-md-6 col-md-offset-3" style="margin-top:15px;">
					<h2 align="center">Purchases Report</h2>					
					<p align="center">As of <strong><?php echo date('F d, Y'); ?></strong></p>
					<p align="center">Prepared By: <?php echo $this->session->userdata('username')?></p>
				</div>
			</div>
			<?php } ?>
			
			<div class="row">
				<div class="col-md-3">
					<h4>Total Purchases: ₱ <strong><?php echo number_format((float)$total->total, 2, '.', '');?></strong></h4>
				</div>
			</div>
			
	
			<div class="row">
				<div class="col-md-3">
					<button onclick="print()" class="btn btn-theme  hidden-print"><span class="fa fa-print"></span> Print</button>
					<a href="<?php echo base_url()?>purchases" type="button" data-toggle="tooltip" data-placement="top" title="back to purchases" class="btn btn-caution hidden-print"><i class="fa icon_datareport"></i></button></a>
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
	<!-- Chart -->
	<div class="row">
	    <div class="col-lg-12">
    		<section class="col-lg-12 panel">
			<div class="col-lg-12">
				<div id="purchases-report-line"></div>
			</div>
			</section>
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
						<th class="col-md-1"><i class="fa fa-barcode"></i> Reference No.</th>
						<th class="col-md-1"><i class="fa fa-truck"></i> Supplier</th>
					    <th class="col-md-1"><i class="fa">&#8369;</i> Total</th>
					    <th class="col-md-1"><i class="fa fa-clock-o"></i> Date</th>
					            
					</tr>
			                              	
			        <?php if(isset($purchases_t) && is_array($purchases_t)) : foreach($purchases_t as $row): if($row->po_status == '1'):?> 
					<tr class="clickable-row" data-href="<?php echo base_url()?>purchases/purchase_order/<?php echo $row->purchase_reference?>">
						<td class="col-md-1"><?php echo $row->purchase_reference ?></td>
				        <td class="col-md-1"><?php echo $row->supplier_name ?></td>
						<td class="col-md-1">&#8369; <?php echo $row->total_cost?></td>
						<td class="col-md-1"><?php echo date('F d,Y (D) h:i A', strtotime($row->date_received))?></td>
			 		</tr>	
					<?php endif;endforeach;	                               
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
			<section class="col-lg-12 panel">
		</div>
	</div>
	
   	<?php if($body != ('search_result' || 'by_date')){ ?>
	<div class="row">
		<div class="col-lg-8 col-lg-offset-4">
			<div id="pagination">
				<ul class="tsc_pagination">
				<?php if(is_array($purchases_t) && sizeof($purchases_t)>0){?> 
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
</div>
 
