<!-- ADD SUPPLIER MODAL -->
<div class="modal fade" id="addSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="vertical-alignment-helper">
		<div class="modal-dialog vertical-align-center">
						
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title"><i class="fa fa-briefcase"></i> Create New Supplier Form</h4>
				</div>
						
				<div class="modal-body">
				<form class="form-group" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>suppliers/add">
								
					<div class="form-group">
						<div class="col-lg-6 col-xs-6">
							<label for="firstName">Supplier</label>
							<input type="text" name="supplier_name" class="form-control inline" required>
						</div>
					</div>
								
					<div class="form-group">
						<div class="col-lg-6 col-xs-6">
							<label for="lastName">Contact Person</label>
							<input type="text" name="contact_Person" class="form-control inline" required>
						</div>
					</div>
								
					<div class="form-group">
						<div class="col-lg-8 col-xs-8">
							<label for="lastName">Address</label>
							<input type="text" name="st_Address" class="form-control inline" required>
						</div>
					</div>
								
					<div class="form-group">
						<div class="col-lg-4 col-xs-4">
							<label for="lastName">City</label>
							<input type="text" name="city" class="form-control inline" required>
						</div>
					</div>
								
					<div class="form-group">
						<div class="col-lg-8 col-xs-8">
							<label for="lastName">Contact</label>
							<input type="text" name="contact" class="form-control inline" required>
						</div>
					</div>
								
					<div class="form-group">
						<div class="col-lg-8 col-xs-8">
							<label for="lastName">Terms</label>
							<textarea name="terms" class="form-control inline" required></textarea>
						</div>
					</div>
								
				</div>
							
							
				<div class="modal-footer">
					<div class="form-group">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</div>
							
			</form>
			</div>
						
		</div>
	</div>
</div>
	

				
<!-- ADD CLASS MODAL -->
<div class="modal fade" id="addClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Add New Product Classification</h4>
			</div>
			
			<div class="modal-body">
			<form class="form-group" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>products/add_class">
				<div class="form-group">
					<div class="col-lg-6">
						<label for="class_Name">Classification Name</label>
						<input type="text" name="class_Name" class="form-control">
					</div>
				</div>
									
				<div class="form-group">
					<div class="col-lg-3">
						<label for="is_active">Enabled</label>
						<select name="is_active" class="form-control">
							<option value="1">Yes</option>
							<option value="0">No</option>
						</select>
					</div>
				</div>
			</div>
							
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-success" value="ADD">
			</form>
			</div>
		</div>
	</div>		
</div>
					
</div>
 
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>assets/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo base_url()?>assets/moment/min/moment-with-locales.min.js"></script> 


<!-- Bootstrap -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>

<!-- Vegas -->
<script src="<?php echo base_url();?>assets/vegas/vegas.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vegasIn.js"></script>

<!-- date picker -->
<script src="<?php echo base_url()?>assets/datepicker/js/bootstrap-datetimepicker.min.js"></script>

<!-- Custom -->
<script src="<?php echo base_url();?>assets/js/script.js"></script>


<script src="<?php echo base_url();?>assets/js/customscroll.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js"></script>
<script type="text/javascript">

		var counter = 2;
			 
		$("#addButton").click(function () {
		if(counter>10){
			alert("Only 10 Raw Materials allowed");
			return false;
		}   
							 
		var newSelectDiv = $(document.createElement('div'))
		.attr("id", 'rm' + counter);
							 
		newSelectDiv.after().html('<div class="col-lg-12"><div class="col-lg-4"><input type="number" name="quantity" class="form-control inline" value="" required></div><div class="col-lg-8"><select name="rm_ID1" class="form-control" required><option value="">Select Raw Material/s</option>'
		+'<?php if(!empty($rm)){if (is_array($rm)){foreach ($rm as $row) {?>'
		+' <option value="'+'<?php echo $row['product_id']?>'+'">'+'<?php echo $row['product_Name']; ?>'+'</option>'
		+'<?php }}} ?>'+'</select></div></div>');
		newSelectDiv.appendTo("#materials");
						
		counter++;
		
								
								
				
		});
							 
		$("#removeButton").click(function () {
			if(counter==2){
				alert("There should atleast be 1 Raw Material");
				return false;
			}   
							 
			counter--;
							 
			$("#rm" + counter).remove();
						 
		});
			
</script>
</body>
</html>