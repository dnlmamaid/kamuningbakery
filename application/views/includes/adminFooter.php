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
<script src="<?php echo base_url()?>assets/datepicker/js/jquery.datetimepicker.js"></script>

<!--  Morris Charts -->
<script src="<?php echo base_url()?>assets/morris/raphael.min.js"></script> 
<script src="<?php echo base_url()?>assets/morris/morris.min.js"></script>
	
<!-- High Charts -->
<script src="<?php echo base_url()?>assets/highcharts/js/highcharts.js"></script>
<script src="<?php echo base_url()?>assets/highcharts/js/modules/exporting.js"></script>

<!-- Custom -->
<script src="<?php echo base_url();?>assets/js/script.js"></script>


<script src="<?php echo base_url();?>assets/js/customscroll.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js"></script>
<script>
		
	var colors_array= ["#009000", "#006600", "#339933", "#48C248", "#3BB03B"];

    Morris.Donut({

		element: 'donut-example',
        colors: colors_array,
        data: [
			<?php foreach($hsp as $r):?>
			{label: "<?php echo $r->product_Name?>", value: <?php echo $r->qty_sold ?>},
			<?php endforeach; ?>   	
	   	]
	});

$(function () {
    $('#sales-line').highcharts({
    	 credits: {
            enabled: false
        },
        
        colors: ['#00FF00', '#FF0000'],
        
        title: {
            text: 'Monthly Sales',
            x: -20 //centerS
        },
        subtitle: {
            text: 'Kamuning Bakery',
            x: -20
        },
        xAxis: {
            categories: [<?php if(isset($salesm) && is_array($salesm)) : foreach($salesm as $row): ?>
            			'<?php echo date('F Y',strtotime($row->sales_date))?>',
            			<?php endforeach; endif; ?>]
        },
        yAxis: {
        	min: 0,
            title: {
                text: 'Philippine Peso (₱)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valuePrefix: '₱ '
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Total Sales',
            data: [<?php if(isset($salesm) && is_array($salesm)) : foreach($salesm as $row): ?>
            			<?php echo $row->total_sales?>,
            			<?php endforeach; endif; ?>]
        },	
        	
        ]
    });
});


$(function () {
    $('#sales-report-line').highcharts({
    	 credits: {
            enabled: false
        },
        
        colors: ['#00FF00', '#FF0000'],
        
        title: {
            text: 'Monthly Sales',
            x: -20 //center
        },
        subtitle: {
            text: 'Kamuning Bakery',
            x: -20
        },
        xAxis: {
            categories: [<?php if(isset($sales) && is_array($sales)) : foreach($sales as $row): ?>
            			'<?php echo date('F Y',strtotime($row->sales_date))?>',
            			<?php endforeach; endif; ?>]
        },
        yAxis: {
        	min: 0,
            title: {
                text: 'Philippine Peso (₱)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valuePrefix: '₱ '
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Total Sales',
            data: [<?php if(isset($sales) && is_array($sales)) : foreach($sales as $row): ?>
            			<?php echo $row->total_sales?>,
            			<?php endforeach; endif; ?>]
        },	
        	
        ]
    });
});		
</script>
</body>
</html>