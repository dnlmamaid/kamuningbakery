<!--main content start-->
<section id="main-content">
	<div class="container">
	<div class="wrapper">
		<?php foreach ($rec as $r)?>
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><?php echo $r->class_Name?></h3>
				<ol class="breadcrumb">
					<li><i class="fa fa-laptop"></i><a href="<?php echo base_url()?>dashboard">Dashboard</a></li>
					<li><i class="icon_cart"></i><a href="<?php echo base_url()?>products">Products</a></li>
					<li><i class="fa fa-tags"></i><a href="<?php echo base_url()?>products/classes">Product Classifications</a></li>
					<li><?php echo $r->class_Name?></li>
				</ol>
			</div>
		</div>	
		
  		
  		
  		<!-- page start-->
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<section class="panel">
					<div class="panel-body-whole">
						<div class="tab-content">
							<div class="tab-pane active">
								<section class="panel bio-graph-info">
								
									<form class="form-horizontal" role="form" action="<?php echo base_url()?>products/updateClass/<?php echo $r->class_ID?>" method="post">
										
											<div class="form-group">
												<label class="col-lg-2 control-label">Name</label>
												<div class="col-lg-10 ">
													<input type="text" class="form-control" name="class_Name" value="<?php echo $r->class_Name ?>">
												</div>
											</div>
	
											<div class="form-group">
												<label class="col-lg-2 control-label">Definition</label>
												<div class="col-lg-10">
													<textarea class="form-control" name="class_Definition"><?php echo $r->class_Definition ?></textarea>
												</div>
											</div>
											
											<div class="form-group">
											 	<label class="col-lg-2 control-label">Enabled</label>
											 	<div class="col-lg-3">
				  									<select name="class_Status" class="form-control">
				  										<?php if ($r->class_Status == 1){?>
				  										<option value="1" selected>Yes</option>
							  							<option value="0">No</option>
							  							<?php }
														else if($r->class_Status == 0){ ?> 
							  							<option value="0" selected>No</option>
														<option value="1">Yes</option>
														<?php } ?>
													</select>
												</div>
			  								</div>
			  								<?php if($this->session->flashdata('success')){?>
			  								<div class="form-group">
			  									<div class="col-lg-12">
													<div class="alert alert-success" role="alert"><?php echo $this -> session -> flashdata('success'); ?></div>
												</div>
											</div>
											<?php } 
											if($this->session->flashdata('message')){?>
											<div class="form-group">
			  									<div class="col-lg-12">
													<div class="alert alert-danger" role="alert"><?php echo $this -> session -> flashdata('message'); ?></div>
												</div>
											</div>
											<?php } ?>
											<p><b>NOTE*</b> <span style="color:red;">ONLY DELETE</span> a class when you want to remove it from the database</p>
											<a class="btn btn-danger pull-left"  onclick="return confirm('Action can not be undone, proceed?');" href="<?php echo base_url()?>products/deleteClass/<?php echo $r->class_ID ?>">Delete</a>
			  								<div class="pull-right">
			  									
			  									<a href="javascript:window.history.go(-1);" class="btn btn-default">Back</a>
			  									<input type="submit" class="btn btn-success" value="Save">
												</form>
											</div>
										
										
									</div>
									
								</section>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		 
		                        
		
		</div>
	</div>
</section>