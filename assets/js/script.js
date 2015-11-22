function initializeJS() {
	var dateToday = new Date();
	//clickable row
	 $(".clickable-row").click(function() {
	        window.document.location = $(this).data("href");
	});	

	 /*forms
	 $('#checker').change(function(){
	    	$('.prodOpt').hide();   	
	   		$('#' + $(this).val()).show();	
 		    
 	});*/
	
	//alert box
	function alertWithoutNotice(){
	    setTimeout(function(){
	        alert();
	    }, 1000);
	} 
	 
	$('#datep').datetimepicker({
		lang : 'en',
		timepicker : false,
		format : 'Y-m-d',
		minDate: dateToday,
	});
	
	$('#date2').datetimepicker({
		lang : 'en',
		timepicker : false,
		format : 'Y-m-d',
		minDate: dateToday,
	});

	$('#sched').datetimepicker({
		allowTimes : ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00'],
		lang : 'en',
		minDate: dateToday,
		format : 'Y/m/d H:i'
	});

	$('#timein').datetimepicker({
		lang : 'en',
		datepicker : false,
		minDate: dateToday,
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