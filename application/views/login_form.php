
	
	<div id="header">
	</div>
	
	<div id="main">
	<div class="container">
		
		<div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
			<div class="panel panel-default">
	            <div class="panel-body">
	            	<div class"container">
						<center><img id="logo" class="img-responsive" src="<?php echo base_url(); ?>assets/images/kb_logo.jpg" style="margin-bottom: 20px"></center>
            				<div class="col-lg-8 col-lg-offset-2" style="margin-top:10px; margin-bottom:35px;">
			      				<form class="form-signin"  method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>login/validate_account">
			       				<div class="row">
			  					<?php if(validation_errors() == FALSE){
								echo validation_errors(); 
								}
			  					else{ ?>	
				  					<div class="alert alert-danger" role="alert"style="margin-top:5px"><?php echo validation_errors(); ?></div>
			  					<?php  } ?>
			  	
			  					<?php if($this->session->flashdata('error')){ ?>
									<div class="alert alert-danger" role="alert" style="margin-top:5px"><?php echo $this -> session -> flashdata('error'); ?></div>
								<?php } ?>
								<?php if($this->session->flashdata('success')){ ?>
									<div class="alert alert-success" role="alert" style="margin-top:5px"><?php echo $this -> session -> flashdata('success'); ?></div>
								<?php } ?>
						        	<div class="form-group">
							        	<input type="text" name="username" id="Username" class="form-control" placeholder="Username" required autofocus>
							        </div>
						        		
						        	<div class="form-group">
							        	<input type="password"  name="password" id="Password" class="form-control" placeholder="Password" required>
	
							        	<div class="pull-left">
											<a href="" data-target="#password-reset" data-toggle="modal">Forgot Password</a>									
										</div>
										
										<div class="pull-right">
											<input type="submit" class="btn btn-theme" value="Login">
										</div>
						        	</div>
			        			</div>
								<?php echo form_close(); ?>
   							</div>
   					</div>
   				</div>
   			</div>
   		</div>
   	
   	
	</div>
	</div>

   	
   	
		<div class="modal fade" id="password-reset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
		
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Password Reset Form</h4>
						
					</div>
		
					<div class="modal-body">
						<form class="form-group" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>login/reset_password">
							<div class="form-group">
								
									<label for="name">Email Address</label>
									<input type="text" name="email" class="form-control-e" >
								
							</div>
		
					</div>
		
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Cancel
						</button>
						<input type="submit" class="btn btn-success" value="Submit"/>
						</form>
					</div>
					</form>
				</div>
			</div>
		</div>


