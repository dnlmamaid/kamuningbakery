
<div class="container bg-panel">
		<?php foreach ($rec as $r)?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-user"></i> <?php echo $r->firstName?>'s Profile</h1>
				<div class="col-lg-4 pull-left">
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i><a href="<?php echo base_url()?>"> Home</a></li>
					<li><i class="fa fa-users"></i><a href="<?php echo base_url()?>users"> Users</a></li>
					<li><i class="fa fa-user"></i> <?php echo $r->firstName?>'s Profile</li>
				</ol>
				</div>
			</div>
		</div>

		
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<form class="form-group" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>users/update/<?php echo $r->id?>">
				<h1>Personal Information</h1>
				<?php if($this->session->flashdata('success')){?>
				<div class="form-group">
					<div class="alert alert-success" role="alert">
						<?php echo $this -> session -> flashdata('success'); ?>
					</div>
				</div>
				<?php } ?>
				<div class="form-group">
					<div class="col-lg-6">
						<label for="firstName">First Name</label>
						<input type="text" name="firstName" class="form-control inline" value="<?php echo $r->firstName?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-6">
						<label for="lastName">Last Name</label>
						<input type="text" name="lastName" class="form-control inline" value="<?php echo $r->lastName?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-4">
					<label for="User Type">User Type</label>
					
					<select name="user_type" class="form-control inline" value="<?php echo $r->user_type ?>" required>
					<option value="<?php echo $r->user_type ?>"><?php echo $r->type_name?></option>
					<?php if(!empty($utype)){
						if (is_array($utype)){                      
							foreach ($utype as $row) {?>
								<option value="<?php echo $row['type_id']?>"><?php echo $row['type_name']; ?></option>
							<?php }
						}
					}
					else{	?>
						<option value=""></option>
					<?php }?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-12">
						<input type="submit" class="btn btn-success pull-right" value="Update" style="margin-left:5px;">
						<a href="<?php echo base_url()?>users" class="btn btn-default pull-right">Back</a>
					</form>
				</div>
		</div>
	</div>
	
</div>


