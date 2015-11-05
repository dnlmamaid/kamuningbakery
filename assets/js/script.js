function initializeJS() {
	
	$(function ingredient() {
		$("#p").change(function() {
			$.ajax({
				url:'production/getIngredients',
				type: 'post',
				
				data: {p: $(this).val() },
			  	dataType: "json",
			  	success: function(data, status) {
				/*data: {client: $(this).val() },
				success: function(response) {
					
				
			  		
					var Vals    =   JSON.parse(response);
                    // These are the inputs that will populate
                    $("input[name='qpu']").val(Vals.ingredient_qty);
                    $("input[name='rm_ID']").val(Vals.product_id);
					*/                    					
					$("input[name='qpu']").val(data.ingredient_qty);
					$("input[name='rm_ID']").val(data.product_id);
					
				  },
				  
				  error: function(xhr, desc, err) {
					console.log(xhr);
					console.log("Details: " + desc + "\nError:" + err);
				  }
	      });
		});
	
	});
	
	//clickable row
	 $(".clickable-row").click(function() {
	        window.document.location = $(this).data("href");
	});	
	
	
	 
	 /*forms
	 $('select[name="supplier_ID"]').bind('change',function(){
	    var showOrHide = ($(this).val() != 0) ? true : false;
	    $('#prodInfo').toggle(showOrHide);
 	});*/
	 
	 
	$('#datep').datetimepicker({
		lang : 'en',
		timepicker : false,
		format : 'Y-m-d'
	});
	
	$('#date2').datetimepicker({
		lang : 'en',
		timepicker : false,
		format : 'Y-m-d'
	});

	$('#sched').datetimepicker({
		allowTimes : ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00'],
		lang : 'en',
		format : 'Y/m/d H:i'
	});

	$('#timein').datetimepicker({
		lang : 'en',
		datepicker : false,
		format : 'H:i',
		step : 1
	});

	$('#timeout').datetimepicker({
		lang : 'en',
		datepicker : false,
		format : 'H:i',
		step : 1
	});

	$('#sdate').datetimepicker({
		lang : 'en',
		timepicker : false,
		format : 'Y-m-d'
	});

	$('#edate').datetimepicker({
		lang : 'en',
		timepicker : false,
		format : 'Y-m-d'
	});
	   
	//searchboxanimate
	$('#searchbox').focus(function()
	{ 
	$(this).animate({
	    width: '300px'
	  }, 300, function() {
	    // Animation complete.
	  });
	});
	     
	$('#searchbox').blur(function()
	{ 
	$(this).animate({
	     width: '200px'
	   }, 300, function() {
	     // Animation complete.
	   });
	 });
	 
    //tool tips   
  	$('[data-toggle="tooltip"]').tooltip();

    //popovers
    jQuery('.popovers').popover();

    $(document).ready(function () {
	  var trigger = $('.hamburger'),
	      overlay = $('.overlay'),
	     isClosed = false;
	
	    trigger.click(function () {
	      hamburger_cross();      
	    });
	
	    function hamburger_cross() {
	
	      if (isClosed == true) {          
	        overlay.hide();
	        trigger.removeClass('is-open');
	        trigger.addClass('is-closed');
	        isClosed = false;
	      } else {   
	        overlay.show();
	        trigger.removeClass('is-closed');
	        trigger.addClass('is-open');
	        isClosed = true;
	      }
	  }
	  
	  $('[data-toggle="offcanvas"]').click(function () {
	        $('#wrapper').toggleClass('toggled');
	  });  
	});
    
}

jQuery(document).ready(function(){
    initializeJS();
    
});