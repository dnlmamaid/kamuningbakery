	
	
</div>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>assets/js/jquery-2.1.3.min.js"></script>


<!-- Bootstrap -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>

<!-- Vegas -->
<script src="<?php echo base_url();?>assets/vegas/vegas.min.js"></script>

<!-- Custom -->
<script src="<?php echo base_url();?>assets/js/script.js"></script>
<script type="text/javascript">

		var counter = 2;
			 
		$("#addButton").click(function () {
		if(counter>10){
			alert("Only 10 Raw Materials allowed");
			return false;
		}   
							 
		var newSelectDiv = $(document.createElement('div'))
		.attr("id", 'rm' + counter);
							 
		newSelectDiv.after().html('<label class="col-lg-4 control-label">Raw Material #'+ counter +'</label>'
		+'<div class="col-lg-8 input-group"><select name="rm_ID'+counter+'" class="form-control" required><option value="">Select Raw Material/s</option>'
		+'<?php if(!empty($rm)){if (is_array($rm)){foreach ($rm as $row) {?>'
		+' <option value="'+'<?php echo $row['product_id']?>'+'">'+'<?php echo $row['product_Name']; ?>'+'</option>'
		+'<?php }}} ?>'+'</select>');
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